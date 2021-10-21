@include('auth/include/header')
<section class="mail pt-lg-5 pt-4" style="min-height:800px; background-color: #f2f2f2;">
        <div class="container">
            <div class="row row_cstm agileinfo_mail_grids">
						<div class="col-xl-12 col-lg-12 col-md-12 mt-lg-0 mt-0 p-0">
								<?php if($query->type ==1){?>
								<div class="pr_cptn">
									<h1 class="pr_caption"><?php if(isset($getOutletDetails->name) && $getOutletDetails->name !=''){  echo $getOutletDetails->name; }?></h1>
								</div>
								<?php } else{ ?>
								<div class="pr_cptn">
									<h1 class="pr_caption"><?php if(isset($getWorldDetails->city) && $getWorldDetails->city !=''){ echo $getWorldDetails->city;}?></h1>
								</div>
								<?php } ?>
						<form action="<?php echo URL::to('/');?>/booking" method="post" enctype="multipart/form-data">
							<div class="row pt-5 m-0">
							<input type="hidden" name="id" value="<?php echo $id;?>">
							<input type="hidden" name="_token" value="<?php echo CSRF_TOKEN();?>">
							
							<div class="col-xl-4 col-sm-12 col-12 p-0">
								<div class="booking_d1">
									<h5 class="gs_card Muli-Bold color-22">
										Booking Summary
									</h5>
										<hr class="m-0">
										
										<div class="in_pd">
										<?php if($query->type ==1){?>
										<div class="row">
											<div class="col-xl-6 col-6">
											
												<p class="color-22 Muli-Bold">Outlet</p>
											
												
											
											</div>
											<div class="col-xl-6 col-6">
											<p class="color-22 pull-right"><?php if(isset($getOutletDetails->name) && $getOutletDetails->name !=''){  echo $getOutletDetails->name; }?></p>
											</div>
										</div>
										<?php }else{ ?>
										<div class="row">
											<div class="col-xl-6 col-6">
											
												<p class="color-22 Muli-Bold">World Tour</p>
											
											
											</div>
											<div class="col-xl-6 col-6">
											<p class="color-22 pull-right"><?php if(isset($getWorldDetails->city) && $getWorldDetails->city !=''){ echo $getWorldDetails->city;}?></p>
											</div>
										</div>
										<?php } ?>
										<div class="row">
											<div class="col-xl-6 col-6">
											<p class="color-22 Muli-Bold">Date</p>
											</div>
											<div class="col-xl-6 col-6">
											<p class="color-22 pull-right"><?php echo date('D, d M Y ',strtotime($query->date));?></p>
											</div>
										</div>
										
										<div class="row">
											<div class="col-xl-6 col-6">
											<p class="color-22 Muli-Bold">Time</p>
											</div>
											<div class="col-xl-6 col-6">
											<p class="color-22 pull-right"> <?php echo date('h:i',strtotime($getTimeSlotById->start_time));?> - <?php echo date('h:i',strtotime($getTimeSlotById->end_time));?></p>
											</div>
										</div>
										
										<div class="row">
											<div class="col-xl-6 col-6">
											<p class="color-22 Muli-Bold">Total Payment</p>
											</div>
											<div class="col-xl-6 col-6">
											<p class="color-22 pull-right">RM <?php echo $query->price;?></p>
											</div>
										</div>
										
										<hr class="">
										
										<h6 class="gs_card2 Muli-Bold color-22">
										Guest Details
										</h6>
										<?php $cnt =1;if(!empty($subquery)){ foreach($subquery as $val){ ?>
										
										<div class="row">
											<div class="col-xl-12 col-12 col-12">
											<p class="color-d Muli-Bold">Guest <?php echo $cnt;?></p>
											</div>
											
										</div>
										
										
										<div class="row">
											<div class="col-xl-6 col-6">
											<p class="color-22 Muli-Bold">First Name</p>
											</div>
											<div class="col-xl-6 col-6">
											<p class="color-22 pull-right"><?php echo $val->first_name;?></p>
											</div>
										</div>
										
										<div class="row">
											<div class="col-xl-6 col-6">
											<p class="color-22 Muli-Bold">Last Name: </p>
											</div>
											<div class="col-xl-6 col-6">
											<p class="color-22 pull-right"> <?php echo $val->last_name;?></p>
											</div>
										</div>
										
										<div class="row">
											<div class="col-xl-6 col-6">
											<p class="color-22 Muli-Bold">Email    </p>
											</div>
											<div class="col-xl-6 col-6">
											<p class="color-22 pull-right"><?php echo $val->email;?></p>
											</div>
										</div>
										
										<div class="row">
											<div class="col-xl-6 col-6">
											<p class="color-22 Muli-Bold">Phone Number </p>
											</div>
											<div class="col-xl-6 col-6">
											<p class="color-22 pull-right"><?php echo $val->phone;?></p>
											</div>
										</div>
										<?php $cnt++;} }?>
										
										
										</div>
										
								</div>
							</div>
							
							
							
							<div class="col-xl-8 col-sm-12 col-12 p-0">
								<div class="booking_d2">
									<h5 class="gs_card Muli-Bold color-22 pl-5">
										Payment Details
									</h5>
									<hr class="m-0">
									
									<div class="row">
									<div class="col-xl-12 col-12 pl-5 plb_5">
									<div class="col-xl-4 col-12">
									<div class="cr_btn pt-5">
									<button class="btn-red btn-red2" href="#">
									<i class="fa fa-check-circle check-circle"></i>
									Credit Card</button>
									</div>
									</div>
									<div class="col-xl-4 col-12">
									
									</div>
									<div class="col-xl-4 col-12">
									
									</div>
									</div>
									</div>
									
									<div class="row pt-5">
									<div class="col-xl-12 col-12 pl-5 plb_5">
									<div class="col-xl-4 col-4">
									<img src="<?php echo URL::to('/');?>/assets/images/visa_card.png" alt="" class="img-fluid v-card_img">
									</div>
									<div class="col-xl-4 col-4">
									<img src="<?php echo URL::to('/');?>/assets/images/paypal.png" alt="" class="img-fluid paypal_img">
									</div>
									<div class="col-xl-4 col-4">
									<img src="<?php echo URL::to('/');?>/assets/images/fpx.png" alt="" class="img-fluid fvx_img">
									</div>
									</div>
									</div>
									
									
									<div class="row pt-5">
									<div class="col-xl-12 pl-5 plb_5 col-12">
									<div class="col-xl-5 col-12">
									<h5 class="Muli-Bold color-22">
										Billing Info
									</h5>
										<div class="bi_input">
										<label class="Muli-Bold bi_label w-100">Full name</label>
                                            <input type="text" name="usrname" class="form-group w-100 mb-0" placeholder="Diogo C Ferreira">
                                        </div>
										
										<div class="bi_input">
										<label class="Muli-Bold bi_label w-100">Address</label>
                                            <input type="text" name="usrname" class="form-group w-100 mb-0" placeholder="St Road Manchester, 12">
                                        </div>
										
										<div class="row mtb_00">
											<div class="col-xl-6 col-12">
											<div class="bi_input">
										<label class="Muli-Bold bi_label w-100">City</label>
                                            <input type="text" name="usrname" class="form-group w-100 mb-0" placeholder="London">
                                        </div>
											</div>
											
											<div class="col-xl-6 col-12">
											<div class="bi_input">
										<label class="Muli-Bold bi_label w-100">Zip Code</label>
                                            <input type="text" name="usrname" class="form-group w-100 mb-0" placeholder="95673">
                                        </div>
											</div>
										</div>
										
										<div class="bi_input">
										<label class="Muli-Bold bi_label w-100">Country</label>
                                            <input type="text" name="usrname" class="form-group w-100 mb-0" placeholder="Japan">
                                        </div>
									</div>
									
									
									<div class="col-xl-5 col-12 mtb_top">
									<h5 class="Muli-Bold color-22">
										Credit Card Info
									</h5>
									
									<div class="bi_input">
										<label class="Muli-Bold bi_label w-100">Credit Card Number</label>
                                            <input type="text" name="usrname" class="form-group w-100 mb-0" placeholder="4642  9900 0000  0000">
											<img src="<?php echo URL::to('/');?>/assets/images/visa_card2.png" alt="" class="img-fluid visa_cadr2_img">
                                     </div>
										
										<div class="bi_input">
										<label class="Muli-Bold bi_label w-100">Card Holder Name</label>
                                            <input type="text" name="usrname" class="form-group w-100 mb-0" placeholder="4642  9900 0000  0000">
                                        </div>
										
										<div class="row mtb_00">
											<div class="col-xl-6 col-12">
											<div class="bi_input">
										<label class="Muli-Bold bi_label w-100">Expire Date</label>
                                            <input type="text" name="usrname" class="form-group w-100 mb-0" placeholder="05/21">
                                        </div>
											</div>
											
											<div class="col-xl-6 col-12">
											<div class="bi_input">
										<label class="Muli-Bold bi_label w-100">CVV</label>
                                            <input type="text" name="usrname" class="form-group w-100 mb-0" placeholder="092">
                                        </div>
											</div>
										</div>
									</div>
									
									
									
									
									
									
									</div>
									</div>
									
									
								</div>
							</div>
							
							
							</div>
							<div class="row mtb_50">
							<div class="col-xl-12" id="guest_btn_id">
									<div class="col-xl-2 col-md-2 col-lg-2 col-12">
									</div>
							
								<div class="col-xl-4 col-md-4 col-lg-4 col-6 mt-6 mtb_0">
									<div class="nxt_btn">
									<!-- <a class="btn-red btn-red2" href="#">PREV</a> -->
									<button class="btn-red btn-red3" href="#">PREV</button>
									</div>
								</div>	
								<div class="col-xl-4 col-md-4 col-lg-4 col-6 mt-6 mtb_0">								
									<div class="nxt_btn">
									<!-- <a class="btn-red btn-red2 bg-color-41" href="#">PAY</a> -->
									<button class="btn-red btn-red3 bg-color-41" href="">PAY</button>
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
	
@include('auth/include/footer')