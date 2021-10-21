@include('auth/include/header')
<section class="mail" style="min-height:800px; background-color: #f2f2f2;">
        <div class="container pt-lg-5">
            <div class="row row_cstm agileinfo_mail_grids">
                <div class="col-xl-12 col-lg-12 col-md-12 mt-lg-0 mt-4 p-0">
                    <div class="prc_box">
                        <div class="pr_cptn">
                            <h1 class="pr_caption">My Bookings</h1>
                        </div>
                        <div class="cstm_input">
                            <ul class="unstyled centered">
                               <li>
										<a href="{{ URL::to('my-booking-outlet') }}"><button class="button btn-red-cstm Muli-Bold pd_cstm w-250" >Outlet</button></a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('my-booking-worldtour') }}"><button class="button btn-red-cstm Muli-Bold pd_cstm w-250" >Work Tour</button></a>
                                </li>
                            </ul>
                        </div>
						<?php if(count($world_tour) != 0 ){ foreach($world_tour as $row){ ?>
                       <a href="{{ URL::to('booking-detail-worltour') }}/<?=$row['id']?>">
					   <div class="pr_b2">
                            <div class="row" id="booking_clm_id">
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 text-center">
                                    <div class="pr_text_box">
                                        <p class="Muli-Bold pr_t1 mb-0 color-d2">World Tour</p>
                                        <p class="pr_t2"><?php
												echo $row['tour_name'];
										?></p>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 text-center">
                                    <div class="form-group" id="select_date">
									
                                              <label><?=date('d-m-Y',strtotime($row['booking_date']))?></label>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 text-center">
                                    <div class="form-group" id="select_date">
									<?php if($row['session'] == '1'){
										$session = 'Morning';
										}else if($row['session'] == '2'){
											$session = 'After Noon';
										}else{
											$session = 'Night';
										}
										
										?>
                                        <label><?= $session.' '.date('h:i',strtotime($row['schedule_start_time'])).'-'.date('h:i',strtotime($row['schedule_end_time']))?></label>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 text-center">
                                    <div class="form-group" id="select_date">
										<label><?=$row['pax']?></label>
                                    </div>
                                </div>
                            </div>
                        </div></a>
						<br/>
						<?php } } else { ?>
						<div class="pr_b2">
                            <div class="row">
                                <div class="col-xl">
                                    <div class="pr_text_box">
                                        <p class="Muli-Bold pr_t1 mb-0">No Data Available!</p>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
						<?php } ?>
                    </div>

                </div>
            </div>
        </div>


    </section>
@include('auth/include/footer')