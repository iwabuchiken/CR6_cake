<?php

class TextsController extends AppController {
	public $helpers = array('Html', 'Form');

	//REF global variable http://stackoverflow.com/questions/12638962/global-variable-in-controller-cakephp-2
	public $path_Log;
	
	public $path_Utils;
	
	public $fname_Utils		= "utils.php";
	
	public function index() {
		$this->set('texts', $this->Text->find('all'));
		
		$this->_Setup_Paths();
		
		$this->_Setup_LogFile();
		
	}
	
	public function _Setup_Paths() {
		
		$this->path_Log = join(DS, array(ROOT, "lib", "log"));
// 		$this->path_Log = join(DS, array(ROOT, APP_DIR, "Lib", "log"));
		
		$this->path_Utils = join(DS, array(ROOT, APP_DIR, "Lib", "utils"));
		
		/****************************************
		 * Create dir: log
		 ****************************************/
		//REF recursive http://stackoverflow.com/questions/2795177/how-to-convert-boolean-to-string
// 		$res = mkdir($path_Log.DS."loglog", $mode=0777, $recursive=false);
		
		$res = false;
		
		if (!file_exists($this->path_Log)) {
		
			$res = @mkdir($this->path_Log, $mode=0777, $recursive=true);
		
		}
		
		/****************************************
		 * Create dir: utils
		 ****************************************/
		$res2 = false;
		
		if (!file_exists($this->path_Utils)) {
		
			$res = @mkdir($this->path_Utils, $mode=0777, $recursive=true);
		
		}

		
	}//public function _Setup_Paths()

	public function _Setup_LogFile() {
		
		require $this->path_Utils.DS.$this->fname_Utils;
		
		$text = "ABCDE";
		
		write_Log($this->path_Log, $text, __FILE__, __LINE__);
		
	}
}
