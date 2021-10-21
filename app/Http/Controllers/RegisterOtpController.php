<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use App\User;
class RegisterOtpController extends Controller
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
		$data['user'] = $register = $request->session()->get('register');
		return view('auth.register_otp',$data);
    }
	
	public function verifyPhone(Request $request){
		
		$id = Input::get('id');
		$phone = Input::get('phone');
		$country_code = Input::get('country_code');
		
		$rand =  mt_rand(10000, 99999);
		$data = User::verifyPhone($phone,$id);
		if(empty($data)){
			$update = User::where('id',$id)->update(array('phone'=>$phone,'country_code'=>$country_code));
		}
		$update_otp = User::where('id',$id)->update(array('otp'=>$rand,'country_code'=>$country_code));
		
		$getMobileNum  = User::select('country_code','phone')->where('id',$id)->where('status',1)->first();
		$this->getSms($getMobileNum->country_code,$getMobileNum->phone,$rand);
		
		
		echo $update_otp;
	}
	
	public function verifyOtp(Request $request){
		$id = Input::get('id');
		$otp = Input::get('otp');
		$data = User::verifyOtpById($otp,$id);
		if($data){
			$active_record = User::where('id',$id)->update(array('active_status'=>'1'));
			Auth::login($data);
			return redirect('/home');
			echo '1';
		}else{
			echo '0';
		}
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
