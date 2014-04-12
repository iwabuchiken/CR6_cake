<?php 

/*
Steps
1. do_job__ShowHelp	=> Add parameter
2. do_job($argv)	=> Add else-if block
3. Code the new function
 
 */

?>


<?php

function do_job__ShowHelp($argv) {

	$msg = <<<MSG
<Option>
	abc		Regex-related task
	addlink		do_job__AddLink(\$argv)
	addlink4	do_job__AddLink_4(\$argv)
		
	arrayu	'array_unique()'
	array	Array test
	h		Show help
		
	preg	Example of 'preg_match()' function
		
	pregall	Example of 'preg_match_all_WithPos()' function
	pregall2	Example of 'preg_match_all_WithPos_2()' function
	pregall3	preg_match_all_WithPos_3()
		
	pregall4	preg_match_all_WithPos_4()
	pregreplace	do_job__PregReplace(\$argv)
	r		_exec_Tasks__GetRange
		
	skim		Skim filtered words list
	strpos	Example of 'strpos()' function
		
	test1	Time the time of serialize()	
	
	wh		Example of 'while((a = func()) > x)'
	
MSG;
	echo $msg;

}

function do_job($argv) {

	if (count($argv) < 2) {

		do_job__ShowHelp($argv);

		return;

	}

	// 	print_r($argv);
	$choice = $argv[1];

	if ($choice == "abc") {

		D_3_v_1_4::task_3_Replace_Regex();

	} else if ($choice == "test1") {

		do_job__Test_1_TimeSerialize($argv);

	} else if ($choice == "arrayu") {

		do_job__Test_ArrayUnique($argv);

	} else if ($choice == "skim") {

// 		do_job__Skim_WordsFiltered($argv);
// 		do_job__Skim_WordsFiltered_2($argv);
// 		do_job__Skim_WordsFiltered_3($argv);
		do_job__Skim_WordsFiltered_4($argv);

	} else if ($choice == "addlink") {

// 		do_job__AddLink($argv);
// 		do_job__AddLink_2($argv);
		do_job__AddLink_3($argv);

	} else if ($choice == "addlink4") {

		do_job__AddLink_4($argv);

	} else if ($choice == "pregall") {

		do_job__PregMatchAll_WithPos($argv);

	} else if ($choice == "pregall2") {

		do_job__PregMatchAll_WithPos_2($argv);

	} else if ($choice == "pregall3") {

		do_job__PregMatchAll_WithPos_3($argv);

	} else if ($choice == "pregall4") {

		do_job__PregMatchAll_WithPos_4($argv);

	} else if ($choice == "preg") {

		do_job__PregMatch($argv);

	} else if ($choice == "wh") {

		do_job__While();

	} else if ($choice == "array") {

		do_job__ArrayTest();

	} else if ($choice == "pregreplace") {

		do_job__PregReplace($argv);

	} else if ($choice == "strpos") {

		do_job__Strpos($argv);

		// 		$text = 'We can search for the character/We can search for the character';

		// // 		$target = 'can';
		// 		$target = 'this';

		// 		$pos = strpos($text, $target);

		// 		echo "\$text=$text\n"
		// 				. "\$target=$target\n"
		// 				. "\$pos=$pos";

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

}//function do_job($argv)

function
do_job__Test_1_TimeSerialize($argv) {

	$text = mb_convert_encoding(
			//012345678901234567890123456789012
	// 				"堂在法庭堂后提交交提事在法庭堂的提提示，",
			"堂在法庭堂后提交交提事在法庭堂的提提示堂法庭的提，",
			"SJIS", "UTF-8");
	
	$Ws = _Setup_Skim_WordsFiltered_4($text);
	
	$iter = 10000;
	
	// log
	$msg = "<1>--------------------- Searialize";
	show_Message($msg, __LINE__);
	
	$start = microtime(true);
// 	$start = microtime();
// 	$start = time();
	
	// log
	$msg = "\$start => $start";
	show_Message($msg, __LINE__);
	
	
// 	$iter = 10000000;
	
	for ($i = 0; $i < $iter; $i++) {
		
		$s = serialize($Ws[0]);
		
	}
	
	$end = microtime(true);
// 	$end = microtime();
// 	$end = time();

	// log
	$msg = "\$end => $end";
	show_Message($msg, __LINE__);
	
	$dur = $end - $start;
	
	$msg = "\$dur => $dur";
	show_Message($msg, __LINE__);

	
	
	// log
	$msg = "<2>--------------------- Non-searialize";
	show_Message($msg, __LINE__);
	
	$start = microtime(true);
// 	$start = microtime();
	
	// log
	$msg = "\$start => $start";
	show_Message($msg, __LINE__);
	
	
// 	$iter = 1000000;	// 1 million
// 	$iter = 10000000;
	
	for ($i = 0; $i < $iter; $i++) {
	
		$w1 = $Ws[0]->w1;
		$w2 = $Ws[0]->w2;
		$w3 = $Ws[0]->w3;
	
	}
	
	$end = microtime(true);
// 	$end = microtime();
	
	// log
	$msg = "\$end => $end";
	show_Message($msg, __LINE__);

	$dur = $end - $start;
	
	$msg = "\$dur => $dur";
	show_Message($msg, __LINE__);
	
}//do_job__Test_1_TimeSerialize($argv)

function
do_job__Test_ArrayUnique_IsIn($array, $element) {
	
	$s2 = serialize($element);
	
	foreach ($array as $item) {
		
		$s1 = serialize($item);
		
		if ($s1 == $s2) {
			
			return true;
			
		}
	
	}
	
	return false;
	
}//do_job__Test_ArrayUnique_IsIn($array, $element)

function
do_job__Test_ArrayUnique($argv) {

// 	$a1 = array(1,2,3,4,1,2,6);
	$a1 = array(
			array(1,2),
			array(3,4),
			array(5,6),
			array(1,2),
			array(2,3)
			);
	
	// log
	$msg = "\$a1 => ";
	show_Message($msg, __LINE__);
	
	print_r($a1);
	
// 	// log
// 	$msg = "serialize(\$a1) => ".serialize($a1);
// 	show_Message($msg, __LINE__);

	$skimmed_array = array();
	
	// log
	$msg = "\$a1[0] =>";
	show_Message($msg, __LINE__);
	print_r($a1[0]);
	
	
	for ($i = 0; $i < count($a1); $i++) {
		
// 		if (!do_job__Test_ArrayUnique_IsIn($a1, $a1[$i])) {
		if (!do_job__Test_ArrayUnique_IsIn($skimmed_array, $a1[$i])) {
			
			array_push($skimmed_array, $a1[$i]);
			
		}
		
// 		for ($j = 0; $j < count($a1); $j++) {
			
			
			
			
// 		}//for ($j = 0; $j < count($a1); $j++)
		
		
// 		$a1_0_serialize = serialize($a1[0]);
// 		$a1_i_serialize = serialize($a1[$i]);
		
// 		if (!($a1_0_serialize == $a1_i_serialize)) {
			
// 			array_push($skimmed_array, $a1[$i]);
// 		}
		
	}//for ($i = 0; $i < count($a1); $i++)

	// log
	$msg = "\$skimmed_array =>";
	show_Message($msg, __LINE__);
	print_r($skimmed_array);
	
// // 	$a2 = array_unique($a1);
// // 	$a2 = array_walk($a1, '_arrayWalk_Serialize');
// 	array_walk($a1, '_arrayWalk_Serialize');
	
// 	// log
// 	$msg = "\$a2 => ";
// 	show_Message($msg, __LINE__);
	
// 	print_r($a2);
	
// 	// log
// 	$msg = "\$a1 => ";
// 	show_Message($msg, __LINE__);
	
// 	print_r($a1);
	
// 	// log
// 	$msg = "\$a1[0] => $a1[0]";
// 	show_Message($msg, __LINE__);
	
	
	
}//do_job__Test_ArrayUnique($argv)

function
do_job__Skim_WordsFiltered_4($argv) {

	_Setup_Skim_WordsFiltered_4($argv);
	
	/****************************************
	 * Variables
	****************************************/
	if (count($argv) > 2) {

		$text = $argv[2];

	} else {
		//0123456789012345
		// 		$text = "abcdefxxdeaaffzdes";
		$text = mb_convert_encoding(
				//012345678901234567890123456789012
// 				"堂在法庭堂后提交交提事在法庭堂的提提示，",
				"堂在法庭堂后提交交提事在法庭堂的提提示堂法庭的提，",
				"SJIS", "UTF-8");

	}

	$Ws = _Setup_Skim_WordsFiltered_4($text);

	// Words list with positions
	$words_WithPos = array();

	foreach ($Ws as $W) {

		$res = _do_job__PregMatchAll_WithPos_4__Execute($text, $W);

		foreach ($res as $item) {

			array_push($words_WithPos, $item);

		}

	}//foreach ($Ws as $W)

	show_Message("\$words_WithPos =>", __LINE__);

	print_r($words_WithPos);

	/****************************************
	 * Processes
	****************************************/
	$words_WithPos_2 = $words_WithPos;

	$skimmed_WordsList = array();

	/****************************************
	 * For: 1
	****************************************/
	for ($i = 0; $i < count($words_WithPos); $i++) {	// f1

		//log
		$msg = "For: 1 <$i>========================";
		show_Message($msg, __LINE__);
		write_Log($msg, __LINE__);

		// Get: All the same word objects
		$Wset_i = $words_WithPos[$i];
		$Wi = $words_WithPos[$i][0];
		$Wi_pos = $words_WithPos[$i][1];

		// Flag: $Wi is contained in $Wj ?
		$flag_IsIn = true;
		
		/****************************************
		 * For: 2
		****************************************/
		for ($j = 0; $j < count($words_WithPos_2); $j++) {
			
			//log
			$msg = "For: 2 <$j>========================";
			show_Message($msg, __LINE__);
			write_Log($msg, __LINE__);
			
			// Prep
			$Wset_j = $words_WithPos_2[$j];
			$Wj = $words_WithPos_2[$j][0];
			$Wj_pos = $words_WithPos_2[$j][1];

			/****************************************
			* Judge: 1 => Contained?
			****************************************/
			$res = _isContained_W1($Wi, $Wj);
// 			$res = _isContained_W1($Wi->w1, $Wj->w1);
			
			if ($res === false) {
				// 				if ($res == false) {
			
				// log
				$msg = "Not contained";
				show_Message($msg, __LINE__);
					
				print_r($words_WithPos[$i]);
				print_r($words_WithPos_2[$j]);
					
				$flag_IsIn = false;
			
			} else {
			
				// log
				$msg = "Contained";
				show_Message($msg, __LINE__);
				write_Log(
				$msg.": \$words_WithPos[$i] => "
				.serialize($words_WithPos[$i])
				."/"
						."\$words_WithPos_2[$j] => "
						.serialize($words_WithPos_2[$j])
						,
				__LINE__);
					
				/****************************************
				* Judge: 2
				****************************************/
				$res = _is_InRange(
// 						$words_WithPos_2[$j],
// 						$words_WithPos[$i]
						$words_WithPos[$i],
						$words_WithPos_2[$j]
				);
				
				if ($res == true) {
					
					// log
					$msg = "Is in range";
					show_Message($msg, __LINE__);
						write_Log($msg, __LINE__);
				
						// log
						$msg = "\$words_WithPos[$i] =>";
						show_Message($msg, __LINE__);
						print_r($words_WithPos[$i]);
				
						write_Log($msg.serialize($words_WithPos[$i]), __LINE__);
				
						$msg = "\$words_WithPos_2[$j] =>";
						show_Message($msg, __LINE__);
						print_r($words_WithPos_2[$j]);
				
					write_Log($msg.serialize($words_WithPos_2[$j]), __LINE__);
					
					/****************************************
					* Judge: 3 => Same object?
					****************************************/
					// Same word set?
					$res = _isSame_WordSet(
							$words_WithPos[$i],
							$words_WithPos_2[$j]);
						
					// 			$res = _isSame_WordObj_2($Wi, $Wj);
					// 			$res = _isSame_WordObj($Wi, $Wj);
						
					if ($res == true) {
					
						// log
						$msg = "Same -----------------";
						show_Message($msg, __LINE__);
						print_r($words_WithPos[$i]);
						print_r($words_WithPos_2[$j]);
					
						write_Log($msg, __LINE__);
						
						// 				print_r($Wi);
						// 				print_r($Wj);
					
						$msg = "\$words_WithPos[$i] =>";
						write_Log($msg.serialize($words_WithPos[$i]), __LINE__);
				
						$msg = "\$words_WithPos_2[$j] =>";
						write_Log($msg.serialize($words_WithPos_2[$j]), __LINE__);
						
						// Next j
						continue;
						
// 						$flag_IsIn = false;
					
// 						break;
					
					} else {
					
						// log
						$msg = "Not same ---------------";
						show_Message($msg, __LINE__);
						write_Log($msg, __LINE__);
						
						$msg = "\$words_WithPos[$i] =>";
						write_Log($msg.serialize($words_WithPos[$i]), __LINE__);
						
						$msg = "\$words_WithPos_2[$j] =>";
						write_Log($msg.serialize($words_WithPos_2[$j]), __LINE__);
						
						// flag
						$flag_IsIn = true;
						
						// End for-loop with j
						break;
						
					}
					
// 					// Flag
// 					$flag_IsIn = true;
					
				} else {
			
					// log
					$msg = "Not in range";
					show_Message($msg, __LINE__);
					write_Log($msg, __LINE__);
				
					// flag
					$flag_IsIn = false;
					
				}//_is_InRange
					
			}//_isContained_W1
// 			if ($res == true) {
				
// 				// log
// 				$msg = "Same -----------------";
// 				show_Message($msg, __LINE__);
// 				print_r($words_WithPos[$i]);
// 				print_r($words_WithPos_2[$j]);
				
// 				write_Log($msg, __LINE__);
				
// // 				print_r($Wi);
// // 				print_r($Wj);
				
// 				$flag_IsIn = false;
				
// 				break;
				
// 			} else {
				
// 				// log
// 				$msg = "Not same ---------------";
// 				show_Message($msg, __LINE__);
// 				write_Log($msg, __LINE__);
				
// 				/****************************************
// 				* Judge: 2
// 				****************************************/
// 				$res = _isContained_W1($Wj, $Wi);
				
// 				if ($res === false) {
// // 				if ($res == false) {
				
// 					// log
// 					$msg = "Not contained";
// 					show_Message($msg, __LINE__);
					
// 					print_r($words_WithPos[$i]);
// 					print_r($words_WithPos_2[$j]);
					
// 					$flag_IsIn = false;
				
// 				} else {
				
// 					// log
// 					$msg = "Contained";
// 					show_Message($msg, __LINE__);
// 					write_Log(
// 							$msg.": \$words_WithPos[$i] => "
// 								.serialize($words_WithPos[$i])
// 								."/"
// 								."\$words_WithPos_2[$j] => "
// 								.serialize($words_WithPos_2[$j])
// 								,
// 							__LINE__);
					
// 					/****************************************
// 					* Judge: 3
// 					****************************************/
// 					$res = _is_InRange(
// 							$words_WithPos_2[$j],
// 							$words_WithPos[$i]
// // 							$words_WithPos[$i],
// // 							$words_WithPos_2[$j]
// 							);
					
// 					if ($res == true) {
					
// 						// log
// 						$msg = "Is in range";
// 						show_Message($msg, __LINE__);
// 						write_Log($msg, __LINE__);
						
// 						// log
// 						$msg = "\$words_WithPos[$i] =>";
// 						show_Message($msg, __LINE__);
// 						print_r($words_WithPos[$i]);
						
// 						write_Log($msg.serialize($words_WithPos[$i]), __LINE__);
						
// 						$msg = "\$words_WithPos_2[$j] =>";
// 						show_Message($msg, __LINE__);
// 						print_r($words_WithPos_2[$j]);
						
// 						write_Log($msg.serialize($words_WithPos_2[$j]), __LINE__);
					
// 					} else {
						
// 						// log
// 						$msg = "Not in range";
// 						show_Message($msg, __LINE__);
// 						write_Log($msg, __LINE__);
						
// 					}//_is_InRange
					
// 				}//_isContained_W1
				
// 			}//_isSame_WordObj_2
		
		}//for ($j = 0; $j < count($words_WithPos_2); $j++)
			
		/****************************************
		* Flag => true/false
		****************************************/
		if ($flag_IsIn == false) {
			
			$res = _isIn_SkimmedList_2($skimmed_WordsList, $Wi);
// 			$res = _isIn_SkimmedList($skimmed_WordsList, $Wi);
			
			if ($res == false) {
				
				array_push($skimmed_WordsList, $words_WithPos[$i]);
// 				array_push($skimmed_WordsList, $Wi);;
				
			}
			
		}//if ($flag_IsIn == false)

	}//for ($i = 0; $i < count($words_WithPos); $i++)
		
	/****************************************
	* Show: Result
	****************************************/
	// log
	$msg = "Skimming => done";
	show_Message($msg, __LINE__);
	write_Log($msg, __LINE__);
	
	// log
	$msg = "\$skimmed_WordsList => ";
	show_Message($msg, __LINE__);
	print_r($skimmed_WordsList);
	
	write_Log($msg.serialize($skimmed_WordsList), __LINE__);

}//do_job__Skim_WordsFiltered_4($argv)

function
// _Setup_Skim_WordsFiltered_4($argv) {
_Setup_Skim_WordsFiltered_4($text) {

	/****************************************
	 * Variables
	****************************************/
// 	if (count($argv) > 2) {
	
// 		$text = $argv[2];
	
// 	} else {
// 		//0123456789012345
// 		// 		$text = "abcdefxxdeaaffzdes";
// 		$text = mb_convert_encoding(
// 				//012345678901234567890123456789012
// 				"堂在法庭堂后提交交提事在法庭堂的提提示，",
// 				"SJIS", "UTF-8");
	
// 	}

	show_Message(
	"         0123456789012345678901234567890123456789",
	__LINE__);
	
	show_Message($text, __LINE__);
	write_Log($text, __LINE__);
	
	/****************************************
	 * Words list
	****************************************/
	/****************************************
	 * Setup: Words
	****************************************/
	$W1 = new Word();
	$W2 = new Word();
	$W3 = new Word();
	
	$W1->w1 = mb_convert_encoding("在法庭堂", "SJIS", "UTF-8");
	$W2->w1 = mb_convert_encoding("法庭", "SJIS", "UTF-8");
	$W3->w1 = mb_convert_encoding("提提", "SJIS", "UTF-8");;
	
	$W1->w2 = "aa"; $W2->w2 = "bb";
	$W3->w2 = "cc";
	
	$W1->w3 = "AA"; $W2->w3 = "BB";
	$W3->w3 = "CC";

	return array($W1, $W2, $W3);
	
}//_Setup_Skim_WordsFiltered_4($argv)

function
do_job__Skim_WordsFiltered_3($argv) {

	/****************************************
	 * Variables
	****************************************/
	if (count($argv) > 2) {

		$text = $argv[2];

	} else {
		//0123456789012345
		// 		$text = "abcdefxxdeaaffzdes";
		$text = mb_convert_encoding(
				//012345678901234567890123456789012
				"堂在法庭堂后提交交提事在法庭堂的提提示，",
				"SJIS", "UTF-8");

	}

	/****************************************
	 * Words list
	****************************************/
	/****************************************
	 * Setup: Words
	****************************************/
	$W1 = new Word();
	$W2 = new Word();
	$W3 = new Word();

	$W1->w1 = mb_convert_encoding("在法庭堂", "SJIS", "UTF-8");
	$W2->w1 = mb_convert_encoding("法庭", "SJIS", "UTF-8");
	$W3->w1 = mb_convert_encoding("提提", "SJIS", "UTF-8");;

	$W1->w2 = "aa"; $W2->w2 = "bb";
	$W3->w2 = "cc";

	$W1->w3 = "AA"; $W2->w3 = "BB";
	$W3->w3 = "CC";

	$Ws = array($W1, $W2, $W3);
	// 	$Ws = array($W1, $W2, $W3, $W4);

	show_Message(
	"         0123456789012345678901234567890123456789",
	__LINE__);

	show_Message($text, __LINE__);

	// Words list with positions
	$words_WithPos = array();

	foreach ($Ws as $W) {

		$res = _do_job__PregMatchAll_WithPos_4__Execute($text, $W);

		foreach ($res as $item) {

			array_push($words_WithPos, $item);

		}

	}//foreach ($Ws as $W)

	show_Message("\$words_WithPos =>", __LINE__);

	print_r($words_WithPos);

	/****************************************
	 * Processes
	****************************************/
	$words_WithPos_2 = $words_WithPos;

	$skimmed_WordsList = array();

	/****************************************
	 * For: 1
	****************************************/
	for ($i = 0; $i < count($words_WithPos); $i++) {	// f1

		//log
		$msg = "For: 1 <$i>========================";
		show_Message($msg, __LINE__);
		write_Log($msg, __LINE__);

		// Get: All the same word objects
		$Wi = $words_WithPos[$i][0];
		$Wi_pos = $words_WithPos[$i][1];

		// Flag: $Wi is contained in $Wj ?
		$flag_IsIn = true;
		
		/****************************************
		 * For: 2
		****************************************/
		for ($j = 0; $j < count($words_WithPos_2); $j++) {
			
			//log
			$msg = "For: 2 <$j>========================";
			show_Message($msg, __LINE__);
			write_Log($msg, __LINE__);
			
			// Prep
			$Wj = $words_WithPos_2[$j][0];
			$Wj_pos = $words_WithPos_2[$j][1];
				
			// Same word set?
			$res = _isSame_WordObj_2(
							$words_WithPos[$i],
							$words_WithPos_2[$j]);
			
// 			$res = _isSame_WordObj_2($Wi, $Wj);
// 			$res = _isSame_WordObj($Wi, $Wj);
			
			if ($res == true) {
				
				// log
				$msg = "Same -----------------";
				show_Message($msg, __LINE__);
				print_r($words_WithPos[$i]);
				print_r($words_WithPos_2[$j]);
				
				write_Log($msg, __LINE__);
				
// 				print_r($Wi);
// 				print_r($Wj);
				
				$flag_IsIn = false;
				
				break;
				
			} else {
				
				// log
				$msg = "Not same ---------------";
				show_Message($msg, __LINE__);
				write_Log($msg, __LINE__);
				
				/****************************************
				* Judge: 2
				****************************************/
				$res = _isContained_W1($Wj, $Wi);
				
				if ($res === false) {
// 				if ($res == false) {
				
					// log
					$msg = "Not contained";
					show_Message($msg, __LINE__);
					
					print_r($words_WithPos[$i]);
					print_r($words_WithPos_2[$j]);
					
					$flag_IsIn = false;
				
				} else {
				
					// log
					$msg = "Contained";
					show_Message($msg, __LINE__);
					write_Log(
							$msg.": \$words_WithPos[$i] => "
								.serialize($words_WithPos[$i])
								."/"
								."\$words_WithPos_2[$j] => "
								.serialize($words_WithPos_2[$j])
								,
							__LINE__);
					
					/****************************************
					* Judge: 3
					****************************************/
					$res = _is_InRange(
// 							$words_WithPos_2[$j],
// 							$words_WithPos[$i]
							$words_WithPos[$i],
							$words_WithPos_2[$j]
							);
					
					if ($res == true) {
					
						// log
						$msg = "Is in range";
						show_Message($msg, __LINE__);
						write_Log($msg, __LINE__);
						
						// log
						$msg = "\$words_WithPos[$i] =>";
						show_Message($msg, __LINE__);
						print_r($words_WithPos[$i]);
						
						write_Log($msg.serialize($words_WithPos[$i]), __LINE__);
						
						$msg = "\$words_WithPos_2[$j] =>";
						show_Message($msg, __LINE__);
						print_r($words_WithPos_2[$j]);
						
						write_Log($msg.serialize($words_WithPos_2[$j]), __LINE__);
					
					} else {
						
						// log
						$msg = "Not in range";
						show_Message($msg, __LINE__);
						write_Log($msg, __LINE__);
						
					}//_is_InRange
					
				}//_isContained_W1
				
			}//_isSame_WordObj_2
		
		}//for ($j = 0; $j < count($words_WithPos_2); $j++)
			
		/****************************************
		* Flag => true/false
		****************************************/
		if ($flag_IsIn == false) {
			
			$res = _isIn_SkimmedList_2($skimmed_WordsList, $Wi);
// 			$res = _isIn_SkimmedList($skimmed_WordsList, $Wi);
			
			if ($res == false) {
				
				array_push($skimmed_WordsList, $words_WithPos[$i]);
// 				array_push($skimmed_WordsList, $Wi);;
				
			}
			
		}//if ($flag_IsIn == false)

	}//for ($i = 0; $i < count($words_WithPos); $i++)
		
	/****************************************
	* Show: Result
	****************************************/
	// log
	$msg = "Skimming => done";
	show_Message($msg, __LINE__);
	write_Log($msg, __LINE__);
	
	// log
	$msg = "\$skimmed_WordsList => ";
	show_Message($msg, __LINE__);
	print_r($skimmed_WordsList);
	
	write_Log($msg.serialize($skimmed_WordsList), __LINE__);

}//do_job__Skim_WordsFiltered_3($argv)

/****************************************
 * Judge: $wordSet_1 is in the range of $wordSet_2
****************************************/
function 
_is_InRange($wordSet_1, $wordSet_2) {
	
	// log
	$msg = "\$wordSet_1 => ";	
	show_Message($msg, __LINE__);
	print_r($wordSet_1);
	
	write_Log($msg.serialize($wordSet_1), __LINE__);
	
	$msg = "\$wordSet_2 => ";	
	show_Message($msg, __LINE__);
	print_r($wordSet_2);
	
	write_Log($msg.serialize($wordSet_2), __LINE__);
	
	
	$W1_Pos_Start = $wordSet_1[1];
	$W2_Pos_Start = $wordSet_2[1];
	
	$W1_Pos_End = $W1_Pos_Start + strlen($wordSet_1[0]->w1);
	$W2_Pos_End = $W2_Pos_Start + strlen($wordSet_2[0]->w1);
	
	// log
	$msg = "\$W1_Pos_Start => $W1_Pos_Start"
			."//"
			."\$W2_Pos_Start => $W2_Pos_Start"
	;
	show_Message($msg, __LINE__);
	write_Log($msg, __LINE__);
	
	$msg = "\$W1_Pos_End => $W1_Pos_End"
			."//"
			."\$W2_Pos_End => $W2_Pos_End"
	;
	show_Message($msg, __LINE__);
	write_Log($msg, __LINE__);
	
	
	return ($W2_Pos_Start <= $W1_Pos_Start
			&& $W2_Pos_End >= $W1_Pos_End);
	
}

/****************************************
* @return true => 'w1' of $wordObj_2 is<br>
* 				contained in that of $wordObj_1
****************************************/
function _isContained_W1($wordObj_1, $wordObj_2) {

	return strpos($wordObj_2->w1, $wordObj_1->w1);
// 	return strpos($wordObj_1->w1, $wordObj_2->w1);
	
}


function
do_job__Skim_WordsFiltered($argv) {
	
	/****************************************
	 * Variables
	****************************************/
	if (count($argv) > 2) {
	
		$text = $argv[2];
	
	} else {
		//0123456789012345
		// 		$text = "abcdefxxdeaaffzdes";
		$text = mb_convert_encoding(
				//012345678901234567890123456789012
				"堂在法庭堂后提交交提事在法庭堂的提提示，",
				"SJIS", "UTF-8");
	
	}
	
	/****************************************
	 * Words list
	****************************************/
	/****************************************
	 * Setup: Words
	****************************************/
	$W1 = new Word();
	$W2 = new Word();
	$W3 = new Word();
	
	$W1->w1 = mb_convert_encoding("在法庭堂", "SJIS", "UTF-8");
	$W2->w1 = mb_convert_encoding("法庭", "SJIS", "UTF-8");
	$W3->w1 = mb_convert_encoding("提提", "SJIS", "UTF-8");;
	
	$W1->w2 = "aa"; $W2->w2 = "bb";
	$W3->w2 = "cc";
	
	$W1->w3 = "AA"; $W2->w3 = "BB";
	$W3->w3 = "CC";
	
	$Ws = array($W1, $W2, $W3);
	// 	$Ws = array($W1, $W2, $W3, $W4);
	
	show_Message(
				"         0123456789012345678901234567890123456789",
				__LINE__);

	show_Message($text, __LINE__);
	
	// Words list with positions
	$words_WithPos = array();
	
	foreach ($Ws as $W) {
	
		$res = _do_job__PregMatchAll_WithPos_4__Execute($text, $W);
	
		foreach ($res as $item) {
				
			array_push($words_WithPos, $item);
	
		}
	
	}//foreach ($Ws as $W)
		
	show_Message("\$words_WithPos =>", __LINE__);
	
	print_r($words_WithPos);
	
	/****************************************
	* Processes
	****************************************/
	$words_WithPos_2 = $words_WithPos;
	
	$skimmed_WordsList = array();
	
	for ($i = 0; $i < count($words_WithPos); $i++) {	// f1
		
		// Get: All the same word objects
		$W1 = $words_WithPos[$i];
		
		$words_Same = _get_SameWords($words_WithPos, $W1[0]->w1);
		
// 		Array(
// 				[0] => Array(
// 						[0] => Word Object
// 						(
// 								[w1] => 在法庭堂
// 								[w2] => aa
// 								[w3] => AA
// 						)
		
// 						[1] => 2
// 				)
		
// 				[1] => Array(
// 						[0] => Word Object
// 						(
// 								[w1] => 在法庭堂
// 								[w2] => aa
// 								[w3] => AA
// 						)
		
// 						[1] => 22
// 				)
// 		)
		
		for ($k = 0; $k < count($words_WithPos_2); $k++) {	// f2

			// Flag => Not contained in any
			$flag_IsIn = false;
			
			for ($j = 0; $j < count($words_Same); $j++) {	// f3
				
				// Contains?		=> j1
				$res = _contains_String(
								$words_Same[$j][0]->w1,
								$words_WithPos_2[$k][0]->w1);
				
				$msg = "\$words_Same[\$j][0]->w1"
							." => "
							.$words_Same[$j][0]->w1
							."\n"
							
							."\$words_WithPos_2[$j][0]->w1"
							." => "
							.$words_WithPos_2[$k][0]->w1
							."\n"
							;
					
				show_Message($msg, __LINE__);
				
				
				if ($res == true) {	// j1
				
					show_Message("\t\t => Contains", __LINE__);
					
					// Yes
					$res = _isSame_WordObj(
									$words_Same[$j],
									$words_WithPos_2[$k]);
					
					if ($res == true) {	// j2
					
						show_Message("Same Word object", __LINE__);
						
						$res = _isIn_SkimmedList(
										$skimmed_WordsList,
										$words_WithPos_2[$k]);
						
						if ($res == true) {	// j2.1
							// Yes
							$msg = "Already in the list => "
									.$words_WithPos_2[$k][0]->w1
									."("
									.$words_WithPos_2[$k][1]
									.")";
							
							show_Message($msg, __LINE__);;
							
							$flag_IsIn = true;
						
						} else {	// j2.1
							// No
							$msg = "Not in the list => "
									.$words_WithPos_2[$k][0]->w1
									."("
									.$words_WithPos_2[$k][1]
									.")";
							
							show_Message($msg, __LINE__);;
							
							$flag_IsIn = false;
							
// 							array_push($skimmed_WordsList, $words_WithPos_2[$k]);
							
						}	// j2.1
						
// 						array_push($skimmed_WordsList, $words_WithPos_2[$k]);
					
					} else {	// j2
					
						// temporary
						$flag_IsIn = false;
						
					}	// j2
				
				} else {	// j1
					// No
					show_Message("\t\t => Doesn't contain", __LINE__);
					
					
					
				}	// j1
				
// 				// log
// 				if ($res == true) {
				
// 					// log
// 					$msg = "\$words_Same[\$j][0]->w1"
// 							." => "
// 							.$words_Same[$j][0]->w1
// 							."\n"
							
// 							."\$words_WithPos_2[\$k][0]->w1"
// 							." => "
// 							.$words_WithPos_2[$k][0]->w1
// 							."\n"
// 					;
					
// 					show_Message($msg, __LINE__);
				
// 				} else {
				
// 				}
				
			}//for ($j = 0; $j < count($words_Same); $j++)
			
			// Not contained?
			if ($flag_IsIn == false) {	// j3
			
				$res = _isIn_SkimmedList(
								$skimmed_WordsList,
								$words_WithPos_2[$k]);
				
				if ($res == false) {
					
					array_push($skimmed_WordsList, $words_WithPos_2[$k]);
				
				
					$msg = "Put into skimmed list => "
						.$words_WithPos_2[$k][0]->w1
						."("
						.$words_WithPos_2[$k][1]
						.")";
					
					show_Message($msg, __LINE__);
				
				}
			
			} else {	// j3
			
				$msg = "Not put into skimmed list => "
						.$words_WithPos_2[$k][0]->w1
						."("
								.$words_WithPos_2[$k][1]
								.")";
				
				show_Message($msg, __LINE__);
				
			}	// j3
			
		}//for ($k = 0; $k < count($words_WithPos_2); $k++)
		
		// log
		show_Message("\n\n", __LINE__);
		show_Message("Processing => done", __LINE__);
		
		$msg = "";
		
		foreach ($skimmed_WordsList as $item) {
			
			$msg .= $item[0]->w1
					."("
					.$item[1]
					.")"
					." / ";
		
		}
		
		show_Message("\$skimmed_WordsList => $msg", __LINE__);
		
		
// 		print_r($skimmed_WordsList);
		
// 		// log
// 		show_Message("\$words_Same =>", __LINE__);
// 		print_r($words_Same);
		
// 		$words_Same = _get_SameWords($words_WithPos, $W1[0]['w1']);
// 		$words_Same = _get_SameWords($words_WithPos, $W1->w1);
		
	}//for ($i = 0; $i < count($words_WithPos); $i++)
	
}//do_job__Skim_WordsFiltered($argv)


function
do_job__Skim_WordsFiltered_2($argv) {
	
	/****************************************
	 * Variables
	****************************************/
	if (count($argv) > 2) {
	
		$text = $argv[2];
	
	} else {
		//0123456789012345
		// 		$text = "abcdefxxdeaaffzdes";
		$text = mb_convert_encoding(
				//012345678901234567890123456789012
				"堂在法庭堂后提交交提事在法庭堂的提提示，",
				"SJIS", "UTF-8");
	
	}
	
	/****************************************
	 * Words list
	****************************************/
	/****************************************
	 * Setup: Words
	****************************************/
	$W1 = new Word();
	$W2 = new Word();
	$W3 = new Word();
	
	$W1->w1 = mb_convert_encoding("在法庭堂", "SJIS", "UTF-8");
	$W2->w1 = mb_convert_encoding("法庭", "SJIS", "UTF-8");
	$W3->w1 = mb_convert_encoding("提提", "SJIS", "UTF-8");;
	
	$W1->w2 = "aa"; $W2->w2 = "bb";
	$W3->w2 = "cc";
	
	$W1->w3 = "AA"; $W2->w3 = "BB";
	$W3->w3 = "CC";
	
	$Ws = array($W1, $W2, $W3);
	// 	$Ws = array($W1, $W2, $W3, $W4);
	
	show_Message(
				"         0123456789012345678901234567890123456789",
				__LINE__);

	show_Message($text, __LINE__);
	
	// Words list with positions
	$words_WithPos = array();
	
	foreach ($Ws as $W) {
	
		$res = _do_job__PregMatchAll_WithPos_4__Execute($text, $W);
	
		foreach ($res as $item) {
				
			array_push($words_WithPos, $item);
	
		}
	
	}//foreach ($Ws as $W)
		
	show_Message("\$words_WithPos =>", __LINE__);
	
	print_r($words_WithPos);
	
	/****************************************
	* Processes
	****************************************/
	$words_WithPos_2 = $words_WithPos;
	
	$skimmed_WordsList = array();

	//
	$list_Words_Same = array();
	
	/****************************************
	* For: 1
	****************************************/
	for ($i = 0; $i < count($words_WithPos); $i++) {	// f1

		//log
		$msg = "For: 1 <$i>========================";
		show_Message($msg, __LINE__);
		write_Log($msg, __LINE__);
		
		// Get: All the same word objects
		$Wi = $words_WithPos[$i][0];
		$Wi_pos = $words_WithPos[$i][1];
// 		$Wi = $words_WithPos[$i];
		
// 		$msg = "\$wi => ";
// 		show_Message($msg, __LINE__);
// 		print_r($Wi);
		
		
		$words_Same = _get_SameWords($words_WithPos, $Wi->w1);
// 		$words_Same = _get_SameWords($words_WithPos, $Wi[0]->w1);
		-
// 		// log
// 		$msg = "\$words_Same =>";
// 		show_Message($msg, __LINE__);
// 		print_r($words_Same);
		
		/****************************************
		* Same words set?
		****************************************/
		$res = _isIn_SameWordList($list_Words_Same, $words_Same);
		
		if ($res == true) {
		
			// log
			$msg = "Existing word set => ";			
			show_Message($msg, __LINE__);
			print_r($words_Same);
			
			write_Log($msg.serialize($words_Same), __LINE__);
			
			continue;
		
		} else {
		
			// log
			$msg = "New word set => ";			
			show_Message($msg, __LINE__);
			print_r($words_Same);
			
			write_Log($msg.serialize($words_Same), __LINE__);
			
			array_push($list_Words_Same, $words_Same);
			
		}
		
		//log
		$msg = "\$Wi => ";
		show_Message($msg, __LINE__);
		write_Log($msg, __LINE__);
		
		print_r($Wi);
		write_Log(serialize($Wi), __LINE__);
		
		$msg = "\$words_Same => ";
		show_Message($msg, __LINE__);
		write_Log($msg, __LINE__);
		
		print_r($words_Same);
		write_Log(serialize($words_Same), __LINE__);

		/****************************************
		* For: 2
		****************************************/
		for ($k = 0; $k < count($words_WithPos_2); $k++) {
			
			$flag_IsIn = true;
			
			$Wk = $words_WithPos_2[$k][0];
			$Wk_pos = $words_WithPos_2[$k][1];
			
			/****************************************
			* For: 3
			****************************************/
			for ($j = 0; $j < count($words_Same); $j++) {
				
				$Wj = $words_Same[$j][0];
				$Wj_pos = $words_Same[$j][1]; 
				
				$w1j = $Wj->w1;
				$w1k = $Wk->w1;
				
				$res = _contains_String($w1j, $w1k);
				
				if ($res == true) {	// Contains
				
// 					show_Message($text, $line);
					$msg = "$w1j(".$Wj_pos.") contains => $w1k(".$Wk_pos.")";
// 					$msg = "$w1j($Wj_pos) contains => $w1k($Wk_pos)";
					show_Message($msg, __LINE__);
					write_Log($msg, __LINE__);
				
				} else {	// Contains not
				
					$msg = "$w1j(".$Wj_pos.") contains not => $w1k(".$Wk_pos.")";
// 					$msg = "$w1j($Wj_pos) contains not => $w1k($Wk_pos)";;
// 					$msg = "$w1j contains not => $w1k";
					show_Message($msg, __LINE__);
					write_Log($msg, __LINE__);
					
				}
				
			}//for ($j = 0; $j < count($words_Same); $j++)
			
			
		}//for ($k = 0; $k < count($words_WithPos_2); $k++)
		
	}//for ($i = 0; $i < count($words_WithPos); $i++)
	
}//do_job__Skim_WordsFiltered_2($argv)

function
_isIn_SameWordList($list_Words_Same, $words_Same) {
	
	$key = serialize($words_Same);
	
	foreach ($list_Words_Same as $item) {
		
		$target = serialize($item);
		
		if ($target == $key) {
			
			return true;
			
		}
	
	}
	
	return false;
	
}//_isIn_SameWordList($list_Words_Same, $words_Same)

function
_isIn_SkimmedList($skimmed_WordsList, $Wset) {
	
	foreach ($skimmed_WordsList as $item) {
		
		$res = ($item[0]->w1 == $Wset[0]->w1
			&& $item[1] == $Wset[1]
			);
	
		if ($res == true) return true;
		
	}
	
	return false;
	
}//_isIn_SkimmedList($skimmed_WordsList, $Wset)

function
_isIn_SkimmedList_2($skimmed_WordsList, $wordObject) {

	$wordObject_s = serialize($wordObject);
	
	foreach ($skimmed_WordsList as $item) {
		
		$item_s = serialize($item);
		
		$res = ($item_s == $wordObject_s);
	
		if ($res == true) return true;
		
	}
	
	return false;
	
}//_isIn_SkimmedList_2($skimmed_WordsList, $Wset)


function
_isSame_WordObj($Wset1, $Wset2) {
	
	$res = ($Wset1[0]->w1 == $Wset2[0]->w1
			&& $Wset1[1] == $Wset2[1]
			);
	
	return ($res == true) ? true : false;
	
}//_isSame_WordObj($W1, $W2)

/****************************************
* Use serialize() to judge the 2 objects
****************************************/
function
_isSame_WordObj_2($wordObject1, $wordObject2) {
	
	$s1 = serialize($wordObject1);
	$s2 = serialize($wordObject2);
	
	return ($s1 == $s2) ? true : false;
		
}//_isSame_WordObj($W1, $W2)

/****************************************
* Use serialize() to judge the 2 objects
****************************************/
function
_isSame_WordSet($wordSet1, $wordSet2) {
	
	$s1 = serialize($wordSet1);
	$s2 = serialize($wordSet2);
	
	return ($s1 == $s2) ? true : false;
		
}//_isSame_WordObj($W1, $W2)


function
_contains_String($text, $keyword) {
	//REF http://stackoverflow.com/questions/4366730/how-to-check-if-a-string-contains-specific-words
	$res = (strpos($text, $keyword));
	
	return ($res !== false) ? true : false;
	
}//_contains_String($text, $keyword)

function
_get_SameWords($words_WithPos, $w1) {
	
// 	show_Message("\$w1 => $w1", __LINE__);
	
	$same_Words = array();
	
	foreach ($words_WithPos as $item) {
		// $item
		// Array(0 => Word Object, 1 => 4)
		$w = $item[0]->w1;

		if ($w == $w1) {
			
			array_push($same_Words, $item);
			
		}
		
	}
	
	return $same_Words;
	
}//_get_SameWords($words_WithPos, $w1)


function do_job__AddLink($argv) {

	/****************************************
	 * Variables
	****************************************/
	if (count($argv) > 2) {
	
		$text = $argv[2];
	
	} else {
			   //0123456789012345
		$text = "abcdefxxdeaaffz";
	
	}
	
	//REF delimiter http://stackoverflow.com/questions/8159628/troubleshooting-delimiter-must-not-be-alphanumeric-or-backslash-error-when-cha answered Nov 16 '11 at 22:29
	$token = array("de", 3);
	
	$chars = array(
				array(
					"de", 3),
				array(
					"de", 8),
				array(
					"cdef", 2),
				array(
					"ff", 12),
			
			);
	
	$target = "/$token[0]/";
	// 	$target = '/de/';
	
	$rep = "AAA";
	
	$tokens = array();
	
	$offset = 0;
	
	show_Message("         01234567890123456789", __LINE__);
	
	show_Message("\$text => $text", __LINE__);
	
// 	show_Message("\$token => ", __LINE__);
	show_Message("\$chars => ", __LINE__);
	
	print_r($chars);
	
// 	show_Message("\$rep => $rep", __LINE__);
	
// 	show_Message("\$target => $target($token[0], $token[1])", __LINE__);
	
	/****************************************
	* Processes
	****************************************/
	/****************************************
	* Replace: 1st
	****************************************/
	$prefix = "<a>"; $suffix = "</a>";
	
	$rep = $prefix . $chars[0][0] . $suffix;
// 	$rep = '<a>' . $chars[0][0] . '</a>';
// 	$rep = "<a>$chars[0][0]</a>";
	
	$len = strlen($chars[0][0]);
	
	$res = substr_replace($text, $rep, $chars[0][1], strlen($token[0]));
	
	show_Message("<1>", __LINE__);
	show_Message("            01234567890123456789", __LINE__);
	show_Message('Replaced => '.$res, __LINE__);
	
	// Position => update
	$add = strlen($prefix) + strlen($suffix);
// 	$add = strlen($rep);
	
	show_Message('Add position by => '.$add, __LINE__);
	
	for ($i = 0; $i < count($chars); $i++) {
		
		if ($chars[$i][1] > $chars[0][1]) {
			
			$chars[$i][1] += $add;
			
		}
		
	}//for ($i = 0; $i < count($chars); $i++)
	
	$text = $res;
	
	/****************************************
	* Replace: 2nd
	****************************************/
	$prefix = "<a>"; $suffix = "</a>";
	
	$rep = $prefix . $chars[1][0] . $suffix;
// 	$rep = '<a>' . $chars[0][0] . '</a>';
// 	$rep = "<a>$chars[0][0]</a>";
	
	$len = strlen($chars[1][0]);
	
	$res = substr_replace($text, $rep, $chars[1][1], strlen($chars[1][0]));
	
	show_Message("<2>", __LINE__);
	show_Message("            012345678901234567890123456789", __LINE__);
	show_Message('Replaced => '.$res, __LINE__);
	
	// Position => update
	$add = strlen($prefix) + strlen($suffix);
// 	$add = strlen($rep);
	
	show_Message('Add position by => '.$add, __LINE__);
	
	for ($i = 0; $i < count($chars); $i++) {
		
		if ($chars[$i][1] > $chars[1][1]) {
			
			$chars[$i][1] += $add;
			
		}
	}
	show_Message('\$chars now => ', __LINE__);
	
	print_r($chars);
	
	// Update text
	$text = $res;
	
	//********************************************
// 	foreach ($chars as $char) {
		
// 		if ($char[1] >= $chars[0][1]) {
			
// 			$char[1] += $add;
			
// 		}
	
// 	}
	
	
// 	// Replace: 1
// 	$res = substr_replace($text, "AAA", $token[1]);
	
// 	show_Message("<1>", __LINE__);
// 	show_Message('Replaced: ($text, "AAA", $token[1]) => '.$res, __LINE__);
// 			//RES => abcAAA
			
// 	// Replace: 2
// 	$res = substr_replace($text, "AAA", $token[1], strlen($token[0]));
	
// 	show_Message("<2>", __LINE__);
// 	show_Message(
// 			'Replaced: ($text, "AAA", $token[1], strlen($token[0])) => '.$res,
// 			__LINE__);
// 			//RES => abcAAAfxxdeaaffz
				
// 	// Replace: 3
// 	$res = substr_replace($text, $rep, $token[1], strlen($rep));
	
// 	show_Message("<3>", __LINE__);
// 	show_Message(
// 			'Replaced: ($text, $rep, $token[1], strlen($rep)) => '.$res,
// 			__LINE__);
// 			//RES => abcAAAxxdeaaffz
	
	
	
}//do_job__AddLink($argv)

function do_job__AddLink_2($argv) {

	/****************************************
	 * Variables
	****************************************/
	if (count($argv) > 2) {
	
		$text = $argv[2];
	
	} else {
			   //0123456789012345
		$text = "abcdefxxdeaaffzdes";
	
	}
	
	//REF delimiter http://stackoverflow.com/questions/8159628/troubleshooting-delimiter-must-not-be-alphanumeric-or-backslash-error-when-cha answered Nov 16 '11 at 22:29
	$token = array("de", 3);
	
	$chars = array(
				array(
					"de", 8),
				array(
					"cdef", 2),
				array(
					"ff", 12),
				array(
					"de", 15)
			);
	
	$target = "/$token[0]/";
	// 	$target = '/de/';
	
	$rep = "AAA";
	
	$tokens = array();
	
	$offset = 0;
	
	show_Message("         01234567890123456789", __LINE__);
	
	show_Message("\$text => $text", __LINE__);
	
// 	show_Message("\$token => ", __LINE__);
	show_Message("\$chars => ", __LINE__);
	
	print_r($chars);
	
// 	show_Message("\$rep => $rep", __LINE__);
	
// 	show_Message("\$target => $target($token[0], $token[1])", __LINE__);
	
	/****************************************
	* Processes
	****************************************/
	/****************************************
	* Replace: 1st
	****************************************/
	$prefix = "<a>"; $suffix = "</a>";
	
	$rep = $prefix . $chars[0][0] . $suffix;
// 	$rep = '<a>' . $chars[0][0] . '</a>';
// 	$rep = "<a>$chars[0][0]</a>";
	
	$len = strlen($chars[0][0]);
	
	$res = substr_replace($text, $rep, $chars[0][1], strlen($token[0]));
	
	show_Message("<1>", __LINE__);
	show_Message("            012345678901234567890123456789", __LINE__);
	show_Message('Replaced => '.$res, __LINE__);
	
	// Position => update
	$add = strlen($prefix) + strlen($suffix);
// 	$add = strlen($rep);
	
	show_Message('Add position by => '.$add, __LINE__);
	
	for ($i = 0; $i < count($chars); $i++) {
		
		if ($chars[$i][1] > $chars[0][1]) {
			
			$chars[$i][1] += $add;
			
		}
		
	}//for ($i = 0; $i < count($chars); $i++)
	
	// Update
	$chars[0][1] += strlen($prefix);
	
	show_Message('\$chars now => ', __LINE__);
	
	print_r($chars);
	
	$text = $res;
	
	/****************************************
	* Replace: 2nd
	****************************************/
	$prefix = "<a>"; $suffix = "</a>";
	
	$rep = $prefix . $chars[1][0] . $suffix;
// 	$rep = '<a>' . $chars[0][0] . '</a>';
// 	$rep = "<a>$chars[0][0]</a>";
	
	$len = strlen($chars[1][0]);
	
	$res = substr_replace($text, $rep, $chars[1][1], strlen($chars[1][0]));
	
	show_Message("<2>", __LINE__);
	show_Message("            0123456789012345678901234567890123456789", __LINE__);
	show_Message('Replaced => '.$res, __LINE__);
	
	// Position => update
	$add = strlen($prefix) + strlen($suffix);
// 	$add = strlen($rep);
	
	show_Message('Add position by => '.$add, __LINE__);
	
	for ($i = 0; $i < count($chars); $i++) {
		
		if ($chars[$i][1] > $chars[1][1]) {
			
			$chars[$i][1] += $add;
			
		}
	}
	
	// Update
	$chars[1][1] += strlen($prefix);
	
	show_Message('\$chars now => ', __LINE__);
	
	print_r($chars);
	
	// Update text
	$text = $res;
	
	/****************************************
	* Replace: 3rd
	****************************************/
	$prefix = "<a>"; $suffix = "</a>";
	
	$rep = $prefix . $chars[2][0] . $suffix;
// 	$rep = '<a>' . $chars[0][0] . '</a>';
// 	$rep = "<a>$chars[0][0]</a>";
	
	$len = strlen($chars[2][0]);
	
	$res = substr_replace($text, $rep, $chars[2][1], strlen($chars[2][0]));
	
	show_Message("<3>", __LINE__);
	show_Message("            0123456789012345678901234567890123456789", __LINE__);
	show_Message('Replaced => '.$res, __LINE__);
	
	// Position => update
	$add = strlen($prefix) + strlen($suffix);
// 	$add = strlen($rep);
	
	show_Message('Add position by => '.$add, __LINE__);
	
	$position = $chars[2][1];
	
	for ($i = 0; $i < count($chars); $i++) {
		
		if ($chars[$i][1] > $position) {
// 		if ($chars[$i][1] > $chars[2][1]) {
			
			$chars[$i][1] += $add;
			
		}
	}
	
	// Update
	$chars[2][1] += strlen($prefix);
	
	show_Message('\$chars now => ', __LINE__);
	
	print_r($chars);
	
	// Update text
	$text = $res;
	
	//********************************************
// 	foreach ($chars as $char) {
		
// 		if ($char[1] >= $chars[0][1]) {
			
// 			$char[1] += $add;
			
// 		}
	
// 	}
	
	
// 	// Replace: 1
// 	$res = substr_replace($text, "AAA", $token[1]);
	
// 	show_Message("<1>", __LINE__);
// 	show_Message('Replaced: ($text, "AAA", $token[1]) => '.$res, __LINE__);
// 			//RES => abcAAA
			
// 	// Replace: 2
// 	$res = substr_replace($text, "AAA", $token[1], strlen($token[0]));
	
// 	show_Message("<2>", __LINE__);
// 	show_Message(
// 			'Replaced: ($text, "AAA", $token[1], strlen($token[0])) => '.$res,
// 			__LINE__);
// 			//RES => abcAAAfxxdeaaffz
				
// 	// Replace: 3
// 	$res = substr_replace($text, $rep, $token[1], strlen($rep));
	
// 	show_Message("<3>", __LINE__);
// 	show_Message(
// 			'Replaced: ($text, $rep, $token[1], strlen($rep)) => '.$res,
// 			__LINE__);
// 			//RES => abcAAAxxdeaaffz
	
	
	
}//do_job__AddLink_2($argv)

function do_job__AddLink_3($argv) {

	/****************************************
	 * Variables
	****************************************/
	if (count($argv) > 2) {
	
		$text = $argv[2];
	
	} else {
			   //0123456789012345
		$text = "abcdefxxdeaaffzdes";
	
	}
	
	/****************************************
	 * Setup: Words
	****************************************/
	$W1 = new Word();
	$W2 = new Word();
	$W3 = new Word();
	$W4 = new Word();
	
	$W1->w1 = "de"; $W2->w1 = "de";
	$W3->w1 = "cdef"; $W4->w1 = "ff";
	
	$W1->w2 = "aa"; $W2->w2 = "bb";
	$W3->w2 = "cc"; $W4->w2 = "dd";
	
	$W1->w3 = "AA"; $W2->w3 = "BB";
	$W3->w3 = "CC"; $W4->w3 = "DD";
	
	$chars = array(
				array($W1, 8),	// de
				array($W2, 15),	// de
				array($W3, 2),	// cdef
				array($W4, 12)	// ff
			);
	
// 	$chars = array(
// 				array(
// 					"de", 8),
// 				array(
// 					"cdef", 2),
// 				array(
// 					"ff", 12),
// 				array(
// 					"de", 15)
// 			);
	
// 	$target = "/$token[0]/";
// 	// 	$target = '/de/';
	
	$index = "            0123456789012345678901234567890123456789";
	
// 	show_Message($index, __LINE__);
	show_Message("         01234567890123456789", __LINE__);
	
	show_Message("\$text => $text", __LINE__);
	
	show_Message("\$chars => ", __LINE__);
	
	print_r($chars);
	
	/****************************************
	* Processes
	****************************************/
	/****************************************
	* Replace:
	****************************************/
	
	for ($i = 0; $i < count($chars); $i++) {
		
		$prefix = "<a href='onclick(alert(\""
				. $chars[$i][0]->w1
				. "/"
				. $chars[$i][0]->w2
				. "/"
				. ($chars[$i][0]->w3 == "AA" ? "**" : $chars[$i][0]->w3)
// 				. $chars[$i][0]->w3
				. "/"
				
				. "\"))'>";
		
		$suffix = "</a>";

		$rep = $prefix . $chars[$i][0]->w1 . $suffix;

		$len = strlen($chars[$i][0]->w1);
		
		show_Message("\$prefix => $prefix", __LINE__);
		show_Message("\$rep => $rep", __LINE__);

		// Replace
		$res = substr_replace(
						$text,
						$rep,
						$chars[$i][1],
						strlen($chars[$i][0]->w1));

		show_Message("<$i>", __LINE__);
		show_Message($index, __LINE__);
		show_Message('Replaced => '.$res, __LINE__);

		// Position => update
		$add = strlen($prefix) + strlen($suffix);

		show_Message('Add position by => '.$add, __LINE__);

		// REF using for statement => http://stackoverflow.com/questions/5179606/php-replace-array-value answered Mar 3 '11 at 11:12
		for ($j = 0; $j < count($chars); $j++) {

			if ($chars[$j][1] > $chars[$i][1]) {
	
				$chars[$j][1] += $add;
	
			}

		}//for ($i = 0; $i < count($chars); $i++)

		$chars[$i][1] += strlen($prefix);

		// Update
		show_Message('\$chars now => ', __LINE__);

		print_r($chars);

		$text = $res;

		//*******************************************
		
// 		$prefix = "<a href='onclick(alert(\"" . $chars[$i][0] . "\"))'>";
// 		$suffix = "</a>";
		
// 		$rep = $prefix . $chars[$i][0] . $suffix;
		
// 		$len = strlen($chars[$i][0]);
		
// 		$res = substr_replace(
// 						$text,
// 						$rep,
// 						$chars[$i][1],
// 						strlen($chars[$i][0]));
		
// 		show_Message("<$i>", __LINE__);
// 		show_Message($index, __LINE__);
// // 		show_Message("            012345678901234567890123456789", __LINE__);
// 		show_Message('Replaced => '.$res, __LINE__);

// 		// Position => update
// 		$add = strlen($prefix) + strlen($suffix);
		
// 		show_Message('Add position by => '.$add, __LINE__);
		
// 		for ($j = 0; $j < count($chars); $j++) {
		
// 			if ($chars[$j][1] > $chars[$i][1]) {
					
// 				$chars[$j][1] += $add;
					
// 			}
		
// 		}//for ($i = 0; $i < count($chars); $i++)

// 		// Update
// 		$chars[$i][1] += strlen($prefix);
		
// 		show_Message('\$chars now => ', __LINE__);
		
// 		print_r($chars);
		
// 		$text = $res;
		
		
	}//for ($i = 0; $i < count($chars); $i++)
	
	
}//do_job__AddLink_3($argv)

function do_job__AddLink_5($argv) {

	/****************************************
	 * Variables
	****************************************/
	if (count($argv) > 2) {
	
		$text = $argv[2];
	
	} else {
			   //0123456789012345
// 		$text = "abcdefxxdeaaffzdes";
		$text = mb_convert_encoding(
				"该堂在战后提交给军事法庭的统计显示，在1937年12月至1938年5月1日，该堂在城区收埋7548具，在城外收埋104718具",
				"SJIS",
				"UTF-8"
				);
	
	}
	
	/****************************************
	 * Setup: Words
	****************************************/
	$W1 = new Word();
	$W2 = new Word();
	$W3 = new Word();
	$W4 = new Word();
	
	$W1->w1 = mb_convert_encoding("法庭", "SJIS", "UTF-8");
	$W2->w1 = mb_convert_encoding("城区", "SJIS", "UTF-8");
	$W3->w1 = mb_convert_encoding("城外", "SJIS", "UTF-8");;
	$W4->w1 = mb_convert_encoding("城区", "SJIS", "UTF-8");;
	
// 	$W1->w1 = "de";
// 	$W2->w1 = "de";
// 	$W3->w1 = "cdef";
// 	$W4->w1 = "ff";
	
	$W1->w2 = "aa"; $W2->w2 = "bb";
	$W3->w2 = "cc"; $W4->w2 = "dd";
	
	$W1->w3 = "AA"; $W2->w3 = "BB";
	$W3->w3 = "CC"; $W4->w3 = "DD";
	
	$Ws = array($W1, $W2, $W3, $W4);
	
	$chars = array(
				array($W1, 8),	// de
				array($W2, 15),	// de
				array($W3, 2),	// cdef
				array($W4, 12)	// ff
			);
	
	$res = _do_job__AddLink_4__Execute($text, $chars);
	
// 	$chars = array(
// 				array(
// 					"de", 8),
// 				array(
// 					"cdef", 2),
// 				array(
// 					"ff", 12),
// 				array(
// 					"de", 15)
// 			);
	
// 	$target = "/$token[0]/";
// 	// 	$target = '/de/';
	
// 	$index = "            0123456789012345678901234567890123456789";
	
// // 	show_Message($index, __LINE__);
// 	show_Message("         01234567890123456789", __LINE__);
	
// 	show_Message("\$text => $text", __LINE__);
	
// 	show_Message("\$chars => ", __LINE__);
	
// 	print_r($chars);
	
// 	/****************************************
// 	* Processes
// 	****************************************/
// 	/****************************************
// 	* Replace:
// 	****************************************/
// 	for ($i = 0; $i < count($chars); $i++) {
		
// 		$prefix = "<a href='onclick(alert(\""
// 				. $chars[$i][0]->w1
// 				. "/"
// 				. $chars[$i][0]->w2
// 				. "/"
// // 				. ($chars[$i][0]->w3 == "AA" ? "**" : $chars[$i][0]->w3)
// 				. $chars[$i][0]->w3
// 				. "/"
				
// 				. "\"))'>";
		
// 		$suffix = "</a>";

// 		$rep = $prefix . $chars[$i][0]->w1 . $suffix;

// 		$len = strlen($chars[$i][0]->w1);
		
// 		show_Message("\$prefix => $prefix", __LINE__);
// 		show_Message("\$rep => $rep", __LINE__);

// 		// Replace
// 		$res = substr_replace(
// 						$text,
// 						$rep,
// 						$chars[$i][1],
// 						strlen($chars[$i][0]->w1));

// 		show_Message("<$i>", __LINE__);
// 		show_Message($index, __LINE__);
// 		show_Message('Replaced => '.$res, __LINE__);

// 		// Position => update
// 		$add = strlen($prefix) + strlen($suffix);

// 		show_Message('Add position by => '.$add, __LINE__);

// 		for ($j = 0; $j < count($chars); $j++) {

// 			if ($chars[$j][1] > $chars[$i][1]) {
	
// 				$chars[$j][1] += $add;
	
// 			}

// 		}//for ($i = 0; $i < count($chars); $i++)

// 		$chars[$i][1] += strlen($prefix);

// 		// Update
// 		show_Message('\$chars now => ', __LINE__);

// 		print_r($chars);

// 		$text = $res;

// 	}//for ($i = 0; $i < count($chars); $i++)
	
	
}//do_job__AddLink_5($argv)

function do_job__AddLink_4($argv) {

	/****************************************
	 * Variables
	****************************************/
	if (count($argv) > 2) {
	
		$text = $argv[2];
	
	} else {
			   //0123456789012345
// 		$text = "abcdefxxdeaaffzdes";
		$text = mb_convert_encoding(
				"该堂在战后提交给军事法庭的统计显示，在1937年12月至1938年5月1日，该堂在城区收埋7548具，在城外收埋104718具",
				"SJIS",
				"UTF-8"
				);
	
	}
	
	/****************************************
	 * Setup: Words
	****************************************/
	$W1 = new Word();
	$W2 = new Word();
	$W3 = new Word();
	$W4 = new Word();
	
	$W1->w1 = mb_convert_encoding("法庭", "SJIS", "UTF-8");
	$W2->w1 = mb_convert_encoding("城区", "SJIS", "UTF-8");
	$W3->w1 = mb_convert_encoding("城外", "SJIS", "UTF-8");;
	$W4->w1 = mb_convert_encoding("城区", "SJIS", "UTF-8");;
	
// 	$W1->w1 = "de";
// 	$W2->w1 = "de";
// 	$W3->w1 = "cdef";
// 	$W4->w1 = "ff";
	
	$W1->w2 = "aa"; $W2->w2 = "bb";
	$W3->w2 = "cc"; $W4->w2 = "dd";
	
	$W1->w3 = "AA"; $W2->w3 = "BB";
	$W3->w3 = "CC"; $W4->w3 = "DD";
	
	$Ws = array($W1, $W2, $W3, $W4);
	
	$chars = array(
				array($W1, 8),	// de
				array($W2, 15),	// de
				array($W3, 2),	// cdef
				array($W4, 12)	// ff
			);
	
	$res = _do_job__AddLink_4__Execute($text, $chars);
	
// 	$chars = array(
// 				array(
// 					"de", 8),
// 				array(
// 					"cdef", 2),
// 				array(
// 					"ff", 12),
// 				array(
// 					"de", 15)
// 			);
	
// 	$target = "/$token[0]/";
// 	// 	$target = '/de/';
	
// 	$index = "            0123456789012345678901234567890123456789";
	
// // 	show_Message($index, __LINE__);
// 	show_Message("         01234567890123456789", __LINE__);
	
// 	show_Message("\$text => $text", __LINE__);
	
// 	show_Message("\$chars => ", __LINE__);
	
// 	print_r($chars);
	
// 	/****************************************
// 	* Processes
// 	****************************************/
// 	/****************************************
// 	* Replace:
// 	****************************************/
// 	for ($i = 0; $i < count($chars); $i++) {
		
// 		$prefix = "<a href='onclick(alert(\""
// 				. $chars[$i][0]->w1
// 				. "/"
// 				. $chars[$i][0]->w2
// 				. "/"
// // 				. ($chars[$i][0]->w3 == "AA" ? "**" : $chars[$i][0]->w3)
// 				. $chars[$i][0]->w3
// 				. "/"
				
// 				. "\"))'>";
		
// 		$suffix = "</a>";

// 		$rep = $prefix . $chars[$i][0]->w1 . $suffix;

// 		$len = strlen($chars[$i][0]->w1);
		
// 		show_Message("\$prefix => $prefix", __LINE__);
// 		show_Message("\$rep => $rep", __LINE__);

// 		// Replace
// 		$res = substr_replace(
// 						$text,
// 						$rep,
// 						$chars[$i][1],
// 						strlen($chars[$i][0]->w1));

// 		show_Message("<$i>", __LINE__);
// 		show_Message($index, __LINE__);
// 		show_Message('Replaced => '.$res, __LINE__);

// 		// Position => update
// 		$add = strlen($prefix) + strlen($suffix);

// 		show_Message('Add position by => '.$add, __LINE__);

// 		for ($j = 0; $j < count($chars); $j++) {

// 			if ($chars[$j][1] > $chars[$i][1]) {
	
// 				$chars[$j][1] += $add;
	
// 			}

// 		}//for ($i = 0; $i < count($chars); $i++)

// 		$chars[$i][1] += strlen($prefix);

// 		// Update
// 		show_Message('\$chars now => ', __LINE__);

// 		print_r($chars);

// 		$text = $res;

// 	}//for ($i = 0; $i < count($chars); $i++)
	
	
}//do_job__AddLink_3($argv)

function
_do_job__AddLink_4__Execute($text, $chars) {
	
	$index = "            0123456789012345678901234567890123456789";
	
	// 	show_Message($index, __LINE__);
	show_Message("         01234567890123456789", __LINE__);
	
	show_Message("\$text => $text", __LINE__);
	
	show_Message("\$chars => ", __LINE__);
	
	print_r($chars);
	
	/****************************************
	 * Processes
	****************************************/
	/****************************************
	 * Replace:
	****************************************/
	for ($i = 0; $i < count($chars); $i++) {
	
		$prefix = "<a href='onclick(alert(\""
				. $chars[$i][0]->w1
				. "/"
						. $chars[$i][0]->w2
						. "/"
						// 				. ($chars[$i][0]->w3 == "AA" ? "**" : $chars[$i][0]->w3)
				. $chars[$i][0]->w3
				. "/"
	
				. "\"))'>";
	
		$suffix = "</a>";
	
		$rep = $prefix . $chars[$i][0]->w1 . $suffix;
	
		$len = strlen($chars[$i][0]->w1);
	
		show_Message("\$prefix => $prefix", __LINE__);
		show_Message("\$rep => $rep", __LINE__);
	
		// Replace
		$res = substr_replace(
				$text,
				$rep,
				$chars[$i][1],
				strlen($chars[$i][0]->w1));
	
		show_Message("<$i>", __LINE__);
		show_Message($index, __LINE__);
		show_Message('Replaced => '.$res, __LINE__);
	
		// Position => update
		$add = strlen($prefix) + strlen($suffix);
	
		show_Message('Add position by => '.$add, __LINE__);
	
		for ($j = 0; $j < count($chars); $j++) {
	
			if ($chars[$j][1] > $chars[$i][1]) {
	
				$chars[$j][1] += $add;
	
			}
	
		}//for ($i = 0; $i < count($chars); $i++)
	
		$chars[$i][1] += strlen($prefix);
	
		// Update
		show_Message('\$chars now => ', __LINE__);
	
		print_r($chars);
	
		$text = $res;
	
	}//for ($i = 0; $i < count($chars); $i++)
	
	
}//_do_job__AddLink_4__Execute($text, $Ws)

function
_do_job__AddLink_5__Execute($text, $chars) {
	
	$index = "            0123456789012345678901234567890123456789";
	
	// 	show_Message($index, __LINE__);
	show_Message("         01234567890123456789", __LINE__);
	
	show_Message("\$text => $text", __LINE__);
	
	show_Message("\$chars => ", __LINE__);
	
	print_r($chars);
	
	/****************************************
	 * Processes
	****************************************/
	/****************************************
	 * Replace:
	****************************************/
	for ($i = 0; $i < count($chars); $i++) {
	
		$prefix = "<a href='onclick(alert(\""
				. $chars[$i][0]->w1
				. "/"
						. $chars[$i][0]->w2
						. "/"
						// 				. ($chars[$i][0]->w3 == "AA" ? "**" : $chars[$i][0]->w3)
				. $chars[$i][0]->w3
				. "/"
	
				. "\"))'>";
	
		$suffix = "</a>";
	
		$rep = $prefix . $chars[$i][0]->w1 . $suffix;
	
		$len = strlen($chars[$i][0]->w1);
	
		show_Message("\$prefix => $prefix", __LINE__);
		show_Message("\$rep => $rep", __LINE__);
	
		// Replace
		$res = substr_replace(
				$text,
				$rep,
				$chars[$i][1],
				strlen($chars[$i][0]->w1));
	
		show_Message("<$i>", __LINE__);
		show_Message($index, __LINE__);
		show_Message('Replaced => '.$res, __LINE__);
	
		// Position => update
		$add = strlen($prefix) + strlen($suffix);
	
		show_Message('Add position by => '.$add, __LINE__);
	
		for ($j = 0; $j < count($chars); $j++) {
	
			if ($chars[$j][1] > $chars[$i][1]) {
	
				$chars[$j][1] += $add;
	
			}
	
		}//for ($i = 0; $i < count($chars); $i++)
	
		$chars[$i][1] += strlen($prefix);
	
		// Update
		show_Message('\$chars now => ', __LINE__);
	
		print_r($chars);
	
		$text = $res;
	
	}//for ($i = 0; $i < count($chars); $i++)
	
	
}//_do_job__AddLink_4__Execute($text, $Ws)

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

function do_job__Strpos($argv) {
// 	$text = 'We can search for the character/We can search for the character';
	$text = 'abcdefghdef';
	
	// 		$target = 'can';
	$target = 'de';
// 	$target = 'this';
	
	$pos = strpos($text, $target);
	
	echo "\$text=$text\n"
	. "\$target=$target\n"
	. "\$pos=$pos";
	
}

function do_job__PregMatch($argv) {
	
	$text = "abcdefghdef";
// 	$text = "abcdefghdef";
// 	$text = 'abcdefghdef';
	
	// 		$target = 'can';
	//REF delimiter http://stackoverflow.com/questions/8159628/troubleshooting-delimiter-must-not-be-alphanumeric-or-backslash-error-when-cha answered Nov 16 '11 at 22:29
	$target = '/de/';
// 	$target = 'de';
	
	//REF http://www.php.net/manual/en/function.preg-match.php
// 	preg_match($target, $text, $matches, PREG_OFFSET_CAPTURE);
	
// 	preg_match_all($target, $text, $matches);
	preg_match_all($target, $text, $matches, PREG_SET_ORDER);
// 	preg_match($target, $text, $matches, PREG_OFFSET_CAPTURE, 0);
// 	preg_match($target, $text, $matches, PREG_OFFSET_CAPTURE);
	
	echo "\$text=$text\n"
		. "\$target=$target\n";
	
	print_r($matches);
	
	
}


function
do_job__PregMatchAll_WithPos($argv) {
	
// 	$text = "abcdefghdefabcdefghdef";
// 	$text = "abcdefghdef";
	$text = "abcdefgh";
	
	//REF delimiter http://stackoverflow.com/questions/8159628/troubleshooting-delimiter-must-not-be-alphanumeric-or-backslash-error-when-cha answered Nov 16 '11 at 22:29
	$chars = "de";
	
	$target = "/$chars/";
// 	$target = '/de/';
	
	$offset = 0;
	
	echo "\$offset => $offset\n\n";
	
// 	$pos = preg_match($target, $text, $matches);
	$pos = preg_match(
					$target, $text, $matches,
					PREG_OFFSET_CAPTURE, $offset);
	
	if ($pos != 1) {
		
		echo "\$pos => not 1(pos=$pos)\n\n";
		
		print_r($matches);
		
		return;
		
	}
	
	$offset += $matches[0][1];
	
	echo "\$offset => $offset\n\n";
	
	print_r($matches);
	
	echo "\$pos => $pos\n\n";
	
	echo "      01234567890\n";
	echo "\$text=$text\n"
	. "\$target=$target\n";
	
	echo "\n";
	
	/****************************************
	* second time
	****************************************/
	$offset += strlen($chars);
// 	$offset += strlen($target);
	
	echo "\$offset => $offset\n\n";
	
	$pos = preg_match(
			$target, $text, $matches,
			PREG_OFFSET_CAPTURE, $offset);
	
	if ($pos != 1) {
	
// 		echo "\$pos => not 1\n\n";
		echo "\$pos => not 1(pos=$pos)\n\n";
	
		print_r($matches);
	
		return;
	
	}
	
	print_r($matches);
	
	$offset += $matches[0][1];
	
	echo "\$offset => $offset\n\n";
	
	echo "\$pos => $pos\n\n";
	
	if ($offset > (strlen($text) - 1)) {
		
		echo "Offset => reached the limit\n\n";
		
		return;
		
	} else {
		
		echo "match => can be done more\n\n";
		
	}
	
// 	echo "matches => \n";
	
// 	print_r($matches);
	
// 	echo "\$pos => $pos";
	
}

function
do_job__PregReplace($argv) {

	if (count($argv) > 2) {
	
		$text = $argv[2];
	
	} else {
	
		$text = "abcdefghdefabcdefghdef";
	
	}
	
	$chars = "de";
	
// 	$pattern = "/(.+)($chars){1}/";
// 	$pattern = "/(.)($chars)/";
	$pattern = "/(.+)($chars)/";
	
	$rep = '$1<a>$2</a>';
// 	$rep = '<a>$1</a>';
// 	$rep = 'AAA<a>$2</a>';
	
	show_Message("         01234567890123456789", __LINE__);
	
	show_Message("\$text => $text", __LINE__);
	
	show_Message("\$chars => $chars", __LINE__);
	
	/****************************************
	* Processes
	****************************************/
	$res = preg_replace($pattern, $rep, $text);
	
	show_Message("\$res =>", __LINE__);
	
	print_r($res);
	
	
	
	
	
}

function
do_job__PregMatchAll_WithPos_2($argv) {
	
	/****************************************
	* Variables
	****************************************/
// 	$text = "abcdefghdefabcdefghdef";
// 	$text = "abcdefghdef";

	if (count($argv) > 2) {
	
		$text = $argv[2];
	
	} else {
	
		$text = "abcdefgh";
		
	}
	
	//REF delimiter http://stackoverflow.com/questions/8159628/troubleshooting-delimiter-must-not-be-alphanumeric-or-backslash-error-when-cha answered Nov 16 '11 at 22:29
	$chars = mb_convert_encoding("目前", "SJIS", "UTF-8");
// 	$chars = mb_convert_encoding("あ", "SJIS", "UTF-8");
// 	$chars = "de";
	
	$target = "/$chars/";
// 	$target = '/de/';
	
	$tokens = array();
	
	$offset = 0;

	show_Message("         01234567890123456789", __LINE__);
	
	show_Message("\$text => $text", __LINE__);
	
	show_Message("\$chars => $chars", __LINE__);
	
	
	/****************************************
	* Processes
	****************************************/
	$pos = preg_match($target, $text, $m, PREG_OFFSET_CAPTURE, $offset);
	
	show_Message("\$pos => $pos", __LINE__);
	
// 	if ($pos == 1) {
		
// 		$offset += $m[0][1];;
		
// 		show_Message("Offset set => $pos", __LINE__);
		
// 	}
	
	while(($pos == 1)) {
		
// 		show_Message("\$m => ", __LINE__);
		
// 		print_r($m);
		
		show_Message("while loop => starts(\$pos => 1!)", __LINE__);
		
		show_Message("Target found at => " . $m[0][1], __LINE__);
		
// 		show_Message("\$offset => $offset", __LINE__);

// 		show_Message("\$offset => add \$m[0][1]($m[0][1])", __LINE__);

// 		show_Message("\$m[0] => ", __LINE__);
		
// 		print_r($m[0]);
		
// 		show_Message("\$m[0][1] => ", __LINE__);
		
// 		print_r($m[0][1]);
		
// 		echo "\n";
		
// 		$offset += $m[0][1];
		
// 		show_Message("\$offset => $offset", __LINE__);
		
		// Push token into $tokens
		$offset = $m[0][1];
// 		$offset += $m[0][1];
		
		show_Message("Pushed into array: \$offset => $offset", __LINE__);
		
		array_push($tokens, array($chars, $m[0][1]));
// 		array_push($tokens, array($chars, $offset));
		
		show_Message("\$m is => ", __LINE__);
		print_r($m);
		
		
		// Increment $offset
// 		$offset += $m[0][1];
		
		$offset += strlen($chars);
		
		show_Message("\$offset is now => $offset", __LINE__);
		
		// $offset => Off the limit?
		if ($offset > (strlen($text) - 1)) {
			
			show_Message("offset => off the limit: $offset", __LINE__);
			
// 			return $tokens;
			break;
			
		}
		
		$pos = preg_match($target, $text, $m, PREG_OFFSET_CAPTURE, $offset);
		
		show_Message("preg_match => done", __LINE__);
		
		print_r($m);
		
		
	}//while(($pos == 1))
	
	show_Message("while loop => done", __LINE__);
	
	print_r($tokens);
	
}//do_job__PregMatchAll_WithPos_2($argv)

function
do_job__PregMatchAll_WithPos_3($argv) {
	
	/****************************************
	* Variables
	****************************************/
	if (count($argv) > 2) {
	
		$text = $argv[2];
	
	} else {
			   //0123456789012345
		$text = "abcdefxxdeaaffzdes";
	
	}
		
	//REF delimiter http://stackoverflow.com/questions/8159628/troubleshooting-delimiter-must-not-be-alphanumeric-or-backslash-error-when-cha answered Nov 16 '11 at 22:29
	$chars = mb_convert_encoding("目前", "SJIS", "UTF-8");
// 	$chars = mb_convert_encoding("あ", "SJIS", "UTF-8");
// 	$chars = "de";
	
	$target = "/$chars/";
// 	$target = '/de/';
	
	$tokens = array();
	
	$offset = 0;

	show_Message("         01234567890123456789", __LINE__);
	
	show_Message("\$text => $text", __LINE__);
	
	show_Message("\$chars => $chars", __LINE__);
	
	
	/****************************************
	* Processes
	****************************************/
	$pos = preg_match($target, $text, $m, PREG_OFFSET_CAPTURE, $offset);
	
	show_Message("\$pos => $pos", __LINE__);
	
// 	if ($pos == 1) {
		
// 		$offset += $m[0][1];;
		
// 		show_Message("Offset set => $pos", __LINE__);
		
// 	}
	
	while(($pos == 1)) {
		
// 		show_Message("\$m => ", __LINE__);
		
// 		print_r($m);
		
		show_Message("while loop => starts(\$pos => 1!)", __LINE__);
		
		show_Message("Target found at => " . $m[0][1], __LINE__);
		
// 		show_Message("\$offset => $offset", __LINE__);

// 		show_Message("\$offset => add \$m[0][1]($m[0][1])", __LINE__);

// 		show_Message("\$m[0] => ", __LINE__);
		
// 		print_r($m[0]);
		
// 		show_Message("\$m[0][1] => ", __LINE__);
		
// 		print_r($m[0][1]);
		
// 		echo "\n";
		
// 		$offset += $m[0][1];
		
// 		show_Message("\$offset => $offset", __LINE__);
		
		// Push token into $tokens
		$offset = $m[0][1];
// 		$offset += $m[0][1];
		
		show_Message("Pushed into array: \$offset => $offset", __LINE__);
		
		array_push($tokens, array($chars, $m[0][1]));
// 		array_push($tokens, array($chars, $offset));
		
		show_Message("\$m is => ", __LINE__);
		print_r($m);
		
		
		// Increment $offset
// 		$offset += $m[0][1];
		
		$offset += strlen($chars);
		
		show_Message("\$offset is now => $offset", __LINE__);
		
		// $offset => Off the limit?
		if ($offset > (strlen($text) - 1)) {
			
			show_Message("offset => off the limit: $offset", __LINE__);
			
// 			return $tokens;
			break;
			
		}
		
		$pos = preg_match($target, $text, $m, PREG_OFFSET_CAPTURE, $offset);
		
		show_Message("preg_match => done", __LINE__);
		
		print_r($m);
		
		
	}//while(($pos == 1))
	
	show_Message("while loop => done", __LINE__);
	
	print_r($tokens);
	
}//do_job__PregMatchAll_WithPos_3($argv)

function _arrayWalk_Serialize($item) {

	$item = serialize($item);
	
}

/****************************************
* param => $text::String, $words::Array(Word)
****************************************/
function
do_job__PregMatchAll_WithPos_4($argv) {
	
	/****************************************
	* Variables
	****************************************/
	if (count($argv) > 2) {
	
		$text = $argv[2];
	
	} else {
			   //0123456789012345
// 		$text = "abcdefxxdeaaffzdes";
		$text = mb_convert_encoding(
				   //012345678901234567890123456789012
					"该堂在法庭战后提交给军事法庭的统计显示，"
				     //3456789012345678901234567890123456789
					. "在1937年12月城外至1938年5月1日，法庭该堂在"
// 					. "在1937年12月至1938年5月1日，该堂在"
					 //012345678901234567890123456789
					. "城区收埋7548具，在城外收埋104718具",
// 					"该堂在战后提交给军事法庭的统计显示，在1937年12月至1938年5月1日，该堂在城区收埋7548具，在城外收埋104718具",
					"SJIS", "UTF-8");
		
	}
		
	/****************************************
	* Words list
	****************************************/
	/****************************************
	 * Setup: Words
	****************************************/
	$W1 = new Word();
	$W2 = new Word();
	$W3 = new Word();
	
	$W1->w1 = mb_convert_encoding("法庭", "SJIS", "UTF-8");
	$W2->w1 = mb_convert_encoding("城区", "SJIS", "UTF-8");
	$W3->w1 = mb_convert_encoding("城外", "SJIS", "UTF-8");;
	
	// 	$W1->w1 = "de";
	// 	$W2->w1 = "de";
	// 	$W3->w1 = "cdef";
	// 	$W4->w1 = "ff";
	
	$W1->w2 = "aa"; $W2->w2 = "bb";
	$W3->w2 = "cc";
	
	$W1->w3 = "AA"; $W2->w3 = "BB";
	$W3->w3 = "CC";
	
	$Ws = array($W1, $W2, $W3);
// 	$Ws = array($W1, $W2, $W3, $W4);
	
	show_Message(
				"         0123456789012345678901234567890123456789",
				__LINE__);
	
	show_Message("\$text => $text", __LINE__);
	
	/****************************************
	* Processes
	****************************************/
	$words_WithPos = array();
	
	foreach ($Ws as $W) {
		
		$res = _do_job__PregMatchAll_WithPos_4__Execute($text, $W);
	
		foreach ($res as $item) {
			
			array_push($words_WithPos, $item);
		
		}
		
	}
// 		$res = _do_job__PregMatchAll_WithPos_4__Execute($text, $Ws[2]);
		
// 		foreach ($res as $item) {
			
// 			array_push($words_WithPos, $item);
		
// 		}
	
	show_Message("\$words_WithPos => ", __LINE__);
	print_r($words_WithPos);
	
// 	show_Message("\$text => ".substr($text, 92, 4), __LINE__);
	
// 	$res = _do_job__PregMatchAll_WithPos_4__Execute($text, $Ws[0]);
	
}//do_job__PregMatchAll_WithPos_4($argv)

function
_do_job__PregMatchAll_WithPos_4__Execute($text, $W) {

	/****************************************
	* Variables
	****************************************/
// 	$W = $Ws[0];
	
// 	show_Message("\$W =>", __LINE__);
// 	print_r($W);

	$offset = 0;
	
	// Set: Target
	$target = "/$W->w1/";
	
// 	show_Message("\$target => $target", __LINE__);
	
	$words_list = array();
	
	/****************************************
	* Processes 
	****************************************/
	$pos = preg_match($target, $text, $m, PREG_OFFSET_CAPTURE, $offset);
	
// 	show_Message("\$pos => $pos", __LINE__);
	
// 	show_Message("\$m =>", __LINE__);
// 	print_r($m);
	
	
	while(($pos == 1)) {
	
		// 		show_Message("\$m => ", __LINE__);
	
		// 		print_r($m);
	
// 		show_Message(
// 					"while loop => starts(\$pos => 1!) -----------------------",
// 					__LINE__);
	
// 		show_Message("Target found at => " . $m[0][1], __LINE__);

		$offset = $m[0][1];
		// 		$offset += $m[0][1];
		
// 		show_Message("Pushed into array: \$offset => $offset", __LINE__);
		
		array_push($words_list, array($W, $m[0][1]));

		$offset += strlen($W->w1);
		
// 		show_Message("\$offset is now => $offset", __LINE__);
		
		// $offset => Off the limit?
		if ($offset > (strlen($text) - 1)) {
				
			show_Message("offset => off the limit: $offset", __LINE__);
				
			// 			return $tokens;
			break;
				
		}
		
		$pos = preg_match($target, $text, $m, PREG_OFFSET_CAPTURE, $offset);
		
// 		show_Message("preg_match => done", __LINE__);
		
// 		print_r($m);
		
	}//while(($pos == 1))
	
// 	show_Message("\$words_list =>", __LINE__);
// 	print_r($words_list);
	
	return $words_list;
	
}//_do_job__PregMatchAll_WithPos_4__Execute($text, $Ws)

function
do_job__While() {
	
	$a = 3;
	$str = "abcde";
	
	$count = 0;
	
	while(($i = strlen($str)) > 1) {
		
		echo "\$i => larger than 1 \n\n";
		
		$count += 1;
		
		if ($count > 3) {
			
			echo "\$count => larger than 3";
			show_Message("\$count => larger than 3", __LINE__);
			
			break;
			
		}
		
	}
}

function do_job__ArrayTest() {
	
	$a = array(
	    0 => array
	        (
	            0 => "de",
	            1 => 3
	        )
	);
	
	print_r($a);
	
	show_Message("\$a[0] => ", __LINE__);
	
	print_r($a[0]);

	// 2
	show_Message("\$a[0] => imploded", __LINE__);
	
	print_r(implode(",", $a[0]));
	
	// 3
	show_Message("\$a[0][1] => ", __LINE__);
	
	print_r($a[0][1]);
	
	show_Message($a[0][1], __LINE__);
	
}//do_job__ArrayTest()

function show_Message($text, $line) {
	
	echo "[$line] $text\n\n";
	
}

function write_Log($text, $line) {

	$max_LineNum = 2000;

	$path_LogFile = join(
				DIRECTORY_SEPARATOR,
				array(dirname(__FILE__), "log.txt")
			);

	/****************************************
		* Dir exists?
	****************************************/
	$dpath = dirname(__FILE__);
	
	if (!file_exists($dpath)) {
			
		mkdir($dpath, $mode=0777, $recursive=true);
			
	}

	/****************************************
		* File exists?
	****************************************/
	if (!file_exists($path_LogFile)) {
			
		// 			mkdir($path_LogFile, $mode=0777);
		//REF touch http://php.net/touch
		$res = touch($path_LogFile);
			
		if ($res == false) {

			return;

		}
			
	}

	/****************************************
		* File => longer than the max num?
	****************************************/
	//REF read content http://www.php.net/manual/en/function.file.php
	$lines = file($path_LogFile);

	$file_Length = count($lines);

	$log_File = null;

	if ($file_Length > $max_LineNum) {

		//REF copy http://stackoverflow.com/questions/5772769/how-to-copy-a-file-from-one-directory-to-another-using-php
		// 			$res = copy($path_LogFile, $path_LogFile.".copy");
		// 			$fname_Tokens = $path_LogFile.split(".");
			
		$dname = dirname($path_LogFile);
			
		// 			$fname_Tokens = split(".", $path_LogFile);
			
		// 			$new_name = $fname_Tokens[0]
		// 						."_"
		// 						.Utils::get_CurrentTime2(CONS::$timeLabelTypes['serial'])
		// 						.$fname_Tokens[1]
		// 						;
		$new_name = join(
				DIRECTORY_SEPARATOR,
				array(
						$dname,
						"log"."_".get_CurrentTime2('serial')
						.".txt")
		);

		$res = rename($path_LogFile, $new_name);
			
	} else {
			
		// 			$msg = "(\$file_Length > \$max_LineNum) => false";
			
		// 			write_Log(
		// 				CONS::get_dPath_Log(),
		// 				$msg,
		// 				__FILE__,
		// 				__LINE__);
			
	}

	/****************************************
		* File: open
	****************************************/
// 	$log_File = fopen($path_LogFile, "ab");
	$log_File = fopen($path_LogFile, "a");

	/****************************************
		* Write
	****************************************/
	// 		//REF replace http://oshiete.goo.ne.jp/qa/3163848.html
	// 		$file = str_replace(ROOT.DS, "", $file);

	$time = get_CurrentTime2('basic');

	// 		$full_Text = "[$time : $file : $line] %% $text"."\n";
	$full_Text = "[$time : ".basename(__FILE__)." : $line] $text"."\n";

	$res = fwrite($log_File, $full_Text);

	/****************************************
		* File: Close
	****************************************/
	fclose($log_File);
		
}//function write_Log($dpath, $text, $file, $line)

/****************************************
* @param $labelType => <br>
* rails	=> 'Y-m-d H:i:s'<br>
* basic	=> 'Y/m/d H:i:s'<br>
* serial	=> 'Ymd_His'<br>
* default	=> 'Y/m/d H:i:s'<br>
****************************************/
function
get_CurrentTime2($labelType) {
	//REF http://stackoverflow.com/questions/470617/get-current-date-and-time-in-php
	date_default_timezone_set('Asia/Tokyo');

	switch($labelType) {
			
		case "rails":

			return date('Y-m-d H:i:s', time());

		case "basic":

			return date('Y/m/d H:i:s', time());

		case "serial":

			return date('Ymd_His', time());

		default:

			return date('Y/m/d H:i:s', time());

	}//switch($labelType)

	// 		return date('m/d/Y H:i:s', time());

}//function get_CurrentTime2($labelType)

class Word {
	
	public $w1;
	public $w2;
	public $w3;
	
}

do_job($argv);

// write_Log(dirname(__FILE__), "test", __FILE__, __LINE__);
// echo get_CurrentTime2('rails');

// D_3_v_1_4::do_task();

// print_r($argv);

// D_3_v_1_4::task_2();

// $test = new D_3_v_1_4();

// $test->do_task();
