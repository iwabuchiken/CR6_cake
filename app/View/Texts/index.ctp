<!-- File: /app/View/Posts/index.ctp -->

<h1>Blog posts</h1>
<table>

	<?php echo $this->element('texts/index_table_header')?>
	
    <!-- Here is where we loop through our $posts array, printing out post info -->

	<?php echo $this->element('texts/index_table_entries')?>

	<br>
	
</table>
