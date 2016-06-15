<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>

<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	 
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
		echo $this->Html->css('special/jBox');
		echo $this->Html->css('special/hover');
		echo $this->Html->script('special/jBox.min');
		echo $this->Html->css('parsley');
		echo $this->Html->script('parsley');
        echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
  <!-- jQuery library -->
  
  <script> var BaseURL = "<?php echo $this->webroot; ?>"  </script>

 </head>
 
<body>
	
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
	
	<div id="container">
		<div id="header">
			
			        <!-- HEADER SECTION -->
        <div id="top">

            <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
                <!-- LOGO SECTION -->
                <header class="navbar-header">
               
                <p style="
				color: white;
				font-weight: bold;
				margin: 0px;
				font-size: 22px;
                font-family: calibri;
				padding-left: 71px;
			   ">RITE CAB</p>

                </header>
                <!-- END LOGO SECTION -->
                <ul class="nav navbar-top-links navbar-right">

                  

                    <!--ADMIN SETTINGS SECTIONS -->

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: white; background: none;">
                            <i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i>
                        </a>

                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="icon-user"></i> My Profile </a>
                            </li>
                            <li><a href="#"><i class="icon-gear"></i> Settings </a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="login.html"><i class="icon-signout"></i> Logout </a>
                            </li>
                        </ul>

                    </li>
                    <!--END ADMIN SETTINGS -->
                </ul>

            </nav>

        </div>
        <!-- END HEADER SECTION -->
			
		</div>
		<div id="cakecontent" style="margin-top: 50px;">

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			 <p>&copy;  RITECAB &nbsp;2015 &nbsp;</p>
		</div>
	</div>
	
	
	
	   <!--Live GLOBAL scripts-->
	
	
	 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
	
	
	
    <link rel="stylesheet" href="<?= $this->webroot ?>assets/css/main.css" />
    <!-- <link rel="stylesheet" href="<?= $this->webroot ?>assets/css/MoneAdmin.css" />	 -->
	
	<?php echo $this->Html->css('smart-forms');  ?>
	
	
	<style>
	.belowdrop {
	background: #008862;
	}
	
	body {
    font-family: Roboto !important;
    }

	</style>	
	
	<style>
    
	#example_wrapper {
		font-family: sans-serif;
		font-size: 12px;
	}	

	h3 {
		font-size: 20px !important;
	}
	
	input[type="search"] {
    border-radius:5px;
    }
	
	select {
    border-radius:5px;
	padding: 3px;
    }
		
   </style>
	
	
<?php echo $this->element('sql_dump'); ?>

</body>
</html>
