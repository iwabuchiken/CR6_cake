    <!-- <tr class="bb" style="border-bottom: 1px solid black !important;"> -->
    <tr style="border-bottom: 3px solid blue !important;">
        <td><?php echo "ID"; ?></td>
        
        <!-- <td colspan="5" style="bgcolor: blue;"> -->
        <td>
        	<?php
        		
        		if ($query_String != null) {
        		
        			$query = $query_String."&"."sort=w1";
        		
        		} else {

					$query = "sort=w1";
        		
        		}
        		echo $this->Html->link('w1',
						array(
							'controller' => 'words',
// 							'controller' => 'langs',
							'action' => 'index',
							'?' => $query));
			?>
			
            <?php
            
// 				echo "w1";
			
            ?>
            
        </td>
        
        <td>
            <?php echo "w2"; ?>
        </td>
        
        <td>
            <?php echo "w3"; ?>
        </td>
        
        <td>
            <?php echo "Text ids"; ?>
        </td>
        
        <td>
            <?php echo "Lang"; ?>
        </td>
        
        <td>
        	Created at
        </td>
        
        <td>
        	Updated at
        </td>
        
    </tr>
    
