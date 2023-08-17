<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractRequest extends FormRequest
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
        $this->merge(['created_by' => auth()->user()->id]);
        return [
            'customer_id' => ['required', 'exists:customers,id'],
            'start_date'=>['required', 'date'],
            'expire_date'=>['required', 'date'],
            'payment'=>['required','numeric'],
            'note'=>['nullable'],
            'created_by'=>['required', 'exists:users,id']
        ];
    }
}
