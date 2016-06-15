 
 <div id="wrap">
 
  <?php echo $this->element('menu'); ?>
 
<!--PAGE CONTENT -->
        <div id="content">
           
							<div class="inner" style="padding: 40px; padding-top: 15px;">
										<div class="row">
									    <div class="col-lg-12">
										<h3 class="page-header">ADD CAB TYPE</h3>
									   </div>
								       </div>
									   
										
		<div class="smart-wrap">
		
    	<div class="smart-forms smart-container wrap-3" style="float:left;box-shadow: 0 0px 0px rgba(0,0,0,0.65);    margin-top: -14px;
         margin-left: -20px;">
        
        	
            
             <?php echo $this->Form->create('Users'); ?>
            	<div class="form-body">
                 <div style="width: 35%;float: left;">
					   
					   <div class="section">
                        <div class="smart-widget sm-left sml-50">
                            <label class="field">
                                <input name="name" id="name" class="gui-input" placeholder="Enter cab type" type="text" required pattern="[A-Za-z]+" title="Please enter only alphabets">
                            </label>
                            <label for="sm3" class="button"> <i class="fa fa-car"></i> </label>
                        </div><!-- end .smart-widget section --> 
                    </div><!-- end section -->  
					</div>
					
					<div style="float: left;width: 42%;margin-left: 26px;">
                  
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
             