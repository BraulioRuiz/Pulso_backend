<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cardiac_control extends Model
{
    protected $table = 'cardiac_control';
    protected $fillable = [
       'id', 'id_user', 'id_pulse','date'
    ];

    public function data($id){
        $data = Cardiac_Control::select('pulse', 'status', 'date')
        ->join('heartbeat', 'heartbeat.id', '=', 'cardiac_control.id_pulse')
        ->where('cardiac_control.id', '=', $id)
        ->get();
        return $data;
    } 
}
