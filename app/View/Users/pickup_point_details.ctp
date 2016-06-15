 <div id="wrap">
 
  <?php echo $this->element('menu'); ?>
 
<!--PAGE CONTENT -->
        <div id="content">
		
		<div class="inner" style="padding: 40px; padding-top: 15px;">
		
		
		<div class="row">
									    <div class="col-lg-12">
										<h3 class="page-header">PICKUP POINT DETAILS</h3>
									   </div>
								       </div>
									   

<div class="row">
<div class="col-md-6">									   
		
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

<a href="<?=$this->webroot ?>add_pickup_point" class="btn btn-primary btn-sm" style="margin-bottom: 20px;">
                <span class="glyphicon glyphicon-plus"></span> ADD PICKUP POINT
</a>

<table id="example" class="display compact" cellspacing="0">
        <thead>
            <tr>
              
			    <th>City</th>
			    <th>Pickup Point</th>
                <th>Action</th>
				  
            </tr>
        </thead>
        <tbody>
            
			<?php   $i = 1;
			        foreach($pickupPointDetails as $key=>$value) { 
		
			?>
			
			<tr>
			  
				<td><?php echo $value['PickupPoint']['city_name']; ?></td>
				<td> <i class="fa fa-map-pin"></i> <?php echo $value['PickupPoint']['pickup_point']; ?></td>
		        
				
				<td> 
				<button id="<?php echo $value['PickupPoint']['id']; ?>" class="btn btn-danger wantto btn-xs" value="Delete">
                <span class="glyphicon glyphicon-trash"></span> Delete
                </button>
				</td>
			
      
            </tr>
     
			<?php  $i++; }  ?>
			
        </tbody>
    </table>
	
	</div>

	<div class="col-md-6">
	</div>
	</div>
	
		</div>
	</div>
	</div>
	
	
	<script>		
$(document).ready(function(){
		
		$('.wantto').click(function() {
            var r = confirm("Are you sure you want remove this pickup point?");
			if (r != true) 
			{
				return false;
			}

		    var pick_id = $(this).attr('id');

				$.ajax({
				  url: BaseURL+'Calls/deletepickpoints',
				  data: {
					pick_id: pick_id 					
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
