<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Heartbeat;
use App\Cardiac_Control;
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
        return HeartbeatResources::collection(Cardiac_Control::All());
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
        $heartbeat->save();
        $control = new Cardiac_Control();
        $control->id_user = $request->id_user;
        $control->id_pulse = $heartbeat->id;
        $control->save();
        return $control;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $control = new HeartbeatResources(Cardiac_Control::find($id));
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
        $control = Cardiac_Control::find($id);   
        $heartbeat = Heartbeat::where('id', $control->id_pulse)->first();
        $heartbeat->pulse = $request->pulse;
        $heartbeat->status = $request->status;
        $heartbeat->date = $request->date;
        $heartbeat->update();           
        // $control->id_user = $request->id_user;
        // $control->id_pulse = $heartbeat->id;
        // $control->update();     
        return new HeartbeatResources($control);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cardiac_Control::destroy($id);
        return 1;
    }
}
