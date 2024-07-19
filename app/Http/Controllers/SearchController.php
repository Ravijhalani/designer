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
use GuzzleHttp\Client;

class SearchController extends Controller {

    
    public function search(Request $request){
      

        $array = array(
            'data' => array(
                "chaining"=> "or",
                'limit' => 20,
                'filters' => new \stdClass()                
            )
        );
       
        


            if($request->search!="") {
                
                $array['data']['filters']->title = (object)array(
                    'values' => array(
                        (object)array(
                            'value' => $request->search,
                            'operator' => 'contains'
                        )
                    )
                );


                $array['data']['filters']->company__name = (object)array(
                    'values' => array(
                        (object)array(
                            'value' => $request->search,
                            'operator' => 'contains'
                        )
                    )
                );


                $array['data']['filters']->designation__name = (object)array(
                    'values' => array(
                        (object)array(
                            'value' => $request->search,
                            'operator' => 'contains'
                        )
                    )
                );
            }
            
            if($request->service_category != "") {
                $array['data']['filters']->service_category = (object)array(
                    'values' => array(
                        (object)array(
                            'value' => $request->service_category,
                            'operator' => 'eq'
                        )
                    )
                );
            }

       
        $output =  $this->fetch('/api/search','POST',json_encode($array));
       


        $services = $output['items'];
        $companyList = $output['aggregations']['company__name']['items'];
        $experienceSkillList = $output['aggregations']['service_skills__name']['items'];
        $designationList = $output['aggregations']['designation__name']['items'];
        $jobLocationType = $output['aggregations']['job_location_type']['items'];

        
        return view('search')->with(['services'=>$services,'companyList'=>$companyList,'experienceSkillList'=>$experienceSkillList,'designationList'=>$designationList,'jobLocationType'=>$jobLocationType]);

    }

    public function fetch($endPoint,$method,$body){

        $client = new Client();

        $data = [];

        $headers = [
            'Authorization' => 'Bearer ' . auth()->user()->jwt_token,
            'Content-Type' => 'application/json',
          ];
        
       // Make the POST request using Guzzle
        $response = $client->request($method, env('API_URL').$endPoint, [
            'headers' => $headers,
            'body' => $body
        ]);
        
        // Get the response body
        $responseBody = $response->getBody()->getContents();

        // Decode the JSON response
        $responseArray = json_decode($responseBody, true);
        // dd($responseArray);
        // Print the response array
        return ( count($responseArray['response']) > 0  )?$responseArray['response']:[];

    }


    public function searchFilter(Request $request){

        $data = $request->all();

        $array = array(
            'data' => array(
                "chaining"=> "or",
                'limit' => 20,
                'filters' => new \stdClass()                
            )
        );


        if(isset($data['company__name']) > 0){

            $array['data']['filters']->company__name = (object)$data['company__name'];

        }

        if(isset($request['designation__name']) > 0){

            $array['data']['filters']->designation__name = (object)$data['designation__name'];

        }


        if(isset($request['job_location_type']) > 0){

            $array['data']['filters']->job_location_type =  (object)$data['job_location_type'];

        }

        $output =  $this->fetch('/api/search','POST',json_encode($array));
        if( count($output['items']) > 0 ){
            return response()->json(['status'=>true,'data'=>$output['items']]);
        }


    }

}
