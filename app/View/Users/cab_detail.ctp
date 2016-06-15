 <div id="wrap">
 
  <?php echo $this->element('menu'); ?>
 
<!--PAGE CONTENT -->
        <div id="content">
		
		<div class="inner" style="padding: 40px; padding-top: 15px;">
		
		
		<div class="row">
									    <div class="col-lg-12">
										<h3 class="page-header">CABS DETAILS</h3>
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

<a href="<?=$this->webroot ?>add_cab" class="btn btn-primary btn-sm" style="margin-bottom: 20px;">
                <span class="glyphicon glyphicon-plus"></span> ADD CAB
</a>

<table id="example" class="display compact" cellspacing="0" width="1720px">
        <thead>
             <tr style="background: rgba(128, 128, 128, 0.15);">
                <th colspan="6">CAB</th>
			   
				<th colspan="2" style="border-left: 1px solid white;border-right: 1px solid white;">REGISTRATION</th>
				
				<th style="border-right: 1px solid white;">STATUS</th>
				<th colspan="3" style="border-right: 1px solid white;">ACTION</th>
				
				<th colspan="3"> CERTIFICATES </th>
			
            </tr>
			
			<tr>
               
			    <th>Photo</th>
                <th>Type</th>
                <th>Name</th>
                <th>Model no.</th>
                <th>Color</th>
                <th>Seats</th>
				<th>Number</th>
				<th>state</th>
				<th>Status</th>
				<th>Active</th>
				<th>Suspend</th>
				<th>Delete</th>
				<th>Registration</th>
				<th>Insurance</th>
                <th>Emission</th>
				
            </tr>
        </thead>
        <tbody>
            
			<?php   $i = 1;
			        foreach($cabinfo as $key=>$value) { 
			        $reg_cr = $value['InfoVehicle']['reg_cr'];
					$em_cr = $value['InfoVehicle']['em_cr'];
					$vehimg = $value['InfoVehicle']['vehimg'];
					$insurace_cr = $value['InfoVehicle']['insurace_cr'];
					$reg_cr = $this->webroot.'files/cab/'.$reg_cr;
					$em_cr = $this->webroot.'files/cab/'.$em_cr;
					$vehimg = $this->webroot.'files/cab/'.$vehimg;
					$insurace_cr = $this->webroot.'files/cab/'.$insurace_cr;
			?>
			
			<tr>
			   
                <td><img style="width: 42px;height: 42px;border-radius: 20px;" src="<?php echo $vehimg; ?>" alt="vehimg" /></td>
				<td><?php echo $value['InfoVehicle']['veh_type']; ?></td>
				<td><?php echo $value['InfoVehicle']['veh_name']; ?></td>
				<td><?php echo $value['InfoVehicle']['veh_model']; ?></td>
				<td><?php echo $value['InfoVehicle']['veh_color']; ?></td>
				<td><?php echo $value['InfoVehicle']['seats']; ?></td>
				<td> <i class="fa fa-car"></i> <?php echo $value['InfoVehicle']['veh_number']; ?></td>
				<td><?php echo $value['InfoVehicle']['state_veh']; ?></td>
				
		
				<td><?php $action = $value['InfoVehicle']['action']; ?> 
				<?php if($action == 'Active')  {  ?>
				<span class="label label-success"><?php echo $action ?></span></td>
				<?php } else { ?>
				<span class="label label-danger"><?php echo $action ?></span>
				<?php } ?>
				</td>
				
				
				<td>
				
				<a href="#" class="btn btn-primary btn-xs wantto" id="Active_<?php echo $value['InfoVehicle']['id']; ?>" >
                <i class="fa fa-car"></i> Active
                </a>
				</td>
				
				<td>
			    <a href="#" class="btn btn-warning wantto btn-xs" id="Suspended_<?php echo $value['InfoVehicle']['id']; ?>" >
                <i class="fa fa-car"></i></span> Suspend
                </a>
				</td>
				
				 <td>
				 <a href="#" class="btn btn-danger wantto btn-xs" id="Delete_<?php echo $value['InfoVehicle']['id']; ?>" >
                <span class="glyphicon glyphicon-trash"></span> Delete
                </a>
				</td>

                				<td>
				<a href="<?php echo $reg_cr; ?>" class="btn btn-warning btn-xs" target="_blank" >
                <span class="glyphicon glyphicon-eye-open"></span> view file
                </a>
				</td>
				
				<td>
				<a href="<?php echo $insurace_cr; ?>" class="btn btn-warning btn-xs" target="_blank">
                <span class="glyphicon glyphicon-eye-open"></span> view file
                </a>
				</td>
				
				<td>
				<a href="<?php echo $em_cr; ?>" class="btn btn-warning btn-xs" target="_blank" >
                <span class="glyphicon glyphicon-eye-open"></span> view file
                </a>
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

//Want to - in action call
$('.wantto').click(function() {
var str = $(this).attr('id');
var res = str.split("_");
var todo = res[0];	
var cab_id = res[1];	

if(todo == 'Delete')
{
	var r = confirm("Are you sure to remove this cab?");
    if (r != true) 
	{
	  	return false;
    }	
}
	
$.ajax({
  url: BaseURL+'Calls/action_cabs',
  data: {
    cab_id: cab_id,
    cab_do:  todo
	},
    type: 'POST',
    success: function( data ) {
       alert(data);
	   location.reload();	

    }
});
});	

});	
	
</script>	
