<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::orderBy('created_at','DESC')->get();
        return response($users,200);
    }

    public function store(Requests\UserFormRequest $request)
    {
        //'first_name','last_name','phone','email','category'
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->category = $request->category;
        $user->password = Hash::make($request->password);

        \Mail::send('welcome_email',['sent'=>'Please work for me'], function($message){
            $message->to('otybigty@gmail.com', 'Bensteen')->subject('Bienvenue !');
        });
        if($user->save()){
            $user->roles()->sync($request->role);
//            Mail::send('emails.welcome', ['name' => 'Novice'], function($message){
//                $message->to('f***@gmail.com', 'Fabien')->subject('Bienvenue !');
//            });
            return $this->response->array($user);
        }
        else{
           return $this->response->errorBadRequest();
        }

    }

    public function show($id)
    {
        //
        $user = User::findOrFail($id);
        return response($user,200);
    }
}
