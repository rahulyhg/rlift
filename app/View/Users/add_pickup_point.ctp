
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
										<h3 class="page-header">ADD PICKUP POINT</h3>
									    </div>
					        </div>
									   
										
		<div class="smart-wrap">
		
    	<div class="smart-forms smart-container wrap-3" style="float:left;box-shadow: 0 0px 0px rgba(0,0,0,0.65);    margin-top: -14px;
         margin-left: -20px;">
        
        	
            
            <?php echo $this->Form->create('Users'); ?>
            	<div class="form-body">
                
                 
             <div style="width: 42%;float: left;">

                	<div class="section">
					
							<div class="section">
                        <label class="field select prepend-icon">
                            <select id="city_name" name="city_name" required>
                                <option value="" disabled>Select City</option>
                               <?php foreach($stateCities as $key=>$value) { ?>
								<option <?php  if($value['City']['city_name'] == 'Bangalore') { echo "selected=selected''"; } ?> value="<?= $value['City']['city_name']; ?>"><?= $value['City']['city_name']; ?></option>
                                <?php } ?>
                                
                            </select>
                            <i class="arrow double"></i>
                            <span class="field-icon"><i class="fa fa-map-marker"></i></span>   
                            <b class="tooltip tip-right-top"><em> Please Select City</em></b>        							
                        </label>  
                    </div>
					
					<div class="section">
                    	<label class="field prepend-icon">
                        	<input name="pickup_point" class="gui-input" placeholder="Pickup Point" type="text" required data-parsley-type="alphanum"> 
                            <b class="tooltip tip-right"><em> please enter the pickup point</em></b>
                            <span class="field-icon"><i class="fa fa-user"></i></span>  
                        </label>
                    </div>
					 
                    </div><!-- end section -->
                    
					<div class="section">
                    <button type="submit" class="button btn-primary">ADD</button>
                    </div>
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

					 

					