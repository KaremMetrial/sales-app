<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TreasuryRequest extends FormRequest
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
            //
            'name' => 'required',
            'is_master' => 'required',
            'last_receipt_exchange' => 'required|integer|min:0',
            'last_receipt_collect' => 'required|integer|min:0',
            'active' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'يرجى ادخال اسم الخزنة',
            'is_master.required' => 'يرجى ادخال هل الخزنة رئيسية او فرعية',
            'last_receipt_exchange.required' => 'يرجى ادخال اخر ايصال للصرف',
            'last_receipt_exchange.integer' => 'يرجى ادخال رقم اخر ايصال للصرف',
            'last_receipt_collect.required' => 'يرجى ادخال اخر ايصال للتحصيل',
            'last_receipt_collect.integer' => 'يرجى ادخال رقم اخر ايصال للتحصيل',
            'active.required' => 'يرجى ادخال حالة الخزنة',
        ];
    }
}
