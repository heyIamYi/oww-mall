<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomepageController extends Controller
{
    // 首頁的圖片
    public function eightcard()
    {
        //上面三張圖片

        $data1 = DB::table('news')
            ->orderby('id', 'desc')
            ->take(3)
            ->get();

        $eightcardf4 = DB::table('products')
            ->orderby('id', 'desc')
            ->take(4)
            ->get();

        $eightcardb4 = DB::table('products')
            ->orderby('id', 'desc')
            ->skip(4)
            ->take(4)
            ->get();

        $bigstore = DB::table('products')
            ->inRandomOrder()
            ->take(1)
            ->get();


        return view(
            'index',
            compact('eightcardf4', 'eightcardb4', 'bigstore', 'data1')
        );
    }
}
