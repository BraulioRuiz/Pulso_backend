<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    protected $table = 'users';
    protected $fillable = [
       'id', 'email', 'email_verified_at', 'password', 'id_data', 'remember_token'
    ];

    public function data($id){
        $data = Users::select('name','last_name_P','last_name_M','birthdate','phone','gender')
        ->join('data_user', 'data_user.id', '=', 'users.id_data')
        ->where('data_user.id', '=', $id)
        ->get();
        return $data;
    }
}
