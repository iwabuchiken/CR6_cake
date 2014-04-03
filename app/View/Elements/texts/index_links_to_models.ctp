<br>
<br>
	
	<?php 
		
		echo $this->Html->link(
				'Texts',
				array(
					'controller' => 'texts',
					'action' => 'index')
				);
			
	?>	

	<?php echo " | "; ?>
	
	<?php 
		
		echo $this->Html->link(
				'Langs',
				array(
					'controller' => 'langs',
					'action' => 'index')
				);
			
	?>	

	<?php echo " | "; ?>
	
	<?php 
		
		echo $this->Html->link(
				'Words',
				array(
					'controller' => 'words',
					'action' => 'index')
				);
			
	?>	
	
	<?php echo " | "; ?>
	
	<?php 
		
		echo $this->Html->link(
				'Youtube',
				array(
					'controller' => 'words',
					'action' => 'youTube')
				);
			
	?>	
	