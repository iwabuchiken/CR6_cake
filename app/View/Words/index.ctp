<!-- File: /app/View/Posts/index.ctp -->

<!-- REF bottom http://stackoverflow.com/questions/1384823/how-to-specify-the-bottom-border-of-a-tr -->
<style type="text/css">
    tr.bb, td.bb {
/*     .bb td, .bb th { */
     border-bottom: 3px solid blue !important;
/*      border-bottom: 1px solid black !important; */
    }
</style>
  
<h1>Words(total=<?php echo $total_Words?>/current=<?php echo count($words); ?>)</h1>

<!-- REF id http://stackoverflow.com/questions/484719/html-anchors-with-name-or-id -->
<a id="top"></a>
<a href="#bottom">Bottom</a>
<br>

<?php echo $this->element('words/index_pagination_2')?>

<!-- REF border http://www.newcredge.com/IT/www/html/tag/table/table-border-tr-td.html -->
<table border="1">

	<?php echo $this->element('words/index_table_header')?>
	
    <!-- Here is where we loop through our $posts array, printing out post info -->

	<?php echo $this->element('words/index_table_entries')?>

	
</table>

<?php // echo $this->element('words/index_pagination')?>

<?php echo $this->element('words/index_pagination_2')?>

<a id="bottom"></a>
<a href="#top">Top</a>
<br><br>

	<?php echo $this->element('words/index_links')?>
	
	<br><br>
	
	<?php echo $this->element('texts/index_links_to_models')?>
	
	