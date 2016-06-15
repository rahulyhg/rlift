<?php

App::uses('AppController', 'Controller');
class ApisController extends AppController {

    var $components = array('Session', 'Cookie','RequestHandler','Auth');
	var $helpers=array('Js');
	var $uses = array('Customer','User','VehicleName','Country','State','City','Price','AirportPrice','PromoCode','Driver','InfoVehicle','Location','DriverLocation');
	  
	function beforeFilter()
    {
       $this->Auth->allow('signup','signin','editprofile','resetpass','emergency','location','driver_location','driver_signin','getdrivers','driver_logout','getpromos','test','index');
	}
	

    public function test() {
		
	    echo json_encode($_REQUEST);
		echo json_encode($_GET);
		echo json_encode($_POST);
	    die();
	}
	
	
	 public function index() {
		
	$homepage = file_get_contents('http://sms.ssdindia.com/api/sendhttp.php?authkey=10559Ay4ScEtjn567289c0&mobiles=919742441734&message=message&sender=senderid&route=4&country=0');
    echo $homepage;

	//	echo json_encode($_REQUEST);
	//	echo json_encode($_GET);
	//	echo json_encode($_POST);
	//	echo json_encode($_SERVER);
	  
	    die();
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

                $hashpassword = AuthComponent::password($password);
				$this->Customer->create();
				$this->request->data['Customer']['name'] = $name;
				$this->request->data['Customer']['email'] = $email;
				$this->request->data['Customer']['phone_no'] = $phone_no;
				$this->request->data['Customer']['password'] = $hashpassword;

				if($this->Customer->save($this->request->data))
				{ 
			         $status = $this->Customer->find('all', array('conditions' => array('Customer.email' => $email,'Customer.phone_no' => $phone_no)));
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
    
	     // call for signin 
		 public function signin() {
		 Configure::write('debug',0);
		  
		 if(!empty($_POST)){ 
			 $username =  $_POST['username'];
			 $password = $_POST['password'];
			 $hashpassword = AuthComponent::password($password);
			 $status = $this->Customer->find('all', array('conditions' => array('Customer.password' => $hashpassword, 'OR' => array(array('Customer.email' => $username),array('Customer.phone_no' => $username)))));	
			 
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
			 $status = $this->Driver->find('all', array('conditions' => array('Driver.password' => $hashpassword, 'OR' => array(array('Driver.email_id' => $username),array('Driver.phone' => $username))),'fields'=>array('Driver.id','Driver.fname','Driver.lname','Driver.driver_photo','Driver.email_id','Driver.phone','Driver.action')));	
			 
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
				$this->Driver->create();
				$this->request->data['Driver']['id'] = $driver_id;
				$this->request->data['Driver']['isactive'] = 'yes';
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
				$this->Driver->create();
				$this->request->data['Driver']['id'] = $_POST['driver_id'];
				$this->request->data['Driver']['isactive'] = 'no';
				$this->Driver->save($this->request->data); 
				$status = '[{"status":"Logout successfully"}]';
			    echo $status; 
				 
				 }
				 exit;
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
	
	// call for drivers in that areas 5km
	public function getdrivers() {
	
	               Configure::write('debug',0);
				   if(!empty($_POST)) {
					   $lat = $_POST['lat'];
					   $lon = $_POST['lon'];
					   $status = $this->Driver->query('SELECT lat,lon,id,fname,lname,email_id,phone,driver_photo,isverified,isactive,((ACOS(SIN('.$lat.' * PI() / 180) * SIN(lat * PI() / 180) + COS('.$lat.' * PI() / 180) * COS(lat * PI() / 180) * COS(('.$lon.' - lon) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) AS `distance` FROM `ritecab_drivers` HAVING `distance` <= 3 ORDER BY `distance` ASC');
					   
					   //$status = $this->Driver->query('SELECT id,((ACOS(SIN('.$lat.' * PI() / 180) * SIN(lat * PI() / 180) + COS('.$lat.' * PI() / 180) * COS(lat * PI() / 180) * COS(('.$lon.' - lon) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) AS `distance` FROM `ritecab_drivers` HAVING `distance` <= 5 ORDER BY `distance` ASC');
					  // $dids = Hash::extract($status, '{n}.ritecab_drivers.id');
						
						
						//$driver_details = $this->Driver->find('all', array('conditions' => array('Driver.id' => $dids,'Driver.isactive' => 'yes')));
						
						//echo "<pre>";
						//print_r($status);
						//print_r($dids);
						
						//print_r($driver_details);
						
						
						
						if(!empty($status))
						 {
							//echo json_encode($dids);  
							echo json_encode($status);  
						 }
						else
                        {
							 $status = '[{"status":"No drivers available in your area"}]';
					         echo $status;
						}							
				   } 
				   die();
				
	}
	
		// call for customers detail
	    public function getcustomers() {
			
			
	
	               Configure::write('debug',0);
				   if(!empty($_POST)) {
					   $lat = $_POST['lat'];
					   $lon = $_POST['lon'];
					   $status = $this->Customer->find('all', array('conditions' => array('Customer.password' => $hashpassword, 'OR' => array(array('Customer.email' => $username),array('Customer.phone_no' => $username)))));	
			 
						 if(!empty($status))
						 {
							$status['0']['status'] = 'success'; 
							$status['0']['code'] = '200'; 
							echo json_encode($status);  
						 }
						 else
                        {
							 $status = '[{"status":"No drivers available in your area"}]';
					         echo $status;
						}							
				   } 
				   die();
				
	}
		 
		 // get current promotions
		 public function getpromos() {
	     Configure::write('debug',0);
		 $tdate = date("Y-m-d");
		 
		 $status = $this->PromoCode->find('all', array('conditions' => array('PromoCode.to_time <=' => $tdate,'PromoCode.from_time >=' => $tdate)));				 
                 
		 	 echo json_encode($status);
			 
			 die();
				 
				 
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

	   die();
	}
	
	
}


