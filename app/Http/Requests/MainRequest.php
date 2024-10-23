<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\FailedValidationTrait;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;

class MainRequest extends FormRequest
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
            'search.visa' => $this->search()
        };
    }

    /**
     * Validate Rules for Store Request
     */
    public function search()
    {
        return [
            'passport_no' => 'required',
            'type' => 'required|in:manual,evisa',
            'nationality' => 'required',
            'date_of_birth' => 'required'
        ];
    }
}
