    <?php foreach ($texts as $text): ?>
    <tr>
        <td><?php echo $text['Text']['id']; ?></td>
        <td>
            <?php echo $this->Html->link($text['Text']['title'],
						array(
							'controller' => 'texts',
							'action' => 'view',
							$text['Text']['id'])); ?>
        </td>
        
        <td><?php echo $text['Text']['text']; ?></td>
        
        <td><?php echo $text['Text']['created_at']; ?></td>
        
    </tr>
    <?php endforeach; ?>
    <?php unset($text); ?>
    
