	<?php 
		
		echo $this->Html->link(
				'Texts',
				array(
					'controller' => 'texts',
					'action' => 'index')
				,
				array('class' => 'button')
				);
			
	?>	

	<?php 
		
		echo $this->Html->link(
				'Langs',
				array(
					'controller' => 'langs',
					'action' => 'index')
				,
				array('class' => 'button')
				);
			
	?>	

	<?php //echo " | "; ?>
	
	<?php 
		
		if ($this->params->action == "view"
				&& $this->params->controller == "words") {
		
			$id = $word['Word']['id'];
			
			$div	= floor($id / 10);
			$resi	= $id % 10;
			
// 			debug("\$div = ".$div." / "."\$resi = ".$resi);
			
			if ($resi == 0) {
			
				$page_Num = $div;
				
			} else {
			
				$page_Num = $div + 1;
			
			}
			;
			
			echo $this->Html->link(
					'Words',
					array(
						'controller' => 'words',
						'action' => 'index',
						'?' => "page=$page_Num&per_Page=10")
// 						'?' => "page=2&per_Page=10")
					,
					array('class' => 'button')

					);
			
		} else {
		
			echo $this->Html->link(
					'Words',
					array(
						'controller' => 'words',
						'action' => 'index',
						'?' => "page=1&per_Page=10")
					,
					array('class' => 'button')
					);
		
		}
		;
		
			
	?>	
	
	<?php //echo " | "; ?>
	
	<?php 
		
		echo $this->Html->link(
				'Youtube',
				array(
					'controller' => 'words',
					'action' => 'youTube')
				);
			
	?>	
	