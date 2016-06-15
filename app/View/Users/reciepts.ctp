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
										
										 RIDE RECEIPTS DETAILS</h3>
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
                
				<th style="border-right: 1px solid white;">RIDE</th>
				
				<?php 
				if(!isset($driver)) { ?>
				<th style="border-right: 1px solid white;">DRIVER</th>
                <?php } ?>
                
				<?php 
				if(!isset($customer)) { ?>
				<th style="border-right: 1px solid white;">CUSTOMER</th>
                <?php } ?>
				
			   
				<th style="border-right: 1px solid white;" colspan="2">LIFT</th>
				<th style="border-right: 1px solid white;" colspan="2">TRIP DISATNCE</th>
				<th style="border-right: 1px solid white;" colspan="2">TRIP TIME</th>
				<th style="border-right: 1px solid white;" colspan="2">SERVICE</th>
				<th style="border-right: 1px solid white;">OFFER</th>
				<th>TOTAL</th>

            </tr>
			
			<tr>
                <th>Id</th>
				
				<?php 
				if(!isset($driver)) { ?>
				<th>name</th>
                <?php } ?>
                
				<?php 
				if(!isset($customer)) { ?>
				<th>name</th>
                <?php } ?>
				
				<th>From</th>
                <th>To</th>
				
				<th>Distance</th>
			    <th>Charge</th>
				     
                <th>Time</th>
				<th>Charge</th>
				
				<th>Tax</th>
			    <th>Charge</th>
				
				<th>Offer</th>
				<th>Cost</th>
				
            </tr>
			
        </thead>
       

	   <tbody>
            
		<?php   $i = 1;
			        foreach($reciepts as $key=>$value) { 
		
			?>
			
			<tr>
			  
				<td><?php echo $value['CustomerReciept']['ride_id']; ?></td>
				
				<?php
				if(!isset($driver)) { ?>
				<td><?php echo $value['CustomerReciept']['driver_name']; ?></td>
				<?php } ?>

				
				<?php
				if(!isset($customer)) { ?>
				<td><?php echo $value['CustomerReciept']['customer_name']; ?></td>
				<?php } ?>

				<td><?php echo $value['CustomerReciept']['from_place']; ?></td>
				<td><?php echo $value['CustomerReciept']['to_place']; ?></td>
				
				<td><?php echo $value['CustomerReciept']['trip_distance']; ?></td>
				<td>Rs. <?php echo $value['CustomerReciept']['trip_distance_price']; ?></td>
				
				
				<td><?php echo $value['CustomerReciept']['travel_time']; ?></td>
				<td>Rs. <?php echo $value['CustomerReciept']['travel_time_price']; ?></td>
								
				<td>Rs. <?php echo $value['CustomerReciept']['service_tax']; ?></td>
				<td>Rs. <?php echo $value['CustomerReciept']['service_charge']; ?></td>
				
				<td>
				<?php 
				 $pamt = $value['CustomerReciept']['promo_amount'];
				 if($pamt == 'false') { echo 'No'; } else { 
			     echo $value['CustomerReciept']['promo_amount'].'%'; 
				} ?>
				</td>
				
				<td>Rs. <?php echo $value['CustomerReciept']['total_price']; ?></td>

            </tr>
     
			<?php  $i++; }  ?>
			
        </tbody>
		
    </table>
	
	</div>
	
	</div>
	
		</div>
	
	
	
