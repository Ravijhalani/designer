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

function getIST($utcDate){
    // Get today's date and combine it with the given time
$utcDateTime = \Carbon\Carbon::today('UTC')->format('Y-m-d') . ' ' . $utcDate;

// Convert the UTC time to IST
return $istTime = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $utcDateTime, 'UTC')
                ->setTimezone('Asia/Kolkata'); // 'Asia/Kolkata' is the timezone for IST

}

if (!function_exists('fetch')) {
    function fetch($method, $endPoint, $body){
        $client = new Client();
        $data = [];

        $headers = [
            'Authorization' => 'Bearer ' . auth()->user()->jwt_token,
            'Content-Type' => 'application/json',
        ];

        try {
            // Make the request using Guzzle
            $response = $client->request($method, env('API_URL') . $endPoint, [
                'headers' => $headers,
                'body' => $body
            ]);

            // Get the response code
            $responseCode = $response->getStatusCode();

            // Get the response body
            $responseBody = $response->getBody()->getContents();

            // Decode the JSON response
            $responseArray = json_decode($responseBody, true);

            // Include the response code in the returned data
            return ( isset($responseArray['response']))?$responseArray['response']:[];

        } catch (\GuzzleHttp\Exception\RequestException $e) {
           
            // Handle request exceptions, e.g., network errors or 4xx/5xx responses
            if ($e->hasResponse()) {
                
                $responseCode = $e->getResponse()->getStatusCode();
                $responseBody = $e->getResponse()->getBody()->getContents();
                $responseArray = json_decode($responseBody, true);
                return [
                    'response_code' => $responseCode,
                    'response_body' => $responseArray['response']['message'],
                ];
            }

            // Handle other types of exceptions (e.g., network errors)
            return [
                'response_code' => 0,
                'response_body' => ['error' => $e->getMessage()],
            ];
        }
    }
}
