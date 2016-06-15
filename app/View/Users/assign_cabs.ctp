 <div id="wrap">
 
  <?php echo $this->element('menu'); ?>

<!--PAGE CONTENT -->
        <div id="content">
		
		<div class="inner" style="padding: 40px; padding-top: 15px;">
		
		
		<div class="row">
									    <div class="col-lg-12">
										<h3 class="page-header">ASSIGN CAB TO DRIVER</h3>
									   </div>
	   </div>
		
	
	
	
  <div class="jumbotron" style="padding-bottom: 0px; padding-top: 0px;background : white;">
    <div class="btn-group btn-group-justified" >
     
  <div class="col-lg-2" style="text-align: center;">
                   
                           
                          <a class="quick-btn hvr-float-shadow" href="<?php echo $this->webroot;?>assigncabs" style="width: 115px;height: 97px;border-radius: 25px;">
							
                                <i style="font-size: 36px;padding-bottom: 4px;" class="fa fa-car"></i>
							     <span style="font-weight: bold;">ASSIGNED</span>
                                <span class="label label-warning" style="font-size: 13px;"><?php echo $assigned;  ?></span>
                            </a>
  </div>							
  <div class="col-lg-2" style="text-align: center;">							
                        
                             <a class="quick-btn hvr-float-shadow" href="<?php echo $this->webroot;?>unassigncabs" style="width: 115px;height: 97px; border-radius: 25px;">
							
                               <i style="font-size: 36px;padding-bottom: 4px;" class="fa fa-car"></i>
							     <span style="font-weight: bold;">UNASSIGNED</span>
                                <span class="label label-warning" style="font-size: 13px;"><?php echo $unassigned  ?></span>
                            </a>
</div>							
						
						
     <div class="col-lg-4" style="text-align: center;">	</div>                        

</div>
  </div>
  <hr \>
  
  <div class="row">
  
  <div class="col-sm-5 col-md-6">
    <div class="thumbnail">
	
	<div class="input-group">
	  <span class="input-group-addon" id="basic-addon1">  <i class="fa fa-odnoklassniki-square"></i></span>
	  <input type="text" id="search-criteria" class="form-control" placeholder="search drivers..." aria-describedby="basic-addon1">
    </div>
   
    <ul style="max-height: 400px;overflow-y: auto;margin-left: -40px;min-height: 400px;">
	
  	
	<?php
		foreach($drivers as $key=>$value)
		{
		   $driver_photo = $value['Driver']['driver_photo'];
		   $driver_photo = $this->webroot.'files/driver/'.$driver_photo;
           $isallocated  = $value['Driver']['Isallocated'];	
           $driver_id = $value['Driver']['id'];			   
	?>
	
	<li class="drivers-name pr_<?php echo $value['Driver']['id']?>">
   <section title=".roundedTwo" style="float: left;margin-left: 12px;">
    <!-- .roundedTwo -->
    <div class="roundedTwo">
      <input type="checkbox" class="drivers" value="<?php echo $value['Driver']['id']?>" id="<?php echo $value['Driver']['id']?>" name="drivers" />
      <label for="<?php echo $value['Driver']['id']?>"></label>
    </div>
    <!-- end .roundedTwo -->
   </section>
   <img src="<?php echo $driver_photo;?>" style="margin-left: 12px; border-radius: 50px; margin-top: 12px; width: 44px;float:left; height: 44px;"  />
   <div style="padding-top: 25px;
    padding-left: 25px;
    font-weight: 500; float:left; width: 174px;"> <?php echo $value['Driver']['fname'].' '.$value['Driver']['lname']; ?></div>

	<p style="display:none;" id="alloc_<?php echo $driver_id; ?>"><?php echo $isallocated; ?></p>
	
	<div style="padding-top: 25px;
    padding-left: 11px;
    font-weight: bold; float:left; <?php if($isallocated == 'allocated') { echo 'color: green;'; }   ?>"><?php if($isallocated == '' || $isallocated == 'unallocated') { echo 'unallocated'; } else { echo $isallocated; } ?></div>

	<?php if($isallocated == 'allocated') { ?>
	<img style=" float: left;
    height: 15px;
    margin-left: 7px;
    margin-top: 27px;
    width: 15px;margin-right: 12px;"  src="<?php echo $this->webroot; ?>img/tick.jpg" />
	
	<button style="margin-top: 27px;" type="button" id="<?php echo $driver_id; ?>" class="btn btn-danger btn-xs unbtn">Unallocate</button>

	<?php } ?>
	
	<div style="clear:both;"></div>
	 <hr style="margin-top: 2px;   margin-bottom: 2px;" \>
  </li>
	
	
		<?php  }	?>
		

		</ul>
     
      </div>
    </div>

    <div class="col-sm-5 col-md-6">

    <div class="thumbnail">
	
	<div class="input-group">
	  <span class="input-group-addon" id="basic-addon1">  <i class="fa fa-car"></i></span>
	  <input id="cab-criteria" type="text" class="form-control" placeholder="search cabs..." aria-describedby="basic-addon1">
   </div>
   
	 <ul style="max-height: 400px;overflow-y: auto; margin-left: -40px;min-height: 400px;">
	
	<?php
		foreach($cabs as $key=>$value)
		{
		   $cab_photo = $value['InfoVehicle']['vehimg'];
		   $cab_photo = $this->webroot.'files/cab/'.$cab_photo;
           $Isassigned  = $value['InfoVehicle']['Isassigned'];		   
	?>
	
	
	<li class="cabs-name cb_<?php echo $value['InfoVehicle']['id']?>">
   <section title=".roundedTwo" style="float: left;margin-left: 12px;">
    <!-- .roundedTwo -->
    <div class="roundedTwo">
      <input type="checkbox" class="infoveh" value="<?php echo $value['InfoVehicle']['id']?>" id="<?php echo $value['InfoVehicle']['id']?>" name="cabs" />
      <label for="<?php echo $value['InfoVehicle']['id']?>"></label>
    </div>
    <!-- end .roundedTwo -->
   </section>
   <img style="margin-left: 12px; border-radius: 50px; margin-top: 12px; width: 44px;float:left; height: 44px;"  src="<?php echo $cab_photo; ?>" alt="photo"/>
   
   <p style="display:none;" id="assign_<?php echo $value['InfoVehicle']['id']; ?>"><?php echo $Isassigned; ?></p>
   
   <div style="padding-top: 25px;
    padding-left: 12px;
    float:left;width: 144px;
	"> <?php echo $value['InfoVehicle']['veh_number']; ?> </div>
	
	<div style="padding-top: 25px;
    padding-left: 12px;
    float:left;width: 74px;" id="veh_<?php echo $value['InfoVehicle']['id']?>"><?php echo $value['InfoVehicle']['veh_type']; ?></div>
	
	<div style="padding-top: 25px;
    padding-left: 30px;
    font-weight: bold; float:left; <?php if($Isassigned == 'assigned') { echo 'color: green;'; }   ?>"><?php echo $Isassigned; ?> </div>
	
	<?php if($Isassigned == 'assigned') { ?>
	<img style=" float: left;
    height: 15px;
    margin-left: 7px;
    margin-top: 27px;
    width: 15px;"  src="<?php echo $this->webroot; ?>img/tick.jpg" />
	<?php }  ?>
	
	<div style="clear:both;"></div>
	<hr style="margin-top: 2px; margin-bottom: 2px;" \>
  </li>
  
		<?php } ?>
   
   </ul>
   
    </div>
  </div>
  
</div>

 <div class="row">
  
   <div class="col-sm-4 col-md-3">
   </div>
  
  <div class="col-sm-4 col-md-5" style="text-align: center;">
   <a href="#" class="btn btn-primary" role="button" id="allhit"> <i class="fa fa-car" style="font-size: 16px;padding-right: 5px;"></i> ASSIGN CAB</a>
  </div>
  
  <div class="col-sm-4 col-md-4">
   </div>
 
</div> 



    </div>
  </div>
</div>

<style>
.drivers-name:hover { background-color: #B1E2B1; }
.cabs-name:hover { background-color: #B1E2B1; }
.white { background-color: white; }
.hara { background-color: #B1E2B1; }
</style>


<script>

$('#search-criteria').keyup(function(){
    $('.drivers-name').hide();
    var txt = $('#search-criteria').val();
    $('.drivers-name').each(function(){
       if($(this).text().toUpperCase().indexOf(txt.toUpperCase()) != -1){
           $(this).show();
       }
    });
});

</script>

<script>

$('#cab-criteria').keyup(function(){
    $('.cabs-name').hide();
    var txt = $('#cab-criteria').val();
    $('.cabs-name').each(function(){
       if($(this).text().toUpperCase().indexOf(txt.toUpperCase()) != -1){
           $(this).show();
       }
    });
});

</script>


 <script>
 $('.drivers').on('change',function(){
 
	 var th = $(this), name = th.prop('name'); 
	 var id = $(this).attr('id');
	 var cls = "pr_"+id;
	 
	 $(".drivers-name").removeClass("hara");
	 $(".drivers-name").addClass("white");

	  if(th.is(':checked')){
		   $("."+cls).removeClass("white");
		   $("."+cls).addClass("hara");
		  
		 $(':checkbox[name="'  + name + '"]').not($(this)).prop('checked',false);   
	  }
	 	  
});
 </script>
 
 
  <script>
 $('.infoveh').on('change',function(){
 
	 var th = $(this), name = th.prop('name'); 
	 var id = $(this).attr('id');
	 var cls = "cb_"+id;

	 $(".cabs-name").removeClass("hara");
	 $(".cabs-name").addClass("white");

	  if(th.is(':checked')){
		   $("."+cls).removeClass("white");
		   $("."+cls).addClass("hara");
		  
		 $(':checkbox[name="'  + name + '"]').not($(this)).prop('checked',false);   
	  }
	 	  
});
 </script>
 
 
  <script>
 $('#allhit').on('click',function(){
	 
 if ($('.drivers').is(':checked') == true) {
            var  s = $(this).val();
			var driver_id = $( ".drivers:checkbox:checked" ).val();
			var dralloc = $( "#alloc_"+driver_id ).html();
			
			if(dralloc == 'allocated')
				{
					alert('Sorry this driver is already allocated !!');
					return false;
				}
			
			}
           else 
		   {
             alert('please choose driver to allocate cab !!');
			 return false;
          }
		  
 if ($('.infoveh').is(':checked') == true) {
				var  s = $(this).val();
				var veh_id = $( ".infoveh:checkbox:checked" ).val();
				veh_type = $( "#veh_"+veh_id ).html();
				vehassign = $( "#assign_"+veh_id ).html();
				
				if(vehassign == 'assigned')
				{
					alert('Sorry this cab is already assigned !!');
					return false;
				}	
			
			}
            else 
		    {
               alert('please choose cab to allocate to driver !!');
			   return false;
            }	


		$.ajax({
		  url: BaseURL+'Calls/assign_cabs',
		  data: {
			driver_id: driver_id,
			vehicle_id:  veh_id,
			veh_assign:  veh_type
			},
			type: 'POST',
			success: function( data ) {
				 data = data.trim();
				 if(data == 'success')
				 {
					location.reload(); 
				 }	  
			}
		});

});
 </script>
 
   <script>
 $('.unbtn').on('click',function(){
	 
            var  driver_id = $(this).attr('id');
          
		  $.ajax({
		  url: BaseURL+'Calls/unassign_cabs',
		  data: {
			driver_id: driver_id,
			},
			type: 'POST',
			success: function( data ) {
				 data = data.trim();
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

 </script>
 
 

<script>
// Converted to SCSS. If you want to grab just the CSS, click the `View Compiled` button on the css window over there <-- . That will list out the compiled css for you to use. Grab all the css between the comments and the html between the comments and it should work like a champ anywhere you place it.
// All this jquery is just used for presentation. Not required at all for the radio buttons to work.
$( document ).ready(function(){
//   Hide the border by commenting out the variable below
    var $on = 'section';
    $($on).css({
      'background':'none',
      'border':'none',
      'box-shadow':'none'
    });
}); 
</script>




<style>
/* $activeColor: #c0392b; //red */
/* $background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/13460/dark_wall.png'); */
/* .slideOne */

li { list-style: none;  }

.slideOne {
  width: 50px;
  height: 10px;
  background: #333;
  margin: 20px auto;
  position: relative;
  border-radius: 50px;
  box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.5), 0px 1px 0px rgba(255, 255, 255, 0.2);
}
.slideOne label {
  display: block;
  width: 16px;
  height: 16px;
  position: absolute;
  top: -3px;
  left: -3px;
  cursor: pointer;
  background: #fcfff4;
  background: -webkit-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
  background: linear-gradient(to bottom, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
  border-radius: 50px;
  box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.3);
  -webkit-transition: all 0.4s ease;
          transition: all 0.4s ease;
}
.slideOne input[type=checkbox] {
  visibility: hidden;
}
.slideOne input[type=checkbox]:checked + label {
  left: 37px;
}

/* end .slideOne */
/* .slideTwo */
.slideTwo {
  width: 80px;
  height: 30px;
  background: #333;
  margin: 20px auto;
  position: relative;
  border-radius: 50px;
  box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.5), 0px 1px 0px rgba(255, 255, 255, 0.2);
}
.slideTwo:after {
  content: '';
  position: absolute;
  top: 14px;
  left: 14px;
  height: 2px;
  width: 52px;
  background: #111;
  border-radius: 50px;
  box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.5), 0px 1px 0px rgba(255, 255, 255, 0.2);
}
.slideTwo label {
  display: block;
  width: 22px;
  height: 22px;
  cursor: pointer;
  position: absolute;
  top: 4px;
  z-index: 1;
  left: 4px;
  background: #fcfff4;
  border-radius: 50px;
  -webkit-transition: all 0.4s ease;
          transition: all 0.4s ease;
  box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.3);
  background: -webkit-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
  background: linear-gradient(to bottom, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
}
.slideTwo label:after {
  content: '';
  width: 10px;
  height: 10px;
  position: absolute;
  top: 6px;
  left: 6px;
  background: #333;
  border-radius: 50px;
  box-shadow: inset 0px 1px 1px black, 0px 1px 0px rgba(255, 255, 255, 0.9);
}
.slideTwo input[type=checkbox] {
  visibility: hidden;
}
.slideTwo input[type=checkbox]:checked + label {
  left: 54px;
}
.slideTwo input[type=checkbox]:checked + label:after {
  background: #27ae60;
  /*activeColor*/
}

/* end .slideTwo */
/* .slideThree */
.slideThree {
  width: 80px;
  height: 26px;
  background: #333;
  margin: 20px auto;
  position: relative;
  border-radius: 50px;
  box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.5), 0px 1px 0px rgba(255, 255, 255, 0.2);
}
.slideThree:after {
  content: 'OFF';
  color: #000;
  position: absolute;
  right: 10px;
  z-index: 0;
  font: 12px/26px Arial, sans-serif;
  font-weight: bold;
  text-shadow: 1px 1px 0px rgba(255, 255, 255, 0.15);
}
.slideThree:before {
  content: 'ON';
  color: #27ae60;
  position: absolute;
  left: 10px;
  z-index: 0;
  font: 12px/26px Arial, sans-serif;
  font-weight: bold;
}
.slideThree label {
  display: block;
  width: 34px;
  height: 20px;
  cursor: pointer;
  position: absolute;
  top: 3px;
  left: 3px;
  z-index: 1;
  background: #fcfff4;
  background: -webkit-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
  background: linear-gradient(to bottom, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
  border-radius: 50px;
  -webkit-transition: all 0.4s ease;
          transition: all 0.4s ease;
  box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.3);
}
.slideThree input[type=checkbox] {
  visibility: hidden;
}
.slideThree input[type=checkbox]:checked + label {
  left: 43px;
}

/* end .slideThree */
/* .roundedOne */
.roundedOne {
  width: 28px;
  height: 28px;
  position: relative;
  margin: 20px auto;
  background: #fcfff4;
  background: -webkit-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
  background: linear-gradient(to bottom, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
  border-radius: 50px;
  box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0, 0, 0, 0.5);
}
.roundedOne label {
  width: 20px;
  height: 20px;
  cursor: pointer;
  position: absolute;
  left: 4px;
  top: 4px;
  background: -webkit-linear-gradient(top, #222222 0%, #45484d 100%);
  background: linear-gradient(to bottom, #222222 0%, #45484d 100%);
  border-radius: 50px;
  box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.5), 0px 1px 0px white;
}
.roundedOne label:after {
  content: '';
  width: 16px;
  height: 16px;
  position: absolute;
  top: 2px;
  left: 2px;
  background: #27ae60;
  background: -webkit-linear-gradient(top, #27ae60 0%, #145b32 100%);
  background: linear-gradient(to bottom, #27ae60 0%, #145b32 100%);
  opacity: 0;
  border-radius: 50px;
  box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0, 0, 0, 0.5);
}
.roundedOne label:hover::after {
  opacity: 0.3;
}
.roundedOne input[type=checkbox] {
  visibility: hidden;
}
.roundedOne input[type=checkbox]:checked + label:after {
  opacity: 1;
}

/* end .roundedOne */
/* .roundedTwo */
.roundedTwo {
  width: 22px;
  height: 22px;
  position: relative;
  margin: 20px auto;
  background: #fcfff4;
  background: -webkit-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
  background: linear-gradient(to bottom, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
  border-radius: 50px;
  box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0, 0, 0, 0.5);
}
.roundedTwo label {
  width: 16px;
  height: 16px;
  position: absolute;
  top: 3px;
  left: 3px;
  cursor: pointer;
  background: -webkit-linear-gradient(top, #222222 0%, #45484d 100%);
  background: linear-gradient(to bottom, #222222 0%, #45484d 100%);
  border-radius: 50px;
  box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.5), 0px 1px 0px white;
}
.roundedTwo label:after {
  content: '';
  width: 9px;
  height: 5px;
  position: absolute;
  top: 5px;
  left: 4px;
  border: 3px solid #fcfff4;
  border-top: none;
  border-right: none;
  background: transparent;
  opacity: 0;
  -webkit-transform: rotate(-45deg);
      -ms-transform: rotate(-45deg);
          transform: rotate(-45deg);
}
.roundedTwo label:hover::after {
  opacity: 0.3;
}
.roundedTwo input[type=checkbox] {
  visibility: hidden;
}
.roundedTwo input[type=checkbox]:checked + label:after {
  opacity: 1;
}

/* end .roundedTwo */
/* .squaredOne */
.squaredOne {
  width: 28px;
  height: 28px;
  position: relative;
  margin: 20px auto;
  background: #fcfff4;
  background: -webkit-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
  background: linear-gradient(to bottom, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
  box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0, 0, 0, 0.5);
}
.squaredOne label {
  width: 20px;
  height: 20px;
  position: absolute;
  top: 4px;
  left: 4px;
  cursor: pointer;
  background: -webkit-linear-gradient(top, #222222 0%, #45484d 100%);
  background: linear-gradient(to bottom, #222222 0%, #45484d 100%);
  box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.5), 0px 1px 0px white;
}
.squaredOne label:after {
  content: '';
  width: 16px;
  height: 16px;
  position: absolute;
  top: 2px;
  left: 2px;
  background: #27ae60;
  background: -webkit-linear-gradient(top, #27ae60 0%, #145b32 100%);
  background: linear-gradient(to bottom, #27ae60 0%, #145b32 100%);
  box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0, 0, 0, 0.5);
  opacity: 0;
}
.squaredOne label:hover::after {
  opacity: 0.3;
}
.squaredOne input[type=checkbox] {
  visibility: hidden;
}
.squaredOne input[type=checkbox]:checked + label:after {
  opacity: 1;
}

/* end .squaredOne */
/* .squaredTwo */
.squaredTwo {
  width: 28px;
  height: 28px;
  position: relative;
  margin: 20px auto;
  background: #fcfff4;
  background: -webkit-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
  background: linear-gradient(to bottom, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
  box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0, 0, 0, 0.5);
}
.squaredTwo label {
  width: 20px;
  height: 20px;
  cursor: pointer;
  position: absolute;
  left: 4px;
  top: 4px;
  background: -webkit-linear-gradient(top, #222222 0%, #45484d 100%);
  background: linear-gradient(to bottom, #222222 0%, #45484d 100%);
  box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.5), 0px 1px 0px white;
}
.squaredTwo label:after {
  content: '';
  width: 9px;
  height: 5px;
  position: absolute;
  top: 4px;
  left: 4px;
  border: 3px solid #fcfff4;
  border-top: none;
  border-right: none;
  background: transparent;
  opacity: 0;
  -webkit-transform: rotate(-45deg);
      -ms-transform: rotate(-45deg);
          transform: rotate(-45deg);
}
.squaredTwo label:hover::after {
  opacity: 0.3;
}
.squaredTwo input[type=checkbox] {
  visibility: hidden;
}
.squaredTwo input[type=checkbox]:checked + label:after {
  opacity: 1;
}

/* end .squaredTwo */
/* .squaredThree */
.squaredThree {
  width: 20px;
  position: relative;
  margin: 20px auto;
}
.squaredThree label {
  width: 20px;
  height: 20px;
  cursor: pointer;
  position: absolute;
  top: 0;
  left: 0;
  background: -webkit-linear-gradient(top, #222222 0%, #45484d 100%);
  background: linear-gradient(to bottom, #222222 0%, #45484d 100%);
  border-radius: 4px;
  box-shadow: inset 0px 1px 1px rgba(0, 0, 0, 0.5), 0px 1px 0px rgba(255, 255, 255, 0.4);
}
.squaredThree label:after {
  content: '';
  width: 9px;
  height: 5px;
  position: absolute;
  top: 4px;
  left: 4px;
  border: 3px solid #fcfff4;
  border-top: none;
  border-right: none;
  background: transparent;
  opacity: 0;
  -webkit-transform: rotate(-45deg);
      -ms-transform: rotate(-45deg);
          transform: rotate(-45deg);
}
.squaredThree label:hover::after {
  opacity: 0.3;
}
.squaredThree input[type=checkbox] {
  visibility: hidden;
}
.squaredThree input[type=checkbox]:checked + label:after {
  opacity: 1;
}

/* end .squaredThree */
/* .squaredFour */
.squaredFour {
  width: 20px;
  position: relative;
  margin: 20px auto;
}
.squaredFour label {
  width: 20px;
  height: 20px;
  cursor: pointer;
  position: absolute;
  top: 0;
  left: 0;
  background: #fcfff4;
  background: -webkit-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
  background: linear-gradient(to bottom, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
  border-radius: 4px;
  box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0, 0, 0, 0.5);
}
.squaredFour label:after {
  content: '';
  width: 9px;
  height: 5px;
  position: absolute;
  top: 4px;
  left: 4px;
  border: 3px solid #333;
  border-top: none;
  border-right: none;
  background: transparent;
  opacity: 0;
  -webkit-transform: rotate(-45deg);
      -ms-transform: rotate(-45deg);
          transform: rotate(-45deg);
}
.squaredFour label:hover::after {
  opacity: 0.5;
}
.squaredFour input[type=checkbox] {
  visibility: hidden;
}
.squaredFour input[type=checkbox]:checked + label:after {
  opacity: 1;
}

/* end .squaredFour */
* {
  box-sizing: border-box;
}

body {
  background: #3498db;
  font-family: 'Open Sans', sans-serif;
  font-weight: 300;
}
body h1, body h2, body em {
  color: #eee;
  font-size: 30px;
  text-align: center;
  margin: 20px 0 0 0;
  -webkit-font-smoothing: antialiased;
  text-shadow: 0px 1px #000;
}
body em {
  font-size: 14px;
  text-align: center;
  display: block;
  margin-bottom: 50px;
}
body .ondisplay {
  text-align: center;
  padding: 20px 0;
}
body .ondisplay section {
  width: 100px;
  height: 100px;
  background: #555;
  display: inline-block;
  position: relative;
  text-align: center;
  margin-top: 5px;
  border: 1px solid gray;
  border-radius: 5px;
  box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
}
body .ondisplay section:after {
  /*         visibility: hidden; */
  content: attr(title);
  position: absolute;
  width: 100%;
  left: 0;
  bottom: 3px;
  color: #fff;
  font-size: 12px;
  font-weight: 400;
  -webkit-font-smoothing: antialiased;
  text-shadow: 0px 1px #000;
}

</style>