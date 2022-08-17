<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShoppingCarController extends Controller
{
    //購物網站首頁及購物車頁面
    public function index(){
        return view('index');
    }

    public function checkedout1(){
        return view('checkedout1');
    }

    public function checkedout2(){
        return view('checkedout2');
    }

    public function checkedout3(){
        return view('checkedout3');
    }

    public function checkedout4(){
        return view('checkedout4');
    }

    public function login(){
        return view('login');
    }
}
