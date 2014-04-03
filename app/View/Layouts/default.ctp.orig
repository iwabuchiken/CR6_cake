<?php
/**
 *
 * PHP 5
 *
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
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		
		echo $this->Html->script("http://code.jquery.com/jquery-2.1.0.min.js");
		
		echo $this->Html->script('main');
// 		echo $this->Html->link('jquery');
// 		echo $this->js->link('jquery');
// 		echo $js->link('jquery');
		
		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	
	<?php //echo $this->Html->script("http://code.jquery.com/jquery-2.1.0.min.js"); ?>
	<?php //echo $this->Html->script("jquery-1.4.2.min"); ?>
	<?php //echo $this->Js->link("jquery-1.4.2.min"); ?>
	<?php //echo $Js->link("jquery-1.4.2.min"); ?>
	<?php //echo $js->link("jquery-1.4.2.min"); ?>
	<?php //echo $javascript->link("jquery-1.4.2.min"); ?>
	<?php //echo $this->js->link('jquery'); ?>
	
	<?php //echo $this->Js->writeBuffer(); ?>
	
</head>
<body>

	<?php echo $this->Js->writeBuffer(); ?>

	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?></h1>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>

		<?php echo $this->element('texts/index_log')?>
		
		<br>
		<div id="ajax_area">
		
			Log
		
		</div>
		
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
	
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
