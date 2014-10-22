<!-- File: /app/View/Posts/add.ctp -->

<h1>Add Text</h1>
<?php

	$opt_input_w1 = array(
	
			'onmouseover' => 'this.select();',
	
			'rows' => '5',
	
			// 	        		'class'	=> 'add_name'
			'cols'	=> '5',
	
			//REF width http://mbsupport.dip.jp/hp/form_10.htm
			//REF color name http://www.colordic.org/
			'style'	=> 'width: 60%; background: wheat',
	
			// 						'width'	=> '100px'
			// 						'columns'	=> '5'
	
	);
	
	$opt_input_w2 = array(
	
			'onmouseover' => 'this.select();',
	
			'rows' => '2',
	
			// 	        		'class'	=> 'add_name'
			'cols'	=> '5',
			'style'	=> 'width: 60%; background: lightsteelblue'
			// 						'width'	=> '100px'
			// 						'columns'	=> '5'
	
	);
	
	$opt_input_w3 = array(
	
			'onmouseover' => 'this.select();',
	
			'rows' => '1',
	
			// 	        		'class'	=> 'add_name'
			'cols'	=> '5',
			'style'	=> 'width: 60%; background: palegreen'
			// 						'width'	=> '100px'
			// 						'columns'	=> '5'
	
	);


	echo $this->Form->create('Text', array('onmouseover' => "this.select();"));
	echo $this->Form->input('text', $opt_input_w1);
	echo $this->Form->input('url', $opt_input_w2);
	echo $this->Form->input('memo', $opt_input_w3);
	
	echo $this->Form->input(
							'lang_id',
	// 						'Lang id',
							array(
									'type' => 'select',
									'options' => $select_Langs
							)
			
			
			);

// echo $this->Form->select(
// 					'Lang id',
// 					$select_Langs,
// 					21,
// 					reset(array_keys($select_Langs)),
// 					array('empty' => false));

// echo $this->Form->input('Lang');
// echo $this->Form->input('lang_id');


	echo $this->Form->end('Save text');
	
?>

<br>

<?php echo $this->Html->link(
    'Back to list',
    array('controller' => 'texts', 'action' => 'index')
); ?>
