<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Zoom;

class MeetingController extends Controller
{
    public function meeting(Request $request,$meeting_id)
    {
        $meeting_id =  \Illuminate\Support\Facades\Crypt::decryptString($meeting_id);
        $booking = fetch('POST','/conference/'.$meeting_id.'/token',body(['name'=>'','page'=>1,'limit'=>10]));

       if(isset($booking['response_code']) && $booking['response_code']==500){
            abort(500);
        }

        if(isset($booking['response_code']) && $booking['response_code']==400){
            abort(401);
        }
        $booking['web_token'] =  html_entity_decode($booking['web_token']);
        $booking['screen_token'] =  html_entity_decode($booking['screen_token']);
        return view('frontend.meeting',compact('booking'));
    }


}
