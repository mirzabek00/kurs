<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name'=>"required|max:255",
            'last_name'=>"required|max:255",
            'email'=>"required|unique:users",
            'password'=>"required_with:password-confirm|same:password-confirm|min:3",
            'agree'=>"required"
        ];
    }
}
