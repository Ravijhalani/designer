<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Zoom;

class ZoomController extends Controller
{
    public function generateMeetingUrl()
    {

        $meeting = Zoom::createMeeting([
            "agenda" => 'Your agenda',
            // Other parameters
        ]);

        $apiKey = env('ZOOM_API_KEY');
        $apiSecret = env('ZOOM_API_SECRET');
        
        $response = Http::post("https://api.zoom.us/v2/users/me/meetings", [
            'topic' => 'Meeting Title',
            'type' => 1, // 1 for instant meeting
        ], [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->generateZoomToken($apiKey, $apiSecret),
            ],
        ]);

        $meeting = $response->json();

        $meetingUrl = $meeting['start_url'];

        return view('frontend.testing', compact('meetingUrl'));
    }

    private function generateZoomToken($apiKey, $apiSecret)
    {
        $response = Http::post("https://zoom.us/oauth/token", [
            'grant_type' => 'authorization_code',
            'client_id' => $apiKey,
            'client_secret' => $apiSecret,
        ]);
        dd($response->json());
        $token = $response->json()['access_token'];

        return $token;
    }
}
