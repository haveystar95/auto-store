<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class MenuController extends Controller
{
    private $url = 'https://maxi.ecat.ua/api/desktop/v1/vehicle/treenodes/';


    public function getListById(\Illuminate\Http\Request $request)
    {
        $id = $request->input('id');

        $params = '?vehicle_id=' . $id;

        $client = new Client();
        $response = $client->request('GET', $this->url . $params, [
            'headers' => [
                'Content-Type' => 'application/json',
                'authorization' => 'ApiKey RGL_MAXI:c64e3ad97e6e2e84475f36f1edb9dbf4',
            ]
        ]);
        $result = $response->getBody()->getContents();
        return response($result, 200);


    }
}