<!-- Pagination 2 -->
<br>
<?php 

	/****************************************
	* Setup: Variables
	****************************************/
// 	$range = array(1, 10);
	
	$target_Lot = floor($total / $per_page);
// 	$target_Lot = (int)$total / $per_page;
	$residue = $total % $per_page;

	$max_Lot = floor(floor($total / $per_page) / 10);
	$lot_Residue = floor($total / $per_page) % 10;
	
	if ($lot_Residue > 0) {
	
		$max_Lot += 1;
	
	}
	
	$cur_Lot = floor($page / 10);
	$cur_Lot_Residue = $page % 10;
	
	if ($cur_Lot_Residue > 0) {
	
		$cur_Lot += 1;
	
	}
	
	$msg = "\$max_Lot=".$max_Lot
	."/"
			."\$cur_Lot=".$cur_Lot
			;
	
			write_Log(
			CONS::get_dPath_Log(),
			$msg,
			__FILE__,
			__LINE__);
	
	$msg = "range[0]=$range[0]/range[1]=$range[1]";
	
	write_Log(
		CONS::get_dPath_Log(),
		$msg,
		__FILE__,
		__LINE__);
	
	/****************************************
	* Show: <
	****************************************/
	// Arrows: Top page
	if ($cur_Lot != 1) {
// 	if ($page != 1) {
		;
		echo $this->Html->link(
				" < | ",
				array(
						'controller' => 'words',
						'action'	=> 'index',
						//REF '?' http://www.dereuromark.de/2013/05/04/passed-named-or-query-string-params/
						'?' => array(
								'page'		=> 1,
	// 							'page'		=> strval($range[0] - $per_page),
								'per_Page'	=> strval($per_page)
	// 							'per_Page'	=> strval($per_page),
	// 							'move_lot'	=> "prev"
						)
				));
		
	}//if ($page != 1)
	
	/****************************************
	* Show: <<
	****************************************/
	// Arrows
	if ($cur_Lot != 1) {
// 	if ($current_Lot != 1) {
		echo $this->Html->link(
				" << | ",
				array(
						'controller' => 'words',
						'action'	=> 'index',
						//REF '?' http://www.dereuromark.de/2013/05/04/passed-named-or-query-string-params/
						'?' => array(
								'page'		=> strval($range[0] - 1),
	// 							'page'		=> strval($range[0] - $per_page),
								'per_Page'	=> strval($per_page),
								'move_lot'	=> "prev"
						)
				));
		
	}//if ($page != 1)
	
	// Page numbers
	for ($i = $range[0]; $i <= $range[1]; $i++) {
		
		if ($i != $page) {
		
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
			
		} else {
			
			echo strval($i);
			
			echo " | ";
		
		}//if ($i != $page)
		
	}//for ($i = $range[0]; $i <= $range[1]; $i++)

	/****************************************
	* Show: >>
	****************************************/
	// Arrows
	if ($cur_Lot != $max_Lot) {
		echo $this->Html->link(
					" >> ",
					array(
							'controller' => 'words',
							'action'	=> 'index',
							//REF '?' http://www.dereuromark.de/2013/05/04/passed-named-or-query-string-params/
							'?' => array(
									'page'		=> strval($i),
									'per_Page'	=> strval($per_page),
									'move_lot'	=> "next"
									)
			));
	
	}//if ($cur_Lot != $max_Lot)
		
	// Arrows: Last lot
	$target_Page = 0;
	
	$msg = "\$total=".$total
			."/"
			."\$per_page=".$per_page
			."/"
			."\$target_Lot=".$target_Lot
			."/"
			."\$residue=".$residue
			;
	
	write_Log(
		CONS::get_dPath_Log(),
		$msg,
		__FILE__,
		__LINE__);
	
	
	if ($residue > 0) {
	
		$target_Page = $target_Lot + 1;
// 		$target_Page = $target_Lot * $per_page;
	
	} else {
	
		$target_Page = $target_Lot;
// 		$target_Page = ($target_Lot - 1) * $per_page + 1;
		
	}
	
	/****************************************
	* Show: ">"
	****************************************/
	if ($cur_Lot != $max_Lot) {
// 	if ($target_Page != $page) {
		
		echo " | ";
	
		echo $this->Html->link(
					" > ",
					array(
							'controller' => 'words',
							'action'	=> 'index',
							//REF '?' http://www.dereuromark.de/2013/05/04/passed-named-or-query-string-params/
							'?' => array(
									'page'		=> $target_Page,
									'per_Page'	=> strval($per_page)
	// 								'per_Page'	=> strval($per_page),
	// 								'move_lot'	=> "next"
									)
			));
	
	}//if ($target_Page != $page)
?>	

<br>
<br>
