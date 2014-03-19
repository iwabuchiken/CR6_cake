<!-- File: /app/View/Posts/add.ctp -->

<h1>Add Text</h1>
<?php
echo $this->Form->create('Text');
echo $this->Form->input('text');
echo $this->Form->input('url');


echo $this->Form->end('Save keyword');
?>

<br>

<?php echo $this->Html->link(
    'List',
    array('controller' => 'texts', 'action' => 'index')
); ?>
