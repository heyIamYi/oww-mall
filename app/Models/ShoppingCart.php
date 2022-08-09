<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\product;
use App\Models\User;

/**
 * @property integer $id
 * @property mixed $created_at
 * @property mixed $updated_at
 * @property integer $product_id
 * @property integer $user_id
 * @property integer $quantity
 */
class ShoppingCart extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shopping_catrs';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at', 'product_id', 'user_id', 'quantity'];

    public function product(){
        return $this->hasOne(product::class,'id','product_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
