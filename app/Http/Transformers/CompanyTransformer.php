<?php
/**
 * Created by PhpStorm.
 * User: Odogwu
 * Date: 6/26/2016
 * Time: 3:41 PM
 */

namespace App\Http\Transformers;

use App\Company;
//Dingo includes fractal to help with transformations
use League\Fractal\TransformerAbstract;

class CompanyTransformer extends TransformerAbstract {

    public function transform(Company $company)
    {
        //Specify what elements that are to be visible to the API
        return[
            'company_name' => $company->name,
            'phone' => $company->phone
        ];
    }
}