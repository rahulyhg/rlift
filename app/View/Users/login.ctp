	

   <?php 
	$good = $this->Session->flash('good'); 
	$bad = $this->Session->flash('bad'); 
	if(!empty($good)){ 
	$content = $good;
	?>
	<script>
                                new jBox('Notice', {
                                 content: '<?= $content ?>',
								 animation: {open: 'tada', close: 'flip'},
								 color: 'green',
								 position: { x: 'right',y: 'bottom' },
								 offset: { x: -170, y: -360 }
								 }) ;
   </script>
   <?php } 
   
    if(!empty($bad)){ 
	$content = $bad;
	?>
	<script>
                                new jBox('Notice', {
                                 content: '<?= $content ?>',
								 animation: {open: 'tada', close: 'flip'},
								 color: 'red',
								 position: { x: 'right',y: 'bottom' },
								 offset: { x: -170, y: -360 }
								 }) ;
   </script>
   <?php } ?>
	

   <!-- Primary Page Layout -->

	<div class="container">
		
		<div class="form-bg">
		        <?php echo $this->Form->create('Users'); ?>
				<h2 style="text-align:center;padding-top:20px;margin-bottom: 6px;margin-left: 0px;">
				<img src="<?= $this->webroot ?>img/rite.png" /></h2>
				
				<p><input name ="username" type="text" placeholder="Enter your username" required></p>
				<p><input name= "password" type="password" placeholder="Enter your password" required></p>
				
				<input id="gobutton" type="submit" value="Login" style="float: right; margin-right: 32px;"/> 
		        </form>
		</div>

	
		<p class="forgot" style="margin-left: -22px;margin-top: 22px;">rLIFT © 2015</p> 


	</div><!-- container -->

	
	<style>
			input#gobutton{
		cursor:pointer; /*forces the cursor to change to a hand when the button is hovered*/
		padding:5px 25px; /*add some padding to the inside of the button*/
		background:rgba(2, 160, 95, 0.89); /*the colour of the button*/
		border:1px solid #33842a; /*required or the default border for the browser will appear*/
		/*give the button curved corners, alter the size as required*/
		-moz-border-radius: 10px;
		-webkit-border-radius: 10px;
		border-radius: 10px;
		/*give the button a drop shadow*/
		-webkit-box-shadow: 0 0 4px rgba(0,0,0, .75);
		-moz-box-shadow: 0 0 4px rgba(0,0,0, .75);
		box-shadow: 0 0 4px rgba(0,0,0, .75);
		/*style the text*/
		color:#f3f3f3;
		font-size:1.1em;
		}
		/***NOW STYLE THE BUTTON'S HOVER AND FOCUS STATES***/
		input#gobutton:hover, input#gobutton:focus{
		background-color :rgba(2, 160, 95, 0.89); /*make the background a little darker*/
		/*reduce the drop shadow size to give a pushed button effect*/
		-webkit-box-shadow: 0 0 1px rgba(0,0,0, .75);
		-moz-box-shadow: 0 0 1px rgba(0,0,0, .75);
		box-shadow: 0 0 1px rgba(0,0,0, .75);
		}
    </style>
	