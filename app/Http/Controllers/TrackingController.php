<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TrackingController extends Controller
{
    public function trackEvent(Request $request)
    {
        $pixelId = config('services.facebook.pixel_id');
        $accessToken = config('services.facebook.access_token');

        $apiUrl = "https://graph.facebook.com/v17.0/".$pixelId."/events?access_token=".$accessToken;

        $response = Http::post($apiUrl, [
            'data' => [
                [
                    'event_name' => 'ViewContent',
                    'event_time' => time(),
                    'user_data' => [
                        'email' => hash('sha256', 'email@example.com'),
                    ],
                    'custom_data' => [
                        'content_name' => 'Product name',
                        'content_category' => 'Product category',
                        'content_ids' => ['1234'],
                        'content_type' => 'product',
                        'value' => '123.45',
                        'currency' => 'usd',
                    ],
                ],
            ],
        ]);

        if ($response->successful()) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['error' => '追蹤事件發送失敗。'], 500);
        }
    }
}
