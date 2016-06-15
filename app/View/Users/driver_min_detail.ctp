 <div id="wrap">
 
  <?php echo $this->element('menu'); ?>
 
<!--PAGE CONTENT -->
        <div id="content">
		
		<div class="inner" style="padding: 40px; padding-top: 15px;">
		
		
		<div class="row">
									    <div class="col-lg-12">
										<h3 class="page-header">DRIVERS OVERVIEW</h3>
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

<a href="<?=$this->webroot ?>add_driver" class="btn btn-primary btn-sm" style="margin-bottom: 20px;">
                <span class="glyphicon glyphicon-plus"></span> ADD DRIVER
</a>

<table id="example" class="display" cellspacing="0" width="1800px">
        <thead>
            <tr>
			    <th>Photo</th>
				<th>Driver Id</th>
                <th>Name</th>
                <th>Phone no.</th>
                <th>Licence number</th>
				<th style="width: 60px;">Cab allocated</th>
				<th style="width: 60px;">Is verified</th>
				<th>Status</th>
				<th style="width: 150px;">Rides</th>
				<th>Receipts</th>
				<th>Trips</th>
				<th style="width: 210px;">Action</th>
				
				
				
            </tr>
        </thead>
        <tbody>
            
			<?php
            $i = 1;
			foreach($drivers as $key=>$value) {  
			$driver_photo = $value['Driver']['driver_photo'];
			$driver_photo = $this->webroot.'files/driver/'.$driver_photo;
			$havecab = $value['Driver']['Isallocated'];
			?>
			
			<tr>
			   
				<td><img style="width: 36px;height: 36px;border-radius: 20px;" src="<?php echo $driver_photo; ?>" alt="driver_photo" /></td>
				<td><?php echo $value['Driver']['driverid']; ?></td>
                <td><?php echo $value['Driver']['fname']; ?> <?php echo $value['Driver']['lname']; ?></td>
				<td class="mnumber"><i class="fa fa-phone-square"></i> <?php echo $value['Driver']['phone']; ?></td>
		        <td><?php echo $value['Driver']['driving_no']; ?></td>
				<td><?php if($havecab == 'allocated') { echo '<p style="font-family: cursive;font-weight: bold;color: green;">Yes</p>'; } else { echo '<p style="font-family: cursive;font-weight: bold;color: rgb(255, 96, 0);">No</p>'; }?></td>
				
			    <td>
				
				      <div class="example">

					 <div style="float:left;">
					  <input class="verifyme" id="<?php echo $value['Driver']['id']; ?>_verify" type="checkbox" name="<?php echo $value['Driver']['id']; ?>_verify" value="yes" <?php  if($value['Driver']['isverified'] == 'yes') {  echo "checked='checked'"; } ?> ><label for="<?php echo $value['Driver']['id']; ?>_verify"><span></span>yes</label>
					  </div>
					  
					  <div>
						<input class="verifyme" id="<?php echo $value['Driver']['id']; ?>_verify" type="checkbox" name="<?php echo $value['Driver']['id']; ?>_verify" value="no" <?php  if($value['Driver']['isverified'] == 'no') {  echo "checked='checked'"; } ?>><label for="<?php echo $value['Driver']['id']; ?>_verify"><span></span>no</label>
					  </div>

				<select class="verifyme" id="<?php echo $value['Driver']['id']; ?>" style="display:none;">
				  <option value="yes" <?php  if($value['Driver']['isverified'] == 'yes') {  echo "selected"; } ?>>yes</option>
				  <option value="no" <?php  if($value['Driver']['isverified'] == 'no') {  echo "selected"; } ?>>no</option>
				</select> 
			   </td>
				
				<td><?php $action = $value['Driver']['action']; ?> 
				<?php if($action == 'Active')  {  ?>
				<span class="label label-success"><?php echo $action ?></span></td>
				<?php } else { ?>
				<span class="label label-danger"><?php echo $action ?></span>
				<?php } ?>
				</td>
				
				 <td>
				 
				 <a href="<?=$this->webroot ?>rides/driver/<?php echo $value['Driver']['id']; ?>" class="btn btn-primary btn-xs">
                <i class="fa fa-car" style="padding-right: 2px;"></i> Rides
                </a>
				
				 <a href="<?=$this->webroot ?>cancelrides/driver/<?php echo $value['Driver']['id']; ?>" class="btn btn-danger btn-xs">
                <i class="fa fa-car" style="padding-right: 2px;"></i> Cancel Rides
                </a>
				
				</td>
				
				 <td>
				 
				 <a href="<?=$this->webroot ?>receipts/driver/<?php echo $value['Driver']['id']; ?>" class="btn btn-primary btn-xs">
                <i class="fa fa-car" style="padding-right: 2px;"></i> Receipts
                </a>

				</td>
				
				 <td>
				
				 <a href="<?=$this->webroot ?>canceltrips/driver/<?php echo $value['Driver']['id']; ?>" class="btn btn-danger btn-xs">
                <i class="fa fa-car" style="padding-right: 2px;"></i> Cancel Trips
                </a>
				
				</td>
				
				
				<td> 
				<a href="#" class="btn btn-primary wantto btn-xs" id="Active_<?php echo $value['Driver']['id']; ?>">
                <span class="glyphicon glyphicon-user"></span> Active
                </a>
				
				 <a href="#" class="btn btn-warning wantto btn-xs" id="Blocked_<?php echo $value['Driver']['id']; ?>">
                <span class="glyphicon glyphicon-user"></span> Block
                </a>
				
				 <a href="#" class="btn btn-danger wantto btn-xs" id="Delete_<?php echo $value['Driver']['id']; ?>">
                <span class="glyphicon glyphicon-trash"></span> Delete
                </a>
				
				<!--  <a href="#" class="btn btn-info btn-xs">
                <span class="glyphicon glyphicon-edit"></span> Edit
                </a> -->
				
				</td>
				

				
				
              
            </tr>
     
			<?php $i++; }  ?>
			
        </tbody>
    </table>
	
	</div>
	
	</div>
	
		</div>

<script>		
$(document).ready(function(){

//change verification status
$('.verifyme').change(function() {
var todo = $(this).val();
var str = $(this).attr('id');
var res = str.split("_");
var driver_id = res[0];	
$.ajax({
  url: BaseURL+'Calls/verify_driver',
  data: {
    driver_id: driver_id,
    driver_do:  todo
	},
    type: 'POST',
    success: function( data ) {
     alert(data);
    }
});
});	

//Want to - in action call
$('.wantto').click(function() {
	
var str = $(this).attr('id');
var res = str.split("_");
var todo = res[0];	
var driver_id = res[1];	

if(todo == 'Delete')
{
	var r = confirm("Are you sure to remove this driver?");
    if (r != true) 
	{
	  	return false;
    }	
}
	
$.ajax({
  url: BaseURL+'Calls/action_driver',
  data: {
    driver_id: driver_id,
    driver_do:  todo
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

 <script>
 $(':checkbox').on('change',function(){
 var th = $(this), name = th.prop('name'); 
 if(th.is(':checked')){
     $(':checkbox[name="'  + name + '"]').not($(this)).prop('checked',false);   
  }
});
 </script>

<style>

input[type=checkbox]:not(old),
input[type=radio   ]:not(old){
  width     : 2em;
  margin    : 0;
  padding   : 0;
  font-size : 1em;
  opacity   : 0;
  cursor: pointer;
}

input[type=checkbox]:not(old) + label,
input[type=radio   ]:not(old) + label{
  display      : inline-block;
  margin-left  : -2em;
  line-height  : 1.5em;
  cursor: pointer;
}

input[type=checkbox]:not(old) + label > span,
input[type=radio   ]:not(old) + label > span{
  display          : inline-block;
  width            : 14px;
  height           : 13px;
  margin           : 0.25em 0.5em 0.25em 0.25em;
  border           : 0.0625em solid rgb(192,192,192);
  border-radius    : 0.25em;
  background       : rgb(224,224,224);
  background-image :    -moz-linear-gradient(rgb(240,240,240),rgb(224,224,224));
  background-image :     -ms-linear-gradient(rgb(240,240,240),rgb(224,224,224));
  background-image :      -o-linear-gradient(rgb(240,240,240),rgb(224,224,224));
  background-image : -webkit-linear-gradient(rgb(240,240,240),rgb(224,224,224));
  background-image :         linear-gradient(rgb(240,240,240),rgb(224,224,224));
  vertical-align   : bottom;
}

input[type=checkbox]:not(old):checked + label > span,
input[type=radio   ]:not(old):checked + label > span{
  background-image :    -moz-linear-gradient(rgb(224,224,224),rgb(240,240,240));
  background-image :     -ms-linear-gradient(rgb(224,224,224),rgb(240,240,240));
  background-image :      -o-linear-gradient(rgb(224,224,224),rgb(240,240,240));
  background-image : -webkit-linear-gradient(rgb(224,224,224),rgb(240,240,240));
  background-image :         linear-gradient(rgb(224,224,224),rgb(240,240,240));
}

input[type=checkbox]:not(old):checked + label > span:before{
  content     : '✓';
  display     : block;
  width       : 1em;
  color       : green;
  font-size   : 12px;
  line-height : 1em;
  text-align  : center;
  text-shadow : 0 0 0.0714em rgb(115,153,77);
  font-weight : bold;
}

input[type=radio]:not(old):checked +  label > span > span{
  display          : block;
  width            : 14px;
  height           : 13px;
  margin           : 2px;
  border           : 0.0625em solid rgb(115,153,77);
  border-radius    : 0.125em;
  background       : green;
 /*  background-image :    -moz-linear-gradient(rgb(179,217,140),rgb(153,204,102));
  background-image :     -ms-linear-gradient(rgb(179,217,140),rgb(153,204,102));
  background-image :      -o-linear-gradient(rgb(179,217,140),rgb(153,204,102));
  background-image : -webkit-linear-gradient(rgb(179,217,140),rgb(153,204,102));
  background-image :         linear-gradient(rgb(179,217,140),rgb(153,204,102)); */
}

</style>