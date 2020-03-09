<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class producer extends Model
{
    protected $table='producer';
    protected $primaryKey='id';
    protected $fillable = ['name', 'address', 'phone', 'tax_code', 'image'];
}
