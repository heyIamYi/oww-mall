<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Order;
use App\Models\OrderList;
use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShoppingCarController extends Controller
{
    //購物網站首頁及購物車頁面
    public function index()
    {
        $data1 = DB::table('news')
            ->orderby('id', 'desc')
            ->take(3)
            ->get();

        // 將數值 $data1 回傳至view.index的變數 $data 中
        return view('index', compact('data1'));

        // compact也可達到一樣的效果
        // return view('index',compact('data'));
    }

    //登入頁面
    public function login()
    {
        return view('login');
    }

    //購物網站留言板
    public function comment()
    {
        $comments = Comment::orderby('id', 'desc')->get();

        return view('comment.comment', compact('comments'));
    }

    public function save_comment(Request $request)
    {
        Comment::create([
            'title' => $request->title,
            'name' => $request->name,
            'content' => $request->content,
        ]);

        return redirect('/comment');
    }

    public function edit_comment($id)
    {
        $comment = DB::table('comments')->find($id);
        // dd($comment);
        return view('comment.edit', compact('comment'));
    }

    public function update_comment($id, Request $request)
    {
        DB::table('comments')
            ->where('id', $id)
            ->update([
                'title' => $request->title,
                'name' => $request->name,
                'content' => $request->content,
            ]);

        return redirect('/comment');
    }

    public function delete_comment($target)
    {
        $delete = DB::table('comments')
            ->where('id', $target)
            ->delete();

        return redirect('/comment');
    }

    // 新增至購物車頁面

    public function add_cart(Request $request)
    {
        $product = Product::find($request->product_id);
        // dd($request->all(),$product->all());
        // dd($product);

        // 檢查是否有登入
        if (!Auth::check()) {
            $result = [
                'result' => 'error',
                'message' => '尚未登入, 請先登入',
            ];
            return $result;
        }

        //檢查庫存是否足夠
        if ($request->add_qty > $product->quantity) {
            $request = [
                'result' => 'error',
                'message' => '購買數量超過庫存，請聯繫客服',
            ];
            return $result;
        } elseif ($request->add_qty < 1) {
            $result = [
                'result' => 'error',
                'message' => '購買數量異常，請重新確認',
            ];
            return $result;
        }

        ShoppingCart::create([
            'product_id' => $request->product_id,
            'user_id' => Auth::user()->id,
            'quantity' => $request->add_qty,
        ]);

        $result = [
            'result' => 'success',
        ];

        return $result;
    }

    //購物車結帳頁面
    public function checkedout1()
    {
        $product = Product::get();

        $ShoppingCart = ShoppingCart::where('user_id', Auth::user()->id)->get();
        // dd($ShoppingCart);

        // dd($collection);

        $total_price = 0;
        $total_qty = 0;

        foreach ($ShoppingCart as $value) {
            $total_price += $value->quantity * $value->product->price;
        }

        session([
            'total_price' => $total_price,
        ]);

        // dd($total_price,$total_price);

        return view(
            'shopping.checkedout1',
            compact('product', 'ShoppingCart', 'total_price')
        );
    }

    public function checkedout2(Request $request)
    {

        // dd($request->qty,'GGGGG');
        session(['amount' => $request->qty]);

        $total_qty = session()->get('amount');

        $ShoppingCartUser = Auth::id();

        $merch = ShoppingCart::where('user_id', '=', $ShoppingCartUser)->get();
        $total_price = 0;

        // dd($merch);

        foreach ($merch as $key => $goods) {
            // dd($merch,$goods);
            $total_price +=
            $goods->product->price * session()->get('amount')[$key];
        }

        session([
            'total_price' => $total_price,
        ]);

        // dd($total_price);

        return view('shopping.checkedout2', compact('total_price', 'total_qty'));
    }

    public function checkedout3(Request $request)
    {

        $total_qty = session()->get('amount');
        $total_price = session()->get('total_price');
        session(['pay' => $request->pay, 'deliver' => $request->deliver]);

        return view('shopping.checkedout3', compact('total_price', 'total_qty'));
    }

    public function checkedout4(Request $request)
    {
        // dd($request->all());

        $Shoppingcartuser = Auth::id();

        if (session()->get('deliver') == '1') {
            $fee = 150;
        } else {
            $fee = 60;
        }

        $merch = ShoppingCart::where('user_id', '=', $Shoppingcartuser)->get();
        $subtotal = 0;

        // dd($merch);

        foreach ($merch as $key => $goods) {
            // dd($merch,$goods);
            $subtotal +=
            $goods->product->price * session()->get('amount')[$key];
        }

        // dd($subtotal);

        $order = Order::create([
            'subtotal' => $subtotal,
            'shipping_fee' => $fee,
            'total' => $subtotal + $fee,
            'product_qty' => count(session()->get('amount')),
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,

            'pay_way' => session()->get('pay'),
            'shipping_way' => session()->get('deliver'),

            'status' => 1,
            'user_id' => Auth::id(),
        ]);

        // dd($order);

        if (session()->get('deliver') == '1') {
            $order->address =
            $request->code . $request->city . $request->address;
        } else {
            $order->store_address =
            $request->code . $request->city . $request->address;
        }
        $order->save();

        foreach ($merch as $key => $value) {
            // dd($value);
            OrderList::create([
                'product_id' => $value->product->id,
                'qty' => $value->quantity,
                'price' => $value->product->price,
                'order_id' => $order->id,
            ]);
        }

        // dd($order);
        return redirect('/creditcard/' . $order->id);
    }

    public function show_order($id)
    {
        $order = Order::find($id);
        $ShoppingCart = ShoppingCart::where('user_id', Auth::user()->id)->get();
        $total_qty = session()->get('amount');
        $total_price = session()->get('total_price');

        $Dashboard = '訂單成交';

        ShoppingCart::where('user_id', Auth::user()->id)->delete();

        return view(
            'shopping.checkedout4',
            compact('order', 'Dashboard', 'ShoppingCart', 'total_price')
        );
    }

    public function deleteList(Request $request, $id)
    {

        $total_qty = session()->get('amount');
        $total_price = session()->get('total_price');

        $gg = ShoppingCart::find($id)->delete();
        // $gg->save();
        // dd($request->all(), $id, $gg);
        return redirect('shopping.checkedout1', compact('total_price', 'total_qty'));
    }

}
