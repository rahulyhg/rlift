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
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	
	  <link rel="stylesheet" href="<?= $this->webroot ?>plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?= $this->webroot ?>assets/css/main.css" />
    <link rel="stylesheet" href="<?= $this->webroot ?>assets/css/theme.css" />
    <link rel="stylesheet" href="<?= $this->webroot ?>assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="<?= $this->webroot ?>plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->
	

    <!-- PAGE LEVEL STYLES -->
    
 <link href="<?= $this->webroot ?>assets/css/jquery-ui.css" rel="stylesheet" />
<link rel="stylesheet" href="<?= $this->webroot ?>plugins/uniform/themes/default/css/uniform.default.css" />
<link rel="stylesheet" href="<?= $this->webroot ?>plugins/inputlimiter/jquery.inputlimiter.1.0.css" />
<link rel="stylesheet" href="<?= $this->webroot ?>plugins/chosen/chosen.min.css" />
<link rel="stylesheet" href="<?= $this->webroot ?>plugins/colorpicker/css/colorpicker.css" />
<link rel="stylesheet" href="<?= $this->webroot ?>plugins/tagsinput/jquery.tagsinput.css" />
<link rel="stylesheet" href="<?= $this->webroot ?>plugins/daterangepicker/daterangepicker-bs3.css" />
<link rel="stylesheet" href="<?= $this->webroot ?>plugins/datepicker/css/datepicker.css" />
<link rel="stylesheet" href="<?= $this->webroot ?>plugins/timepicker/css/bootstrap-timepicker.min.css" />
<link rel="stylesheet" href="<?= $this->webroot ?>plugins/switch/static/stylesheets/bootstrap-switch.css" />
	
	
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">

    <!-- PAGE LEVEL STYLES -->
    <link href="<?= $this->webroot ?>assets/css/layout2.css" rel="stylesheet" />
       <link href="<?= $this->webroot ?>plugins/flot/examples/examples.css" rel="stylesheet" />
       <link rel="stylesheet" href="<?= $this->webroot ?>plugins/timeline/timeline.css" />
	
	
</head>
<body>
	
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
				padding-left: 14px;
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
			 <p>&copy;  Ritecab &nbsp;2015 &nbsp;</p>
		</div>
	</div>
	

	
	    <!-- GLOBAL SCRIPTS -->
    <script src="<?= $this->webroot ?>plugins/jquery-2.0.3.min.js"></script>
     <script src="<?= $this->webroot ?>plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= $this->webroot ?>plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->

    <!-- PAGE LEVEL SCRIPTS -->
    <script src="<?= $this->webroot ?>plugins/flot/jquery.flot.js"></script>
    <script src="<?= $this->webroot ?>plugins/flot/jquery.flot.resize.js"></script>
    <script src="<?= $this->webroot ?>plugins/flot/jquery.flot.time.js"></script>
    <script  src="<?= $this->webroot ?>plugins/flot/jquery.flot.stack.js"></script>
    <script src="<?= $this->webroot ?>assets/js/for_index.js"></script>


  <!-- PAGE LEVEL SCRIPT-->
 <script src="<?= $this->webroot ?>assets/js/jquery-ui.min.js"></script>
 <script src="<?= $this->webroot ?>plugins/uniform/jquery.uniform.min.js"></script>
<script src="<?= $this->webroot ?>plugins/inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
<script src="<?= $this->webroot ?>plugins/chosen/chosen.jquery.min.js"></script>
<script src="<?= $this->webroot ?>plugins/colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="<?= $this->webroot ?>plugins/tagsinput/jquery.tagsinput.min.js"></script>
<script src="<?= $this->webroot ?>plugins/validVal/js/jquery.validVal.min.js"></script>
<script src="<?= $this->webroot ?>plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?= $this->webroot ?>plugins/daterangepicker/moment.min.js"></script>
<script src="<?= $this->webroot ?>plugins/datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?= $this->webroot ?>plugins/timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="<?= $this->webroot ?>plugins/switch/static/js/bootstrap-switch.min.js"></script>
<script src="<?= $this->webroot ?>plugins/jquery.dualListbox-1.3/jquery.dualListBox-1.3.min.js"></script>
<script src="<?= $this->webroot ?>plugins/autosize/jquery.autosize.min.js"></script>
<script src="<?= $this->webroot ?>plugins/jasny/js/bootstrap-inputmask.js"></script>
<script src="<?= $this->webroot ?>assets/js/formsInit.js"></script>
        
		<script>
            $(function () { formInit(); });
        </script>
        
	
	
	
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
