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

	/****************************************
	 * Associations
	****************************************/
	var $name = 'Langs';
	// 	var $name = 'Text';
	
	var $scaffold;
	
	
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

	public function build_Langs() {
	
		/****************************************
			* Setup
		****************************************/
		$fpath_Csv = join(DS, array($this->path_Docs, CONS::$csv_Langs));
	
		$csv_File = fopen($fpath_Csv, "r");
	
		/****************************************
			* Get: csv lines
		****************************************/
		$csv_Lines = null;
	
		if ($csv_File != false) {
				
			$csv_Lines = $this->_build_Langs__GetCsvLines($csv_File);
			
			$msg = "csv lines => built("
					.strval(count($csv_Lines));
			
			write_Log(
				CONS::get_dPath_Log(),
				$msg,
				__FILE__,
				__LINE__);
			
				
		} else {
				
			write_Log(
					$this->path_Log,
					"\$csv => false",
					__FILE__, __LINE__);
				
// 			$csv_Lines = array();
				
		}
	
		/****************************************
			* Save data
		****************************************/
		if ($csv_Lines == null) {
	
			write_Log(
					$this->path_Log,
					"\$csv_Lines => null",
					__FILE__,
					__LINE__);
	
		} else {
	
			$res = $this->_build_Langs__SaveData($csv_Lines);
				
		}
	
		$this->Session->setFlash(__('Redirected from build_Langs()'));
	
		//REF redirect http://book.cakephp.org/2.0/en/controllers.html
		return $this->redirect(
				array('controller' => 'langs', 'action' => 'index'));
	
	}//public function build_Langs()

	public function _build_Langs__GetCsvLines($csv_File) {
	
		$csv_Lines = array();
	
		/****************************************
		* Omit: Meta data lines
		****************************************/
		for ($i = 0; $i < 3; $i++) {
				
			fgetcsv($csv_File);
				
		}
	
		/****************************************
		* Get: CSV data
		****************************************/
		//REF fgetcsv http://us3.php.net/manual/en/function.fgetcsv.php
		while ( ($data = fgetcsv($csv_File) ) !== FALSE ) {
				
			array_push($csv_Lines, $data);
				
		}
	
		return $csv_Lines;
	
	}//public function _build_texts__GetCsvLines($csv_File)
	
	public function _build_Langs__SaveData($csv_Lines) {
	
		$msg = "Start => _build_Langs__SaveData";
	
		write_Log(
				$this->path_Log,
				$msg,
				__FILE__,
				__LINE__);
	
	
		CONS::save_LangsFromCSVLines($csv_Lines);
// 		save_LangsFromCSVLines($csv_Lines);
	
		// 		foreach ($csv_Lines as $line) {
		// 			//cake	=> 03/19/2014 20:57:56
		// 			//rails	=> 2013-05-01 15:39:17 UTC
		// 			//0		1	2	3		4		5		6			7		8	9	10				11				12			13
		// 			//id,text,title,word_ids,url,genre_id,subgenre_id,lang_id,memo,dbId,created_at_mill,updated_at_mill,created_at,updated_at
		// 			$this->Text->create();
			
		// 			$this->Text->set('text', $line[1]);
		// 			$this->Text->set('url', $line[4]);
		// 			$this->Text->set('lang_id', $line[7]);
		// 			$this->Text->set('created_at', $line[12]);
		// 			$this->Text->set('updated_at', $line[13]);
		// 			$this->Text->set('title', $line[2]);
	
		// 			$this->Text->save();
	
		// 		}
	
	}
	
}
