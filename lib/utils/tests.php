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
		array	Array test
		h		Show help
		r		_exec_Tasks__GetRange
		strpos	Example of 'strpos()' function
		preg	Example of 'preg_match()' function
		pregall	Example of 'preg_match_all_WithPos()' function
		pregall2	Example of 'preg_match_all_WithPos_2()' function
		pregall3	preg_match_all_WithPos_3()
		pregreplace	do_job__PregReplace(\$argv)
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

class Word {
	
	public $w1;
	public $w2;
	public $w3;
	
}

do_job($argv);

// D_3_v_1_4::do_task();

// print_r($argv);

// D_3_v_1_4::task_2();

// $test = new D_3_v_1_4();

// $test->do_task();
