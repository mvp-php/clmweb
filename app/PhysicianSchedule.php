<?php
namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PhysicianSchedule extends Authenticatable
{
    use Notifiable;
    protected $table = 'clm_physician_schedule_master';
    public $timestamps = false;
    protected $fillable = ['id', 'tour_name', 'tour_id','physician_fk', 'outlet_fk', 'date','max_person', 'used_slot', 'session','price', 'type', 'image','start_time','end_time','chris_leonge_type','status','address1','address2','city','postcode','country_fk','state','latitude','longitude','world_tour','wstatus','start_date','end_date','display','created_date','created_by','upadted_date','updated_by','deleted_date','deleted_by'];
    
	public static function getScheduleDateByIdAndFlag($tour_id,$flag,$type=null){ 
		
		
		if($flag ==1){
			$temp ='chris_leonge_type="1"';
		}else{
			$temp ='chris_leonge_type IS NULL';
		}
		if($type ==1){
		
			 $query = PhysicianSchedule::select('start_date')->where('outlet_fk',$tour_id)->whereRaw($temp)->where('status',1)->where('start_date','>=',date('Y-m-d'))->groupBy('start_date')->get();
		}else{
			 $query = PhysicianSchedule::select('start_date')->where('tour_id',$tour_id)->whereRaw($temp)->where('status',1)->groupBy('start_date')->get();
			
		}
	  
		return $query;
	}
	public static function getTimeDateById($tour_id,$date){ 
		$date = date('Y-m-d',strtotime($date));
	   $query = PhysicianSchedule::select('id','start_time','end_time','session')->where('tour_id',$tour_id)->where('start_date',$date)->where('status',1)->where('display',1)->get();

		return $query;
	}
	public static function getOutletTimeDateById($tour_id,$date){ 
		$date = date('Y-m-d',strtotime($date));
	   $query = PhysicianSchedule::select('id','start_time','end_time','session')->where('outlet_fk',$tour_id)->where('start_date',$date)->where('status',1)->where('display',1)->get();

		return $query;
	}
	public static function getPaxByScheduleId($id){ 
	   $query = PhysicianSchedule::select('id','max_person','used_slot')->where('id',$id)->where('status',1)->first();
		return $query;
	}
   
}

?>   