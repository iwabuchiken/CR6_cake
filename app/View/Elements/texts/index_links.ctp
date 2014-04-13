
	<a href="http://benfranklin.chips.jp/cake_apps/CR6_cake/texts/index"
		target="_blank">
		PHP site
	</a>
	
	<br>
	
	<?php echo $this->Html->link(
					'Add Text',
					array('controller' => 'texts', 'action' => 'add'));
	?>
	
	<br>
	<br>
	
	<?php echo $this->Html->link(
					'Build texts from csv',
					array('controller' => 'texts', 'action' => 'build_texts'));
	?>	

	<br>
	
	<!-- REF confirm http://book.cakephp.org/2.0/en/core-libraries/helpers/html.html -->
	<?php echo $this->Html->link(
					'Delete all texts',
					array(
						'controller' => 'texts',
						'action' => 'delete_all'),
					array(),
					"Delete all?");
	?>	

	<br>
	<br>
	
	<?php 
// 		$cons = new CONS();
		
// 		$host_name = $cons->get_HostName();
	
// 		if ($host_name != null && $host_name == $cons->local_HostName) {
		
			echo $this->Html->link(
					'Exec sql',
					array(
						'controller' => 'texts',
						'action' => 'exec_Sql')
					);
			
			echo " | ";
			
			echo $this->Html->link(
					'Exec tasks',
					array(
							'controller' => 'texts',
							'action' => 'exec_Tasks'));
		
			echo " | ";
			
			echo $this->Html->link(
					'Update lang_id values',
					array(
							'controller' => 'texts',
							'action' => 'update_RailsID'));
		
// 		} else {
		
// 			echo "NOT A LOCALHOST";

// 		}
	?>	

	<br>
	<br>
