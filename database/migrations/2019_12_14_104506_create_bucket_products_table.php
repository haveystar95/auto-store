<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBucketProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bucket_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bucket_key');
            $table->integer('user_id')->nullable();
            $table->integer('menu_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->integer('count')->default(1);
            $table->string('price')->nullable();
            $table->text('body')->nullable();
            $table->timestamp('expire_date')->default(\Carbon\Carbon::now()->addDay());
            $table->string('params')->nullable();
            $table->string('ip')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bucket_products');
    }
}
