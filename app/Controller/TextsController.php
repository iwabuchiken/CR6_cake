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
	
	public $path_BackupUrl_Text;
	
	public $fpath_Log;
	
	public $path_Docs;
	
	public $fname_Utils		= "utils.php";

	public function beforeFilter() {
		
		$this->_Setup_Paths();
		
		require $this->path_Utils.DS.$this->fname_Utils;
		
	}
	
	public function index() {

		//debug
		if ($this->request->is('post')) {
			
			write_Log(
				$this->path_Log,
				"is post",
				__FILE__,
				__LINE__);
			
		} else {
			
			write_Log(
				$this->path_Log,
				"is not post",
				__FILE__,
				__LINE__);
			
		}
		
		//debug
// 		$this->set('data', $this->params['url']['abc']);
// 		$this->set('data', $this->request->data);
		$this->set('data', $this->request->data['Text']);
		
		write_Log(
			$this->path_Log,
			implode(",", array_keys($this->request->data)),
			__FILE__,
			__LINE__);
		
		write_Log(
			$this->path_Log,
			implode(",", array_keys($this->request->xxx)),
			__FILE__,
			__LINE__);
		
		
		debug($this->request->data);
		
// 		debug($this->request->data);
// 		debug($this->params['url']['abc']);
// 		$this->set('data', $this->request->data['Text']);
// 		$this->set('params', $this->request->params);
// 		if ($this->request->params) {
// // 		if ($this->request->params['abc']) {
		
// 			write_Log(
// 				$this->path_Log,
// 				"params => ".implode(",", $this->request->params),
// // 				"params => ".$this->request->params['abc'],
// 				__FILE__,
// 				__LINE__);
			
		
// 		} else {
			
// 			write_Log(
// 				$this->path_Log,
// 				"params => no",
// 				__FILE__,
// 				__LINE__);
			
		
// 		}
		
		$this->set('texts', $this->Text->find('all'));
		
// 		$this->_Setup_Paths();
		
// 		$text = "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa".
// 				"aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa".
// 				"aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
		
		$text = "index() => starts";
		
		write_Log($this->path_Log, $text, __FILE__, __LINE__);
		
// 		$this->_Setup_LogFile();
		
	}

	public function add() {
	
		if ($this->request->is('post')) {
			$this->Text->create();
		  
			//REF http://cakephp.jp/modules/newbb/viewtopic.php?topic_id=2624&forum=7
			$this->request->data['Text']['created_at'] = get_CurrentTime();
			$this->request->data['Text']['updated_at'] = get_CurrentTime();
			
			// Title
			$title_Length = 15;
			
			if ($this->request->data['Text'] &&
					$this->request->data['Text']['text']) {
				
				if (strlen($this->request->data['Text']['text'])
							< $title_Length) {
				
					$this->request->data['Text']['title'] =
								$this->request->data['Text']['text'];
				
				} else {
					
					$this->request->data['Text']['title'] =
							substr($this->request->data['Text']['text'],
									0,
									$title_Length);
				
				}//if (strlen($this->request->data['Text']['text'])
				
			}
		  
			// Save text
			if ($this->Text->save($this->request->data)) {
				$this->Session->setFlash(__('Your post has been saved.'));
				return $this->redirect(
								array(
									'controller' => 'texts',
									'action' => 'index'));
				//                return $this->redirect(array('action' => 'index'));
				
			}
			
			$this->Session->setFlash(__('Unable to add your post.'));
		}
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
	

	
	public function build_texts() {

		$fpath_Csv = join(DS, array($this->path_Docs, "Text_backup.csv"));
		
		$csv_File = fopen($fpath_Csv, "r");
		
		write_Log(
			$this->path_Log,
			"\$csv => opened($csv_File)",
			__FILE__, __LINE__);
		
		$csv_Lines = null;
		
		if ($csv_File != false) {
			
			$csv_Lines = $this->_build_texts__GetCsvLines($csv_File);
			
		} else {
			
			write_Log(
					$this->path_Log,
					"\$csv => false",
					
					__FILE__, __LINE__);
			
			$csv_Lines = array();
			
		}
		
		$this->Session->setFlash(__('Redirected from build_texts()'));

		write_Log(
				$this->path_Log,
				"\$csv_Lines => ".strval(count($csv_Lines)),
				__FILE__, __LINE__);
		
		write_Log(
				$this->path_Log,
				"Flash => set",
				__FILE__, __LINE__);

		//debug
		$backup_Url = $this->path_BackupUrl_Text;
// 		$backup_Url = "http://localhost/PHP_server/CR6_cake/texts/index";
// 		$backup_Url = "http://localhost/PHP_server/CR6_cake/texts/add";
		
		_postData_Text($backup_Url);
		
		//REF redirect http://book.cakephp.org/2.0/en/controllers.html
		return $this->redirect(
				array('controller' => 'texts', 'action' => 'index'));
		
	}//public function build_texts()

	public function _build_texts__GetCsvLines($csv_File) {
		
		$csv_Lines = array();
		
		for ($i = 0; $i < 3; $i++) {
			
			fgetcsv($csv_File);
			
		}
		
		//REF fgetcsv http://us3.php.net/manual/en/function.fgetcsv.php
		while ( ($data = fgetcsv($csv_File) ) !== FALSE ) {
			
			array_push($csv_Lines, $data);
			
		}
		
		return $csv_Lines;
		
	}//public function _build_texts__GetCsvLines($csv_File)
	
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
// 						"http://localhost/PHP_server/CR6_cake/texts/add";
						"http://localhost/PHP_server/CR6_cake/texts/index";
		
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

	private function _Setup_LogFile() {
		
// 		require $this->path_Utils.DS.$this->fname_Utils;
		
		$text = "XYZ";
// 		$text = "ABCDE";
		
		write_Log($this->path_Log, $text, __FILE__, __LINE__);
		
	}
}
