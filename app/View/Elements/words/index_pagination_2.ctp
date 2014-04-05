<br>

Pagination 2
<br>
<?php 

// 	$range = array(1, 10);
	
	$msg = "range[0]=$range[0]/range[1]=$range[1]";
	
	write_Log(
		CONS::get_dPath_Log(),
		$msg,
		__FILE__,
		__LINE__);
	
	
	for ($i = $range[0]; $i <= $range[1]; $i++) {
		
		echo $this->Html->link(
				strval($i),
				array(
						'controller' => 'words',
						'action'	=> 'index',
						//REF '?' http://www.dereuromark.de/2013/05/04/passed-named-or-query-string-params/
						'?' => array(
								'page'		=> strval($i),
								'per_Page'		=> strval($per_page))
				));
		
		echo " | ";
		
	}
		
?>	

<br>
<br>
