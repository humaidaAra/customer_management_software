<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
        if (request()->routeIs('customers.update')) {
            return [
                'name' => ['string', 'required'],
                'phone' => ['string', 'required'],
                'address' => ['string', 'nullable'],
                'free_trial' => ['string', 'required'],
                'start_date' => ['date', 'required'],
                'note' => ['string', 'nullable'],
            ];
        }
        $this->merge(['created_by' => auth()->user()->id]);
        return [
            'name' => ['string', 'required', 'unique:customers,name'],
            'phone' => ['string', 'required', 'unique:customers,phone'],
            'address' => ['string', 'nullable'],
            'free_trial' => ['string', 'required'],
            'start_date' => ['date', 'required'],
            'note' => ['string', 'nullable'],
            'created_by'=>['required']
        ];
    }
}
