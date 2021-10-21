@include('auth/include/header')
<section class="mail" style="min-height:800px; background-color: #f2f2f2;">
        <div class="container pt-lg-5">
            <div class="row row_cstm agileinfo_mail_grids">
                <div class="col-xl-12 col-lg-12 col-md-12 mt-lg-0 mt-4 p-0">
                    <div class="prc_box">
                        <div class="pr_cptn">
                            <h1 class="pr_caption pr_caption2">Suport</h1>
                        </div>
                        <div class="cstm_input">
                            
                        </div>
						<?php foreach($all_data as $row){ ?>
                        <div class="pr_b2 prr_b2">
                            <div class="row">
                                <div class="col-xl">
                                    <div class="pr_text_box">
                                        <p class="Muli-Bold pr_t1 mb-0"><?php echo $row['title']; ?></p>
                                        <p class="pr_t2"><?php
												echo $row['content'];
										?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
						<br/>
							<?php } ?>
                    </div>

                </div>
            </div>
        </div>


    </section>
@include('auth/include/footer')