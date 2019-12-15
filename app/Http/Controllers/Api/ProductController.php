<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Services\ProductService;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $urlProductList = 'https://maxi.ecat.ua/api/desktop/v1/products/?vehicle_id={ch_id}&treenode_id={menu_id}&include_elitsupplier_list=1&entity_id={ch_id}&context=1&limit={limit}&offset={offset}';

    public function getProductsList(Request $request)
    {

        $data = $request->all();

        $replace = [
            '{ch_id}' => $data['ch_id'],
            '{menu_id}' => $data['menu_id'],
            '{limit}' => $data['limit'],
            '{offset}' => $data['offset']
        ];

        $url = strtr($this->urlProductList, $replace);

        $client = new Client();
        $response = $client->request('GET', $url, [
            'headers' => [
                'Content-Type' => 'application/json',
                'authorization' => 'ApiKey RGL_MAXI:c64e3ad97e6e2e84475f36f1edb9dbf4',
            ]
        ]);
        $result = $response->getBody()->getContents();
        return response($result, 200);

    }

    public function showProduct($productId, $menuId)
    {
        $product = (new ProductService())->getProduct($productId, $menuId);

        return view('product', [
            'product' => $product,
            'searchParams' => ['productId' => $productId, 'menuId' => $menuId]
        ]);
    }
}