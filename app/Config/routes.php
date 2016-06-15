<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
 
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'users', 'action' => 'login'));
	Router::connect('/logout', array('controller' => 'users', 'action' => 'logout'));
	Router::connect('/deny', array('controller' => 'users', 'action' => 'deny'));
	Router::connect('/dashboard', array('controller' => 'users', 'action' => 'dashboard'));
	Router::connect('/cab_type', array('controller' => 'users', 'action' => 'car_type'));
	Router::connect('/add_cab', array('controller' => 'users', 'action' => 'add_cab'));
	Router::connect('/add_driver', array('controller' => 'users', 'action' => 'add_driver'));
	
	Router::connect('/driver_overview', array('controller' => 'users', 'action' => 'driver_min_detail'));
	Router::connect('/driver_detail', array('controller' => 'users', 'action' => 'driver_detail'));
	Router::connect('/customers', array('controller' => 'users', 'action' => 'customers'));
	Router::connect('/assign_cabs', array('controller' => 'users', 'action' => 'assign_cabs'));
	Router::connect('/cabtypes', array('controller' => 'users', 'action' => 'cab_types'));
	Router::connect('/cabs_detail', array('controller' => 'users', 'action' => 'cab_detail'));
	Router::connect('/pricing_detail', array('controller' => 'users', 'action' => 'pricing_detail'));
	Router::connect('/airport_pricing_detail', array('controller' => 'users', 'action' => 'airport_pricing_detail'));
	Router::connect('/promos_detail', array('controller' => 'users', 'action' => 'promos_detail'));
	
	Router::connect('/cab_pricing', array('controller' => 'users', 'action' => 'cab_pricing'));
	Router::connect('/airport_pricing', array('controller' => 'users', 'action' => 'airport_pricing'));
	Router::connect('/create_promos', array('controller' => 'users', 'action' => 'create_promos'));
	
	Router::connect('/add_pickup_point', array('controller' => 'users', 'action' => 'add_pickup_point'));
	Router::connect('/pickup_point_details', array('controller' => 'users', 'action' => 'pickup_point_details'));
	Router::connect('/route_details', array('controller' => 'users', 'action' => 'route_details'));
    Router::connect('/intercity_route', array('controller' => 'users', 'action' => 'intercity_route'));
	Router::connect('/check_vehicles', array('controller' => 'apis', 'action' => 'check_vehicles'));
	Router::connect('/assigned_vehicle_details', array('controller' => 'apis', 'action' => 'assigned_vehicle_details'));
	Router::connect('/get_cities', array('controller' => 'apis', 'action' => 'get_cities'));
	Router::connect('/get_cab_full_info', array('controller' => 'apis', 'action' => 'get_cab_full_info'));
	Router::connect('/book_seat', array('controller' => 'apis', 'action' => 'book_seat'));
	Router::connect('/book_your_owncab_form', array('controller' => 'apis', 'action' => 'book_your_owncab_form'));
	
	Router::connect('/unassign_cabs', array('controller' => 'calls', 'action' => 'unassign_cabs'));
	Router::connect('/assigncabs', array('controller' => 'users', 'action' => 'assigncabs'));
	Router::connect('/unassigncabs', array('controller' => 'users', 'action' => 'unassigncabs'));
	Router::connect('/intercity_details', array('controller' => 'users', 'action' => 'intercity_details'));
	Router::connect('/intercity_depdate/*', array('controller' => 'users', 'action' => 'intercity_depdate'));
	Router::connect('/intercity_cabs/*', array('controller' => 'users', 'action' => 'intercity_cabs'));
	Router::connect('/deleteroutes', array('controller' => 'calls', 'action' => 'deleteroutes'));
	Router::connect('/deleteorder', array('controller' => 'calls', 'action' => 'deleteorder'));
	Router::connect('/deletepickpoints', array('controller' => 'calls', 'action' => 'deletepickpoints'));
	Router::connect('/rides/*', array('controller' => 'users', 'action' => 'rides'));
	Router::connect('/cancelrides/*', array('controller' => 'users', 'action' => 'cancelrides'));
	Router::connect('/canceltrips/*', array('controller' => 'users', 'action' => 'canceltrips'));
	Router::connect('/owncab_details/*', array('controller' => 'users', 'action' => 'owncab_details'));
	Router::connect('/receipts/*', array('controller' => 'users', 'action' => 'reciepts'));
	Router::connect('/ride_later', array('controller' => 'users', 'action' => 'later_rides'));
	Router::connect('/assign_cab_later_ride/*', array('controller' => 'users', 'action' => 'assign_cab_later_ride'));
	
	
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	//Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
