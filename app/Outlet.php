<?php
namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Outlet extends Authenticatable
{
    use Notifiable;
    protected $table = 'clm_outlet_master';
    public $timestamps = false;
    protected $fillable = [
        'name', 'name_malay', 'name_chinese','outlet_id', 'contact_no', 'email','icon', 'country_fk', 'state_fk','city_fk', 'city_fk_malay', 'city_fk_chinese','address1','address1_malay','address1_chinese','address2','address2_malay','address2_chinese','postcode','longitude','latitude','opening_hour_start','opening_hour_end','currency_fk','booking_fee','remark','status','created_date','created_by','upadted_date','upadted_by','deleted_date','deleted_by','outlet_status','TransactionType','PaymentMethod','Password','ServiceId','PaymentDesc','MerchantName','paymentID','outlet_type'
    ];

    public static function getOutletList($flag){
		
		if($flag ==1){
			$temp = 1;
		}else{
			$temp = 2;
		}
	
        $query = Outlet::where("status","=","1")->where("outlet_status","=","1")->where('outlet_type',$temp)->orderBy("id","desc")->get();
        return $query;
    }
    
 }

?>   