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

<?php debug($word); ?>

<a id="bottom"></a>
<a href="#top">Top</a>

<br><br>

	<?php echo $this->element('texts/index_links')?>
	
	<br>
	<br>
	
	<?php echo $this->element('texts/index_links_to_models')?>