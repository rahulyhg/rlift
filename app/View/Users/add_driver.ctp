
        <?php echo $this->Html->script('jquery-1.9.1.min');  ?>
     <?php echo $this->Html->script('jquery.maskedinput');  ?>
	   <?php echo $this->Html->script('jquery-ui-custom.min');  ?>
	     <?php echo $this->Html->script('jquery-ui-combo.min');  ?>
     


    <script type="text/javascript">
	
		$(function() {
		

			/* @normal masking rules 
			---------------------------------------------------------- */
				
			$.mask.definitions['f'] = "[A-Fa-f0-9]"; 	
		  	$("#aadhar_nfdo").mask('(999) 999-999999', {placeholder:'X'});
			$("#aadhar_no").mask('999 9999 9999', {placeholder:'X'}); 
		  	$("#pincode").mask('999999', {placeholder:'X'});
		  	$("#dates").mask('99/99/9999', {placeholder:'_'});
			$("#dates2").mask('99-99-9999', {placeholder:'_'});
			$("#time").mask('99:99:99', {placeholder:'_'});
			$("#date-time").mask('99/99/9999 99:99:99', {placeholder:'_'});
			$("#currency").mask('999,999,999,999,999.99', {placeholder:'_'});
			$("#ip4").mask('999.999.999.999', {placeholder:'_'});
			$("#ip6").mask('9999:9999:9999:9:999:9999:9999:9999', {placeholder:'_'});
			$("#isbn").mask('999-99-999-9999-9', {placeholder:'_'});
			$("#isbn2").mask('999 99 999 9999 9', {placeholder:'_'});
			$("#taxid").mask('99-9999999', {placeholder:'_'});
		  	$("#serial").mask('***-****-****-****', {placeholder:'_'});
			$("#color").mask('#ffffff', {placeholder:'_'});
			$("#alpha").mask('aaaaaa-aaaaaa', {placeholder:'X'});
			$("#product").mask("a*-999-a999",{placeholder:"_",
						 completed:function(){
						 	alert("Congraturations! Product activated the with a valid key: "+this.val());
						 }
			});
			
			/* @advanced masking rules 
			------------------------------------------------------------------------ */	
		    var creditcard = $("#creditcard").mask('9999-9999-9999-9999', {placeholder:'X'});
		 	$("#cardtype").change(
				function() {
					switch ($(this).val()){
						case 'amex':
						  creditcard.unmask().mask('9999-999999-99999', {placeholder:'_'});
						  break;
						default:
						  creditcard.unmask().mask('9999-9999-9999-9999', {placeholder:'X'});
						  break;
					  }
				}
			);
		  	
		
		});				
    
    </script>



 <div id="wrap">
 
  <?php echo $this->element('menu'); ?>
 
<!--PAGE CONTENT -->
        <div id="content">
           
							<div class="inner" style="padding: 40px; padding-top: 15px;">
										<div class="row">
									    <div class="col-lg-12">
										<h3 class="page-header">ADD DRIVER DETAIL</h3>
									   </div>
								       </div>
									   
										
		<div class="smart-wrap">
		
    	<div class="smart-forms smart-container wrap-3" style="float:left;box-shadow: 0 0px 0px rgba(0,0,0,0.65);    margin-top: -14px;
         margin-left: -20px;">
        
        	
            
            <?php echo $this->Form->create('Users', array('type' => 'file','data-parsley-validate')); ?>
            	<div class="form-body">
                
                 
             <div style="width: 42%;float: left;">

                	<div class="section">
                    	
                    	<label class="field prepend-icon">
                        	<input name="fname" id="fname" class="gui-input" placeholder="Enter first name" type="text" required data-parsley-type="alphanum">
                            <b class="tooltip tip-right"><em> please enter first name</em></b>
                            <span class="field-icon"><i class="fa fa-user"></i></span>  
                        </label>
                    </div><!-- end section -->
                    
					<div class="section">
                    	
                    	<label class="field prepend-icon">
                        	<input name="lname" id="lname" class="gui-input" placeholder="Enter last name" type="text" required data-parsley-type="alphanum"> 
                            <b class="tooltip tip-right"><em> please enter last name</em></b>
                            <span class="field-icon"><i class="fa fa-user"></i></span>  
                        </label>
                    </div><!-- end section -->
					
					<div class="section">
                    	
                    	<label class="field prepend-icon">
                        	<input name="email_id" id="email_id" class="gui-input" placeholder="Enter email address" type="text" required data-parsley-type="email">
                            <b class="tooltip tip-right"><em> please enter email address</em></b>
                            <span class="field-icon"><i class="fa fa-envelope"></i></span>  
                        </label>
                    </div><!-- end section -->
					
					<div class="section">
                    	
                    	<label class="field prepend-icon">
                        	<input name="phone" id="phone" class="gui-input" placeholder="Enter mobile number" type="text" required data-parsley-type="number">
                            <b class="tooltip tip-right"><em> please enter phone number</em></b>
                            <span class="field-icon"><i class="fa fa-phone"></i></span>  
                        </label>
                    </div><!-- end section -->
					
					
					<div class="section">
                    	
                    	<label class="field prepend-icon">
                        	<input name="password" id="password" class="gui-input" placeholder="Please enter password for driver" type="text" required>
                            <b class="tooltip tip-right"><em> Please enter password for driver</em></b>
                            <span class="field-icon"><i class="fa fa-key"></i></span>  
                        </label>
                    </div><!-- end section -->
					
							<div class="section">
                    	
                    	<label class="field prepend-icon">
                        	<input name="driving_no" id="driving_no" class="gui-input" placeholder="Enter driving licence number" type="text" required>
                            <b class="tooltip tip-right"><em> please enter driving licence number</em></b>
                            <span class="field-icon"><i class="fa fa-user"></i></span>  
                        </label>
                    </div><!-- end section -->

						<div class="section">
                    	
                    	<label class="field prepend-icon">
                        	<input name="phone2" id="phone2" class="gui-input" placeholder="Enter alternative phone number" type="text" required data-parsley-type="number">
                            <b class="tooltip tip-right"><em> please enter alternative phone number</em></b>
                            <span class="field-icon"><i class="fa fa-phone"></i></span>  
                        </label>
                    </div><!-- end section -->
					
					<div class="section">
                    	
                    	<label class="field prepend-icon">
                        	<input name="dob" id="dates2" class="gui-input" placeholder="Enter date of birth - DD-MM-YYYY" type="text" required>
                            <b class="tooltip tip-right"><em>Please enter date of birth - DD-MM-YYYY</em></b>
                            <span class="field-icon"><i class="fa fa-birthday-cake"></i></span>  
                        </label>
                    </div><!-- end section -->
					
					
					   <div class="section">
                        <label class="field select prepend-icon">
                            <select id="country" name="country" required>
                                <option selected="selected" disabled value="">Select Country</option>
							   <?php foreach($countries as $key=>$value) { ?>
                               <option value="<?= $value['Country']['country_name'] ?>" <?php  if($value['Country']['country_name'] == 'India') { echo "selected"; } ?>><?= $value['Country']['country_name'] ?></option>
                                <?php } ?>
						   </select>
                            <i class="arrow double"></i>
                            <span class="field-icon"><i class="fa fa-map-marker"></i></span>   
                            <b class="tooltip tip-right-top"><em> please choose country </em></b>        							
                        </label>  
                    </div><!-- end section --> 
					
					   <div class="section">
                        <label class="field select prepend-icon">
                            <select id="state" name="state" required>
                                <option selected="selected" disabled value="">Select state</option>
                               <?php foreach($states as $key=>$value) { ?>
								<option value="<?= $value['State']['StateName'] ?>" <?php  if($value['State']['StateName'] == 'KARNATAKA') { echo "selected"; } ?>><?= $value['State']['StateName'] ?></option>
                                <?php } ?>
                            </select>
                            <i class="arrow double"></i>
                            <span class="field-icon"><i class="fa fa-map-marker"></i></span>   
                            <b class="tooltip tip-right-top"><em> please choose state </em></b>        							
                        </label>  
                    </div><!-- end section --> 
					
					 <div class="section">
                        <label class="field select prepend-icon">
                            <select id="city" name="city" required>
                                <option selected="selected" value="" disabled>Select city</option>
                                <?php foreach($cities as $key=>$value) { ?>
								<option value="<?= $value['City']['city_name'] ?>" <?php  if($value['City']['city_name'] == 'Bangalore') { echo "selected"; } ?>><?= $value['City']['city_name'] ?></option>
                                <?php } ?>
                            </select>
                            <i class="arrow double"></i>
                            <span class="field-icon"><i class="fa fa-map-marker"></i></span>   
                            <b class="tooltip tip-right-top"><em> please choose city </em></b>        							
                        </label>  
                    </div><!-- end section --> 
					
					<div class="section">
                    	
                    	<label class="field prepend-icon">
                        	<input name="pincode" id="pincode" class="gui-input" placeholder="Enter pin/zip code" type="text" required>
                            <b class="tooltip tip-right"><em> please enter pincode</em></b>
                            <span class="field-icon"><i class="fa fa-map-pin"></i></span>  
                        </label>
                    </div><!-- end section -->
					
						<div class="section">
                    	
                    	<label class="field prepend-icon">
                        	<textarea class="gui-textarea" id="address" name="address" placeholder="enter address details" required data-parsley-minlength="80" data-parsley-maxlength="300"></textarea>
                            <b class="tooltip tip-right"><em> please enter address details</em></b>
                            <span class="field-icon"><i class="fa fa-map-signs"></i></span>
                            <span class="input-hint"> <strong>Hint:</strong> Please enter between 80 - 300 characters.</span>   
                        </label>
                    </div>
					
					</div>
					
					<div style="float: left;width: 42%;margin-left: 75px;padding-top: 10px;">
					
						 <div style="margin-bottom: 9px; color: #8E8E8E;">(Max. file size 2MB for all file uploads) </div>
						 <div class="section">
                        <label class="field prepend-icon file">
                            <span class="button btn-primary"> Choose File </span>
                			<input class="gui-file" id="driver_photo" name="driver_photo" onchange="document.getElementById('driver_photos').value = this.value;" type="file" required>
                            <input class="gui-input" id="driver_photos" placeholder="Upload driver picture (.jpeg, .gif, .png)" readonly="readonly" type="text">
                            <span class="field-icon"><i class="fa fa-upload"></i></span>
                        </label>
                    </div><!-- end  section -->
						
						<div class="section">
                        <label class="field prepend-icon file">
                            <span class="button btn-primary"> Choose File </span>
                			<input class="gui-file" id="driving_file" name="driving_file" onchange="document.getElementById('driving_files').value = this.value;" type="file" required>
                            <input class="gui-input" id="driving_files"  placeholder="Upload photo copy of driving licence" readonly="readonly" type="text" >
                            <span class="field-icon"><i class="fa fa-upload"></i></span>
                        </label>
                    </div><!-- end  section -->
						
						<div class="section">
                        <label class="field prepend-icon file">
                            <span class="button btn-primary"> Choose File </span>
                			<input class="gui-file" id="address_proof" name="address_proof" onchange="document.getElementById('address_proofs').value = this.value;" type="file" required>
                            <input class="gui-input" id="address_proofs" placeholder="Upload address proof" readonly="readonly" type="text">
                            <span class="field-icon"><i class="fa fa-upload"></i></span>
                        </label>
                    </div><!-- end  section -->		

					<div class="section">
	 
					<div style="margin-bottom: 10px;"> Driver have aadhar card</div>
					<div style="clear:both;"></div>
					
					<div style="float:left;">
					<input type="radio" id="radio1" name="have_aadhar" class="have_aadhar" value="yes" checked 
					style="cursor: pointer;" />
					<label for="radio1">Yes</label>
					</div>

					<div style="padding-left: 62px;">
					<input type="radio"  name="have_aadhar" class="have_aadhar" id="radio2"  value="no" style="cursor: pointer;" />
					<label for="radio2">No</label>
					</div>
					
		            </div>
					 
					 
					 <div class="section aadharhide">
                    	
                    	<label class="field prepend-icon">
                        	<input name="aadhar_no" id="aadhar_no" class="gui-input" placeholder="Enter 12 digit aadhaar number" type="text" required>
                            <b class="tooltip tip-right"><em> please enter aadhaar number</em></b>
                            <span class="field-icon"><i class="fa fa-user"></i></span>  
                        </label>
                    </div><!-- end section -->
					
					 <div class="section aadharhide">
                        <label class="field prepend-icon file">
                            <span class="button btn-primary"> Choose File </span>
                			<input class="gui-file" id="aadhar_file" name="aadhar_file" onchange="document.getElementById('aadhar_files').value = this.value;" type="file" required>
                            <input class="gui-input" id="aadhar_files"  placeholder="Upload photo copy of aadhar card" readonly="readonly" type="text">
                            <span class="field-icon"><i class="fa fa-upload"></i></span>
                        </label>
                    </div><!-- end  section -->
					
					 <div class="section uidshow" style="display:none;">
                        <label class="field prepend-icon file">
                            <span class="button btn-primary"> Choose File </span>
                			<input class="gui-file" id="uid_file" name="uid_file" onchange="document.getElementById('uid_files').value = this.value;" type="file">
                            <input class="gui-input" id="uid_files"  placeholder="Upload any another valid id proof" readonly="readonly" type="text">
                            <span class="field-icon"><i class="fa fa-upload"></i></span>
                        </label>
                    </div><!-- end  section -->

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
             
	 
	  <script>
	 $('.have_aadhar').on('change',function(){
	   var s = $(this).val();

	   if(s == 'no')
	   {
		   $('.aadharhide').hide('slow');
		   $('.uidshow').show('slow');
           $("#uid_file").attr("required","required");		   
		   $("#aadhar_no").removeAttr("required");
		   $("#aadhar_file").removeAttr("required");
		   
	   }
	   else
	   {
		 
		 $('.aadharhide').show('slow');
		 $('.uidshow').hide('slow'); 
         $("#aadhar_no").attr("required","required");
		 $("#aadhar_file").attr("required","required");
		 $("#uid_file").removeAttr("required");
		 
	   }	   
	   
	});  
	
	$('.have_vehicle').on('change',function(){
	   var s = $(this).val();

	   if(s == 'yes')
	   {
		  
		   $('.vehno').show('slow');
           $("#veh_no").attr("required","required");	
	   
	    }
	   else
	   {
		 
		 $('.vehno').hide('slow');
		 $('.uidshow').hide('slow'); 
         $("#veh_no").removeAttr("required");
		 
	   }	   
	   
	}); 
	 </script>	


	
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

