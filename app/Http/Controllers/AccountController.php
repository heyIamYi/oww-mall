<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AccountController extends Controller
{

    public function index()
    {
        //將所有Product資料從資料庫拿出來並輸出到列表頁上
        $users = User::get();
        // dd($users->all());
        $slot = '';
        $header='會員管理-列表頁';
        //回去使用者管理頁面
        return view('account.index', compact('users','header','slot'));
    }

    //新增頁面
    public function create()
    {
        $slot = '';
        $header='會員管理-新增頁';

        return view('account.create', compact('header','slot'));
    }

    public function store(Request $request)
    {

        // dd($request->all());
        //laravel預設的防呆裝置 來源為：Controllers\Auth\RegisteredUserController.php
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);


        // 自己製造的Validator防呆裝置

        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);




        // 檢查E-mail是否重複
        $data = User::where('email',$request->email)->first();

        if ($data){
            return redirect ('/account/create')->with('email-repeat','此信箱已被註冊。');
        }

        //檢查兩次密碼是否相同
        if ($request->password != $request->password_confirmed){
            return redirect ('/account/create')->with('password-error','密碼或確認密碼不相同');
        }

        // 檢查是否有錯誤(如果有錯誤顯示為True 沒有錯誤則 False)
        // dd($validator->fails());

        // if($validator->fails()){
        //     return redirect ('/account/create')->with('problem','輸入資訊錯誤請檢查。');
        // }




        $users = User::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'power' => 1,

        ]);


        return redirect('/account');
    }

    //編輯頁面
    public function edit($id)
    {
        $users = User::find($id);



        $slot = '';
        $header='使用者資料更新頁面';

        // dd($product_img);

        return view('account.edit', compact('users','header','slot'));
    }

    public function update(Request $request, $id)
    {
        $users = User::find($id);


        $users->name = $request->name;
        $users->email = $request->email;
        $users->power = $request->power;

        $users->save();

        return redirect('/account');
    }

    public function destroy($id)
    {
        $users = User::find($id);

        $users->delete();

        return redirect('/account');
    }


}
