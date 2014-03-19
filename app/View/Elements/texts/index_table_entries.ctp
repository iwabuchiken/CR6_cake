    <?php foreach ($texts as $text): ?>
    <tr>
    	<!-- REF bgcolor http://www.w3schools.com/tags/att_td_bgcolor.asp -->
        <td bgcolor="yellow"><?php echo $text['Text']['id']; ?></td>
        <td colspan="5">
            <?php echo $this->Html->link($text['Text']['title'],
						array(
							'controller' => 'texts',
							'action' => 'view',
							$text['Text']['id'])); ?>
        </td>
        <td colspan="3">
        	word ids
        </td>
    </tr>
    
    <tr>
        <td rowspan="3" colspan="6">
        		<?php echo $text['Text']['text']; ?>
        </td>
        
        <td colspan="3">
            <?php
            		//REF link http://stackoverflow.com/questions/9401490/cakephp-2-x-html-helper-for-external-link-not-working
            		$link = "";
            		if ($text['Text']['url']) {
            		
//             			$link = $text['Text']['url'];
	            		echo $this->Html->link(
	            				$text['Text']['url'],
	            				$text['Text']['url'],
								array('target' => '_blank')
								);
            		
            		} else {

						echo "No url data";
						
            		}
            ?>
	    </td>
            		
    </tr>
    <tr>
    	<td>lang id</td>
    	<td>data</td>
        <td><?php echo $text['Text']['created_at']; ?></td>
        
    </tr>
    <tr>
    	<td>data</td>
    	<td>data</td>
    	<td><?php echo $text['Text']['updated_at']; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php unset($text); ?>
    
