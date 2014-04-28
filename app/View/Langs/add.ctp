<!-- File: /app/View/Posts/add.ctp -->

<h1>Add Text</h1>
<?php
echo $this->Form->create('Lang');
echo $this->Form->input('name');

echo $this->Form->end('Save lang');
?>

<br>

<?php echo $this->Html->link(
    'Back to list',
    array('controller' => 'langs', 'action' => 'index')
); ?>
