 <div id="wrap">
 
  <?php echo $this->element('menu'); ?>
 
<!--PAGE CONTENT -->
        <div id="content">
		
		<div class="inner" style="padding: 40px; padding-top: 15px;">
		
		
		<div class="row">
						<div class="col-lg-12">
						<h3 class="page-header">AIRPORT PRICING DETAILS</h3>
						 </div>
						 </div>
	

<div class="row">
<div class="col-md-8">


	
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

<a href="<?=$this->webroot ?>airport_pricing" class="btn btn-primary btn-sm" style="margin-bottom: 20px;">
                <span class="glyphicon glyphicon-plus"></span> ADD PRICING
</a>

<table id="example" class="display compact" cellspacing="0" width="695px">
        <thead>
            <tr>
                <th style="width:55px;">Sr. No.</th>
			    <th>Cab Type</th>
			    <th>City</th>
                <th>Cost</th>
                <th>Action</th>
	
            </tr>
        </thead>
        <tbody>
            
			<?php   $i = 1;
			        foreach($price as $key=>$value) { 
		
			?>
			
			<tr>
			    <td><?php echo $i;  ?></td>
				<td><?php echo $value['AirportPrice']['cab_type']; ?></td>
				<td> <i class="fa fa-map-o"></i> <?php echo $value['AirportPrice']['city']; ?></td>
		         <td>Rs. <?php echo $value['AirportPrice']['cost']; ?></td>
				
				<td> 
				<button id="<?php echo $value['AirportPrice']['id']; ?>" class="btn btn-danger wantto btn-xs" value="Delete">
                <span class="glyphicon glyphicon-trash"></span> Delete
                </button>
				</td>
            </tr>
     
			<?php  $i++; }  ?>
			
        </tbody>
    </table>
	
	</div>

	<div class="col-md-4">
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
