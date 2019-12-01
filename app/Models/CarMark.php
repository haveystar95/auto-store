<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarMark extends Model
{

    protected $fillable = [
        'id',
        'name'
    ];

    public function carModel()
    {
        return $this->hasMany('App\Models\CarModel');
    }
}
