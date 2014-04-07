    <?php foreach ($langs as $lang): ?>
    <tr>
    	<!-- REF bgcolor http://www.w3schools.com/tags/att_td_bgcolor.asp -->
        <td bgcolor="yellow">
        <!-- <td bgcolor="yellow"> -->
        	<?php echo $lang['Lang']['id']; ?>
        </td>
        
        <td>
            <?php
            	
            	echo $this->Html->link($lang['Lang']['name'],
						array(
							'controller' => 'langs',
							'action' => 'view',
							$lang['Lang']['id'])); ?>
        </td>
        
        <td>
        	<?php 
        		echo $lang['Lang']['created_at']
        	?>
        </td>
        
        <td>
        	<?php 
        		echo $lang['Lang']['updated_at']
        	?>
        </td>
        
        <td>
        	<?php 
        		echo $lang['Lang']['r_id']
        	?>
        </td>
        
    </tr>
    
    <?php endforeach; ?>
    <?php unset($text); ?>
    
