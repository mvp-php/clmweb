@include('auth/include/header')
    <style>
		.error{
			color:red;
		}
		#phone_error{
			display: inline-block;
		}
		.iti.iti--allow-dropdown{
			margin-top:32px;
		}
	</style>
	<!-- contact -->
	
    <section class="mail pt-lg-5 pt-4" style="min-height:800px">
        <div class="container pt-lg-5">
            <div class="row row_cstm agileinfo_mail_grids">
                <div class="col-xl-12 col-lg-12 col-md-12 mt-lg-0 mt-4 p-0">
                    <div class="box box_cstm clearfix width_cstm">
                        <center>
                            <div class="box_header">
                                <h2 class="hdr PlayfairDisplaySC-Bold">
                                    Register
                                </h2>
                                <hr class="cstm_hr">
                            </div>
                            <div class="box_i" id="input_id">
                    <form  method="POST" action="{{ route('register') }}" id="submitId">
                        {{ csrf_field() }}
					<div class="row">
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 {{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <input  type="text" class="form-group" name="first_name" value="{{ old('first_name') }}" placeholder="First Name" id="fname_id" autofocus>
								<span class="error" id="fname_error">{{ $errors->first('first_name') }}</span>
                              <!--  @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif-->
                        </div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 {{ $errors->has('last_name') ? ' has-error' : '' }}">
								<input  type="text" class="form-group" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" id="lname_id" autofocus>
								<span class="error" id="lname_error">{{ $errors->first('last_name') }}</span>
                                <!-- @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif-->
                         </div>
						
						</div>
						<div class="row mt-2">
						
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12{{ $errors->has('password') ? ' has-error' : '' }}">

                                <input id="password" type="password" class="form-group" placeholder="Password" name="password" >
								<span class="error" id="pass_error">{{ $errors->first('password') }}</span>
                                <!-- @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif-->
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

                                <input id="password-confirm" type="password" class="form-group" name="password_confirmation" placeholder="Confirm Password">
								<span class="error" id="cpass_error">{{ $errors->first('password_confirmation') }}</span>
						</div>
						</div>
						
						
						<div class="row">
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">

                                <input id="email" type="email" placeholder="Email" class="form-group mt4" name="email" value="{{ old('email') }}">
								<span class="error" id="email_error">{{ $errors->first('email') }}</span>
                                     <!-- @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif-->
                        </div>
						
						 <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12{{ $errors->has('phone') ? ' has-error' : '' }}" id="mm2">
							<label class="Muli-Bold lable_class"></label>
							<input type="tel" id="phone" name="phone" class="w-100 mt4"  autocomplete="off" data-intl-tel-input-id="0" placeholder="(201) 555-0123">
							 <span class="error" id="phone_error">{{ $errors->first('phone') }}</span>
							 <!--@if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif-->
						</div>
							<input type="hidden" id="country_code" name="country_code" value="">
										
						</div>
						<div class="col-xl-12 mt-5">
                                          <button type="submit" onclick="return getcode();" class="my-4 btn-red-cstm Muli-Bold pd_cstm2">REGISTER</button>
                                    </div>
                    </form>
               </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //contact -->
  <script>
	$('#submitId').submit(function(e){
		var fname = $('#fname_id').val();
		var lname = $('#lname_id').val();
		var password = $('#password').val();
		var password_confirm = $('#password-confirm').val();
		var email = $('#email').val();
		var phone = $('#phone').val();
	
		var check_email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		 var numbers = /^[0-9]+$/;
		var cnt =0;
		$('#fname_error').html("");
		$('#lname_error').html("");
		$('#pass_error').html("");
		$('#cpass_error').html("");
		$('#email_error').html("");
		$('#phone_error').html("");
		if(fname ==''){
			$('#fname_error').html("First name is required.");
			cnt =1;
		}
		if(fname !=''){
			if (!/^[a-zA-Z\s]*$/g.test(fname)) {
				$('#fname_error').html("Only character allowed.");
				cnt =1;
			}
		}
		if(lname ==''){
			$('#lname_error').html("Last name is required.");
			cnt =1;
		}
		if(lname !=''){
			if (!/^[a-zA-Z\s]*$/g.test(lname)) {
				$('#lname_error').html("Only character allowed.");
				cnt =1;
			}
		}
		if(password ==''){
			$('#pass_error').html("Password is required.");
			cnt =1;
		}
		if(password !=''){
			if (password.length >= 6) {
            } else {
                $('#pass_error').html("Password atleast six chanarcters allowed");
                cnt = 1;
            }

		}
		if(password_confirm ==''){
			$('#cpass_error').html("Confirm password is required.");
			cnt =1;
		}
		if (password != '' && password_confirm != '') { 
            if (password != password_confirm) {
                $('#cpass_error').html("Password and confirm password does not match");
                cnt = 1;
            }
        }
		if(email ==''){
			$('#email_error').html("Email address is required.");
			cnt =1;
		}
		
		if(email !=''){
			if (email.match(check_email)) {
				$.ajax({
					async:false,
					global:false,
					url:"<?php echo URL::to('/');?>/duplicateEmail",
					type:"POST",
					data:{"email":email,"_token":"<?php echo CSRF_TOKEN();?>"},
					success:function(response){
						if(response ==1){
							cnt =0;
						}else{
							$('#email_error').html("Email address already exist.");
							cnt =1;
						}
					}
				});
			}else{
				 $('#email_error').html("Please enter valid email address");
                cnt = 1;
			}
		}
		if(phone ==''){
			$('#phone_error').html("Phone number is required.");
			cnt =1;
		}
		
		if(phone !=''){
			if(phone.match(numbers)){	
				$.ajax({
					async:false,
					global:false,
					url:"<?php echo URL::to('/');?>/duplicatePhone",
					type:"POST",
					data:{"phone":phone,"_token":"<?php echo CSRF_TOKEN();?>"},
					success:function(response){
						if(response ==1){
							cnt =0;
						}else{
							$('#phone_error').html("Phone number already exist.");
							cnt =1;
						}
					}
				});
			}
		}
		if(cnt ==1){
			return false;
		}else{
			return true;
		}
		
	});
  </script>
@include('auth/include/footer')