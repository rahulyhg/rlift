    <!-- MAIN WRAPPER -->
    <div id="wrap" >
        
        <!-- MENU SECTION -->
       <?php echo $this->element('menu'); ?>
		 
		<!--END MENU SECTION -->



        <!--PAGE CONTENT -->
        <div id="content">
             
            <div class="inner" style="min-height: 700px;">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 style="margin-left: 50px;"> Admin Dashboard </h3>
                    </div>
                </div>
                  <hr />
                 <!--BLOCK SECTION -->
                 <div class="row">
                    <div class="col-lg-12">
                        <div style="padding-left: 30px;">
                           
                            <a class="quick-btn" href="<?php echo $this->webroot; ?>customers">
                                <i style="font-size: 50px;padding-bottom: 4px;" class="fa fa-user"></i>
                                <span> Customers</span>
                                <span class="label label-success"><?php echo $totalcus; ?></span>
                            </a>

                            <a class="quick-btn" href="<?php echo $this->webroot; ?>driver_overview">
                                <i style="font-size: 50px;padding-bottom: 4px;" class="fa fa-odnoklassniki-square"></i> 
                                <span>Drivers</span>
                                <span class="label label-success"><?php echo $totaldr; ?></span>
                            </a>
                           
                            <a class="quick-btn" href="<?php echo $this->webroot; ?>rides">
                               <i style="font-size: 50px;padding-bottom: 4px;" class="fa fa-car"></i>
                                <span>Rides</span>
                                <span class="label label-success"><?php echo $totalride; ?></span>
                            </a>
							
							 <a class="quick-btn" href="<?php echo $this->webroot; ?>ride_later">
                               <i style="font-size: 50px;padding-bottom: 4px;" class="fa fa-car"></i>
                                <span>Ride Later</span>
                                <span class="label label-success"><?php echo $laterride; ?></span>
                            </a>
                          
                              <a class="quick-btn" href="<?php echo $this->webroot; ?>promos_detail">
                                <i style="font-size: 50px;padding-bottom: 4px;" class="fa fa-gift dashi"></i>
                                <span> Promotions</span>
                                <span class="label label-success"><?php echo $totalpromo; ?></span>
                            </a>

                            <a class="quick-btn" href="#">
                               <i class="fa fa-credit-card dashi" style="font-size: 50px;padding-bottom: 4px;"></i>
                                <span>Payments</span>
                                <span class="label label-success">0</span>
                            </a>
							
                            
                        </div>

                    </div>

                </div>
                  <!--END BLOCK SECTION -->
				         
                 <div class="row">
                    <div class="col-lg-12">
                        <div style="padding-left: 30px;">
                           
                             <a class="quick-btn" href="<?php echo $this->webroot; ?>cabs_detail">
							
                               <i style="font-size: 50px;padding-bottom: 4px;" class="fa fa-car"></i>
							     <span>Cabs</span>
                                <span class="label label-success"><?php echo $totalcab; ?></span>
                            </a>
							
							
							<a class="quick-btn" href="<?php echo $this->webroot; ?>assigncabs">
                                <i style="font-size: 50px;padding-bottom: 4px;" class="fa fa-car"></i>
                                <span> Assigned Cabs</span>
                                <span class="label label-success"><?php echo $assigned; ?></span>
                            </a>

                            <a class="quick-btn" href="<?php echo $this->webroot; ?>unassigncabs">
                               <i class="fa fa-car" style="font-size: 50px;padding-bottom: 4px;"></i>
                                <span> Unassigned Cabs</span>
                                <span class="label label-success"><?php echo $unassigned; ?></span>
                            </a>
                        </div>

                    </div>

                </div>
                
                   <!-- CHART & CHAT  SECTION -->
				<hr /> 
             <div class="row">
                    <div class="col-lg-12">
                        <h4 style="margin-left: 50px;"> Intercity Booking Orders</h4>
                    </div>
                </div>
                 
				  
			     <div class="row">
                    <div class="col-lg-12">
                        <div style="padding-left: 30px;">
                           
                            <a class="quick-btn" href="<?php echo $this->webroot; ?>intercity_details">
                                <i style="font-size: 50px;padding-bottom: 4px;" class="fa fa-car"></i>
                                <span> Find the lift</span>
                                <span class="label label-success"><?php echo $totalforders; ?></span>
                            </a>

                            <a class="quick-btn" href="<?php echo $this->webroot; ?>owncab_details">
                               <i class="fa fa-car" style="font-size: 50px;padding-bottom: 4px;"></i>
                                <span>Book own lift</span>
                                <span class="label label-success"><?php echo $totaloworders; ?></span>
                            </a>

                        </div>

                    </div>

                </div>
			 
			 
			 
			 
			 

                        </div>

                    </div>


                    </div>
              

    <!--END MAIN WRAPPER -->
	

	