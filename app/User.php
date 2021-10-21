<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	   protected $table = 'clm_customer_master';
	   public $timestamps = false;
		protected $fillable = [
			'first_name','last_name','email','password','phone','country_code','active_status', 'provider', 'provider_id','key','mobile_verify','social_id','social_type'
		];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
	
	
	public static function verifyPhone($phone,$id){
		$query = User::where('phone',$phone)->where('id',$id)->first();
		return $query;
	}
	public static function verifyOtpById($otp,$id){
		$query = User::where('id',$id)->where('otp',$otp)->first();

		return $query;
	}
	public static function emailVerify($email){
		$query = User::whereRaw('(email ="'.$email.'" OR phone ="'.$email.'")')->where('active_status','1')->where('status','1')->first();
		return $query;
	}
	
	public static function CheckForLoginpassword($email,$password){
		$query = User::whereRaw('(email ="'.$email.'" OR phone ="'.$email.'")')->where('password',$password)->where('active_status','1')->where('status','1')->first();
		return $query;
	}
	public static function verifyOtpByEmail($email,$otp){
		$query = User::whereRaw('(email ="'.$email.'" OR phone ="'.$email.'")')->where('otp',$otp)->where('active_status','1')->where('status','1')->first();
		return $query;
	}
}
