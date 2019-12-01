<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelConfiguration extends Model
{
    protected $fillable = [
        'id',
        'axletype',
        'bodytype',
        'ccm',
        'cylinders',
        'drivetype',
        'engines',
        'enginetype',
        'fuelmixturetype',
        'fueltype',
        'gross_weight_tons',
        'homologation_numbers',
        'hp',
        'is_motorbike',
        'ktypnr',
        'kw',
        'name',
        'resource_uri',
        'valves',
        'vehicle_picture',
        'year_from',
        'year_to',
        'car_model_id',
    ];

    public function carModel()
    {
        return $this->belongsTo('App\Models\CarModel');

    }
}
