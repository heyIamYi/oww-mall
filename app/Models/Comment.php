<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;


    //使用的資料庫表單名稱
    protected $table= 'comments';

    //資料表的主key
    protected $primaryKey= 'id';

    //白名單
    protected $fillable=['name','title','content'];

}
