<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property mixed $created_at
 * @property mixed $updated_at
 * @property string $img_path
 * @property integer $product_id
 */
class product_img extends Model
{


    protected $table ='product_imgs';
    protected $primary = 'id';
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at', 'img_path', 'product_id'];


    public function product(){
        // $this->hasOne(product::class,'id','product_id');

        $this->belongsTo(product::class,'product_id','id');
    }



}
