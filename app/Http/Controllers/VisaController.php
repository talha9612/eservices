<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use App\Http\Requests\VisaRequest;
use App\Models\Visa;
use App\Models\Scopes\ActiveScope;
use Barryvdh\DomPDF\Facade\Pdf; // Correct import for version 3.0
// QR
use Mpdf\Mpdf;use Barryvdh\Snappy\Facades\SnappyPdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Spatie\Browsershot\Browsershot;
// use Endroid\QrCode\QrCode;
// use Endroid\QrCode\Logo\Logo;
// use Endroid\QrCode\Builder\Builder;
// use Endroid\QrCode\Encoding\Encoding;
// use Endroid\QrCode\Writer\PngWriter;
// use Endroid\QrCode\Label\Label;
// use Endroid\QrCode\Color\Color;

class VisaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visas = Visa::withoutGlobalScope(ActiveScope::class)->get();

        $data = [
            'visas' => $visas,
            'page_title' => 'Manage Visa',
            'menu' => 'Visa'
        ];

        return view('visa.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'page_title' => 'Add Visa',
            'menu' => 'Visa'
        ];

        return view('visa.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VisaRequest $request)
    {
        $data = array_merge($request->validated(), ['qr_link' => urlencode($request->qr_link)]);
        Visa::create($data);
        return response()->successMessage('Visa Created Successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $visa = Visa::withoutGlobalScope(ActiveScope::class)->findOrFail($id);

        $data = [
            'visa' => $visa,
            'page_title' => 'Edit Visa',
            'menu' => 'Visa'
        ];

        return view('visa.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VisaRequest $request, string $id)
    {
        $visa = Visa::withoutGlobalScope(ActiveScope::class)->find($id);

        if ($visa) {
            $data = array_merge($request->validated(), ['qr_link' => urlencode($request->qr_link)]);
            $visa->update($data);
            return response()->successMessage('Visa Updated Successfully!');
        }

        return response()->errorMessage('User not Found !');
    }
    public function show(string $id)
    {
        // Retrieve the visa without global scope
        $visa = Visa::withoutGlobalScope(ActiveScope::class)->findOrFail($id);
    
        // Generate QR code link (if needed for the view)
        $url = route('verify.qr', $visa->qr_link);
        $qrCode = $this->generateQrBase64($url);
        $pdfUrl = url('https://www.moi.gov.kw/main/content/docs/immigration/visa-instructions.pdf');
        $pdfQrCode = $this->generateQrBase64($pdfUrl);
    
        // Render the HTML with Tailwind CSS
        $html = view('visa.show', compact('visa', 'qrCode', 'pdfQrCode'))->render();
    
        // Use Browsershot to capture the HTML as a PDF
        $pdf = Browsershot::html($html)
                          ->format('A2')
                          ->setOption('landscape', false)
                          ->margins(10, 10, 10, 10)
                          ->showBackground()
                          ->emulateMedia('print')
                          ->pdf();
    
        return response($pdf)->header('Content-Type', 'application/pdf');
    }
    // public function show(string $id)
    // {
    //     // Retrieve the visa without global scope
    //     $visa = Visa::withoutGlobalScope(ActiveScope::class)->findOrFail($id);
    //    // dd($visa->qr_link);
    //         // Generate QR code link (if needed for the view)
    //         $url = route('verify.qr', $visa->qr_link);
    //         $qrCode = $this->generateQrBase64($url);
    //         $pdfUrl = url('https://www.moi.gov.kw/main/content/docs/immigration/visa-instructions.pdf');
    //         $pdfQrCode = $this->generateQrBase64($pdfUrl);
    //         $pdf = Pdf::loadView('visa.show', compact('visa', 'qrCode', 'pdfQrCode'))
    //         ->setPaper('A2', 'portrait')
    //         ->setOption('isHtml5ParserEnabled', true)
    //         ->setOption('isRemoteEnabled', true) // for external assets if needed
    //         ->setOption('isPhpEnabled', true);
        
    //    return $pdf->stream('visa.pdf'); // Specify a name for the downloaded PDF
    //     // return view('visa.show', compact('visa', 'qrCode', 'pdfQrCode'));

    // }
//    public function show(string $id)
// {
//     // Retrieve the visa without global scope
//     $visa = Visa::withoutGlobalScope(ActiveScope::class)->findOrFail($id);
//    // dd($visa->qr_link);
//         // Generate QR code link (if needed for the view)
//         $url = route('verify.qr', 'qr_link' , $visa->qr_link);
//         $qrCode = $this->generateQrBase64($url);
//         $pdfUrl = url('https://www.moi.gov.kw/main/content/docs/immigration/visa-instructions.pdf');
//         $pdfQrCode = $this->generateQrBase64($pdfUrl);
//         return view('visa.show', compact('visa', 'qrCode', 'pdfQrCode'));
// }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $visa = Visa::withoutGlobalScope(ActiveScope::class)->find($id);

        if ($visa) {
            $visa->delete();
            return response()->successMessage('Visa Deleted Successfully !');
        }

        return response()->errorMessage('Visa not Found !');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateVisaStatus($id)
    {
        $visa = Visa::withoutGlobalScope(ActiveScope::class)->find($id);

        if ($visa) {
            $data['is_active'] = ($visa->is_active == 1) ? 0 : 1;
            $visa->update($data);
            return response()->success($data);
        }

        return response()->errorMessage('Visa not Found !');
    }

    public function generateQrBase64($data)
    {
            return 'data:image/png;base64,' . base64_encode(
                QrCode::format('png')
                ->size(250) 
                ->style('dot') 
                ->color(30, 86, 160) 
                ->eye('square') 
                ->errorCorrection('H') 
                ->merge(public_path('./assets/images/kuwait-police-logo-no-transparent.png'), 0.2, true) 
                ->generate($data)
            );
        
    } 


        
        // Step 1: Create a new instance of the QR code
        // $qrCode = QrCode::create($data)
        //     ->setEncoding(new Encoding('UTF-8')) // Use the imported Encoding class
        //     ->setSize(350)
        //     ->setMargin(20)
        //     ->setForegroundColor(new Color(68, 114, 196)) // Set foreground color to #1C6198
        //     ->setBackgroundColor(new Color(255, 255, 255)); // Set background color to white

        // $logoPath = public_path('assets/images/kuwait-police-logo-no-transparent.png');
        // $logo = Logo::create($logoPath)->setResizeToWidth(60);

        // // Step 3: Write the QR code to PNG format
        // $writer = new PngWriter();
        // $result = $writer->write($qrCode, $logo);

        // // Step 4: Save the QR code to a file
        // $qrCodePath = public_path('uploads/qrcodes/qr_code_with_logo.png');
        // $result->saveToFile($qrCodePath);

        // return $qrCodePath;
    //}
}
