<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use App\User;
class ForgotPasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('auth.forgot_password');
    }
	
	public function emailVerify(Request $request){
		$email = Input::post('email');
		$rand = mt_rand(10000, 99999);
		$data = User::emailVerify($email);
		
		if($data){
			$update_otp = User::where('id',$data->id)->update(array('otp'=>$rand));
			
			$getCountryAndMobile = User::select('country_code','phone')->where('id',$data->id)->where('status',1)->first();
			$this->getSms($getCountryAndMobile->country_code,$getCountryAndMobile->phone,$rand);
			echo $update_otp;
		}else{
			echo '0';
		}
	}
	
	public function emailOtpVerify(Request $request){
		$email = Input::post('email');
		$otp = Input::post('otp');
		$data = User::verifyOtpByEmail($email,$otp);
		if($data){
			$active_record = User::where('email',$email)->update(array('active_status'=>'1'));
			echo '1';
		}else{
			echo '0';
		}
	}
	
	
	public function reset_password(Request $request){
		$email = Input::get('email');
		$password = Input::get('password');
		
		$reset_password = User::where('email',$email)->update(array('password'=>md5($password)));
		echo '1';
	}
	function getSms($country_code,$mobile,$key) {
	
	$mobiles = $country_code.' '.$mobile;
       $cSession = curl_init(); 
		curl_setopt($cSession,CURLOPT_URL,"https://www.smshubs.net/api/sendsms.php?key=da8d4021b91f11ef8be515d5d5db1cab&message=CL method S/B - Your 6 digit code is ".$key."&recipient=".$mobiles);
		curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($cSession,CURLOPT_HEADER, false); 
		$result=curl_exec($cSession);
		curl_close($cSession);
		return $result;
    }
}
