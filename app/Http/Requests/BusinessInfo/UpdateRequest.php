<?php

namespace App\Http\Requests\BusinessInfo;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'id'            => 'required|string|max:15',
            'name'          => 'required|string|max:255',
            'address'       => 'required|string|max:255',
            'province_id'   => 'required|string|size:2',
            'regency_id'    => 'required|string|size:4',
            'district_id'   => 'required|string|size:6',
            'village_id'    => 'required|string|size:10',
            'zip_code'      => 'required|string|size:5',
        ];
    }
}
