 
 <div id="wrap">
 
  <?php echo $this->element('menu'); ?>
 
<!--PAGE CONTENT -->
        <div id="content">
           
							<div class="inner" style="padding: 40px; padding-top: 15px;">
										<div class="row">
									    <div class="col-lg-12">
										<h3 class="page-header">Create Promotions</h3>
									   </div>
								       </div>
									   
										
		<div class="smart-wrap">
		
    	<div class="smart-forms smart-container wrap-3" style="float:left;box-shadow: 0 0px 0px rgba(0,0,0,0.65);    margin-top: -14px;
         margin-left: -20px;">
        
        	
            
           <?php echo $this->Form->create('Users'); ?>
            	<div class="form-body" style="width: 42%;">
 
            <div class="section">
                    	
                    	<label class="field prepend-icon">
                        	<input name="promo_code" id="promo_code" class="gui-input" placeholder="Enter promo code" type="text" required pattern="RL[0-9]{2}$" title="Promo code should be of 4 characters starting with RL and followed by 2 numbers next to it." onkeyup=" var s = this.value.toUpperCase(); this.value=s; if(s == 'RL50') { alert('RL50 is reserved for signup process offer.');}">
                            <b class="tooltip tip-right"><em> please enter promo code like RL60 and percent amount 60 in next field for 60 percent off.</em></b>
                            <span class="field-icon"><i class="fa fa-gift"></i></span>  
                        </label>
                    </div><!-- end section -->

    
					    <div class="section">
                        <div class="smart-widget sm-left sml-50">
                            <label class="field">
                                <input name="amount" id="amount" class="gui-input" placeholder="Enter deduction percentage (only numbers)" type="text" required pattern="[0-9]{1,2}" title="Min 1 numbers or max 2 numbers">
                            </label>
                            <label for="sm3" class="button"> % </label>
                        </div><!-- end .smart-widget section --> 
                    </div><!-- end section -->  
			
			          <div class="section">
                    	
                    	<label class="field prepend-icon">
                        	<input name="promo_type" id="promo_type" class="gui-input" placeholder="Enter promo occasion" type="text" required>
                            <b class="tooltip tip-right"><em> please enter promo occasion</em></b>
                            <span class="field-icon"><i class="fa fa-gift"></i></span>  
                        </label>
                    </div><!-- end section -->

   
	   <div class="tagline" style="margin-bottom:21px;"><span> Choose time period </span></div>
        
		 <div class="form-group">
            <div class='input-group date' id='datetimepicker6'>
                <input type='text' name="from_time" class="form-control" required placeholder="From date"/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
		
		<div class="form-group">
            <div class='input-group date' id='datetimepicker7'>
                <input type='text' name="to_time" class="form-control" placeholder="To date"/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
   
				   <div class="section">
                    <button type="submit" class="button btn-primary">CREATE PROMO CODE</button>
                    </div><!-- end section -->   

                    				
                    
                </div><!-- end .form-body section -->
              
            </form>
            
        </div><!-- end .smart-forms section -->
    </div><!-- end .smart-wrap section -->
													

							</div>      
                    
                  </div>  
        <!-- END PAGE CONTENT -->
 </div>  
 
        <link href="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
		<script src="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
     
       <script type="text/javascript">
    $(function () {
       // $('#datetimepicker6').datetimepicker();
       
	    $('#datetimepicker6').datetimepicker({
               format: 'YYYY-MM-DD'
            });
	   
	   $('#datetimepicker7').datetimepicker({
            format: 'YYYY-MM-DD',
			useCurrent: false //Important! See issue #1075
        });
		
        $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
    });
</script>
             