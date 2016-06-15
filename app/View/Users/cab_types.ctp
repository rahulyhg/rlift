 <div id="wrap">
 
  <?php echo $this->element('menu'); ?>
 
<!--PAGE CONTENT -->
        <div id="content">
		
		<div class="inner" style="padding: 40px; padding-top: 15px;">
		
		
		<div class="row">
									    <div class="col-lg-12">
										<h3 class="page-header">CAB TYPES</h3>
									   </div>
								       </div>
									   
	<div class="row">
<div class="col-md-5">								   
		
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

<a href="<?=$this->webroot ?>cab_type" class="btn btn-primary btn-sm" style="margin-bottom: 20px;">
                <span class="glyphicon glyphicon-plus"></span> ADD TYPE
</a>

<table id="example" class="display compact" cellspacing="0" >
        <thead>
            <tr>
			    <th>Sr. No.</th>
                <th>Cab Type</th>
				<th>Action</th>
				
            </tr>
        </thead>
        <tbody>
            
			<?php
            $i = 1;
			foreach($cabs as $key=>$value) {  ?>
			
			<tr>
			    <td><?php echo $i; ?></td>
                <td> <i class="fa fa-car"></i> <?php echo $value['VehicleName']['name']; ?></td>
				
				
			    <td> 
				<button id="<?php echo $value['VehicleName']['id']; ?>" class="btn btn-danger wantto btn-xs" value="Delete">
                <span class="glyphicon glyphicon-trash"></span> Delete
                </button>
				</td>

            </tr>
     
			<?php $i++; }  ?>
			
        </tbody>
    </table>
	
	</div>
	
	
	
	<div class="col-md-7">
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
		var r = confirm("Are you sure to remove this cab type?");
		if (r != true) 
		{
			return false;
		}	
	}
		
	var cabtype_id = $(this).attr('id');
	$.ajax({
		  url: BaseURL+'Calls/action_cabtype',
		  data: {
			cabtype_id: cabtype_id,
			cabtype_do:  todo
			},
			type: 'POST',
			success: function( data ) {
				if(data == 'success')
				{
				   location.reload();	
				}
			}
	});

});	

});	
	
</script>