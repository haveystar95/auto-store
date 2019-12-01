<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    protected $fillable = [
        'id',
        'name',
        'vehiclemodel_type_id',
        'year_from',
        'year_to',
        'car_mark_id'
    ];

    public function carMark()
    {
        return $this->belongsTo('App\Models\CarMark');
    }

    public function modelConfiguration()
    {
        return $this->hasMany('App\Models\ModelConfiguration');

    }
}
