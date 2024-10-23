<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MainRequest;
use App\Models\ManualVisa;
use App\Models\Visa;
use App\Models\Scopes\ActiveScope;

// QR
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\Encoding\Encoding;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function service()
    {
        return view('service');
    }

    public function faq()
    {
        return view('faq');
    }

    public function visaQuery()
    {
        return view('visa-query');
    }

    public function findVisa(Request $request)
    {
        $type = $request->type;
        return view('visa-find', compact('type'));
    }

    public function search(MainRequest $request)
    {
        if ($request->type == 'manual') {
            $visa = ManualVisa::where([
                'passport_no' => $request->passport_no,
                'nationality' => $request->nationality,
                'date_of_birth' => date('Y-m-d', strtotime($request->date_of_birth))
            ])->first();

            return response()->success([ 'visa' => $visa ]);
        }

        if ($request->type == 'evisa') {
            $visa = Visa::where([
                'passport_no' => $request->passport_no,
                'nationality' => $request->nationality,
                'date_of_birth' => date('Y-m-d', strtotime($request->date_of_birth))
            ])->first();

            $visaId = ($visa) ? base64_encode(base64_encode(base64_encode(base64_encode($visa->id)))) : null;

            return response()->success([
                'visa' => $visa,
                'visa_id' => $visaId
            ]);
        }
    }

    public function verifyQrCode(string $link)
    {
        $visa = Visa::where([ 'qr_link' => $link ])->first();

        abort_if(!$visa, 404);

        return view('visa.verify', compact('visa'));
    }
}
