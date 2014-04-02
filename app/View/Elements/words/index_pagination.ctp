<br>

<?php 
	echo $this->Html->link(
				'1',
				array(
					'controller' => 'words',
					'action'	=> 'index',
					//REF '?' http://www.dereuromark.de/2013/05/04/passed-named-or-query-string-params/
					'?' => array(
							'page'		=> '1',
							'per_Page'		=> '10')
				));
	
	echo " | ";
	
	echo $this->Html->link(
				'2',
				array(
					'controller' => 'words',
					'action'	=> 'index',
					//REF '?' http://www.dereuromark.de/2013/05/04/passed-named-or-query-string-params/
					'?' => array(
							'page'		=> '2',
							'per_Page'		=> '10')
				));
// 						'page'		=> '3',
// 						'per_Page'		=> '10'
// 					));
?>	

<br>
<br>
