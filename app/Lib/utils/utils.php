<?php

	function write_Log($dpath, $text, $file, $line) {
	
		$max_LineNum = CONS::$logFile_maxLineNum;
// 		$max_LineNum = 200;
// 		$max_LineNum = 4000;
// 		$max_LineNum = 40000;
		
// 		$dpath_LogFile = join(
// 					DS,
// 					array(ROOT, APP_DIR, "Lib", "log"));
		
		$path_LogFile = join(
					DS,
					array($dpath, "log.txt"));
		
		/****************************************
		* Dir exists?
		****************************************/
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
		
// 		try {
			
// 			$msg = "strval(\$file_Length) => ".strval($file_Length);
// 	// 		$msg = "strval(count(\$lines)) => ".strval(count($lines));
			
// 			write_Log(
// 				CONS::get_dPath_Log(),
// 				$msg,
// 				__FILE__,
// 				__LINE__);
			
// 		} catch (Exception $e) {
			
// 			$msg = "exception => ".$e;
			
// 			write_Log(
// 				CONS::get_dPath_Log(),
// 				$msg,
// 				__FILE__,
// 				__LINE__);
			
// 		}

		//test
		
		
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
					DS,
					array(
							$dname,
							"log"."_".Utils::get_CurrentTime2(
									CONS::$timeLabelTypes['serial'])
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
		$log_File = fopen($path_LogFile, "a");
		
		/****************************************
		* Write
		****************************************/
// 		//REF replace http://oshiete.goo.ne.jp/qa/3163848.html
// 		$file = str_replace(ROOT.DS, "", $file);
		
		$time = get_CurrentTime();
		
// 		$full_Text = "[$time : $file : $line] %% $text"."\n";
		$full_Text = "[$time : $file : $line] $text"."\n";
		
		$res = fwrite($log_File, $full_Text);
		
		/****************************************
		* File: Close
		****************************************/
		fclose($log_File);
			
	}//function write_Log($dpath, $text, $file, $line)

	function get_CurrentTime() {
		//REF http://stackoverflow.com/questions/470617/get-current-date-and-time-in-php
		date_default_timezone_set('Asia/Tokyo');
		
		return date('m/d/Y H:i:s', time());
		
	}
	
	function _postData_Text($backup_Url, $csv_Line) {
// 	function _postData_Text($backup_Url) {
// 	function _postData_Text($backup_Url, $model) {
		
		//REF C:\WORKS\WS\WS_Android\CR6(R)\lib\utils.rb
		$parameters = _postdata_Text__BuildParams();
		
// 		$data = "data[Text]=TEXT";
// 		$data = "data['Text']=TEXT";
// 		$data = array("data['Text']" => "TEXT");
// 		$data = array("abc" => "ABC");
// 		$data = "data[Text][text]=TEXT";
// 		$data = array("data[Text][text]" => "TEXTTEXT");
		$data = array(
					"data[Text][text]" => $csv_Line[1],
					"data[Text][url]" => $csv_Line[1],
		);
// 					"data[Text][text]" => "TEXTTEXT",
// 					"data[ABC]" => "abc",
// 					"xxx[XX]" => "XXX");
// 					"xxx" => "XXX");
		
		//REF http://book.cakephp.org/2.0/en/core-utility-libraries/httpsocket.html
		//REF http://stackoverflow.com/questions/9598097/get-and-post-in-cakephp answered Mar 7 '12 at 8:39
		//REF http://stackoverflow.com/questions/18592807/cakephp-send-parameters-to-another-url-from-controller
		App::uses('HttpSocket', 'Network/Http');
		
		$HttpSocket = new HttpSocket();
		
		
		$results = $HttpSocket->post(
				$backup_Url,
				$data
// 				'name=test&type=user'
		);
		
// 		debug(get_class($results));
// 		debug($results);
		
// 		http_post_data($backup_Url, $data);
// 		http_post_fields($backup_Url, $data);
		
	}//function _postData_Text($backup_Url, $model)
	
	function _postdata_Text__BuildParams() {
		
		
		
	}//function _postdata_Text__BuildParams()
	
	class Utils {
		
		public static function get_HostName() {
			
			$pieces = parse_url(Router::url('/', true));
			
			return $pieces['host'];
			
		}//public function get_HostName()
		
		public static function
		get_CurrentTime2($labelType) {
			//REF http://stackoverflow.com/questions/470617/get-current-date-and-time-in-php
			date_default_timezone_set('Asia/Tokyo');
		
			switch($labelType) {
					
				case CONS::$timeLabelTypes["rails"]:
		
					return date('Y-m-d H:i:s', time());
		
				case CONS::$timeLabelTypes["basic"]:
		
					return date('Y/m/d H:i:s', time());
		
				case CONS::$timeLabelTypes["serial"]:
		
					return date('Ymd_His', time());
						
				default:
		
					return date('Y/m/d H:i:s', time());
		
			}//switch($labelType)
		
			// 		return date('m/d/Y H:i:s', time());
		
		}//function get_CurrentTime2($labelType)
		
	}//class Utils
	