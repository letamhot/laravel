<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table='users';
    protected $primaryKey='id';
    protected $fillable = ['name','email','password','remember_token'];
    protected $dates = ['created_at','updated_at'];
}
