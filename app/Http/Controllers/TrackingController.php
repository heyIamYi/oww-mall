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

        $requestData = '{
            "data": [
                {
                    "event_name": "PageView",
                    "event_time": 1689511490,
                    "action_source": "website",
                    "user_data": {
                        "client_ip_address": "'.$request->ip().'",
                        "client_user_agent": "'.$request->userAgent().'",
                        "country": [
                            null
                        ]
                    }
                }
            ]
        }';

        $response = Http::post($apiUrl, $requestData);

        if ($response->successful()) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['error' => '追蹤事件發送失敗。'], 500);
        }
    }
}
