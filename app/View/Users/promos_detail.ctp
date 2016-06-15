 <div id="wrap">
 
  <?php echo $this->element('menu'); ?>
 
<!--PAGE CONTENT -->
        <div id="content">
		
		<div class="inner" style="padding: 40px; padding-top: 15px;">
		
		
		<div class="row">
									    <div class="col-lg-12">
										<h3 class="page-header">PROMOTIONS COUPON DETAILS</h3>
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
th, td {
    text-align: center !important;
   }		
	
</style>

<a href="<?=$this->webroot ?>create_promos" class="btn btn-primary btn-sm" style="margin-bottom: 20px;">
                <span class="glyphicon glyphicon-plus"></span> CREATE
</a>

<table id="example" class="display compact" cellspacing="0" width="1050px">
        <thead>
            <tr>
              
			    <th>Promo code</th>
			    <th>Amount</th>
                <th>Occasion</th>
                <th>From Date</th>
                <th>To Date</th>
                <th>IsActive</th>
                <th>Action</th>
				  				
            </tr>
        </thead>
        <tbody>
            
			<?php   $i = 1;
			        foreach($promos as $key=>$value) { 
		
			?>
			
			<tr>
			  
				<td><?php echo $value['PromoCode']['promo_code']; ?></td>
				<td><?php echo $value['PromoCode']['amount']; ?>%</td>
				<td> <i class="fa fa-gift"></i> <?php echo $value['PromoCode']['promo_type']; ?></td>
				<td><?php echo $value['PromoCode']['from_time']; ?></td>
				<td><?php echo $value['PromoCode']['to_time']; ?></td>
				
			    <td><?php $action = $value['PromoCode']['isactive']; ?> 
				<?php if($action == 'yes')  {  ?>
				<span class="label label-success"><?php echo $action ?></span></td>
				<?php } else { ?>
				<span class="label label-danger"><?php echo $action ?></span>
				<?php } ?>
				</td>
				

				<td>
			    <a href="#" class="btn btn-primary wantto btn-xs" id="yes_<?php echo $value['PromoCode']['id']; ?>">
                <i class="fa fa-gift"></i> Active
                </a>
				
			    <a href="#" class="btn btn-warning wantto btn-xs" id="no_<?php echo $value['PromoCode']['id']; ?>">
                <i class="fa fa-gift"></i> Deactive
                </a>
				
				<!-- <a href="#" class="btn btn-danger wantto btn-xs" id="Delete_<?php echo $value['PromoCode']['id']; ?>">
                <span class="glyphicon glyphicon-trash"></span> Delete
                </a> -->
				
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
var promos_id = res[1];	

if(todo == 'Delete')
{
	var r = confirm("Are you sure you want remove this promocode?");
    if (r != true) 
	{
	  	return false;
    }	
}
	

$.ajax({
    url: BaseURL+'Calls/action_promos',
    data: {
    promos_id: promos_id,
    promos_do:  todo
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
