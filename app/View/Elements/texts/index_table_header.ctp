    <!-- <tr class="bb" style="border-bottom: 1px solid black !important;"> -->
    <tr style="border-bottom: 3px solid blue !important;">
        <td><?php echo "ID"; ?></td>
        
        <!-- <td colspan="5" style="bgcolor: blue;"> -->
        <td colspan="5"">
            <?php echo "Title"; ?>
        </td>
        
        <td colspan="3">
        	Word ids
        </td>
    </tr>
    
    <tr>
        <td rowspan="3" colspan="6" class="bb">
        		<?php echo "Text"; ?>
        </td>
        
        <td colspan="3">
            <?php echo "URL" ?>
	    </td>
            		
    </tr>
    <tr>
    	<td>
    		Lang id
    		<?php 
    		
	    		$opt_create = array(
	    		
	    				'div'	=> false,
	    				//REF http://wiltonsoftware.com/posts/view/customizing-your-form-labels-in-cakephp-1-2
	    				'label'	=> false,
	    				'url'	=> array(
	    						'controller'	=> 'texts',
	    						'action'	=> 'index'),
	    				'type'	=> 'get'
	    		
				
	    		);
    		
	    		echo $this->Form->create('', $opt_create);
	    		
	    		echo $this->Form->input(
	    				'filter_lang',
	    				// 						'Lang id',
	    				array(
	    						'type' => 'select',
	    						'options' => $select_Langs
	    				)
	    					
	    					
	    		);
	    		
	    		echo $this->Form->end('Filter');
	    		
    		?>
    	</td>
    	
    	<td>Genre id</td>
        <td>Created at</td>
        
    </tr>
    <tr>
    	<td class="bb">Rails id</td>
    	<td class="bb">Subgenre id</td>
    	<td class="bb">Updated at</td>
    </tr>
