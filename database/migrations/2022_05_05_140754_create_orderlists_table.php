<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderlists', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            //商品編號 流水號 商品名稱 商品數量
            $table->integer('product_id')->comment('商品ID');
            $table->integer('qty')->comment('購買商品數量');
            $table->integer('price')->comment('購買商品價格');
            $table->integer('order_id')->comment('訂單ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderlists');
    }
};
