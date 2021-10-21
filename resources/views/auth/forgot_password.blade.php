@include('auth/include/header')
<section class="mail pt-lg-5 pt-4" style="min-height:800px">
    <div class="container pt-lg-5">
        <div class="row row_cstm agileinfo_mail_grids">
            <div class="col-xl-12 col-lg-12 col-md-12 mt-lg-0 mt-4 p-0">
                <div class="box box_cstm clearfix width_cstm">
                    <center>
                        <div class="box_header">
                            <h2 class="hdr PlayfairDisplaySC-Bold">
                                Forgot password
                            </h2>
                            <hr class="cstm_hr">
                        </div>
                        <div class="box_i" id="input_id">

                            <div class="col-xl-12">
                                <p class="Muli-Bold hdr_p">
                                    Please enter and verify your phone number or email
                                </p>
                            </div>



                            <form id="send_mail" method="post">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <label class="Muli-Bold lable_class">Email</label>                                  
                                    <input type="text" id="email" name="email" class="w-100" autocomplete="off"   value="" placeholder="Enter email">
                                    <span id="emailerror" style="color:red"></span>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-5">
                                    <button type="submit" id="send_otp_btn" class="my-4 btn-red-cstm Muli-Bold pd_cstm2" >Request Varification Code</button>
                                    <div id="resend_count_div"></div>
                                </div>
                            </form>
                            <form id="verify_otp" style="display:none;">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
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
                        <div class="box_i" id="reset_form_div" style="display:none;">
                            <form id="reset_form">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <div class="col-xl-12">
                                    <p class="Muli-Bold hdr_p">
                                        Enter a new password for
                                        account <span id="reset_email"></span>
                                    </p>
                                </div>
                                <div class="col-xl-12">
                                    <label class="Muli-Bold lable_class">Enter a new password</label>
                                    <input type="password" name="password" id="password" class="form-group" placeholder="">
                                    <span id="passerror" style="color:red"></span>
                                    <label class="Muli-Bold lable_class">Confirm a new password</label>
                                    <input type="password" name="cpassword" id="cpassword" class="form-group mt-2" placeholder="">
                                    <span id="cpasserror" style="color:red"></span>
                                </div>

                                <div class="col-xl-12 mt-5">
                                    <button class="my-4 btn-red-cstm Muli-Bold pd_cstm2" type="submit">reset my password</button>
                                </div>
                            </form>
                        </div>
                </div>
                </center>
            </div>
        </div>
    </div>
</div>
</section>

<script>

    $("#send_mail").submit(function (event) {
        event.preventDefault();
        var email = $('#email').val();
        if (email == "") {
            $('#emailerror').html('Email required');
            return false;
        } else {
            $('emailerror').html('');
            event.preventDefault();
            var alldata = $('#send_mail').serialize();
            $.ajax({
                type: 'POST',
                data: alldata,
                url: "<?php echo URL::to('/forgot-password-mail-verify'); ?>",
                cache: false,
                dataType: "json",
                success: function (data) {
                    if (data == 1) {
                        alert("verified!");
                        $('#send_otp_btn').attr("disabled", true);
                        $('#email').attr("readonly", true);
                        $('#phone').attr("disabled", true);
                        $('#verify_otp').show();
                    }
                }
            });
        }
    });
    $("#verify_otp").submit(function (event) {
        event.preventDefault();
        var otp = $('#otp').val();
        var email = $('#email').val();
        if (otp == "") {
            $('#otperror').html('OTP required');
            return false;
        } else {
            $('otperror').html('');
            event.preventDefault();
            var alldata = $('#verify_otp').serialize();
            $.ajax({
                type: 'POST',
                data: {'email': email, 'otp': otp, '_token':'<?php echo csrf_token(); ?>'},
                url: "<?php echo URL::to('/'); ?>/verify-forgot-otp",
                cache: false,
                dataType: "json",
                success: function (data) {
                    if (data == 1) {
                        alert("OTP verified!");
                        $('#input_id').hide();
                        $('#reset_form_div').show();
                    } else {
                        $('#otperror').html('OTP Invalid');
                    }
                }
            });
        }
    });


    $("#reset_form").submit(function (event) {
        event.preventDefault();
        var email = $('#email').val();
        var password = $('#password').val();
        var cpassword = $('#cpassword').val();
        var temp = 0;
        if (password == "") {
            $('#passerror').html('Password required');
            temp++;
        } else {
            $('#passerror').html('');
        }
        if (cpassword == "") {
            $('#cpasserror').html('Confirm password required');
            temp++;
        } else {
            $('#cpasserror').html('');
        }
        if (password != cpassword) {
            $("#cpasserror").html('Password and confirm password does not match!');
            $("#cpasserror").html('Password and confirm password does not match!');
            temp++;
        }
        if (temp == 0) {
            $.ajax({
                type: 'GET',
                data: {'email': email, 'password': password},
                url: "<?php echo URL::to('/reset-password'); ?>",
                cache: false,
                dataType: "json",
                success: function (data) {
                    if (data == '1') {
                        alert("Password Reset Successfully!");
                        window.location.href = "<?php echo URL::to('/'); ?>";
                    }
                }
            });
        }
    });
</script>



@include('auth/include/footer')