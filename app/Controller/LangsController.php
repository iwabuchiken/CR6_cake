<?php

class LangsController extends AppController {
	public $helpers = array('Html', 'Form', 'Js');

	public $path_Log;
	
	public $path_Utils;
	
	public $path_BackupUrl_Text;
	
	public $fpath_Log;
	
	public $path_Docs;
	
	public $fname_Utils		= "utils.php";
	
	public $title_Length	= 60;
	
	
	public function beforeFilter() {

		$this->_Setup_Paths();
		
		require_once $this->path_Utils.DS.$this->fname_Utils;
// 		require $this->path_Utils.DS.$this->fname_Utils;
		
		require_once $this->path_Utils.DS."CONS.php";
		
		require_once $this->path_Utils.DS."methods.php";
		
		require_once $this->path_Utils.DS."db_util.php";
		
	}
	
	public function index() {

		
		$text = "index() => starts";
		
		write_Log(CONS::get_dPath_Log(), $text, __FILE__, __LINE__);
		
		$this->set('langs', $this->Lang->find('all'));
		
	}//public function index()
	
	public function get_Log() {
		
		//REF layout http://stackoverflow.com/questions/7426469/assigning-layout-in-cakephp
		$this->layout = 'layout_log';
		
		$lines = file($this->fpath_Log);
		
		$lines = array_reverse($lines);
		
		$log_Text = join("<br><br>", $lines);
// 		$log_Text = join("<br>", $lines);
		
		$this->set('log_Text', $log_Text);
		
	}
	
	public function delete_all() {
	
		//REF http://book.cakephp.org/2.0/ja/core-libraries/helpers/html.html
		if ($this->Lang->deleteAll(array('id >=' => 1))) {
			$this->Session->setFlash(__('Langs =>  all deleted'));
			return $this->redirect(array('action' => 'index'));
		} else {
		  
			$this->Session->setFlash(__('Langs =>  not deleted'));
			return $this->redirect(array('action' => 'index'));
		  
		}
	
	}
	
	public function exec_Sql() {

		$dbu = new DBUtil();
		
		/****************************************
		* Refirection
		****************************************/
		$this->Session->setFlash(__('Back from exec_Sql()'));
		
		return $this->redirect(
				array('controller' => 'langs', 'action' => 'index'));
		
	}//public function exec_Sql()

	private function _Setup_Paths() {
		/****************************************
			* Build: Paths
		****************************************/
		$this->path_Log = join(DS, array(ROOT, "lib", "log"));
		// 		$this->path_Log = join(DS, array(ROOT, APP_DIR, "Lib", "log"));
	
		$this->fpath_Log = join(DS, array(ROOT, "lib", "log", "log.txt"));
	
		$this->path_Utils = join(DS, array(ROOT, APP_DIR, "Lib", "utils"));
	
		$this->path_Docs = join(DS, array(ROOT, APP_DIR, "Lib", "docs"));
	
		$this->path_BackupUrl_Text =
		"http://localhost/PHP_server/CR6_cake/texts/add";
		// 						"http://localhost/PHP_server/CR6_cake/texts/index";
	
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
	
		/****************************************
		 * Create dir: utils
		****************************************/
		if (!file_exists($this->path_Docs)) {
	
			$res = @mkdir($this->path_Docs, $mode=0777, $recursive=true);
	
		}
	
	
	}//public function _Setup_Paths()
	
}
