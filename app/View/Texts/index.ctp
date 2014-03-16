<!-- File: /app/View/Posts/index.ctp -->

<h1>Blog posts</h1>
<table>

	<?php echo $this->element('texts/index_table_header')?>
	
    <!-- Here is where we loop through our $posts array, printing out post info -->

	<?php echo $this->element('texts/index_table_entries')?>

	<br>
	
	<?php echo "log_path=".$path_Log?>
	<br>
	
	<?php echo "res=".(($res) ? "true" : "false") ?>
	<br>
	
	<?php echo "path_Utils=".$path_Utils?>
	<br>
	
	<?php echo "res2=".(($res2) ? "true" : "false") ?>
	<br>
	
	
</table>
