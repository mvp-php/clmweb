<?php
namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class BookingLog extends Authenticatable
{
    use Notifiable;
    protected $table = 'clm_booking_mlog';
    public $timestamps = false;
    protected $fillable = ['id', 'user_id','tour_id', 'outlet_fk','date','time','type','pax', 'price', 'status','created_date', 'created_by','main_type'];
    
    

}

?>   