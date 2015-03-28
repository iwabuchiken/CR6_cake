<!-- File: /app/View/Posts/add.ctp -->

<h1>Edit Text</h1>
<?php
echo $this->Form->create('Text', array('type' => 'post'));
echo $this->Form->input('text');
echo $this->Form->input('url');

echo $this->Form->input('memo');

// REF http://stackoverflow.com/questions/19213165/cakephp-hidden-input-field answered Oct 6 '13 at 19:51
// echo $this->Form->input('updated_at', array(
// 							'type' => 'hidden',
// 							'value'	=> Utils::get_CurrentTime2(CONS::$timeLabelTypes["basic"])
// ));

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


echo $this->Form->end('Update text');
?>

<br>

<?php echo $this->Html->link(
    'Back to list',
    array('controller' => 'texts', 'action' => 'index')
); ?>
