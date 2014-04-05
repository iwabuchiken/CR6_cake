<?php
class D_3_v_1_4 {
	
	static function get_CurrentLot($cur_Page, $per_Page) {
		
		$floor	= $cur_Page / $per_Page;
	// 	$ceil	= $cur_Page / $per_Page;
		$residue	= $cur_Page % $per_Page;
		
		if ($residue == 0) {
			
			$floor -= 1;
			
			echo "\n\t\$residue => 0\n\n";
			
		}
		
	// 	return floor($floor);
		return floor($floor + 1);
		
	}
	
	static function conv_CurrentLot_to_Range($cur_Lot, $per_Page) {
		
		$start	= (($cur_Lot - 1) * $per_Page) + 1;
		
		$end	= $cur_Lot * $per_Page;
		
		return array($start, $end);
		
	}
	
	static function do_task() {
		
		$numOfLots = 10;
	
		for($i = 5; $i <= 10; $i++) {	// per page
		
			echo "per page => $i\n\n";
			
			for($j = 3; $j <= $numOfLots; $j++) {	// current lot
				
				$range = D_3_v_1_4::conv_CurrentLot_to_Range($j, $i);
// 				$range = $this->conv_CurrentLot_to_Range($j, $i);
				
				echo "\t(current lot=$j)" 
						."range => ".$range[0]." , ".$range[1]."\n";
				
			}
			
		}
		
	// 	// echo "hi";
		
	// 	// $per_Page = 10;
	// 	$per_Page = 5;
		
	// 	echo "per page => $per_Page\n\n";
		
	// 	for($i = 1; $i < 45; $i++) {
			
	// 		echo "page=$i/current lot=".get_CurrentLot($i, $per_Page)."\n";
	// 	// 	echo "page=$i/current lot=".get_CurrentLot($i, $per_Page + 1)."\n";
			
	// 	}
		
	}
	
}//class D_3_v_1_4

D_3_v_1_4::do_task();

// $test = new D_3_v_1_4();

// $test->do_task();
