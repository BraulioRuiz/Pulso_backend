<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Data_User;
use App\Cardiac_Control;
use App\Http\Resources\Users as UsersResources;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UsersResources::collection(Users::all());
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $data = new Data_User();
        $data->name = $request->name;
        $data->last_name_P = $request->last_name_P;
        $data->last_name_M = $request->last_name_M;
        $data->birthdate = $request->birthdate;
        $data->phone = $request->phone;
        $data->gender = $request->gender;
        $data->save();
        $user = new Users();
        $user->email = $request->email;
        if($request->password1 == $request->password2){
            $user->password = $request->password1;
        }
        $user->id_data = $data->id;
        $user->save();
        return $user;        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = new UsersResources(Users::find($id));     
        return $user;
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
        $user = Users::find($id);
        $user->email = $request->email;
        if($request->password1 == $request->password2){
            $user->password = $request->password1;
        }        
        $user->update();
        $data = Data_User::where('id', $user->id_data)->first();
        $data->name = $request->name;
        $data->last_name_P = $request->last_name_P;
        $data->last_name_M = $request->last_name_M;
        $data->birthdate = $request->birthdate;
        $data->phone = $request->phone;
        $data->gender = $request->gender;
        $data->update();
        
        return $user;         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $user = Users::find($id);
        // $data = Data_User::where('id', $user->id_data)->delete();
        // $cardiac = Cardiac_Control::where('id_user', $id);
        Users::destroy($id);
        return 1;
    }
}
