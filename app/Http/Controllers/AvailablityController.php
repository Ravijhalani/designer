<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\View\View;
use Validator;
use GuzzleHttp\Client;
use DB;

class AvailablityController extends Controller{

    public function index(Request $request){
        
        $days = ['MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY', 'SUNDAY'];

        $client = new Client();

        $data = [];

        $response = $client->get(env('API_URL').'/api/profile_schedule', [
            'headers' => [
                'Authorization' => 'Bearer ' . auth()->user()->jwt_token,
                'Content-Type' => 'application/json',
            ]
        ]);
        
        $body = json_decode($response->getBody(),TRUE);

        if(isset($body['response'])) {
            $data = $body['response']['items'];
        }
        $slotsForDay = [];
        // dd($data);
        // Iterate over the fixed array of days
        foreach ($days as $day) {
            // Check if the API response contains slots for this day
            
            foreach ($data as $schedule) {
                foreach ($schedule['schedule_slots'] as $slot) {
                    if ($slot['day_of_week'] == $day) {
                        $slotsForDay[$day][] = [
                            'start_time' => $slot['slot_start_time'],
                            'end_time' => $slot['slot_end_time'],
                            'id'=>$schedule['id']
                        ];
                    }
                }
            }
        }

        
       
        return view('frontend.availablity',compact('days','slotsForDay','data'));
    }

    public function create(Request $request):View{
        $service = $this->services();

        

        return view('frontend.service-add',compact('service'));        
    }
    
    public function services(){
        return  [
            [
                'id' => 1,
                'title' => 'Job & Referal',
                'code' => 'JOB_REFERRAL',
                'description'=>'Lorem Ipsum Job & Referal'
            ],
            [
                'id' => 2,
                'title' => 'Job position Guide',
                'code' => 'JOB_POSITION_GUIDANCE',
                'description'=>'Lorem Ipsum Job position Guide'
            ],
            [
                'id' => 3,
                'title' => 'Technical Experts',
                'code' => 'TECH_EXPERT',
                'description'=>'Lorem Ipsum Technical Experts'
            ],
            [
                'id' => 4,
                'title' => 'Career Guide',
                'code' => 'CAREER_GUIDANCE',
                'description'=>'Lorem Ipsum Career Guide'
            ],
            [
                'id' => 5,
                'title' => 'Resume Review',
                'code' => 'RESUME_REVIEW',
                'description'=>'Lorem Ipsum Resume Review'
            ],
            [
                'id' => 6,
                'title' => 'Mock Interview',
                'code' => 'MOCK_INTERVIEW',
                'description'=>'Lorem Ipsum Mock Interview'
            ],
        ];
    }
   
    public function edit(Request $request,$service_id): View{
        $service = $this->services();

        $client = new Client();

        $data = [];

        $response = $client->get(env('API_URL').'/api/profile_service/'.$service_id, [
            'headers' => [
                'Authorization' => 'Bearer ' . auth()->user()->jwt_token,
                'Content-Type' => 'application/json',
            ]
        ]);
        
        $body = json_decode($response->getBody(),TRUE);

        if(isset($body['response'])) {
            $data = $body['response'];

            // Extracting the 'name' field from the nested array using array_map
            $skillNames = array_map(function($data) {
                return $data['skill']['name'];
            }, $data['skills']);

      
            $data['skills'] = implode(',',$skillNames);

        }
      
       return view('frontend.service-add',compact('service_id','service','data'));
    }


    public function store(Request $request,$id){
        
        $data = $request->except('_token');
        $data['start_time'] = array_filter($data['start_time']);
        $data['end_time'] = array_filter($data['end_time']);
        
        // Construct the final output object
        $output = [
            "schedule_slots" => []
        ];

        // Construct schedule slots
        foreach ($data["days"] as $day) {
            if (isset($data["start_time"][$day]) && isset($data["end_time"][$day])) {
                foreach ($data["start_time"][$day] as $index => $startTime) {
                    // Only add entries with non-null start_time and end_time
                    if ($startTime !== null && isset($data["end_time"][$day][$index]) && $data["end_time"][$day][$index] !== null) {
                        $output["schedule_slots"][] = [
                            "day_of_week" => $day,
                            "time_range" => [
                                "start_time" => $startTime,
                                "end_time" => $data["end_time"][$day][$index]
                            ]
                        ];
                    }
                }
            }
        }

       try{
        DB::beginTransaction();
        // $client = new Client();
        
        // dd(body($output));
        $fetch = fetch('PATCH','/api/profile_schedule/'.$id,body($output));

        // $response = $client->patch(env('API_URL').'/api/profile_schedule', [
        //     'headers' => [
        //         'Authorization' => 'Bearer ' . auth()->user()->jwt_token,
        //         'Content-Type' => 'application/json',
        //     ],
        //     'json' => $output,
        // ]);

        // $body = json_decode($response->getBody());
            // dd($fetch);


        // if(isset($body->response)){
        //     DB::commit();
        //     return response()->json(['status'=>true,'message'=>'Availablity added successfully']);
        // }

        return redirect()->back()->withSuccess('Availablity update successfully');
       }
       catch(\Exception $e){
        DB::rollback();
        return response()->json(['status'=>false,'message'=>$e->getMessage()]);
       }
    }



    /**
     * Update the user's profile information.
     */
    public function update(Request $request,$service_id){

        // dd($request->all());
        $exceptArray = ['_token','skills'];

        switch ($request->service_category) {
            case 'TECH_EXPERT':
                $exceptArray[] = 'job_location_type';
                $exceptArray[] = 'service_category';
                break;
            
            case 'MOCK_INTERVIEW':
                $exceptArray[] = 'job_location_type';
                break;

            default:
                # code...
                break;
        }

        $data = $request->except($exceptArray);
        $data['email'] = auth()->user()->email;
        $data['schedule_id'] = 6;
        if(isset($data['skills'])) {

            $jsonString = $data['skills'];
            $indexedArray = json_decode($jsonString, true);
            // Extracting values using array_map
            $values = array_map(function($item) {
                return $item['value'];
            }, $indexedArray);

            $data['skills'] = $values;
        }

        $structure = ["data" => $data];
        //  dd($structure);
        try{
            DB::beginTransaction();
            $client = new Client();
    
            $response = $client->patch(env('API_URL').'/api/profile_service/'.$service_id, [
                'headers' => [
                    'Authorization' => 'Bearer ' . auth()->user()->jwt_token,
                    'Content-Type' => 'application/json',
                ],
                'json' => $structure,
            ]);
    
            $body = json_decode($response->getBody());
            if(isset($body->response)){
                DB::commit();
    
                return response()->json(['status'=>true,'message'=>'Service updated successfully']);
            }
           }
           catch(\Exception $e){
            DB::rollback();
            return response()->json(['status'=>false,'message'=>$e->getMessage()]);
           }

       dd($request->all());
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse{


    }

    public function saveSchedules(Request $request){

        try{
            DB::beginTransaction();
            // $client = new Client();

            $output = [
                "schedule_name" => $request->schedule_name,
                "is_primary" => (isset($request->is_primary))?true:false,
                "schedule_slots" => []
            ];
    
            // $response = $client->post(env('API_URL').'/api/profile_schedule', [
            //     'headers' => [
            //         'Authorization' => 'Bearer ' . auth()->user()->jwt_token,
            //         'Content-Type' => 'application/json',
            //     ],
            //     'json' => $output,
            // ]);
    
            // $body = json_decode($response->getBody());


            // dd(body($output));
            $schools = fetch('POST','/api/profile_schedule',body($output));

           
            if(isset($body->response)){
                DB::commit();
                return response()->json(['status'=>true,'message'=>'Schedule added successfully']);
            }
           }
           catch(\Exception $e){
            DB::rollback();
            return response()->json(['status'=>false,'message'=>$e->getMessage()]);
           }
           

    }


    public function schedulesForm(Request $request,$schedule_id){
        

        $days = ['MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY', 'SUNDAY'];
        $data = [];
        $schedulesData = fetch('GET','/api/profile_schedule',body(['name'=>'','page'=>1,'limit'=>10]));
        $slotsForDay = [];
        // Iterate over the fixed array of days
        foreach ($days as $day) {
            // Check if the API response contains slots for this day
            
            foreach ($data as $schedule) {
                foreach ($schedule['schedule_slots'] as $slot) {
                    if ($slot['day_of_week'] == $day) {
                        $slotsForDay[$day][] = [
                            'start_time' => $slot['slot_start_time'],
                            'end_time' => $slot['slot_end_time'],
                            'id'=>$schedule['id']
                        ];
                    }
                }
            }
        }


        $schedulesData = fetch('GET','/api/profile_schedule/'.$schedule_id,body(['name'=>'','page'=>1,'limit'=>10]));
        $html = view('frontend.availablity-forms',compact('schedulesData','schedule_id','slotsForDay','days'))->render();
        return response()->json($html);
    }


}
