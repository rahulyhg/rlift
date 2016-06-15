 <div id="wrap">
 
  <?php echo $this->element('menu'); ?>
 
<!--PAGE CONTENT -->
        <div id="content">
		
		<div class="inner" style="padding: 40px; padding-top: 15px;">
		
		
		<div class="row">
									    <div class="col-lg-12">
										<h3 class="page-header" style="text-transform: uppercase;">
										
										<?php 
										
										if(isset($driver)) { 
										echo $driver;
										} 
										
										if(isset($customer)) { 
										echo $customer;
										}
										
										?>
										
										 RIDES DETAILS</h3>
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

<table id="example" class="display compact" cellspacing="0" width="1650px">
        <thead>
            
			 <tr style="background: rgba(128, 128, 128, 0.15);">
                <th 
				<?php 
										
										if(isset($driver)) { 
										echo 'colspan="3"';
										} 
										elseif(isset($customer)) { 
										echo 'colspan="3"';
										}
										else
										{
											echo 'colspan="4"';
										}	
										
				?>
				>RIDE</th>
			   
				<th colspan="2" style="border-left: 1px solid white;border-right: 1px solid white;">PLACE</th>
				
				<th colspan="7" style="border-right: 1px solid white;">TRAVEL</th>

            </tr>
			
			<tr>
                <th>Ride Id</th>
				
				<?php 
				if(!isset($driver)) { ?>
				<th>Driver name</th>
                <?php } ?>

				<th>Vehicle type</th>
                
				<?php 
				if(!isset($customer)) { ?>
				<th>Customer name</th>
                <?php } ?>
				
				<th>From</th>
                <th>To</th>
				
				<th>Distance</th>
			    <th>Cost</th>
                <th>Charge</th>
                <th>Trip time</th>
				<th>Date</th>
			    <th>Start time</th>
                <th>End time</th>
            </tr>
        </thead>
       

	   <tbody>
            
		<?php   $i = 1;
			        foreach($rides as $key=>$value) { 
		
			?>
			
			<tr>
			  
				<td><?php echo $value['Ride']['rideid']; ?></td>
				
				<?php
				if(!isset($driver)) { ?>
				<td><?php echo $value['Ride']['driver_name']; ?></td>
				<?php } ?>
				
				<td><?php echo $value['Ride']['veh_type']; ?></td>
				
				<?php
				if(!isset($customer)) { ?>
				<td><?php echo $value['Ride']['customer_name']; ?></td>
				<?php } ?>

				<td><?php echo $value['Ride']['from_place']; ?></td>
				<td><?php echo $value['Ride']['to_place']; ?></td>
				
				<td><?php echo $value['Ride']['travel_distance']; ?> km</td>
				<td>Rs. <?php echo $value['Ride']['travel_cost']; ?></td>
				<td>Rs. <?php echo $value['Ride']['service_charge']; ?></td>
				<td><?php echo $value['Ride']['trip_time']; ?>/min</td>
								
				<td><?php echo $value['Ride']['travel_date']; ?></td>
				<td><?php echo $value['Ride']['start_time']; ?></td>
				<td><?php echo $value['Ride']['end_time']; ?></td>

            </tr>
     
			<?php  $i++; }  ?>
			
        </tbody>
		
    </table>
	
	</div>
	
	</div>
	
		</div>
	
	
	
