<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BucketProduct extends Model
{
    protected $fillable = [
        'id',
        'bucket_key',
        'user_id',
        'menu_id',
        'product_id',
        'count',
        'price',
        'body',
        'expire_date',
        'params',
        'ip',
        'created_at',
        'updated_at',
    ];
}
