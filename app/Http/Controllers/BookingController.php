<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WorldTour;
use Illuminate\Support\Facades\Input;
use App\PhysicianSchedule;
use App\BookingPaymentLog;
use App\BookingLog;
use App\Outlet;
use App\Booking;
use DB;
use App\Country;

use QRCode;
class BookingController extends Controller
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
        return view('booking.outlet_worltour_list');
    }
	/* start world Tour Section */
	public function worltour_list()
    {
        return view('booking.worltour_list');
    }
	
	/*get world tour list by flag */
	public function getworldTourListByFlag(){
		$flag = Input::get('id');
		
		$msg ='';
		if($flag !=''){
				$query = WorldTour::getWorldList($flag);

				$html='';
				if(!empty($query)){
					foreach($query as $val){
					
						$html .=' <li><input class="styled-checkbox" id="styled-checkbox-'.$val->id.'" type="radio" name="'.$val->world_tour.'" onclick=getWorldTourDetails('.$val->id.','.$val->world_tour.')><label for="styled-checkbox-'.$val->id.'">'.$val->city.'</label></li>';
					}
					
				}
		}
		echo $html;
	}
	
	/*get world details by tour id */
	
	public function worldtour_details(){
		/*flag ==1 chris World tour and flag ==2 standard World tour */
		$tour_id = Input::get('id');
		$data['flag'] = $flag = Input::get('flag');
		$data['type'] = $type =Input::get('type');
		$data['main_type'] = Input::get('main_type');
		$data['query'] = WorldTour::select('city','price')->where('id',$tour_id)->first();
		$data['scheduleDate'] = PhysicianSchedule::getScheduleDateByIdAndFlag($tour_id,$flag);
		$data['tour_id'] = $tour_id;
		return view('booking.worldtour_details',$data);
	}
	/*end World tour section */
	
	
	/*Start outlet section */
	function outlet_list(){
		
		return view('booking.outlet_list');
	}
	
	public function getOutletListByFlag(){
		$flag = Input::get('id');
		
		$msg ='';
		if($flag !=''){
				$query = Outlet::getOutletList($flag);

				$html='';
				if(!empty($query)){
					foreach($query as $val){
					
						$html .=' <li><input class="styled-checkbox" id="styled-checkbox-'.$val->id.'" type="radio" name="'.$val->outlet_type.'" onclick=getWorldTourDetails('.$val->id.','.$val->outlet_type.')><label for="styled-checkbox-'.$val->id.'">'.$val->name.'</label></li>';
					}
					
				}
		}
		echo $html;
	}
	public function outlet_details(){
		/*flag ==1 chris outlet and flag ==2 standard outlet */
		$outlet_id = Input::get('id');
		$data['flag'] = $flag = Input::get('flag');
		$data['type'] = $type =Input::get('type');
		$data['main_type'] = Input::get('main_type');
		$data['query'] = Outlet::where('id',$outlet_id)->first();
		$data['scheduleDate'] = PhysicianSchedule::getScheduleDateByIdAndFlag($outlet_id,$flag,$type);
		$data['outlet_fk'] = $outlet_id;
		return view('booking.outlet_details',$data);
	}
	/*end outlet section */
	
	
	/*get Time by tour id and date*/
	
	public function getTimeSlotByDateAndId(){
		
		$tour_id = Input::get('tour_id');
		$date = Input::get('date');
		
		$mgs = '';
		if($tour_id !='' && $date !=''){  
			$getDates = PhysicianSchedule::getTimeDateById($tour_id,$date);
			
			if(!empty($getDates)){
			
				foreach($getDates as $dates){
					$dates->start_times = date('h:i',strtotime($dates->start_time));
					$dates->end_times = date('h:i',strtotime($dates->end_time));
				}
			}
		}
		
		echo json_encode($getDates);
		
	}
	
	/*get Pax by schedule id*/
	public function getOutletTimeSlotByDateAndId(){
		
		$outlet_fk = Input::get('outlet_fk');
	
		$date = Input::get('date');
		
		$mgs = '';
		if($outlet_fk !='' && $date !=''){  
			$getDates = PhysicianSchedule::getOutletTimeDateById($outlet_fk,$date);
			
			if(!empty($getDates)){
			
				foreach($getDates as $dates){
					$dates->start_times = date('h:i',strtotime($dates->start_time));
					$dates->end_times = date('h:i',strtotime($dates->end_time));
				}
			}
		}
		
		echo json_encode($getDates);
		
	}
	public function getPaxByScheduleId(){
		
		$schedule_id = Input::get('id');
		
		$mgs = '';
		if($schedule_id !=''){  
			$getPax = PhysicianSchedule::getPaxByScheduleId($schedule_id);
			$paxresposen ='';
			if(!empty($getPax)){
			
				$totalpax = $getPax->max_person - $getPax->used_slot;
				$cnt =1;
				for($i=1;$i<=$totalpax;$i++){
					$paxresposen .='<div class="in_no" id="inp_no_id'.$cnt.'"><input class="styled-checkbox" id="styled-checkbox-'.$cnt.'" type="radio" name="'.$schedule_id.'" onclick="getPaxClick('.$cnt.')"><label for="styled-checkbox-'.$cnt.'">'.$cnt.'</label></div>';
				$cnt++;	
				}
				
			}
		}
		
		echo $paxresposen;
		
	}
	
	/*guest details for World tour */
	function geustDetails(){
		
		$data['tour_id']= $tour_id = Input::get('tour_id');
		$data['outlet_fk']= $outlet_fk = Input::get('outlet_fk');
		$data['city']=$city = Input::get('city');
		$data['date']=$date = Input::get('date');
		$data['time']=$time = Input::get('time');
		$data['pax']=$pax = Input::get('pax');
		$data['price']=$price = Input::get('price');
		$data['flag']=$flag = Input::get('flag');
		$data['auth'] = auth()->user();
		$data['type'] = $type = Input::get('type');
		$data['main_type'] = Input::get('main_type');
		return view('booking.guest_details',$data);
	}
	
	function booking_log(){
		$adminDetails = auth()->user();
		
		$username = Input::post('usrname');
		
		$maindata = array(
			'tour_id'=>Input::post('tour_id'),
			'user_id'=>$adminDetails['id'],
			'outlet_fk'=>Input::post('outlet_fk'),
			'date'=>date('Y-m-d',strtotime(Input::post('date'))),
			'time'=>Input::post('time'),
			'pax'=>Input::post('pax'),
			'price'=>Input::post('price'),
			'radio_group'=>Input::post('radio_group'),
			'created_date'=>date('Y-m-d'),
			'created_by'=>$adminDetails['id'],
			'type'=>Input::post('type'),
			'main_type'=>Input::post('main_type')
			
		);
		
		$insert = new  BookingLog($maindata);
		$insert->save();
		$insertss = $insert->id;
	
		if($insertss){
			
			foreach($username as $key=>$val){
				$lastname = Input::post('lastname');
			$email = Input::post('email');
		
			$phone = Input::post('phone');
				$datas_array = array(
					'booking_pay_id'=>$insertss,
					'first_name'=>$val,
					'last_name'=>$lastname[$key],
					'email'=>$email[$key],
					
					'phone'=>$phone[$key],
				);
			
				$subInsert = new  BookingPaymentLog($datas_array);
				$subInsert->save();
				$inserts =$subInsert->id;
			}
	
			return redirect('payment_detail?id='.$insertss.'&main_type='.Input::post('main_type'));
		}
	}
	
	function payment_details(){
		$data['id'] = $id = Input::get('id');
		$data['query']=$query = BookingLog::where('id',$id)->where('status',1)->first();
	
		$data['subquery']=$subquery = BookingPaymentLog::where('booking_pay_id',$id)->where('status',1)->get();
		if($query->type ==1){
			$data['getOutletDetails']=$getWorldDetails = Outlet::where('id',$query->outlet_fk)->first();
		}else{
			$data['getWorldDetails']=$getWorldDetails = WorldTour::select('city')->where('id',$query->tour_id)->first();
		}
		$data['getTimeSlotById']=$getTimeSlotById = PhysicianSchedule::select('start_time','end_time')->where('id',$query->time)->where('status',1)->first();
		
		return view('booking.payment_details',$data);
	}
	function globalbooking(){
		return view('booking.global');
	}
	
	function bookingPayment(){
		$id = Input::get('id');
		$data['query']=$query = BookingLog::where('id',$id)->where('status',1)->first();
	
	
		$pax = $query->pax;
		
		$post = array();
		if($query->type ==1){
				$insert = $this->checkout_outlet($id,$pax);
		}else{
			$insert = $this->checkout_worldTour($id,$pax);
		}
		if($insert){
			
			return redirect('/home');
		}else{
			return redirect('payment_detail?id='.$id);
		}
	}
	
	function checkout_outlet($id,$pax){ 
		$data['query']=$query = BookingLog::where('id',$id)->where('status',1)->first();
		$data['subquery']=$subquery = BookingPaymentLog::where('booking_pay_id',$id)->where('status',1)->get();
		$order_id ='';
		$merchantTxdID='';
		$gateWayTxdID= '';
		for ($i = 0; $i < $pax; $i++) {
			
				$post["user_fk"] = $query->user_id;
               
				$post["schedule_fk"] = $query->time;
				$post["physician_fk"] =42;
				
				$post["outlet_fk"] = $query->outlet_fk;
				$post["price"] = $query->price;
				$post["booking_date"] =$query->date;
				$post["remark"] = '';
				$post["Payment_status"] ='';
				//$post["invoice"] = $invoice;
				$post["transaction_id"] = '';
				$post["transaction_log"] ='';
				$post["pax"] = '1';
				$post["created_date"] = date("Y-m-d h:i:s");
				$post["status"] = 1;
				$post['first_name'] = $subquery[$i]['first_name'];
				$post['last_name'] = $subquery[$i]['last_name'];
				$post['email'] = $subquery[$i]['email'];
				$post['mobile'] = $subquery[$i]['phone'];
				$post['countryCode'] = $subquery[$i]['code'];
				$post['created_date'] = date("Y-m-d h:i:s");
			
				$bookings = new Booking($post);
				$bookings->save();
				$booking = $bookings->id;
				$get_outlet = Outlet::where(array('id' =>$query->outlet_fk))->first();

                    $ol_name = explode(" ", $get_outlet->name);

                    /* Changes of 03-12-2018  vishal d patel */
                    if ($get_outlet->outlet_type == 1) {
                        $start = "MCL";
                    } else {
                        $start = "M";
                    }
                    $s1 ="";
                    foreach($ol_name as $keys){
                         $s1 .= strtoupper(substr($keys, 0, 1));
                    }

                   $bid = DB::table('clm_booking_master')->select('booking_id')->where('status',1)->where('booking_id','!=','')->orderBy('id','desc')->first();

                   $explode = explode('-',$bid->booking_id);
                   $booking_ids =$explode[1]+1;
				    $c_date = date('Y-m-d');
                    $ol_date = explode("-", $c_date);
                    $d1 = $ol_date[1];
                    $sdd = substr($ol_date[0], 2, 3);
                    $post['booking_id'] = $booking_id = $start . $s1 . $d1 . $sdd . '-00' . $booking_ids;
					/*Here is code to call the POS API Helper. 
					POS HELPER IS INSIDE THE HELPERS FOLDER.					
					*/
					//$test =POSAPIHelpers::create_appointment_on_outlet((object)$post);
					
                    $invoice = "INV-" . $s1 .  date('m') . date('y') . "/00" . $booking_ids;
                    $update = Booking::where('id', $booking)->update(array("booking_id" => $booking_id, "invoice" => $invoice, 'order_number' => $order_id, 'merchant_id' => $merchantTxdID, 'gateway_txt_id' => $gateWayTxdID));

                    $this->qr_genrator_fun($booking, $booking_id, ucwords($get_outlet->name));
				$get_slot = PhysicianSchedule::where(array('id' => $query->time, 'status' => 1))->first();					
			}
			$i;
			if($update){
				$used_slot = $get_slot->used_slot + $pax;
                    $update_slot = PhysicianSchedule::where('id', $query->time)->update(array("used_slot" => $used_slot));
	
				$tepm = $update;
			}else{
				$tepm =0;
			}
			return $tepm;
			
		
	}
	function checkout_worldTour($id,$pax){
		$data['query']=$query = BookingLog::where('id',$id)->where('status',1)->first();
		$data['subquery']=$subquery = BookingPaymentLog::where('booking_pay_id',$id)->where('status',1)->get();
		$order_id ='';
		$merchantTxdID='';
		$gateWayTxdID= '';
		for ($i = 0; $i < $pax; $i++) {
			
				$post["user_fk"] = $query->user_id;
               
				$post["schedule_fk"] = $query->time;
				$post["physician_fk"] =1;
				$post["wt_fk"] = $query->tour_id;
				$post["price"] = $query->price;
				$post["booking_date"] =$query->date;
				$post["remark"] = '';
				$post["Payment_status"] ='';
				//$post["invoice"] = $invoice;
				$post["transaction_id"] = '';
				$post["transaction_log"] ='';
				$post["pax"] = '1';
				$post["created_date"] = date("Y-m-d h:i:s");
				$post["status"] = 1;
				$post['first_name'] = $subquery[$i]['first_name'];
				$post['last_name'] = $subquery[$i]['last_name'];
				$post['email'] = $subquery[$i]['email'];
				$post['mobile'] = $subquery[$i]['phone'];
				$post['countryCode'] = $subquery[$i]['code'];
				$post['created_date'] = date("Y-m-d h:i:s");
				$bookings = new Booking($post);
				$bookings->save();
				$booking = $bookings->id;
			
				 $tour = WorldTour::where('id', '=', $query->tour_id)->get();

                     $len = strlen($wt_fk);

                    if ($len = 1) {
                        $digit = "0" . $wt_fk;
                    } else {
                        $digit = $wt_fk;
                    }
                    /* changes of 03-12-2018 vishal d patel */
                    if ($tour[0]->world_tour == 1) {
                        $start = "MCLWT";
                    } else {
                        $start = "WT";
                    }
                    $bid = Booking::select('booking_id')->where('status',1)->orderBy('id','desc')->get();
                    $explode = explode('-',$bid[1]->booking_id);
                   $booking_ids =$explode[1]+1;
                    if ($tour[0]->tour_id[0] == 'M' || $tour[0]->tour_id[0] == 'W') {
                        $booking_id = $tour[0]->tour_id . "-000" . $booking_ids;
                    } else {
                        $booking_id = $start . $tour[0]->tour_id . "-000" . $booking_ids;
                    }
                    /* changes of 03-12-2018 vishal d patel */
                    //$booking_id = "WT" . $digit . "-00" . $booking;
                    $invoice = "INV-WT" . date('m') . date('y') . "/00" . $booking_ids;
                    $update = Booking::where('id', $booking)->update(array("booking_id" => $booking_id, "invoice" => $invoice, 'order_number' => $order_id, 'merchant_id' => $merchantTxdID, 'gateway_txt_id' => $gateWayTxdID));
                    $tour = WorldTour::where(array('id' => $wt_fk))->first();
                    $country_name = Country::where(array('id' => $tour->country_fk))->first();
                    $text = "World Tour_" . ucwords($country_name->name) . "_" . ucwords($tour->city);
                    $this->qr_genrator_fun($booking, $booking_id, $text);
					$get_slot = PhysicianSchedule::where(array('id' => $query->time, 'status' => 1))->first();	
			}
			 $i;
			if(  $update){
				$used_slot = $get_slot->used_slot + $pax;
                    $update_slot = PhysicianSchedule::where('id', $query->time)->update(array("used_slot" => $used_slot));
				$tepm = $update;
			}else{
				$tepm = 0;
			}
		return $tepm;
	}
	
	 public function qr_genrator_fun($booking, $booking_id, $text = "test") {

        if ($booking != NULL && $booking_id != NULL) {
            $bookingInfo = Booking::selectRaw("clm_booking_master.*, sc.start_time,sc.end_time")
                    ->leftjoin("clm_physician_schedule_master as sc", "sc.id", "=", "clm_booking_master.schedule_fk")
                    ->where("clm_booking_master.booking_id", "=", $booking_id)
                    ->first();

            $booking_id = $text . "_" . $bookingInfo->booking_id . '_' . $bookingInfo->first_name . ' ' . $bookingInfo->last_name . '_' . date('h:i',strtotime($bookingInfo->start_time)) . '_' . date('h:i',strtotime($bookingInfo->end_time));

            $destinationPath = public_path() . '/upload/';
            $filename = "Booking_" . date("Ymdhisa") . '.png';
            $image = QRCode::text($booking_id)->setErrorCorrectionLevel('H')->setSize(4)->setMargin(3)->setOutfile($destinationPath . $filename)->png();
            if ($text) {
                $data = Booking::where('id', $booking)->update(array("qrcode" => $filename));
             return 1;
            } else {

               return 0;
            }
        } else {
             return 0;
        }
    }
}
