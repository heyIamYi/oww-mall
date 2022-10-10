<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderManageController extends Controller
{
    //
    public function index()
    {
        $order = Order::get();
        // dd($order);
        $header = '訂單管理';
        $slot = '';
        return view('ordermanage.index', compact('order', 'slot', 'header'));}

    public function edit($id)
    {

        $order = Order::get();
        // dd($order);
        $header = '訂單管理';
        $slot = '';
        return view('ordermanage.check', compact('order', 'slot', 'header', 'id'));

    }

    public function update(Request $request, $id)
    {

        $order = Order::find($id);
        // dd($request->all(),$id,$order);

        $order->status = $request->status;
        $order->save();
        // dd($order->status);

        return redirect('ordermanage/');
    }
}
