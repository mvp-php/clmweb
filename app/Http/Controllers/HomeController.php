<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
	
	public function support(){
		$data['user'] = $user = auth()->user();
		$user_id = $user->id;
		
		$lang = '';
       
            $data = DB::table('clm_support_master')->where(array('support_status' => 1, 'status' => 1))->orderBy('id', 'desc')->get();
           
			//			
			$cnt = 0;
                $data_new = array();
                foreach ($data as $key) {
                    if ($lang == '3') {
                        $title = strip_tags($key->title_chinese);
                        $content = strip_tags($key->content_chinese);
                    } else if ($lang == '2') {
                        $title = strip_tags($key->title_malay);
                        $content = strip_tags($key->content_malay);
                    } else {
                        $title = strip_tags($key->title);
                        $content = strip_tags($key->content);
                    }
                    $data_new[$cnt] = array(
                        "id" => $key->id,
                        "title" => $title,
                        "content" => $content,
                        "created_date" => $key->created_date
                    );
                    $cnt++;
                }
                
        $data['all_data'] = $data_new;
		return view('support.support',$data); 
	}
}
