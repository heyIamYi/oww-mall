<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TrackingController extends Controller
{
    public function trackEvent(Request $request)
    {
        dd(231);
        $pixelId = config('app.facebook_pixel_id');
        $accessToken = config('app.facebook_access_token');

        $eventData = [
            'event_name' => 'PageView',
            'event_time' => time(),
            'user_data' => [],
        ];

        $apiUrl = "https://graph.facebook.com/v17.0/{$pixelId}/events";

        $requestData = [
            'data' => [$eventData],
            'access_token' => $accessToken,
        ];

        $response = Http::post($apiUrl, $requestData);
        dd($response);

        if ($response->successful()) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['error' => '追蹤事件發送失敗。'], 500);
        }
    }
}
