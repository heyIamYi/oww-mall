<?php

namespace App\Models;

use App\Models\ShoppingCart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'power',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //使用者可以擁有多筆想要的商品
    public function shopping_list()
    {
        return $this->hasMany(ShoppingCart::class, 'user_id', 'id');
    }

    //使用者可擁有多筆訂單
    public function order()
    {
        //訂單(對方) vs 使用者(自己)
        return $this->hasMany(ShoppingCart::class, 'user_id', 'id');
    }
}
