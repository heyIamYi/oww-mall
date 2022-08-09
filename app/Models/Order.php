<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderList;


/**
 * @property integer $id
 * @property mixed $created_at
 * @property mixed $updated_at
 * @property integer $subtotal
 * @property integer $shipping_fee
 * @property integer $total
 * @property integer $product_qty
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property integer $pay_way
 * @property integer $shipping_way
 * @property string $store_address
 * @property integer $status
 * @property string $ps
 */
class Order extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at', 'subtotal', 'shipping_fee', 'total', 'product_qty', 'name', 'phone', 'email', 'address', 'pay_way', 'shipping_way', 'store_address', 'status', 'ps'];


    public function detail(){
        // 別人vs自己 訂單清單的名稱 要上 某筆訂單的ID
        return $this->hasMany(OrderList::class,'order_id','id');
    }
}
