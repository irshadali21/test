<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'vat_number' => 'required|max:255',
            'countries' => 'required|max:255',
            'company_name' => 'required|max:255',
            'benefit_id' => 'required|max:255',
            'year' => 'required|max:255',
            'company_address' => 'required',
            'email_address' => 'required|max:255',
        ];
    }
}
