<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    


    public function register(Request $request){
        $data = $request->except('_token');
        $validator = Validator::make($data, [
                        'name' => ['required', 'string','min:2', 'max:50'],
                        'email' => ['required', 'string', 'email', 'max:255'],
                        'mobile' => ['required', 'numeric', 'digits:10'],
                    ]);

        if($validator->fails()){
            return response()->json(['status'=>false,'errors'=>$validator->errors()]);
        }

        $store = $request->except('_token','password_confirmation');

        try {
            $user = User::where('mobile',$request->mobile)->first();
            $store['otp'] = "1234";
            if(!$user) {
                $store['status'] = 0;    
                User::create($store);
                return response()->json(['status'=>1,'message'=>'Otp send successfully','mobile'=>$request->mobile]);
            }
    
            if($user->status==1) {
                return response()->json(['status'=>2,'message'=>'Your account already registered ! Please try to login']);
            }
            $user->otp = $store['otp'];
            $user->save();

            return response()->json(['status'=>1,'message'=>'Otp send successfully','mobile'=>$request->mobile]);
        }
        catch (\Exception $e){
            return response()->json(['status'=>2,'message'=>'There is something issue in our system Please wait...']);
        }

    }
    
}
