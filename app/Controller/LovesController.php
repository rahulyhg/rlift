<?php
App::uses('AppController', 'Controller');
class LovesController extends AppController {

    var $components = array('Security','Email','Session', 'Cookie','RequestHandler');
	var $helpers=array('Js');
	var $uses = array('User','VehicleName','Country','State','City','Price','AirportPrice','InfoVehicle');
	  

	/*** functions starts *****/
	
    public function countries() {
	$countries = $this->Country->find('all');
	return $countries;
	}
	
    public function states() {
	$states = $this->State->find('all');
	return $states;
	}
	
	public function cities() {
	$cities = $this->City->find('all');
	return $cities;
	}
	
	public function vehtype() {
	$vehres = $this->VehicleName->find('all');
	$vehtype = Hash::extract($vehres, '{n}.VehicleName.name');
	return $vehtype;
	}
	
	public function vehnums() {
	$vehnumres = $this->InfoVehicle->find('all');
	$vehnums = Hash::extract($vehnumres, '{n}.InfoVehicle.veh_number');
	return $vehnums;
	}
	 
}






