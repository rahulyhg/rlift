 <div id="wrap">
 
  <?php echo $this->element('menu'); ?>
 
<!--PAGE CONTENT -->
        <div id="content">
		
		<div class="inner" style="padding: 40px; padding-top: 15px;">
		
		
		<div class="row">
									    <div class="col-lg-12">
										<h3 class="page-header">ASSIGNED CABS DETAILS</h3>
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

<a href="<?php echo $this->webroot;?>assign_cabs" class="btn btn-primary btn-sm" style="margin-bottom: 20px;">
                <i class="fa fa-car" style="font-size: 16px;padding-right: 5px;"></i> ASSIGN CAB
</a>


<table id="example" class="display compact" cellspacing="0" width="1050px">
        <thead>
            <tr>
              
			    <th>Driver photo</th>
				<th>Driver name</th>
				<th>Driver phone no.</th>
				<th>Driver licence no.</th>
                <th>Cab name</th>
				<th>Cab color</th>
                <th>Cab number</th>
                <th>Cab type</th>
                <th>Status</th> 
            </tr>
        </thead>
        <tbody>
            
			<?php   $i = 1;
			        foreach($data as $key=>$value) { 
					$driver_photo = $value['Driver']['driver_photo'];
					$driver_photo = $this->webroot.'files/driver/'.$driver_photo;
		
			?>
			
			<tr>
			  
				<td><img style="width: 36px;height: 36px;border-radius: 20px;" src="<?php echo $driver_photo; ?>" alt="driver_photo" /></td>
				<td><?php echo $value['Driver']['fname']; ?> <?php echo $value['Driver']['lname']; ?></td>
                <td><?php echo $value['Driver']['driving_no']; ?></td>
			    <td><?php echo $value['Driver']['phone']; ?></td>
				<td><?php echo $value['InfoVehicle']['veh_name']; ?></td>
                <td><?php echo $value['InfoVehicle']['veh_color']; ?></td>
				<td><?php echo $value['InfoVehicle']['veh_number']; ?></td>
				<td><?php echo $value['InfoVehicle']['veh_type']; ?></td>
                <td style="color: green;font-size: 14px;font-family: cursive;font-weight: bold;"><?php echo $value['InfoVehicle']['Isassigned']; ?></td>
		        
			
      
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
