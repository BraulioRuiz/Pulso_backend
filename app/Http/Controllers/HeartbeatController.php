<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Heartbeat;
//use App\Cardiac_Control;
use App\Users;
use App\Http\Resources\Heartbeat as HeartbeatResources;

class HeartbeatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return HeartbeatResources::collection(Heartbeat::All());
    }    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $heartbeat = new Heartbeat();
        $heartbeat->pulse = $request->pulse;
        $heartbeat->status = $request->status;
        $heartbeat->date = $request->date;
        $heartbeat->id_user = $request->id_user;
        $heartbeat->save();
        // $control = new Cardiac_Control();
        // $control->id_user = $request->id_user;
        // $control->id_pulse = $heartbeat->id;
        // $control->save();
        return $heartbeat;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $control = new HeartbeatResources(Heartbeat::find($id));
        return $control;
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
        //$control = Cardiac_Control::find($id);   
        $heartbeat = Heartbeat::find($id)->first();
        $heartbeat->pulse = $request->pulse;
        $heartbeat->status = $request->status;
        $heartbeat->date = $request->date;
        $heartbeat->update();           
        // $control->id_user = $request->id_user;
        // $control->id_pulse = $heartbeat->id;
        // $control->update();     
        return new HeartbeatResources($heartbeat);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Heartbeat::destroy($id);
        return 1;
    }
}
