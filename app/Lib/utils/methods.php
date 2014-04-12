<?php

	function save_TextsFromCSVLines($csv_Lines) {
		
		$msg = "Starting => save_TextsFromCSVLines";
		
// 		$m = (new CONS())->get_LogPath();
		$m = new CONS();
		
		$log_Path = $m->get_dPath_Log();
// 		$log_Path = $m->get_LogPath();
// 		$log_Path = (new CONS())->get_LogPath();
		
		write_Log(
			$log_Path,
// 			$this->path_Log,
			$msg,
			__FILE__,
			__LINE__);
		
		//REF App::import http://stackoverflow.com/questions/980556/can-i-use-one-model-inside-of-a-different-model-in-cakephp answered Jun 11 '09 at 14:38
		App::import('model','Text');

// 		$text = new Text();
		
		foreach ($csv_Lines as $line) {
			//cake	=> 03/19/2014 20:57:56
			//rails	=> 2013-05-01 15:39:17 UTC
			//0		1	2	3		4		5		6			7		8	9	10				11				12			13
			//id,text,title,word_ids,url,genre_id,subgenre_id,lang_id,memo,dbId,created_at_mill,updated_at_mill,created_at,updated_at
			//38,"發展性閱讀障礙是特殊學習困難的",發展性閱讀障礙是特殊學習困難的其中一種。意指兒童在閱讀能力上較,,http://hkssc.com.hk/service/target/t7,0,0,1,"是特殊學習困難DONE",0,1368459511974,1368459511974,2013-05-06 23:31:04 UTC,2013-05-13 15:38:31 UTC
// 			$this->Text->create();
			
			$text = new Text();
			
			$text->set('text', $line[1]);
			$text->set('title', $line[2]);
			$text->set('url', $line[4]);
			
			$text->set('lang_id', $line[7]);
			
			$text->set('r_created_at', $line[12]);
			$text->set('r_updated_at', $line[13]);
			$text->set('r_id', $line[0]);
			
			$text->set(
					'created_at',
					Utils::get_CurrentTime2(CONS::$timeLabelTypes['rails']));
			
			$text->set('updated_at',
					Utils::get_CurrentTime2(CONS::$timeLabelTypes['rails']));
			
// 			$this->Text->create();
				
// 			$this->Text->set('text', $line[1]);
// 			$this->Text->set('url', $line[4]);
// 			$this->Text->set('lang_id', $line[7]);
// 			$this->Text->set('created_at', $line[12]);
// 			$this->Text->set('updated_at', $line[13]);
// 			$this->Text->set('title', $line[2]);
		
			$text->save();
		
		}//foreach ($csv_Lines as $line)
			
	}//function save_TextsFromCSVLines($csv_Lines)
	
	function con_RailsTime2CakeTime($time_Label) {
		
		
	}//function con_RailsTime2CakeTime($time_Label)
	
	class DBS {
		
		static $tname_Words = "words";
		
		static $tname_Langs = "langs";
		
		static $tname_Texts = "texts";
		
		public function tableExists($fpath_DB, $tname) {
			
			$cons = new CONS();
			
			$msg = "tableExists()";
			
			write_Log(
				$cons->get_dPath_Log(),
				$msg,
				__FILE__,
				__LINE__);
			
			
			$cons = new CONS();
			
			$fPath_dbFile_Local = $cons->get_fPath_DB();
			
			$msg = "\$fPath_dbFile_Local => ".$fPath_dbFile_Local;
			
			write_Log(
				$cons->get_dPath_Log(),
				$msg,
				__FILE__,
				__LINE__);
			
			
			
			$db = new SQLite3($fPath_dbFile_Local);
			
// 			$sql = ".tables";
			$sql = "SELECT name FROM sqlite_master"
					." WHERE type='table'";
// 					." WHERE type='table' AND name='table_name'";
			
			$results = $db->query($sql);
			
// 			$msg = "\$results => ".$results;
			
// 			write_Log(
// 				$cons->get_dPath_Log(),
// 				$msg,
// 				__FILE__,
// 				__LINE__);
			
			
			$tnames = array();
			
			while ($row = $results->fetchArray()) {
				
				$msg = "\$row => ".count($row)
						."/"
						.implode(", ", $row);
// 				$msg = "\$row => ".get_class($row);
// 				$msg = "\$row => ".$row;
				
				write_Log(
					$cons->get_dPath_Log(),
					$msg,
					__FILE__,
					__LINE__);
				
				
// 				var_dump($row);
				array_push($tnames, $row);
			}
			
			$msg = "\$tnames => ".strval(count($tnames));
			
			write_Log(
				$cons->get_dPath_Log(),
				$msg,
				__FILE__,
				__LINE__);
			
			/****************************************
			* Table: exists?
			****************************************/
			foreach ($tnames as $item) {
				
				if ($item[0] == $tname) {
					
					return true;
				}
			
			}
			
			return false;
// 			return count($tnames);
			
		}
	}
	
	class CONS {
		
// 		const dbName_Local = "development.sqlite3";
// 		private final $dbName_Local = "development.sqlite3";
		public static $dbName_Local = "development.sqlite3";
		
		public static $local_HostName = "localhost";
		
		public static $timeLabelTypes = array(
				
				"rails" => "railsType",	// "yyyy-MM-dd H:i:s"
				"basic" => "basicType",	// "yyyy/MM/dd H:i:s"
				"serial" => "serialType"	// "yyyyMMdd_His"
		);
		
		/****************************************
		* csv files
		****************************************/
		public static $csv_Langs = "Lang_backup.csv";
		
// 		public static $logFile_maxLineNum = 2;
		public static $logFile_maxLineNum = 3000;
		
		/****************************************
		* Session keys
		****************************************/
		public static $sKeys_CurrentPage = "current_page";
		
		public static $sKeys_CurrentIter = "current_iteration";
		
		public static $sKeys_CurrentLot = "current_lot";
		
		/****************************************
		* functions *****************************
		****************************************/
		public static function get_HostName() {
			
			//REF http://stackoverflow.com/questions/18959320/cakephp-find-hostname-from-url-in-cakephp answered Sep 23 '13 at 12:39
			$pieces = parse_url(Router::url('/', true));
			
			if ($pieces != null) {
			
				return $pieces['host'];
			
			} else {
			
				return null;
				
			}
			
// 			print $pieces['host'];
			
		}//public function get_HostName()
		
		public static function get_dPath_Log() {
			
			return join(DS, array(ROOT, "lib", "log"));
// 			return join(DS, array(ROOT, "lib", "log", "log.txt"));
			
		}
		
		public static function get_fPath_DB_Sqlite() {
			
			$msg = "WEBROOT_DIR => ".WEBROOT_DIR
					."/"
					."WWW_ROOT => ".WWW_ROOT;
			
			write_Log(
				CONS::get_dPath_Log(),
// 				$this->get_dPath_Log(),
				$msg,
				__FILE__,
				__LINE__);
			
			
			return join(DS,
					array(ROOT, APP_DIR, WEBROOT_DIR, CONS::$dbName_Local)); 
// 					array(ROOT, APP_DIR, WEBROOT_DIR, $this->dbName_Local)); 
			
		}
		
		public static function
		save_LangsFromCSVLines($csv_Lines) {
		
			$msg = "Starting => save_LangsFromCSVLines";
		
// 			$m = new CONS();
		
			$log_Path = CONS::get_dPath_Log();
// 			$log_Path = $m->get_dPath_Log();
		
			write_Log(
					$log_Path,
					// 			$this->path_Log,
					$msg,
					__FILE__,
					__LINE__);
		
			//REF App::import http://stackoverflow.com/questions/980556/can-i-use-one-model-inside-of-a-different-model-in-cakephp answered Jun 11 '09 at 14:38
			App::import('model','Lang');
		
			// 		$text = new Text();
		
			foreach ($csv_Lines as $line) {
				//cake	=> 03/19/2014 20:57:56
				//rails	=> 2013-05-01 15:39:17 UTC
				//0		1	2				3				4			5
				//id,name,created_at_mill,updated_at_mill,created_at,updated_at
				//1,Chinese,1367208921280,1367208921280,2013-04-29 04:15:21 UTC,2013-04-29 04:15:21 UTC
					
				$lang = new Lang();
					
				$lang->set('name', $line[1]);
					
				$lang->set('r_created_at', $line[4]);
				$lang->set('r_updated_at', $line[5]);
				$lang->set('r_id', $line[0]);
					
				$lang->set(
						'created_at',
						Utils::get_CurrentTime2(CONS::$timeLabelTypes['rails']));
					
				$lang->set('updated_at',
						Utils::get_CurrentTime2(CONS::$timeLabelTypes['rails']));
					
				$lang->save();
		
			}//foreach ($csv_Lines as $line)
				
		}//save_LangsFromCSVLines($csv_Lines)
		
		public static function
		save_WordsFromCSVLines($csv_Lines) {
		
			$msg = "Starting => save_WordsFromCSVLines";
		
// 			$m = new CONS();
		
			$log_Path = CONS::get_dPath_Log();
// 			$log_Path = $m->get_dPath_Log();
		
			write_Log(
					$log_Path,
					// 			$this->path_Log,
					$msg,
					__FILE__,
					__LINE__);
		
			//REF App::import http://stackoverflow.com/questions/980556/can-i-use-one-model-inside-of-a-different-model-in-cakephp answered Jun 11 '09 at 14:38
			App::import('model','Word');
		
			// 		$text = new Text();
		
			
			foreach ($csv_Lines as $line) {
				//cake	=> 03/19/2014 20:57:56
				//rails	=> 2013-05-01 15:39:17 UTC
				
				//0	 1	2	3	4		5		6		7
				//id,w1,w2,w3,text_ids,text_id,lang_id,dbId,
				//8					9				10			11
				//created_at_mill,updated_at_mill,created_at,updated_at
				
				//3831,遗体,yi2-,"",,268,1,0,
				//1394102775684,1394102775684,2014-03-06 10:46:15 UTC,2014-03-06 10:46:15 UTC
					
				$word = new Word();
					
				try {
					
					$msg = "w1=".$line[1]
							."("
							."\$line length=".strval(count($line))
							.")"
							."\$line="
							.implode("@", $line)
							;
					
					write_Log(
						CONS::get_dPath_Log(),
						$msg,
						__FILE__,
						__LINE__);
					
					
					$word->set('w1', $line[1]);
					$word->set('w2', $line[2]);
					$word->set('w3', $line[3]);
					
					$word->set('text_id', $line[5]);
					$word->set('lang_id', $line[6]);
						
					$word->set('r_created_at', $line[10]);
					$word->set('r_updated_at', $line[11]);
					$word->set('r_id', $line[0]);
						
					$word->set(
							'created_at',
							Utils::get_CurrentTime2(CONS::$timeLabelTypes['rails']));
						
					$word->set('updated_at',
							Utils::get_CurrentTime2(CONS::$timeLabelTypes['rails']));
						
					$word->save();
					
					$msg = "saved => ".$line[1];
					
					write_Log(
						CONS::get_dPath_Log(),
						$msg,
						__FILE__,
						__LINE__);
					
					
				} catch (Exception $e) {
					
					$msg = "exception => " + $e;
					
					write_Log(
						CONS::get_dPath_Log(),
						$msg,
						__FILE__,
						__LINE__);
					
					
				}
		
			}//foreach ($csv_Lines as $line)
				
		}//save_LangsFromCSVLines($csv_Lines)
		
	}//class CONS
	
	class SQLs {
		
// 		<langs>
// 		t.string   "name"
// 		t.integer  "created_at_mill", :limit => 8, :default => 0, :null => false
// 		t.integer  "updated_at_mill", :limit => 8, :default => 0, :null => false
// 		t.datetime "created_at",                                  :null => false
// 		t.datetime "updated_at",                                  :null => false
		
// 		<words>
// 		t.string   "w1"
// 		t.string   "w2"
// 		t.string   "w3"

// 		t.string   "text_ids"
// 		t.integer  "text_id",                      :default => 0, :null => false
// 		t.integer  "lang_id",                      :default => 0, :null => false
	
// 		t.integer  "dbId",                         :default => 0, :null => false
// 		t.integer  "created_at_mill", :limit => 8, :default => 0, :null => false
// 		t.integer  "updated_at_mill", :limit => 8, :default => 0, :null => false
// 		t.datetime "created_at",                                  :null => false
// 		t.datetime "updated_at",                                  :null => false

		
		public function getSql_CreateTable_Words() {
			
			$cols_Names = array(
					"id",
					"created_at",
					"updated_at",
					
					"w1",
					"w2",
					"w3",
					
					"text_ids",
					"text_id",
					"lang_id",
					
					"r_id",		// rails id
					"r_created_at",
					"r_updated_at",
					
			);
			
			$cols_Types = array(
			
					"INTEGER PRIMARY KEY     AUTOINCREMENT	NOT NULL",
					"VARCHAR(30)",
					"VARCHAR(30)",
					
					"TEXT",
					"TEXT",
					"TEXT",
					
					"TEXT",
					"INT",
					"INT",
					
					"INT",
					"TEXT",
					"TEXT"
					
			);
			
			// Build: sql
			$sql_Param = "CREATE TABLE ".DBS::$tname_Words." (";
			
			$sql_array = array();
			
			for ($i = 0; $i < count($cols_Names); $i++) {
				
				array_push($sql_array, $cols_Names[$i]." ".$cols_Types[$i]);
				
// 				$sql_Param .= $cols_Names[$i].", ".$cols_Types[$i];
// 				$sql_Param += $cols_Names[$i].", ".$cols_Types[$i];
				
			}
			
			$sql_Param .= join(", ", $sql_array);
// 			$sql_Param .= " ";
// 			$sql_Param += " ";
			
			$sql_Param .= " )";
			
			return $sql_Param;
			
						
		}//public function getSql_CreateTable_Words()
		
	}//class SQLs

	class RetVals {
		
		/****************************************
		* Successes
		****************************************/
		
		/****************************************
		* Failed
		****************************************/
		static $tableDoesntExists		= -200;
		
		static $tableExists		= -201;
		
		/****************************************
		* Others
		****************************************/
		static $sqlDone			= 400;
		
	}
	
	class Methods {
		
		/****************************************
		* @return array([0] => array([0] => chars, [1] => position))
		****************************************/
		static function
		preg_MatchAll_WithPos($text, $chars) {
		
			/****************************************
			 * Variables
			****************************************/
			$tokens = array();
			
			$target = "/$chars/";
		
			$offset = 0;
			
// 			$msg = "\$chars=$chars"
// 					. "/"
					
// 					;
			
// 			write_Log(
// 				CONS::get_dPath_Log(),
// 				$msg,
// 				__FILE__,
// 				__LINE__);
			
			/****************************************
			 * Processes
			****************************************/
			$pos = preg_match($target, $text, $m, PREG_OFFSET_CAPTURE, $offset);
		
// 			$msg = "\$m => " . serialize($m);
			
// 			write_Log(
// 				CONS::get_dPath_Log(),
// 				$msg,
// 				__FILE__,
// 				__LINE__);
			
			
			while(($pos == 1)) {
		
				// Push token into $tokens
				$offset = $m[0][1];
				// 		$offset += $m[0][1];
		
				array_push($tokens, array($chars, $m[0][1]));
				// 		array_push($tokens, array($chars, $offset));
				
				// Increment $offset
				$offset += strlen($chars);
		
				// $offset => Off the limit?
				if ($offset > (strlen($text) - 1)) {
						
					show_Message("offset => off the limit: $offset", __LINE__);
						
					return $tokens;
// 					break;
						
				}
		
				$pos = preg_match($target, $text, $m, PREG_OFFSET_CAPTURE, $offset);
		
			}//while(($pos == 1))

			return $tokens;
		
		}//preg_MatchAll_WithPos($argv)

		static function
// 		_do_job__PregMatchAll_WithPos_4__Execute($text, $W) {
		preg_MatchAll_WithPos_4($text, $W) {
		
			/****************************************
			 * Variables
			****************************************/
			$offset = 0;
		
			// Set: Target
			$chars = $W['w1'];
			
			$target = "/$chars/";
// 			$target = "/$W->w1/";
		
			$words_list = array();
		
			/****************************************
			 * Processes
			****************************************/
			$pos = preg_match($target, $text, $m, PREG_OFFSET_CAPTURE, $offset);
		
			while(($pos == 1)) {
		
				$offset = $m[0][1];
		
				array_push($words_list, array($W, $m[0][1]));
		
				$offset += strlen($chars);
// 				$offset += strlen($W->w1);
		
				// $offset => Off the limit?
				if ($offset > (strlen($text) - 1)) {
		
		
					return $words_list;
		
				}
		
				$pos = preg_match($target, $text, $m, PREG_OFFSET_CAPTURE, $offset);
		
			}//while(($pos == 1))
		
			return $words_list;
		
		}//preg_MatchAll_WithPos_4($text, $W)
// 		}//_do_job__PregMatchAll_WithPos_4__Execute($text, $Ws)

		static function
		addLink_4($text, $words_Filtered) {
// 		_do_job__AddLink_4__Execute($text, $chars) {
		
			/****************************************
			 * Replace:
			****************************************/
			for ($i = 0; $i < count($words_Filtered); $i++) {
		
// 				$prefix = "<a href='onclick(alert(\""
				$prefix = "<span style='color:blue;' onClick='alert(\""
						. $words_Filtered[$i][0]['w1']
// 						. $words_Filtered[$i][0]->w1
						. "/"
						. $words_Filtered[$i][0]['w2']
// 						. $words_Filtered[$i][0]->w2
						. "/"
						. $words_Filtered[$i][0]['w3']
// 						. $words_Filtered[$i][0]->w3
						. "/"
// 						. "\"))'>";
						. "\")'>";
		
				$suffix = "</span>";
// 				$suffix = "</a>";
		
				$rep = $prefix . $words_Filtered[$i][0]['w1'] . $suffix;
// 				$rep = $prefix . $words_Filtered[$i][0]->w1 . $suffix;
		
				$len = strlen($words_Filtered[$i][0]['w1']);
		
				// Replace
				$res = substr_replace(
						$text,
						$rep,
						$words_Filtered[$i][1],
						strlen($words_Filtered[$i][0]['w1']));
		
				// Positions => update
				$add = strlen($prefix) + strlen($suffix);
		
				for ($j = 0; $j < count($words_Filtered); $j++) {
		
					if ($words_Filtered[$j][1] > $words_Filtered[$i][1]) {
		
						$words_Filtered[$j][1] += $add;
		
					}
		
				}//for ($i = 0; $i < count($chars); $i++)
		
				$words_Filtered[$i][1] += strlen($prefix);
		
				// Update
				$text = $res;
		
			}//for ($i = 0; $i < count($chars); $i++)
		
			return $text;
		
		}//_do_job__AddLink_4__Execute($text, $Ws)

		/****************************************
		 * Judge: $wordSet_1 is in the range of $wordSet_2
		****************************************/
		static function
		_is_InRange($wordSet_1, $wordSet_2) {
		
			// log
			$msg = "\$wordSet_1 => ";
// 			show_Message($msg, __LINE__);
// 			print_r($wordSet_1);
		
// 			write_Log($msg.serialize($wordSet_1), __LINE__);
		
			$msg = "\$wordSet_2 => ";
// 			show_Message($msg, __LINE__);
// 			print_r($wordSet_2);
		
// 			write_Log($msg.serialize($wordSet_2), __LINE__);
		
		
			$W1_Pos_Start = $wordSet_1[1];
			$W2_Pos_Start = $wordSet_2[1];
		
			$W1_Pos_End = $W1_Pos_Start + strlen($wordSet_1[0]['w1']);
			$W2_Pos_End = $W2_Pos_Start + strlen($wordSet_2[0]['w1']);
// 			$W1_Pos_End = $W1_Pos_Start + strlen($wordSet_1[0]->w1);
// 			$W2_Pos_End = $W2_Pos_Start + strlen($wordSet_2[0]->w1);
		
// 			// log
// 			$msg = "\$W1_Pos_Start => $W1_Pos_Start"
// 			."//"
// 					."\$W2_Pos_Start => $W2_Pos_Start"
// 					;
// 					show_Message($msg, __LINE__);
// 					write_Log($msg, __LINE__);
		
// 					$msg = "\$W1_Pos_End => $W1_Pos_End"
// 					."//"
// 							."\$W2_Pos_End => $W2_Pos_End"
// 							;
// 							show_Message($msg, __LINE__);
// 							write_Log($msg, __LINE__);
		
		
			return ($W2_Pos_Start <= $W1_Pos_Start
					&& $W2_Pos_End >= $W1_Pos_End);
		
		}//_is_InRange($wordSet_1, $wordSet_2)
		
		/****************************************
		 * @return true => 'w1' of $wordObj_2 is<br>
		* 				contained in that of $wordObj_1
		****************************************/
		static function _isContained_W1($wordObj_1, $wordObj_2) {
		
			return strpos($wordObj_2['w1'], $wordObj_1['w1']);
			// 	return strpos($wordObj_1->w1, $wordObj_2->w1);
		
		}//_isContained_W1($wordObj_1, $wordObj_2)
		
		/****************************************
		 * Use serialize() to judge the 2 objects
		****************************************/
		static function
		_isSame_WordSet($wordSet1, $wordSet2) {
		
// 			$s1 = serialize($wordSet1);
// 			$s2 = serialize($wordSet2);

			$W1_w1 = $wordSet1[0]['w1'];
			$W2_w1 = $wordSet2[0]['w1'];
			
			$W1_pos = $wordSet1[1];
			$W2_pos = $wordSet2[1];
			
			$res = ($W1_w1 == $W2_w1)
					&& ($W1_pos == $W2_pos);
			
			return $res;
		
// 			return ($s1 == $s2) ? true : false;
		
		}//_isSame_WordObj($W1, $W2)

		static function
		do_job__Skim_WordsFiltered_4($text, $words_WithPos) {
		
			/****************************************
			 * Processes
			****************************************/
			$words_WithPos_2 = $words_WithPos;
		
			$skimmed_WordsList = array();
		
			/****************************************
			 * For: 1
			****************************************/
			for ($i = 0; $i < count($words_WithPos); $i++) {	// f1
		
// 				//log
// 				$msg = "For: 1 <$i>========================";
// 				write_Log(
// 					CONS::get_dPath_Log(),
// 					$msg,
// 					__FILE__,
// 					__LINE__);
				
		
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
						
// 					//log
// 					$msg = "For: 2 <$j>========================";
// 					write_Log(
// 							CONS::get_dPath_Log(),
// 							$msg,
// 							basename(__FILE__),
// 							__LINE__);
					
					// Prep
					$Wset_j = $words_WithPos_2[$j];
					$Wj = $words_WithPos_2[$j][0];
					$Wj_pos = $words_WithPos_2[$j][1];
		
					/****************************************
					 * Judge: 1 => Contained?
					****************************************/
					$res = Methods::_isContained_W1($Wi, $Wj);
					// 			$res = _isContained_W1($Wi->w1, $Wj->w1);
						
					if ($res === false) {
						// 				if ($res == false) {
							
// 						// log
// 						$msg = "Not contained";
						
// 						write_Log(
// 							CONS::get_dPath_Log(),
// 							$msg,
// 							basename(__FILE__),
// 							__LINE__);
						
						$flag_IsIn = false;
							
					} else {
							
// 						// log
// 						$msg = "Contained";
						
// 						write_Log(
// 							CONS::get_dPath_Log(),
// 							$msg,
// 							basename(__FILE__),
// 							__LINE__);
						
						/****************************************
						 * Judge: 2 => In range?
						****************************************/
						$res = Methods::_is_InRange(
						// 						$words_WithPos_2[$j],
						// 						$words_WithPos[$i]
								$words_WithPos[$i],
								$words_WithPos_2[$j]
						);
		
						if ($res == true) {
								
// 							// log
// 							$msg = "Is in range";
							
// 							write_Log(
// 								CONS::get_dPath_Log(),
// 								$msg,
// 								basename(__FILE__),
// 								__LINE__);
							
							/****************************************
							 * Judge: 3 => Same object?
							****************************************/
							// Same word set?
							$res = Methods::_isSame_WordSet(
									$words_WithPos[$i],
									$words_WithPos_2[$j]);

							// 			$res = _isSame_WordObj_2($Wi, $Wj);
							// 			$res = _isSame_WordObj($Wi, $Wj);
		
							if ($res == true) {
									
// 								// log
// 								$msg = "Same -----------------";
								
// 								write_Log(
// 									CONS::get_dPath_Log(),
// 									$msg,
// 									__FILE__,
// 									__LINE__);

								// Next j
								continue;
		
								// 						$flag_IsIn = false;
									
								// 						break;
									
							} else {// _isSame_WordSet
									
// 								// log
// 								$msg = "Not same ---------------";
								
// 								write_Log(
// 								CONS::get_dPath_Log(),
// 								$msg,
// 								__FILE__,
// 								__LINE__);
								
								// flag
								$flag_IsIn = true;
		
								// End for-loop with j
								break;
		
							}//_isSame_WordSet
								
							// 					// Flag
							// 					$flag_IsIn = true;
								
						} else {// _is_InRange
								
// 							// log
// 							$msg = "Not in range";

// 							write_Log(
// 								CONS::get_dPath_Log(),
// 								$msg,
// 								basename(__FILE__),
// 								__LINE__);
							
							// flag
							$flag_IsIn = false;
								
						}//_is_InRange
							
					}//_isContained_W1
					// 			if ($res == true) {
		
				}//for ($j = 0; $j < count($words_WithPos_2); $j++)
								
				/****************************************
				* Flag => true/false
				****************************************/
				if ($flag_IsIn == false) {
					
// 					// log
// 					$msg = "\$flag_IsIn => false";
// 					// 							show_Message($msg, __LINE__);
// 					// 							write_Log($msg, __LINE__);
					
// 					write_Log(
// 					CONS::get_dPath_Log(),
// 					$msg,
// 					__FILE__,
// 					__LINE__);
									
					$res = Methods::_isIn_SkimmedList_2(
								$skimmed_WordsList, $Wi);
					// 			$res = _isIn_SkimmedList($skimmed_WordsList, $Wi);
					
					if ($res == false) {
				
// 						// log
// 						$msg = "_isIn_SkimmedList_2 => false";
						
// 						write_Log(
// 						CONS::get_dPath_Log(),
// 						$msg,
// 						__FILE__,
// 						__LINE__);
							
						array_push(
								$skimmed_WordsList,
								$words_WithPos[$i]);
					// 				array_push($skimmed_WordsList, $Wi);;
	
					}
								
				} else {//if ($flag_IsIn == false)
					
// 					// log
// 					$msg = "\$flag_IsIn => true";
// 					// 							show_Message($msg, __LINE__);
// 					// 							write_Log($msg, __LINE__);
					
// 					write_Log(
// 					CONS::get_dPath_Log(),
// 					$msg,
// 					__FILE__,
// 					__LINE__);
									
				}//if ($flag_IsIn == false)
		
			}//for ($i = 0; $i < count($words_WithPos); $i++)
		
			/****************************************
					* Show: Result
					****************************************/
			// log
			$msg = "Skimming => done";
// 					show_Message($msg, __LINE__);
// 					write_Log($msg, __LINE__);
			
			write_Log(
				CONS::get_dPath_Log(),
				$msg,
				__FILE__,
				__LINE__);
			
// 					// log
// 					$msg = "\$skimmed_WordsList => ";
// 					show_Message($msg, __LINE__);
// 					print_r($skimmed_WordsList);
				
// 					write_Log($msg.serialize($skimmed_WordsList), __LINE__);
		
			return $skimmed_WordsList;
			
		}//do_job__Skim_WordsFiltered_4($argv)

		static function
		_isIn_SkimmedList_2($skimmed_WordsList, $wordObject) {
		
			$wordObject_s = serialize($wordObject);
		
			foreach ($skimmed_WordsList as $item) {
		
				$item_s = serialize($item);
		
				$res = ($item_s == $wordObject_s);
		
				if ($res == true) return true;
		
			}
		
			return false;
		
		}//_isIn_SkimmedList_2($skimmed_WordsList, $Wset)
		
		
	}//class Methods
	