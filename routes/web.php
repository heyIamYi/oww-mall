<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShoppingCarController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\OrderManageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/a', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth'])
    ->name('dashboard');

require __DIR__ . '/auth.php';

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//購物網站首頁
Route::get('/', [ShoppingCarController::class, 'index']);

//購物車第一頁
Route::get('/checkedout1', [ShoppingCarController::class, 'checkedout1']);

//購物車第二頁
Route::post('/checkedout2', [ShoppingCarController::class, 'checkedout2']);

//購物車第三頁
Route::post('/checkedout3', [ShoppingCarController::class, 'checkedout3']);

//購物車第四頁
Route::post('/checkedout4', [ShoppingCarController::class, 'checkedout4']);

//導覽頁面
Route::get('/show_order/{id}', [ShoppingCarController::class, 'show_order']);

//購物車留言板
//群組化

Route::prefix('/comment')->group(function () {
    Route::get('/', [ShoppingCarController::class, 'comment']); //首頁
    Route::get('/save', [ShoppingCarController::class, 'save_comment']); //儲存
    Route::get('/edit/{target}', [
        ShoppingCarController::class,
        'edit_comment',
    ]); //編輯
    Route::get('/{target}', [ShoppingCarController::class, 'update_comment']); //更新
    Route::get('/delete/{target}', [
        ShoppingCarController::class,
        'delete_comment',
    ]); //刪除
});

//使用者管理頁面
//群組化

Route::prefix('/account')
    ->middleware(['auth', 'power'])
    ->group(function () {
        Route::get('/', [AccountController::class, 'index']);
        Route::get('/create', [AccountController::class, 'create']);
        Route::post('/store', [AccountController::class, 'store']);
        Route::get('/edit/{id}', [AccountController::class, 'edit']);
        Route::post('/update/{id}', [AccountController::class, 'update']);
        Route::post('/delete/{id}', [AccountController::class, 'destroy']);
    });

//BANNER頁面
//群組化

Route::prefix('/banner')
    ->middleware(['auth', 'power'])
    ->group(function () {
        Route::get('/', [BannerController::class, 'index']);
        Route::get('/create', [BannerController::class, 'create']);
        Route::post('/store', [BannerController::class, 'store']);
        Route::get('/edit/{id}', [BannerController::class, 'edit']);
        Route::post('/update/{id}', [BannerController::class, 'update']);
        Route::post('/delete/{id}', [BannerController::class, 'destroy']);
    });

//商品頁面
//群組化

Route::prefix('/product')
    ->middleware(['auth', 'power'])
    ->group(function () {
        Route::get('/', [ProductController::class, 'index']);
        Route::get('/create', [ProductController::class, 'create']);
        Route::post('/store', [ProductController::class, 'store']);
        Route::get('/edit/{id}', [ProductController::class, 'edit']);
        Route::post('/update/{id}', [ProductController::class, 'update']);
        Route::post('/delete/{id}', [ProductController::class, 'destroy']);
        Route::delete('/delete_img/{img_id}', [
            ProductController::class,
            'delete_img',
        ]);
    });

// 商品回傳首頁
Route::get('/', [HomepageController::class, 'eightcard']);

// // 將商品加入購物車
// Route::post('/ShoppingCart', [ShoppingCarController::class, 'add_carts']);

//商品詳情
Route::get('/product/productinfo/{id}', [
    ProductController::class,
    'productinfo',
]);

Route::post('/add_to_cart', [ShoppingCarController::class, 'add_cart']);

//購物車訂單

Route::prefix('/ordermanage')->group(function () {
    Route::get('/', [OrderManageController::class, 'index']);
    Route::get('/edit/{id}', [OrderManageController::class, 'edit']);
    Route::post('/update/{id}', [OrderManageController::class, 'update']);
});


// 刪除按鈕
Route::post('/deleteList/{id}',[ShoppingCarController::class, 'deleteList']);

