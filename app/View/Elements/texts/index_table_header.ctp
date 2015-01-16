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
        	<?php 

				$opt_input = array(
				
						'onmouseover' => 'this.select()',
						'rows' => '1',
// 						'cols'	=> '1'
						//REF http://stackoverflow.com/questions/973637/how-do-i-set-the-width-of-a-text-box-in-cakephp-using-the-style-option
						'style'	=> 'width: 200px',
						'label'	=> '',
						'name'	=> 'filter_text'
// 						'div'	=> false,
			
				);
				
				if ($filter_text != null) {
// 				if ($filter_lang != null) {
					
					$opt_input['value'] = $filter_text;
					
					$opt_input['type'] = "text";
					
				}
				
				$opt_create = array(
						
						'div'	=> false,
						//REF http://wiltonsoftware.com/posts/view/customizing-your-form-labels-in-cakephp-1-2
						'label'	=> false,
						'url'	=> array(
										'controller'	=> 'texts',
										'action'	=> 'index'),
						'type'	=> 'get'
						
					
				);
					
				$opt_End = array(
						
						'div'	=> false,
						'label'	=> false,
// 						'size'	=> 10,
// 						'style'	=> '',
// 						'font'	=> '',
// 						'style'	=> 'font-size: 3px',
// 						'class'	=> 'form-button',
					
				);
					
				echo $this->Form->create(null, $opt_create);
// 				echo $this->Form->create('', $opt_create);
// 				echo $this->Form->create('Filter');
				
				echo $this->Form->input('filter', $opt_input);
				
// 				echo $this->Form->end('Go', $opt_End);
				//REF http://cakephp.1045679.n5.nabble.com/removing-lt-div-gt-in-Form-gt-end-closing-in-cakephp-1-3-td5714867.html
// 				echo $this->Form->end(array('div' => false, 'text' => 'send'));	//=> n/w
// 				echo $this->Form->end('', array('div' => false, 'text' => 'send'));	//=> n/w
				echo $this->Form->end(
								'Filter("__@" to clear)');
// 							'Filter', 
// 							array('div' => false, 'text' => 'send'));
					
			?>
        		
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

				$opt_input_Lang_Id = array(
	    						'type' => 'select',
	    						'options' => $select_Langs,);
// 								'default' => ($chosen_lang_id == null) ? 
// 	    				)
				
				if ($chosen_lang_id != null) {

					//REF http://stackoverflow.com/questions/6259371/cakephp-this-form-input-how-to-set-a-select-default-option answered Jun 7 '11 at 0:38
					$opt_input_Lang_Id['default'] = $chosen_lang_id;
					
				}
    		
	    		echo $this->Form->create('', $opt_create);
	    		
	    		echo $this->Form->input(
	    				'filter_lang',
						$opt_input_Lang_Id
	    				// 						'Lang id',
// 	    				array(
// 	    						'type' => 'select',
// 	    						'options' => $select_Langs,
// 								'default' => ($chosen_lang_id == null) ? 
// 	    				)
	    					
	    					
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
