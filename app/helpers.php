<?php

use GuzzleHttp\Client;



function body($param){


    $data = [
        'data' => $param
    ];

    return json_encode(response()->json($data)->original);


}

function getTypes(){
    return ['PRODUCT', 'SERVICE', 'OTHER'];
}

function getEmploymentType(){
    return ['FULL_TIME', 'PART_TIME','SELF_EMPLOYED','FREELANCE','INTERNSHIP','TRAINEE'];
}


function getLocationType(){
    return ['REMOTE', 'ONSITE', 'HYBRID'];
}

function qualificationType(){
    return ['UNDER_GRADUATE', 'POST_GRADUATE', 'DOCTORATE'];
}

function educationLevels(){
    return ['Post Graduate','Under Graduate','12th','10th','Diploma','Others'];
}

function getGrade(){
    return ['A', 'B', 'C','D'];
}



if (!function_exists('fetch')) {
    function fetch($method,$endPoint,$body){

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
        return ( isset($responseArray['response']))?$responseArray['response']:[];

    }
}
