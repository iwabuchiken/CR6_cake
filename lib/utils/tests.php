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

	static function task_2() {
		
		$a = 1992;
		$b = 10;
		$c = floor($a / $b);
		
		echo "\$a=".$a
			."/"
			."\$b=".$b
			."/"
			."\$c=".$c
			;
		
	}

	static function task_3_Replace_Regex() {

		$temp = "秩序的恢复与遇难者遗体的处理[编辑] 收尸记录[编辑] 对南京大屠杀期间遇难者尸体的掩埋和处理大致有五个途径：[41] 红卍字会、崇善堂、红十字会、同善堂等慈善团体的掩埋； 南京市民自发组织与一家一户的掩埋； 南京安全区国际委员会雇工掩埋； 南京市、区伪政权及其下属机构的掩埋； 日军部队的掩埋与毁尸灭迹。 根据已发现的资料，南京当时8家慈善团体共埋尸19.8万具。其中：世界红卍字会南京分会埋尸43123具。据该会1945年的《民国二十六年至三十四年慈善工作报告书》及所附埋尸统计表记载，从1937年12月22日至1938年10月30日，在城内收埋1793具，城外收埋41330具，其中女尸75具、孩尸20具。世界红卍字会八卦洲分会在八卦洲江岸收埋被射杀的死者尸体、江中浮尸以及打捞江中尸体，正式资料提及埋尸1557具[41]，又有该会函件提及处理尸体1万余具[42]。南京崇善堂埋尸112266具。该堂在战后提交给军事法庭的统计显示，在1937年12月至1938年5月1日，该堂在城区收埋7548具，在城外收埋104718具。该堂埋尸的“前期资料”较少。中国红十字会南京分会收尸22691具。该会1938年1月5日以前在南京下关、和平门一带收埋8949具，此后得到日军许可后留下了按日记载的收尸记录，到5月底又收埋13742具。南京市同善堂收埋7千余具。该堂掩埋组组长刘德才在战后南京军事法庭审判谷寿夫时出庭作证：“我同戈长根两个人所经手掩埋的尸首就有七千多了”。南京代葬局收埋1万余具。代葬局掩埋队也受雇于南京伪政权。掩埋队队长夏元芝于1946年为汉奸嫌疑辩护时称：“曾率领代葬局全体掩埋伕役，终日收埋被惨杀军民尸体万余具”，这一数字得到当年掩埋伕役的确认。顺安善堂收尸约1500具。1940年12月该堂在一份调查登记表中称：“迄至南京事变后，对于掩埋沿江野岸遗尸露骨，人工费用约去陆百元。”按照当时一般收尸付费4角计算，约收埋1500具。";
		
		$pattern = '/(。)/';
		
		$replace = "。<br> ---- ";
		
		$temp = preg_replace($pattern, $replace, $temp);
		
		echo $temp;
		
// 		debug($temp);
		
// 		$text['Text']['text'] = $temp;
		
		
	}
	
	static function
	_exec_Tasks__GetRange($id, $total, $iter) {
	
		$chunk	= floor($total / $iter);
		$resi	= $total % $iter;
	
		if ($id != $iter) {
	
			$start = ($id - 1) * 5 + 1 - 1;
			// 			$start = ($id - 1) * 5 + 1;
				
			$length = $chunk;
				
			return array($start, $length);
	
		} else {
	
			$start = ($id - 1) * 5 + 1 - 1;
				
			$length = $chunk + $resi;
				
			return array($start, $length);
				
		}
	
	}//_exec_Tasks__GetRange($id, $total, $iter)
	
	
}//class D_3_v_1_4

function do_job($argv) {
	
	if (count($argv) < 2) {
		
		$msg = <<<MSG
<Option>
		abc		Regex-related task
		h		Show help
		r		_exec_Tasks__GetRange
		
MSG;
		echo $msg;
		
		return;
		
	}
	
// 	print_r($argv);
	$choice = $argv[1];
	
	if ($choice == "abc") {
	
		D_3_v_1_4::task_3_Replace_Regex();
	
	} else if ($choice == "r") {
		
		$id = 4; $total = 23; $iter = 4;
		
		$msg = "\$id=$id, \$total=$total, \$iter=$iter";
// 		$msg = "id=2, total=23, iter=4";
		
		echo $msg;
		
		$res = D_3_v_1_4::_exec_Tasks__GetRange($id, $total, $iter);
// 		$res = D_3_v_1_4::_exec_Tasks__GetRange(2, 23, 4);
		
		print_r($res);
		
	} else {
	
		echo "Unknown choice => $choice";
		
	}
	
// 	echo "\$choice=$choice";
	
}

do_job($argv);

// D_3_v_1_4::do_task();

// print_r($argv);

// D_3_v_1_4::task_2();

// $test = new D_3_v_1_4();

// $test->do_task();
