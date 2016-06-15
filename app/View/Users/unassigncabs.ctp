 <div id="wrap">
 
  <?php echo $this->element('menu'); ?>
 
<!--PAGE CONTENT -->
        <div id="content">
		
		<div class="inner" style="padding: 40px; padding-top: 15px;">
		
		
		<div class="row">
									    <div class="col-lg-12">
										<h3 class="page-header">UNASSIGNED CABS DETAILS</h3>
										
									   </div>
								       </div>
									   
		<div class="row">
	
<div class="col-md-7">										   
		
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

<a href="<?php echo $this->webroot;?>assign_cabs" class="btn btn-primary btn-sm" style="margin-bottom: 20px;">
                <i class="fa fa-car" style="font-size: 16px;padding-right: 5px;"></i> ASSIGN CAB
</a>


<table id="example" class="display compact" cellspacing="0" width="600px">
        <thead>
            <tr>
              
                <th>Cab photo</th>
				<th>Cab name</th>
				<th>Cab color</th>
                <th>Cab number</th>
                <th>Cab type</th>
                <th>Status</th> 
            </tr>
        </thead>
        <tbody>
            
			<?php    $i = 1;
			         foreach($data as $key=>$value) { 
					 $cab_photo = $value['InfoVehicle']['vehimg'];
		             $cab_photo = $this->webroot.'files/cab/'.$cab_photo;
			?>
			
			<tr>
			  
				<td><img style="width: 36px;height: 36px;border-radius: 20px;" src="<?php echo $cab_photo; ?>" alt="cab_photo" /></td>
				<td><?php echo $value['InfoVehicle']['veh_name']; ?></td>
                <td><?php echo $value['InfoVehicle']['veh_color']; ?></td>
				<td><?php echo $value['InfoVehicle']['veh_number']; ?></td>
				<td><?php echo $value['InfoVehicle']['veh_type']; ?></td>
                <td style="color: red; font-size: 14px;font-family: cursive;font-weight: bold;"><?php echo $value['InfoVehicle']['Isassigned']; ?></td>

            </tr>
     
			<?php  $i++; }  ?>
			
        </tbody>
    </table>
	
	</div>
	
		<div class="col-md-5">
	    </div>
	
		</div>
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
