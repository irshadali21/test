<?php

namespace App\Http\Requests\API;

use App\Models\sector_table;
use InfyOm\Generator\Request\APIRequest;

class Updatesector_tableAPIRequest extends APIRequest
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
        $rules = sector_table::$rules;
        
        return $rules;
    }
}
