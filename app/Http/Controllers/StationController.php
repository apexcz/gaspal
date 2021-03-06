<?php

namespace App\Http\Controllers;

use App\Station;
use Illuminate\Http\Request;

use App\Http\Requests;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $stations = Station::orderBy('state', 'ASC')->orderBy('city','DESC')->get();
        return $this->response->array($stations);
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
    public function store(Requests\StationFormRequest $request)
    {
        //
        $station = new Station();

        $station->bus_stop = $request->bus_stop;
        $station->city = $request->city;
        $station->state = $request->state;
        $station->company_id = $request->company_id;
        $station->phone = $request->phone;

        if($station->save()){
            return $this->response->created();
        }
        else{
            return $this->response->errorBadRequest();
        }
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
        $station = Station::findOrFail($id);
        if(!$station)
            throw new NotFoundHttpException;
        return response($station,200);
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
    public function update(Request $request, $id)
    {
        //
        $station = Station::findOrFail($id);
        $station->fill($request->all())->save();
        return $this->response->array(['stae'=>$station,'eer'=>$request->all()],209);
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
        $station = Station::findOrFail($id);
        if($station->delete())
        {
            return $this->response->noContent();
        }
        else
        {
            return $this->response->error('could not delete station', 500);
        }
    }
}
