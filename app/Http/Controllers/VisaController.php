<?php

namespace App\Http\Controllers;

use App\Http\Requests\VisaRequest;
use App\Models\Visa;
use App\Models\Scopes\ActiveScope;
use Barryvdh\DomPDF\Facade\PDF;

// QR
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

    /**
     * Show visa
     */
    // public function show(string $id)
    // {
    //     $visa = Visa::withoutGlobalScope(ActiveScope::class)->findOrFail($id);
    //     $url = route('verify.qr', $visa->qr_link);

    //     // QR base 64
    //     $qrCode = $this->generateQrBase64($url);

    //     // Setup custom font directory and font data configuration
    //     $fontDirs = [public_path('assets/fonts/cairo')];
    //     $fontData = [
    //         'cairo' => [
    //             'R' => 'cairo.ttf',
    //             'B' => 'cairo-bold.ttf'
    //         ]
    //     ];

    //     $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
    //     $defaultFontDirs = $defaultConfig['fontDir'];

    //     $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
    //     $defaultFontData = $defaultFontConfig['fontdata'];

    //     $mpdf = new \Mpdf\Mpdf([
    //         'mode' => 'utf-8',
    //         'format' => 'A4',
    //         'orientation' => 'P',
    //         'autoScriptToLang' => true,
    //         'autoLangToFont' => true,
    //         'margin_top' => 0, // Adjust margins as needed
    //         'margin_bottom' => 0,
    //         'margin_left' => 0,
    //         'margin_right' => 0,
    //         'fontDir' => array_merge($defaultFontDirs, $fontDirs), // Merge default font directory with your custom directory
    //         'fontdata' => $defaultFontData + $fontData, // Merge default font data with your custom font data
    //         'default_font' => 'cairo' // Set default font to Amiri
    //     ]);

    //     $view = view('visa.show', compact('visa'))->render(); // Render view to HTML string
    //     $mpdf->WriteHTML($view);
    //     return $mpdf->Output("{$visa->passport_no}.pdf", 'I'); // Output PDF to browser
    // }
   public function show(string $id)
{
    // Retrieve the visa without global scope
    $visa = Visa::withoutGlobalScope(ActiveScope::class)->findOrFail($id);
   // dd($visa->qr_link);
        // Generate QR code link (if needed for the view)
        $url = route('verify.qr', 'qr_link' , $visa->qr_link);
        $qrCode = $this->generateQrBase64($url);
       // dd($qrCode);
        // Pass visa and QR code to the view for web display
        return view('visa.show', compact('visa', 'qrCode'));
}
    public function generatePdf(string $id)
    {
        // Retrieve the visa without global scope
        $visa = Visa::withoutGlobalScope(ActiveScope::class)->findOrFail($id);

        // Generate QR code URL
        $url = route('verify.qr', $visa->qr_link);
        $qrCode = $this->generateQrBase64($url);

        // Custom font configuration for PDF
        $fontDirs = [public_path('assets/fonts/cairo')];
        $fontData = [
            'cairo' => [
                'R' => 'cairo.ttf',
                'B' => 'cairo-bold.ttf'
            ]
        ];

        // Setup font configuration with MPDF
        $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
        $defaultFontDirs = $defaultConfig['fontDir'];

        $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
        $defaultFontData = $defaultFontConfig['fontdata'];

        // Initialize MPDF with custom settings
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'orientation' => 'P',
            'autoScriptToLang' => true,
            'autoLangToFont' => true,
            'margin_top' => 0,
            'margin_bottom' => 0,
            'margin_left' => 0,
            'margin_right' => 0,
            'fontDir' => array_merge($defaultFontDirs, $fontDirs),
            'fontdata' => $defaultFontData + $fontData,
            'default_font' => 'cairo'
        ]);

        // Render the visa show view as a PDF
        $view = view('visa.show', compact('visa', 'qrCode'))->render();
        $mpdf->WriteHTML($view);

        // Output PDF to browser
        return $mpdf->Output("{$visa->passport_no}.pdf", 'I');
    }

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
            QrCode::backgroundColor(255, 255, 255, 100) // Background color with full opacity
                ->color(70, 112, 203) // RGB color values without alpha
                ->format('png')
                
                ->merge(public_path('./assets/images/kuwait-police-logo-no-transparent.png'), 0.3, true) // Merging the logo
                ->generate($data) // Generate the QR code
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
