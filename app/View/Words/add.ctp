<!-- File: /app/View/Posts/add.ctp -->

<h1>Add Word</h1>
<?php
echo $this->Form->create('Word');
echo $this->Form->input('w1');
echo $this->Form->input('w2');
echo $this->Form->input('w3');

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
