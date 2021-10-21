@include('auth/include/header')
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

                            <div class="col-xl-12">
                                <p class="Muli-Bold hdr_p">
                                    Please enter and verify your phone number
                                </p>
                            </div>



                            <form id="verification_phone" method="post">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <input type="hidden" value="<?= $user->id ?>" name="id">

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="mm2">
                                    <label class="Muli-Bold lable_class">Phone Number</label>                                           
									 <input type="tel" id="phone12" name="phone" class="w-100 phones" type="tel" autocomplete="off" data-intl-tel-input-id="0" value="+<?php echo $user->country_code;?>" placeholder="(201) 555-0123">
                                    <span id="phoneerror" style="color:red"></span>
                                </div>
                                <input type="hidden" id="country_code" name="country_code" value="">

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-5" id="mmf2">
                                    <button type="submit" id="send_otp_btn" class="my-4 btn-red-cstm Muli-Bold pd_cstm2" >Request Varification Code</button>
                                    <div id="resend_count_div"></div>
                                </div>
                            </form>
                            <form id="verify_otp" style="display:none;">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <input type="hidden" value="<?= $user->id ?>" name="id">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-5">
                                    <label class="Muli-Bold lable_class">Enter Varification Code</label>  
                                    <input type="password" name="otp" id="otp" class="form-control" placeholder="" required/>

                                    <span id="otperror" style="color:red"></span>
                                </div>

                                <div class="col-xl-12 col-12 mt-5">
                                    <div class="btn_width">
                                        <button type="submit" class="my-4 btn-red-cstm Muli-Bold pd_cstm2">Verify</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </div>
</section>

<script src='https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.7/js/intlTelInput.js'></script>

					<script>
					 var telInput = $("#phone1");
						telInput.intlTelInput({
							preferredCountries: ['gr'],
							separateDialCode: true,
							utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js"
						});
					  

					// on blur: validate
						telInput.blur(function () {
							if ($.trim(telInput.val())) {
								if (telInput.intlTelInput("isValidNumber")) {
									var getCode = telInput.intlTelInput('getSelectedCountryData').dialCode;
									$('#country_code').val(getCode);
								} else {

									telInput.addClass("error");
										  errorMsg.removeClass("hide");
								}
							}
						});
				
					
				
						$('.country-list li .country').change(function(e){
						 console.log($('.country').attr('data-dial-code'))
						});
					</script>	
<script>

    function resend_count() {
        var timeLeft = 30;
        var elem = document.getElementById('resend_count_div');

        var timerId = setInterval(countdown, 1000);

        function countdown() {
            if (timeLeft == 0) {
                clearTimeout(timerId);
                elem.innerHTML = "";
                $('#send_otp_btn').attr("disabled", false);
                $('#phone1').attr("disabled", false);
                doSomething();
            } else {
                elem.innerHTML = timeLeft + ' seconds remaining';
                timeLeft--;
            }
        }
    }


    $("#verification_phone").submit(function (event) {
		
        $('#country_code').val($("#phone12").intlTelInput("getSelectedCountryData").dialCode);
        event.preventDefault();
        var phone = $('#phone1').val();
        if (phone == "") {
            $('#phoneerror').html('Phone required');
            return false;
        } else {
            $('phoneerror').html('');
            event.preventDefault();
            var alldata = $('#verification_phone').serialize();
            $.ajax({
                type: 'POST',
                data: alldata,
                url: "<?php echo URL::to('/verify-phone'); ?>",
                cache: false,
                dataType: "json",
                success: function (data) {
                    if (data == 1) {
                        $('#send_otp_btn').attr("disabled", true);
                        $('#phone').attr("disabled", true);
                        $('#verify_otp').toggle();
                        resend_count();
                    }
                }
            });
        }
    });
    $("#verify_otp").submit(function (event) {
        event.preventDefault();
        var otp = $('#otp').val();
        if (otp == "") {
            $('#otperror').html('OTP required');
            return false;
        } else {
            $('otperror').html('');
            event.preventDefault();
            var alldata = $('#verify_otp').serialize();
            $.ajax({
                type: 'POST',
                data: alldata,
                url: "<?php echo URL::to('/verify-otp'); ?>",
                cache: false,
                dataType: "json",
                success: function (data) {
                    if (data == 1) {
                        window.location.href = "<?php echo URL::to('/home'); ?>";
                    } else {
                        $('#otperror').html('OTP Invalid');
                        return false;
                    }
                }
            });
        }
    });
	setTimeout(function(){ 
	$("#phone12").val('<?= $user->phone ?>');
	 }, 500);
</script>



@include('auth/include/footer')