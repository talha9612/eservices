<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\FailedValidationTrait;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'user.store' => $this->store(),
            'user.update' => $this->update()
        };
    }

    /**
     * Validate Rules for Store Request
     */
    public function store()
    {
        return [
            'name' => [ 'required', 'string', 'max:60', Rule::unique('users')->whereNull('deleted_at') ],
            'username' => [ 'required', 'string', Rule::unique('users')->whereNull('deleted_at') ],
            'email' => [ 'required', 'string', 'email', Rule::unique('users')->whereNull('deleted_at') ],
            'password' => 'required|min:6|string',
            'phone_no' => 'nullable|string',
            'designation' => 'nullable|string',
            'image' => 'nullable|image'
        ];
    }

    /**
     * Validate Rules for Update Request
     */
    public function update()
    {
        return [
            'name' => [ 'required', 'string', 'max:60', Rule::unique('users')->whereNull('deleted_at')->ignore($this->user) ],
            'username' => [ 'required', 'string', Rule::unique('users')->whereNull('deleted_at')->ignore($this->user) ],
            'email' => [ 'required', 'string', 'email', Rule::unique('users')->whereNull('deleted_at')->ignore($this->user) ],
            'phone_no' => 'nullable|string',
            'designation' => 'nullable|string',
            'image' => 'nullable|image',
            'password' => 'nullable|min:6|string'
        ];
    }
}
