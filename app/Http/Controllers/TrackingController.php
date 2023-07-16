<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facebook\Facebook;

class TrackingController extends Controller
{

    protected $facebook;

    public function __construct(Facebook $facebook)
    {
        $this->facebook = $facebook;
    }


    public function trackEvent()
    {
        $pixelId = config('services.facebook.pixel_id');
        $accessToken = config('services.facebook.access_token');

        $eventData = [
            'event_name' => 'PageView',
            'event_time' => time(),
            'user_data' => [
                'em' => 'user@example.com',
            ],
        ];

        try {
            $response = $this->facebook->post('/' . $pixelId . '/events', $eventData, $accessToken);
            $graphNode = $response->getGraphNode();

            // 在這裡處理成功追蹤事件的邏輯

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            // 在這裡處理追蹤事件失敗的邏輯

            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
