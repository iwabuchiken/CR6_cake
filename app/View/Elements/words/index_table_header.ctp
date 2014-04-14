    <!-- <tr class="bb" style="border-bottom: 1px solid black !important;"> -->
    <tr style="border-bottom: 3px solid blue !important;">
        <td>
        	<?php
        		
        		if ($query_String != null) {
        		
        			$query = $query_String."&"."sort=id";
        		
        		} else {

					$query = "sort=id";
        		
        		}
        		echo $this->Html->link('id',
						array(
							'controller' => 'words',
// 							'controller' => 'langs',
							'action' => 'index',
							'?' => $query));
			?>
        
        	<?php 
//         	echo "ID"; ?>
        </td>
        
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
        	<?php
	        	if ($query_String != null) {
	        	
	        		$query = $query_String."&"."sort=w2";
	        	
	        	} else {
	        	
	        		$query = "sort=w2";
	        	
	        	}
	        	echo $this->Html->link('w2',
	        			array(
	        					'controller' => 'words',
	        					// 							'controller' => 'langs',
	        					'action' => 'index',
	        					'?' => $query));
	        	 
        	?>
        
            <?php
//             	echo "w2"; 
            ?>
        </td>
        
        <td>
        	<?php
	        	if ($query_String != null) {
	        	
	        		$query = $query_String."&"."sort=w3";
	        	
	        	} else {
	        	
	        		$query = "sort=w3";
	        	
	        	}
	        	echo $this->Html->link('w3',
	        			array(
	        					'controller' => 'words',
	        					// 							'controller' => 'langs',
	        					'action' => 'index',
	        					'?' => $query));
	        	 
        	?>
        	
            <?php
//             echo "w3"; ?>
        </td>
        
        <td>
            <?php echo "Text ids"; ?>
        </td>
        
        <td>
        	<?php
        		
        		if ($query_String != null) {
        		
        			$query = $query_String."&"."sort=lang_id";
        		
        		} else {

					$query = "sort=lang_id";
        		
        		}
        		echo $this->Html->link('lang_id',
						array(
							'controller' => 'words',
// 							'controller' => 'langs',
							'action' => 'index',
							'?' => $query));
			?>
        
            <?php 
//             	echo "Lang"; ?>
        </td>
        
        <td>
        	Created at
        </td>
        
        <td>
        	Updated at
        </td>
        
    </tr>
    
