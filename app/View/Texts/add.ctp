<!-- File: /app/View/Posts/add.ctp -->

<h1>Add Text</h1>
<?php
echo $this->Form->create('Text', array('onmouseover' => "this.select();"));
echo $this->Form->input('text', array('onmouseover' => "this.select();"));
echo $this->Form->input('url', array('onmouseover' => "this.select();"));
echo $this->Form->input('memo', array('onmouseover' => "this.select();"));

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
