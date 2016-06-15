 <div id="wrap">
 
  <?php echo $this->element('menu'); ?>
 
<!--PAGE CONTENT -->
        <div id="content">
		
		<div class="inner" style="padding: 40px; padding-top: 15px;">
		
		
		<div class="row">
									    <div class="col-lg-12">
										<h3 class="page-header">INTERCITY CAB BOOKING DETAILS (FIND THE LIFT)</h3>
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
	
</style>

<a href="<?php echo $this->webroot;?>owncab_details" class="btn btn-primary btn-sm" style="margin-bottom: 20px;">
                <i class="fa fa-car" style="font-size: 16px;padding-right: 5px;"></i> BOOK YOUR OWN LIFT - DETAILS
</a>

<table id="example" class="display compact" cellspacing="0" width="1450px">
        <thead>
           
		   <tr>
              
			    <th>Customer name</th>
				<th>Customer number</th>
				<th>Route number</th>
				<th>Pickup city</th>
                <th>Drop city</th>
				<th>Pickup point</th>
				<th>Departure date</th>
                <th>Departure time</th>
                <th>Seats</th>
                <th>Cost</th>
                <th>Payment mode</th> 
				<th>Action</th> 
				
            </tr>
			
        </thead>
        <tbody>
            
			<?php   $i = 1;
			        foreach($data as $key=>$value) { 
					
			?>
			
			<tr>
			  
                <td><?php echo $value['Customer']['name']; ?></td>
			    <td><?php echo $value['Customer']['phone_no']; ?></td>
				<td><?php echo $value['AssignVehicleToDriver']['routeid']; ?></td>
				<td><?php echo $value['AssignVehicleToDriver']['pickup_city']; ?></td>
                <td><?php echo $value['AssignVehicleToDriver']['drop_city']; ?></td>
				<td><?php echo $value['IntercityFindCabOrders']['pickup_point']; ?></td>
                <td><?php echo $value['AssignVehicleToDriver']['dep_date']; ?></td>
				<td><?php echo $value['AssignVehicleToDriver']['dep_time']; ?></td>
				<td><?php echo $value['IntercityFindCabOrders']['no_of_seats']; ?></td>
                <td>Rs. <?php echo $value['AssignVehicleToDriver']['price']; ?></td>	
                <td><?php echo $value['IntercityFindCabOrders']['payment_type']; ?></td>	
				
                <td> 
				<button id="<?php echo $value['IntercityFindCabOrders']['id']; ?>" class="btn btn-danger btn-xs wantto" value="Delete">
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
            var r = confirm("Are you sure you want remove this order?");
			if (r != true) 
			{
				return false;
			}

		    var order_id = $(this).attr('id');

				$.ajax({
				  url: BaseURL+'Calls/deleteorder',
				  data: {
					order_id: order_id 					
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
