<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function sendOtp(Request $request){   
       
        $requestData = $request->all();
        if (isset($requestData['mobile'])) {
            $requestData['mobile'] = str_replace('+91', '', $requestData['mobile']);
        }
        $validator = Validator::make($requestData, [
            'mobile' => 'required|exists:users,mobile'
        ],[
            'mobile.exists'=>'Your account not exists! Please try to register'
        ]);

        if ($validator->fails()){

		//    return response()->json([
		// 	'status' => false,
		// 	'errors' => $validator->errors()
		// 	]);
        return redirect()->back()->withErrors($validator)->withInput();

		}
        $mobile_number = $requestData['mobile'];
        $user = User::where('mobile',$requestData['mobile'])->first();
        if( ($user->otp!='' && $user->status!=1) ){
            return response()->json(['status'=>0,'errors'=>['mobile'=>['Your number is not verified! Please goto register page']]]);
        }
        
        $user->otp = "1234";
        $user->save();

        return view('auth.verifyOtp',compact('mobile_number'));

        return response()->json(['status'=>1,'message'=>'Otp send successfully','encoded_mobile_number'=>\Crypt::encrypt($request->mobile)]);
    }

    public function verifyOtp(Request $request){
        $data = $request->all();
        // dd($data['encoded_mobile_number']);
        //$data['mobile'] = \Crypt::decrypt($data['encoded_mobile_number']);
      
        $validator = Validator::make($data, [
            'mobile' => 'required|numeric|digits:10',
            'otp'    => 'required|min:4'
        ]);

        if ($validator->fails()){
		   return response()->json([
			'status' => false,
			'errors' => $validator->errors()
			]);
		}

        $user = \App\Models\User::where('mobile',$data['mobile'])->where('otp',$data['otp'])->first();

        if(!$user){
            return response()->json(['status'=>0,'errors'=>['otp'=>['Please enter a valid otp !']]]);
        }
        $user->status = 1;
        $user->otp = null;
        //$user->save();
        \Auth::guard('web')->login($user);

        $userData = new \StdClass();
        $userData->user_id = (string)$user->id;
        
        $payload = JWTFactory::sub($user->id)->data($userData)->make();
        $token   = JWTAuth::encode($payload);
        $user->jwt_token = $token->get();
        $user->save();
        
        return response()->json(['status'=>1,'message'=>'Login successfully']);
    }
}
