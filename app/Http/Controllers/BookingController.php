<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class BookingController extends Controller {

    public function __construct(){
        $this->middleware('jwt.check_expiration');
    }

    public function index(Request $request){
        
        $booking = fetch('GET', '/service_booking',body(['name' => '', 'page' => 1, 'limit' => 10]));
        //dd($booking);
        return view('booking.list',compact('booking'));        
    }

    public function booking(Request $request,$service){

        $service = base64_decode($service);

        $booking = fetch('GET', '/profile_service/public/'.$service, body(['name' => '', 'page' => 1, 'limit' => 10]));

        $userInfo = fetch('GET', '/profile/public/'.$booking['user_id'], body(['name' => '', 'page' => 1, 'limit' => 10]));
        //dd($booking,$userInfo);
        return view('booking.index',compact('booking','userInfo'));

    }

    public function bookingStep2(Request $request,$service){
          try {

            \DB::beginTransaction();

            $slotDate = $request->slot_date;

            $dates[] = $slotDate;

            $response = ['slot_dates' => $dates];

            $availableSlots = fetch('POST', "/profile_service/".$service."/available_slots", body($response));
// dd($availableSlots);
            $view = view('booking.step2',compact('availableSlots','slotDate','service'))->render();
            // dd($view);
            \DB::commit();
            return response()->json(['status' => true, 'message' => '','data'=>$view]);
        } catch (\Exception $e) {
            \DB::rollBack();
            return response()->json(['status' => false, 'message' => $e->getMessage()], 400);
        }

    }

    public function stepForms(Request $request){

        $type = $request->type;
        $service = $request->service;
        $view = view('booking.step1',compact('service'))->render();
        return response()->json(['status' => true, 'message' => '','data'=>$view]);


    }

    public function saveBooking(Request $request){

        try {
            $data['service_id'] = (int)$request->service_id;
            $data['slot_date'] = $request->slot_date;
            $data['time_range'] = ['start_time'=>$request->start_time,'end_time'=>$request->end_time];

            $booking = fetch('POST', '/service_booking', body($data));

            if($booking){
                $bookingID = $booking['id'];
                // dd($bookingID);
                $respone = fetch('POST', '/payment/'.$bookingID.'/generate_payment_link', body([]));
                return response()->json(['status'=>true,'message'=>'You make have booking successfully','url'=>$respone['payment_link']]);
            }else{
                return response()->json(['status'=>true,'message'=>'There something is error !']);
            }


        }
        catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()], 200);
        }

    }


}
