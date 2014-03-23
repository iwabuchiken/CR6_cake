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
	
	class CONS {
		
		public function get_dPath_Log() {
			
			return join(DS, array(ROOT, "lib", "log"));
// 			return join(DS, array(ROOT, "lib", "log", "log.txt"));
			
		}
		
// 		public static $fpath_Log = "abc";
// 		public static $fpath_Log = implode(",", array(1,2,3));
// 		public static $fpath_Log = join("/", array("a", "b")); //syntax error, unexpected '(', expecting ',' or ';'
// 		public static $fpath_Log = join(DS, array(ROOT, "lib", "log", "log.txt"));
		
	}
	