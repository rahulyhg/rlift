 <div id="wrap">
 
  <?php echo $this->element('menu'); ?>
 
<!--PAGE CONTENT -->
        <div id="content">
		
		<div class="inner" style="padding: 40px; padding-top: 15px;">
		
		
		<div class="row">
									    <div class="col-lg-12">
										<h3 class="page-header">CABS PRICING DETAILS</h3>
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
th, td {
    text-align: center !important;
   }	
		
	
</style>
<a href="<?=$this->webroot ?>cab_pricing" class="btn btn-primary btn-sm" style="margin-bottom: 20px;">
                <span class="glyphicon glyphicon-plus"></span> ADD PRICING
</a>
<table id="example" class="display compact" cellspacing="0" width="880px">
        <thead>
            <tr>
              
			    <th>Cab Type</th>
			    <th>City</th>
                <th>Per Km</th>
                <th>Travel charge</th>
                <th>Service charge</th>
                <th>Trip time</th>
                <th>Action</th>
				<th>Edit</th>    
            </tr>
        </thead>
        <tbody>
            
			<?php   $i = 1;
			        foreach($price as $key=>$value) { 
		
			?>
			
			<tr>
			  
				<td><?php echo $value['Price']['cab_type']; ?></td>
				<td><?php echo $value['Price']['city']; ?></td>
				<td><?php echo $value['Price']['km']; ?></td>
				<td>Rs. <?php echo $value['Price']['travel_charge']; ?></td>
				<td>Rs. <?php echo $value['Price']['service_charge']; ?></td>
				<td>Rs. <?php echo $value['Price']['waiting_charge']; ?>/min</td>
				<td> 
				
				<button id="<?php echo $value['Price']['id']; ?>" class="btn btn-danger wantto btn-xs" value="Delete">
                <span class="glyphicon glyphicon-trash"></span> Delete
                </button>
				</td>
				
				<td> <a href="#" class="btn btn-info btn-xs">
                <span class="glyphicon glyphicon-edit"></span> Edit
                </a></td>
      
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
	
<script>		
$(document).ready(function(){

//Want to - in action call
$('.wantto').click(function() {
var todo = $(this).val();
if(todo == 'Delete')
{
	var r = confirm("Are you sure you want remove pricing detail?");
    if (r != true) 
	{
	  	return false;
    }	
}
	
var price_id = $(this).attr('id');
$.ajax({
  url: BaseURL+'Calls/action_price',
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
