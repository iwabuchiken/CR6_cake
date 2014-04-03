<!-- File: /app/View/Posts/index.ctp -->

<!-- REF bottom http://stackoverflow.com/questions/1384823/how-to-specify-the-bottom-border-of-a-tr -->
<style type="text/css">
    tr.bb, td.bb {
/*     .bb td, .bb th { */
     border-bottom: 3px solid blue !important;
/*      border-bottom: 1px solid black !important; */
    }
    
    #disp_2 {
    	float: right;
    }
    
</style>
  
<div id="ytplayer">

	<p>You will need Flash 8 or better to view this content.</p>
	
</div>

<div>
	<?php echo $this->element('words/youtube/_you_tube_display_1')?>
	
</div>
	
<!-- <div id="disp_2"> -->
	<?php //echo $this->element('words/youtube/_you_tube_display_2')?>
	
<!-- </div> -->
	
	<br>
	<br>
	
	<?php echo $this->element('words/index_links')?>
	
	<br><br>
	
	<?php echo $this->element('texts/index_links_to_models')?>
	
	