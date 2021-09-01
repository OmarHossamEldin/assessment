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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function rules(): array
    {
        return [
            //
        ];
    }
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
     * onCreate request
     *
     * @return array
     */
    private function onCreate()
    {
        return [
            'name' => 'required|json',
            'email' => "required|email|unique:users,email,{$this->user?->id}",
            'password' => 'required|confirmed'
        ];
    }
    /**
     * onUpdate request
     *
     * @return array
     */
    private function onUpdate()
    {
        return [
            'name' => 'required|string',
            'email' => "required|email|unique:users,email,{$this->user?->id}",
            'is_admin' => 'required|bool'
        ];
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return request()->isMethod('put') || request()->isMethod('patch') ? $this->onUpdate(): $this->onCreate();
    }
}