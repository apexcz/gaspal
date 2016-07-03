<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CompanyFormRequest extends Request
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
        //$user = User::find($this->users);

        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    //
                    'name'=> 'required|unique:companies|string|max:100',
                    'phone'=>'unique:companies|numeric|digits_between:11,14',
                    'others'=>'string'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    //
                    'phone'=>'unique:companies|numeric|digits_between:11,14',
                    'others'=>'string'
                ];
            }
            default:break;
        }
    }
}
