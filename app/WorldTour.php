<?php
namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class WorldTour extends Authenticatable
{
    use Notifiable;
    protected $table = 'clm_world_tour_master';
    public $timestamps = false;
    protected $fillable = ['id', 'image', 'tour_id','wt_id_malay','wt_id_chinese','physician_fk', 'address1', 'address1_malay','address1_chinese', 'address2', 'address2_malay','address2_chinese', 'city', 'city_malay','city_chinese','postcode','country_fk','state','latitude','longitude','price','max_person','used_slot','world_tour','wstatus','currency_code','start_date','end_date','start_time','end_time','type','location','location_malay','location_chinese','status','created_date','created_by','upadted_date','updated_by','deleted_date','deleted_by'];
    
    public static function getWorldList($flag){
		
		if($flag ==1){
			$temp = 1;
		}else{
			$temp = 2;
		}
	
        $query = WorldTour::where("status","=","1")->where("wstatus","=","1")->where('world_tour',$temp)->orderBy("id","desc")->get();
        return $query;
    }

}

?>   