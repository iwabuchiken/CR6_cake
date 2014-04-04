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
	* Pagination
	****************************************/
	//REF http://book.cakephp.org/2.0/en/core-libraries/components/pagination.html
	public $components = array('Paginator');
	
	public $paginate = array(
			'limit' => 25,
			'order' => array(
					'Word.id' => 'asc'
			)
	);
	
	/****************************************
	* Associations
	****************************************/
	var $name = 'Words';
// 	var $name = 'Text';

	var $scaffold;
	
	public function beforeFilter() {
		
		setlocale(LC_ALL, 'ja_JP.UTF-8');
		
		$this->_Setup_Paths();
		
		require_once $this->path_Utils.DS.$this->fname_Utils;
// 		require $this->path_Utils.DS.$this->fname_Utils;
		
		require_once $this->path_Utils.DS."CONS.php";
		
		require_once $this->path_Utils.DS."methods.php";
		
		require_once $this->path_Utils.DS."db_util.php";
		
	}
	
	public function index() {

		$text = "index() => starts";
		
		write_Log($this->path_Log, $text, __FILE__, __LINE__);

		/****************************************
		* Get: words
		****************************************/
		//REF http://www.packtpub.com/article/working-with-simple-associations-using-cakephp
		$this->Word->recursive = 1;
		$words = $this->Word->find('all');
		
		/****************************************
		* Get: pagination data
		****************************************/
		$pagination_Data = $this->_index__Get_PaginationData();
		
		/****************************************
		* Paginate
		****************************************/
		if ($pagination_Data != null) {
			
			$total = count($words);
// 			$total = 6000;
// 			$total = 4036;
			$per_Page = $pagination_Data['per_page'];
			$page = $pagination_Data['page'];
			
			/****************************************
			* Set: data for view
			****************************************/
			$this->set('per_page', $per_Page);
			$this->set('total', $total);
			
// 			$per_Page = 50;
			
// 			$page = 3;
			
			$range = $this->_index__GetPaginationRange(
									$total, $per_Page, $page);
			
			$msg = "\$range => ".implode(",", $range)
					."("
					."\$total=".strval($total)
					."\$per_Page=".strval($per_Page)
					."\$page=".strval($page)
					.")"
					;
			
			write_Log(
				CONS::get_dPath_Log(),
				$msg,
				__FILE__,
				__LINE__);
			
			// Paginate
			$words = array_slice(
							$words,
							// Array index starts with 0,
							//	=> decrement the start value by 1
							$range["start"] - 1,	
							$range["length"]);
			
// 			$words = array_slice($words, $range[0], $range[1]);
// 			$words = array_slice($words, $range[0] - 1, $per_Page);
	// 		$words = array_slice($words, $range[0], $per_Page);

		} else {//if ($pagination_Data != null)

			$this->set('per_page', 10);
			
			$total = count($words);
			$this->set('total', $total);
// 			$this->set('total', 6000);
			
		}
		
		/****************************************
		* Set: View data
		****************************************/
		$this->set('words', $words);
		
		

		
// 		//REF http://book.cakephp.org/2.0/en/core-libraries/components/pagination.html
// 		$this->Paginator->settings = $this->paginate;
		
// 		// similar to findAll(), but fetches paged results
// 		$data = $this->Paginator->paginate('Text');
// 		$this->set('texts', $data);
		
// 		debug($data[0]);
		
		
		
		
		
		//test
// 		$this->_index_Experi_WriteLog();
// 		$this->_index_Experi_getEncoding();
		
	}//public function index()

	/****************************************
	* @return null => page and/or per page values not obtained
	****************************************/
	public function
	_index__Get_PaginationData() {
		
		//REF http://book.cakephp.org/2.0/en/controllers/request-response.html
		@$page = $this->request->query['page'];
		@$per_Page = $this->request->query['per_Page'];
		
		if ($page != null && $page != ""
				&& $per_Page != null && $per_Page != "") {
		
			return array(
					"page" => $page,
					"per_page" => $per_Page
			);
		
		} else {
		
			return null;
			
		}
		
		// 		$params = $this->params['page'];
		// 		$params = $this->request['page'];
		// 		$params = $this->request['pass'];
		// 		$params = $this->request;
		// 		object(CakeRequest) {
		// 			params => array(
		// 			'plugin' => null,
		// 			'controller' => 'words',
		// 			'action' => 'index',
		// 			'named' => array(),
		// 			'pass' => array()
		// 			)
		// 		$params = $this->params;
		// 		object(CakeRequest) {
		// 			params => array(
		// 			'plugin' => null,
		// 			'controller' => 'words',
		// 			'action' => 'index',
		// 			'named' => array(),
		// 			'pass' => array()
		// 			)
		// 		$params = $this->params['query'];	//=> null
		// 		$params = $this->query;	//=> null
		// 		$params = $this->request->query;	//=> null
		// 		$params = $this->request['query'];	//=> null
		// 		$params = $this->request['page'];	//=> null
		
// 		debug($params);
		
// 		// 		debug(get_class($params));
		
// 		$msg = "";
		
// 		if ($params == "") {
		
// 			$msg = "params => \"\"";
		
// 		} else if ($params == null) {
		
// 			$msg = "params => null";
				
// 		} else {
				
// 			$msg = "params => ".$params;
				
// 		}
		
// 		write_Log(
// 		CONS::get_dPath_Log(),
// 		$msg,
// 		__FILE__,
// 		__LINE__);

	}//_index__Get_PaginationData()
	
	public function
	_index__GetPaginationRange($total, $per_Page, $page) {

		$iterate = floor($total / $per_Page);
		$residue = $total % $per_Page;
		
		$msg = "\$total=".strval($total)
				."/"
				."\$per_Page=".strval($per_Page)
				."/"
				."\$page=".strval($page)
				."/"
				."\$iterate=".strval($iterate)
				."/"
				."\$residue=".strval($residue)
				;
		
		write_Log(
			CONS::get_dPath_Log(),
			$msg,
			__FILE__,
			__LINE__);
		
		
		/****************************************
		* Validate: Target page => within limit?
		****************************************/
		if($residue == 0 && $page > $iterate) {
			
			$this->Session->write(CONS::$sKeys_CurrentPage, 1);
			
			return array(
						"start" => 0,
						"length" => $per_Page);
// 			return array(0, 5);
			
		} else if($residue > 0 && $page > $iterate + 1) {
// 		} else if($residue > 0 && $page > $iterate + 1) {
			
			$msg = "\$residue > 0 && \$page > \$iterate";
			
			write_Log(
				CONS::get_dPath_Log(),
				$msg,
				__FILE__,
				__LINE__);

			$this->Session->write(CONS::$sKeys_CurrentPage, 1);
			
			return array(
					"start" => 0,
					"length" => $per_Page);
// 			return array(0, $per_Page);
			
		}//if($residue == 0 && $page > $iterate)
		
		/****************************************
		* Get: current page
		****************************************/
		$current_Page = $this->Session->read(CONS::$sKeys_CurrentPage);
		
		if ($current_Page == null) {
			
			$current_Page = 1;
			
		}
		
		/****************************************
		* Build: numbers
		****************************************/
		if ($page == $iterate + 1) {
		
			return array(
						"start"		=> 1 + $per_Page * ($page - 1),
						"length"	=> $residue
					);
		
		} else {
		
			return array(
					"start"		=> 1 + $per_Page * ($page - 1),
					"length"	=> $per_Page
			);
			
		}
		
// 		$start_Id = 1 + ($per_Page * ($page - 1));
// // 		$start_Id = ($page - 1) + ($per_Page * ($page - 1));
		
// 		$end_Id = $per_Page * $page;
		
// 		return array($start_Id, $end_Id);
		
	}//_index__GetPaginationRange($total, $page)
	
	public function _index_Experi_WriteLog() {
		
		$path_LogFile = join(
				DS,
				array(CONS::get_dPath_Log(), "log.txt"));
		
		$lines = file($path_LogFile);
		
		debug(strval(count($lines)));
		
		$msg = "strval(count(\$lines)) => ".strval(count($lines));
		
		$msg = "\$lines=".strval(count($lines))
				."/"
				."max num=".strval(CONS::$logFile_maxLineNum)
				."/(lines > max num) => "
				.((count($lines) > CONS::$logFile_maxLineNum) ? "yes" : "no")
				."/"
				."dpath=".dirname($path_LogFile)
				."/"
				."fpath=".$path_LogFile
				;
		
		write_Log(
			CONS::get_dPath_Log(),
			$msg,
			__FILE__,
			__LINE__);
		
		//
		$dname = dirname($path_LogFile);
		$fname_Tokens = split("\.", $path_LogFile);
		
// 		$new_name = $fname_Tokens[0]
		$new_name = join(
				DS,
				array(
					$dname,
					"log"."_".Utils::get_CurrentTime2(
							CONS::$timeLabelTypes['serial'])
						.".txt")
				);
				
		$res = rename($path_LogFile, $new_name);
		
		
		$msg = "dname=".$dname
				."@"
				."new_name=".$new_name
				."@"
				."tokens=".implode(",", $fname_Tokens)
				;
		
		write_Log(
			CONS::get_dPath_Log(),
			$msg,
			__FILE__,
			__LINE__);
		
		
// 		debug($lines);
		
	}
	public function _index_Experi_getEncoding() {
		
		/****************************************
		 * Setup
		****************************************/
		$fpath_Csv = join(DS, array($this->path_Docs, "Word_backup_1.csv"));
		// 		$fpath_Csv = join(DS, array($this->path_Docs, "Word_backup.csv"));
		
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
				
			$csv_Lines = $this->_build_Words__GetCsvLines($csv_File);
				
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
		
			debug(implode(",", $csv_Lines[0]));
			
// 			debug(mb_internal_encoding());
			
// 			$msg = "\$csv_Lines[0][1] => "
// 					.$csv_Lines[0][1];
				
// 			write_Log(
// 			CONS::get_dPath_Log(),
// 			$msg,
// 			__FILE__,
// 			__LINE__);
				
// 			$msg = "encoding => "
// 					.mb_detect_encoding($csv_Lines[0][1]);
				
// 			write_Log(
// 			CONS::get_dPath_Log(),
// 			$msg,
// 			__FILE__,
// 			__LINE__);
				
				
			// 			$res = $this->_build_Words__SaveData($csv_Lines);
			// // 			$res = _build_texts__SaveData($csv_Lines);
				
		}
		
		
		
	}
	
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
		if ($this->Word->deleteAll(array('Word.id >=' => 1))) {
// 		if ($this->Word->deleteAll(array('id >=' => 1))) {
			
			$this->Session->setFlash(__('Words all deleted'));
			
			return $this->redirect(array('action' => 'index'));
			
		} else {
		  
			$this->Session->setFlash(__('Words not deleted'));
			return $this->redirect(array('action' => 'index'));
		  
		}
	
	}
	
	
	public function build_Words_1() {
// 	public function build_Words() {

		//test :: D-2,v-4.1_p1
		$locale = 'ja_JP.UTF-8';
		setlocale(LC_ALL, $locale);
// 		setlocale(LC_ALL, 'ja_JP.UTF-8');
		
		$msg = "Locale => Set: ".$locale;
		
		write_Log(
			CONS::get_dPath_Log(),
			$msg,
			__FILE__,
			__LINE__);
		
		
		/****************************************
		* Setup
		****************************************/
		$fpath_Csv = join(DS, array($this->path_Docs, "Word_backup_1.csv"));
// 		$fpath_Csv = join(DS, array($this->path_Docs, "Word_backup.csv"));
		
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
			
			$csv_Lines = $this->_build_Words__GetCsvLines($csv_File);
			
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
		
			$msg = "\$csv_Lines[0][1] => "
					.$csv_Lines[0][1];
			
			write_Log(
				CONS::get_dPath_Log(),
				$msg,
				__FILE__,
				__LINE__);
			
			$msg = "encoding => "
					.mb_detect_encoding($csv_Lines[0][1]);
			
			write_Log(
				CONS::get_dPath_Log(),
				$msg,
				__FILE__,
				__LINE__);
			
			
			$res = $this->_build_Words__SaveData($csv_Lines);
// 			$res = _build_texts__SaveData($csv_Lines);
			
		}
		
		
		$this->Session->setFlash(__('Redirected from build_Words()'));

		//REF redirect http://book.cakephp.org/2.0/en/controllers.html
		return $this->redirect(
				array('controller' => 'words', 'action' => 'index'));
		
	}//public function build_texts()
	
	public function build_Words_2() {
// 	public function build_Words() {

		/****************************************
		* Setup
		****************************************/
		$fpath_Csv = join(DS, array($this->path_Docs, "Word_backup_2.csv"));
// 		$fpath_Csv = join(DS, array($this->path_Docs, "Word_backup.csv"));
		
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
			
			$csv_Lines = $this->_build_Words__GetCsvLines($csv_File);
			
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
		
			$res = $this->_build_Words__SaveData($csv_Lines);
// 			$res = _build_texts__SaveData($csv_Lines);
			
		}
		
		
		$this->Session->setFlash(__('Redirected from build_Words()'));

		//REF redirect http://book.cakephp.org/2.0/en/controllers.html
		return $this->redirect(
				array('controller' => 'words', 'action' => 'index'));
		
	}//public function build_texts()
	
	public function build_Words_3() {
// 	public function build_Words() {

		/****************************************
		* Setup
		****************************************/
		$fpath_Csv = join(DS, array($this->path_Docs, "Word_backup_3.csv"));
// 		$fpath_Csv = join(DS, array($this->path_Docs, "Word_backup.csv"));
		
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
			
			$csv_Lines = $this->_build_Words__GetCsvLines($csv_File);
			
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
		
			$res = $this->_build_Words__SaveData($csv_Lines);
// 			$res = _build_texts__SaveData($csv_Lines);
			
		}
		
		
		$this->Session->setFlash(__('Redirected from build_Words()'));

		//REF redirect http://book.cakephp.org/2.0/en/controllers.html
		return $this->redirect(
				array('controller' => 'words', 'action' => 'index'));
		
	}//public function build_texts()
	
	public function build_Words_4() {
// 	public function build_Words() {

		/****************************************
		* Setup
		****************************************/
		$fpath_Csv = join(DS, array($this->path_Docs, "Word_backup_4.csv"));
// 		$fpath_Csv = join(DS, array($this->path_Docs, "Word_backup.csv"));
		
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
			
			$csv_Lines = $this->_build_Words__GetCsvLines($csv_File);
			
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
		
			$res = $this->_build_Words__SaveData($csv_Lines);
// 			$res = _build_texts__SaveData($csv_Lines);
			
		}
		
		
		$this->Session->setFlash(__('Redirected from build_Words()'));

		//REF redirect http://book.cakephp.org/2.0/en/controllers.html
		return $this->redirect(
				array('controller' => 'words', 'action' => 'index'));
		
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

// 	function convert( $str ) {
	public function convert( $str ) {
		
    	return iconv( "Windows-1252", "UTF-8", $str );
    	
	}
	
	public function _build_Words__GetCsvLines($csv_File) {
		
		$csv_Lines = array();
		
		for ($i = 0; $i < 3; $i++) {
			
			fgetcsv($csv_File);
			
		}
		
		//test
		$temp_Num = 3;
		$count = 0;

		//test
		mb_internal_encoding("UTF-8");
		
		//REF fgetcsv http://us3.php.net/manual/en/function.fgetcsv.php
		while ( ($data = fgetcsv($csv_File) ) !== FALSE ) {
			
			array_push($csv_Lines, $data);
			
			//test
			if ($count < $temp_Num) {
				$msg = "\$data => ".implode(",", $data);
				
				write_Log(
					CONS::get_dPath_Log(),
					$msg,
					__FILE__,
					__LINE__);
				
// 				$data = array_map("convert", $data);
// 				$data = array_map(convert, $data);
// 				$msg = "\$data(mapped) => ".implode(",", $data);
				
// 				write_Log(
// 				CONS::get_dPath_Log(),
// 				$msg,
// 				__FILE__,
// 				__LINE__);
				
				
				$count ++;
			}
			
		}
		
		return $csv_Lines;
		
	}//public function _build_texts__GetCsvLines($csv_File)

	public function _build_Words__SaveData($csv_Lines) {

		$msg = "Start => _build_texts__SaveData";
		
		write_Log(
			$this->path_Log,
			$msg,
			__FILE__,
			__LINE__);
		
		
		CONS::save_WordsFromCSVLines($csv_Lines);
		
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

		DBUtil::createTable_Words(true);
// 		DBUtil::createTable_Words(false);
		
// 		$dbu = new DBUtil();
		
// 		$dbu->dropTable(DBUtil::$tname_Texts);
		
// 		$msg = "Table dropped => ".DBUtil::$tname_Texts;
		
// 		write_Log(
// 			CONS::get_dPath_Log(),
// 			$msg,
// 			__FILE__,
// 			__LINE__);
		
		
// 		$dbu->createTable_Texts();
		
		
		/****************************************
		* Refirection
		****************************************/
		$this->Session->setFlash(__('Back from exec_Sql()'));
		
		return $this->redirect(
				array('controller' => 'words', 'action' => 'index'));
		
	}//public function exec_Sql()
	
	public function recreate_Table() {

		$res = DBUtil::createTable_Words(true);
		
		$msg = "";
		
		if ($res == RetVals::$sqlDone) {
		
			$msg = "Sql => Done";
		
		} else {
		
			$msg = "Table already exists";
			
		}
		
		/****************************************
		* Refirection
		****************************************/
		$flash = "Back from exec_Sql()"." ($msg)";
		
		$this->Session->setFlash(__($flash));
// 		$this->Session->setFlash(__('Back from exec_Sql()'));
		
		return $this->redirect(
				array('controller' => 'words', 'action' => 'index'));
		
	}//public function exec_Sql()
	
	public function youTube() {
		
		
		
	}
}
