<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Socialite;
use Exception;
use Auth;

class SocialAuthController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index(Request $request)
    {
		$data = Input::post('oauth_provider');
		$userData = json_decode(Input::post('userData'));
		
            $input['first_name'] = $userData->first_name;
			$input['last_name'] = $userData->last_name;
            $input['email'] = $userData->email;
            $input['social_type'] = '1';
            $input['social_id'] = $userData->id;

			//$user = Socialite::driver($data)->user();
            $authUser = $this->findOrCreate($input);
            Auth::loginUsingId($authUser->id);

            echo "1";
    }
	
	public function findOrCreate($input){
		
		$checkIfExist = User::where('social_type',$input['social_type'])
                           ->where('social_id',$input['social_id'])					   	 
                           ->first();
        if($checkIfExist){
            return $checkIfExist;
        }else{
			return User::create($input);
		}
		
	}
    /**
     * Get the user info from provider and check if user exist for specific provider
     * then log them in otherwise
     * create a new user then log them in 
     * Once user is logged in then redirect to authenticated home page
     *
     * @return Response
     */
	 
	 public function GoogleLogin(Request $request)
	{
		
		$data = Input::post('oauth_provider');
		$userData = json_decode(Input::post('userData'));
		
            $input['first_name'] = $userData->ofa;
			$input['last_name'] = $userData->wea;
            $input['email'] = $userData->U3;
            $input['social_type'] = '2';
            $input['social_id'] = $userData->Eea;
			//$user = Socialite::driver($data)->user();
            $authUser = $this->findOrCreate($input);
            Auth::loginUsingId($authUser->id);

            echo "1";
   /* $existingUser = User::where('email', $user->getEmail())->first();

    if ($existingUser) {
        auth()->login($existingUser, true);
    } else {
        $newUser                    = new User;
        $newUser->provider_name     = $driver;
        $newUser->provider_id       = $user->getId();
        $newUser->name              = $user->getName();
        $newUser->email             = $user->getEmail();
        $newUser->email_verified_at = now();
        $newUser->avatar            = $user->getAvatar();
        $newUser->save();

        auth()->login($newUser, true);
    }*/
	
	}
  
}