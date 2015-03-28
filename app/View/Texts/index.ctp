<!-- File: /app/View/Posts/index.ctp -->

<!-- REF bottom http://stackoverflow.com/questions/1384823/how-to-specify-the-bottom-border-of-a-tr -->
<style type="text/css">
    tr.bb, td.bb {
/*     .bb td, .bb th { */
     border-bottom: 3px solid blue !important;
/*      border-bottom: 1px solid black !important; */
    }
</style>
  
<h1>
	Texts
	
	(total = <?php echo $num_of_texts; ?>, pages = <?php echo $num_of_pages; ?>)
	
</h1>

<?php echo $this->element('texts/_index_pagination')?>

<!-- REF id http://stackoverflow.com/questions/484719/html-anchors-with-name-or-id -->
<a id="top"></a>
<br>
<a href="#bottom">Bottom</a>
	(
	
	filter_lang = 
			<?php 
// 			echo $filter_lang; 
			?> /

			<?php 
	 		
		 		if (isset($filter_lang)) {
		 		
		 			//REF http://stackoverflow.com/questions/9014289/span-in-link-with-class answered Apr 17 '14 at 16:11
		 			echo $this->Html->tag('span', $filter_lang, array('class' => 'color_blue'));
		 				
		 		} else {
		 				
		 			echo "NO DATA";
		 				
		 		}
		 		
// 	 			echo $filter_lang
 			?> /
			
	 filter_text = 
	 		<?php 
	 		
		 		if (isset($filter_text)) {
		 		
		 			//REF http://stackoverflow.com/questions/9014289/span-in-link-with-class answered Apr 17 '14 at 16:11
		 			echo $this->Html->tag('span', $filter_text, array('class' => 'color_blue'));
		 				
		 		} else {
		 				
		 			echo "NO DATA";
		 				
		 		}
		 		
// 	 			echo $filter_text
 			?> /
	 
	 sort = <?php 
	 	
	 			if (isset($sort)) {

					//REF http://stackoverflow.com/questions/9014289/span-in-link-with-class answered Apr 17 '14 at 16:11
					echo $this->Html->tag('span', $sort, array('class' => 'color_blue'));
					
	 			} else {
	 			
	 				echo "NO DATA";
	 			
	 			}
	 			
// 	 			echo (isset($sort) ? $filter_text : ""); 
	 			
 			?>
	 			
	 )
<br>
<br>



<!-- REF border http://www.newcredge.com/IT/www/html/tag/table/table-border-tr-td.html -->
<table border="1">

	<?php echo $this->element('texts/index_table_header')?>
	
    <!-- Here is where we loop through our $posts array, printing out post info -->

	<?php echo $this->element('texts/index_table_entries')?>

	
</table>

<?php echo $this->element('texts/_index_pagination')?>

<br>
<a id="bottom"></a>
<a href="#top">Top</a>
<br><br>

	<?php echo $this->element('texts/index_links')?>
	
	<?php echo $this->element('texts/index_links_to_models')?>