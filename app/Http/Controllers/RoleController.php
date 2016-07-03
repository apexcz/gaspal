<?php

namespace App\Http\Controllers;

use Bican\Roles\Models\Role;
use Illuminate\Http\Request;

use App\Http\Requests;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $this->response->array(Role::orderBy('level','ASC')->get());
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
    public function store(Requests\RoleFormRequest $request)
    {
        //
        $role = new Role();
        $role->name = $request->get('name');
        $role->description = $request->description;
        $role->slug = $request->slug;
        $role->level = ($request->input('level')) ? $request->input('level') : 1;

        if($role->save()){
            $role->perms()->sync($request->perms);
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
        $role = Role::findOrFail($id);
        return $this->response->array($role);
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
        $role = Role::findOrFail($id);
        if($role->fill($request->all())->save()){
            $role->perms()->sync($request->perms);
            return $this->response->array($role);
        }
        else{
            return $this->response->errorBadRequest();
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
        $role = Role::findOrFail($id);
        $role->delete();
        return $this->response->noContent();
    }
}
