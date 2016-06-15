<?php
App::import('Controller', 'Loves');
App::uses('AppController', 'Controller');

class UsersController extends AppController {

    var $components = array('Security','Email','Session', 'Cookie','RequestHandler','Auth');
	var $helpers=array('Js');
	var $uses = array('User','VehicleName','Country','State','City','Price','AirportPrice','PromoCode','Driver','InfoVehicle','DriverLocation','Customer');
	  
	/*** security related functions *****/
	
	function beforeFilter()
    {
       $this->Auth->allow('deny','logout');
	   $this->Security->blackHoleCallback = 'blackhole';
	   $this->Security->unlockedActions = 'login';
	   $user = $this->Session->read('user');
       if(!empty($user)) { 
       $this->Auth->allow('dashboard','car_type','add_cab','add_driver','cab_pricing','airport_pricing','create_promos','driver_detail','driver_min_detail','cab_types','cab_detail','pricing_detail','airport_pricing_detail','promos_detail','assign_cabs','driver_profile','customers','assigned_cabs','test');
	   }
	
	}
	
    public function blackhole($type) {
	  if($type == 'get' || $type == 'csrf' || $type == 'post' || $type == 'put' || $type == 'delete' || $type == 'secure')
	   {
		  $this->redirect('/deny');  
	   }
	}
	
	public function deny()
	{
      $this->layout = 'error';
    }
   
	/*** security related functions end *****/
	
	/*** page functions starts *****/
	
	// login page
	public function login() {
		Configure::write('debug',2);
		$this->layout = 'login';
		           
				   if($this->request->data) {
			        $username = $this->request->data['username'];
					if (filter_var($username, FILTER_VALIDATE_EMAIL) === false) {
					   $this->Session->setFlash('Your username is not correct', 'default', array(), 'bad');
					 } 
					 
					$password = AuthComponent::password( $this->request->data['password']);
					$user = $this->User->find('first', array('conditions' => array('User.username' =>$username,'User.password' => $password)));
                    if(!empty($user)){
						$this->Session->write('user',$user);
						$this->Session->setFlash('Admin logged in successfully','default', array(), 'good');
						$this->redirect('/dashboard');
					}
					else
					{
					  $this->Session->setFlash('Your username or password is not correct', 'default', array(), 'bad');
					 }
                }		

	}
	
	 function logout()
    {
        $this->Session->delete('user');
	    $this->Session->destroy();
	    $this->redirect('/');
	}
	
	//dashboard page
	public function dashboard() {
	
	}
	
	// add cab type page
	public function car_type() {
		Configure::write('debug',0);
		
		            if($this->request->data) {
			        unset($this->request->data['_Token']);
					
					 $regex = "/^[a-z A-Z]+$/"; 
					  if (!preg_match($regex,$this->request->data['name'])) {
							 $this->Session->setFlash('please enter valid characters', 'default', array(), 'bad');
					  } 
					  else
				      {
						$data = array('VehicleName'=> $this->request->data); 
						if($this->VehicleName->save($data)){
						   $this->Session->setFlash('Car type saved successfully','default', array(), 'good');  }
					  }		 
				}
	
	}
	    
		// add cabs page
		public function add_cab() {
		
		Configure::write('debug',0);
		$love = new LovesController;
	    $this->set('vehtype',$love->vehtype());
		
				  
				   if($this->request->data) {
				   unset($this->request->data['_Token']);	
					
                    // saving files				
					if(isset($this->request->form))
					  {
						 
						  if(array_key_exists('vehimg', $this->request->form))
	                      {
	                         $img_name = $this->request->form['vehimg']['name'];
						     $ext = strrchr($img_name, ".");
						     $type = $this->request->form['vehimg']['type'];
							 $tmp_name = $this->request->form['vehimg']['tmp_name'];
							 $error =  $this->request->form['vehimg']['error'];
							 $size = $this->request->form['vehimg']['size'];
							
							$uid = uniqid();
							$img_name = $uid."_".$img_name;
							$this->request->data['vehimg'] = $img_name;
							$uploads_dir = WWW_ROOT.'files/cab/'.$img_name;
							
							if ($error == 0 && $size <= 16000000 && $ext != '.exe') {
							move_uploaded_file($tmp_name,$uploads_dir);  }
	                      }	
					      
						  if(array_key_exists('reg_cr', $this->request->form))
	                      {
	                         $img_name = $this->request->form['reg_cr']['name'];
						     $ext = strrchr($img_name, ".");
						     $type = $this->request->form['reg_cr']['type'];
							 $tmp_name = $this->request->form['reg_cr']['tmp_name'];
							 $error =  $this->request->form['reg_cr']['error'];
							 $size = $this->request->form['reg_cr']['size'];
							
							$uid = uniqid();
							$img_name = $uid."_".$img_name;
							$this->request->data['reg_cr'] = $img_name;
							$uploads_dir = WWW_ROOT.'files/cab/'.$img_name;
							
							if ($error == 0 && $size <= 16000000 && $ext != '.exe') {
							move_uploaded_file($tmp_name,$uploads_dir);  }
	                      }
						  
						  if(array_key_exists('insurace_cr', $this->request->form))
	                      {
	                         $img_name = $this->request->form['insurace_cr']['name'];
						     $ext = strrchr($img_name, ".");
						     $type = $this->request->form['insurace_cr']['type'];
							 $tmp_name = $this->request->form['insurace_cr']['tmp_name'];
							 $error =  $this->request->form['insurace_cr']['error'];
							 $size = $this->request->form['insurace_cr']['size'];
							
							$uid = uniqid();
							$img_name = $uid."_".$img_name;
							$this->request->data['insurace_cr'] = $img_name;
							$uploads_dir = WWW_ROOT.'files/cab/'.$img_name;
							
							if ($error == 0 && $size <= 16000000 && $ext != '.exe') {
							move_uploaded_file($tmp_name,$uploads_dir);  }
	                      }
						  
						  if(array_key_exists('em_cr', $this->request->form))
	                      {
	                         $img_name = $this->request->form['em_cr']['name'];
						     $ext = strrchr($img_name, ".");
						     $type = $this->request->form['em_cr']['type'];
							 $tmp_name = $this->request->form['em_cr']['tmp_name'];
							 $error =  $this->request->form['em_cr']['error'];
							 $size = $this->request->form['em_cr']['size'];
							
							$uid = uniqid();
							$img_name = $uid."_".$img_name;
							$this->request->data['em_cr'] = $img_name;
							$uploads_dir = WWW_ROOT.'files/cab/'.$img_name;
							
							if ($error == 0 && $size <= 16000000 && $ext != '.exe') {
							move_uploaded_file($tmp_name,$uploads_dir);  }
	                      }
					
					}

					// saving data					
				        
						$data = array('InfoVehicle'=> $this->request->data); 
						if($this->InfoVehicle->save($data)){
						$this->Session->setFlash('Cab detail added successfully','default', array(), 'good');  }
						else{  $this->Session->setFlash('Fail to add cab detail','default', array(), 'bad');   }
					

					}
	
	}
	
		// add drivers page
		public function add_driver() {
		 Configure::write('debug',2);
		
	     $love = new LovesController;
	     $this->set('cities', $love->cities());
		 $this->set('states', $love->states());
		 $this->set('countries', $love->countries());
		 $this->set('vehnums', $love->vehnums());
				  
				 if($this->request->data) {
					   
				 /* $email_phone = $this->Driver->find('count', array('conditions' => array('OR' => array(array('Driver.email_id' => $email),array('Driver.phone' => $phone_no)))));				 
                 
				 if($email_phone != 0)
				 {
					$msg = '[{"msg":"Sorry!! Email id or phone number already taken."}]';
					echo $msg; 
					die();
				 }    */
					   
					   
				   unset($this->request->data['_Token']);
				   
				   $password = $this->request->data['password'];
                   $hashpassword = AuthComponent::password($password);	
				   $this->request->data['password'] = $hashpassword;
					
                    // saving files				
					if(isset($this->request->form))
					  {
						 
						  if(array_key_exists('driving_file', $this->request->form))
	                      {
	                         $img_name = $this->request->form['driving_file']['name'];
						     $ext = strrchr($img_name, ".");
						     $type = $this->request->form['driving_file']['type'];
							 $tmp_name = $this->request->form['driving_file']['tmp_name'];
							 $error =  $this->request->form['driving_file']['error'];
							 $size = $this->request->form['driving_file']['size'];
							
							$uid = uniqid();
							$img_name = $uid."_".$img_name;
							$this->request->data['driving_file'] = $img_name;
							$uploads_dir = WWW_ROOT.'files/driver/'.$img_name;
							
							if ($error == 0 && $size <= 16000000 && $ext != '.exe') {
							move_uploaded_file($tmp_name,$uploads_dir);  }
	                      }	
					      
						  if(array_key_exists('aadhar_file', $this->request->form))
	                      {
	                         $img_name = $this->request->form['aadhar_file']['name'];
						     $ext = strrchr($img_name, ".");
						     $type = $this->request->form['aadhar_file']['type'];
							 $tmp_name = $this->request->form['aadhar_file']['tmp_name'];
							 $error =  $this->request->form['aadhar_file']['error'];
							 $size = $this->request->form['aadhar_file']['size'];
							
							$uid = uniqid();
							$img_name = $uid."_".$img_name;
							$this->request->data['aadhar_file'] = $img_name;
							$uploads_dir = WWW_ROOT.'files/driver/'.$img_name;
							
							if ($error == 0 && $size <= 16000000 && $ext != '.exe') {
							move_uploaded_file($tmp_name,$uploads_dir);  }
	                      }
						  
						  if(array_key_exists('uid_file', $this->request->form))
	                      {
	                         $img_name = $this->request->form['uid_file']['name'];
						     $ext = strrchr($img_name, ".");
						     $type = $this->request->form['uid_file']['type'];
							 $tmp_name = $this->request->form['uid_file']['tmp_name'];
							 $error =  $this->request->form['uid_file']['error'];
							 $size = $this->request->form['uid_file']['size'];
							
							$uid = uniqid();
							$img_name = $uid."_".$img_name;
							$this->request->data['uid_file'] = $img_name;
							$uploads_dir = WWW_ROOT.'files/driver/'.$img_name;
							
							if ($error == 0 && $size <= 16000000 && $ext != '.exe') {
							move_uploaded_file($tmp_name,$uploads_dir);  }
	                      }
						  
						  if(array_key_exists('driver_photo', $this->request->form))
	                      {
	                         $img_name = $this->request->form['driver_photo']['name'];
						     $ext = strrchr($img_name, ".");
						     $type = $this->request->form['driver_photo']['type'];
							 $tmp_name = $this->request->form['driver_photo']['tmp_name'];
							 $error =  $this->request->form['driver_photo']['error'];
							 $size = $this->request->form['driver_photo']['size'];
							
							$uid = uniqid();
							$img_name = $uid."_".$img_name;
							$this->request->data['driver_photo'] = $img_name;
							$uploads_dir = WWW_ROOT.'files/driver/'.$img_name;
							
							if ($error == 0 && $size <= 16000000 && $ext != '.exe') {
							move_uploaded_file($tmp_name,$uploads_dir);  }
	                      }
						  
						   if(array_key_exists('address_proof', $this->request->form))
	                      {
	                         $img_name = $this->request->form['address_proof']['name'];
						     $ext = strrchr($img_name, ".");
						     $type = $this->request->form['address_proof']['type'];
							 $tmp_name = $this->request->form['address_proof']['tmp_name'];
							 $error =  $this->request->form['address_proof']['error'];
							 $size = $this->request->form['address_proof']['size'];
							
							$uid = uniqid();
							$img_name = $uid."_".$img_name;
							$this->request->data['address_proof'] = $img_name;
							$uploads_dir = WWW_ROOT.'files/driver/'.$img_name;
							
							if ($error == 0 && $size <= 16000000 && $ext != '.exe') {
							move_uploaded_file($tmp_name,$uploads_dir);  }
	                      }
					
					}

					   // saving data					
				        
						$data = array('Driver'=> $this->request->data); 
						if($this->Driver->save($data)){
						$driver_id = $this->Driver->getLastInsertId();	
						$driverid = 'RITECABDR'.$driver_id;
						
						$this->Driver->updateAll(
						array('Driver.driverid' => "'$driverid'"),
						array('Driver.id' => $driver_id)
					    );
						
						$this->Session->setFlash('Driver detail added successfully','default', array(), 'good');  }
						else{  $this->Session->setFlash('Fail to get driver detail','default', array(), 'bad');   }
					

					}
	
	}
	
	  // driver_detail page
		public function driver_detail() {
		Configure::write('debug',0);
		$drivers = $this->Driver->find('all');
		$this->set('drivers',$drivers);
		
	}
	
		  // driver_profile page
		public function driver_profile($driver_id=null) {
		Configure::write('debug',0);
		$driver = $this->Driver->find('all',array('conditions'=>array('Driver.id'=>$driver_id)));
		
		
		/* echo "<pre>";
		print_r($driver);
		
		die(); */
		
		$this->set('driver',$driver);
		
	}
	
		// driver_overview page
		public function driver_min_detail() {
		Configure::write('debug',0);
		$drivers = $this->Driver->find('all');
		$this->set('drivers',$drivers);	
		
	}
	
	// customers
	
	// driver_detail page
		public function customers() {
		Configure::write('debug',0);
		$customers = $this->Customer->find('all');
		$this->set('customers',$customers);
		
	}
	
	//  cab type page
		public function cab_types() {
		Configure::write('debug',0);
		$cabs = $this->VehicleName->find('all');
		$this->set('cabs',$cabs);	
		
	}
	
	//  cab detail page
		public function cab_detail() {
		Configure::write('debug',0);
		$cabinfo = $this->InfoVehicle->find('all');
		$this->set('cabinfo',$cabinfo);	
		
	}
	
	//  cab price detail page
		public function pricing_detail() {
		Configure::write('debug',0);
		$price = $this->Price->find('all');
		$this->set('price',$price);	
		
	}
	
	//  Airport price detail page
		public function airport_pricing_detail() {
		Configure::write('debug',0);
		$price = $this->AirportPrice->find('all');
		$this->set('price',$price);	
		
	}
	
	//  Promo code detail page
		public function promos_detail() {
		Configure::write('debug',0);
		$promos = $this->PromoCode->find('all');
		$this->set('promos',$promos);	
		
	}
	
	//  Assign cabs
		public function assign_cabs() {
		Configure::write('debug',0);
		
		
	}
	
	//  Assign cabs
		public function assigned_cabs() {
	//	Configure::write('debug',0);
		
		//$this->InfoVehicle->bindModel('hasOne'=>'Driver');
		//$this->InfoVehicle->bindModel('belongsTo' => array('Driver.vehicle_id' => 'InfoVehicle.id'));
		
		//array('Driver.vehicle_id' => 'InfoVehicle.id')
		
		$this->loadModel('InfoVehicle');
		$this->loadModel('Driver');
		
		// $this->Driver->bindModel('hasMany'=>'InfoVehicle');
		// $driverinfo = $this->Driver->find('all');
		
		
		$options['joins'] = array(
        array('ritecab_info_vehicles' => 'ritecab_drivers',
        'alias' => 'ritecab_drivers',
        'type' => 'LEFT',
        'conditions' => array(
            'ritecab_info_vehicles.id = ritecab_drivers.vehicle_id',
        )
       )
      );
	    
		$cabinfo = $this->InfoVehicle->find('all',$options);
						
		
		echo "<pre>";
		print_r($cabinfo);
		
		die();
		//$this->set('cabinfo',$cabinfo);	
		
	}
	
	// add cabs pricing page
		public function cab_pricing() {
		Configure::write('debug',0);
		$love = new LovesController;
	    $this->set('cities',$love->cities());
		$this->set('vehtype',$love->vehtype());
	
				   if($this->request->data) {
						unset($this->request->data['_Token']);	
						$data = array('Price'=> $this->request->data); 
						if($this->Price->save($data)){
						$this->Session->setFlash('Cab pricing added successfully','default', array(), 'good');  }
						else{  $this->Session->setFlash('Fail to add Cab pricing detail','default', array(), 'bad');   }
					}
	}
	
	// add airport pricing page
		public function airport_pricing() {
		Configure::write('debug',0);	
        $love = new LovesController;
	    $this->set('cities',$love->cities());
		$this->set('vehtype',$love->vehtype());
	
				   if($this->request->data) {
						unset($this->request->data['_Token']);	
						$data = array('AirportPrice'=> $this->request->data); 
						if($this->AirportPrice->save($data)){
						$this->Session->setFlash('Airport pricing added successfully','default', array(), 'good');  }
						else {  $this->Session->setFlash('Fail to add airport pricing detail','default', array(), 'bad');   }
					}
	}
	
	// add create promotions
		public function create_promos() {
	
	               Configure::write('debug',0);
				   if($this->request->data) {

						unset($this->request->data['_Token']);	
						$data = array('PromoCode'=> $this->request->data); 
						if($this->PromoCode->save($data)){
						$this->Session->setFlash('Promotion code created successfully','default', array(), 'good');  }
						else {  $this->Session->setFlash('Fail to add promotion code','default', array(), 'bad');   }
					}
	}





// add create promotions
		public function test() {
	
	               Configure::write('debug',2);
				   $lat = '12.9426824';
				   $lon = '77.621035';
				   // $data=$this->DriverLocation->query('SELECT ((ACOS(SIN($lat * PI() / 180) * SIN(lat * PI() / 180) + COS($lat * PI() / 180) * COS(lat * PI() / 180) * COS(($lon – lon) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) AS `distance` FROM `ritecab_driver_locations` HAVING `distance`<=’10’ ORDER BY `distance` ASC');
				   
				    $data = $this->Driver->query('SELECT lat,lon,id,fname,lname,email_id,phone,driver_photo,isverified,isactive,((ACOS(SIN('.$lat.' * PI() / 180) * SIN(lat * PI() / 180) + COS('.$lat.' * PI() / 180) * COS(lat * PI() / 180) * COS(('.$lon.' - lon) * PI() / 180)) * 180 / PI()) * 60 * 1.1515) AS `distance` FROM `ritecab_drivers` HAVING `distance` <= 10 ORDER BY `distance` ASC');
				   
				   echo "<pre>";
				   print_r($data);
				   die('vbnvbnvbnvb');
	}
	
	
}


