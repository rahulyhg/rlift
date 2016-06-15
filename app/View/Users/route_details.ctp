 <div id="wrap">
 
  <?php echo $this->element('menu'); ?>
 
<!--PAGE CONTENT -->
        <div id="content">
		
		<div class="inner" style="padding: 40px; padding-top: 15px;">
		
		
		<div class="row">
									    <div class="col-lg-12">
										<h3 class="page-header">INTERCITY ROUTE DETAILS</h3>
									   </div>
								       </div>
		
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "scrollX": true
    } );
} );
</script>

<style>
div.dataTables_wrapper {
        width: 100%;
        margin: 0 auto;
    }
	
	th, td {
    text-align: center !important;
   }
	
</style>


<table id="example" class="display compact" cellspacing="0" width="2050px">
        <thead>
            
			  <tr style="background: rgba(128, 128, 128, 0.15);">
                <th colspan="7"> <i class="fa fa-map-signs"></i> ROUTE</th>
			   
				<th colspan="3" style="border-left: 1px solid white; border-right: 1px solid white; border-top: 1px solid white;"> 
				<i class="fa fa-odnoklassniki-square"></i> DRIVER </th>
				
				
				<th colspan="4" style="border-right: 1px solid white;border-top: 1px solid white;">
				<i class="fa fa-car"></i>
				CAB</th>
				
				<th colspan="3"> ACTION </th>
			
            </tr>
			
			<tr>
                <th>Route No.</th>
			    <th>Departure Date</th>
                <th> <i class="fa fa-map-pin"></i> Pickup City</th>
                <th> <i class="fa fa-share"></i> Via</th>
				<th> <i class="fa fa-map-pin"></i> Drop City</th>
                <th>Pickup Point</th>
                <th>Time</th>
				
				<th>Name</th>
				<th>Licence number</th>
				<th>Phone number</th>
				
				<th>Name</th>
				<th>Type</th>
				<th>Color</th>
				<th>Number</th>
				
                <th>Action</th>
				<th>Assign Date/Time</th>  
                <th>Assign Driver/Vehicle</th>				
            </tr>
        </thead>
        <tbody>
            
			<?php   
			
			 foreach($assignedVehDetails as $key=>$value) { 
		
		     if (array_key_exists("Driver",$value))
			  {
				   $fname =  $value['Driver']['fname']; 
				   $lname = $value['Driver']['lname']; 
				   $name =$fname.' '.$lname;
				   $drivingno =  $value['Driver']['driving_no']; 
				   $driverphone = $value['Driver']['phone']; 
			  }
			  else
			  {
			       $name =  '<p style="color:red;">No driver assigned</p>'; 
				   $drivingno =  '___';
				   $driverphone = '___'; 
			  }
			  
			  if (array_key_exists("InfoVehicle",$value))
			  {
				   $veh_name =  $value['InfoVehicle']['veh_name']; 
				   $veh_type = $value['InfoVehicle']['veh_type']; 
				   $veh_color =  $value['InfoVehicle']['veh_color']; 
				   $veh_number = $value['InfoVehicle']['veh_number']; 
			  }
			  else
			  {
			       $veh_name =  '<p style="color:red;">No vehicle assigned</p>'; 
				   $veh_type = '___'; 
				   $veh_color =  '___'; 
				   $veh_number = '___'; 
			  }
			 ?>
			
			<tr>
			  
				<td><?php echo $value['AssignVehicleToDriver']['routeid']; ?>
				<p style="display:none;" id="veh_<?php echo $value['AssignVehicleToDriver']['id']; ?>"><?php echo $value['AssignVehicleToDriver']['vehicle_id']; ?></p>
				<p style="display:none;" id="driver_<?php echo $value['AssignVehicleToDriver']['id']; ?>"><?php echo $value['AssignVehicleToDriver']['driver_id']; ?></p>
				</td>
				
				<td><?php echo $value['AssignVehicleToDriver']['dep_date']; ?></td>
				<td><?php echo $value['AssignVehicleToDriver']['pickup_city']; ?></td>
				<td><?php echo $value['AssignVehicleToDriver']['via']; ?></td>
                <td><?php echo $value['AssignVehicleToDriver']['drop_city']; ?></td>
				
                <td><?php echo $value['AssignVehicleToDriver']['pickup_points']; ?></td>
                <td><?php echo $value['AssignVehicleToDriver']['dep_time']; ?></td>
				
				 <td><?php echo $name; ?></td>
				 <td><?php echo $drivingno; ?></td>
				 <td class="mnumber"><i class="fa fa-phone-square"></i> <?php echo $driverphone; ?></td>
				 
				  <td><?php echo $veh_name; ?></td>
				  <td><?php echo $veh_type; ?></td>
				  <td><?php echo $veh_color; ?></td>
				  <td> <i class="fa fa-car"></i>   <?php echo $veh_number; ?></td>

				
				<td> 
				<button id="<?php echo $value['AssignVehicleToDriver']['id']; ?>" class="btn btn-danger btn-xs wantto" value="Delete">
                <span class="glyphicon glyphicon-trash"></span> Delete
                </button>
				</td>
				
				<td><a href="<?php echo $this->webroot ?>intercity_depdate/<?php echo $value['AssignVehicleToDriver']['id'] ?>" class="btn btn-info btn-xs">
                <span class="glyphicon glyphicon-edit"></span> Date/time
                </a></td>
				
				<td><a href="<?php echo $this->webroot ?>intercity_cabs/<?php echo $value['AssignVehicleToDriver']['id'] ?>" class="btn btn-info btn-xs">
                <span class="glyphicon glyphicon-edit"></span> Driver/Vehicle
                </a></td>
      
            </tr>
     
			<?php  $i++; }  ?>
			
        </tbody>
    </table>
	
	</div>
	
	</div>
	
		</div>
	
	
<script>		
$(document).ready(function(){
		
		$('.wantto').click(function() {
            var r = confirm("Are you sure you want remove this route?");
			if (r != true) 
			{
				return false;
			}

		    var route_id = $(this).attr('id');
			var vehicle_id = $('#veh_'+route_id).html();
			var driver_id = $('#driver_'+route_id).html();

				$.ajax({
				  url: BaseURL+'Calls/deleteroutes',
				  data: {
					route_id: route_id, 
					vehicle_id: vehicle_id,  
					driver_id: driver_id,  					
					},
					type: 'POST',
					success: function( data ) {
						if(data == 'success')
						{
						   location.reload();	
						}
						else
						{
							alert(data);
						}	
					
					
					}
				});
		});	

});	

</script>		
