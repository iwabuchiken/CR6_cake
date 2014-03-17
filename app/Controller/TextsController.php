<?php

class TextsController extends AppController {
	public $helpers = array('Html', 'Form', 'Js');
// 	public $helpers = array('Html', 'Form', 'Javascript');
// 	public $helpers = array('Html', 'Form', 'js');
// 	public $helpers = array('Html', 'Form', 'Javascript');
// 	public $helpers = array('Html', 'Form');

	//REF global variable http://stackoverflow.com/questions/12638962/global-variable-in-controller-cakephp-2
	public $path_Log;
	
	public $path_Utils;
	
	public $fpath_Log;
	
	public $fname_Utils		= "utils.php";

	public function beforeFilter() {
		
		$this->_Setup_Paths();
		
		require $this->path_Utils.DS.$this->fname_Utils;
		
	}
	
	public function index() {
		$this->set('texts', $this->Text->find('all'));
		
// 		$this->_Setup_Paths();
		
// 		$text = "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa".
// 				"aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa".
// 				"aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
		
		$text = "index() => starts";
		
		write_Log($this->path_Log, $text, __FILE__, __LINE__);
		
// 		$this->_Setup_LogFile();
		
	}
	
	public function get_Log() {
		
		//REF layout http://stackoverflow.com/questions/7426469/assigning-layout-in-cakephp
		$this->layout = 'layout_log';
		
		$lines = file($this->fpath_Log);
		
		$lines = array_reverse($lines);
		
		$log_Text = join("<br><br>", $lines);
// 		$log_Text = join("<br>", $lines);
		
		$this->set('log_Text', $log_Text);
		
	}
	
	private function _Setup_Paths() {
		
		$this->path_Log = join(DS, array(ROOT, "lib", "log"));
// 		$this->path_Log = join(DS, array(ROOT, APP_DIR, "Lib", "log"));

		$this->fpath_Log = join(DS, array(ROOT, "lib", "log", "log.txt"));
		
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

	private function _Setup_LogFile() {
		
// 		require $this->path_Utils.DS.$this->fname_Utils;
		
		$text = "XYZ";
// 		$text = "ABCDE";
		
		write_Log($this->path_Log, $text, __FILE__, __LINE__);
		
	}
}
