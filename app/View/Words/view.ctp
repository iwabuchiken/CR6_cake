<!-- File: /app/View/Posts/index.ctp -->

<!-- REF id http://stackoverflow.com/questions/484719/html-anchors-with-name-or-id -->
<a id="top"></a>
<a href="#bottom">Bottom</a>
<br>
<br>

<table class="view">

  <tr>
    <td class="col_label">
    	ID
    </td>
    
    <td>
    
    	<?php 
    	
    		echo $word['Word']['id'];
    	
    	?>
    	
    </td>
    
  </tr>
  
  <tr>
    <td class="col_label">
    	W1
    </td>
    
    <td>
    
    	<?php 
    	
    		echo $word['Word']['w1'];
    	
    	?>
    	
    </td>
    
  </tr>
  
  <tr>	<!-- W1 -->
    <td class="col_label">
    	W2
    </td>
    
    <td>
    
    	<?php 
    	
    		echo $word['Word']['w2'];
    	
    	?>
    	
    </td>
    
  </tr>
  
  <tr>	<!-- W3 -->
    <td class="col_label">
    	W3
    </td>
    
    <td>
    
    	<?php 
    	
    		echo $word['Word']['w3'];
    	
    	?>
    	
    </td>
    
  </tr>
  
  <tr>	<!-- W3 -->
    <td class="col_label">
    	Created at
    </td>
    
    <td>
    
    	<?php 
    	
    		echo $word['Word']['created_at'];
    	
    	?>
    	
    </td>
    
  </tr>
  
</table>


<?php //debug($word); ?>

<a id="bottom"></a>
<a href="#top">Top</a>

<br><br>

<p>
	<?php echo $this->Html->link(
					'Delete word',
					array(
							'controller' => 'words', 
							'action' => 'delete', 
							$word['Word']['id']
					),
					array(
							// 							'style'	=> 'color: blue'
// 							'class'		=> 'link_word_alert'
					),
						
					//REF http://stackoverflow.com/questions/22519966/cakephp-delete-confirmation answered Mar 19 at 23:18
					__("Delete? => %s", $word['Word']['w1'])
	
				);
	?>

</p>

<br><br>

	<?php echo $this->element('texts/index_links')?>
	
	<br>
	<br>
	
	<?php echo $this->element('texts/index_links_to_models')?>