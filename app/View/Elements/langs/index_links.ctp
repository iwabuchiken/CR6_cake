
	<a href="http://benfranklin.chips.jp/cake_apps/CR6_cake/langs/index"
		target="_blank">
		PHP site
	</a>
	
	<br>
	
	<?php echo $this->Html->link(
					'Build langs from csv',
					array('controller' => 'langs', 'action' => 'build_Langs'));
	?>	

	<br>
	
	<!-- REF confirm http://book.cakephp.org/2.0/en/core-libraries/helpers/html.html -->
	<?php echo $this->Html->link(
					'Delete all langs',
					array(
						'controller' => 'langs',
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
						'controller' => 'langs',
						'action' => 'exec_Sql')
					);
			
		
// 		} else {
		
// 			echo "NOT A LOCALHOST";

// 		}
	?>	

	<br>
	<br>
	
	<?php echo $this->Html->link(
					'Add Lang',
					array('controller' => 'langs', 'action' => 'add'));
	?>
	
	