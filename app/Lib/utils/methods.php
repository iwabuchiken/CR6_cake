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
// 			$this->Text->create();
			
			$text = new Text();
			
			$text->set('text', $line[1]);
			$text->set('url', $line[4]);
			$text->set('lang_id', $line[7]);
			$text->set('created_at', $line[12]);
			$text->set('updated_at', $line[13]);
			$text->set('title', $line[2]);
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
		
		public function get_HostName() {
			
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
		
// 		public static $fpath_Log = "abc";
// 		public static $fpath_Log = implode(",", array(1,2,3));
// 		public static $fpath_Log = join("/", array("a", "b")); //syntax error, unexpected '(', expecting ',' or ';'
// 		public static $fpath_Log = join(DS, array(ROOT, "lib", "log", "log.txt"));
		
	}
	
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
	
	
	
	