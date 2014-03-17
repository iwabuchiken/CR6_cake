<!-- File: /app/View/Posts/index.ctp -->

<h1>Blog posts</h1>
<table>

	<?php echo $this->element('texts/index_table_header')?>
	
    <!-- Here is where we loop through our $posts array, printing out post info -->

	<?php echo $this->element('texts/index_table_entries')?>

	<a href="http://benfranklin.chips.jp/cake_apps/CR6_cake/texts/index"
		target="_blank">
		PHP site
	</a>
	
	<br>
	
</table>

<?php //echo $this->element('texts/index_test_scripts')?>
