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

        $eventData = [
            'event_name' => 'PageView',
            'event_time' => time(),
            'user_data' => [
                'client_ip_address' => $request->ip(),
                'client_user_agent' => $request->userAgent(),
            ],
            'test_event_code' => 'TEST4444'
        ];

        $apiUrl = "https://graph.facebook.com/v17.0/".$pixelId."/events";

        $requestData = [
            'data' => [$eventData],
            'access_token' => $accessToken,
        ];

        $response = Http::post($apiUrl, $requestData);

        if ($response->successful()) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['error' => '追蹤事件發送失敗。'], 500);
        }
    }
}
