<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileStoreRequest extends FormRequest
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
            'file_name' => 'required|file|mimes:doc,docx,xlsx,xls,txt,pdf'
        ];
    }
    public function messages(){
        return [
            'file_name.required' => 'Please select a file',
            'file_name.file' => 'Please select a file',
            'file_name.mimes' => 'Please select a file with doc, docx, xlsx, xls, txt, pdf extensions'

        ];
    }
}
