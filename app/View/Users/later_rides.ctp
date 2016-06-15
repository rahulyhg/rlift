 <div id="wrap">
 
  <?php echo $this->element('menu'); ?>
 
<!--PAGE CONTENT -->
        <div id="content">
		
		<div class="inner" style="padding: 40px; padding-top: 15px;">
		
		
		<div class="row">
									    <div class="col-lg-12">
										<h3 class="page-header">RIDE LATER DETAILS</h3>
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
                 <th colspan="3"><i class="fa fa-user"></i> CUSTOMER</th>
				<th colspan="4" style="border-left: 1px solid white; border-right: 1px solid white; border-top: 1px solid white;"> <i class="fa fa-map-signs"></i> ROUTE</th>
			   
				<th colspan="3" style="border-right: 1px solid white; border-top: 1px solid white;"> <i class="fa fa-odnoklassniki-square"></i> DRIVER</th>
				
				
				<th colspan="4" style="border-right: 1px solid white;border-top: 1px solid white;">	<i class="fa fa-car"></i> CAB</th>
				
				<th colspan="2"> ACTION </th>
			
            </tr>
			
			<tr>
               
			    <th>Name</th>
				<th>Mobile Number</th>
				<th>Access Code</th>
				
                <th>Pickup City</th>
                <th>Drop City</th>
				<th>Date</th>
				<th>Time</th>
               
				
				<th>Name</th>
				<th>Licence number</th>
				<th>Phone number</th>
				
				<th>Name</th>
				<th>Type</th>
				<th>Color</th>
				<th>Number</th>

                <th>Assign Driver To Ride</th>		
				<th>Delete</th>
				
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
			  
				<p style="display:none;" id="veh_<?php echo $value['LaterRide']['id']; ?>"><?php echo $value['LaterRide']['vehicle_id']; ?></p>
				<p style="display:none;" id="driver_<?php echo $value['LaterRide']['id']; ?>"><?php echo $value['LaterRide']['driver_id']; ?></p>
				
				<td><?php echo $value['LaterRide']['cname']; ?></td>
				<td class="mnumber"> <i class="fa fa-phone-square"></i>

                <?php echo $value['LaterRide']['cnumber']; ?></td>
				<td><?php echo $value['LaterRide']['access_code']; ?></td>

				<td><?php echo $value['LaterRide']['pickup_city']; ?></td>
                <td><?php echo $value['LaterRide']['drop_city']; ?></td>
					<td><?php echo $value['LaterRide']['dep_date']; ?></td>
                <td><?php echo $value['LaterRide']['dep_time']; ?></td>
				
				 <td><?php echo $name; ?></td>
				 <td><?php echo $drivingno; ?></td>
				 <td class="mnumber"> <i class="fa fa-phone-square"></i> <?php echo $driverphone; ?></td>
				 
				  <td><?php echo $veh_name; ?></td>
				  <td><?php echo $veh_type; ?></td>
				  <td><?php echo $veh_color; ?></td>
				  <td>  <i class="fa fa-car"></i>   <?php echo $veh_number; ?></td>

				
			
				
				<td><a href="<?php echo $this->webroot ?>assign_cab_later_ride/<?php echo $value['LaterRide']['id'] ?>" class="btn btn-primary btn-xs">
                <i class="fa fa-odnoklassniki-square"></i> Assign Driver 
                </a></td>
				
					<td> 
				<button id="<?php echo $value['LaterRide']['id']; ?>" class="btn btn-danger btn-xs wantto" value="Delete">
                <span class="glyphicon glyphicon-trash"></span> Delete
                </button>
				</td>
      
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
            var r = confirm("Are you sure you want remove this ride?");
			if (r != true) 
			{
				return false;
			}

		    var ride_id = $(this).attr('id');
			var vehicle_id = $('#veh_'+ride_id).html();
			var driver_id = $('#driver_'+ride_id).html();

				$.ajax({
				  url: BaseURL+'Calls/delelet_later_ride',
				  data: {
					ride_id: ride_id, 
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
