<!-- File: /app/View/Posts/index.ctp -->

<h1>Texts</h1>
<table>

	<?php echo $this->element('texts/index_table_header')?>
	
    <!-- Here is where we loop through our $posts array, printing out post info -->

	<?php echo $this->element('texts/index_table_entries')?>

	
</table>

	<a href="http://benfranklin.chips.jp/cake_apps/CR6_cake/texts/index"
		target="_blank">
		PHP site
	</a>
	
	<br>
	
	<?php echo $this->Html->link(
					'Add Text',
					array('controller' => 'texts', 'action' => 'add'));
	?>
	<br>
	
	<?php echo $this->Html->link(
					'Build texts from csv',
					array('controller' => 'texts', 'action' => 'build_texts'));
	?>	

	<br>
	
	<?php
	
// 		$keys = array_keys($params);
		
// 		$keys_String = implode(",", $keys);
		
// 		echo "params => ".$keys_String;
// 		echo "params => ".$params
	?>
	
	<br>
	
	<?php
		$keys = array_keys($data);
		$keys_String = implode(",", $keys);
		
		echo "data => $keys_String"."(count=".count($keys).")"; ?>
<?php //echo $this->element('texts/index_test_scripts')?>
