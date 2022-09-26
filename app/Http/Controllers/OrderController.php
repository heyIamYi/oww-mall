<?php

namespace App\Http\Controllers;

use Ecpay\Sdk\Factories\Factory;
use Ecpay\Sdk\Services\UrlService;
use EcpaySDK\ECPay_PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;
use App\Models\Order;
use App\Models\OrderList;
use App\Models\product;
use App\Models\ShoppingCart;
use App\Models\User;



class OrderController extends Controller
{
    //
    public function creditcard()
    {

        //未知東西
        // require __DIR__ . '/../../vendor/autoload.php';


        // 測試
        // $desc =  UrlService::ecpayUrlEncode('交易描述範例');
        // dd($desc);


        // 先取得購物車資料,在取得購物車的產品資訊


        // dd($merch);

        $factory = new Factory([
            'hashKey' => '5294y06JbISpM5x9',
            'hashIv' => 'v77hoKGq4kWxNNIS',
        ]);
        $autoSubmitFormService = $factory->create('AutoSubmitFormWithCmvService');

        $input = [
            'MerchantID' => '2000132',
            'MerchantTradeNo' => 'Test' . time(),
            'MerchantTradeDate' => date('Y/m/d H:i:s'),
            'PaymentType' => 'aio',
            'TotalAmount' => $total_price,
            'TradeDesc' => UrlService::ecpayUrlEncode('交易描述範例'),
            // 用#字號可以換行
            'ItemName' => '',
            'ChoosePayment' => 'Credit',
            'EncryptType' => 1,

            // 請參考 example/Payment/GetCheckoutResponse.php 範例開發
            'ReturnURL' => 'https://www.ecpay.com.tw/example/receive',
        ];
        $action = 'https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5';

        echo $autoSubmitFormService->generate($input, $action);

    }
}

