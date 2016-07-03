<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Transformers\CompanyTransformer;
use App\Http\Requests;
use Dingo\Api\Exception\ValidationHttpException;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $companies =  Company::orderBy('name','ASC')->orderBy('created_at','ASC')->get();
        //return $this->response->array($companies);
        return $this->response->collection($companies, new CompanyTransformer)->setStatusCode(200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CompanyFormRequest $request)
    {
        //

        $inputs = $request->all();
        $company =  Company::create($inputs);

        if($company)
            return $this->response->created();
        else
            return $this->response->errorBadRequest();
        //throw new ValidationHttpException('jeid');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $company = Company::findOrFail($id);
        //return response($company,200);
        return $this->response->item($company,new CompanyTransformer)->setStatusCode(200);;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CompanyFormRequest $request, $id)
    {
        //
//        $this->validate($request,[
//           'name' => 'required'
//        ]);

        try{
            $company = Company::findOrFail($id);
            return response($request->all(),309);
            $company->fill($request->all())->save();
            return response($company,200);
        }
        catch(\Exception $ex)
        {
            return $this->response->errorInternal('Sorry an internal error occured');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $company = Company::findOrfail($id);
        $company->delete();
        return response($company,200);
    }
}
