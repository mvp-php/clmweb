@include('auth/include/header')
<!-- contact -->
<section class="mail pt-lg-5 pt-4" style="min-height:800px; background-color: #f2f2f2;">
    <div class="container pt-lg-5">
        <div class="row row_cstm agileinfo_mail_grids">
            <div class="col-xl-12 col-lg-12 col-md-12 mt-lg-0 mt-4 p-0">

                <div class="box box_cstm clearfix mt_b" style="height: 100% !important; overflow: inherit !important;">
                    <center>

                        <div class="box_i" id="input_id">
                            <div class="col-xl-12 col-12">
                                <img src="<?php echo url::to('/'); ?>/assets/images/pro-img.png" alt="" class="img-fluid pro_img">
                            </div>

                            <div class="col-xl-12 col-12 mt-3">
                                <h2 class="Muli-Bold color-black mb-0 pro_name">
                                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                </h2>
                                <h5 class="Muli-Bold color-black pro_email mt-2">
                                    {{ Auth::user()->email }}
                                </h5>

                                <div class="btn_width mt-6">
                                    <a href="{{ URL::to('my-booking-outlet') }}"><button class="button btn-red-cstm Muli-Bold pd_cstm w-250" >My Booking</button></a>
                                </div>

                                <div class="btn_width mt-4">
                                    <a href="{{ URL::to('my-booking-history-outlet') }}"><button class="button btn-red-cstm Muli-Bold pd_cstm w-250">Booking history</button></a>
                                </div>

                                <div class="btn_width mt-4">
                                    <a href="{{ URL::to('support') }}"><button class="button btn-red-cstm Muli-Bold pd_cstm w-250">support</button></a>
                                </div>

                                <div class="btn_width mt-6">
                                    <button href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();" class="button btn-red-cstm Muli-Bold pd_cstm w-250 logout_btn">
                                        Logout
                                    </button>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </div>
</section>


@include('auth/include/footer')