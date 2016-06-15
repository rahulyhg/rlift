<?php

App::uses('AppController', 'Controller');
class ApisController extends AppController {

    var $components = array('Session', 'Cookie','RequestHandler','Auth');
	var $helpers=array('Js');
	var $uses = array('Customer','User','VehicleName','Country','State','City','Price','AirportPrice','PromoCode','Driver','InfoVehicle','Location','DriverLocation','Notification','Ride','CustomerReciept','CancelRide','Rating','AssignVehicleToDriver','OwnCabTemplate','PickupPoint','IntercityFindCabOrder','IntercityOwnCabOrder');
	  
	function beforeFilter()
    {
       $this->Auth->allow('signup','signin','editprofile','resetpass','emergency','location','driver_location','driver_signin','getdrivers','driver_logout','customer_logout','driver_notification','get_notification','getpromos','notiview','noti_action','noti_check','otp','cities','driver_details','noti_details','veh_details','rides','price_details','customer_reciept','ride_cancel','resendotp','cancelotp','driveronoff','rating','test','index','assign_vehicle_driver_form','check_vehicles','assigned_vehicle_details','get_cities','get_cab_full_info','book_seat','book_your_owncab_form','get_your_own_cab_details','book_your_own_cab');
	}
	
	public function test() {
	    echo json_encode($_REQUEST);
		echo json_encode($_GET);
		echo json_encode($_POST);
	    die();
	}
	
	
	 public function index() {
		
		//$homepage = file_get_contents('http://sms.ssdindia.com/api/sendhttp.php?authkey=10559Ay4ScEtjn567289c0&mobiles=9742441734&message=hi%20ritecab%20is%20working&sender=kiv.phy&route=1');
	   // echo $homepage;

		//	echo json_encode($_REQUEST);
		//	echo json_encode($_GET);
		//	echo json_encode($_POST);
		//	echo json_encode($_SERVER);
	  
	    die();
	}
	    
		// call for otp 
		 public function otp() {
		 Configure::write('debug',0);
		  
		  if(!empty($_POST)){ 
             $otp = $_POST['otp'];
			 $customer_id = $_POST['customer_id'];
			    $otp_check = $this->Customer->find('count', array('conditions' => array('Customer.id' => $customer_id,'Customer.otp' => $otp)));				 
				 if($otp_check != 0)
				 {
					$this->Customer->create();
					$this->request->data['Customer']['id'] = $customer_id;
					$this->request->data['Customer']['Isactive'] = 'yes';
					if($this->Customer->save($this->request->data))
					{
						$status = '[{"status":"success"}]';
						echo $status; 
						die();
					}	
               }
               else {
				        $status = '[{"status":"your verification code is not correct"}]';
						echo $status; 
						die();
			   }			   
		  
		 }
		 
		 }
		
	    // call for resend otp
		 public function resendotp() {
			 
	     Configure::write('debug',0);
 
			 if(!empty($_POST)){ 
            
			    $customer_id = $_POST['customer_id'];
				$name = $_POST['name'];
				$phone_no = $_POST['phone_no'];
                $otp =  substr(number_format(time() * rand(),0,'',''),0,4);
				
				$this->Customer->updateAll(array('Customer.otp' => $otp),array('Customer.id' => $customer_id));
				$otp = file_get_contents("http://alerts.valueleaf.com/api/v3/index.php?method=sms&api_key=A627cf6ba484176d4d4c0f67897396765&to=".$phone_no."&sender=VLDEMO&message=Dear%20".$name.",%20your%20verification%20code%20is%20".$otp.".Team%20RiteCab&format=php&custom=1,2&flash=0");
				
				$status = '[{"status":"success"}]';
				echo $status;
	            die();
	      }
	
		 }
		 
		 // call for cancel otp/customer
		 public function cancelotp() {
			 
	     Configure::write('debug',0);
 
			 if(!empty($_POST)){ 
            
			    $customer_id = $_POST['customer_id'];
			    
				$query = $this->Customer->deleteAll(array('Customer.id' => $customer_id), false);
				if($query == true)
		        { 
					$status = '[{"status":"success"}]';
				}  
				else 
				{ 
			       $status = '[{"status":"failure"}]';
				}

				echo $status;
	            die();
	      }
	
		 }
		 
		  // call for cancel otp/customer
		 public function driveronoff() {
			 
	     Configure::write('debug',0);
                   if(!empty($_POST)){
      
							$todo = $_POST['todo'];
							$driver_id = $_POST['driver_id'];
							
							if($todo == 'on')
							{
								$this->Driver->updateAll(array('Driver.isactive' => '"yes"'),array('Driver.id' => $driver_id));
								$status = '[{"status":"Driver get on successfully"}]';
							}
							else
							{
								$this->Driver->updateAll(array('Driver.isactive' => '"no"'),array('Driver.id' => $driver_id));
								$status = '[{"status":"Driver get off successfully"}]';
							}					
							echo $status; 
					 
					 }
					 exit;
	      }
	
		 
		
		// call for signup
		 public function signup() {
		Configure::write('debug',0);
		  
		 if(!empty($_POST)){ 
		 $name = $_POST['name'];
		 $email = $_POST['email'];
		 if (!filter_var($email, FILTER_VALIDATE_EMAIL) != false) {
			$status = '[{"status":"Sorry!! email address is not valid."}]';
			echo $status; 
			die();
		 }
		 
		 $phone_no = $_POST['phone_no'];
		 $password = $_POST['password'];	
         $repassword = $_POST['repassword'];	
		 
       //  $refcode = $_POST['refcode'];


	             if($password != $repassword)
				 {
				 $status = '[{"status":"Sorry!! passwords fields does not matches"}]';
				 echo $status; 
				 die();
				 }

                 $email_phone = $this->Customer->find('count', array('conditions' => array('OR' => array(array('Customer.email' => $email),array('Customer.phone_no' => $phone_no)))));				 
                 
				 if($email_phone != 0)
				 {
					$status = '[{"status":"Sorry!! Email id or phone number already taken."}]';
					echo $status; 
					die();
				 }

                $otp =  substr(number_format(time() * rand(),0,'',''),0,4);
				$hashpassword = AuthComponent::password($password);
				$this->Customer->create();
				$this->request->data['Customer']['name'] = $name;
				$this->request->data['Customer']['otp'] = $otp;
				$this->request->data['Customer']['email'] = $email;
				$this->request->data['Customer']['phone_no'] = $phone_no;
				$this->request->data['Customer']['password'] = $hashpassword;

				if($this->Customer->save($this->request->data))
				{ 
			         $status = $this->Customer->find('all', array('conditions' => array('Customer.email' => $email,'Customer.phone_no' => $phone_no)));
					 $status['0']['status'] = 'success'; 
					 $status['0']['code'] = '200'; 
					 echo json_encode($status);
					$otp = file_get_contents("http://alerts.valueleaf.com/api/v3/index.php?method=sms&api_key=A627cf6ba484176d4d4c0f67897396765&to=".$phone_no."&sender=VLDEMO&message=Dear%20".$name.",%20your%20verification%20code%20is%20".$otp.".Team%20RiteCab&format=php&custom=1,2&flash=0");
			}  
				else 
				{ 
			        $status = '[{"status":"failure"}]';
					echo $status;  
				}		 
		  }
		  else
		  { echo 	$status = '[{"status":"Access denied"}]';
					echo $status;
		  }	
	   die();
	}
	
	     // call for signin 
		 public function signin() {
		 Configure::write('debug',0);
		  
		 if(!empty($_POST)){ 
			 $username =  $_POST['username'];
			 $password = $_POST['password'];
			 $hashpassword = AuthComponent::password($password);
			 $status = $this->Customer->find('all', array('conditions' => array('Customer.password' => $hashpassword,'Customer.Isactive' => 'yes', 'OR' => array(array('Customer.email' => $username),array('Customer.phone_no' => $username)))));	
			 
			 if(!empty($status))
			 {
				$status['0']['status'] = 'success'; 
				$status['0']['code'] = '200'; 
				echo json_encode($status);  
			 }
			 else 
			 { 
				$status = '[{"status":"failure"}]';
				echo $status;
			 }		 
		  }
		  else
		  {
			        $status = '[{"status":"Access denied"}]';
					echo $status;
		  }	
	   die();
	}
	
	     
		  // call for driver signin
	     public function driver_signin() {
		 Configure::write('debug',0);	 
			 
	     if(!empty($_POST)){ 
			 $username =  $_POST['username'];
			 $password = $_POST['password'];
			 $hashpassword = AuthComponent::password($password);
			 $status = $this->Driver->find('all', array('conditions' => array('Driver.password' => $hashpassword, 'OR' => array(array('Driver.email_id' => $username),array('Driver.phone' => $username))),'fields'=>array('Driver.id','Driver.fname','Driver.lname','Driver.driver_photo','Driver.email_id','Driver.phone','Driver.action','Driver.address','Driver.driverid','Driver.veh_assign')));	
			 
			 $action = $status['0']['Driver']['action'];
			 $driver_id = $status['0']['Driver']['id'];
			 
			  if($action == 'Blocked')
			 {
				$status = '[{"status":"Sorry!! you have been blocked by administration"}]';
				echo $status;
				exit;
			 }
			 
			 if(!empty($status))
			 {
				
				unset($this->request->data['username']);
				unset($this->request->data['password']);
				
				$this->Driver->create();
				$this->request->data['Driver']['id'] = $driver_id;
				$this->request->data['Driver']['isactive'] = 'yes';
				//print_r($this->request->data);
				//exit;
				$this->Driver->save($this->request->data); 
				$status['0']['status'] = 'success'; 
				$status['0']['code'] = '200';
				echo json_encode($status);  
			 }
			 else 
			 { 
				$status = '[{"status":"failure"}]';
				echo $status;
			 }
		}
		else
		{
			   $status = '[{"status":"Access denied"}]';
			   echo $status;
		} 
		
	   die();
	}
		 
		  // call for driver logout
	      public function driver_logout() {
			 Configure::write('debug',0);
			 if(!empty($_POST)){ 
			    $this->loadModel('Driver');
			    $driver_id = $_POST['driver_id'];
				$this->Driver->updateAll(array('Driver.isactive' => "'no'", 'Driver.have_noti' => "'no'"),array('Driver.id' => $driver_id));
				$status = '[{"status":"Logout successfully"}]';
			    echo $status; 
			    die;
				 }
		 }

		 
		
		   // call for driver logout
	      public function customer_logout() {
			 Configure::write('debug',0);
				if(!empty($_POST)){ 
				$customer_id = $_POST['customer_id'];
				$this->Notification->deleteAll(array('Notification.customer_id' => $customer_id), false);
                $status = '[{"status":"success"}]';
				echo $status;
				exit;
				}	
				
		 }
		 
		 // call for edit profile
		 public function editprofile() {
	     Configure::write('debug',0);
		 
		 if(!empty($_POST)){ 
		 $name = mysql_real_escape_string($_POST['name']);
		 $email = $_POST['email'];
		 if (!filter_var($email, FILTER_VALIDATE_EMAIL) != false) {
			$status = '[{"status":"Sorry!! email address is not valid."}]';
			echo $status; 
			die();
		 }
		 
		 $phone_no = $_POST['phone_no'];
         $userid = $_POST['userid'];


                 $email_phone = $this->Customer->find('count', array('conditions' => array('OR' => array(array('Customer.email' => $email),array('Customer.phone_no' => $phone_no)),'Customer.id !=' => $userid)));				 
                 
				 if($email_phone != 0)
				 {
					$status = '[{"status":"Sorry!! Email id or phone number already taken."}]';
					echo $status; 
					die();
				 }

                $this->Customer->create();
				$this->request->data['Customer']['id'] = $userid;
				$this->request->data['Customer']['name'] = $name;
				$this->request->data['Customer']['email'] = $email;
				$this->request->data['Customer']['phone_no'] = $phone_no;
			
               if($this->Customer->save($this->request->data))
				{ 
			         $status = $this->Customer->find('all', array('conditions' => array('Customer.id' => $userid)));
					 echo json_encode($status);
				}  
				else 
				{ 
			        $status = '[{"status":"failure"}]';
			        echo $status;
				}		 
		  }
		  else
		  {
			        $status = '[{"status":"Access denied"}]';
					echo $status;
		  }	
	   die();
	}

	    // call for reset password
		 public function resetpass() {
	     Configure::write('debug',0);
		 
		 if(!empty($_POST)){
			 $userid = $_POST['userid'];
			 $cpass = $_POST['cpass'];
			 $hashpassword = AuthComponent::password($cpass);
			 $npass = $_POST['npass'];
			 $r_npass = $_POST['r_npass'];
			 $n_hashpassword = AuthComponent::password($npass);

					 if($npass != $r_npass)
					 {
						$status = '[{"status":"Sorry!! new passwords fields does not matches."}]';
						echo $status;
						die();
					 }

					 $id_pass = $this->Customer->find('count', array('conditions' => array('Customer.id' => $userid,'Customer.password' => $hashpassword)));				 
					 
					 if($id_pass == 1)
					 {
						$this->Customer->create();
						$this->request->data['Customer']['id'] = $userid;
						$this->request->data['Customer']['password'] = $n_hashpassword;
						 if($this->Customer->save($this->request->data))
						 { 
							 
							 $status = '[{"status":"Your password changed successfully"}]';
							 echo $status;
						 }  
						 else 
						 { 
							$status = '[{"status":"failure"}]';
							echo $status;
						 }
					 }
					 else
					 { 
						$status = '[{"status":"Sorry!! your current password does not matches."}]';
						echo $status;
					 }
		  }
		  else
		  {
			        $status = '[{"status":"Access denied"}]';
					echo $status;
		  }

	   die();
	}
	
		 // call for emergency number saving
		 public function emergency() {
        Configure::write('debug',0);
		
		if(!empty($_POST)){
		$this->Customer->create();
		$this->request->data['Customer']['id'] = $_POST['userid'];
        
		if(array_key_exists('emer1', $_POST))
		 {
			$this->request->data['Customer']['emer_no1'] = $_POST['emer1'];
		 }	 
		 
		 if(array_key_exists('emer2', $_POST))
		 {
			$this->request->data['Customer']['emer_no2'] = $_POST['emer2'];
		 }

				     if($this->Customer->save($this->request->data))
				     { 
						 
						 $status = '[{"status":"Emergency contact details updated successfully"}]';
			             echo $status;
                     }  
				     else 
				     { 
						$status = '[{"status":"failure"}]';
			            echo $status;
				     }
				
          }
		  else
		  {
			        $status = '[{"status":"Access denied"}]';
					echo $status;
		  }
	   die();
	} 
		 

		// call for location saving
		public function location() {
		Configure::write('debug',0);
		if(!empty($_POST)) {
							$this->Location->create();
							$this->request->data['Location']['customer_id'] = $_POST['customer_id'];
							$this->request->data['Location']['lat'] = $_POST['lat'];
							$this->request->data['Location']['lon'] = $_POST['lon'];
							$this->request->data['Location']['date'] = $_POST['date'];
							$this->request->data['Location']['time'] = $_POST['time'];

										 if($this->Location->save($this->request->data))
										 { 
											 
											 $this->Driver->create();
											 $this->request->data['Customer']['id'] = $_POST['customer_id'];
											 $this->request->data['Customer']['lat'] = $_POST['lat'];
											 $this->request->data['Customer']['lon'] = $_POST['lon'];
							                 $this->Customer->save($this->request->data);
											 $status = '[{"status":"Location saved successfully"}]';
											 echo $status;
										 }  
										 else 
										 { 
											$status = '[{"status":"failure"}]';
											echo $status;
										 }
						 }
		  else
		  {
			        $status = '[{"status":"Access denied"}]';
					echo $status;
		  }	

	   die();
	} 
	
	// call for location saving
		public function driver_location() {
		Configure::write('debug',0);
		if(!empty($_POST)) {
							
							$driver_id = $_POST['driver_id'];
							if(empty($driver_id))
					        {
							   $status = '[{"status":"Driver id is missing"}]';
							   echo $status;
							   exit;
						    }
							
						   $lat = $_POST['lat'];
						   $lon = $_POST['lon'];
						   
						   if(empty($lat))
						   {
							   $status = '[{"status":"latitude value is not passed"}]';
							   echo $status;
							   exit;
							   
						   }
							if(empty($lon))
						   {
							   $status = '[{"status":"longitude value is not passed"}]';
							   echo $status;
							   exit;
						   }
						   
							    if($lat == '0.0')
						   {
							   $status = '[{"status":"latitude value is not passed"}]';
						       echo $status;
							   exit;
							   
						   }
						    if($lon  == '0.0')
						   {
							   $status = '[{"status":"longitude value is not passed"}]';
						       echo $status;
							   exit;
						   }
							
							$this->DriverLocation->create();
							$this->request->data['DriverLocation']['driver_id'] = $_POST['driver_id'];
							$this->request->data['DriverLocation']['lat'] = $_POST['lat'];
							$this->request->data['DriverLocation']['lon'] = $_POST['lon'];
							$this->request->data['DriverLocation']['date'] = $_POST['date'];
							$this->request->data['DriverLocation']['time'] = $_POST['time'];

										 if($this->DriverLocation->save($this->request->data))
										 { 
											 $this->Driver->create();
											 $this->request->data['Driver']['id'] = $_POST['driver_id'];
											 $this->request->data['Driver']['lat'] = $_POST['lat'];
											 $this->request->data['Driver']['lon'] = $_POST['lon'];
							                 $this->Driver->save($this->request->data);
										     $status = '[{"status":"success"}]';
											 echo $status;
										 }  
										 else 
										 { 
											$status = '[{"status":"failure"}]';
											echo $status;
										 }
						 }
		  else
		  {
			        $status = '[{"status":"Access denied"}]';
					echo $status;
		  }	

	   die();
	}
	
	
	// call for drivers in that areas 5km
	public function getdrivers() {
	
	               Configure::write('debug',0);
				   
				   if(!empty($_POST)) {
					   $lat = $_POST['lat'];
					   $lon = $_POST['lon'];
					   
					   if(empty($lat))
					   {
						   $status = '[{"status":"latitude value is not passed"}]';
					       echo $status;
						   exit;
						   
					   }
					    if(empty($lon))
					   {
						   $status = '[{"status":"longitude value is not passed"}]';
					       echo $status;
						   exit;
					   }
					   
					   $drivers = $this->Driver->query('SELECT lat,lon,id,fname,lname,email_id,phone,driver_photo,isverified,isactive,veh_assign,Isallocated,action,modified,((ACOS(SIN('.$lat.' * PI() / 180) * SIN(lat * PI() / 180) + COS('.$lat.' * PI() / 180) * COS(lat * PI() / 180) * COS(('.$lon.' - lon) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) AS `distance` FROM `ritecab_drivers` WHERE isactive = "yes" and action = "Active" and Isallocated = "allocated" and have_noti != "yes" HAVING `distance` <= 5 ORDER BY `modified` DESC');
					   
					      if(!empty($drivers))
						  {
							   $drivers['0']['status'] = 'success'; 
				               $drivers['0']['code'] = '200';
				 			   echo json_encode($drivers); 
						  }	  
						  else
						  {
							$status = '[{"status":"No drivers available in your area"}]';
					        echo $status;   
						  }	   
                  } 
				   die();
				
	}
	
		// call for notifications for driver
	    public function driver_notification() {
	
	               Configure::write('debug',0);
	
				   if(!empty($_POST)) {
					   $lat = $_POST['lat'];
					   $lon = $_POST['lon'];
					   $cabtype = $_POST['cabtype'];
					   
					  if(empty($cabtype))
					   {
						   $status = '[{"status":"cabtype is not passed"}]';
					       echo $status;
						   exit;
						   
					   }
					   
					   if(empty($lat))
					   {
						   $status = '[{"status":"latitude value is not passed"}]';
					       echo $status;
						   exit;
						   
					   }
					    if(empty($lon))
					   {
						   $status = '[{"status":"longitude value is not passed"}]';
					       echo $status;
						   exit;
					   }
					   
					   if($lat == '0.0')
					   {
						   $status = '[{"status":"latitude value is not passed"}]';
					       echo $status;
						   exit;
						   
					   }
					    if($lon  == '0.0')
					   {
						   $status = '[{"status":"longitude value is not passed"}]';
					       echo $status;
						   exit;
					   }
					   
					   
					   $status = $this->Driver->query('SELECT id,isactive,veh_assign,vehicle_id,action,have_noti,((ACOS(SIN('.$lat.' * PI() / 180) * SIN(lat * PI() / 180) + COS('.$lat.' * PI() / 180) * COS(lat * PI() / 180) * COS(('.$lon.' - lon) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) AS `distance` FROM `ritecab_drivers` HAVING `distance` <= 3 ORDER BY `distance` ASC');
					  
					   $distance = $status['0']['0']['distance'];
                       $stop = 0;

					   foreach($status as $key=>$value)
					   {
						   
						   $isactive = $value['ritecab_drivers']['isactive'];
						   $cab_type = $value['ritecab_drivers']['veh_assign'];
						   $action = $value['ritecab_drivers']['action'];
						   $have_noti = $value['ritecab_drivers']['have_noti'];
						   
                           // for checking driver is logged in or not
						   if($isactive == 'yes' && $stop == '0' && $cab_type == $cabtype && $action == 'Active' && $have_noti != 'yes')
						   {
							   $driver_id = $value['ritecab_drivers']['id'];
							   $vehicle_id = $value['ritecab_drivers']['vehicle_id'];
							   $stop = 1;
							  
										     
						   }
						     
						   
					   }

					   if(empty($driver_id))
					   {
						  $status = '[{"status":"no driver available in this area"}]';
						  echo $status; 
						  exit;
						   
					   }   
					   
				            $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lon).'&sensor=false';
							$json = @file_get_contents($url);
							$data=json_decode($json);
							$status = $data->status;
							if($status=="OK")
							{
							   $address = $data->results[0]->formatted_address;
							}
							
							$this->Notification->create();
							$this->request->data['Notification']['customer_id'] = $_POST['customer_id'];
							$this->request->data['Notification']['driver_id'] = $driver_id;
							$this->request->data['Notification']['lat'] = $_POST['lat'];
							$this->request->data['Notification']['lon'] = $_POST['lon'];
							$this->request->data['Notification']['date'] = $_POST['date'];
							$this->request->data['Notification']['time'] = $_POST['time'];
							$this->request->data['Notification']['distance'] = $distance;
							$this->request->data['Notification']['address'] = $address;
					  
					        if($this->Notification->save($this->request->data))
							 { 
											
								$noti_id = $this->Notification->getLastInsertId();
								$status = '[{"status":"200"},{"notification_id":"'.$noti_id.'"},{"driver_id":"'.$driver_id.'"},{"vehicle_id":"'.$vehicle_id.'"}]';
								echo $status;
							 }  
								else 
							 { 
								$status = '[{"status":"failure"}]';
								echo $status;
						     }
						
				   } 
				   die();
				
	}
	
		// get notifications
	    public function get_notification() {
			
			Configure::write('debug',0);
				   if(!empty($_POST)) {
					   $driver_id = $_POST['driver_id'];
					   $status = $this->Notification->find('all', array('conditions' => array('Notification.driver_id' => $driver_id, 'Notification.Issen' => 'no'),'fields'=>array('Notification.id','Notification.customer_id'),'order' => array('Notification.id'=> 'DESC'), 'limit' => 1));	

						 if(!empty($status))
						 {
							 $status['0']['status'] = 'success'; 
					         $status['0']['code'] = '200';
							 echo json_encode($status);  
						 }
						 else
                         {
							 $status = '[{"status":"failure"}]';
					         echo $status;
						 }							
				   } 
				   die();
				
	}
	
			// call for notifications detail
	       
		   public function noti_details() {
			
			Configure::write('debug',0);
				   if(!empty($_POST)) {
					   $noti_id = $_POST['noti_id'];
					   $status = $this->Notification->find('all', array('conditions' => array('Notification.id' => $noti_id)));	

						 if(!empty($status))
						 {
							echo json_encode($status);  
						 }
						 else
                         {
							 $status = '[{"status":"no notification"}]';
					         echo $status;
						 }							
				   } 
				   die();
				
	    }
	
	// call for customers notifications is viewed
	
	    public function notiview() {
			
			Configure::write('debug',0);
				   if(!empty($_POST)) {
					   $noti_id = $_POST['noti_id'];
					  
			                $this->Notification->create();
							$this->request->data['Notification']['id'] = $noti_id;
						    $this->request->data['Notification']['Issen'] = 'yes';
					  
					         if($this->Notification->save($this->request->data))
							 { 
											
								$status = '[{"status":"notification viewed successfully"}]';
								echo $status;
							 }  
								else 
							 { 
								$status = '[{"status":"failure"}]';
								echo $status;
						     } 
						 
					 } 
				   die();
				
	}
	
	// call for driver accepted or not
	
	    public function noti_action() {
			
			Configure::write('debug',0);
				   if(!empty($_POST)) {
					   $noti_id = $_POST['noti_id'];
					   $status = $_POST['status'];
					   $customer_id = $_POST['customer_id'];
					   $driver_id = $_POST['driver_id'];


						   if(empty($noti_id))
						   {
							  $status = '[{"status":"notification id is empty"}]';
							  echo $status;  
						   }	   
						   
						   if(empty($status))
						   {
							  $status = '[{"status":"status id is empty"}]';
							  echo $status;  
						   }
						   
						   if(empty($noti_id))
						   {
							  $status = '[{"status":"customer_id id is empty"}]';
							  echo $customer_id;  
						   }
					  
			                $this->Notification->create();
							$this->request->data['Notification']['id'] = $noti_id;
						    $this->request->data['Notification']['status'] = $status;
							$this->request->data['Notification']['Issen'] = 'yes';
							
							if($this->Notification->save($this->request->data))
							 { 
											
								if($status == 'accept')
								{
									 $cdata = $this->Customer->find('all', array('conditions' => array('Customer.id' => $customer_id)));
									 $phone_no = $cdata['0']['Customer']['phone_no'];

									 $cdata['0']['status'] = 'success'; 
					                 $cdata['0']['code'] = '200';

									   $driver_detail = $this->Driver->find('all', array('conditions' => array('Driver.id' => $driver_id),'fields'=>array('Driver.driverid','Driver.fname','Driver.lname','vehicle_id')));	
					   
									   $driverid = $driver_detail['0']['Driver']['driverid'];
									   $fname = $driver_detail['0']['Driver']['fname'];
									   $lname = $driver_detail['0']['Driver']['lname'];
									   $vehicle_id = $driver_detail['0']['Driver']['vehicle_id'];
									   
									   $veh_detail = $this->InfoVehicle->find('all', array('conditions' => array('InfoVehicle.id' => $vehicle_id)));
									   $veh_name = $veh_detail['0']['InfoVehicle']['veh_name'];
									   $veh_number = $veh_detail['0']['InfoVehicle']['veh_number'];
									   $veh_color = $veh_detail['0']['InfoVehicle']['veh_color'];
									 
									  echo json_encode($cdata);
									
									 $otp = file_get_contents('http://sms.ssdindia.com/api/sendhttp.php?authkey=10559Ay4ScEtjn567289c0&mobiles='.$phone_no.'&message= Your RiteLift cab is booked. Your driver name is'.$fname.' '.$lname.' ('.$driverid.'). He is riding '.$veh_color.' '.$veh_name.' ('.$veh_number.'). Team RiteCab&sender=kiv.phy&route=1');
			
					            $this->Driver->updateAll(
								array('Driver.have_noti' => "'yes'"),
								array('Driver.id' => $driver_id)
								);				
									
								}
                                else
                                {
									$this->Driver->updateAll(
									array('Driver.have_noti' => "'no'"),
									array('Driver.id' => $driver_id)
									);
									$status = '[{"status":"status denied successfully"}]';
								    echo $status;
								}									
							 }  
								else 
							 { 
								$status = '[{"status":"failure"}]';
								echo $status;
						     } 
						 
					 } 
				   die();
				
	}	
	
	// customer waiting for driver response
	 
	 public function noti_check() {
			
			Configure::write('debug',0);
				   if(!empty($_POST)) {
					   $noti_id = $_POST['noti_id'];
					   $driver_id = $_POST['driver_id'];
					   
					   $nstatus = array('accept','denied');
					   $status = $this->Notification->find('all', array('conditions' => array('Notification.id' => $noti_id,'Notification.status' => $nstatus)));	
			 
					    $msg =  $status['0']['Notification']['status'];
						
						if(!empty($status))
						 {
							 $status = '[{"status":"'.$msg.'"}]';
					         echo $status;
							 exit;
						 }
						 else
                                                {
							 
							 
						       $status = '[{"status":"processing"}]';
					               echo $status; 
								   exit;
							 	   

						 }
						 
						      $driver_free = $this->Driver->find('count', array('conditions' => array('Driver.id' => $driver_id,'Driver.have_noti' => 'yes')));
							  
							  if($driver_free == 1)
							   {
								   $this->Notification->updateAll(array('Notification.Issen' => "'yes'"),array('Notification.id' => $noti_id));
								   $status = '[{"status":"denied"}]';
									echo $status;
									exit;
							   }
			                
					} 
				   die();
				
	}
	
	 // cancel ride
	 
	 public function ride_cancel() {
			
			Configure::write('debug',0);
				   if(!empty($_POST)) {
					   
					   $customer_id = $_POST['customer_id'];
					   $ride_id = $_POST['ride_id'];
					   $cancelling_date = $_POST['cancelling_date'];
					   $cancelling_time = $_POST['cancelling_time'];
					   $reason = $_POST['reason'];
					   

			                $this->CancelRide->create();
							$this->request->data['CancelRide']['customer_id'] = $customer_id;
						    $this->request->data['CancelRide']['ride_id'] = $ride_id;
							$this->request->data['CancelRide']['cancelling_date'] = $cancelling_date;
							$this->request->data['CancelRide']['cancelling_time'] = $cancelling_time;
						    $this->request->data['CancelRide']['reason'] = $reason;

							if($this->CancelRide->save($this->request->data))
							 { 
								$status = '[{"status":"success"}]';	
								echo $status;
															
							 }  
								else 
							 { 
								$status = '[{"status":"failure"}]';
								echo $status;
						     } 						 
					 } 
				   die();
				
	}
	

	// Get driver details
	 
	 public function driver_details() {
			
			Configure::write('debug',0);
				   if(!empty($_POST)) {
					   
					   $driver_id = $_POST['driver_id'];
					   $status = $this->Driver->find('all', array('conditions' => array('Driver.id' => $driver_id)));	
			           echo json_encode($status);  
					   exit;
						
					  } 
	}
	

		 // get current promotions
		 public function getpromos() {
	     Configure::write('debug',0);
		 $tdate = date("Y-m-d");
		 
		 $status = $this->PromoCode->find('all', array('conditions' => array('PromoCode.isactive =' => 'yes','PromoCode.to_time <=' => $tdate,'PromoCode.from_time >=' => $tdate),'fields'=>array('id','promo_code','amount','promo_type')));				 
        
		if(!empty($status))
		{
			echo json_encode($status);
		}
		else
		{ 
			$status = '[{"status":"Sorry!! no promos for now."}]';
		    echo $status;
		}

	   die();
	}
	
	// get cities
	public function cities() {
		$cityname = $this->City->find('all',array('fields'=>array('city_name')));
		$cities = Hash::extract($cityname, '{n}.City.city_name');
		echo json_encode($cities);
		exit;
	}
	
	// get ride details
	public function rides() {
	Configure::write('debug',0);
		
		if(!empty($_POST)) {
		
		$customer_id = $_POST['customer_id'];	
		$customer_name = $_POST['customer_name'];	
		$from_place = $_POST['from_place'];	
		$to_place = $_POST['to_place'];	
		$travel_distance = $_POST['travel_distance'];	
		$travel_cost = $_POST['travel_cost'];	
		$trip_time = $_POST['trip_time'];
        $service_charge = $_POST['service_charge'];
		$travel_date = $_POST['travel_date'];
		$start_time = $_POST['start_time'];
		$end_time = $_POST['end_time'];
		$veh_type = $_POST['veh_type'];
		$veh_id = $_POST['veh_id'];
		$driver_name = $_POST['driver_name'];
		$driver_id = $_POST['driver_id'];
		$use_pooling = $_POST['use_pooling'];
		
		$this->Ride->create();
		$this->request->data['Ride']['customer_id'] = $customer_id;
		$this->request->data['Ride']['customer_name'] = $customer_name;
		$this->request->data['Ride']['from_place'] = $from_place;
		$this->request->data['Ride']['to_place'] = $to_place;
		$this->request->data['Ride']['travel_distance'] = $travel_distance;
		$this->request->data['Ride']['travel_cost'] = $travel_cost;
		$this->request->data['Ride']['trip_time'] = $trip_time;
		$this->request->data['Ride']['service_charge'] = $service_charge;
		$this->request->data['Ride']['travel_date'] = $travel_date;
		$this->request->data['Ride']['start_time'] = $start_time;
		$this->request->data['Ride']['end_time'] = $end_time;
		$this->request->data['Ride']['veh_type'] = $veh_type;
		$this->request->data['Ride']['veh_id'] = $veh_id;
		$this->request->data['Ride']['driver_name'] = $driver_name;
		$this->request->data['Ride']['driver_id'] = $driver_id;
		$this->request->data['Ride']['use_pooling'] = $use_pooling;
							
		if($this->Ride->save($this->request->data))
		{ 	
			
						$ride_id = $this->Ride->getLastInsertId();	
						$rideid = 'RITECABRD'.$ride_id;
						
						$this->Ride->updateAll(
						array('Ride.rideid' => "'$rideid'"),
						array('Ride.id' => $ride_id)
					    );
			$status = '[{"status":"success"},{"ride_id":"'.$rideid.'"}]';
		    echo $status;
		}
		else
		{
			$status = '[{"status":"failure"}]';
		    echo $status;
		}	
		
		}
		exit;
	}
	
		// get customer reciept details
	
	public function customer_reciept() {
	Configure::write('debug',0);
		
		if(!empty($_POST)) {
		
		$customer_id = $_POST['customer_id'];	
		$name = $_POST['name'];	
		$from_place = $_POST['from_place'];	
		$to_place = $_POST['to_place'];	
		$trip_distance_price = $_POST['trip_distance_price'];	
		$travel_time_price = $_POST['travel_time_price'];	
		$service_charge = $_POST['service_charge'];
        $service_tax = $_POST['service_tax'];
		$trip_distance = $_POST['trip_distance'];
		$travel_time = $_POST['travel_time'];
		$total_price = $_POST['total_price'];
		$driver_id = $_POST['driver_id'];
		$ride_id = $_POST['ride_id'];
		$phone_no = $_POST['phone_no'];

		$this->CustomerReciept->create();
		$this->request->data['CustomerReciept']['customer_id'] = $customer_id;
		$this->request->data['CustomerReciept']['driver_id'] = $driver_id;
		$this->request->data['CustomerReciept']['ride_id'] = $ride_id;
		$this->request->data['CustomerReciept']['name'] = $name;
		$this->request->data['CustomerReciept']['from_place'] = $from_place;
		$this->request->data['CustomerReciept']['to_place'] = $to_place;
		$this->request->data['CustomerReciept']['trip_distance_price'] = $trip_distance_price;
		$this->request->data['CustomerReciept']['travel_time_price'] = $travel_time_price;
	    $this->request->data['CustomerReciept']['service_charge'] = $service_charge;
		$this->request->data['CustomerReciept']['service_tax'] = $service_tax;
		$this->request->data['CustomerReciept']['trip_distance'] = $trip_distance;
		$this->request->data['CustomerReciept']['travel_time'] = $travel_time;
		$this->request->data['CustomerReciept']['total_price'] = $total_price;
		$this->request->data['CustomerReciept']['phone_no'] = $phone_no;
		
		if($this->CustomerReciept->save($this->request->data))
		{ 	
			$otp = file_get_contents('http://sms.ssdindia.com/api/sendhttp.php?authkey=10559Ay4ScEtjn567289c0&mobiles='.$phone_no.'&message= Thanks for travelling with RiteLift. Total cost is Rs. '.$total_price.' for  your ride '.$ride_id.'. Team RiteLift&sender=kiv.phy&route=1');
			$status = '[{"status":"success"}]';
		    echo $status;
		}
		else
		{
			$status = '[{"status":"failure"}]';
		    echo $status;
		}	
		
		}
		exit;
	}
	
	
	// Get vehicle details
	 
	 public function veh_details() {
			Configure::write('debug',0);
				   if(!empty($_POST)) {
					   
					   $veh_id = $_POST['veh_id'];
					   $status = $this->InfoVehicle->find('all', array('conditions' => array('InfoVehicle.id' => $veh_id)));	
			           echo json_encode($status);  
					   exit;
						
					  } 
	}
	
		// Get vehicle details
	 
	 public function price_details() {
			
			Configure::write('debug',0);
				   if(!empty($_POST)) {
					   
					   $veh_type = $_POST['veh_type'];
					   $status = $this->Price->find('all', array('conditions' => array('Price.cab_type' => $veh_type)));	
			           echo json_encode($status);  
					   exit;
						
					  } 
	}
	
			// Get vehicle details
	 
	 public function rating() {
			
			Configure::write('debug',0);
				   if(!empty($_POST)) {
					   
					   $driver_id = $_POST['driver_id'];
					   $customer_id = $_POST['customer_id'];
					   $rate = $_POST['rate'];
					   $feedback = $_POST['feedback'];
					   $this->Rating->create();
						$this->request->data['Rating']['customer_id'] = $customer_id;
						$this->request->data['Rating']['driver_id'] = $driver_id;
						$this->request->data['Rating']['rate'] = $rate;
						$this->request->data['Rating']['feedback'] = $feedback;
					
						if($this->Rating->save($this->request->data))
						{ 
					      $status = '[{"status":"success"}]';
		                  echo $status;
					      exit;
					    } 
	         }
	
	 }
		// Krishnaraj Functions starts Here
	
	public function assign_vehicle_driver_form() {
		Configure::write('debug',0);
		$drivers = $this->Driver->find('all', array('conditions' => array('Driver.Isallocated' => 'Unallocated','Driver.action' => 'Active')));
		$InfoVehicle = $this->InfoVehicle->find('all', array('conditions' => array('InfoVehicle.Isassigned' => 'Unassigned','InfoVehicle.action' => 'Active')));
		$stateCities = $this->City->find('all',  array('order' => array('City.city_name' => 'ASC')));
		$this->set('drivers',$drivers);
		$this->set('InfoVehicle',$InfoVehicle);
		$this->set('stateCities',$stateCities);
		if(!empty($_POST)){
			$driver_id = $_POST['driver_id'];
			$vehicle_id = $_POST['vehicle_id'];
			$pickup_city = $_POST['pickup_city'];
			$pickup_pointsStr = implode(',', $_POST['pickup_points']);
			$drop_city = $_POST['drop_city'];
			$dep_date = $_POST['dep_date'];
			$dep_time = $_POST['dep_time'];
			$via = $_POST['via'];
			$tot_distance = $_POST['tot_distance'];
			$approx_time = $_POST['approx_time'];
			$price = $_POST['price'];
			$seats = $_POST['seats'];
			$amenities = $_POST['amenities'];
		//$this->AssignVehicleToDriver->create();
		$this->request->data['AssignVehicleToDriver']['driver_id'] = $driver_id;
		$this->request->data['AssignVehicleToDriver']['vehicle_id'] = $vehicle_id;
		$this->request->data['AssignVehicleToDriver']['pickup_city'] = $pickup_city;
		$this->request->data['AssignVehicleToDriver']['pickup_points'] = $pickup_pointsStr;
		$this->request->data['AssignVehicleToDriver']['drop_city'] = $drop_city;
		$this->request->data['AssignVehicleToDriver']['dep_date'] = $dep_date;
		$this->request->data['AssignVehicleToDriver']['dep_time'] = $dep_time;
		$this->request->data['AssignVehicleToDriver']['via'] = $via;
	    $this->request->data['AssignVehicleToDriver']['tot_distance'] = $tot_distance;
		$this->request->data['AssignVehicleToDriver']['approx_time'] = $approx_time;
		$this->request->data['AssignVehicleToDriver']['price'] = $price;
		$this->request->data['AssignVehicleToDriver']['seats'] = $seats;
		$this->request->data['AssignVehicleToDriver']['amenities'] = $amenities;


/*$sql = "INSERT INTO ritecab_assign_vehicle_to_drivers (driver_id, vehicle_id)
VALUES ('".$driver_id."', '".$vehicle_id."')";*/

			if($this->AssignVehicleToDriver->save($this->request->data))
			{	$this->Driver->updateAll(array('Driver.Isallocated' => "'allocated'"),array('Driver.id' => $driver_id));
				$this->InfoVehicle->updateAll(array('InfoVehicle.Isassigned' => "'assigned'"),array('InfoVehicle.id' => $vehicle_id));
				$this->Session->setFlash('Cab assigned successfully','default', array(), 'good'); 
				$this->redirect('/assign_vehicle_driver_form'); 
			}
		}
		 
		 
	}
	
	public function assign_vehicle_driver_form_old() {
			Configure::write('debug',0);
		 $drivers = $this->Driver->find('all', array('conditions' => array('Driver.Isallocated' => 'Unallocated','Driver.action' => 'Active')));
		 $InfoVehicle = $this->InfoVehicle->find('all', array('conditions' => array('InfoVehicle.Isassigned' => 'Unassigned','InfoVehicle.action' => 'Active')));
		$stateCities = $this->City->find('all',  array('order' => array('City.city_name' => 'ASC')));
		$this->set('drivers',$drivers);
		$this->set('InfoVehicle',$InfoVehicle);
		$this->set('stateCities',$stateCities);
		if($this->request->data) {
			
			        unset($this->request->data['_Token']);
						$data = array('AssignVehicleToDriver'=> $this->request->data); 
						if($this->AssignVehicleToDriver->save($data)){
							
			$driver_id = $_POST['driver_id'];
			$vehicle_id = $_POST['vehicle_id'];
			$this->Driver->updateAll(array('Driver.Isallocated' => "'allocated'"),array('Driver.id' => $driver_id));
            $this->InfoVehicle->updateAll(array('InfoVehicle.Isassigned' => "'assigned'"),array('InfoVehicle.id' => $vehicle_id));
						$this->Session->setFlash('Cab assigned successfully','default', array(), 'good'); 
						$this->redirect('/assign_vehicle_driver_form'); 
				}
		}
		 
		 
	}
	
	public function check_vehicles() {
		Configure::write('debug',0);
		if(!empty($_POST)){ 		
		     $pickup_city = $_POST['pickup_city'];
			 $drop_city = $_POST['drop_city'];
			 $dep_date = $_POST['dep_date'];
	   $check_vehicles = $this->AssignVehicleToDriver->find('all', array('conditions' => array('AssignVehicleToDriver.pickup_city' => $pickup_city,'AssignVehicleToDriver.drop_city' => $drop_city,'AssignVehicleToDriver.dep_date' => $dep_date,'AssignVehicleToDriver.seats !=' => 0)));		
	//echo "<pre>"; print_r($check_vehicles);die;
                 $count=count($check_vehicles);
				if($count != 0)
				 {						
	$sql = "SELECT assignedCabInfo.id,assignedCabInfo.dep_date,assignedCabInfo.dep_time,assignedCabInfo.pickup_city,assignedCabInfo.drop_city,assignedCabInfo.via,assignedCabInfo. 	tot_distance,assignedCabInfo.approx_time,assignedCabInfo.price,assignedCabInfo.seats,assignedCabInfo.amenities,assignedCabInfo.pickup_points,
driversInfo.fname,driversInfo.lname,driversInfo.driver_photo,driversInfo.fname, vehicleInfo.veh_name, vehicleInfo.veh_number,ratingsInfo.rate
    FROM ritecab_assign_vehicle_to_drivers assignedCabInfo LEFT JOIN ritecab_drivers driversInfo 
    ON assignedCabInfo.driver_id = driversInfo.id LEFT JOIN ritecab_info_vehicles vehicleInfo 
    ON assignedCabInfo.vehicle_id = vehicleInfo.id LEFT JOIN ritecab_ratings ratingsInfo 
    ON assignedCabInfo.driver_id = ratingsInfo.driver_id where assignedCabInfo.pickup_city='".$pickup_city."' and assignedCabInfo.drop_city='".$drop_city."' and assignedCabInfo.dep_date='".$dep_date."' and assignedCabInfo.seats !=0 group by ratingsInfo.driver_id";
	// group by ratingsInfo.driver_id
	$status = $this->AssignVehicleToDriver->query($sql);
	$status['0']['driverPhotoUrl'] = $this->webroot.'files/driver/'; 
	$status['0']['status'] = 'success'; 
    echo json_encode($status);  
	die;
	           }else{
				      $status = '[{"status":"No Cabs are available"}]';
					  echo $status; 
					  die();
				   }
		}else{
			  $status = '[{"status":"Sorry!! Please enter the required fields."}]';
					echo $status; 
					die();			 
		}
	}
	
	
	public function get_cab_full_info() {
		Configure::write('debug',0);
		if(!empty($_POST['id'])){ 		
		     $assignedCabId = $_POST['id'];
			  $status = $this->AssignVehicleToDriver->find('all', array('conditions' => array('AssignVehicleToDriver.id' => $assignedCabId)));
			 $status['0']['status'] = 'success'; 
			   echo json_encode($status);
			  die; 
		}else{
			echo $status = '[{"status":"Cab details not available"}]';
	        die;
			}
	}
	
	
	
	public function get_cab_full_info_new() {
		Configure::write('debug',0);
		if(!empty($_POST['id'])){ 		
		     $assignedCabId = $_POST['id'];
			 // $status = $this->AssignVehicleToDriver->find('all', array('conditions' => array('AssignVehicleToDriver.id' => $assignedCabId)));
			  $query = "SELECT id, vehicle_id,driver_id,dep_date,dep_time,pickup_city,pickup_points,drop_city,via,tot_distance,approx_time,price,seats,amenities FROM `ritecab_assign_vehicle_to_drivers` WHERE ritecab_assign_vehicle_to_drivers.id='".$assignedCabId."'";
	
	      $result = $this->AssignVehicleToDriver->query($query); 
			$picupPointIds = $result[0]['ritecab_assign_vehicle_to_drivers']['pickup_points'];
			
			$sql = "SELECT pickup_point FROM `ritecab_pickup_points` WHERE FIND_IN_SET( `id`, '".$picupPointIds."' )";
			
			$result1 = $this->PickupPoint->query($sql);
			 $this->set('result1',$result1);
			 
			
				 foreach($result1 as $key=>$value) { 
				 
		 $pickuppoints[]= $value['ritecab_pickup_points']['pickup_point'];
				 }
				 
				 
			 
		//echo "<pre>"; print_r($pickuppoints);die;
		//$status = array_merge($result,$pickuppoints);
				$status['0']['AssignVehicleToDriver'] = $result; 
				$status['0']['pickupPoints'] = $pickuppoints; 
				$status['0']['status'] = 'success'; 
				
								 
				//$status['0']['pickup_points'] = $pickupPointNames; 
				echo json_encode($status);
			 die;
		//	echo "<pre>"; print_r($pickupPointNames);die;
			
		
			  
			/* foreach($status as $key=>$value) {
								$pickupStr[] = explode(',', $value['AssignVehicleToDriver']['pickup_points']);
                                }*/ 
			  
			  //echo "<pre>"; print_r($pickupStr);die;
			  

/*$people = array("Peter", "Joe", "Glenn", "Cleveland");
if (in_array("Glenn", $people))
  {
  echo "Match found";
  }
else
  {
  echo "Match not found";
  }*/

			  
			  
		}else{
			echo $status = '[{"status":"Cab details not available"}]';
	        die;
			}
	}
	
	
	public function assigned_vehicle_details() {
		if(!empty($_POST)){ 		
				 $status = '[{"status":"success"}]';
				 echo $status; 
		  $AssignedVehDetails = $this->AssignVehicleToDriver->find('all'); 
			//echo "<pre>"; print_r($AssignedVehDetails);die;
				
		}else{
			  $status = '[{"status":"Sorry!! Please fill the required fields."}]';
					echo $status; 
					die();			 
		}
	}
	
	
	public function get_cities() {
		//Configure::write('debug',0);
		 $cityname = $this->City->find('all');
	//echo "<pre>"; print_r($cityname);die;
		$count = count($cityname);
		if($count != 0){
		 			$Cities=array();
					foreach($cityname as $key=>$value){
						if($value['City']['city_name']=='Bangalore'||$value['City']['city_name']=='Hyderabad'||$value['City']['city_name']=='Pune'||$value['City']['city_name']=='Kolkata'||$value['City']['city_name']=='Mumbai'||$value['City']['city_name']=='Nagpur' ||$value['City']['city_name']=='Delhi'||$value['City']['city_name']=='Chennai'){
						$Cities[] .=$value['City']['city_name'];
						}
					}
       $status['0']['status'] = 'success'; 
		$status['0']['Cities'] = array_unique($Cities); 
		//'[{"status":"No Cabs are available"}]
		 echo json_encode($status);
						die();
        }else{
			    $status = '[{"status":"Sorry!! Cities not available."}]';
					echo $status; 
				die();	   
		}
}	
	
	
	public function book_seat() {
		Configure::write('debug',0);
			if(!empty($_POST['customer_id']) && !empty($_POST['no_of_seats']) && !empty($_POST['pickup_point']) && !empty($_POST['assigned_cab_id']) && !empty($_POST['payment_type'])){
							$customer_id = $_POST['customer_id'];
							$no_of_seats = $_POST['no_of_seats'];
							$pickup_point = $_POST['pickup_point'];
							$assigned_cab_id = $_POST['assigned_cab_id'];
							$payment_type = $_POST['payment_type'];
							
			$data = array('IntercityFindCabOrder'=> $this->request->data); 
				if($this->IntercityFindCabOrder->save($data)){
			$query = "SELECT seats FROM `ritecab_assign_vehicle_to_drivers` WHERE ritecab_assign_vehicle_to_drivers.id='".$assigned_cab_id."'";
			$seatDetails = $this->AssignVehicleToDriver->query($query);
			$totSeats = $seatDetails[0]['ritecab_assign_vehicle_to_drivers']['seats'];
			$remainigSeats = ($totSeats - $no_of_seats);
			$this->AssignVehicleToDriver->updateAll(array('AssignVehicleToDriver.seats' => $remainigSeats),array('AssignVehicleToDriver.id' => $assigned_cab_id));	
				
			$query = "SELECT name,email,phone_no FROM `ritecab_customers` WHERE ritecab_customers.id='".$customer_id."'";
			$result = $this->Customer->query($query);
				$name = $result[0]['ritecab_customers']['name'];
				$email = $result[0]['ritecab_customers']['email'];
				$phone_no = $result[0]['ritecab_customers']['phone_no'];
		$otp = file_get_contents("http://alerts.valueleaf.com/api/v3/index.php?method=sms&api_key=A627cf6ba484176d4d4c0f67897396765&to=".$phone_no."&sender=VLDEMO&message=Dear%20".$name.",%20your%20seat%20has%20been%20booked%20successfully.%20Team%20RiteCab&format=php&custom=1,2&flash=0");
			echo $status = '[{"status":"Your Seat Booked Successfully"}]';
			die;
			   }
			}else{
			echo $status = '[{"status":"Invalid Request"}]';
			die;
		}
	}
	public function book_your_owncab_form() {
		Configure::write('debug',0);
		if(!empty($_POST['pickup_city']) && !empty($_POST['drop_city']) && !empty($_POST['dep_date']) && !empty($_POST['dep_time'])){
			echo $status = '[{"status":"success"}]';
			//echo "<pre>"; print_r($_POST);die;
			die;
		}else{
			echo $status = '[{"status":"Please enter required fields"}]';
			die;
			
			}
	}
	
	public function get_your_own_cab_details(){
		Configure::write('debug',0);
		if(!empty($_POST)){ 		
		     $pickup_city = $_POST['pickup_city'];
			 $drop_city = $_POST['drop_city'];
			 $dep_date = $_POST['dep_date'];
			 $dep_time = $_POST['dep_time'];
	   $check_vehicles = $this->OwnCabTemplate->find('all', array('conditions' => array('OwnCabTemplate.pickup_city' => $pickup_city,'OwnCabTemplate.drop_city' => $drop_city)));				 
    $count=count($check_vehicles);
				if($count != 0)
				 {						
	$status = $check_vehicles;
	$status['0']['dep_date'] = $dep_date; 
	$status['0']['dep_time'] = $dep_time; 
	$status['0']['status'] = 'success'; 
    echo json_encode($status);  
	die;
	           }else{
				      $status = '[{"status":"No Cabs are available"}]';
					  echo $status; 
					  die();
				   }
		}else{
			  $status = '[{"status":"Sorry!! Please enter the required fields."}]';
					echo $status; 
					die();			 
		}
	}
	
	public function book_your_own_cab(){
		Configure::write('debug',0);
			if(!empty($_POST['customer_id']) && !empty($_POST['own_cab_id'])){
							$customer_id = $_POST['customer_id'];
		$data = array('IntercityOwnCabOrder'=> $this->request->data); 
		if($this->IntercityOwnCabOrder->save($data)){
			$query = "SELECT name,phone_no FROM `ritecab_customers` WHERE ritecab_customers.id='".$customer_id."'";
			$result = $this->Customer->query($query);
				$name = $result[0]['ritecab_customers']['name'];
				$phone_no = $result[0]['ritecab_customers']['phone_no'];
		$otp = file_get_contents("http://alerts.valueleaf.com/api/v3/index.php?method=sms&api_key=A627cf6ba484176d4d4c0f67897396765&to=".$phone_no."&sender=VLDEMO&message=Dear%20".$name.",%20your%20own%20cab%20booked%20successfully.%20Team%20RiteCab&format=php&custom=1,2&flash=0");
			echo $status = '[{"status":"Your own cab booked successfully"}]';
			die;
			}
		}else{
			echo $status = '[{"status":"Invalid Request"}]';
			die;
		}
	}
	
	
	 
}