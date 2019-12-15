<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\CarMark;
use App\Models\CarModel;
use App\Models\ModelConfiguration;
use GuzzleHttp\Client;
use http\Client\Request;

class CarController extends Controller
{
    private $url = 'https://maxi.ecat.ua/api/desktop/v1/vehicles/{id}/';

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

    public function setCar(\Illuminate\Http\Request $request)
    {
        $id = $request->input('id');
        $replace = ['{id}' => $id];
        $url = strtr($this->url, $replace);


        $client = new Client();
        $response = $client->request('GET', $url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'authorization' => 'ApiKey RGL_MAXI:c64e3ad97e6e2e84475f36f1edb9dbf4',
            ]
        ]);

        $request->session()->put('car', $response);
        $result = $response->getBody()->getContents();
        return response($result, 200);

    }
}