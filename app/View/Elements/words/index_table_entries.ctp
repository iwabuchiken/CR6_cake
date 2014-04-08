    <?php foreach ($words as $word): ?>
    <tr>
    	<!-- REF bgcolor http://www.w3schools.com/tags/att_td_bgcolor.asp -->
        <td bgcolor="yellow">
        <!-- <td bgcolor="yellow"> -->
        	<?php echo $word['Word']['id']; ?>
        </td>
        
        <td>
            <?php
            	
            	echo $this->Html->link($word['Word']['w1'],
						array(
							'controller' => 'words',
// 							'controller' => 'langs',
							'action' => 'view',
							$word['Word']['id'])); ?>
<!-- 							$word['Lang']['id'])); ?> -->
        </td>
        
        <td>
            <?php
            	
            	echo $word['Word']['w2']; ?>
        </td>
        
        <td>
            <?php
            	
            	echo $word['Word']['w3']; ?>
        </td>
        
        <td>
            <?php
            	
            	echo $word['Word']['text_ids']; ?>
        </td>
        
        <td>
            <?php
            	
            	echo $word['Lang']['name']; ?>
        </td>
        
        <td>
        	<?php 
        		echo $word['Word']['created_at']
        	?>
        </td>
        
        <td>
        	<?php 
        		echo $word['Word']['updated_at']
        	?>
        </td>
        
    </tr>
    
    <?php endforeach; ?>
    <?php unset($text); ?>
    
