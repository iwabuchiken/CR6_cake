<!-- Elements\words\index_links.ctp -->

	<a href="http://benfranklin.chips.jp/cake_apps/CR6_cake/langs/index"
		target="_blank">
		PHP site
	</a>
	
	<br>
	<br>
	
	<?php echo $this->Html->link(
					'Add Word',
					array('controller' => 'words', 'action' => 'add'),
					array(
// 							'style'	=> 'color: blue'
							'class'		=> 'link_word'
					)
	
				);
	?>
		
	<?php if($this->params->action != "index") { ?>
	
		|
		
		<?php echo $this->Html->link(
						'Edit Word',
						array(
								'controller' => 'words', 
								'action' => 'edit', 
								$word['Word']['id']
						),
	
						array(
	// 							'style'	=> 'color: blue'
								'class'		=> 'link_word'
						)
		
					);
		?>
	
	|
	
		<?php echo $this->Html->link(
						'Delete Word',
						array(
								'controller' => 'words', 
								'action' => 'delete', 
								$word['Word']['id']
						),
	
						array(
	// 							'style'	=> 'color: blue'
								'class'		=> 'link_word_alert'
						),
						//REF http://stackoverflow.com/questions/22519966/cakephp-delete-confirmation answered Mar 19 at 23:18
						__("Delete? => %s", $word['Word']['w1'])
		
					);
		?>
	
	<?php } ?>
	
	<br>
	<br>
	
	<div class="hidden_elements">
		<button id="bt_texts_special_ops" class="generic_bt_1">
				Special ops
		</button>
		<br>
		<div id="texts_special_ops" style="display: none">
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
			
			<?php 
				echo " | "; ?>
			
			<?php //echo $this->Html->link(
		// 					'Swap w2 with w3',
		// 					array(
		// 						'controller' => 'words',
		// 						'action' => 'swap_w2_w3',
		// 						'?' => $query_String)
		// 					);
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
			
			<?php 
			
				echo " | ";
			
				echo "Update lang_id values: ";
				
				for($i = 1; $i <= 4; $i++) {
		
					echo $this->Html->link(
								"Lot $i / ",
		// 						'Lot 1',
								array(
										'controller' => 'words',
										'action' => 'update_RailsID',
										$i)
					);
		
				}//for($i = 1; $i <= 4; $i++)
			
			?>
		</div><!-- <div id="texts_special_ops" style="display: none"> -->
	</div><!-- <div class="hidden_elements"> -->


	