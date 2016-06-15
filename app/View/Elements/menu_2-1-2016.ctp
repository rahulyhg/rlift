  <!-- MENU SECTION -->
       <div id="left" >
         
					<div class="" style="
				background-color: #02A05F;
				text-align: center;
				    width: 99%;
			">
			<img class="" alt="User Picture" src="<?= $this->webroot ?>img/rite.png"  style="
				padding-top: 4px;
				padding-bottom: 21px;
			">
            </div>

            <ul id="menu" class="collapse">

                
                <li class="panel active">
                    <a href="<?=$this->webroot ?>dashboard" >
                        <i class="fa fa-tachometer"></i> Dashboard
	   
                       
                    </a>                   
                </li>
				
				  <li class="panel ">
                    <a href="<?=$this->webroot ?>customers" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#customer">
                    <i class="fa fa-user"></i> Customers
	                 </a>
                          
                </li>
				
				 <li class="panel ">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#driver">
                        <i class="fa fa-odnoklassniki-square"></i> Drivers
	   
                        <span class="pull-right">
                           <i class="fa fa-angle-down"></i>

                        </span>
                        
                    </a>
                    <ul class="collapse belowdrop" id="driver">
                        <li class=""><a href="<?=$this->webroot ?>add_driver" style="padding-left: 15px;"> <i class="fa fa-odnoklassniki-square"></i> Add Drivers</a></li>
                        <li class=""><a href="<?=$this->webroot ?>driver_overview" style="padding-left: 15px;"> <i class="fa fa-odnoklassniki-square"></i> Drivers Overview</a></li>
                        <li class=""><a href="<?=$this->webroot ?>driver_detail" style="padding-left: 15px;"> <i class="fa fa-odnoklassniki-square"></i> Drivers Details</a></li>
                    </ul>
                </li>
				
					 <li class="panel ">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#cabtype">
                         <i class="fa fa-car"></i> Cabs Type
	                  <span class="pull-right">
                            <i class="fa fa-angle-down"></i>

                        </span>
					 
					 </a>
                        
                    <ul class="collapse belowdrop" id="cabtype">
					  <li class=""><a href="<?=$this->webroot ?>cab_type" style="padding-left: 15px;"><i class="fa fa-car"></i> Add Cabs Type</a></li>
                       <li class=""><a href="<?=$this->webroot ?>cabtypes" style="padding-left: 15px;"> <i class="fa fa-car"></i> Cabs Type Details</a></li>
                     </ul>
                </li>
				
				
				 <li class="panel ">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#cab">
                        <i class="fa fa-car"></i> Cabs
	                     <span class="pull-right">
                            <i class="fa fa-angle-down"></i>

                        </span>
                         </a>
                    <ul class="collapse belowdrop" id="cab">
					  
                       <li class=""><a href="<?=$this->webroot ?>add_cab" style="padding-left: 15px;"><i class="fa fa-car"></i> Add Cabs</a></li>
					   <li class=""><a href="<?=$this->webroot ?>cabs_detail" style="padding-left: 15px;"> <i class="fa fa-car"></i> Cabs Details</a></li>
                    
                    </ul>
                </li>

				
				 <li class="panel ">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#cabprice">
                         <i class="fa fa-car"></i> Cabs Pricing
	   
                        <span class="pull-right">
                           <i class="fa fa-angle-down"></i>

                        </span>
                         
                    </a>
                    <ul class="collapse belowdrop" id="cabprice">
                        <li class=""><a href="<?=$this->webroot ?>cab_pricing" style="padding-left: 15px;"><i class="fa fa-car"></i> Add Cabs Pricing </a></li>
                        <li class=""><a href="<?=$this->webroot ?>pricing_detail" style="padding-left: 15px;"> <i class="fa fa-car"></i> Cabs Pricing Details</a></li>
                    </ul>    
                </li>
				
				 <li class="panel ">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#airport">
                        <i class="fa fa-plane"></i> Airport Pricing
	   
                        <span class="pull-right">
                           <i class="fa fa-angle-down"></i>

                        </span>
                         
                    </a>
                    <ul class="collapse belowdrop" id="airport">
                        <li class=""><a href="<?=$this->webroot ?>airport_pricing" style="padding-left: 15px;"><i class="fa fa-plane"></i> Add Airport Pricing</a></li>
                        <li class=""><a href="<?=$this->webroot ?>airport_pricing_detail" style="padding-left: 15px;"> <i class="fa fa-plane"></i> Airport Pricing Details</a></li>
						</ul>
             
                </li>
				
				 <li class="panel ">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#promotions">
                       <i class="fa fa-gift"></i> Promotions
	   
                        <span class="pull-right">
                            <i class="fa fa-angle-down"></i>

                        </span>
                         
                    </a>
                    <ul class="collapse belowdrop" id="promotions">
                        <li class=""><a href="<?=$this->webroot ?>create_promos" style="padding-left: 15px;"><i class="fa fa-gift"></i> Create Promotions </a></li>
                        <li class=""><a href="<?=$this->webroot ?>promos_detail" style="padding-left: 15px;"> <i class="fa fa-gift"></i> Promotions Details</a></li>
                       
                    </ul>
                </li>
				
				 <li class="panel ">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#form-assa">
                         <i class="fa fa-car"></i> Intercity Pooling
	   
                        
                          
                    </a>
                   
                </li>
				
				<li class="panel ">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#citytocoty">
                         <i class="fa fa-car"></i> Intra Pooling
	   
                        <span class="pull-right">
                           <i class="fa fa-angle-down"></i>

                        </span>
                         
                    </a>
                    <ul class="collapse belowdrop" id="citytocoty">
                        <li class=""><a href="forms_general.html" style="padding-left: 15px;"><i class="fa fa-car"></i> Create Intra Pool</a></li>
                        <li class=""><a href="forms_advance.html" style="padding-left: 15px;"> <i class="fa fa-car"></i> Pooling Details</a></li>
                       
                    </ul>
                </li>
				
				 <li class="panel ">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#rm-nav">
                       <i class="fa fa-credit-card"></i> Payments
	   
                    </a>
                   
                </li>
				
				 <li class="panel ">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#foasdv">
                         <i class="fa fa-car"></i> Rite Rides
                  </a>
                </li>
				
				 <li class="panel ">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#sdf">
                       <i class="fa fa-commenting"></i> Feedbacks
	   
                    </a>
                </li>


            </ul>

        </div>