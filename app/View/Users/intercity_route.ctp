
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
										<h3 class="page-header">CREATE ROUTE FOR INTERCITY</h3>
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
                            <select id="vehicle_id" name="vehicle_id" required>
                                <option value="">Select Vehicle</option>
                               <?php foreach($InfoVehicle as $key=>$value) { ?>
								<option value="<?= $value['InfoVehicle']['id']; ?>"><?= $value['InfoVehicle']['veh_name'].' ('.$value['InfoVehicle']['veh_number'].')'; ?></option>
                                <?php } ?>
                            </select>
                            <i class="arrow double"></i>
                            <span class="field-icon"><i class="fa fa-map-marker"></i></span>   
                            <b class="tooltip tip-right-top"><em> Please choose vehicle </em></b>        							
                        </label>  
                    </div>
					
					 <div class="section">
                        <label class="field select prepend-icon">
                            <select id="driver_id" name="driver_id" required>
                                <option value="" disabled selected>Select Driver</option>
                               <?php foreach($drivers as $key=>$value) { ?>
								<option value="<?= $value['Driver']['id']; ?>"><?= $value['Driver']['fname'].' '.$value['Driver']['lname'].' ('.$value['Driver']['driverid'].')'; ?></option>
                                <?php } ?>
                            </select>
                            <i class="arrow double"></i>
                            <span class="field-icon"><i class="fa fa-map-marker"></i></span>   
                            <b class="tooltip tip-right-top"><em> Please choose a driver </em></b>        							
                        </label>  
                    </div><!-- end section --> 
                    
                    <div class="section">
                        <label class="field select prepend-icon">
                            <select id="pickup_city" name="pickup_city" required onChange="getPickupPoints()">
                                <option  value="" disabled selected>Select Pickup City</option>
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
                        <label class="field select prepend-icon" id="appendPickupPoints">
                            <select name="pickup_points" required>
                                <option  value="" disabled selected>Select multiple pickup points</option>
                                                              
                            </select>
                            <i class="arrow double"></i>
                            <span class="field-icon"><i class="fa fa-map-marker"></i></span>   
                            <b class="tooltip tip-right-top"><em>  Select multiple pickup points</em></b>        							
                        </label>  
                    </div>
                    
                    
                    <div class="section">
                        <label class="field select prepend-icon">
                            <select id="drop_city" name="drop_city" required>
                                <option  value="" disabled selected>Select Drop City</option>
                               <?php foreach($stateCities as $key=>$value) { ?>
								<option value="<?= $value['City']['city_name']; ?>"><?= $value['City']['city_name']; ?></option>
                                <?php } ?>
                                
                            </select>
                            <i class="arrow double"></i>
                            <span class="field-icon"><i class="fa fa-map-marker"></i></span>   
                            <b class="tooltip tip-right-top"><em>  please select the drop city </em></b>        							
                        </label>  
                    </div>
                    
                    
					
					<div class="form-group">
            <div class='input-group date' id='datetimepicker1'>
                <input type='text' name="dep_date" class="form-control" placeholder="Departure Date" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
                   
                    </div><!-- end section -->
                          <div class="section">
                        <label class="field select prepend-icon">
                            <select id="dep_time" name="dep_time" required>
                                <option value="" disabled selected>Select Time</option>
								<option value="12:00 AM">12:00 AM</option>
                                <option value="12:30 AM">12:30 AM</option>
                                <option value="01:00 AM">01:00 AM</option>
                                <option value="01:30 AM">01:30 AM</option>
                                <option value="02:00 AM">02:00 AM</option>
                                <option value="02:30 AM">02:30 AM</option>
                                <option value="03:00 AM">03:00 AM</option>
                                <option value="03:30 AM">03:30 AM</option>
                                <option value="04:00 AM">04:00 AM</option>
                                <option value="04:30 AM">04:30 AM</option>
                                <option value="05:00 AM">05:00 AM</option>
                                <option value="05:30 AM">05:30 AM</option>
                                <option value="06:00 AM">06:00 AM</option>
                                <option value="06:30 AM">06:30 AM</option>
                                <option value="07:00 AM">07:00 AM</option>
                                <option value="07:30 AM">07:30 AM</option>
                                <option value="08:00 AM">08:00 AM</option>
                                <option value="08:30 AM">08:30 AM</option>
                                <option value="09:00 AM">09:00 AM</option>
                                <option value="09:30 AM">09:30 AM</option>
                                <option value="10:00 AM">10:00 AM</option>
                                <option value="10:30 AM">10:30 AM</option>
                                <option value="11:00 AM">11:00 AM</option>
                                <option value="11:30 AM">11:30 AM</option>
                                <option value="12:00 PM">12:00 PM</option>
                                <option value="12:30 PM">12:30 PM</option>
                                <option value="01:00 PM">01:00 PM</option>
                                <option value="01:30 PM">01:30 PM</option>
                                <option value="02:00 PM">02:00 PM</option>
                                <option value="02:30 PM">02:30 PM</option>
                                <option value="03:00 PM">03:00 PM</option>
                                <option value="03:30 PM">03:30 PM</option>
                                <option value="04:00 PM">04:00 PM</option>
                                <option value="04:30 PM">04:30 PM</option>
                                <option value="05:00 PM">05:00 PM</option>
                                <option value="05:30 PM">05:30 PM</option>
                                <option value="06:00 PM">06:00 PM</option>
                                <option value="06:30 PM">06:30 PM</option>
                                <option value="07:00 PM">07:00 PM</option>
                                <option value="07:30 PM">07:30 PM</option>
                                <option value="08:00 PM">08:00 PM</option>
                                <option value="08:30 PM">08:30 PM</option>
                                <option value="09:00 PM">09:00 PM</option>
                                <option value="09:30 PM">09:30 PM</option>
                                <option value="10:00 PM">10:00 PM</option>
                                <option value="10:30 PM">10:30 PM</option>
                                <option value="11:00 PM">11:00 PM</option>
                                <option value="11:30 PM">11:30 PM</option>
                            </select>
                            <i class="arrow double"></i>
                            <span class="field-icon"><i class="fa fa-map-marker"></i></span>   
                            <b class="tooltip tip-right-top"><em>  please enter the Time </em></b>        							
                        </label>  
                    </div>
                    
                    
                    
                    
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
                        	<input name="approx_time" class="gui-input" placeholder="Approx.Time Ex:12 Hrs" type="text" required data-parsley-type="alphanum"> 
                            <b class="tooltip tip-right"><em> please enter the Approx.Time</em></b>
                            <span class="field-icon"><i class="fa fa-user"></i></span>  
                        </label>
                    </div>
					
					</div>
					
					<div style="float: left;width: 42%;margin-left: 75px;padding-top: 10px;">
					
						 					<div class="section">
                    	<label class="field prepend-icon">
                        	<input name="price" class="gui-input" placeholder="Price" type="text" required data-parsley-type="alphanum"> 
                            <b class="tooltip tip-right"><em> please enter the Price</em></b>
                            <span class="field-icon"><i class="fa fa-user"></i></span>  
                        </label>
                    </div>
					
		            
                    
                     <div class="section">
                        <label class="field select prepend-icon">
                            <select id="seats" name="seats" required>
                                <option value="0">Select Seats</option>
								<option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                            <i class="arrow double"></i>
                            <span class="field-icon"><i class="fa fa-map-marker"></i></span>   
                            <b class="tooltip tip-right-top"><em>  please select the seats </em></b>        							
                        </label>  
                    </div>
                    
                    
                         <div class="section">
                        <label class="field select prepend-icon">
                            <select id="amenities" name="amenities" required>
                                <option value="None">Select Amenities</option>
                                 <option value="None">None</option>
                                <option value="Water Bottle, Tea">Water Bottle, Tea</option>
                                <option value="Water Bottle, Tea, AC">Water Bottle, Tea, AC</option>
                               
                             </select>
                            <i class="arrow double"></i>
                            <span class="field-icon"><i class="fa fa-map-marker"></i></span>   
                            <b class="tooltip tip-right-top"><em>  please select the seats </em></b>        							
                        </label>  
                    </div>
                    
                    
							
                    <div class="section">
                    <button type="submit" class="button btn-primary">ADD ROUTE</button>
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
	
	function getPickupPoints() {	
var pickup_city = document.getElementById("pickup_city").value;
  $.ajax({  
  type: "POST",
  dataType: "html",  
  url: BaseURL+"Calls/get_pickup_points",
  data: {'pickup_city':pickup_city},
  success: function(msg){
$('#appendPickupPoints').html(msg);
  }  
});
}
</script>

					 

					