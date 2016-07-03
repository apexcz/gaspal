<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StationFormRequest extends Request
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
            'bus_stop'=>'required|string|min:3',
            'city'=>'required|string|min:3',
            'state'=>'required|string|min:3',
            'company_id'=>'required|numeric',
            'phone'=>'numeric|digits_between:11,14'
        ];
    }
}
