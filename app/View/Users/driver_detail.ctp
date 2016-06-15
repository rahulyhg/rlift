 <div id="wrap">
 
  <?php echo $this->element('menu'); ?>
 
<!--PAGE CONTENT -->
        <div id="content">
		
		<div class="inner" style="padding: 40px; padding-top: 15px;">
		
		
		<div class="row">
									    <div class="col-lg-12">
										<h3 class="page-header">DRIVERS DETAILS</h3>
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

<table id="example" class="display compact" cellspacing="0" width="2550px">
        <thead>
           
          <tr style="background: rgba(128, 128, 128, 0.15);">
                <th colspan="11">DRIVER</th>
				<th colspan="5" style="border-left: 1px solid white;border-right: 1px solid white;"> ID NUMBERS </th>
			   
				<th colspan="4" >ID FILES</th>
			
            </tr>

		   <tr>
                <th>Sr. No.</th>
			    <th>Photo</th>
			    <th>First name</th>
                <th>Last name</th>
                <th>Email id</th>
                <th>DOB</th>
				<th>Country</th>
				<th>State</th>
			    <th>City</th>
				<th>Pincode</th>
                <th style="width: 150px;">Address</th>
				
				<th>Driver Id</th>
				<th>Phone</th>
                <th>Alternative Phone</th>
				<th>Aadhar card</th>
				<th>Driving licence</th>
				
				<th>Address</th>
				<th>Driving licence</th>
				<th>Aadhar card</th>
				<th>Unique ID</th>
				
            </tr>
        </thead>
        <tbody>
            
			<?php   $i = 1;
			        foreach($drivers as $key=>$value) { 
			        $driver_file = $value['Driver']['driving_file'];
					$aadhar = $value['Driver']['aadhar_file'];
					$driver_photo = $value['Driver']['driver_photo'];
					$address_file = $value['Driver']['address_proof'];
					$uid = $value['Driver']['uid_file'];
					
					
					$driver_file = $this->webroot.'files/driver/'.$driver_file;
					$aadhar_file = $this->webroot.'files/driver/'.$aadhar;
					$driver_photo = $this->webroot.'files/driver/'.$driver_photo;
					$address_file = $this->webroot.'files/driver/'.$address_file;
					$uid_file = $this->webroot.'files/driver/'.$uid;
			
			?>
			
			<tr>
			    <td><?php echo $i; ?></td>
				<td><img style="width: 42px;height: 42px;border-radius: 20px;" src="<?php echo $driver_photo; ?>" alt="driver_photo" /></td>
				
                <td><?php echo $value['Driver']['fname']; ?></td>
				<td><?php echo $value['Driver']['lname']; ?></td>
				<td> <i class="fa fa-envelope-o"></i> <?php echo $value['Driver']['email_id']; ?></td>
				
				<td><?php echo $value['Driver']['dob']; ?></td>
				<td><?php echo $value['Driver']['country']; ?></td>
				<td><?php echo $value['Driver']['state']; ?></td>
				<td><?php echo $value['Driver']['city']; ?></td>
				<td><?php echo $value['Driver']['pincode']; ?></td>
				<td style="width: 183px;"><?php echo $value['Driver']['address']; ?></td>
				
				<td><?php echo $value['Driver']['driverid']; ?></td>
				<td class="mnumber"><i class="fa fa-phone-square"></i> <?php echo $value['Driver']['phone']; ?></td>
				<td><?php echo $value['Driver']['phone2']; ?></td>
				
				<td>
				<?php 
				 $aadharno = $value['Driver']['aadhar_no'];
				 if($aadharno == '') { echo '_____'; } else { 
			     echo $value['Driver']['aadhar_no']; 
				} ?>
				</td>
				
				<td><?php echo $value['Driver']['driving_no']; ?></td>

				<td>
				<a href="<?php echo $address_file; ?>" class="btn btn-warning btn-xs" target="_blank" >
                <span class="glyphicon glyphicon-eye-open"></span> view file
                </a>
				</td>
				
				
				
				
				<td>
				<a href="<?php echo $driver_file; ?>" class="btn btn-warning btn-xs" target="_blank" >
                <span class="glyphicon glyphicon-eye-open"></span> view file
                </a>
				</td>
				
				<td>
				
				<?php if($aadhar == '') { echo '_____'; } else { ?>
				<a href="<?php echo $aadhar_file; ?>" class="btn btn-warning btn-xs" target="_blank" >
                <span class="glyphicon glyphicon-eye-open"></span> view file
                </a>
				<?php } ?>
				
				</td>
				
				
				
				<td>
				
				<?php if($uid == '') { echo '_____'; } else { ?>
				<a href="<?php echo $uid_file; ?>" class="btn btn-warning btn-xs" target="_blank" >
                <span class="glyphicon glyphicon-eye-open"></span> view file
                </a>
				
				<?php } ?>
				</td>
				
              
            </tr>
     
			<?php  $i++; }  ?>
			
        </tbody>
    </table>
	
	</div>
	
	</div>
	
		</div>
	
	
	
