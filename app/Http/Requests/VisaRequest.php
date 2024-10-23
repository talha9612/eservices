<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\FailedValidationTrait;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;

class VisaRequest extends FormRequest
{
    use FailedValidationTrait;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return match(Route::currentRouteName()) {
            'visa.store' => $this->store(),
            'visa.update' => $this->update()
        };
    }

    /**
     * Validate Rules for Store Request
     */
    public function store()
    {
        return [
            'visa_no' => 'required|unique:visas,visa_no',
            'visa_type_arabic' => 'required',
            'visa_type_english' => 'required',
            'visa_purpose_arabic' => 'required',
            'visa_purpose_english' => 'required',
            'date_of_issue' => 'required|date',
            'date_of_expiry' => 'required|date',
            'place_of_issue_arabic' => 'required',
            'fullname_arabic' => 'required',
            'fullname_english' => 'required',
            'moi_refrence' => 'required',
            'nationality' => 'required',
            'holder_date_of_issue' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'occupation_arabic' => 'required',
            'occupation_english' => 'required',
            'date_of_birth' => 'required|date',
            'passport_no' => 'required',
            'place_of_issue' => 'required',
            'passport_type' => 'required',
            'holder_expiry_date' => 'required|date',
            'company_fullname_arabic' => 'required',
            'moi_refrence_family' => 'required',
            'mobile_no' => 'required',
            'message' => 'nullable',
            'qr_link' => 'required:unique:visas,qr_link'
        ];
    }

    /**
     * Validate Rules for Update Request
     */
    public function update()
    {
        return [
            'visa_no' => [ 'required', Rule::unique('visas', 'visa_no')->ignore($this->visa) ],
            'visa_type_arabic' => 'required',
            'visa_type_english' => 'required',
            'visa_purpose_arabic' => 'required',
            'visa_purpose_english' => 'required',
            'date_of_issue' => 'required|date',
            'date_of_expiry' => 'required|date',
            'place_of_issue_arabic' => 'required',
            'fullname_arabic' => 'required',
            'fullname_english' => 'required',
            'moi_refrence' => 'required',
            'nationality' => 'required',
            'holder_date_of_issue' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'occupation_arabic' => 'required',
            'occupation_english' => 'required',
            'date_of_birth' => 'required|date',
            'passport_no' => 'required',
            'place_of_issue' => 'required',
            'passport_type' => 'required',
            'holder_expiry_date' => 'required|date',
            'company_fullname_arabic' => 'required',
            'moi_refrence_family' => 'required',
            'mobile_no' => 'required',
            'message' => 'nullable',
            'qr_link' => [ 'required', Rule::unique('visas', 'qr_link')->ignore($this->visa) ]
        ];
    }
}
