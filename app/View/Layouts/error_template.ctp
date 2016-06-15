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

		echo $this->Html->css('login/base');
		echo $this->Html->css('login/skeleton');
		echo $this->Html->css('login/layout');
		echo $this->Html->css('special/jBox');
		echo $this->Html->script('special/jBox.min');
       
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		
		die('hghjgh');
	?>
	
</head>
<body style="background: rgba(2, 160, 95, 0.89)">
	
	<div id="container">
		<div id="header">
		

        </div>
        <!-- END HEADER SECTION -->
	
		<div id="cakecontent" style="margin-top: 64px;">

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			
		</div>
		</div>

		
	
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
