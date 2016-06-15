<?php

App::uses('AppController', 'Controller');
class ApisController extends AppController {

    var $components = array('Session', 'Cookie','RequestHandler','Auth');
	var $helpers=array('Js');
	var $uses = array('Customer','User','VehicleName','Country','State','City','Price','AirportPrice','PromoCode','Driver','InfoVehicle','Location');
	  
	function beforeFilter()
    {
       $this->Auth->allow('signup','signin','editprofile','resetpass','emergency','location','driver_signin','getpromos','test','index');
	}
	

    public function test() {
		
	echo json_encode($_REQUEST);
		echo json_encode($_GET);
		echo json_encode($_POST);
	die();
	}
	
	
	 public function index() {
		
		echo json_encode($_REQUEST);
		echo json_encode($_GET);
		echo json_encode($_POST);
		//echo json_encode($_SERVER);
	  
	    die();
	}
	    
		
		// call for signup
		 public function signup() {
	 
		  if(!empty($_POST)) { 
			  
		 $name = mysql_real_escape_string($_POST['name']);
		 $email = $_POST['email'];
		 
		 if (!filter_var($email, FILTER_VALIDATE_EMAIL) != false) {
			$msg = '[{"msg":"Sorry!! email address is not valid."}]';
			echo $msg; 
			die();
		 }
		 
		 $phone_no = $_POST['phone_no'];
		 $password = $_POST['password'];	
         $repassword = $_POST['repassword'];	
		 
       //  $refcode = $_POST['refcode'];


	             if($password != $repassword)
				 {
				 $msg = '[{"msg":"Sorry!! passwords fields does not matches"}]';
				 echo $msg; 
				 die();
				 }

                 $email_phone = $this->Customer->find('count', array('conditions' => array('OR' => array(array('Customer.email' => $email),array('Customer.phone_no' => $phone_no)))));				 
                 
				 if($email_phone != 0)
				 {
					$msg = '[{"msg":"Sorry!! Email id or phone number already taken."}]';
					echo $msg; 
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
			         $msg = $this->Customer->find('all', array('conditions' => array('Customer.email' => $email,'Customer.phone_no' => $phone_no)));
					 echo json_encode($msg);
				}  
				else 
				{ 
			        $msg = '[{"msg":"failure"}]';
					echo $msg;  
				}		 
		  }
		  else
		  {
			        $msg = '[{"msg":"Access denied"}]';
					echo $msg;
		  }	  
		  
	   
	   die();
	}
    
	     // call for signin profile
		 public function signin() {
			 
		 if(!empty($_POST)) { 	 
				 $username =  $_POST['username'];
				 $password = $_POST['password'];
				 $hashpassword = AuthComponent::password($password);
				 $msg = $this->Customer->find('all', array('conditions' => array('Customer.password' => $hashpassword, 'OR' => array(array('Customer.email' => $username),array('Customer.phone_no' => $username)))));	
				 
				 if(!empty($msg))
				 {
					echo json_encode($msg);  
				 }
				 else 
				 { 
					$msg = '[{"msg":"failure"}]';
					echo $msg;
				 }		 
		  }
		  else
		  {
			        $msg = '[{"msg":"Access denied"}]';
					echo $msg;
		  }
		  
	   die();
	}
	
         // call for driver signin
	     public function driver_signin() {
	     $username =  $_POST['username'];
		 $password = $_POST['password'];
         $hashpassword = AuthComponent::password($password);
		 $msg = $this->Driver->find('all', array('conditions' => array('Driver.password' => $hashpassword, 'OR' => array(array('Driver.email_id' => $username),array('Driver.phone' => $username))),'fields'=>array('Driver.id','Driver.fname','Driver.lname','Driver.driver_photo','Driver.email_id','Driver.phone','Driver.action')));	
         
		 $action = $msg['0']['Driver']['action'];
		 
		  if($action == 'Blocked')
		 {
			$msg = '[{"msg":"Sorry!! you have been blocked by administration"}]';
			echo $msg;
			exit;
		 }
		 
         if(!empty($msg))
		 {
			echo json_encode($msg);  
		 }
		 else 
		 { 
			$msg = '[{"msg":"failure"}]';
			echo $msg;
		 }		 
		
	   die();
	}
	
	     // call for edit profile
		 public function editprofile() {
	 
		 $name = mysql_real_escape_string($_POST['name']);
		 $email = $_POST['email'];
		 if (!filter_var($email, FILTER_VALIDATE_EMAIL) != false) {
			$msg = '[{"msg":"Sorry!! email address is not valid."}]';
			echo $msg; 
			die();
		 }
		 
		 $phone_no = $_POST['phone_no'];
         $userid = $_POST['userid'];


                 $email_phone = $this->Customer->find('count', array('conditions' => array('OR' => array(array('Customer.email' => $email),array('Customer.phone_no' => $phone_no)),'Customer.id !=' => $userid)));				 
                 
				 if($email_phone != 0)
				 {
					$msg = '[{"msg":"Sorry!! Email id or phone number already taken."}]';
					echo $msg; 
					die();
				 }

                $this->Customer->create();
				$this->request->data['Customer']['id'] = $userid;
				$this->request->data['Customer']['name'] = $name;
				$this->request->data['Customer']['email'] = $email;
				$this->request->data['Customer']['phone_no'] = $phone_no;
			
               if($this->Customer->save($this->request->data))
				{ 
			         $msg = $this->Customer->find('all', array('conditions' => array('Customer.id' => $userid)));
					 echo json_encode($msg);
				}  
				else 
				{ 
			        $msg = '[{"msg":"failure"}]';
			        echo $msg;
				}		 
		
	   die();
	}
	
	
	
	
	    // call for reset password
		 public function resetpass() {
	 
		 $userid = $_POST['userid'];
		 $cpass = $_POST['cpass'];
		 $hashpassword = AuthComponent::password($cpass);
		 $npass = $_POST['npass'];
		 $r_npass = $_POST['r_npass'];
		 $n_hashpassword = AuthComponent::password($npass);

	             if($npass != $r_npass)
				 {
					$msg = '[{"msg":"Sorry!! new passwords fields does not matches."}]';
			        echo $msg;
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
						 
						 $msg = '[{"msg":"Your password changed successfully"}]';
			             echo $msg;
                     }  
				     else 
				     { 
						$msg = '[{"msg":"failure"}]';
			            echo $msg;
				     }
				 }
				 else
				 { 
					$msg = '[{"msg":"Sorry!! your current password does not matches."}]';
			        echo $msg;
				 }

	   die();
	}
	
		 // call for emergency number saving
		 public function emergency() {

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
						 
						 $msg = '[{"msg":"Emergency contact details updated successfully"}]';
			             echo $msg;
                     }  
				     else 
				     { 
						$msg = '[{"msg":"failure"}]';
			            echo $msg;
				     }
				

	   die();
	} 
		 

		// call for location saving
		public function location() {

		$this->Location->create();
		$this->request->data['Location']['customer_id'] = $_POST['customer_id'];
        $this->request->data['Location']['location'] = $_POST['location'];
		$this->request->data['Location']['date'] = $_POST['date'];
        $this->request->data['Location']['time'] = $_POST['time'];

		             if($this->Location->save($this->request->data))
				     { 
						 
						 $msg = '[{"msg":"Location saved successfully"}]';
			             echo $msg;
                     }  
				     else 
				     { 
						$msg = '[{"msg":"failure"}]';
			            echo $msg;
				     }
				

	   die();
	} 
		 
		 // get current promotions
		 public function getpromos() {
	 
		 $tdate = date("Y-m-d");
		 
		 $msg = $this->PromoCode->find('all', array('conditions' => array('PromoCode.to_time <=' => $tdate,'PromoCode.from_time >=' => $tdate)));				 
                 
		 	 echo json_encode($msg);
			 
			 die();
				 
				 
				 if($id_pass == 1)
				 {
					$this->Customer->create();
				    $this->request->data['Customer']['id'] = $userid;
				    $this->request->data['Customer']['password'] = $n_hashpassword;
					 if($this->Customer->save($this->request->data))
				     { 
						 
						 $msg = '[{"msg":"Your password changed successfully"}]';
			             echo $msg;
                     }  
				     else 
				     { 
						$msg = '[{"msg":"failure"}]';
			            echo $msg;
				     }
				 }
				 else
				 { 
					$msg = '[{"msg":"Sorry!! your current password does not matches."}]';
			        echo $msg;
				 }

	   die();
	}
	
	
}


