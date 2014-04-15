<style type="text/css">

/* input[type:submit] { */
/* input[type=submit] { */
input[type="submit"] {
	
	color: red;

}

/* input[type="submit"] { */
	
/* 	color: red; */

/* } */

</style>


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

        <!-- w1 ---------------------------------------->
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
			
			<br>
			
			<?php 
			
				echo $this->Form->create('Word',
								array(
									'type' => 'get',
									'action' => 'index'
// 									'?' => $query_String
								)
						);
				
				echo $this->Form->input('w1',
								array(
									'style' => 'width: 100px;height: 50px;',
									'label' => '',
									'name' => 'filter[w1]'
// 									'name' => 'filter_w1'
							));
				
// 				echo $this->Form->input('w1',
// 								array(
// 									'style' => 'width: 100px;height: 50px;',
// 									'label' => 'ww',
// 									'name' => 'filter[w1]'
// 							));
				
				echo $this->Form->end('Search'
// 						,
// 						array(
// 							'label' => 'go',
// 							'style' => 'color: red;'
// 						)

						);
			
			?>
			
            <?php
            
// 				echo "w1";
			
            ?>
            
        </td>
        
        <!-- w2 ---------------------------------------->
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
        
        	<br>
			
			<?php 
			
				echo $this->Form->create('Word',
						array(
									'type' => 'get',
									'action' => 'index'
// 									'?' => $query_String
								)
				);

				echo $this->Form->input('w2',
								array(
									'style' => 'width: 100px;height: 50px;',
									'label' => '',
// 									'name' => 'filter_w2'
									'name' => 'filter[w2]'
							));
				
				echo $this->Form->end('Search'
// 						,
// 						array(
// 							'label' => 'go',
// 							'style' => 'color: red;'
// 						)

						);
			
			?>
			
            <?php
//             	echo "w2"; 
            ?>
        </td>
        
        <!-- w3 ---------------------------------------->
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
        	
        	<br>
			
			<?php 
			
				echo $this->Form->create('Word',
						array(
							'type' => 'get',
							'action' => 'index'
						// 									'?' => $query_String
				));
				echo $this->Form->input('w3',
								array(
									'style' => 'width: 100px;height: 50px;',
									'label' => '',
									'name' => 'filter[w3]'
// 									'name' => 'filter_w3'
							));
				
				echo $this->Form->end('Search'
// 						,
// 						array(
// 							'label' => 'go',
// 							'style' => 'color: red;'
// 						)

						);
			
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
    
