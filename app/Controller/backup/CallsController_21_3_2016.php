<?php
App::import('Controller', 'Loves');
App::uses('AppController', 'Controller');

class CallsController extends AppController {

    var $components = array('Session', 'Cookie','RequestHandler');
	var $helpers=array('Js');
	var $uses = array('User','VehicleName','Country','State','City','Price','AirportPrice','PromoCode','Driver','InfoVehicle','Customer','AssignVehicleToDriver');
	  
	function beforeFilter()
    {
      
	}
	
	/*** Ajax call functions starts *****/
	
    // Delete - Block driver
	public function action_driver() {
	Configure::write('debug',0);
	$this->layout = false;
	 if($this->request->isAjax)
	 {
	   if($this->request->is('post'))
	   { 
		    $driver_id = $this->request->data['driver_id'];
			$todo = $this->request->data['driver_do'];
			
			if($todo == 'Delete')
			{
			    $driverdetail = $this->Driver->find('all',array('conditions'=>array('Driver.id'=>$driver_id)));
				$query = $this->Driver->deleteAll(array('Driver.id' => $driver_id), false);
				if($query == true)
		        { 
					
					$driver_file = $driverdetail['0']['Driver']['driving_file'];
					$aadhar_file = $driverdetail['0']['Driver']['aadhar_file'];
					$driver_photo = $driverdetail['0']['Driver']['driver_photo'];
					$driver_file = WWW_ROOT.'files/driver/'.$driver_file;
					$aadhar_file = WWW_ROOT.'files/driver/'.$aadhar_file;
					$driver_photo = WWW_ROOT.'files/driver/'.$driver_photo;
					unlink($driver_file);
					unlink($aadhar_file);
					unlink($driver_photo);
					die("success"); 
				}  
				else 
				{ 
			       die("failure");  
				} 
			
			}
            else
            {
				$this->Driver->create();
				$this->request->data['Driver']['id'] = $driver_id;
				$this->request->data['Driver']['action'] = $todo;
			    if($this->Driver->save($this->request->data))
				{ 
			       echo "Driver ".$todo." successfully";
				   die(); 
				} 
			    else 
				{ 
			      die("failure");  
				}
			}				
	   }
	 }
	}
	
	
	 // verify driver
	 public function verify_driver() {
	 Configure::write('debug',0);
	 $this->layout = false;
	 if($this->request->isAjax)
	 {
	   if($this->request->is('post'))
	   { 
	       
		    $this->Driver->create();
		    $this->request->data['Driver']['id'] = $this->request->data['driver_id'];
		    $this->request->data['Driver']['isverified'] = $this->request->data['driver_do'];
		    if($this->Driver->save($this->request->data))
		    { die("Driver status changed successfully"); }  else { die("failure");  }
		   
	   }
	 }  
	}

	// Delete cab pricing detail
	public function action_price() {
	Configure::write('debug',0);
	$this->layout = false;
	 if($this->request->isAjax)
	 {
	   if($this->request->is('post'))
	   { 
		    $price_id = $this->request->data['price_id'];
			$todo = $this->request->data['price_do'];
			
			if($todo == 'Delete')
			{
			    $query = $this->Price->deleteAll(array('Price.id' => $price_id), false);
				if($query == true)
		        { 
					die("success"); 
				}  
				else 
				{ 
			       die("failure");  
				} 
			
			}
       }
	 }
	}
	
	
	// Delete customer details
	public function action_customer() {
	Configure::write('debug',0);
	$this->layout = false;
	 if($this->request->isAjax)
	 {
	   if($this->request->is('post'))
	   { 
		    $customer_id = $this->request->data['customer_id'];
			$todo = $this->request->data['customer_do'];
			
			if($todo == 'Delete')
			{
			    $query = $this->Customer->deleteAll(array('Customer.id' => $customer_id), false);
				if($query == true)
		        { 
					die("success"); 
				}  
				else 
				{ 
			       die("failure");  
				} 
			
			}
       }
	 }
	}
	
	// Delete airport pricing detail
	public function action_airportprice() {
	Configure::write('debug',0);
	$this->layout = false;
	 if($this->request->isAjax)
	 {
	   if($this->request->is('post'))
	   { 
		    $price_id = $this->request->data['price_id'];
			$todo = $this->request->data['price_do'];
			
			if($todo == 'Delete')
			{
			    $query = $this->AirportPrice->deleteAll(array('AirportPrice.id' => $price_id), false);
				if($query == true)
		        { 
					die("success"); 
				}  
				else 
				{ 
			       die("failure");  
				} 
			
			}
       }
	 }
	}
	
	// Delete/ active/ deactive promos detail
	public function action_promos() {
	Configure::write('debug',2);
	$this->layout = false;
	 if($this->request->isAjax)
	 {
	   if($this->request->is('post'))
	   { 
		    $promos_id = $this->request->data['promos_id'];
			$todo = $this->request->data['promos_do'];
			
			if($todo == 'Delete')
			{
			    $query = $this->PromoCode->deleteAll(array('PromoCode.id' => $promos_id), false);
				if($query == true)
		        { 
					die("success"); 
				}  
				else 
				{ 
			       die("failure");  
				} 
			
			}
			else
			{
				$this->PromoCode->create();
				$this->request->data['PromoCode']['id'] = $promos_id;
				$this->request->data['PromoCode']['isactive'] = $todo;
			    if($this->PromoCode->save($this->request->data))
				{ 
			      if($todo == 'yes'){
					die("Promo code activated successfully");  
				  }
				  else{
					die("Promo code deactivated successfully");    
				  }
			    }  else { die("failure");  }
				
			}	
       }
	 }
	}
	
	// Delete cab type
	public function action_cabtype() {
	Configure::write('debug',0);
	$this->layout = false;
	 if($this->request->isAjax)
	 {
	   if($this->request->is('post'))
	   { 
		    $cabtype_id = $this->request->data['cabtype_id'];
			$todo = $this->request->data['cabtype_do'];
			
			if($todo == 'Delete')
			{
			    $query = $this->VehicleName->deleteAll(array('VehicleName.id' => $cabtype_id), false);
				if($query == true)
		        { 
					die("success"); 
				}  
				else 
				{ 
			       die("failure");  
				} 
			
			}
       }
	 }
	}
	
    // Delete - Block Cabs
	public function action_cabs() {
	Configure::write('debug',0);
	$this->layout = false;
	 if($this->request->isAjax)
	 {
	   if($this->request->is('post'))
	   { 
		    $cab_id = $this->request->data['cab_id'];
			$todo = $this->request->data['cab_do'];
			
			if($todo == 'Delete')
			{
			    $cabdetail = $this->InfoVehicle->find('all',array('conditions'=>array('InfoVehicle.id'=>$cab_id)));
				$query = $this->InfoVehicle->deleteAll(array('InfoVehicle.id' => $cab_id), false);
				if($query == true)
		        { 
					
					$reg_cr = $cabdetail['0']['InfoVehicle']['reg_cr'];
					$em_cr = $cabdetail['0']['InfoVehicle']['em_cr'];
					$vehimg = $cabdetail['0']['InfoVehicle']['vehimg'];
					$insurace_cr = $cabdetail['0']['InfoVehicle']['insurace_cr'];
					
					$reg_cr = WWW_ROOT.'files/cab/'.$reg_cr;
					$em_cr = WWW_ROOT.'files/cab/'.$em_cr;
					$vehimg = WWW_ROOT.'files/cab/'.$vehimg;
					$insurace_cr = WWW_ROOT.'files/cab/'.$insurace_cr;
					
					unlink($reg_cr);
					unlink($em_cr);
					unlink($vehimg);
					unlink($insurace_cr);
					die("success"); 
				}  
				else 
				{ 
			       die("failure");  
				} 
			
			}
            else
            {
				$this->InfoVehicle->create();
				$this->request->data['InfoVehicle']['id'] = $cab_id;
				$this->request->data['InfoVehicle']['action'] = $todo;
			    if($this->InfoVehicle->save($this->request->data))
				{ echo "Cab ".$todo." successfully";
				die(); }  else { die("failure");  }
			}				
	   }
	 }
	}	
	
	
     // assign cabs
	 public function assign_cabs() {
	 Configure::write('debug',0);
	 $this->layout = false;
	 if($this->request->isAjax)
	 {
	   if($this->request->is('post'))
	   { 
	        $driver_id = $this->request->data['driver_id'];
		    $vehicle_id = $this->request->data['vehicle_id'];
			$veh_assign = $this->request->data['veh_assign'];
		    
			$this->Driver->create();
		    $this->request->data['Driver']['id'] = $driver_id;
		    $this->request->data['Driver']['vehicle_id'] = $vehicle_id;
			$this->request->data['Driver']['Isallocated'] = 'allocated';
			$this->request->data['Driver']['veh_assign'] = $veh_assign;

		    if($this->Driver->save($this->request->data))
		    { 
		        $this->InfoVehicle->create();
				$this->request->data['InfoVehicle']['id'] = $vehicle_id;
				$this->request->data['InfoVehicle']['Isassigned'] = 'assigned';
				$this->InfoVehicle->save($this->request->data);
			    die("success"); 
			}  
			else 
			{ 
		       die("failure");  
			}
		   
	   }
	 }  
	}
	
	 // unassign cabs
	 public function unassign_cabs($driver_id=null) {
		 
		 Configure::write('debug',0);
		 $this->layout = false;
		 
		 $driver_details = $this->Driver->findById($driver_id,'vehicle_id');
		 $vehicle_id = $driver_details['Driver']['vehicle_id'];
		 $this->Driver->updateAll(array('Driver.Isallocated' => '"unallocated"','Driver.vehicle_id' => '"null"','Driver.veh_assign' => '"null"'),array('Driver.id' => $driver_id));
		 $this->InfoVehicle->updateAll(array('InfoVehicle.Isassigned' => '"Unassigned"'),array('InfoVehicle.id' => $vehicle_id));
		 $this->AssignVehicleToDriver->updateAll(array('AssignVehicleToDriver.driver_id' => '"null"','AssignVehicleToDriver.vehicle_id' => '"null"'),array('AssignVehicleToDriver.driver_id' => $driver_id));
		 $this->redirect('/assign_cabs');				
	}  
	
		
}


