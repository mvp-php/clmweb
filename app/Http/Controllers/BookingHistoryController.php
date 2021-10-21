<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Booking;

class BookingHistoryController extends Controller
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
		$data['user'] = $user = auth()->user();
		$user_id = $user->id;
		
        $lang = Input::get('lang');
        
		$data['outworld'] = $this->booking_data('1');
		
		//$data['world_tour'] = $this->booking_data('2');
		//print_r($data['outworld']);  die();
		
        return view('booking.booking_outlet',$data); 
    }
	public function world_tour()
    { 
		$data['user'] = $user = auth()->user();
		$user_id = $user->id;
        $lang = Input::get('lang');
        $data['world_tour'] = $this->booking_data('2');
		
        return view('booking.booking_worldtour',$data); 
    }
	
	
	public function history_outlet(){
		$data['outworld'] = $this->booking_history('1');
		
		//print_r($data['outworld']); die();
		return view('booking.booking_history_outlet',$data); 
	}
	public function history_worltour(){
		$data['world_tour'] = $this->booking_history('2');
		//print_r($data['world_tour']); die();
		return view('booking.booking_history_worldtour',$data); 
	}
	
	public function booking_history($type) {
        $data['user'] = $user = auth()->user();
		$user_id = $user->id;
        $lang = "";
		$data = Booking::History($lang, $type, $user_id);
		//print_r($data); die();
		return $data;
        //return response()->json(['status' => "1", 'error_msg' => "success", 'data' => $data->toArray()]);
               
    }
	
	
	
	public function booking_data($type){
		
		$data['user'] = $user = auth()->user();
		$user_id = $user->id;
		$lang = "";
				$all_data = Booking::mybooking($type, $user_id, $lang);
				
				//print_r($all_data); die();
                
                    $cnt = 0;
                    $data_new = array();
                    foreach ($all_data as $key) {
						
                        if ($type == 1) {
                            $data_new[$cnt]["id"] = $key->id;
                            $data_new[$cnt]["user_name"] = $key->bName;
                            $data_new[$cnt]["booking_id"] = $key->booking_id;
                            $data_new[$cnt]["user_fk"] = $key->user_fk;
                            $data_new[$cnt]["physician_fk"] = $key->physician_fk;
                            $data_new[$cnt]["schedule_fk"] = $key->schedule_fk;
                            $data_new[$cnt]["outlet_fk"] = $key->outlet_fk;
                            $data_new[$cnt]["booking_price"] = 'MYR ' . $key->booking_price;
                            $data_new[$cnt]["session"] = $key->session;
                            $data_new[$cnt]["booking_date"] = $key->booking_date;
                            $data_new[$cnt]["remark"] = $key->remark;
                            $data_new[$cnt]["Payment_status"] = $key->Payment_status;
                            $data_new[$cnt]["invoice"] = $key->invoice;
                            $data_new[$cnt]["pax"] = "1"; //$key->pax;
                            $data_new[$cnt]["transaction_id"] = $key->transaction_id;
                            $data_new[$cnt]["chris_leonge_type"] = $key->chris_leonge_type;
                            $data_new[$cnt]["transaction_log"] = $key->transaction_log;
                            $data_new[$cnt]["outletname"] = $key->outletname;
                            $data_new[$cnt]["outlet_id"] = $key->outlet_id;
                            $data_new[$cnt]["contact_no"] = $key->contact_no;
                            $data_new[$cnt]["start_time"] = $key->start_time;
                            $data_new[$cnt]["end_time"] = $key->end_time;
                            $data_new[$cnt]["country_name"] = $key->country_name;
                            $data_new[$cnt]["state_fk"] = $key->state_fk;
                            $data_new[$cnt]["city_name"] = $key->city_name;
                            $data_new[$cnt]["address1"] = $key->address1;
                            $data_new[$cnt]["address2"] = $key->address2;
                            $data_new[$cnt]["postcode"] = $key->postcode;
                            $data_new[$cnt]["longitude"] = $key->longitude;
                            $data_new[$cnt]["latitude"] = $key->latitude;
                            $data_new[$cnt]["type"] = $key->type;
                            $data_new[$cnt]["arrived_status"] = $key->arrived_status;
                            $data_new[$cnt]["qrcode"] = 'public/upload/' . $key->qrcode;
                            /* changes of 03-12-2018 vishal d patel */
                            $time1 = date("Y-m-d H:i:s");
                            $time2 = date("Y-m-d H:i:s", strtotime($key->booking_date . ' ' . $key->start_time));
                            $hourdiff = round((strtotime($time2) - strtotime($time1)) / 3600, 1);

                            /* end Changes of vishal d patel */
                            if ($key->arrived_status == 1 || $key->arrived_status == 2 || $hourdiff < 2) {
                                $data_new[$cnt]["reschedule"] = "0";
                            } else {
                                $data_new[$cnt]["reschedule"] = "1";
                            }
                        } else {
                            $data_new[$cnt]["id"] = $key->id;
                            $data_new[$cnt]["user_name"] = $key->bName;
                            $data_new[$cnt]["booking_id"] = $key->booking_id;
                            $data_new[$cnt]["user_fk"] = $key->user_fk;
                            $data_new[$cnt]["physician_fk"] = $key->physician_fk;
                            $data_new[$cnt]["schedule_fk"] = $key->schedule_fk;
                            $data_new[$cnt]["wt_fk"] = $key->wt_fk;
                            $data_new[$cnt]["booking_price"] = 'MYR ' . $key->booking_price;
                            $data_new[$cnt]["session"] = $key->session;
                            $data_new[$cnt]["booking_date"] = $key->booking_date;
                            $data_new[$cnt]["remark"] = $key->remark;
                            $data_new[$cnt]["Payment_status"] = $key->Payment_status;
                            $data_new[$cnt]["invoice"] = $key->invoice;
                            $data_new[$cnt]["pax"] = '1';
                            $data_new[$cnt]["transaction_id"] = $key->transaction_id;
                            $data_new[$cnt]["transaction_log"] = $key->transaction_log;
                            $data_new[$cnt]["tour_name"] = $key->tour_name;
                            $data_new[$cnt]["tour_id"] = $key->tour_id;
                            $data_new[$cnt]["date"] = $key->date;
                            $data_new[$cnt]["session"] = $key->schedule_session;
                            $data_new[$cnt]["image"] = $key->schedule_image;
                            $data_new[$cnt]["chris_leonge_type"] = $key->chris_leonge_type;
                            $data_new[$cnt]["address1"] = $key->world_tour_address1;
                            $data_new[$cnt]["address2"] = $key->world_tour_address2;
                            $data_new[$cnt]["world_tour_city"] = $key->world_tour_city;
                            $data_new[$cnt]["postcode"] = $key->world_tour_postcode;
                            $data_new[$cnt]["country_name"] = $key->world_tour_country_name;
                            $data_new[$cnt]["state"] = $key->state;
                            $data_new[$cnt]["latitude"] = $key->world_tour_latitude;
                            $data_new[$cnt]["longitude"] = $key->world_tour_longitude;
                            $data_new[$cnt]["schedule_date"] = $key->schedule_date;
                            $data_new[$cnt]["max_person"] = $key->max_person;
                            $data_new[$cnt]["schedule_used_slot"] = $key->schedule_used_slot;
                            $data_new[$cnt]["schedule_price"] = $key->schedule_price;
                            $data_new[$cnt]["schedule_start_time"] = $key->schedule_start_time;
                            $data_new[$cnt]["schedule_end_time"] = $key->schedule_end_time;
                            $data_new[$cnt]["schedule_start_date"] = $key->schedule_start_date;
                            $data_new[$cnt]["schedule_end_date"] = $key->scheduleend_date;
                            $data_new[$cnt]["qrcode"] = 'public/upload/' . $key->qrcode;
                            $data_new[$cnt]["arrived_status"] = $key->arrived_status;
                            /* add  03-12-2018 Vishal d patel */
                            $time1 = date("Y-m-d H:i:s");
                            $time2 = date("Y-m-d H:i:s", strtotime($key->booking_date . ' ' . $key->schedule_start_time));
                            $hourdiff = round((strtotime($time2) - strtotime($time1)) / 3600, 1);
                            /* end 03-12-2018 */
                            if ($key->arrived_status == 1 || $key->arrived_status == 2 || $hourdiff < 2) {
                                $data_new[$cnt]["reschedule"] = "0";
                            } else {
                                $data_new[$cnt]["reschedule"] = "1";
                            }
                        }
                        $cnt++;
                    }
					
					return $data_new;
	}
	
	public function booking_details($bid){
		//print_r($bid); die();
		$data['booking_detail'] = $this->booking_details_data('1',$bid);
		//print_r($data['booking_detail']); die();
		return view('booking.booking_outlet_detail',$data);
	}
	public function booking_details_worltour($bid){
		//print_r($bid); die();
		$data['booking_detail'] = $this->booking_details_data('2',$bid);
		//print_r($data['booking_detail']); die();
		return view('booking.booking_worldtour_detail',$data);
	} 
	public function booking_details_data($type,$bookingId) {
        //$bookingId = Input::get('booking_id');
       // $type = Input::get('type');
        $lang = "";
			$data = Booking::booking_details($bookingId, $type, $lang);
               //print_r($data); die();
			$cnt = 0;
			$data_new = array();
			foreach ($data as $key) {
				
				if (isset($key->type) == 1) {
					$data_new[$cnt]["id"] = $key->id;
					$data_new[$cnt]["user_name"] = $key->bName;
					$data_new[$cnt]["booking_id"] = $key->booking_id;
					$data_new[$cnt]["user_fk"] = $key->user_fk;
					$data_new[$cnt]["physician_fk"] = $key->physician_fk;
					$data_new[$cnt]["schedule_fk"] = $key->schedule_fk;
					$data_new[$cnt]["outlet_fk"] = $key->outlet_fk;
					$data_new[$cnt]["booking_price"] = 'MYR ' . $key->booking_price;
					$data_new[$cnt]["session"] = $key->session;
					$data_new[$cnt]["schedule_session"] = $key->schedule_session;
					$data_new[$cnt]["booking_date"] = $key->booking_date;
					$data_new[$cnt]["remark"] = $key->remark;
					$data_new[$cnt]["Payment_status"] = $key->Payment_status;
					$data_new[$cnt]["invoice"] = $key->invoice;
					$data_new[$cnt]["pax"] = $key->pax;
					$data_new[$cnt]["transaction_id"] = $key->transaction_id;
					$data_new[$cnt]["chris_leonge_type"] = $key->chris_leonge_type;
					$data_new[$cnt]["transaction_log"] = $key->transaction_log;
					$data_new[$cnt]["outletname"] = $key->outletname;
					$data_new[$cnt]["outlet_id"] = $key->outlet_id;
					$data_new[$cnt]["contact_no"] = $key->contact_no;
					$data_new[$cnt]["start_time"] = $key->start_time;
					$data_new[$cnt]["end_time"] = $key->end_time;
					$data_new[$cnt]["country_name"] = $key->country_name;
					$data_new[$cnt]["state_fk"] = $key->state_fk;
					$data_new[$cnt]["city_name"] = $key->city_name;
					$data_new[$cnt]["address1"] = $key->address1;
					$data_new[$cnt]["address2"] = $key->address2;
					$data_new[$cnt]["postcode"] = $key->postcode;
					$data_new[$cnt]["longitude"] = $key->longitude;
					$data_new[$cnt]["latitude"] = $key->latitude;
					$data_new[$cnt]["type"] = $key->type;
					$data_new[$cnt]["qrcode"] = 'public/upload/'.$key->qrcode;
					$data_new[$cnt]["treatment_fee"] = $key->treatment_fee;
					$time1 = date("Y-m-d H:i:s");
					$time2 = date("Y-m-d H:i:s", strtotime($key->booking_date . ' ' . $key->start_time));
					/*$hourdiff = round((strtotime($time2) - strtotime($time1)) / 3600, 1);
					if ($key->arrived_status == 1 || $key->arrived_status == 2 || $hourdiff < 2) {
						$data_new[$cnt]["reschedule"] = "0";
					} else {
						$data_new[$cnt]["reschedule"] = "1";
					}*/
				} else {

					$data_new[$cnt]["id"] = $key->id;
					$data_new[$cnt]["user_name"] = $key->bName;
					$data_new[$cnt]["booking_id"] = $key->booking_id;
					$data_new[$cnt]["user_fk"] = $key->user_fk;
					$data_new[$cnt]["physician_fk"] = $key->physician_fk;
					$data_new[$cnt]["schedule_fk"] = $key->schedule_fk;
					$data_new[$cnt]["wt_fk"] = $key->wt_fk;
					$data_new[$cnt]["booking_price"] = 'MYR ' . $key->booking_price;
					$data_new[$cnt]["session"] = $key->session;
					$data_new[$cnt]["booking_date"] = $key->booking_date;
					$data_new[$cnt]["remark"] = $key->remark;
					$data_new[$cnt]["Payment_status"] = $key->Payment_status;
					$data_new[$cnt]["invoice"] = $key->invoice;
					$data_new[$cnt]["pax"] = $key->pax;
					$data_new[$cnt]["transaction_id"] = $key->transaction_id;
					$data_new[$cnt]["transaction_log"] = $key->transaction_log;
					$data_new[$cnt]["tour_name"] = $key->tour_name;
					$data_new[$cnt]["tour_id"] = $key->tour_id;
					$data_new[$cnt]["date"] = $key->date;
					$data_new[$cnt]["schedule_session"] = $key->schedule_session;
					$data_new[$cnt]["image"] = $key->schedule_image;
					$data_new[$cnt]["chris_leonge_type"] = $key->chris_leonge_type;
					$data_new[$cnt]["address1"] = $key->world_tour_address1;
					$data_new[$cnt]["address2"] = $key->world_tour_address2;
					$data_new[$cnt]["world_tour_city"] = $key->world_tour_city;
					$data_new[$cnt]["postcode"] = $key->world_tour_postcode;
					$data_new[$cnt]["country_name"] = $key->world_tour_country_name;
					$data_new[$cnt]["state"] = $key->state;
					$data_new[$cnt]["latitude"] = $key->world_tour_latitude;
					$data_new[$cnt]["longitude"] = $key->world_tour_longitude;
					$data_new[$cnt]["schedule_date"] = $key->schedule_date;
					$data_new[$cnt]["max_person"] = $key->max_person;
					$data_new[$cnt]["schedule_used_slot"] = $key->schedule_used_slot;
					$data_new[$cnt]["schedule_price"] = $key->schedule_price;
					$data_new[$cnt]["schedule_start_time"] = $key->schedule_start_time;
					$data_new[$cnt]["schedule_end_time"] = $key->schedule_end_time;
					$data_new[$cnt]["schedule_start_date"] = $key->schedule_start_date;
					$data_new[$cnt]["schedule_end_date"] = $key->scheduleend_date;
					$data_new[$cnt]["qrcode"] = 'public/upload/' . $key->qrcode;
					$data_new[$cnt]["treatment_fee"] = $key->treatment_fee;
					$time1 = date("Y-m-d H:i:s");
					/*$time2 = date("Y-m-d H:i:s", strtotime($key->booking_date . ' ' . $key->schedule_start_time));
					$hourdiff = round((strtotime($time2) - strtotime($time1)) / 3600, 1);
					if ($key->arrived_status == 1 || $key->arrived_status == 2 || $hourdiff < 2) {
						$data_new[$cnt]["reschedule"] = "0";
					} else {
						$data_new[$cnt]["reschedule"] = "1";
					}*/
				}
				$cnt++;
			}
			return $data_new;
    }
	
	
	function getAddress($latitude,$longitude){
    if(!empty($latitude) && !empty($longitude)){
        //Send request and receive json data by address
        $geocodeFromLatLong = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($latitude).','.trim($longitude).'&sensor=false'); 
        $output = json_decode($geocodeFromLatLong);
        $status = $output->status;
        //Get address from json data
        $address = ($status=="OK")?$output->results[1]->formatted_address:'';
        //Return address of the given latitude and longitude
        if(!empty($address)){
            return $address;
        }else{
            return false;
        }
    }else{
        return false;   
    }
}
}
