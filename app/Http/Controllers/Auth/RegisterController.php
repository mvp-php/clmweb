<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;

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
    protected $redirectTo = '/verify-mobile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'phone' => 'required|unique:clm_customer_master',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
		
    }

	public function duplicateEmail(){
		$email = Input::post('email');
		$query = User::where('email',$email)->where('status',1)->count();
		if($query ==0){
			echo 1;
		}else{
			echo 0;
		}
	}
	public function duplicatePhone(){
		$email = Input::post('phone');
		$query = User::where('phone',$email)->where('status',1)->count();
		if($query ==0){
			echo 1;
		}else{
			echo 0;
		}
	}
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {	
        $query = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone'],
            'country' => '132',
            'country_code' => $data['country_code'],
            'email' => $data['email'],
			
            'password' => md5($data['password']),
        ]);
		
		Session::put('register', $query);
		Session::save();
		//$this->getSms($data['country_code'],$data['phone'],$key_mobile);
    }
	
}
