<?php

	function write_Log($dpath, $text, $file, $line) {
	
		$max_LineNum = 40000;
		
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
		
		$log_File = null;
		
		if ($file_Length > $max_LineNum) {

			//REF copy http://stackoverflow.com/questions/5772769/how-to-copy-a-file-from-one-directory-to-another-using-php
			$res = copy($path_LogFile, $path_LogFile.".copy");
			
		}

		/****************************************
		* File: open
		****************************************/
		$log_File = fopen($path_LogFile, "a");
		
		/****************************************
		* Write
		****************************************/
		//REF replace http://oshiete.goo.ne.jp/qa/3163848.html
		$file = str_replace(ROOT.DS, "", $file);
		
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
		
		date_default_timezone_set('Asia/Tokyo');
		
		return date('m/d/Y H:i:s', time());
		
	}