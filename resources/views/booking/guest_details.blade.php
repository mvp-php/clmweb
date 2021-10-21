@include('auth/include/header')
<section class="mail pt-lg-5 pt-4" style="min-height:800px; background-color: #f2f2f2;">
        <div class="container">
            <div class="row row_cstm agileinfo_mail_grids">
                <div class="col-xl-12 col-lg-12 col-md-12 mt-lg-0 mt-0 p-0">
                    <div class="pr_cptn">
                        <h1 class="pr_caption"><?php echo $city;?></h1>
                    </div>
					<form action="<?php echo URL::to('/');?>/booking_log" method="POST" enctype="multipart-form/data" onsubmit="return checkValidation();">
					<input type="hidden" name="_token" value="<?php echo CSRF_TOKEN();?>">
					<input type="hidden" name="tour_id" value="<?php echo $tour_id;?>">
					<input type="hidden" name="outlet_fk" value="<?php echo $outlet_fk;?>">
					<input type="hidden" name="date" value="<?php echo $date;?>">
					<input type="hidden" name="time" value="<?php echo $time?>">
					<input type="hidden" name="pax" value="<?php echo $pax;?>" id="paxId">
					<input type="hidden" name="price" value="<?php echo $price;?>">
					<input type="hidden" name="flag" value="<?php echo $flag;?>">
					<input type="hidden" name="type" value="<?php echo $type;?>">
					<input type="hidden" name="main_type" value="<?php echo $main_type;?>">
					
                    <div class="row pt-5">
					
					 <div class="col-xl-6 col-sm-12 col-12">
                            <div class="guest1_card clearfix">
                                <h4 class="gs_card Muli-Bold color-22">
                                 
								   <div class="in_no" id="inp_no_id">
										<input class="styled-checkbox" id="styledd289s" type="radio" name="radio-group" onclick="getAdminAuth(1);">
										<label for="styledd289s" class="Muli-regular"></label>
                                    </div>
								
								   Guest 1
                                </h4>
                                <hr class="m-0">

                                <div class="input_pd">
                                    <div class="col-xl-12 pt-3">
                                        <label class="Muli-Bold lable_class w-100 color-22">First Name</label>
                                        <input type="text" name="usrname[]" id="fid1" class="form-group w-100" placeholder="Jamie">
                                    <label class="val_label" id="fidError1"></label>
									</div>

                                    <div class="col-xl-12 pt-2">
                                        <label class="Muli-Bold lable_class w-100 color-22">Last Name</label>
                                        <input type="text" name="lastname[]" id="lid1" class="form-group w-100" placeholder="Peak">
										<label class="val_label" id="lidError1"></label>
                                    </div>


                                    <div class="col-xl-12 pt-2">
                                        <label class="Muli-Bold lable_class w-100 color-22">Email</label>
                                        <input type="text" name="email[]" id="emailid1" class="form-group w-100" placeholder="error@name,com">
                                        <!-- <p class="error_msd">Something is wrong</p> -->
										<label class="val_label" id="emailidError1"></label>
                                    </div>
									<span id="authid">
										<div class="col-xl-12 pt-4" id="mm">
											<label class="Muli-Bold lable_class w-100">Phone Number</label>
											<input id="phone123" name="phone[]"   autocomplete="off" data-intl-tel-input-id="0"  type="tel" value="+<?php echo $auth->country_code;?>">
											<label class="val_label" id="phoneError1234"></label>
										</div>
									</span>
                                   
                                  
									<input type="hidden" id="country_code1" name="country_code[]" value="">
                                </div>
                            </div>
                        </div>
						 <style>
							label#phoneError1{
									margin-top:10px;
							}
						 </style>
						 <script src='https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.7/js/intlTelInput.js'></script>
						<script>
						
							$("#phone1").intlTelInput({
							  utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
							});

						</script>	
					<?php   for($i=2; $i<=$pax;$i++){ ?>
                        <div class="col-xl-6 col-sm-12 col-12">
                            <div class="guest1_card clearfix">
                                <h4 class="gs_card Muli-Bold color-22">
                                   <?php if($i==1){?>
								   <div class="in_no" id="inp_no_id">
										<input class="styled-checkbox" id="styledd289s" type="radio" name="radio-group" onclick="getAdminAuth(1);">
										<label for="styledd289s" class="Muli-regular"></label>
                                    </div>
									
								   <?php }?>
								   Guest <?php echo $i;?>
                                </h4>
                                <hr class="m-0">

                                <div class="input_pd">
                                    <div class="col-xl-12 pt-3">
                                        <label class="Muli-Bold lable_class w-100 color-22">First Name</label>
                                        <input type="text" name="usrname[]" id="fid<?php echo $i; ?>" class="form-group w-100" placeholder="Jamie">
                                    <label class="val_label" id="fidError<?php echo $i; ?>"></label>
									</div>

                                    <div class="col-xl-12 pt-2">
                                        <label class="Muli-Bold lable_class w-100 color-22">Last Name</label>
                                        <input type="text" name="lastname[]" id="lid<?php echo $i; ?>" class="form-group w-100" placeholder="Peak">
										<label class="val_label" id="lidError<?php echo $i; ?>"></label>
                                    </div>


                                    <div class="col-xl-12 pt-2">
                                        <label class="Muli-Bold lable_class w-100 color-22">Email</label>
                                        <input type="text" name="email[]" id="emailid<?php echo $i; ?>" class="form-group w-100" placeholder="error@name,com">
                                        <!-- <p class="error_msd">Something is wrong</p> -->
										<label class="val_label" id="emailidError<?php echo $i; ?>"></label>
                                    </div>
									
                                    <div class="col-xl-12 pt-4 testind<?php echo $i;?>" id="mm">
                                        <label class="Muli-Bold lable_class w-100">Phone Number</label>
                                        <input id="phone<?php echo $i;?>" name="phone[]"   type="tel">
										<label class="val_label" id="phoneError<?php echo $i; ?>"></label>
                                    </div>
									<input type="hidden" id="country_codew<?php echo $i;?>" name="country_code[]" value="">
                                </div>
                            </div>
                        </div>
						 <style>
							label#phoneError<?php echo $i; ?>{
									margin-top:10px;
							}
						 </style>
						 <script src='https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.7/js/intlTelInput.js'></script>
						<script>
						$('#country_code<?php echo $i;?>').val($("#phone<?php echo $i;?>").intlTelInput("getSelectedCountryData").dialCode);
							$("#phone<?php echo $i;?>").intlTelInput({
							  utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
							});

						</script>	
					<?php }  ?>
					

                        <!--<div class="col-xl-6 col-sm-12 col-12">
                            <div class="guest1_card clearfix">
                                <h4 class="gs_card Muli-Bold color-22">
                                    Guest 2
                                </h4>
                                <hr class="m-0">

                                <div class="input_pd">
                                    <div class="col-xl-12 col-12 pt-3">
                                        <label class="Muli-Bold lable_class w-100 color-22">First Name</label>
                                        <input type="text" name="usrname" class="form-group w-100" placeholder="Jamie">
                                    </div>

                                    <div class="col-xl-12 col-12 pt-2">
                                        <label class="Muli-Bold lable_class w-100 color-22">Last Name</label>
                                        <input type="text" name="lastname" class="form-group w-100" placeholder="Peak">
                                    </div>


                                    <div class="col-xl-12 col-12 pt-2">
                                        <label class="Muli-Bold lable_class w-100 color-22">Email</label>
                                        <input type="text" name="email" class="form-group w-100" placeholder="error@name,com">
                                        <p class="error_msd">Something is wrong</p>
                                    </div>

                                    <div class="col-xl-12 col-12 pt-4" id="mm2">
                                        <label class="Muli-Bold lable_class w-100">Phone Number</label>
                                        <input id="phone33" name="phone" type="tel">
                                    </div>


                                </div>
                            </div>
                        </div>-->

                    </div>




                    <div class="row">
                        <div class="col-xl-12" id="guest_btn_id">
                            <div class="col-xl-2 col-md-2 col-lg-2 col-12">
                            </div>

                            <div class="col-xl-4 col-md-4 col-lg-4 col-6 mt-6 mtb_0">
                                <div class="nxt_btn">
                                    <a class="btn-red btn-red2" href="<?php echo URL::to('/');?>/worldtour_details?id=<?php echo $tour_id;?>&flag=<?php echo $flag;?>">PREV</a>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-4 col-lg-4 col-6 mt-6 mtb_0">
                                <div class="nxt_btn">
									<input class="btn-red btn-red2"  type="submit" name="submit" value="NEXT">
									<!--<a class="btn-red btn-red2" href="javascript:void(0);" onclick="getPay();">NEXT</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
					</form>

                    <div class="row">
                        <div class="col-xl-12 col-12">
                            <ul id="progressbar">
                                <li class="active">Book</li>
                                <li class="active">Contact Details</li>
                                <li class="">Payment</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </section>
	

<script>
 var telInput = $("#phone123");
						telInput.intlTelInput({
							
							separateDialCode: true,
							utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js"
						});
					  

					// on blur: validate
						telInput.blur(function () {
							if ($.trim(telInput.val())) {
								if (telInput.intlTelInput("isValidNumber")) {
									var getCode = telInput.intlTelInput('getSelectedCountryData').dialCode;
									$('#country_code1').val(getCode);
								} else {

									telInput.addClass("error");
										  errorMsg.removeClass("hide");
								}
							}
						});

var globalid ;
function getAdminAuth(id){
	$('#authid').attr('style','');
	$('.testind'+id).attr('style','display:none');
	var user_id = '<?php echo $auth->id;?>';
	var fname = '<?php echo $auth->first_name;?>';
	var last_name = '<?php echo $auth->last_name;?>';
	var email = '<?php echo $auth->email;?>';
	var phone = '<?php echo $auth->phone;?>';
	var country_code = '+<?php echo $auth->country_code;?>';
	console.log(phone);
	$('#fid'+id).val(fname);
	$('#lid'+id).val(last_name);
	$('#emailid'+id).val(email);
	$('#phone123').val(country_code);
	//$('#phone'+id).val(country_code);
	setTimeout(function(){ 
	$("#phone123").val(phone);
	 }, 500);
	
}

</script>
<script>
var tempGlobal;
function checkValidation() {
		
        var paxId = $('#paxId').val();
		var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		for(var i=1; i<=paxId; i++){
			
			tempGlobal = 0;
			var fid = $('#fid'+i).val();
			var lid = $('#lid'+i).val();
			var emailid = $('#emailid'+i).val();
			if(i ==1){
				
				var checked = $('#styledd289s').is(":checked");
				if(checked ==true){
					$('#country_code'+i).val($("#phone123").intlTelInput("getSelectedCountryData").dialCode);
					
					var phone = $('#phone123').val();
					tempGlobal =1;
				}else{
					var phone = $('#phone'+i).val();
					$('#country_code'+i).val($("#phone"+i).intlTelInput("getSelectedCountryData").dialCode);
				}
			}else{
				
				var phone = $('#phone'+i).val();
				$('#country_code'+i).val($("#phone"+i).intlTelInput("getSelectedCountryData").dialCode);
			}
	
			var cnt = 0;

			$('#fidError'+i).html("");
			$('#lidError'+i).html("");
			$('#emailidError'+i).html("");
			$('#phoneError'+i).html("");
			$('#phoneError1234').html("");
			if (fid.trim() == "") {
				$('#fidError'+i).html("First Name is required.");
				cnt++;
			}
			if (lid.trim() == "") {
				$("#lidError"+i).html("Last Name is required.");
				cnt++;
			}
			if (emailid.trim() == "") {
				$("#emailidError"+i).html("Email is required.");
				cnt++;
			}else{
				if(emailid.match(mailformat))
				{
				}else{
					$("#emailidError"+i).html("You have entered an invalid email address!");
					cnt++;
				}
			}
			
			if (phone.trim() == "") {
				if(tempGlobal ==1){
					$("#phoneError1234").html("Phone Number is required.");
				}else{
					$("#phoneError"+i).html("Phone Number is required.");
				}
				
				cnt++;
			}
		}
        if (cnt != 0) {
            return false;
        } else {
		
            return true;
        }

    }
    $('#example1').calendar();
</script>


@include('auth/include/footer')
