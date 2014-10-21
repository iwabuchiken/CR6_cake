
	<a href="http://benfranklin.chips.jp/cake_apps/CR6_cake/texts/index"
		target="_blank">
		PHP site
	</a>
	
	<br>
	<br>
	
	<?php echo $this->Html->link(
// 					"<font color='blue'>Add Text!</font>",
					"Add Text!",
					array(
							'controller' => 'texts', 
							'action' => 'add',
// 							'style'		=> 'color: blue'
// 							'style'		=> array('color: blue')
							),
					//REF http://detail.chiebukuro.yahoo.co.jp/qa/question_detail/q1289550192
					array(
							'style'	=> 'color: blue')
				);
	?>

	<br>
	<br>
	
	<div class="hidden_elements">
		<button id="bt_texts_special_ops" class="generic_bt_1">
			Special ops
		</button>
		<div id="texts_special_ops" style="display: none">
			<div>
				<?php echo $this->Html->link(
								'Build texts from csv',
								array('controller' => 'texts', 'action' => 'build_texts'));
				?>	
			</div>
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
			?>	
		</div><!-- <div style="display: none"> -->
	</div><!-- <div class="hidden_elements"> -->

	<br>
	
