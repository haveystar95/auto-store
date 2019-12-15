<?php


namespace App\Http\Services;


use GuzzleHttp\Client;

class ProductService
{

    private $urlProductOneItem = 'https://maxi.ecat.ua/api/desktop/v1/products/{product_id}/?context=1&entity_id={menu_id}';

    public function getProduct($productId, $menuId)
    {
        $replace = [
            '{menu_id}' => $menuId,
            '{product_id}' => $productId
        ];

        $url = strtr($this->urlProductOneItem, $replace);

        $client = new Client();
        $response = $client->request('GET', $url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'authorization' => 'ApiKey RGL_MAXI:c64e3ad97e6e2e84475f36f1edb9dbf4',
            ]
        ]);

        return $result = json_decode($response->getBody()->getContents(), true);
    }
}