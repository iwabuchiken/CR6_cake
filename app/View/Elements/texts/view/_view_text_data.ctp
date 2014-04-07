<table>
<!-- <table border="1"> -->
  <tr>
  
    <td colspan="1">URL</td>
    
    <td colspan="3">
    		<a 
    			href="<?php echo $text['Text']['url']; ?>"
    			target="_blank">
    			<?php echo $text['Text']['url']; ?>
    		</a>
    		<?php //$this->Html->link(
					//$text['Text']['url'],
//     				$html->url($text['Text']['url'], true)
//     				array('url' => $text['Text']['url'])
// 					);
			?>
			
    		<?php //echo $text['Text']['url']?>
    </td>
    
  </tr>
  
  <tr>
  
    <td colspan="1">Words</td>
    
    <td colspan="3"></td>
    
  </tr>
  
  <tr>
  
    <td colspan="1">Genre=<?php echo $text['Text']['genre_id']; ?></td>
    
    <td colspan="1">Sub genre=<?php echo $text['Text']['subgenre_id']; ?></td>
    
    <td colspan="2">Lang=<?php echo $text['Lang']['name']; ?></td>
    
  </tr>
  
  <tr>
  
    <td colspan="2">Created=<?php echo $text['Text']['created_at']; ?></td>

    <td colspan="2">Updated=<?php echo $text['Text']['updated_at']; ?></td>
    
  </tr>
  
  <tr>
  
    <td colspan="4">Memo: <?php echo $text['Text']['memo']; ?></td>

  </tr>
  
</table>







