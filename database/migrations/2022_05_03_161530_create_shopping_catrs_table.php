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
        Schema::create('shopping_catrs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('product_id')->comment('商品ID');
            $table->integer('user_id')->comment('使用者ID');
            $table->integer('quantity')->comment('商品數量');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shopping_catrs');
    }
};
