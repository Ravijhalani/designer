<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Exception;
use Socialite;
use App\Models\User;
use GuzzleHttp\Client;

class SocialLoginController extends Controller
{

    protected $linkedinClientId;
    protected $linkedinClientSecret;
    protected $linkedinRedirectUri;

    public function __construct()
    {
        $this->linkedinClientId = env('LINKEDIN_CLIENT_ID');
        $this->linkedinClientSecret = env('LINKEDIN_CLIENT_SECRET');
        $this->linkedinRedirectUri = env('LINKEDIN_REDIRECT_URI');
    }

    public function linkedinRedirect(Request $request)
    {
        // dd($request->all(),csrf_token());
        // return Socialite::driver('linkedin')->redirect();

       
        $url = "https://www.linkedin.com/oauth/v2/authorization";
        $params = [
            'response_type' => 'code',
            'client_id' => $this->linkedinClientId,
            'redirect_uri' => $this->linkedinRedirectUri,
            'scope' => 'openid email profile r_basicprofile',
            'state' => csrf_token(),
        ];

        return redirect($url . '?' . http_build_query($params));

    }
       
    public function linkedinCallback(Request $request)
    {
        // dd($request->all(),csrf_token());
        // try {
     
        //     $user = Socialite::driver('linkedin')->user();
            
        //     $linkedinUser = User::where('oauth_id', $user->id)->first();
      
        //     if($linkedinUser){
      
        //         Auth::login($linkedinUser);
     
        //         return redirect('/dashboard');
      
        //     }else{
        //         $user = User::create([
        //             'name' => $user->name,
        //             'email' => $user->email,
        //             'oauth_id' => $user->id,
        //             'oauth_type' => 'linkedin',
        //             'password' => encrypt('admin12345')
        //         ]);
     
        //         Auth::login($user);
      
        //         return redirect('/dashboard');
        //     }
     
        // } catch (Exception $e) {
        //     dd($e->getMessage());
        // }

        $state = $request->get('state');
        $code = $request->get('code');

        // Verify CSRF token
        if ($state !== csrf_token()) {
            abort(403, 'Invalid CSRF token');
        }
        try{
            // Exchange authorization code for access token
            $accessToken = $this->getAccessToken($code);
            
            // Get LinkedIn user profile
            $vanity = $this->getVanityDetails($accessToken);
            
            if(!$vanity) {
                abort(403, 'There is something get wrong');
            }

            $user = User::where('oauth_id',$vanity['sub'])->where('oauth_type','LINKEDIN')->first();
            if(!$user) {
                $store['name'] = $vanity['name'];
                $store['email'] = $vanity['email'];
                $store['picture'] = $vanity['picture'];
                $store['oauth_id'] = $vanity['sub'];
                $store['linked_profile_name'] = $vanity['sub'];
                $store['oauth_type'] = 'LINKEDIN';
                $store['status']     = 1;
                $user = User::create($store);
            }
            Auth::login($user);
            return redirect('/dashboard');
        }
        catch(\Exception $e){
            abort(403, $e->getMessage());
        }
    }



    protected function getAccessToken($code)
    {
        $url = "https://www.linkedin.com/oauth/v2/accessToken";
        $params = [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'client_id' => $this->linkedinClientId,
                'client_secret' => $this->linkedinClientSecret,
                'redirect_uri' => $this->linkedinRedirectUri,
                'code' => $code,
            ],
        ];

        $client = new Client();
        $response = $client->post($url, $params);

        $data = json_decode($response->getBody(), true);

        return $data['access_token'];
    }

    protected function getUserProfile($accessToken)
    {
        $url = "https://api.linkedin.com/v2/me";
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken,
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        $client = new Client();
        $response = $client->get($url, ['headers' => $headers]);

        return json_decode($response->getBody(), true);
    }


    protected function getVanityDetails($accessToken)
    {
        $url = "https://api.linkedin.com/v2/userinfo";
        $headers = [
            'Authorization' => 'Bearer ' . $accessToken,
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        $client = new Client();
        $response = $client->get($url, ['headers' => $headers]);

        return json_decode($response->getBody(), true);
    }

}
