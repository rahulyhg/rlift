 <div id="wrap">
 
  <?php echo $this->element('menu'); ?>
 
<!--PAGE CONTENT -->
        <div id="content">
		
		<div class="inner" style="padding: 40px; padding-top: 15px;">
		
		
		<div class="row">
									    <div class="col-lg-12">
										<h3 class="page-header">ASSIGNED DRIVER CAB DETAILS</h3>
									   </div>
								       </div>
		
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
	<script>
$(document).ready(function() {
    $('#example').DataTable( {
        "scrollX": false
    } );
} );
</script>


<style>
div.dataTables_wrapper {
        width: 100%;
        margin: 0 auto;
    }
	
</style>


<table id="example" class="display compact" cellspacing="0" width="1050px">
        <thead>
            <tr>
              
			    <th>Departure date</th>
                <th>Pickup City</th>
                <th>Drop City</th>
                <th>Via</th>
                <th>Pickup Point</th>
                <th>Time</th>
                <th>Action</th>
				<th>Edit</th>    
            </tr>
        </thead>
        <tbody>
            
			<?php   $i = 1;
			        foreach($assignedVehDetails as $key=>$value) { 
		
			?>
			
			<tr>
			  
				<td><?php echo $value['AssignVehicleToDriver']['dep_date']; ?></td>
				<td><?php echo $value['AssignVehicleToDriver']['pickup_city']; ?></td>
                <td><?php echo $value['AssignVehicleToDriver']['drop_city']; ?></td>
				<td><?php echo $value['AssignVehicleToDriver']['via']; ?></td>
                <td><?php echo $value['AssignVehicleToDriver']['pickup_points']; ?></td>
                <td><?php echo $value['AssignVehicleToDriver']['dep_time']; ?></td>
		        
				
				<td> 
				<button id="<?php echo $value['AssignVehicleToDriver']['id']; ?>" class="btn btn-danger wantto" style="padding: 4px 6px;font-size: 12px;" value="Delete">
                <span class="glyphicon glyphicon-trash"></span> Delete
                </button>
				</td>
				
				<td><a href="#" class="btn btn-info" style="padding: 4px 6px;font-size: 12px;">
                <span class="glyphicon glyphicon-edit"></span> Edit
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

//Want to - in action call
$('.wantto').click(function() {
var todo = $(this).val();

if(todo == 'Delete')
{
	var r = confirm("Are you sure you want remove airport pricing detail?");
    if (r != true) 
	{
	  	return false;
    }	
}
	
var price_id = $(this).attr('id');
$.ajax({
  url: BaseURL+'Calls/action_airportprice',
  data: {
    price_id: price_id,
    price_do:  todo
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
