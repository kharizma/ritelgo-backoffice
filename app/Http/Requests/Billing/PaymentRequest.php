<?php

namespace App\Http\Requests\Billing;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'invoice_id'  => 'required|string|max:100',
            'package_subscription_name'  => 'required|string|max:100',
            'price_type'    => 'required|string|max:8',
            'total_amount'  => 'required|integer|min:0',
        ];
    }
}
