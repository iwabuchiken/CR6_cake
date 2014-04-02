<br>

<?php 

	$iterate = $total / $per_page;

	for ($i = 0; $i < $iterate; $i++) {
		
		echo $this->Html->link(
					strval($i + 1),
					array(
						'controller' => 'words',
						'action'	=> 'index',
						//REF '?' http://www.dereuromark.de/2013/05/04/passed-named-or-query-string-params/
						'?' => array(
								'page'		=> strval($i + 1),
								'per_Page'		=> strval($per_page))
					));
		
		echo " | ";
		
		
	}
		
?>	

<br>
<br>
