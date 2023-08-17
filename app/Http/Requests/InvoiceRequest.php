<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InvoiceRequest extends FormRequest
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
            'contract_id'=>['required', 'numeric'],
            'customer_name'=>['string', 'required'],
            'invoice_date'=>['date', 'required'],
            'total'=>['numeric', 'required'],
            'status'=>['numeric', 'required', Rule::in([0,1,2])],
        ];
    }
}
