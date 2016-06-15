 <div id="wrap">
 
  <?php echo $this->element('menu'); ?>
 
<!--PAGE CONTENT -->
        <div id="content">
		
		<div class="inner" style="padding: 40px; padding-top: 15px;">
		
		
		<div class="row">
									    <div class="col-lg-12">
										<h3 class="page-header">Customers Details</h3>
									   </div>
								       </div>
									   
			<div class="row">
<div class="col-md-12">											   
															   
		
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


<table id="example" class="display" cellspacing="0" width="1150px">
        <thead>
            <tr>
			    <th>Name</th>
                <th>Email</th>
                <th>Phone no.</th>
                <th>Emr. no._1</th>
                <th>Emr. no._2</th>
				<th style="width: 250px;">Rides</th>
				<th>Receipts</th>
				<th>Action</th>

				
            </tr>
        </thead>
        <tbody>
            
			<?php
            $i = 1;
			foreach($customers as $key=>$value) {  
			?>
			
			<tr>
			   
				
                <td><?php echo $value['Customer']['name']; ?></td>
				<td> <i class="fa fa-envelope-o"></i> <?php echo $value['Customer']['email']; ?></td>
				<td class="mnumber">
				<i class="fa fa-phone-square"></i>
				<?php echo $value['Customer']['phone_no']; ?></td>				
				<td>
				
				<?php 
				 $aadharno = $value['Customer']['emer_no1'];
				 if($aadharno == '') { echo '_____'; } else { 
			     echo $value['Customer']['emer_no1']; 
				} ?>
				
				</td>
		        
				<td>
				
				<?php 
				 $aadharno = $value['Customer']['emer_no2'];
				 if($aadharno == '') { echo '_____'; } else { 
			     echo $value['Customer']['emer_no2']; 
				} ?>
				
				</td>
				
				 <td>
				 
				 <a href="<?=$this->webroot ?>rides/customer/<?php echo $value['Customer']['id']; ?>" class="btn btn-primary btn-xs">
                <i class="fa fa-car" style="padding-right: 2px;"></i> Rides
                </a>
				
				 <a href="<?=$this->webroot ?>cancelrides/customer/<?php echo $value['Customer']['id']; ?>" class="btn btn-danger btn-xs">
                <i class="fa fa-car" style="padding-right: 2px;"></i> Cancel Rides
                </a>
				
				</td>
				
				 <td>
				 
				 <a href="<?=$this->webroot ?>receipts/customer/<?php echo $value['Customer']['id']; ?>" class="btn btn-primary btn-xs">
                <i class="fa fa-car" style="padding-right: 2px;"></i> Receipts
                </a>

				</td>
				
				<td> 
				<a href="#" class="btn btn-danger wantto btn-xs" id="Delete_<?php echo $value['Customer']['id']; ?>">
                <span class="glyphicon glyphicon-trash"></span> Delete
                </a>
				</td>

            </tr>
     
			<?php $i++; }  ?>
			
        </tbody>
    </table>
	
</div>
	
	
	</div>
		</div>
	</div>

<script>		
$(document).ready(function(){

//Want to - in action call
$('body').on("click",".wantto", function(){	
var str = $(this).attr('id');
var res = str.split("_");
var todo = res[0];	
var customer_id = res[1];	

if(todo == 'Delete')
{
	var r = confirm("Are you sure to delete this customer?");
    if (r != true) 
	{
	  	return false;
    }	
}
	
$.ajax({
  url: BaseURL+'Calls/action_customer',
  data: {
    customer_id: customer_id,
    customer_do:  todo
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