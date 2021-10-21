<?php
namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class BookingPaymentLog extends Authenticatable
{
    use Notifiable;
    protected $table = 'clm_booking_detail_log';
    public $timestamps = false;
    protected $fillable = ['id', 'booking_pay_id', 'first_name','last_name','email','code', 'phone','status'];
    
    

}

?>   