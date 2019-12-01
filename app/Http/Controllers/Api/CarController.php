<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\CarMark;
use App\Models\CarModel;
use App\Models\ModelConfiguration;
use http\Client\Request;

class CarController extends Controller
{
    public function getCarMark()
    {
        $carModel = CarMark::all();
        return response(json_encode($carModel), 200);
    }

    public function getModelsByCarId(\Illuminate\Http\Request $request)
    {
        $id = $request->input('id');
        $models = CarModel::where('car_mark_id', $id)->get()->toArray();
        return response(json_encode($models), 200);
    }

    public function getConfigurationsByModelId(\Illuminate\Http\Request $request)
    {
        $id = $request->input('id');
        $models = ModelConfiguration::where('car_model_id', $id)->get()->toArray();
        return response(json_encode($models), 200);
    }
}