<!-- File: /app/View/Posts/add.ctp -->

<h1>Add Word</h1>
<?php

	$opt_input_w1 = array(
	
			'onmouseover' => 'this.select();',
	
			'rows' => '1',
			 
			// 	        		'class'	=> 'add_name'
			'cols'	=> '5',
			
			//REF width http://mbsupport.dip.jp/hp/form_10.htm
			//REF color name http://www.colordic.org/
			'style'	=> 'width: 25%; background: lightsteelblue',
			
// 						'width'	=> '100px'
// 						'columns'	=> '5'
		    
	);

	$opt_input_w2 = array(
	
			'onmouseover' => 'this.select();',
	
			'rows' => '1',
			 
			// 	        		'class'	=> 'add_name'
			'cols'	=> '5',
			'style'	=> 'width: 25%; background: wheat'
// 						'width'	=> '100px'
// 						'columns'	=> '5'
		    
	);

	$opt_input_w3 = array(
	
			'onmouseover' => 'this.select();',
	
			'rows' => '1',
			 
			// 	        		'class'	=> 'add_name'
			'cols'	=> '5',
			'style'	=> 'width: 25%; background: palegreen'
// 						'width'	=> '100px'
// 						'columns'	=> '5'
		    
	);

	echo $this->Form->create('Word');
	echo $this->Form->input('w1', $opt_input_w1);
	echo $this->Form->input('w2', $opt_input_w2);
	echo $this->Form->input('w3', $opt_input_w3);
	
	echo $this->Form->input(
			'lang_id',
			// 						'Lang id',
			array(
					'type' => 'select',
					'options' => $select_Langs
			)
	
	
	);
	
	
	echo $this->Form->end('Save word');
?>

<br>

<?php echo $this->Html->link(
    'Back to list',
    array('controller' => 'words', 'action' => 'index')
); ?>
