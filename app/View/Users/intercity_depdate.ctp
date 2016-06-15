
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
										<h3 class="page-header">ASSIGN DEPARTURE DATE AND TIME</h3>
									    </div>
					        </div>
									   
										
		<div class="smart-wrap">
		
    	<div class="smart-forms smart-container wrap-3" style="float:left;box-shadow: 0 0px 0px rgba(0,0,0,0.65);    margin-top: -14px;
         margin-left: -20px;">
        
        	<h4 style="text-transform: uppercase;font-size: 15px; color: green;">Route number - <?php echo $routeid; ?> (<?php echo $pickup_city; ?> -> <?php echo $drop_city; ?> VIA <?php echo $via; ?>) </h4>
            
            <?php echo $this->Form->create('Users'); ?>
            	<div class="form-body">
                
                 
             <div style="width: 42%;float: left;">
			 
              <input type='hidden' name="id" class="form-control"  value="<?php echo $id ?>" />
			  
					<div class="form-group">
            <div class='input-group date' id='datetimepicker1'>
                <input type='text' name="dep_date" class="form-control" placeholder="Departure Date" required />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
                   
					 <div class="section">
                        <label class="field select prepend-icon">
                            <select id="dep_time" name="dep_time" required>     
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
                    <button type="submit" class="button btn-primary">CHANGE</button>
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
  url: "users/get_pickup_points",
  data: {'pickup_city':pickup_city},
  success: function(msg){
$('#appendPickupPoints').html(msg);
  }  
});
}
</script>

					 

					