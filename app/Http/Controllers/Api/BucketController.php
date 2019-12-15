<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Services\BucketService;
use App\Models\BucketProduct;
use Illuminate\Http\Request;

class BucketController extends Controller
{
    public function addProductToBucket(Request $request)
    {
        try {
            $bucketKey = $request->input('bucketKey');
            $productId = $request->input('product_id');
            $menuId = $request->input('menu_id');
            $count = $request->input('count');
        } catch (\Exception $exception) {
            return response("Invalid data", 403);
        }

        $bucketService = new BucketService();
        $result = $bucketService->addProductToBucket($bucketKey, $productId, $menuId, $count);
        if ($result) {
            return response($bucketService->showBucketsByKey($bucketKey));
        } else {
            return response('Error add to bucket', 500);
        }
    }

    public function getBucketByKey(Request $request)
    {
        try {
            $bucketKey = $request->input('bucketKey');
        } catch (\Exception $exception) {
            return response("Invalid data", 403);
        }
        $bucketService = new BucketService();
        return response($bucketService->showBucketsByKey($bucketKey));

    }

    public function removeBucketItem(Request $request)
    {
        $bucketKey = $request->input('bucketKey');
        $productId = $request->input('product_id');
        $bucketService = new BucketService();
        $result = $bucketService->removeProductFromBucket($bucketKey, $productId);
        return response($bucketService->showBucketsByKey($bucketKey));
    }

    public function changeCountProduct(Request $request)
    {
        $bucketKey = $request->input('bucketKey');
        $productId = $request->input('product_id');
        $action = $request->input('action');
        $bucketService = new BucketService();
        $result = $bucketService->changeCountProduct($bucketKey, $productId, $action);
        return response($bucketService->showBucketsByKey($bucketKey));
    }
}