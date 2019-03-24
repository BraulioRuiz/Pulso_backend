<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class data_user extends Model
{
    protected $table = 'data_user';
    protected $fillable = [
       'id', 'name', 'last_name_P', 'last_name_M', 'birthdate', 'phone', 'gender'
    ];
}
