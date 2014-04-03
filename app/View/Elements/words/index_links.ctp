
	<a href="http://benfranklin.chips.jp/cake_apps/CR6_cake/langs/index"
		target="_blank">
		PHP site
	</a>
	
	<br>
	
	<?php echo $this->Html->link(
					'Build words from csv (1)',
					array('controller' => 'words', 'action' => 'build_Words_1'));
	?>	

	<br>
	
	<?php echo $this->Html->link(
					'Build words from csv (2)',
					array('controller' => 'words', 'action' => 'build_Words_2'));
	?>	

	<br>
	<?php echo $this->Html->link(
					'Build words from csv (3)',
					array('controller' => 'words', 'action' => 'build_Words_3'));
	?>	
	
	<br>
	<?php echo $this->Html->link(
					'Build words from csv (4)',
					array('controller' => 'words', 'action' => 'build_Words_4'));
	?>	

	<br>
	<br>
	
	<!-- REF confirm http://book.cakephp.org/2.0/en/core-libraries/helpers/html.html -->
	<?php echo $this->Html->link(
					'Delete all words',
					array(
						'controller' => 'words',
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
					'Recreate table',
					array(
						'controller' => 'words',
						'action' => 'recreate_Table')
					);
			
		
// 		} else {
		
// 			echo "NOT A LOCALHOST";

// 		}
	?>	

	