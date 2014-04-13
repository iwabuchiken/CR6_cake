<!-- File: /app/View/Posts/index.ctp -->

<!-- REF bottom http://stackoverflow.com/questions/1384823/how-to-specify-the-bottom-border-of-a-tr -->
<style type="text/css">
    tr.bb, td.bb {
/*     .bb td, .bb th { */
     border-bottom: 3px solid blue !important;
/*      border-bottom: 1px solid black !important; */
    }
</style>

<!-- REF id http://stackoverflow.com/questions/484719/html-anchors-with-name-or-id -->
<a id="top"></a>
<a href="#bottom">Bottom</a>
<br>
<br>

<?php
// $var = 'ABCDEFGH:/MNRPQR/';
// echo "Original: $var<hr />\n";

// /* These two examples replace all of $var with 'bob'. */
// echo substr_replace($var, 'bob', 0) . "<br />\n";
// echo substr_replace($var, 'bob', 0, strlen($var)) . "<br />\n";

// /* Insert 'bob' right at the beginning of $var. */
// echo substr_replace($var, 'bob', 0, 0) . "<br />\n";

// /* These next two replace 'MNRPQR' in $var with 'bob'. */
// echo substr_replace($var, 'bob', 10, -1) . "<br />\n";
// echo substr_replace($var, 'bob', -7, -1) . "<br />\n";

// /* Delete 'MNRPQR' from $var. */
// echo substr_replace($var, '', 10, -1) . "<br />\n";
?>

<?php echo $this->element('texts/view/_view_title_text')?>

<br>
<br>

<?php echo $this->element('texts/view/_view_text_data')?>

<a id="bottom"></a>
<a href="#top">Top</a>

<br><br>

	<?php echo $this->element('texts/index_links')?>
	
	<br>
	<br>
	
		<?php echo $this->Html->link(
					'Update Text',
					array(
						'controller' => 'texts',
						'action' => 'edit',
						$text['Text']['id']));
// 						'id' => $text['Text']['id']));
	?>
	<br>
	<br>
	
	
	<?php echo $this->element('texts/index_links_to_models')?>