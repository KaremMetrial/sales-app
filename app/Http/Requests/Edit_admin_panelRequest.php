<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Edit_admin_panelRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'system_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'system_name.required' => 'اسم الشركة مطلوب',
            'address.required' => 'عنوان الشركة مطلوب',
            'phone.required' => 'هاتف الشركة مطلوب',
        ];
    }
}
