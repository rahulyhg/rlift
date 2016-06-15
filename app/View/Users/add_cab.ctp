 <div id="wrap">
 
  <?php echo $this->element('menu'); ?>
 
<!--PAGE CONTENT -->
        <div id="content">
           
							<div class="inner" style="padding: 40px; padding-top: 15px;">
										<div class="row">
									    <div class="col-lg-12">
										<h3 class="page-header">ADD CAB</h3>
									   </div>
								       </div>
									   
										
		<div class="smart-wrap">
		
    	<div class="smart-forms smart-container wrap-3" style="float:left;box-shadow: 0 0px 0px rgba(0,0,0,0.65);    margin-top: -14px;
         margin-left: -20px;">
        
        	
            
            <?php echo $this->Form->create('Users', array('type' => 'file')); ?>
            	<div class="form-body">
                
                 
             <div style="width: 42%;float: left;">
			 
             <div class="section">
                        <label class="field select prepend-icon">
                            <select id="veh_type" name="veh_type" required>
                                <option selected="selected" value="" disabled>Select cab type</option>
                                 <?php foreach($vehtype as $key=>$value) { ?>
								<option value="<?= $value ?>"><?= $value ?></option>
                                <?php } ?>
                            </select>
                            <i class="arrow double"></i>
                            <span class="field-icon"><i class="fa fa-taxi"></i></span>   
                            <b class="tooltip tip-right-top"><em> please choose cab type </em></b>        							
                        </label>  
            </div><!-- end section --> 
                    
                
                	<div class="section">
                    	
                    	<label class="field prepend-icon">
                        	<input name="veh_name" id="veh_name" class="gui-input" placeholder="vehicle name" type="text" required>
                            <b class="tooltip tip-right"><em> please enter vehicle name</em></b>
                            <span class="field-icon"><i class="fa fa-car"></i></span>  
                        </label>
                    </div><!-- end section -->
                    
					<div class="section">
                    	
                    	<label class="field prepend-icon">
                        	<input name="veh_model" id="veh_model" class="gui-input" placeholder="Enter model number" type="text" required>
                            <b class="tooltip tip-right"><em> please enter vehicle model number</em></b>
                            <span class="field-icon"><i class="fa fa-car"></i></span>  
                        </label>
                    </div><!-- end section -->
					
					<div class="section">
                    	
                    	<label class="field prepend-icon">
                        	<input name="veh_color" id="veh_color" class="gui-input" placeholder="Enter vehicle color" type="text" required>
                            <b class="tooltip tip-right"><em> please enter color of vehicle</em></b>
                            <span class="field-icon"><i class="fa fa-car"></i></span>  
                        </label>
                    </div><!-- end section -->
					
						<div class="section">
                    	
                    	<label class="field prepend-icon">
                        	<input name="seats" id="seats" class="gui-input" placeholder="Enter number of seats in cab" type="text" required>
                            <b class="tooltip tip-right"><em> please enter number of seats in vehicle</em></b>
                            <span class="field-icon"><i class="fa fa-car"></i></span>  
                        </label>
                    </div><!-- end section -->
					
					
						<div class="section">
                    	
                    	<label class="field prepend-icon">
                        	<input name="veh_number" id="veh_number" class="gui-input" placeholder="Enter vehicle number" type="text" required>
                            <b class="tooltip tip-right"><em> please enter registered vehicle number</em></b>
                            <span class="field-icon"><i class="fa fa-car"></i></span>  
                        </label>
                    </div><!-- end section -->
					
					<div class="section">
                    	
                    	<label class="field prepend-icon">
                        	<input name="state_veh" id="state_veh" class="gui-input" placeholder="Vehicle number registered in which state ?" type="text" required>
                            <b class="tooltip tip-right"><em>please enter state name where you registered your vehicle</em></b>
                            <span class="field-icon"><i class="fa fa-car"></i></span>  
                        </label>
                    </div><!-- end section -->
					
					</div>
					
					<div style="    float: left;width: 42%;margin-left: 75px;">
					
					 <div class="section">
                        <label class="field prepend-icon file">
                            <span class="button btn-primary"> Choose File </span>
                			<input class="gui-file" name="vehimg" id="vehimg" onchange="document.getElementById('uploader2').value = this.value;" type="file" required>
                            <input class="gui-input" id="uploader2" placeholder="Upload vehicle image/photo" readonly="readonly" type="text">
                            <span class="field-icon"><i class="fa fa-upload"></i></span>
                        </label>
                    </div><!-- end  section -->
					
					
				  <div class="section">
                        <label class="field prepend-icon file">
                            <span class="button btn-primary"> Choose File </span>
                			<input class="gui-file" name="reg_cr" id="reg_cr" onchange="document.getElementById('rcc').value = this.value;" type="file" required>
                            <input class="gui-input" id="rcc" placeholder="Upload certificate of registration " readonly="readonly" type="text">
                            <span class="field-icon"><i class="fa fa-upload"></i></span>
                        </label>
                    </div><!-- end  section -->
					
					 <div class="section">
                        <label class="field prepend-icon file">
                            <span class="button btn-primary"> Choose File </span>
                			<input class="gui-file" name="insurace_cr" id="insurace_cr" onchange="document.getElementById('crr').value = this.value;" type="file" required>
                            <input class="gui-input" id="crr" placeholder="Upload certificate of insurance" readonly="readonly" type="text">
                            <span class="field-icon"><i class="fa fa-upload"></i></span>
                        </label>
                    </div><!-- end  section -->
					
					 <div class="section">
                        <label class="field prepend-icon file">
                            <span class="button btn-primary"> Choose File </span>
                			<input class="gui-file" name="em_cr" id="em_cr" onchange="document.getElementById('emcr').value = this.value;" type="file" required>
                            <input class="gui-input" id="emcr" placeholder="Upload Emission test certificate" readonly="readonly" type="text">
                            <span class="field-icon"><i class="fa fa-upload"></i></span>
                        </label>
                    </div><!-- end  section -->
					
				
                    
                    <div class="section">
                    <button type="submit" class="button btn-primary">ADD</button>
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
             