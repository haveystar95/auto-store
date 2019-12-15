<?php


namespace App\Http\Services;


use App\Models\BucketProduct;

class BucketService
{

    public function addProductToBucket($bucketKey, $productId, $menuId, $count = 1): bool
    {

        $product = (new ProductService())->getProduct($productId, $menuId);
        $ip = \Request::ip();

        $existProduct = BucketProduct::where('product_id', $productId)->where('menu_id', $menuId)->where('bucket_key',
            $bucketKey)->first();

        if ($existProduct) {
            $existProduct->count = $existProduct->count + 1;
            return $existProduct->save();
        } else {
            $bucketProduct = new BucketProduct();
            $bucketProduct->bucket_key = $bucketKey;
            $bucketProduct->product_id = $productId;
            $bucketProduct->menu_id = $menuId;
            $bucketProduct->count = $count ?? 1;
            $bucketProduct->body = json_encode($product);
            $bucketProduct->ip = $ip;
            $bucketProduct->price = rtrim($product['price'], ' .грн');

            return $bucketProduct->save();
        }


    }

    public function showBucketsByKey(string $bucketKey): array
    {
        /** @var BucketProduct $bucketProducts */
        $bucketProducts = BucketProduct::where('bucket_key', $bucketKey)->get();

        if ($bucketProducts) {
            $bucket = $bucketProducts->toArray();
            $price = 0;
            foreach ($bucket as &$item) {
                $item['body'] = json_decode($item['body'], true);
                $item['total_price'] = $item['count'] * floatval(str_replace(' ', '', $item['price']));
                $price = $price + $item['total_price'];
            }
            return ['meta' => ['total_price' => $price, 'bucket_key' => $bucketKey], 'products' => $bucket];
        }
        return ['meta' => [], 'products' => []];
    }

    public function removeProductFromBucket($bucketKey, $productId)
    {
        return $result = BucketProduct::where('product_id', $productId)->where('bucket_key', $bucketKey)->delete();
    }

    public function changeCountProduct($bucketKey, $productId, $action)
    {
        $existProduct = BucketProduct::where('product_id', $productId)->where('bucket_key', $bucketKey)->first();

        if ($existProduct) {
            if ($action == 'plus') {
                $existProduct->count = $existProduct->count + 1;
            } else {
                $existProduct->count = ($existProduct->count != 1) ? $existProduct->count - 1 : 1;
            }
            return $existProduct->save();
        }
        return false;
    }
}