<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'type';
    protected $primaryKey = 'id';
    // protected $fillable = ['name', 'image'];
    public $timestamps = false;
    public function product()
    {
        return $this->hasMany('App\Product');
    }

}
