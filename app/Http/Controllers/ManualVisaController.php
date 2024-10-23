<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManualVisaRequest;
use App\Models\ManualVisa;
use App\Models\Scopes\ActiveScope;

class ManualVisaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $manualVisas = ManualVisa::withoutGlobalScope(ActiveScope::class)->get();

        $data = [
            'manual_visas' => $manualVisas,
            'page_title' => 'Manage Manual Visa',
            'menu' => 'Manual Visa'
        ];

        return view('manual-visa.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'page_title' => 'Upload Manual Visa',
            'menu' => 'Manual Visa'
        ];

        return view('manual-visa.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ManualVisaRequest $request)
    {
        // Upload user image
        $file_name = '';
        if ($request->file) {
            $file_name = time() . uniqid() . '.' . $request->file->extension();
            $request->file->move(public_path('uploads/manual-visa'), $file_name);
        }

        // Create Manual Visa
        $manualVisa = ManualVisa::create([
            'passport_no' => $request->passport_no,
            'date_of_birth' => $request->date_of_birth,
            'nationality' => $request->nationality,
            'file' => $file_name
        ]);

        return response()->successMessage('Visa Uploaded Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ManualVisaRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $visa = ManualVisa::withoutGlobalScope(ActiveScope::class)->find($id);
        
        if ($visa) {
            // Unlink File
            $filePath = public_path('uploads/manual-visa/'.$visa->file);
            if (is_file($filePath)) unlink($filePath);

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
    public function updateManualVisaStatus($id)
    {
        $visa = ManualVisa::withoutGlobalScope(ActiveScope::class)->find($id);

        if ($visa) {
            $data['is_active'] = ($visa->is_active == 1) ? 0 : 1;
            $visa->update($data);
            return response()->success($data);
        }

        return response()->errorMessage('Visa not Found !');
    }
}
