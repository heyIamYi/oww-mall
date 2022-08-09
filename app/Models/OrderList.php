<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\product;


/**
 * @property integer $id
 * @property mixed $created_at
 * @property mixed $updated_at
 * @property integer $product_id
 * @property integer $qty
 * @property integer $price
 * @property integer $order_id
 */
class OrderList extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orderlists';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at', 'product_id', 'qty', 'price', 'order_id'];

    public function order(){
        //belongsTo ->自己對別人
        return $this->belongsTo(Order::class, 'order_id','id');
    }

    public function product(){
        //hasOne    ->別人對自己
        return $this->hasOne(product::class, 'id','product_id');
    }
}
