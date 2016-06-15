 <div id="wrap">
 
  <?php echo $this->element('menu'); ?>
 
<!--PAGE CONTENT -->
        <div id="content">
		
		<div class="inner" style="padding: 40px; padding-top: 15px;">
		
		
		<div class="row">
									    <div class="col-lg-12">
										<h3 class="page-header">INTERCITY CAB BOOKING DETAILS (BOOK YOUR OWN LIFT)</h3>
									   </div>
								       </div>
									   
									   
		<div class="row">
<div class="col-md-10">											   
										   
		
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

<a href="<?php echo $this->webroot;?>intercity_details" class="btn btn-primary btn-sm" style="margin-bottom: 20px;">
                <i class="fa fa-car" style="font-size: 16px;padding-right: 5px;"></i> FIND THE LIFT - DETAILS
</a>

<table id="example" class="display compact" cellspacing="0" width="880px">
        <thead>
           
		   <tr>
              
			    <th>Customer name</th>
				<th>Customer number</th>
				
				<th>Pickup city</th>
                <th>Drop city</th>
				<th>Departure date</th>
                <th>Departure time</th>
				
            </tr>
			
        </thead>
        <tbody>
            
			<?php   $i = 1;
			        foreach($data as $key=>$value) { 
					
			?>
			
			<tr>
			  
                <td><?php echo $value['IntercityOwnCabOrder']['cname']; ?></td>
			    <td><?php echo $value['IntercityOwnCabOrder']['cnumber']; ?></td>
				<td><?php echo $value['IntercityOwnCabOrder']['pickup_city']; ?></td>
                <td><?php echo $value['IntercityOwnCabOrder']['drop_city']; ?></td>
				
                <td><?php echo $value['IntercityOwnCabOrder']['dep_date']; ?></td>
				<td><?php echo $value['IntercityOwnCabOrder']['dep_time']; ?></td>			
      
            </tr>
			
     
			<?php  $i++; }  ?>
			
        </tbody>
    </table>
	
</div>
	
		<div class="col-md-2">
	</div>
	
	</div>
		</div>
	</div>
	</div>
