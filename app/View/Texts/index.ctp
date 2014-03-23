<!-- File: /app/View/Posts/index.ctp -->

<!-- REF bottom http://stackoverflow.com/questions/1384823/how-to-specify-the-bottom-border-of-a-tr -->
<style type="text/css">
    tr.bb, td.bb {
/*     .bb td, .bb th { */
     border-bottom: 3px solid blue !important;
/*      border-bottom: 1px solid black !important; */
    }
</style>
  
<h1>Texts(total=<?php echo count($texts); ?>)</h1>

<!-- REF id http://stackoverflow.com/questions/484719/html-anchors-with-name-or-id -->
<a id="top"></a>
<a href="#bottom">Bottom</a>
<br>
<br>

<!-- REF border http://www.newcredge.com/IT/www/html/tag/table/table-border-tr-td.html -->
<table border="1">

	<?php echo $this->element('texts/index_table_header')?>
	
    <!-- Here is where we loop through our $posts array, printing out post info -->

	<?php echo $this->element('texts/index_table_entries')?>

	
</table>

<a id="bottom"></a>
<a href="#top">Top</a>
<br><br>

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
	
	<!-- REF confirm http://book.cakephp.org/2.0/en/core-libraries/helpers/html.html -->
	<?php echo $this->Html->link(
					'Delete all texts',
					array(
						'controller' => 'texts',
						'action' => 'delete_all'),
					array(),
					"Delete all?");
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
// 		$keys = array_keys($data);
// 		$keys_String = implode(",", $keys);
		
// 		echo "data => $keys_String"."(count=".count($keys).")"; ?>
<?php //echo $this->element('texts/index_test_scripts')?>
