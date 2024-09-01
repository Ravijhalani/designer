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

class ServiceController extends Controller{

    public function index(Request $request){
        
        $service = $this->services();

        $client = new Client();

        $data = [];

        $response = $client->get(env('API_URL').'/profile_service', [
            'headers' => [
                'Authorization' => 'Bearer ' . auth()->user()->jwt_token,
                'Content-Type' => 'application/json',
            ]
        ]);
        
        $body = json_decode($response->getBody(),TRUE);

        if(isset($body['response'])) {
            $data = $body['response']['items'];
        }

       
        return view('frontend.service',compact('data','service'));
    }

    public function indexAjax(Request $request){
        
        $data = fetch('GET','/profile_service?service_category='.$request->service_category,body([]));
        if(isset($data['response_body'])){
            return response()->json(['status'=>false,'message'=>$data['response_body']]);
        }
        
        $data = $data['items'];
        $view    = view('service-data',compact('data'))->render();
        return response()->json(['status'=>true,'data'=>$view,'message'=>'']);
    }

    public function create(Request $request):View{
        $service = $this->services();
        $company = fetch('POST','/profile/company_list',body(['name'=>'','page'=>1,'limit'=>10]));
        $company = json_encode(collect($company['items'])->pluck('name')->toArray());
        $scheduling = fetch('GET','/profile_schedule',body(['name'=>'','page'=>1,'limit'=>10]));   
        return view('frontend.service-add',compact('service','company','scheduling'));        
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

        $serviceData = fetch('GET','/profile_service/'.$service_id,body([]));        

        if(isset($serviceData)) {
                // Extracting the 'name' field from the nested array using array_map
                $skillNames = array_map(function($serviceData) {
                    return $serviceData['skill']['name'];
                }, $serviceData['skills']);
                $serviceData['skills'] = implode(',',$skillNames);
        }

        $company = fetch('POST','/profile/company_list',body(['name'=>'','page'=>1,'limit'=>10]));
        $company = json_encode(collect($company['items'])->pluck('name')->toArray());
        
        
        $scheduling = fetch('GET','/profile_schedule',body(['name'=>'','page'=>1,'limit'=>10]));      
        // dd($serviceData['schedule']);
       return view('frontend.service-add',compact('scheduling','company','service_id','service','serviceData'));
    }


    public function store(Request $request){

       try {

            \DB::beginTransaction();

            $skills = [];
            $data = $request->except('_token');
            $data['email'] = auth()->user()->email;
            $data['schedule_id'] = 1;
           
            if(isset($data['skills'])) {

                $jsonString = $data['skills'];
                $indexedArray = json_decode($jsonString, true);
                // Extracting values using array_map
                $values = array_map(function($item) {
                    return $item['value'];
                }, $indexedArray);

                $skills = $values;
            }

            $services = [
                    "service_category"=>$request->service_category,
                    "title"=>$request->title,
                    "description"=>$request->description,
                    "duration"=>$request->duration,
                    "job_location_type"=>$request->jobLocationType,
                    "amount"=>$request->amount,
                    "experience_years"=>$request->experience,
                    "company_name"=>$request->company_name,
                    "designation_name"=>$request->designation_name,
                    "skills"=>$skills,
                    "email"=>auth()->user()->email,
                    "schedule_id"=>$request->schedule_id
                ];

            fetch('POST', '/profile_service', body($services));

            \DB::commit();
            return response()->json(['status' => true, 'message' => 'Services save successfully']);
        } catch (\Exception $e) {
            \DB::rollBack();
            return response()->json(['status' => false, 'message' => $e->getMessage()], 400);
        }

    }



    /**
     * Update the user's profile information.
     */
    public function update(Request $request,$service_id){

        // dd($request->all());
        $exceptArray = ['_token'];

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
        $data['schedule_id'] = $request->schedule_id;
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
        //   dd($structure);
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
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse{


    }


}
