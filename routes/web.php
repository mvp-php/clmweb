<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/verify-mobile', 'RegisterOtpController@index')->name('home');
Route::post('/verify-phone', 'RegisterOtpController@verifyPhone')->name('home');
Route::post('/verify-otp', 'Auth\LoginController@verifyOtp')->name('home');
Route::post('check_user_login_email', 'Auth\LoginController@check_user_login_email');
Route::post('check_user_login_password', 'Auth\LoginController@check_user_login_password');
Route::post('duplicateEmail','Auth\RegisterController@duplicateEmail');
Route::post('duplicatePhone','Auth\RegisterController@duplicatePhone');
	
/*forgot password*/

Route::get('/forgot-password', 'ForgotPasswordController@index');
Route::post('/forgot-password-mail-verify', 'ForgotPasswordController@emailVerify');
Route::post('/verify-forgot-otp', 'ForgotPasswordController@emailOtpVerify');
Route::get('/reset-password', 'ForgotPasswordController@reset_password');

/*facebook login*/
Route::post('facebookLogin', 'SocialAuthController@index');
Route::post('GoogleLogin', 'SocialAuthController@GoogleLogin');


/*my booking list*/
Route::any('my-booking-outlet', 'BookingHistoryController@index');
Route::any('my-booking-worldtour', 'BookingHistoryController@world_tour');
Route::any('my-booking-history-outlet', 'BookingHistoryController@history_outlet');
Route::any('my-booking-history-worldtour', 'BookingHistoryController@history_worltour');
Route::any('booking-detail/{id}', 'BookingHistoryController@booking_details');
Route::any('booking-detail-worltour/{id}', 'BookingHistoryController@booking_details_worltour');

/*support*/
Route::any('support', 'HomeController@support');

/********************Vishal d patel code start *****************/
Route::get('outlet-worldtour','BookingController@index');
Route::get('worldtour-list','BookingController@worltour_list');

Route::get('getworldTourListByFlag','BookingController@getworldTourListByFlag');
Route::get('worldtour_details','BookingController@worldtour_details');
Route::post('getTimeSlotByDateAndId','BookingController@getTimeSlotByDateAndId');
Route::post('getOutletTimeSlotByDateAndId','BookingController@getOutletTimeSlotByDateAndId');
Route::post('getPaxByScheduleId','BookingController@getPaxByScheduleId');
Route::get('guestDetails','BookingController@geustDetails');
Route::post('booking_log','BookingController@booking_log');
Route::get('payment_detail','BookingController@payment_details');

Route::get('outlet-list','BookingController@outlet_list');
Route::get('getOutletListByFlag','BookingController@getOutletListByFlag');
Route::get('outlet_details','BookingController@outlet_details');
Route::post('booking', 'BookingController@bookingPayment');
/*******************End Vishal d patel code start**************/

Route::get('aboutus','AboutUsController@index');
Route::get('services','ServicesController@index');
Route::get('ourteam','OurTeamController@index');
Route::get('ourcenters','OurCentersController@index');