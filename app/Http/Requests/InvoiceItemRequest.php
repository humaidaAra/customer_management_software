<?php

namespace App\Http\Requests;

use Exception;
use Illuminate\Foundation\Http\FormRequest;

class InvoiceItemRequest extends FormRequest
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
        try {
            $subtotal = request()->price - (request()->quantity * request()->price) * (request()->discount / 100);
            $this->merge(['subtotal' => $subtotal]);
        } catch (\Throwable $th) {
            //throw $th;
            return [];
        }
        return [
            'invoice_id' => ['required', 'numeric'],
            'item_name' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'discount' => ['nullable', 'numeric'],
            'quantity' => ['required', 'numeric'],
            'subtotal' => ['required'],
            'note' => ['nullable']
        ];
    }
}
