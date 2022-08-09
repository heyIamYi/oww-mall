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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // 共計13個項目
            $table->integer('subtotal')->nullable()->comment('商品名稱');
            $table->integer('shipping_fee')->nullable()->comment('運費');
            $table->integer('totla')->nullable()->comment('總計');
            $table->integer('product_qty')->nullable()->comment('品項');
            $table->string('name')->nullable()->comment('姓名');
            $table->string('phone')->nullable()->comment('電話');
            $table->string('eamil')->nullable()->comment('email');
            $table->string('address')->nullable()->comment('地址');
            $table->integer('pay_way')->nullable()->comment('付款方式');
            $table->integer('shipping_way')->nullable()->comment('運送方式');
            $table->string('store_address')->nullable()->comment('取貨超商');
            $table->integer('status')->nullable()->comment('訂單狀態');
            $table->string('ps')->nullable()->comment('訂單備註');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
