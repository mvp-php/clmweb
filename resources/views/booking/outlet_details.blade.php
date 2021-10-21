@include('auth/include/header')
<section class="mail" style="min-height:800px; background-color: #f2f2f2;">
        <div class="container pt-lg-5">
            <div class="row row_cstm agileinfo_mail_grids">
                <div class="col-xl-12 col-lg-12 col-md-12 mt-lg-0 mt-4 p-0">
                    <div class="prc_box">
                        <div class="pr_cptn">
                            <h1 class="pr_caption"><!--CLM MIDVALLEY--><?php echo $query->name;?></h1>
                        </div><br>
                        <div class="cstm_input">
                          
                        </div>
						
                        <div class="pr_b2" id="bookingId" >
                            <div class="row">
                                <div class="col-xl">
                                    <div class="pr_text_box">
                                        <p class="Muli-Bold pr_t1 mb-0" id="worldIds"><?php echo $query->name;?></p>
                                        <p class="pr_t2">Therapist Threatment</p>
                                    </div>
                                </div>
                                <div class="col-xl">
                                    <div class="form-group" id="select_date">

                                        <select class="form-control" id="date_1" onchange="getTimeSlot(this.value,<?php echo $outlet_fk;?>)">
											<option value="">Select Date</option>
											
                                        </select>

                                    </div>
									<label class="val_label" id="dateError"><label>
                                </div>
                                <div class="col-xl">
                                    <div class="form-group" id="select_date">
                                        <select class="form-control" id="date2">
                                            <option value="">Select Time</option>
                                        </select>
                                    </div>
									<label class="val_label" id="timeError"><label>
                                </div>
                                <div class="col-xl">
                                    <div class="form-group" id="select_date">
                                        <select class="form-control color-99" id="date3">
                                            <option value="">Pax</option>
                                        </select>
                                    </div>
									<label class="val_label" id="paxError"><label>
                                </div>

                                <div class="col-xl">
                                    <p class="Muli-Bold pr_myr">MYR <?php echo $query->booking_fee;?></p>
                                </div>

                            </div>


                        </div>
                        <div class="col-xl-12 col-sm-12 col-md-12 col-12">
                            <div class="hide_div2 h3_main222" style="display:none;">
                                <div id="paxsid"></div>
								<!--<div class="in_no" id="inp_no_id">
                                    <input class="styled-checkbox" id="styled-checkbox-11" type="radio" name="radio-group" checked="">
                                    <label for="styled-checkbox-11">1</label>
                                </div>

                                <div class="in_no" id="inp_no_id">
                                    <input class="styled-checkbox" id="styled-checkbox-12" type="radio" name="radio-group">
                                    <label for="styled-checkbox-12">2</label>
                                </div>
                                <div class="in_no" id="inp_no_id">
                                    <input class="styled-checkbox" id="styled-checkbox-13" type="radio" name="radio-group">
                                    <label for="styled-checkbox-13">3</label>
                                </div>
                                <div class="in_no" id="inp_no_id">
                                    <input class="styled-checkbox" id="styled-checkbox-14" type="radio" name="radio-group">
                                    <label for="styled-checkbox-14">4</label>
                                </div>
                                <div class="in_no" id="inp_no_id">
                                    <input class="styled-checkbox" id="styled-checkbox-15" type="radio" name="radio-group">
                                    <label for="styled-checkbox-15">5</label>
                                </div>-->
                            </div>
                        </div>

                        <div class="col-xl-12 col-sm-12 col-md-12 col-12">

                            <div class="hide_div3 h3_main22" style="display:none;">


                                <div class="col-xl-12 col-lg-12 col-12 col-md-12 col-sm-12">
                                    <div class="d-flex d-inhrt">
                                        <div class="nxt_btn2">
										<ul>
										<?php if(!empty($scheduleDate)){
												foreach($scheduleDate as $val){ ?>
                                            <li class="ddd_cs1 <?php echo date('d-m-Y',strtotime($val->start_date))?>"><a href="javascript:void(0)" onclick="getAppendValue('<?php echo date('d-m-Y',strtotime($val->start_date))?>')"><?php echo date('d-m-Y',strtotime($val->start_date))?></a></li>
                                           
										<?php } } ?>
										</ul>
										<input type="hidden" name="" id="tempId">
                                        </div>

                                    </div>



                                </div>


                            </div>

                        </div>

                        <div class="col-xl-12 col-sm-12 col-md-12 col-12">
                            <div class="hide_div h3_main11" style="display:none;">
                                <div class="row">
                                    <div class="col-xl-12 col-12 pb-4 d-lg-block d-md-block">
                                        <div class="col-xl-4 col-4" >
                                            <div class="d_morning">
                                                <h6 class="Muli-Bold">Morning</h6>
												<div id="morning_id"></div>
                                               
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-4" id="after_id">
                                            <div class="d_morning">
                                                <h6 class="Muli-Bold">Afternoor</h6>
                                              
												<div id="afternoon_id"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-4" >
                                            <div class="d_morning">
                                                <h6 class="Muli-Bold">Evening</h6>
                                               
												<div id="evening_id"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>

                    <div class="pr_s_box mt-5" >
                        <div class="row">
                            <div class="col-xl col">
                                <p class="Muli-Bold pr_total">TOTAL</p>
                            </div>
                            <div class="col-xl col">
                                <p class="Muli-Bold pr_myr"  style="float:right;">MYR <span id="total_price">0.00</span></p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-12 col-12 pt-5">
                            <div class="nxt_btn">
                                <a class="btn-red btn-red2" id="nextid" href="javascript:void(0)">NEXT</a>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-xl-12 col-12">
                            <ul id="progressbar">
                                <li class="active">Book</li>
                                <li class="">Contact Details</li>
                                <li class="">Payment</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </section>
	
	<script>
	$("#nextid").click(function() {
		var date = $('#date_1').val();
		var time = $('#date2').val();
		var pax = $('#date3').val();
		console.log(pax);
		$('#dateError').html("");
        $('#timeError').html("");
		$('#paxError').html("");
		var cnt=0;
		if(date.trim() == ""){
			$('#dateError').html("Date is Required.");
			cnt++;
		}
		if(time.trim() == ""){
			$('#timeError').html("Time is Required.");
			cnt++;
		}
		if(pax.trim() == ""){
			$('#paxError').html("Pax is Required.");
			cnt++;
		}
		if(cnt == 0){
			var total = pax * <?php echo $query->booking_fee;?>;
			var href='<?php echo URL::to("/");?>/guestDetails?main_type=<?php echo $main_type;?>&type=<?php echo $type;?>&flag=<?php echo $flag;?>&outlet_fk=<?php echo $outlet_fk;?>&city=<?php echo $query->city;?>&date='+date+'&time='+time+'&pax='+pax+'&price='+total;
			$('#nextid').attr('href',href);
		}
	});
		function getTimeSlot(val,id){ 

				$.ajax({
					async:false,
					global:false,
					url:"<?php echo URL::to('/');?>/getOutletTimeSlotByDateAndId",
					type:"POST",
					data:{'outlet_fk':id,"date":val,"_token":"<?php echo CSRF_TOKEN();?>"},
					success:function(response){
						if(response !=''){
							var response = JSON.parse(response);
							var morningArray= '';
							var AfterArray= '';
							var NightArray= '';
							$.each(response,function(index,elem){
								var startTime = "'"+elem.start_times+"'";
								var endTime = "'"+elem.end_times+"'";
							
								if(elem.session ==1){
									morningArray +='<div class="in_no" id="inp_no_id'+elem.id+'"><input class="styled-checkbox" id="styledd'+elem.id+'" onclick="getStatus('+elem.id+','+startTime+','+endTime+','+elem.session+')" type="radio" name="<?php echo $outlet_fk;?>"><label for="styledd'+elem.id+'" class="Muli-regular">'+elem.start_times+'-'+elem.end_times+'</label></div>';
								}
								if(elem.session ==2){
									AfterArray +='<div class="in_no" id="inp_no_id'+elem.id+'"><input class="styled-checkbox" id="styledd'+elem.id+'" onclick="getStatus('+elem.id+','+startTime+','+endTime+','+elem.session+')" type="radio" name="<?php echo $outlet_fk;?>" ><label for="styledd'+elem.id+'" class="Muli-regular">'+elem.start_times+'-'+elem.end_times+'</label></div>';
								}
								if(elem.session ==3){
									NightArray +='<div class="in_no" id="inp_no_id'+elem.id+'"><input class="styled-checkbox" id="styledd'+elem.id+'" onclick="getStatus('+elem.id+','+startTime+','+endTime+','+elem.session+')" type="radio" name="<?php echo $outlet_fk;?>" ><label for="styledd'+elem.id+'" class="Muli-regular">'+elem.start_times+'-'+elem.end_times+'</label></div>';
								}
							})
							
							$('#morning_id').html(morningArray);
							$('#afternoon_id').html(AfterArray);
							$('#evening_id').html(NightArray);
						}else{
							$('#date22').html("<option value=''>No Time slot available for this date</option>");
						}
					}
				});
				
		}
		
		
		function getAppendValue(val){
		
		if(val !=''){
			$('#date_1').html('<option value="'+val+'">'+val+'</option>');
			$(".hide_div3").css({
				"display": "none"
			});
			$('#tempId').val(val)
			$('.'+val).addClass('active');
			getTimeSlot(val,<?php echo $outlet_fk;?>)
		}
	}
	
	function getStatus(id,start_date,end_date,session){
		
		if(id !=''){
			if(session ==1){
				var morning = 'Morning';
			}else if(session ==2){
				var morning = 'Afternoon';
			}else{
				var morning = 'Evening';
			}
			$('#date2').html('<option value="'+id+'">'+morning+' '+start_date+' - '+end_date+'</option>');
			$(".hide_div").css({
				"display": "none"
			});
			
			getPaxByScheduleId(id)
			
		}
	}
	function getPaxByScheduleId(id){ 
				$.ajax({
					async:false,
					global:false,
					url:"<?php echo URL::to('/');?>/getPaxByScheduleId",
					type:"POST",
					data:{'id':id,"_token":"<?php echo CSRF_TOKEN();?>"},
					success:function(response){
						if(response !=''){
							$('#paxsid').html(response);
						}else{
							$('#paxsid').html("No pax available");
						}
					}
				})
		}
		/*function getPaxClick(val){
			if(val !=''){
				
				$('#date3').html('<option value="'+val+'">'+val+'</option>');
				$(".hide_div2").css({"display": "none"});
				var total = val * <?php echo $query->booking_fee;?>;
				$('#total_price').html(total);
				var date = $('#date_1').val();
				var time = $('#date2').val();
				var pax = $('#date3').val();

				var href='<?php echo URL::to("/");?>/geustDetails?type=<?php echo $type;?>&flag=<?php echo $flag;?>&outlet_fk=<?php echo $outlet_fk;?>&city=<?php echo $query->city;?>&date='+date+'&time='+time+'&pax='+pax+'&price='+total;
				$('#nextid').attr('href',href);
			}
		}*/
		function getPaxClick(val){
			if(val !=''){
				
				$('#date3').html('<option value="'+val+'">'+val+'</option>');
				$(".hide_div2").css({"display": "none"});
				var total = val * <?php echo $query->booking_fee;?>;
				$('#total_price').html(total);
			}
		}
	</script>
	<script>
    $("#date2").click(function() {
        $(".hide_div").toggle("slow");
        $(".hide_div3").css({
            "display": "none"
        });
        $(".hide_div2").css({
            "display": "none"
        });
    });
    $("#date3").click(function() {
        $(".hide_div2").toggle("slow");
        $(".hide_div").css({
            "display": "none"
        });
        $(".hide_div3").css({
            "display": "none"
        });
    });
    $("#date_1").click(function() {
        $(".hide_div3").toggle("slow");
        $(".hide_div").css({
            "display": "none"
        });
        $(".hide_div2").css({
            "display": "none"
        });
    });
	
</script>
@include('auth/include/footer')