<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\product_img;
use App\Models\ShoppingCart;

/**
 * @property integer $id
 * @property mixed $created_at
 * @property mixed $updated_at
 * @property string $name
 * @property integer $price
 * @property integer $quantity
 * @property string $description
 * @property string $img
 */
class product extends Model
{

    protected $table ='products';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = [ 'name', 'price', 'quantity', 'description', 'img'];



    public function imgs(){

        return $this->hasMany(product_img::class,'product_id','id');

    }

    public function shoppingCart(){
        return $this->hasMany(ShoppingCart::class,'Product_id','id');
    }




}
