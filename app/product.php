<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    public function producer()
    {
        return $this->belongsTo('App\Producer');
    }
}