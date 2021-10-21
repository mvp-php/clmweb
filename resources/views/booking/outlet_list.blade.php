@include('auth/include/header')
<section class="mail" style="min-height:800px; background-color: #f2f2f2;">
        <div class="container pt-lg-5">
            <div class="row row_cstm agileinfo_mail_grids">
                <div class="col-xl-12 col-lg-12 col-md-12 mt-lg-0 mt-4 p-0">
                    <div class="prc_box">
                        <div class="pr_cptn">
                            <h1 class="pr_caption"><!--CLM MIDVALLEY-->Outlet</h1>
                        </div>
                        <div class="cstm_input">
                            <ul class="unstyled centered">
                                <li>
                                    <input class="styled-checkbox" id="styled-checkbox-1" type="radio" name="radio-group" onclick="getWorldTourList('1')">
                                    <label for="styled-checkbox-1">Master Chris Leong Threatment</label>
                                </li>
                                <li>
                                    <input class="styled-checkbox" id="styled-checkbox-2" type="radio" name="radio-group" onclick="getWorldTourList('0')">
                                    <label for="styled-checkbox-2">Other Therapist Threatment</label>
                                </li>
                            </ul>
                        </div>
						<div class="cstm_input" id="list_id" style="display:none;">
                            <div id="list_ids"></div>
                        </div>
                       
                        
                      

                        

                    </div>

                    

                    <div class="row" id="nnns" style="display:none;">
                        <div class="col-xl-12 col-12 pt-5">
                            <div class="nxt_btn">
                                <a class="btn-red btn-red2" id="nextid" href="#">NEXT</a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>


    </section>
	
	<script>
		function getWorldTourList(id){ 
			var href = '<?php echo URL::to('/');?>/getOutletListByFlag';
			$('#nextid').attr('href','#');
			if(id !=''){
				$.ajax({
					async:false,
					global:false,
					url:href,
					type:"get",
					data:{id:id},
					success:function(response){
						$('#list_ids').html("");
						if(response !=''){
							var htmld = '<ul class="unstyled centered">'+response+'</ul>';
							$('#list_id').attr('style','');
							$('#list_ids').append(htmld);
							$('#nnns').attr('style','');
						}else{
							$('#list_ids').attr('style','display:none');
							$('#nnns').attr('style','display:none');
						}
					}
				})
			}
		}
	
		function getWorldTourDetails(id,flag){
			var href = '<?php echo URL::to('/');?>/outlet_details?main_type=outlet&id='+id+"&flag="+flag+'&type=1';
			$('#nextid').attr('href',href);
			
			
		}
		
	</script>
@include('auth/include/footer')