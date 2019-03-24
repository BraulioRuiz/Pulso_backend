<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class heartbeat extends Model
{
    protected $table = 'heartbeat';
    protected $fillable = [
       'id', 'pulse', 'status', 'date', 'id_user'
    ];
    public function data($id){
        $data = Heartbeat::select('pulse', 'status', 'date')
        ->join('heartbeat', 'heartbeat.id', '=', 'cardiac_control.id_pulse')
        ->where('cardiac_control.id', '=', $id)
        ->get();
        return $data;
    } 
}
