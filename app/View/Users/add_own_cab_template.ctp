
        <?php echo $this->Html->script('jquery-1.9.1.min');  ?>
     <?php echo $this->Html->script('jquery.maskedinput');  ?>
	   <?php echo $this->Html->script('jquery-ui-custom.min');  ?>
	     <?php echo $this->Html->script('jquery-ui-combo.min');  ?>
     


 <div id="wrap">
 
  <?php echo $this->element('menu'); ?>
 
<!--PAGE CONTENT -->
        <div id="content">
           
							<div class="inner" style="padding: 40px; padding-top: 15px;">
										<div class="row">
									    <div class="col-lg-12">
										<h3 class="page-header">ADD OWN CAB TEMPLATE</h3>
									    </div>
					        </div>
									   
										
		<div class="smart-wrap">
		
    	<div class="smart-forms smart-container wrap-3" style="float:left;box-shadow: 0 0px 0px rgba(0,0,0,0.65);    margin-top: -14px;
         margin-left: -20px;">
        
        	
            
            <?php echo $this->Form->create('Users'); ?>
            	<div class="form-body">
                
                 
             <div style="width: 42%;float: left;">

                	<div class="section">
					
							
					
					 <!-- end section --> 
                    
                    <div class="section">
                        <label class="field select prepend-icon">
                            <select id="pickup_city" name="pickup_city" required>
                                <option selected="selected" value="0">Select Pickup City</option>
                               <?php foreach($stateCities as $key=>$value) { ?>
								<option value="<?= $value['City']['city_name']; ?>"><?= $value['City']['city_name']; ?></option>
                                <?php } ?>
                                
                            </select>
                            <i class="arrow double"></i>
                            <span class="field-icon"><i class="fa fa-map-marker"></i></span>   
                            <b class="tooltip tip-right-top"><em>  please select the pickup city </em></b>        							
                        </label>  
                    </div>
                    
                    <div class="section">
                        <label class="field select prepend-icon">
                            <select id="drop_city" name="drop_city" required>
                                <option selected="selected" value="0">Select Drop City</option>
                               <?php foreach($stateCities as $key=>$value) { ?>
								<option value="<?= $value['City']['city_name']; ?>"><?= $value['City']['city_name']; ?></option>
                                <?php } ?>
                                
                            </select>
                            <i class="arrow double"></i>
                            <span class="field-icon"><i class="fa fa-map-marker"></i></span>   
                            <b class="tooltip tip-right-top"><em>  please select the drop city </em></b>        							
                        </label>  
                    </div>
                    
                    </div><!-- end section -->
                    				
					<div class="section">
                    	<label class="field prepend-icon">
                        	<input name="via" class="gui-input" placeholder="Via" type="text" required data-parsley-type="alphanum"> 
                            <b class="tooltip tip-right"><em> please enter the via</em></b>
                            <span class="field-icon"><i class="fa fa-user"></i></span>  
                        </label>
                    </div>
					
					<div class="section">
                    	<label class="field prepend-icon">
                        	<input name="tot_distance" class="gui-input" placeholder="Total Distance" type="text" required data-parsley-type="alphanum"> 
                            <b class="tooltip tip-right"><em> please enter the total distance</em></b>
                            <span class="field-icon"><i class="fa fa-user"></i></span>  
                        </label>
                    </div>
					
						<div class="section">
                    	<label class="field prepend-icon">
                        	<input name="approx_time" class="gui-input" placeholder="Approx.Time(Travelling)" type="text" required data-parsley-type="alphanum"> 
                            <b class="tooltip tip-right"><em> please enter the Approx.Time</em></b>
                            <span class="field-icon"><i class="fa fa-user"></i></span>  
                        </label>
                    </div>
     		</div>
					
					<div style="float: left;width: 42%;margin-left: 75px;padding-top: 10px;">
						 					<div class="section">
                    	<label class="field prepend-icon">
                        	<input name="price" class="gui-input" placeholder="Price per seat" type="text" required data-parsley-type="alphanum"> 
                            <b class="tooltip tip-right"><em> please enter the Price</em></b>
                            <span class="field-icon"><i class="fa fa-user"></i></span>  
                        </label>
                    </div>
					
					
					
					<div class="section">
                    	
                    	<label class="field prepend-icon">
                        	<input name="seats" class="gui-input" placeholder="Enter Seats" type="text" required data-parsley-type="number">
                            <b class="tooltip tip-right"><em> please enter the seats</em></b>
                            <span class="field-icon"><i class="fa fa-phone"></i></span>  
                        </label>
                    </div>
					
                    <div class="section">
                    <button type="submit" class="button btn-primary">ADD DRIVER</button>
                    </div><!-- end section -->   

                    </div>					
                    
                </div><!-- end .form-body section -->
              
            </form>
            
        </div><!-- end .smart-forms section -->
    </div><!-- end .smart-wrap section -->
													

							</div>      
                    
                  </div>  
        <!-- END PAGE CONTENT -->		
		
 </div>  
             
	 
	  
	
<style>
.parsley-required, .parsley-type, .parsley-minlength, .parsley-maxlength {
color: red;	
}

#parsley-id-28
{     
margin-top: 45px;
position: absolute;  
}

#parsley-id-30
{     
margin-top: 46px;
position: absolute;  
}

#parsley-id-34
{     
margin-top: 46px;
position: absolute;  
}


#parsley-id-38
{     
margin-top: 46px;
position: absolute;  
}


#parsley-id-49
{     
margin-top: 46px;
position: absolute;  
}

#parsley-id-32
{     
margin-top: 46px;
position: absolute;  
}

#parsley-id-36
{     
margin-top: 46px;
position: absolute;  
}

</style>
<link href="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
		<script src="https://cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
       <script type="text/javascript">
    $(function () {
       $('#datetimepicker1').datetimepicker({
               format: 'YYYY-MM-DD'
            });
       $("#datetimepicker1").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
    });
</script>

					 

					