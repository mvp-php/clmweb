<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
	
	
	  protected function credentials(Request $request)
    {
        if(is_numeric($request->get('email'))){
            return ['phone'=>$request->get('email'),'password'=>$request->get('password')];
        }
        return $request->only($this->username(), 'password');
    }
	
	
	public function login(Request $request)
	  {
			 $user = User::whereRaw("(email = '".$request->email."' OR phone = '".$request->email."')")
						  ->where('active_status','1')
						  ->where('password',md5($request->password))
						  ->first();
			if($user){
			if($user->active_status == 1){
				Auth::login($user);
			   return redirect('/home');
			}else{
				Session::put('register', $user);
				Session::save();
				return redirect('/verify-mobile');
			}
			}else{
				return redirect('/');
			}
	  }
	 
	public function  verifyOtp(Request $request){
		$id = Input::post('id');
		$otp = Input::post('otp');
		$data = User::verifyOtpById($otp,$id);
		if($data){
			$active_record = User::where('id',$id)->update(array('active_status'=>'1'));
			Auth::login($data);
			echo '1';
		}else{
			echo '0';
		}
	}
	
	public function check_user_login_email(Request $request) {
		$email = Input::post('email');
		$query = User::emailVerify($email);
        if (!empty($query)) {
            return 1;
        } else {
            return 0;
        }
    }
	
	public function check_user_login_password(Request $request) {
		$password = Input::post('password');
        $email = Input::post('email');
		$query = User::CheckForLoginpassword($email,md5($password));
        if (!empty($query)) {
            return 1;
        } else {
            return 0;
        }
    }
	  
	  
}
