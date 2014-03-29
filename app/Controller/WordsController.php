<?php

class WordsController extends AppController {
	public $helpers = array('Html', 'Form', 'Js');

	//REF global variable http://stackoverflow.com/questions/12638962/global-variable-in-controller-cakephp-2
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
	var $name = 'Words';
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

		//REF http://www.packtpub.com/article/working-with-simple-associations-using-cakephp
		$this->Word->recursive = 1;
		$words = $this->Word->find('all');
		$this->set('words', $words);
		
		$text = "index() => starts";
		
		write_Log($this->path_Log, $text, __FILE__, __LINE__);
		
		
	}//public function index()
	
	public function add() {
	
		if ($this->request->is('post')) {
			$this->Text->create();
		  
			//REF request http://book.cakephp.org/2.0/en/controllers/request-response.html#cakerequest
			//REF http://cakephp.jp/modules/newbb/viewtopic.php?topic_id=2624&forum=7
			$this->request->data['Text']['created_at'] = get_CurrentTime();
			$this->request->data['Text']['updated_at'] = get_CurrentTime();
			
			// Title
			$title_Length = $this->title_Length;
// 			$title_Length = 15;
			
			if ($this->request->data['Text'] &&
					$this->request->data['Text']['text']) {
				
				write_Log(
					$this->path_Log,
					"length => ".strval(
							strlen($this->request->data['Text']['text'])),
					__FILE__,
					__LINE__);
				
				
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
		  
// 			//debug
// // 			debug($this->request->data);
// 			write_Log(
// 				$this->path_Log,
// 				"data => ".implode(",", $this->request->data),
// 				__FILE__,
// 				__LINE__);
			
			//debug
			$msg = "url => ".$this->request->data['Text']['url'];
			
			write_Log(
				$this->path_Log,
				$msg,
				__FILE__,
				__LINE__);
			
			
			
			// Save text
			if ($this->Text->save($this->request->data)) {
				$this->Session->setFlash(__('Your post has been saved.'));
				
				//debug
				write_Log(
					$this->path_Log,
					"text => ".$this->Text->text,
					__FILE__,
					__LINE__);
				
				
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
	
	public function delete_all() {
	
		//REF http://book.cakephp.org/2.0/ja/core-libraries/helpers/html.html
		if ($this->Text->deleteAll(array('id >=' => 1))) {
			$this->Session->setFlash(__('Texts all deleted'));
			return $this->redirect(array('action' => 'index'));
		} else {
		  
			$this->Session->setFlash(__('Texts not deleted'));
			return $this->redirect(array('action' => 'index'));
		  
		}
	
	}
	
	
	public function build_texts() {

		/****************************************
		* Setup
		****************************************/
		$fpath_Csv = join(DS, array($this->path_Docs, "Text_backup.csv"));
		
		$csv_File = fopen($fpath_Csv, "r");
		
// 		write_Log(
// 			$this->path_Log,
// 			"\$csv => opened($csv_File)",
// 			__FILE__, __LINE__);
		
		/****************************************
		* Get: csv lines
		****************************************/
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
		
			$res = $this->_build_texts__SaveData($csv_Lines);
// 			$res = _build_texts__SaveData($csv_Lines);
			
		}
		
		
		$this->Session->setFlash(__('Redirected from build_texts()'));

// 		//debug
// 		$backup_Url = $this->path_BackupUrl_Text;
// // 		$backup_Url = "http://localhost/PHP_server/CR6_cake/texts/index";
// // 		$backup_Url = "http://localhost/PHP_server/CR6_cake/texts/add";
		
// 		if ($csv_Lines != null) {
		
// 			_postData_Text($backup_Url, $csv_Lines);
// // 			_postData_Text($backup_Url, $csv_Lines[0]);
		
// 		} else {
			
// 			write_Log(
// 				$this->path_Log,
// 				"\$csv_Lines => null",
// 				__FILE__,
// 				__LINE__);
		
// 		}
		
		//REF redirect http://book.cakephp.org/2.0/en/controllers.html
		return $this->redirect(
				array('controller' => 'texts', 'action' => 'index'));
		
	}//public function build_texts()
	
	public function execute_Tasks() {
		
		$this->Text->recursive = 1;
		$texts = $this->Text->find('all');
		
		$this->loadModel('Lang');
		
		$langs = $this->Lang->find('all');
		
// 		debug($langs[0]);

		foreach ($texts as $text) {
			
			$lang_id = $text['Text']['lang_id'];
			
			foreach ($langs as $lang) {
				
				$r_id = $lang['Lang']['r_id'];
				
				if ($lang_id == $r_id) {
					
					$msg = "(\$lang_id == \$r_id) => "
							."\$lang_id=".strval($lang_id)
							."/"
							."\$r_id=".strval($r_id)
							;
					
					write_Log(
						CONS::get_dPath_Log(),
						$msg,
						__FILE__,
						__LINE__);
					
					
					$text['Text']['lang_id'] = $lang['Lang']['id'];
// 					$text['Text']['lang_id'] = $lang['id'];
					
					$this->Text->save($text['Text'], false);
					
					break;
					
				}
				
			}//foreach ($langs as $lang)
			
		}//foreach ($texts as $text)
		
		
		
		
		$this->Session->setFlash(__('Redirected from execute_Tasks()'));
		
		//REF redirect http://book.cakephp.org/2.0/en/controllers.html
		return $this->redirect(
				array('controller' => 'texts', 'action' => 'index'));
		
		
		// 		//REF http://book.cakephp.org/2.0/en/models/saving-your-data.html#model-save-array-data-null-boolean-validate-true-array-fieldlist-array "If you want to update a value, "
		// 		$data = array('id' => 282, 'title' => 'My new title');
		// 		// This will update Recipe with id 10
		// 		$this->Text->save($data);
		
		//REF http://stackoverflow.com/questions/19672105/cakephp-model-update-issue answered Oct 30 '13 at 1:42
// 		$text['Text']['title'] = "abc";
		
		// 		App::import('model','Lang');
		//REF http://stackoverflow.com/questions/3696701/cakephp-using-models-in-different-controllers answered Sep 12 '10 at 21:31
		
		// 		$this->Text->save($text['Text'], false);
		
		// 		$msg = "save => done";
		
		// 		write_Log(

		// 			CONS::get_dPath_Log(),
		// 			$msg,
		// 			__FILE__,
		// 			__LINE__);
		
		
		// 		$text['Text']->saveField('title', "abc");
		// 		$text->saveField('title', "abc");
		
		// // 		debug($text);
		
		// 		$msg = "text => ".mb_substr($text['Text']['text'], 0, 10);
		
		// 		write_Log(
		// 			CONS::get_dPath_Log(),
		// 			$msg,
		// 			__FILE__,
		// 			__LINE__);
		
		
		
		
		
	}//public function execute_Tasks()

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

	public function _build_texts__SaveData($csv_Lines) {

		$msg = "Start => _build_texts__SaveData";
		
		write_Log(
			$this->path_Log,
			$msg,
			__FILE__,
			__LINE__);
		
		
		save_TextsFromCSVLines($csv_Lines);
		
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

	private function _Setup_LogFile() {
		
// 		require $this->path_Utils.DS.$this->fname_Utils;
		
		$text = "XYZ";
// 		$text = "ABCDE";
		
		write_Log($this->path_Log, $text, __FILE__, __LINE__);
		
	}

	public function exec_Sql() {

		$dbu = new DBUtil();
		
		$dbu->dropTable(DBUtil::$tname_Texts);
		
		$msg = "Table dropped => ".DBUtil::$tname_Texts;
		
		write_Log(
			CONS::get_dPath_Log(),
			$msg,
			__FILE__,
			__LINE__);
		
		
		$dbu->createTable_Texts();
		
		
// 		$dbu->createTable_Langs();
		
// 		$dbu->get_TableList();
		
// 		$cons = new CONS();
		
// 		$sqls = new SQLs();
		
// 		$dbs = new DBS();
		
// 		$fPath_dbFile_Local = $cons->get_fPath_DB();
		
		
// // 		$dbh = new PDO($dsn, $user, $password);

// 		$sql = "CREATE TABLE test ("
// 				."id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,"
// // 				."test id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,"
// 				."created_at VARCHAR(30),"
// 				."updated_at VARCHAR(30)"
// 				.")";
// // 				."updated_at VARCHAR(30),";
		
// 		try{
			
// 			$dbh = new PDO($dsn, $user, $password);
			
// 			$msg = "PDO instance => created";
			
// 			write_Log(
// 				$this->path_Log,
// 				$msg,
// 				__FILE__,
// 				__LINE__);
			
			
// 			//REF http://stackoverflow.com/questions/19577056/using-pdo-to-create-table
// 			$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			
// 			$res = $dbh->exec($sql);
			
// 			$msg = "\$res => ".$res;
			
// 			write_Log(
// 				$this->path_Log,
// 				$msg,
// 				__FILE__,
// 				__LINE__);
			
			
// 			$msg = "sql => done: ".$sql;
			
// 			write_Log(
// 				$this->path_Log,
// 				$msg,
// 				__FILE__,
// 				__LINE__);
			
			
// 		}catch (PDOException $e){
			
// 			$msg = 'Connection failed:'.$e->getMessage();
			
// 			write_Log(
// 				$this->path_Log,
// 				$msg,
// 				__FILE__,
// 				__LINE__);
			
// // 			print('Connection failed:'.$e->getMessage());
// // 			die();
			
// 		}
		
// 		$dbh = null;
		
		/****************************************
		* Refirection
		****************************************/
		$this->Session->setFlash(__('Back from exec_Sql()'));
		
		return $this->redirect(
				array('controller' => 'texts', 'action' => 'index'));
		
	}//public function exec_Sql()
	
}
