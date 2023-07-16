<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facebook\Facebook;

class TrackingController extends Controller
{
    public function trackEvent(Request $request, Facebook $facebook)
    {
         // 解析接收到的事件數據並構建 $eventData
         $eventData = [
            'event_name' => 'PageView',
            'event_time' => time(),
            'test_event_code' => [
                'test_event_code' => 'TEST4444',
            ],
        ];

        // 使用 Facebook Business SDK 的 post 方法發送請求
        try {
            $pixelId = config('services.facebook.pixel_id');
            $accessToken = config('services.facebook.access_token');

            // 同時發送到 Pixel 和 Conversions API
            $response = $facebook->post('/' . $pixelId . '/events', $eventData, $accessToken);
            $graphNode = $response->getGraphNode();

            // 在這裡處理成功追蹤事件的邏輯

            return view('/');
        } catch (\Exception $e) {
            // 在這裡處理追蹤事件失敗的邏輯

            return view('/');
        }
    }
}
