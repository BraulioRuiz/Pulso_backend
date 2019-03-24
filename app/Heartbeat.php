<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class heartbeat extends Model
{
    protected $table = 'heartbeat';
    protected $fillable = [
       'id', 'pulse', 'status','date'
    ];
}
