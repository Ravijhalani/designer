<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Validator;
use App\Models\User;
use App\Models\ProfileEducation;
use App\Models\ProfileExperience;
use App\Models\Schools;
use App\Models\SchoolsDegree;
use App\Models\StudyFields;
use Carbon\Carbon;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\Company;
use App\Models\Industry;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function refreshToken(Request $request)
    {
        try {
            $user = auth()->user();
            $userData = new \StdClass();
            $userData->user_id = (string) $user->id;

            $payload = JWTFactory::sub($user->id)->data($userData)->make();
            $token = JWTAuth::encode($payload);
            $user->jwt_token = $token->get();
            $user->save();
            return response()->json(['status' => true, 'message' => 'Token update successfully']);
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()]);
        } catch (\Exception $e) {
            return response()->json(['status' => true, 'message' => $e->getMessage()]);
        }
    }

    public function index(Request $request)
    {

        // dd(auth()->user());
        $profileEducation = fetch('GET', '/profile/education', body(['name' => '', 'page' => 1, 'limit' => 10]));



        // $profileExperience = fetch('GET','/profile/experience',body(['name'=>'','page'=>1,'limit'=>10]));

        // $schools = fetch('POST','/profile/school_list',body(['name'=>'','page'=>1,'limit'=>10]));
        // $schools_degree = fetch('POST','/profile/school_degree_list',body(['name'=>'','page'=>1,'limit'=>10]));
        // $schools_fields = fetch('POST','/profile/field_of_study_list',body(['name'=>'','page'=>1,'limit'=>10]));
        // $company = fetch('POST','/profile/company_list',body(['name'=>'','page'=>1,'limit'=>10]));
        // $industry = fetch('POST','/profile/industry_list',body(['name'=>'','page'=>1,'limit'=>10]));
        // $schools =        json_encode(collect($schools['items'])->pluck('name')->toArray());
        // $schools_degree = json_encode(collect($schools_degree['items'])->pluck('name')->toArray());
        // $schools_fields = json_encode(collect($schools_fields['items'])->pluck('name')->toArray());
        // $company = json_encode(collect($company['items'])->pluck('name')->toArray());
        // $industry = json_encode(collect($industry['items'])->pluck('name')->toArray());

        return view('frontend.dashboard');
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request, $id)
    {

        $profileEducation = fetch('GET', '/profile/education', body(['name' => '', 'page' => 1, 'limit' => 10]));

        $result = array_filter($profileEducation['educations'], function ($item) use ($id) {
            return $item['id'] == $id;
        });

        $result = reset($result);

        // dd(reset($result));

        $view = view('frontend.partials.education-form', compact('result'))->render();

        return response()->json($view);
    }

    /**
     * Display the user's profile form.
     */
    public function experienceEdit(Request $request, $id)
    {

        $profileExperience = fetch('GET', '/profile/experience', body(['name' => '', 'page' => 1, 'limit' => 10]));

        $result = array_filter($profileExperience['experiences'], function ($item) use ($id) {
            return $item['id'] == $id;
        });

        $result = reset($result);

        // dd(reset($result));

        $view = view('frontend.partials.professional-form', compact('result'))->render();

        return response()->json($view);
    }


    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $data = $request->except('mobile', '_token');
        $validator = Validator::make($data, [
            'first_name' => 'required',
            'last_name' => 'required',
            'job_place' => 'required',
            'desigation' => 'required|max:2000',
            'experiences' => 'required',
            'qualification' => 'required',
            'language' => 'required',
            'email' => 'required|email|unique:users,email,' . auth()->user()->id,
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

        if(!empty($request->language)){
            $data['language'] = implode(',',$request->language);
        }
        
        $user = Auth()->user();
        
        if($user->current_profile_fill_step==0){
            $data['current_profile_fill_step'] = 1;
         }

        

        $user = User::find(Auth()->user()->id);
        $user->update($data);
        return response()->json(['status' => true, 'title' => 'Profile', 'message' => 'Your profile update successfully']);
    }

    public function educationUpdate(Request $request, $id)
    {

        $data = $request->except('mobile', '_token');
        $validator = Validator::make($data, [
            'degree_name' => 'required|string',
            'school_name' => 'required|string',
            'field_of_study' => 'required|string',
            'grade' => 'required|string',
            'start_date' => 'required',
            'end_date' => 'required'
        ], [
            'degree_name.required' => 'Please enter a degree name',
            'grade.required' => 'Please select a grade',
            'field_of_study.required' => 'Please enter a field of study',
            'start_date.required' => 'Please enter a start date ',
            'end_date.required' => 'Please enter a end date ',
        ]);


        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'isValidationError' => true
            ]);
        }

        try {

            \DB::beginTransaction();

            $educations[] =[
                    'id' => (int)$id,
                    'grade' => $request->input('grade'),
                    'school_name' => $request->input('school_name'),
                    'degree_name' => $request->input('degree_name'),
                    'field_of_study' => $request->input('field_of_study'),
                   'start_date' => date('Y-m-d', strtotime($request->input('start_date'))),
                    'end_date' => date('Y-m-d', strtotime($request->input('end_date'))),
                    'description' => $request->input('description')
                ];

            $response = ['educations' => $educations];

            $schools = fetch('PATCH', '/profile/education', body($response));

            \DB::commit();
            return response()->json(['status' => true, 'message' => 'Education save successfully']);
        } catch (\Exception $e) {
            \DB::rollBack();
            return response()->json(['status' => false, 'message' => $e->getMessage()], 400);
        }

    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function profileEducation(Request $request){

       $data = $request->except('mobile','_token');

       $validator = Validator::make($request->all(), [
            'degree_name' => 'required|string',
            'school_name' => 'required|string',
            'field_of_study' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date.*',
            'description' => 'nullable|string',
            'grade' => 'required|string'
        ]);

        if ($validator->fails())
        {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'isValidationError' =>true
            ]);
        }

        try{

            \DB::beginTransaction();

            $educations[] = [
                    'grade' => $request->input('grade'),
                    'school_name' => $request->input('school_name'),
                    'degree_name' => $request->input('degree_name'),
                    'field_of_study' => $request->input('field_of_study'),
                    'start_date' => date('Y-m-d', strtotime($request->input('start_date'))),
                    'end_date' => date('Y-m-d', strtotime($request->input('end_date'))),
                    'description' => $request->input('description')
                ];

            $response = ['educations' => $educations];
            // dd(body($response));
            $schools = fetch('POST','/profile/education',body($response));
            
            
            $user = Auth()->user();
            if($user->current_profile_fill_step==1){
                $user->current_profile_fill_step = 2;
            }
            $user->save();


            \DB::commit();
            return response()->json(['status'=>true,'message'=>'Education save successfully']);
        }
        catch(\Exception $e) {
            \DB::rollBack();
            return response()->json(['status'=>false,'message'=>$e->getMessage()],400);
        }


    }



    public function fetch($endPoint, $method, $body)
    {

        $client = new Client();

        $data = [];

        $headers = [
            'Authorization' => 'Bearer ' . auth()->user()->jwt_token,
            'Content-Type' => 'application/json',
        ];

        // Make the POST request using Guzzle
        $response = $client->request($method, env('API_URL') . $endPoint, [
            'headers' => $headers,
            'body' => $body
        ]);

        // Get the response body
        $responseBody = $response->getBody()->getContents();

        // Decode the JSON response
        $responseArray = json_decode($responseBody, true);
        // dd($responseArray);
        // Print the response array
        return (count($responseArray['response']) > 0) ? $responseArray['response'] : [];

    }

    public function profileExperience(Request $request)
    {

        $data = $request->except('_token');
        $validator = Validator::make($data, [
            'designation_name' => 'required|string',
            'employment_type' => 'required|string',
            'company_name' => 'required|string',
            'company_type' => 'required|string',

            'location_type' => 'required|string',
            'industry_name' => 'required|string',
            'description' => 'required|string',


            'start_date' => 'required', // Date format validation
            'end_date' => 'required', // Date format validation
        ], [
            'designation_name.required' => 'Please enter a designation_name name',
            'company_type.required' => 'Please select a company_name',
            'company_name.required' => 'Please enter a company_name',
            'start_date.required' => 'Please enter a start date ',
            'end_date.required' => 'Please enter a end date ',

            'start_date.date_format' => 'Please enter a valid format of start date ',
            'end_date.date_format' => 'Please enter a valid format of end date ',


            'location_type.required' => 'Please enter a location_type ',
            'industry_name.required' => 'Please enter a industry_name ',
            'description.required' => 'Please enter a description ',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'isValidationError' => true
            ]);
        }

        try {
            \DB::beginTransaction();

            $experience[] = [
                'designation_name' => $request->input('designation_name'),
                'employment_type' => $request->input('employment_type'),
                'company' => [
                    'name' => $request->input('company_name'),
                    'type' => $request->input('company_type')
                ],
                'skills'=>['python','java'],
                'industry_name' => $request->input('industry_name'),
                'location_type' => $request->input('location_type'),
                'currently_working' => $request->filled('currently_working'),
                'skills' => collect(json_decode($request->input('skills')))->pluck('value')->toArray(),
                'start_date' => date('Y-m-d', strtotime($request->input('start_date'))),
                'end_date' => date('Y-m-d', strtotime($request->input('end_date'))),
                'description' => $request->input('description')
            ];

            $response = ['experiences' => $experience];
              //dd(body($response));
            $schools = fetch('POST', '/profile/experience', body($response));

            \DB::commit();
            return response()->json(['status' => true, 'message' => 'Experience saved successfully']);
        } catch (\Exception $e) {
            \DB::rollBack();
            return response()->json(['status' => false, 'message' => $e->getMessage()], 400);
        }


    }


    public function ExperienceUpdate(Request $request, $id)
    {

        $data = $request->except('_token');
        $validator = Validator::make($data, [
            'designation_name' => 'required|string',
            'employment_type' => 'required|string',
            'company_name' => 'required|string',
            'company_type' => 'required|string',
            'location_type' => 'required|string',
            'industry_name' => 'required|string',
            'description' => 'required|string',
            'start_date' => 'required', // Date format validation
            'end_date' => 'required', // Date format validation
        ], [
            'designation_name.required' => 'Please enter a designation_name name',
            'company_type.required' => 'Please select a company_name',
            'company_name.required' => 'Please enter a company_name',
            'start_date.required' => 'Please enter a start date ',
            'end_date.required' => 'Please enter a end date ',
            'start_date.date_format' => 'Please enter a valid format of start date ',
            'end_date.date_format' => 'Please enter a valid format of end date ',
            'location_type.required' => 'Please enter a location_type ',
            'industry_name.required' => 'Please enter a industry_name ',
            'description.required' => 'Please enter a description ',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'isValidationError' => true
            ]);
        }

        try {

            \DB::beginTransaction();

            $experiences[] = [
                    'id' => $id,
                    'designation_name' => $request->designation_name,
                    'employment_type' => $request->input('employment_type'),
                    'company' => [
                        'name' => $request->input('company_name'),
                        'type' => $request->input('company_type')
                    ],
                    'industry_name' => $request->input('industry_name'),
                    'location_type' => $request->input('location_type'),
                    'currently_working' => (isset($request->currently_working)) ? $request->currently_working : false,
                    'skills' => collect(json_decode($request->input('skills')))->pluck('value')->toArray(),
                    'start_date' => date('Y-m-d', strtotime($request->input('start_date'))),
                    'end_date' => date('Y-m-d', strtotime($request->input('end_date'))),
                    'description' => $request->input('description')
                ];

            $response = ['experiences' => $experiences];

            $schools = fetch('PATCH', '/profile/experience', body($response));
            \DB::commit();
            return response()->json(['status' => true, 'message' => 'Experience save successfully']);
        } catch (\Exception $e) {
            \DB::rollBack();
            return response()->json(['status' => false, 'message' => $e->getMessage()], 400);
        }

    }
    public function deleteEducation(Request $request, $id)
    {

        try {

            \DB::beginTransaction();



            $response = ['ids' => [(int) $id]];

            $schools = fetch("delete", '/profile/education', body($response));

            \DB::commit();
            return response()->json(['status' => true, 'message' => 'Education deleted successfully']);
        } catch (\Exception $e) {
            \DB::rollBack();
            return response()->json(['status' => false, 'message' => $e->getMessage()], 400);
        }
    }


    public function deleteExperience(Request $request, $id)
    {

        try {

            \DB::beginTransaction();



            $response = ['ids' => [(int) $id]];

            $schools = fetch("delete", '/profile/experience', body($response));

            \DB::commit();
            return response()->json(['status' => true, 'message' => 'Experience deleted successfully']);
        } catch (\Exception $e) {
            \DB::rollBack();
            return response()->json(['status' => false, 'message' => $e->getMessage()], 400);
        }
    }

    public function review(Request $request)
    {

        $profileEducation = fetch('GET', '/profile/education', body(['name' => '', 'page' => 1, 'limit' => 10]));
        $profileExperience = fetch('GET', '/profile/experience', body(['name' => '', 'page' => 1, 'limit' => 10]));

        $view = view('frontend.partials.forms', compact('profileEducation', 'profileExperience'))->render();
        return response()->json($view);
    }



















    private function get_oauth_step_1()
    {
        //++++++++++++++++++++++++++++++++++++++++++++++++
        //++++++++++++++++++++++++++++++++++++++++++++++++
        $redirectURL = 'http://127.0.0.1:8000/zoom-meeting-create';
        $authorizeURL = 'https://zoom.us/oauth/authorize';
        //++++++++++++++++++++++++++++++++++++++++++++++++++
        $clientID = env("ZOOM_CLIENT_KEY");
        $clientSecret = env("ZOOM_CLIENT_SECRET");
        //++++++++++++++++++++++++++++++++++++++++++++++++
        //++++++++++++++++++++++++++++++++++++++++++++++++

        $scopes = 'account:master,account:read:admin,account:write:admin,meeting_token:read:admin:local_recording, information_barriers:write:admin, meeting:read:admin:sip_dialing, information_barriers:read:admin, meeting:read:admin, information_barriers:read:master, meeting:write:admin, meeting_token:read:admin:live_streaming, meeting:write:admin:sip_dialing, meeting_summary:read:admin, meeting:master, meeting_token:read:admin:local_archiving, meeting_summary:master, information_barriers:write:master,
        room:write:admin, room:master, room:read:admin,zoom_events_attendee_actions:write:admin, zoom_events_basic:read:admin, zoom_events_tickets:read:admin, zoom_events_tickets:write:admin, zoom_events_sessions:read:admin, zoom_events_exhibitors:write:admin, zoom_events_reports:read:admin, zoom_events_speakers:read:admin, zoom_events_exhibitors:read:admin, zoom_events_ticket_types:write:admin, zoom_events_hubs:read:admin, zoom_events_attendee_actions:read:admin, zoom_events_basic:write:admin, zoom_events_registrants:read:admin, zoom_events_sessions:write:admin, zoom_events_ticket_types:read:admin, zoom_events_speakers:write:admin,
        iq_comment:read:admin, iq_account:read:admin, iq_deal:read:admin, iq_comment:write:admin, iq_analytics_metrics:read:admin, iq_coaching:read:admin, iq_conversation:read:admin, iq_conversation:write:admin
        ';

        $authURL = $authorizeURL . '?client_id=' . $clientID . '&redirect_uri=' . $redirectURL . '&response_type=code&scope=&state=xyz';
        // dd($authURL);
        return redirect()->to($authURL)->send();
    }
    //++++++++++++++++++++++++++++++++++++++++++++++++
    //++++++++++++++++++++++++++++++++++++++++++++++++
    private function get_oauth_step_2($code)
    {
        //++++++++++++++++++++++++++++++++++++++++++++++++
        //++++++++++++++++++++++++++++++++++++++++++++++++
        $tokenURL = 'https://zoom.us/oauth/token';
        $redirectURL = 'http://127.0.0.1:8000/zoom-meeting-create';
        //++++++++++++++++++++++++++++++++++++++++++++++++++
        $clientID = env("ZOOM_CLIENT_KEY");
        $clientSecret = env("ZOOM_CLIENT_SECRET");
        //++++++++++++++++++++++++++++++++++++++++++++++++
        //++++++++++++++++++++++++++++++++++++++++++++++++
        $curl = curl_init();
        $params = array(
            CURLOPT_URL => $tokenURL . "?"
                . "code=" . $code
                . "&grant_type=authorization_code"
                . "&client_id=" . $clientID
                . "&client_secret=" . $clientSecret
                . "&redirect_uri=" . $redirectURL,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_NOBODY => false,
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded",
                "accept: *",
            ),
        );
        curl_setopt_array($curl, $params);
        $response = curl_exec($curl);
        //++++++++++++++++++++++++++++++++++++++++++++++++++
        $err = curl_error($curl);
        curl_close($curl);
        //++++++++++++++++++++++++++++++++++++++++++++++++++
        $response = json_decode($response, true);
        return $response;
    }
    //++++++++++++++++++++++++++++++++++++++++++++++++
    //++++++++++++++++++++++++++++++++++++++++++++++++
    private function create_a_zoom_meeting($meetingConfig = [])
    {
        //++++++++++++++++++++++++++++++++++++++++++++++++
        //++++++++++++++++++++++++++++++++++++++++++++++++
        $requestBody = [
            'topic' => $meetingConfig['topic'] ?? 'New Meeting General Talk',
            'type' => $meetingConfig['type'] ?? 2,
            'start_time' => $meetingConfig['start_time'] ?? date('Y-m-dTh:i:00') . 'Z',
            'duration' => $meetingConfig['duration'] ?? 30,
            'password' => $meetingConfig['password'] ?? mt_rand(),
            'timezone' => 'Asia/Kolkata',
            'agenda' => $meetingConfig['agenda'] ?? 'Interview Meeting',
            'settings' => [
                'host_video' => false,
                'participant_video' => true,
                'cn_meeting' => false,
                'in_meeting' => false,
                'join_before_host' => true,
                'mute_upon_entry' => true,
                'watermark' => false,
                'use_pmi' => false,
                'approval_type' => 0,
                'registration_type' => 0,
                'audio' => 'voip',
                'auto_recording' => 'none',
                'waiting_room' => false,
            ],
        ];
        //++++++++++++++++++++++++++++++++++++++++++++++++
        //++++++++++++++++++++++++++++++++++++++++++++++++
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // Skip SSL Verification
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.zoom.us/v2/users/me/meetings",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($requestBody),
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . $meetingConfig['jwtToken'],
                "Content-Type: application/json",
                "cache-control: no-cache",
            ),
        )
        );
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        //++++++++++++++++++++++++++++++++++++++++++++++++
        if ($err) {
            return [
                'success' => false,
                'msg' => 'cURL Error #:' . $err,
                'response' => null,
            ];
        } else {
            return [
                'success' => true,
                'msg' => 'success',
                'response' => json_decode($response, true),
            ];
        }
    }




    public function basicInfo()
    {
        $profileEducation = fetch('GET', '/profile/education', body(['name' => '', 'page' => 1, 'limit' => 10]));


        $profileExperience = fetch('GET', '/profile/experience', body(['name' => '', 'page' => 1, 'limit' => 10]));

        $schools = fetch('POST', '/profile/school_list', body(['name' => '', 'page' => 1, 'limit' => 10]));
        $schools_degree = fetch('POST', '/profile/school_degree_list', body(['name' => '', 'page' => 1, 'limit' => 10]));
        $schools_fields = fetch('POST', '/profile/field_of_study_list', body(['name' => '', 'page' => 1, 'limit' => 10]));
        $company = fetch('POST', '/profile/company_list', body(['name' => '', 'page' => 1, 'limit' => 10]));
        $industry = fetch('POST', '/profile/industry_list', body(['name' => '', 'page' => 1, 'limit' => 10]));
        $skills = fetch('POST', '/profile/experience_skill_list', body(['name' => '', 'page' => 1, 'limit' => 10]));
        $designation_list = fetch('POST', '/profile/designation_list', body(['name' => '', 'page' => 1, 'limit' => 10]));

        $skills = collect($skills['items'])->pluck('name')->toArray();
        $designation_list = collect($designation_list['items'])->pluck('name')->toArray();
        // dd($skills,$designation_list);



        $schools = json_encode(collect($schools['items'])->pluck('name')->toArray());
        $schools_degree = json_encode(collect($schools_degree['items'])->pluck('name')->toArray());
        $schools_fields = json_encode(collect($schools_fields['items'])->pluck('name')->toArray());
        $company = json_encode(collect($company['items'])->pluck('name')->toArray());
        $industry = json_encode(collect($industry['items'])->pluck('name')->toArray());


        return view('frontend.dashboard-pages.main', compact('skills','designation_list','company', 'industry', 'schools', 'schools_degree', 'schools_fields', 'profileEducation', 'profileExperience'));



    }

    public function details($id){

        $mentorDetails = fetch('GET', '/profile/public/'.$id, body(['name' => '', 'page' => 1, 'limit' => 10]));

        return view('frontend.userDetailed',compact('mentorDetails'));
    }


    public function myProfile(){
        $profileEducation = fetch('GET', '/profile/education', body(['name' => '', 'page' => 1, 'limit' => 10]));
        $services = fetch('GET','/profile_service',body([]));

        $profileExperience = fetch('GET', '/profile/experience', body(['name' => '', 'page' => 1, 'limit' => 10]));
    

        $schools = fetch('POST', '/profile/school_list', body(['name' => '', 'page' => 1, 'limit' => 10]));
        $schools_degree = fetch('POST', '/profile/school_degree_list', body(['name' => '', 'page' => 1, 'limit' => 10]));
        $schools_fields = fetch('POST', '/profile/field_of_study_list', body(['name' => '', 'page' => 1, 'limit' => 10]));
        $company = fetch('POST', '/profile/company_list', body(['name' => '', 'page' => 1, 'limit' => 10]));
        $industry = fetch('POST', '/profile/industry_list', body(['name' => '', 'page' => 1, 'limit' => 10]));
        $schools = json_encode(collect($schools['items'])->pluck('name')->toArray());
        $schools_degree = json_encode(collect($schools_degree['items'])->pluck('name')->toArray());
        $schools_fields = json_encode(collect($schools_fields['items'])->pluck('name')->toArray());
        $company = json_encode(collect($company['items'])->pluck('name')->toArray());
        $industry = json_encode(collect($industry['items'])->pluck('name')->toArray());
        return view('frontend.myProfile',compact('company', 'industry','services', 'schools', 'schools_degree', 'schools_fields', 'profileEducation', 'profileExperience'));
    }


}
