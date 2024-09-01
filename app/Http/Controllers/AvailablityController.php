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
        
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $fetch = fetch('GET','/profile_schedule',body([]));
        $data = $this->groupScheduleSlots($fetch['items']);
        return view('frontend.availablity',compact('data'));
    }

    public function groupScheduleSlots($data) {
        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        
        foreach ($data as &$schedule) {
            $groupedSlots = array_fill_keys($daysOfWeek, []);
            foreach ($schedule['schedule_slots'] as $slot) {
                $day = $slot['day_of_week'];
                
                $groupedSlots[ucwords(strtolower($day))][] = [
                    'start_time' => $slot['slot_start_time'],
                    'end_time' => $slot['slot_end_time'],
                    'id' => $schedule['id']
                ];
            }
            
            // Replace the original schedule_slots with the grouped slots
            $schedule['schedules'] = $groupedSlots;
        }
        
        return $data;
    }


        public function groupEditScheduleSlots($data) {
        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        
        
        $groupedSlots = array_fill_keys($daysOfWeek, []);
        foreach ($data['schedule_slots'] as $slot) {
            $day = $slot['day_of_week'];
            
            $groupedSlots[ucwords(strtolower($day))][] = [
                'start_time' => $slot['slot_start_time'],
                'end_time' => $slot['slot_end_time'],
                'id' => $data['id']
            ];
        }
        
        // Replace the original schedule_slots with the grouped slots
        $data['schedules'] = $groupedSlots;
    
        
        return $data;
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

        $response = $client->get(env('API_URL').'/profile_service/'.$service_id, [
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

   public function convertToUTC($time,$currentTimezone) {
        // Parse the time with the provided timezone
        $timeWithTimezone = Carbon::createFromTimeString($time, $currentTimezone);
        
        // Convert the time to UTC
        $utcTime = $timeWithTimezone->setTimezone('UTC');
        
        return $utcTime->toTimeString(); // Returns 'HH:mm:ss' format
    }

    public function formData(Request $request,$id)
    {      
        $output=[];
        $data = fetch('GET','/profile_schedule/'.$id,'');
        $item = $this->groupEditScheduleSlots($data);
        $html = view('sections.schedule_form', compact('item'))->render(); // Load a partial view
        return response()->json($html);
    }


    public function store(Request $request,$id){
        $data = $request->except('_token');

        if(!isset($data['start_time'])){
            return redirect()->back()->withError('Please add a start & end time ');
        }

        if(!isset($data['end_time'])){
            return redirect()->back()->withError('Please add a start & end time ');
        }

        $timeZone = $request->timeZone[$id];
        

        $data['start_time'] = array_filter($data['start_time']);
        $data['end_time'] = array_filter($data['end_time']);
        
        // Construct the final output object
        $output = [
            "schedule_slots" => [],
            // "schedule_name"  => $request->schedule_name[$id],
            "is_primary"=>(isset($request->is_primary[$id]))?true:false,
            "time_zone"=>$timeZone
        ];

        // Construct schedule slots
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        
        $validationTimeZone = false;

        foreach ($days as $day) {
            if (isset($data["start_time"][$day]) && isset($data["end_time"][$day])) {
                foreach ($data["start_time"][$day] as $index => $startTime) {
                    // Only add entries with non-null start_time and end_time
                    if ($startTime !== null && isset($data["end_time"][$day][$index]) && $data["end_time"][$day][$index] !== null) {

                        $convertedStartTime = $this->convertToUTC($startTime,$timeZone);
                        $convertedEndTime = $this->convertToUTC($data["end_time"][$day][$index],$timeZone);

                        if(strtotime($convertedStartTime) < strtotime($convertedEndTime)){
                            $validationTimeZone = true;
                            break;
                        }

                        $output["schedule_slots"][] = [
                            "day_of_week" => strtoupper($day),
                            "time_range" => [
                                "start_time" => $convertedStartTime,
                                "end_time" => $convertedEndTime
                            ]
                        ];
                    }
                }
            }
        }

       try{
        DB::beginTransaction();
       
        if($validationTimeZone){
            return response()->json(['status'=>false,'message'=>'Availablity time issue with timezone']);
        }

       $fetch = fetch('PATCH','/profile_schedule/'.$id,body($output));

        return response()->json(['status'=>true,'message'=>'Availablity update successfully','data'=>$fetch]);
        //return redirect()->back()->withSuccess('Availablity update successfully');
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
    
            $response = $client->patch(env('API_URL').'/profile_service/'.$service_id, [
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

            $output = [
                "schedule_name" => $request->schedule_name,
                "is_primary" => (isset($request->is_primary))?true:false,
                "schedule_slots" => []
            ];
    
            $schedule_name = fetch('POST','/profile_schedule',body($output));
          
            if(isset($schedule_name['schedule_name'])){
               return redirect()->back()->withSuccess('Schedule added successfully');
            }

            if(isset($schedule_name['response_body'])){
               return redirect()->back()->withError($schedule_name['response_body']);
            }
           }
           catch(\Exception $e){

            return response()->json(['status'=>false,'message'=>$e->getMessage()]);
           }
           

    }


    public function schedulesForm(Request $request,$schedule_id){
        

        $days = ['MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY', 'SATURDAY', 'SUNDAY'];
        $data = [];
        $schedulesData = fetch('GET','/profile_schedule',body(['name'=>'','page'=>1,'limit'=>10]));
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


        $schedulesData = fetch('GET','/profile_schedule/'.$schedule_id,body(['name'=>'','page'=>1,'limit'=>10]));
        $html = view('frontend.availablity-forms',compact('schedulesData','schedule_id','slotsForDay','days'))->render();
        return response()->json($html);
    }


}
