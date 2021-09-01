<?php

namespace App\Http\Requests;

use Anik\Form\FormRequest;

class UserRequest extends FormRequest
{
     /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function rules(): array
    {
        return [
            'name' => 'required|array',
            'email' => "required|email|unique:users,email,{$this->user?->id}",
            'phone' => "required|numeric|unique:users,phone,{$this->user?->id}",
            'password' => 'required|min:8|confirmed'
        ];
    }

}