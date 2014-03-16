<?php

class TextsController extends AppController {
	public $helpers = array('Html', 'Form');
	
	public function index() {
		$this->set('texts', $this->Text->find('all'));
		
		$this->_Setup_Paths();
		
	}
	
	public function _Setup_Paths() {
		
		$path_Log = join(DS, array(ROOT, APP_DIR, "Lib", "log"));
		
		$this->set('path_Log', $path_Log);
		
		$path_Utils = join(DS, array(ROOT, APP_DIR, "Lib", "utils"));
		
		$this->set('path_Utils', $path_Utils);
		
		//REF recursive http://stackoverflow.com/questions/2795177/how-to-convert-boolean-to-string
// 		$res = mkdir($path_Log.DS."loglog", $mode=0777, $recursive=false);
		
		$res = false;
		
		if (!file_exists($path_Log)) {
		
			$res = @mkdir($path_Log, $mode=0777, $recursive=true);
		
		}
		
		$this->set('res', $res);
		
		/****************************************
		 * Create dir: utils
		 ****************************************/
		$res2 = false;
		
		if (!file_exists($path_Utils)) {
		
			$res = @mkdir($path_Utils, $mode=0777, $recursive=true);
		
		}
		
		$this->set('res2', $res2);
		
	}//public function _Setup_Paths()
	
}
