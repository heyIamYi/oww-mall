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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            //品名
            $table->string('name')->nullable()->comment('商品名稱');
            //價格
            $table->integer('price')->nullable()->comment('商品價格');
            //數量
            $table->integer('quantity')->nullable()->comment('商品數量');
            //介紹
            $table->longText('description')->nullable()->comment('商品名稱');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
