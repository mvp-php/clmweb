@include('auth/include/header')
 <!-- contact -->
    <section class="mail pt-lg-5 pt-4" style="min-height:800px; background-color: #f2f2f2;">
        <div class="container">
            <div class="row row_cstm agileinfo_mail_grids">
                <div class="col-xl-12 col-lg-12 col-md-12 mt-lg-0 mt-0 p-0">
                            
                            <div class="pr_cptn">
                            <h1 class="pr_caption">CLM MIDVALLEY</h1>
                        </div>
                    <div class="row pt-5 m-0 mtb_00">
                        <?php foreach($booking_detail as $row){ ?>
                        <div class="col-xl-6 col-12">
                            <div class="guest1_card clearfix" style="width: 100%;">
                                <h4 class="gs_card Muli-Bold color-22 text-center m-0">
                                    PAYMENT SUCCESSFUL
                                </h4>
                                <p class="Muli-Bold color_b6 text-center pax1">
                                    PAX <?=$row['pax']?>
                                </p>
                                <hr class="m-0">

                                <div class="input_pd2 pt-4">
                                    <div class="col-xl-12 col-12">
                                        <div class="col-xl-6 col-12">
                                            <label class="Muli-Bold  w-100 color-22">Outlet</label>
                                            <input type="text" name="usrname" class="form-group w-100" placeholder="CLM MID VALLEY" value="<?=$row['outletname']?>">
                                        </div>

                                        <div class="col-xl-6 col-12">
                                            <label class="Muli-Bold  w-100 color-22">Booking ID</label>
                                            <input type="text" name="lastname" class="form-group w-100" placeholder="AAA000000111111" value="<?=$row['booking_id']?>">
                                        </div>

                                        <div class="col-xl-6 col-12">
                                            <label class="Muli-Bold  w-100 color-22">Booking Fee</label>
                                            <input type="text" name="usrname" class="form-group w-100" placeholder="MYR 30" value="<?=$row['booking_price']?>">
                                        </div>

                                        <div class="col-xl-6 col-12">
                                            <label class="Muli-Bold  w-100 color-22">Date</label>
                                            <input type="text" name="lastname" class="form-group w-100" placeholder="21 August 2019" value="<?=date('d F Y',strtotime($row['booking_date']))?>">
                                        </div>


                                        <div class="col-xl-6 col-12">
										<?php if($row['schedule_session'] == '1'){
										$session = 'Morning';
										}else if($row['schedule_session'] == '2'){
											$session = 'After Noon';
										}else{
											$session = 'Night';
										}
										
										?>
                                            <label class="Muli-Bold  w-100 color-22">Time</label>
                                            <input type="text" min="0" name="usrname" class="form-group w-100" placeholder="Morning- 10:30- 11:30" value="<?php echo $session.' '.date('h:i',strtotime($row['schedule_start_date'])).'-'.date('h:i',strtotime($row['schedule_end_date'])); ?>" >
                                        </div>

                                        <div class="row m_row">
                                            <div class="col-xl-4 col-4 pr-0">
                                                <label class="Muli-Bold  w-100 color-22">Pax</label>
                                                <input type="number" min="0" name="lastname" class="form-group w-100" placeholder="2" value="<?=$row['pax']?>">
                                            </div>

                                            <div class="col-xl-8 col-8">
                                                <label class="Muli-Bold w-100 color-22">Total</label>
                                                <input type="text" min="0" name="lastname" class="form-group w-100" placeholder="MYR  60" value="<?=$row['booking_price']?>">
                                            </div>
                                        </div>


                                        <div class="col-xl-6 col-12">
                                            <label class="Muli-Bold w-100 color-22">Name</label>
                                            <input type="text" name="usrname" class="form-group w-100" placeholder="Peter John" value="<?=$row['user_name']?>">
                                        </div>

                                        <div class="col-xl-6 col-12">
                                            <label class="Muli-Bold w-100 color-22">Card</label>
                                            <input type="text" name="lastname" class="form-group w-100" placeholder="4521 **** **** ****" value="<?=$row['transaction_id']?>">
                                        </div>

                                        <div class="col-xl-12 col-12 pt-5">

                                            <div class="col-xl-6 col-12">
                                                <label class="Muli-Bold w-100 color-b2">Address</label>
                                                <p class="Muli-Bold color-22 add_desc">
												<?=$row['address1'].' '.$row['address2'].' '.$row['world_tour_city'].' '.$row['postcode'].' '.$row['state'].' '.$row['country_name']?>
                                                </p>
                                            </div>

                                            <div class="col-xl-6 col-12">
                                                <img src="https://app.clmethod.com/<?=$row['qrcode']?>" alt="" class="img-fluid br_c">
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-12 pt-5" id="pax_btn">
                                            <div class="col-xl-4 col-md-4 col-lg-4 col-sm-4 col-12">
                                                <div class="nxt_btn">
                                                    <a href="https://maps.google.com/?saddr=My%20Location&daddr=<?=$row['latitude']?>,<?=$row['longitude']?>" target="_blank" ><button class="btn-red btn-red3">DIRECTIONS</button></a>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-4 col-lg-4 col-sm-4 col-12">
                                                <div class="nxt_btn">
                                                    <button class="btn-red btn-red3" href="#">RESCHEDULE</button>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-4 col-lg-4 col-sm-4 col-12">
                                                <div class="nxt_btn">
                                                    <button class="btn-red btn-red3" href="#">SHARE QR</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
						<?php } ?>


                      
                    </div>
                    <div class="row mtb_50">
                        <div class="col-xl-12" id="guest_btn_id">
                            <div class="col-xl-3 col-md-3 col-lg-3 col-12">
                            </div>

                            <div class="col-xl-3 col-md-3 col-lg-3 col-6 mt-6 mtb_0">
                                <div class="nxt_btn">
                                    <!-- <a class="btn-red btn-red2" href="#">DOWNLOAD</a> -->
                                    <button class="btn-red btn-red3" href="#">DOWNLOAD</button>

                                </div>
                            </div>
                            <div class="col-xl-3 col-md-3 col-lg-3 col-6 mt-6 mtb_0">
                                <div class="nxt_btn">
                                    <!-- <a class="btn-red btn-red2 bg-color-41" href="#">PRINT</a> -->
                                    <button class="btn-red btn-red3 bg-color-41" href="#">PRINT</button>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-xl-12 col-12">
                            <ul id="progressbar">
                                <li class="active">Book</li>
                                <li class="active">Contact Details</li>
                                <li class="active">Payment</li>
                                <span class="Muli-Bold color-22 com_p">Completed</span>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </section>
	
@include('auth/include/footer')