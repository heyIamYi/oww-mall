<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
                'em' => $request->input('email'),
            ],
        ];

        $apiUrl = 'https://graph.facebook.com/v17.0/' . $pixelId . '/events';

        $requestData = [
            'data' => [$eventData],
            'access_token' => $accessToken,
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($requestData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        dd($response);
        if ($httpCode == 200) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['error' => '追蹤事件發送失敗。'], 500);
        }
    }
}
