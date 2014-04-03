<?php
	class DBUtil {
		
		/****************************************
		 * PDO
		****************************************/
		//REF http://www.phpbook.jp/tutorial/pdo/index3.html
		static $dsn = 'mysql:dbname=LAA0278957-cr6cake; host=mysql012.phy.lolipop.lan';
		static $dsn_Local = 'sqlite:';
		static $user = 'LAA0278957';
		static $password = '47yhl44j6u';
		
		/****************************************
		* DB data
		****************************************/
		public static $colName_Table_Remote = "Tables_in_LAA0278957-cr6cake";

		/****************************************
		* Tables
		****************************************/
		static $tname_Words = "words";
		
		static $tname_Langs = "langs";
		
		static $tname_Texts = "texts";
		
		/****************************************
		* @return Table exists => RetVals::$tableExists(-20)
		* 
		****************************************/
		public function createTable_Langs() {
			
			$cons = new CONS();
			
			$dpath_Log = $cons->get_dPath_Log();
			
			$msg = "createTable_Langs()";
			
			write_Log(
				$dpath_Log,
				$msg,
				__FILE__,
				__LINE__);
			
			/****************************************
			* Table => exists?
			****************************************/
			$target_TableName = DBS::$tname_Langs;
// 			$target_TableName = DBS::$tname_Words;
			
			$res = DBUtil::tableExists($target_TableName);
// 			$res = $this->tableExists($target_TableName);
// 			$res = $this->tableExists(DBS::$tname_Langs);
			
			$msg = "";
			
			if ($res == true) {
			
// 				$msg = "true";
				$msg = "Table exists => ".$target_TableName;
			
				write_Log(
					CONS::get_dPath_Log(),
					$msg,
					__FILE__,
					__LINE__);
				
				return RetVals::$tableExists;
				
			} else {
			
				$msg = "Table doesn't exist => ".$target_TableName;
				
				write_Log(
					CONS::get_dPath_Log(),
					$msg,
					__FILE__,
					__LINE__);
				
// 				$msg = "false";
				
			}

			/****************************************
			* Host name
			****************************************/
			$is_Local = false;
			
			if (CONS::get_HostName() == CONS::$local_HostName) {
				
				$is_Local = true;
				
			}
			
			/****************************************
			* Setup
			****************************************/
			$dbh = null;
			
			if ($is_Local == true) {
			
				$pdo_Param = "sqlite:".CONS::get_fPath_DB_Sqlite();
				
				$dbh = new PDO($pdo_Param);
			
			} else {
				
				$dbh = new PDO(DBUtil::$dsn, DBUtil::$user, DBUtil::$password);
// 				$dbh = new PDO($this->dsn, $this->user, $this->password);
			
			}
			
			$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			
			$msg = "\$dbh->setAttribute => done";
			
			write_Log(
				CONS::get_dPath_Log(),
				$msg,
				__FILE__,
				__LINE__);
			
			
			/****************************************
			* Sql
			****************************************/
			$sql = $this->getSql_CreateTable_Langs(DBS::$tname_Langs, $is_Local);
			
			$msg = "\$sql => ".$sql;
			
			write_Log(
				CONS::get_dPath_Log(),
				$msg,
				__FILE__,
				__LINE__);
			
			
			/****************************************
			* Exec: Sql
			****************************************/
			$res = $dbh->exec($sql);
				
			$msg = "\$res => ".strval($res);
			
			write_Log(
				CONS::get_dPath_Log(),
				$msg,
				__FILE__,
				__LINE__);
			
			/****************************************
			* Close
			****************************************/
			$dbh = null;
			
		}//public function createTable_Langs()
		
		/****************************************
		* @return Table exists => RetVals::$tableExists(-20)
		* 
		****************************************/
		public function createTable_Texts() {
			
			$cons = new CONS();
			
			$dpath_Log = $cons->get_dPath_Log();
			
			$msg = "createTable_Texts()";
			
			write_Log(
				$dpath_Log,
				$msg,
				__FILE__,
				__LINE__);
			
			/****************************************
			* Table => exists?
			****************************************/
			$target_TableName = DBS::$tname_Texts;
			
			$res = $this->tableExists($target_TableName);
// 			$res = $this->tableExists(DBS::$tname_Langs);
			
			$msg = "";
			
			if ($res == true) {
			
// 				$msg = "true";
				$msg = "Table exists => ".$target_TableName;
			
				write_Log(
					CONS::get_dPath_Log(),
					$msg,
					__FILE__,
					__LINE__);
				
				return RetVals::$tableExists;
				
			} else {
			
				$msg = "Table doesn't exist => ".$target_TableName;
				
				write_Log(
					CONS::get_dPath_Log(),
					$msg,
					__FILE__,
					__LINE__);
				
// 				$msg = "false";
				
			}

			/****************************************
			* Host name
			****************************************/
			$is_Local = false;
			
			if (CONS::get_HostName() == CONS::$local_HostName) {
				
				$is_Local = true;
				
			}
			
			/****************************************
			* Setup
			****************************************/
			$dbh = null;
			
			if ($is_Local == true) {
			
				$pdo_Param = "sqlite:".CONS::get_fPath_DB_Sqlite();
				
				$dbh = new PDO($pdo_Param);
			
			} else {
				
				$dbh = new PDO(DBUtil::$dsn, DBUtil::$user, DBUtil::$password);
// 				$dbh = new PDO($this->dsn, $this->user, $this->password);
			
			}
			
			$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			
			$msg = "\$dbh->setAttribute => done";
			
			write_Log(
				CONS::get_dPath_Log(),
				$msg,
				__FILE__,
				__LINE__);
			
			
			/****************************************
			* Sql
			****************************************/
			$sql = $this->getSql_CreateTable_Texts(DBS::$tname_Texts, $is_Local);
			
			$msg = "\$sql => ".$sql;
			
			write_Log(
				CONS::get_dPath_Log(),
				$msg,
				__FILE__,
				__LINE__);
			
			
			/****************************************
			* Exec: Sql
			****************************************/
			$res = $dbh->exec($sql);
				
			$msg = "\$res => ".strval($res);
			
			write_Log(
					CONS::get_dPath_Log(),
					$msg,
					__FILE__,
					__LINE__);
			
			/****************************************
			* Close
			****************************************/
			$dbh = null;
			
		}//public function createTable_Texts()
		
		/****************************************
		* @param $force true => Drop the table if exists already
		****************************************/
		public static function createTable_Words($force) {
			/****************************************
			 * Host name
			****************************************/
			$is_Local = false;
				
			if (CONS::get_HostName() == CONS::$local_HostName) {
			
				$is_Local = true;
			
			}
				
			/****************************************
			* Setup
			****************************************/
			$cons = new CONS();
			
			$dpath_Log = $cons->get_dPath_Log();
			
			$msg = "createTable_Words()";
			
			write_Log(
				$dpath_Log,
				$msg,
				__FILE__,
				__LINE__);
			
			/****************************************
			* Table => exists?
			****************************************/
			$target_TableName = DBS::$tname_Words;
// 			$target_TableName = DBS::$tname_Texts;
			
			$res = DBUtil::tableExists($target_TableName);
// 			$res = $this->tableExists($target_TableName);
// 			$res = $this->tableExists(DBS::$tname_Langs);
			
			$msg = "";
			
			if ($res == true) {
			
// 				$msg = "true";
				$msg = "Table exists => ".$target_TableName;
			
				write_Log(
					CONS::get_dPath_Log(),
					$msg,
					__FILE__,
					__LINE__);
				
				/****************************************
				* If $force not true,  then quit the function.
				* Otherwise, drop the current table
				****************************************/
				if (!$force) {
					
					$msg = "\$force => false. Quit the function";
					
					write_Log(
						CONS::get_dPath_Log(),
						$msg,
						__FILE__,
						__LINE__);
					
					return RetVals::$tableExists;
					
				} else {
					
					$res = DBUtil::dropTable($target_TableName);
					
				}
				
			} else {
			
				$msg = "Table doesn't exist => ".$target_TableName;
				
				write_Log(
					CONS::get_dPath_Log(),
					$msg,
					__FILE__,
					__LINE__);
				
			}

			/****************************************
			* Setup: PDO
			****************************************/
			$dbh = null;
			
			if ($is_Local == true) {
			
				$pdo_Param = "sqlite:".CONS::get_fPath_DB_Sqlite();
				
				$dbh = new PDO($pdo_Param);
			
			} else {
				
				$dbh = new PDO(DBUtil::$dsn, DBUtil::$user, DBUtil::$password);
// 				$dbh = new PDO($this->dsn, $this->user, $this->password);
			
			}
			
			$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			
			$msg = "\$dbh->setAttribute => done";
			
			write_Log(
				CONS::get_dPath_Log(),
				$msg,
				__FILE__,
				__LINE__);
			
			
			/****************************************
			* Sql
			****************************************/
			$sql = DBUtil::createTable_Words__GetSql($is_Local);
// 			$sql = DBUtil::createTable_Words__GetSql();
// 			$sql = $this->createTable_Words__GetSql();
// 			$sql = $this->getSql_CreateTable_Texts(DBS::$tname_Texts, $is_Local);
			
			$msg = "\$sql => ".$sql;
			
			write_Log(
				CONS::get_dPath_Log(),
				$msg,
				__FILE__,
				__LINE__);
			
			
			/****************************************
			* Exec: Sql
			****************************************/
			$res = $dbh->exec($sql);
				
			$msg = "\$res => ".strval($res);
			
			write_Log(
					CONS::get_dPath_Log(),
					$msg,
					__FILE__,
					__LINE__);
			
			/****************************************
			* Close
			****************************************/
			$dbh = null;
			
			/****************************************
			* Return
			****************************************/
			return RetVals::$sqlDone;
			
		}//public function createTable_Words($force)

		public static function
		createTable_Words__GetSql($is_Local) {
				
			$cols_Names = array(
					"id", "created_at", "updated_at",
						
					"w1", "w2", "w3",
						
					"text_ids",
					"text_id", "lang_id",
						
					"r_id",		// rails id
					"r_created_at", "r_updated_at",
						
			);
				
			// Column types
			if ($is_Local == true) {
				// Local => SQLite
				$cols_Types = array(
							
						"INTEGER PRIMARY KEY     AUTOINCREMENT	NOT NULL",
						"VARCHAR(30)", "VARCHAR(30)",
							
						"TEXT", "TEXT", "TEXT",
							
						"TEXT",
						"INT", "INT",
							
						"INT",
						"TEXT", "TEXT"
				
				);
				
			} else {
				// Remote = MySQL
				$cols_Types = array(
							
						"INT NOT NULL AUTO_INCREMENT PRIMARY KEY",
						"VARCHAR(30)", "VARCHAR(30)",
							
						"TEXT", "TEXT", "TEXT",
							
						"TEXT",
						"INT", "INT",
							
						"INT",
						"TEXT", "TEXT"
						
				);
				
			}//if ($is_Local == true)
			
			// Build: sql
			$sql_Param = "CREATE TABLE ".DBS::$tname_Words." (";
				
			$sql_array = array();
				
			for ($i = 0; $i < count($cols_Names); $i++) {
		
				array_push($sql_array, $cols_Names[$i]." ".$cols_Types[$i]);
		
				// 				$sql_Param .= $cols_Names[$i].", ".$cols_Types[$i];
				// 				$sql_Param += $cols_Names[$i].", ".$cols_Types[$i];
		
			}
				
			$sql_Param .= join(", ", $sql_array);
			// 			$sql_Param .= " ";
			// 			$sql_Param += " ";
				
			$sql_Param .= " )";
				
			return $sql_Param;
				
		
		}//createTable_Words__GetSql()
		
		
		public function
		getSql_CreateTable_Langs($tname, $is_Local) {
			
			$sql_Param = "";
			
			$cols_Names = array(
					// 0		1			2
					"id", "created_at", "updated_at",
					// 3	4	5
					"name",
					//9		10			11
					"r_id",		// rails id
					"r_created_at", "r_updated_at",
					
			);
			
			$cols_Types = null;
			
			if ($is_Local == true) {
			
				$cols_Types = array(
			
					"INTEGER PRIMARY KEY     AUTOINCREMENT	NOT NULL",
					"VARCHAR(30)", "VARCHAR(30)",
					
					// 3	4		5
					"TEXT",
					//9		10		11
					"INT", "TEXT", "TEXT"
					
				);
			
			} else {
			
				$cols_Types = array(
						// 0		1			2
						"INT NOT NULL AUTO_INCREMENT PRIMARY KEY",
	// 					"INTEGER PRIMARY KEY     AUTOINCREMENT	NOT NULL",
						"VARCHAR(30)", "VARCHAR(30)",
						
						// 3	4		5
						"TEXT",
						//9		10		11
						"INT", "TEXT", "TEXT"
						
				);
				
			}//if ($is_Local == true)
				
			// Build: sql
			$sql_Param = "CREATE TABLE ".$tname." (";
// 			$sql_Param = "CREATE TABLE ".DBS::$tname_Words." (";
			
			$sql_array = array();
			
			for ($i = 0; $i < count($cols_Names); $i++) {
				
				array_push($sql_array, $cols_Names[$i]." ".$cols_Types[$i]);
				
// 				$sql_Param .= $cols_Names[$i].", ".$cols_Types[$i];
// 				$sql_Param += $cols_Names[$i].", ".$cols_Types[$i];
				
			}
			
			$sql_Param .= join(", ", $sql_array);
// 			$sql_Param .= " ";
// 			$sql_Param += " ";
			
			$sql_Param .= " )";
				
			return $sql_Param;
			
						
		}//getSql_CreateTable_Langs($tname, $is_Local)
		
		public function
		getSql_CreateTable_Texts($tname, $is_Local) {
			
			$sql_Param = "";
			
			$cols_Names = array(
					// 0		1			2
					"id", "created_at", "updated_at",
					
					// 3	4	5
					"text", "title", "url",
					
					// 6		7
					"word_ids", "memo",
					
					// 8			9			10
					"genre_id", "subgenre_id", "lang_id",
					
					// 11
					"r_id",		// rails id
					// 12				13
					"r_created_at", "r_updated_at",
					
			);
			
			$cols_Types = null;
			
			if ($is_Local == true) {
			
				$cols_Types = array(
			
					"INTEGER PRIMARY KEY     AUTOINCREMENT	NOT NULL",
					"VARCHAR(30)", "VARCHAR(30)",
					
					// 3	4		5
					"TEXT", "TEXT", "TEXT",
					// 6		7
					"TEXT", "TEXT",
					// 8	9		10
					"INT", "INT", "INT",
					// 11
					"INT",
					// 12		13
					"TEXT", "TEXT"
					
				);
			
			} else {
			
				$cols_Types = array(
					// 0		1			2
					"INT NOT NULL AUTO_INCREMENT PRIMARY KEY",
// 					"INTEGER PRIMARY KEY     AUTOINCREMENT	NOT NULL",
					"VARCHAR(30)", "VARCHAR(30)",
					
					// 3	4		5
					"TEXT", "TEXT", "TEXT",
					// 6		7
					"TEXT", "TEXT",
					// 8	9		10
					"INT", "INT", "INT",
					// 11
					"INT",
					// 12		13
					"TEXT", "TEXT"
						
				);
				
			}//if ($is_Local == true)
				
			// Build: sql
			$sql_Param = "CREATE TABLE ".$tname." (";
// 			$sql_Param = "CREATE TABLE ".DBS::$tname_Words." (";
			
			$sql_array = array();
			
			for ($i = 0; $i < count($cols_Names); $i++) {
				
				array_push($sql_array, $cols_Names[$i]." ".$cols_Types[$i]);
				
// 				$sql_Param .= $cols_Names[$i].", ".$cols_Types[$i];
// 				$sql_Param += $cols_Names[$i].", ".$cols_Types[$i];
				
			}
			
			$sql_Param .= join(", ", $sql_array);
// 			$sql_Param .= " ";
// 			$sql_Param += " ";
			
			$sql_Param .= " )";
				
			return $sql_Param;
			
						
		}//getSql_CreateTable_Texts($tname, $is_Local)

		public function
		tableExists_remote($tname) {
			
			/****************************************
			* Host => Local?
			****************************************/
			$host_Name = Utils::get_HostName();
			
			$dbh = null;
				
			if ($host_Name == CONS::$local_HostName) {
			
				$msg = "localhost";
				
				write_Log(
					CONS::get_dPath_Log(),
					$msg,
					__FILE__,
					__LINE__);
				
				return;
				
			}
					
			
			/****************************************
			* Setup: Paths
			****************************************/
			$cons = new CONS();
			
			$dpath_Log = $cons->get_dPath_Log();
							
			$msg = "tableExists_remote()";
				
			write_Log(
					$dpath_Log,
					$msg,
					__FILE__, __LINE__);
				
			/****************************************
			* Setup: PDO
			****************************************/
			$dbh = new PDO(DBUtil::$dsn, DBUtil::$user, DBUtil::$password);
// 			$dbh = new PDO($this->dsn, $this->user, $this->password);
				
			$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
				
			
			// 			$sql = ".tables";
// 			$sql = "SELECT TABLE_NAME "
// 					."FROM information_schema.TABLES "
// 					."WHERE TABLE_TYPE='BASE TABLE'";
			$sql = "SHOW TABLES";
// 			$sql = "SELECT name FROM sqlite_master"
// 					." WHERE type='table'";
// 			// 					." WHERE type='table' AND name='table_name'";

// 			mysql> show tables;
// 			+----------------+
// 			| Tables_in_test |
// 			+----------------+
// 			| abc            |
// 			| def            |
// 			+----------------+
// 			2 rows in set (0.00 sec)
			
// 			mysql>
			
			
// 			$results = $dbh->query($sql);
			$sth = $dbh->prepare($sql);
			
			$sth->execute();
			
			$results = $sth->fetchAll(PDO::FETCH_ASSOC);
			
// 			debug(array_values($results));
			
// 			debug($results);
		// 			array(
		// 					(int) 0 => array(
		// 							'Tables_in_LAA0278957-cr6cake' => 'test'
		// 					),
		// 					(int) 1 => array(
		// 							'Tables_in_LAA0278957-cr6cake' => 'texts'
		// 					),
		// 					(int) 2 => array(
		// 							'Tables_in_LAA0278957-cr6cake' => 'words'
		// 					)
		// 			)
			debug(array_keys($results));
		// 			array(
		// 					(int) 0 => (int) 0,
		// 					(int) 1 => (int) 1,
		// 					(int) 2 => (int) 2
		// 			)
// 			$results = $sth->fetch(PDO::FETCH_ASSOC);

// // 			debug($results);
// 			debug(array_keys($results));
			
// 			$msg = "\$results => ".count($results)
// 					."/keys => ".implode(",", array_keys($results));
			
// 			write_Log(
// 				$dpath_Log,
// 				$msg,
// 				__FILE__,
// 				__LINE__);
			
// 			$msg = "\$results[array_keys(\$results)[0]] => "
// 					.$results[implode(",", array_keys($results))];
// // 					.$results[array_keys($results)[0]]; //=> Parse error: syntax error, unexpected '[', expecting ']'
			
// 			write_Log(
// 				$dpath_Log,
// 				$msg,
// 				__FILE__,
// 				__LINE__);
			
			
			
			$tnames = array();
				
			foreach ($results as $row) {
				
				
			
// 			while ($row = $results->fetchArray()) {
		
				$msg = "\$row => ".count($row);
// 				$msg = "\$row => ".count($row)
// 				."/"
// 						.implode(", ", $row);
		
				write_Log(
				$cons->get_dPath_Log(),
				$msg,
				__FILE__,
				__LINE__);
		
		
				// 				var_dump($row);
				array_push($tnames, $row);
			}
				
			$msg = "\$tnames => ".strval(count($tnames));
				
			write_Log(
			$cons->get_dPath_Log(),
			$msg,
			__FILE__,
			__LINE__);
				
			/****************************************
			 * Table: exists?
			****************************************/
			foreach ($tnames as $item) {
		
				if ($item[0] == $tname) {
						
					return true;
				}
					
			}
				
			return false;
			// 			return count($tnames);
				
		}//tableExists_remote($fpath_DB, $tname)
		
		public static function
		tableExists($tname) {
			
			$msg = "Starts => tableExists()";
				
			write_Log(
					CONS::get_dPath_Log(),
					$msg,
					__FILE__, __LINE__);
			
			/****************************************
			* Host => Local?
			****************************************/
			$host_Name = Utils::get_HostName();

			$is_Local = false;
			
			if ($host_Name == CONS::$local_HostName) {
			
				$msg = "localhost";
				
				write_Log(
					CONS::get_dPath_Log(),
					$msg,
					__FILE__,
					__LINE__);
				
				$is_Local = true;
// 				return;
				
			}

			/****************************************
			* Get: tables list
			****************************************/
			$table_List = DBUtil::get_TableList();

			/****************************************
			* Table => exists?
			****************************************/
			return in_array($tname, $table_List);
				
		}//tableExists_remote($fpath_DB, $tname)
		
		public function
		tableExists_Deprecated($tname) {
			
			/****************************************
			* Host => Local?
			****************************************/
			$host_Name = Utils::get_HostName();
			
			$dbh = null;
				
			if ($host_Name == CONS::$local_HostName) {
			
				$msg = "localhost";
				
				write_Log(
					CONS::get_dPath_Log(),
					$msg,
					__FILE__,
					__LINE__);
				
				return;
				
			}
					
			
			/****************************************
			* Setup: Paths
			****************************************/
			$cons = new CONS();
			
			$dpath_Log = $cons->get_dPath_Log();
							
			$msg = "tableExists_remote()";
				
			write_Log(
					$dpath_Log,
					$msg,
					__FILE__, __LINE__);
				
			/****************************************
			* Setup: PDO
			****************************************/
// 			$dbh = new PDO($this->dsn, $this->user, $this->password);
			$dbh = new PDO(DBUtil::$dsn, DBUtil::$user, DBUtil::$password);
				
			$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
				
			
			// 			$sql = ".tables";
// 			$sql = "SELECT TABLE_NAME "
// 					."FROM information_schema.TABLES "
// 					."WHERE TABLE_TYPE='BASE TABLE'";
			$sql = "SHOW TABLES";
// 			$sql = "SELECT name FROM sqlite_master"
// 					." WHERE type='table'";
// 			// 					." WHERE type='table' AND name='table_name'";

// 			mysql> show tables;
// 			+----------------+
// 			| Tables_in_test |
// 			+----------------+
// 			| abc            |
// 			| def            |
// 			+----------------+
// 			2 rows in set (0.00 sec)
			
// 			mysql>
			
			
// 			$results = $dbh->query($sql);
			$sth = $dbh->prepare($sql);
			
			$sth->execute();
			
			$results = $sth->fetchAll(PDO::FETCH_ASSOC);
			
// 			debug(array_values($results));
			
// 			debug($results);
		// 			array(
		// 					(int) 0 => array(
		// 							'Tables_in_LAA0278957-cr6cake' => 'test'
		// 					),
		// 					(int) 1 => array(
		// 							'Tables_in_LAA0278957-cr6cake' => 'texts'
		// 					),
		// 					(int) 2 => array(
		// 							'Tables_in_LAA0278957-cr6cake' => 'words'
		// 					)
		// 			)
			debug(array_keys($results));
		// 			array(
		// 					(int) 0 => (int) 0,
		// 					(int) 1 => (int) 1,
		// 					(int) 2 => (int) 2
		// 			)
// 			$results = $sth->fetch(PDO::FETCH_ASSOC);

// // 			debug($results);
// 			debug(array_keys($results));
			
// 			$msg = "\$results => ".count($results)
// 					."/keys => ".implode(",", array_keys($results));
			
// 			write_Log(
// 				$dpath_Log,
// 				$msg,
// 				__FILE__,
// 				__LINE__);
			
// 			$msg = "\$results[array_keys(\$results)[0]] => "
// 					.$results[implode(",", array_keys($results))];
// // 					.$results[array_keys($results)[0]]; //=> Parse error: syntax error, unexpected '[', expecting ']'
			
// 			write_Log(
// 				$dpath_Log,
// 				$msg,
// 				__FILE__,
// 				__LINE__);
			
			
			
			$tnames = array();
				
			foreach ($results as $row) {
				
				
			
// 			while ($row = $results->fetchArray()) {
		
				$msg = "\$row => ".count($row);
// 				$msg = "\$row => ".count($row)
// 				."/"
// 						.implode(", ", $row);
		
				write_Log(
				$cons->get_dPath_Log(),
				$msg,
				__FILE__,
				__LINE__);
		
		
				// 				var_dump($row);
				array_push($tnames, $row);
			}
				
			$msg = "\$tnames => ".strval(count($tnames));
				
			write_Log(
			$cons->get_dPath_Log(),
			$msg,
			__FILE__,
			__LINE__);
				
			/****************************************
			 * Table: exists?
			****************************************/
			foreach ($tnames as $item) {
		
				if ($item[0] == $tname) {
						
					return true;
				}
					
			}
				
			return false;
			// 			return count($tnames);
				
		}//tableExists_remote($fpath_DB, $tname)
		
		public static function
		get_TableList() {

			/****************************************
			* Setup: Paths
			****************************************/
			$cons = new CONS();
			
			$dpath_Log = $cons->get_dPath_Log();
							
			/****************************************
			* Setup: PDO
			****************************************/
			$host_Name = Utils::get_HostName();

			$dbh = null;
			
			$host_IsLocal = false;
			
			if ($host_Name == CONS::$local_HostName) {
			
				$host_IsLocal = true;
				
				$fpath_LocalDB = CONS::get_fPath_DB_Sqlite();
				
				$pdo_Param = "sqlite:".$fpath_LocalDB;
				
				$dbh = new PDO($pdo_Param);
// 				$dbh = new PDO($fpath_LocalDB);
			
			} else {
			
				$dbh = new PDO(DBUtil::$dsn, DBUtil::$user, DBUtil::$password);
// 				$dbh = new PDO(DBUtil::dsn, DBUtil::user, DBUtil::password);
// 				$dbh = new PDO($this->dsn, $this->user, $this->password);
				
			}
				
			$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

			/****************************************
			* Get: table list
			****************************************/
			$tnames = array();
						
			if ($host_IsLocal == true) {	// Local host
			
				/****************************************
				* DB operations
				****************************************/
				$sql = "SELECT name FROM sqlite_master"
					." WHERE type='table'";
				
				$sth = $dbh->prepare($sql);
					
				$sth->execute();
					
				$results = $sth->fetchAll(PDO::FETCH_ASSOC);

				/****************************************
				* Build: Table name list
				****************************************/
				foreach ($results as $res) {
					
					array_push($tnames, $res['name']);
				
				}
				
				$msg = "\$tnames => ".implode(",", $tnames);
				
				write_Log(
					CONS::get_dPath_Log(),
					$msg,
					__FILE__,
					__LINE__);
			
			} else {	// Remote host
				
				$sql = "SHOW TABLES";
				
				$sth = $dbh->prepare($sql);
					
				$sth->execute();
					
				$results = $sth->fetchAll(PDO::FETCH_ASSOC);
				
				// 				array(
				// 						(int) 0 => array(
				// 								'Tables_in_LAA0278957-cr6cake' => 'test'
				// 						),
				// 						(int) 1 => array(
				// 								'Tables_in_LAA0278957-cr6cake' => 'texts'
				// 						),
				// 						(int) 2 => array(
				// 								'Tables_in_LAA0278957-cr6cake' => 'words'
				// 						)
				// 				)
				
				$tableNames_array = array_values($results);
				
				foreach ($tableNames_array as $tnameArray) {
					
					array_push(
							$tnames,
							$tnameArray[DBUtil::$colName_Table_Remote]);
				
				}
				
				$msg = "\$tnames => ".implode(",", $tnames);
				
				write_Log(
					CONS::get_dPath_Log(),
					$msg,
					__FILE__,
					__LINE__);
				
			
			}//if ($host_IsLocal == true)
			
			
			/****************************************
			* Close: PDO
			****************************************/
			$dbh = null;
			
			return $tnames;
			
		}//get_TableList()

		/****************************************
		* @return 1. Table doesn't exist => RetVals::$tableDoesntExists
		****************************************/
		public static function dropTable($tname) {
			
			/****************************************
			 * Table => exists?
			****************************************/
			$target_TableName = $tname;
			// 			$target_TableName = DBS::$tname_Words;
				
			$res = DBUtil::tableExists($target_TableName);
// 			$res = $this->tableExists($target_TableName);
			// 			$res = $this->tableExists(DBS::$tname_Langs);
				
			$msg = "";
				
			if ($res == true) {
					
				// 				$msg = "true";
				$msg = "Table exists => ".$target_TableName;
					
				write_Log(
				CONS::get_dPath_Log(),
				$msg,
				__FILE__,
				__LINE__);
			
			
			} else {
					
				$msg = "Table doesn't exist => ".$target_TableName;
			
				write_Log(
				CONS::get_dPath_Log(),
				$msg,
				__FILE__,
				__LINE__);
			
				return RetVals::$tableDoesntExists;
				
			}
				
			/****************************************
			 * Host name
			****************************************/
			$is_Local = false;
				
			if (CONS::get_HostName() == CONS::$local_HostName) {
			
				$is_Local = true;
			
			}
				
			/****************************************
			 * Setup
			****************************************/
			$dbh = null;
				
			if ($is_Local == true) {
					
				$pdo_Param = "sqlite:".CONS::get_fPath_DB_Sqlite();
			
				$dbh = new PDO($pdo_Param);
					
			} else {
			
				$dbh = new PDO(DBUtil::$dsn, DBUtil::$user, DBUtil::$password);
// 				$dbh = new PDO($this->dsn, $this->user, $this->password);
					
			}
				
			$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
				
			$msg = "\$dbh->setAttribute => done";
				
			write_Log(
					CONS::get_dPath_Log(),
					$msg,
					__FILE__,
					__LINE__);
			
			/****************************************
			 * Sql
			****************************************/
			$sql = "DROP TABLE $tname";
			
			$msg = "\$sql => ".$sql;
				
			write_Log(
					CONS::get_dPath_Log(),
					$msg,
					__FILE__,
					__LINE__);
				
			/****************************************
			 * Exec: Sql
			****************************************/
			$res = $dbh->exec($sql);
			
			$msg = "\$res => ".strval($res);
				
			write_Log(
					CONS::get_dPath_Log(),
					$msg,
					__FILE__,
					__LINE__);
				
			/****************************************
			 * Close
			****************************************/
			$dbh = null;
				
		}//public function dropTable($tname)
		
	}//class DBUtil