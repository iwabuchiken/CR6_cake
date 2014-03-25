<?php
	class DBUtil {
		
		/****************************************
		 * PDO
		****************************************/
		//REF http://www.phpbook.jp/tutorial/pdo/index3.html
		var $dsn = 'mysql:dbname=LAA0278957-cr6cake; host=mysql012.phy.lolipop.lan';
		var $dsn_Local = 'sqlite:';
		var $user = 'LAA0278957';
		var $password = '47yhl44j6u';
		
		/****************************************
		* DB data
		****************************************/
		public static $colName_Table_Remote = "Tables_in_LAA0278957-cr6cake";
		
		/****************************************
		* @return
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
			$res = $this->tableExists_remote(DBS::$tname_Langs);
			
// 			if ($res == true) {
				
// 				$msg = "table => Exists: ".DBS::$tname_Langs;
				
// 				write_Log(
// 					$this->path_Log,
// 					$msg,
// 					__FILE__,
// 					__LINE__);
				
// 				return;
				
// 			}
			
// 			/****************************************
// 			* Setup
// 			****************************************/
// 			$dbh = new PDO($this->dsn, $this->user, $this->password);
			
// 			$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			
// 			/****************************************
// 			* Sql
// 			****************************************/
// 			$sql = $this->getSql_CreateTable_Langs(DBS::$tname_Langs);
			
// 			$msg = "\$sql => ".$sql;
			
// 			write_Log(
// 				$dpath_Log,
// 				$msg,
// 				__FILE__,
// 				__LINE__);
			
			
// 			$res = $dbh->exec($sql);
				
// 			$msg = "\$res => ".$res;
			
// 			/****************************************
// 			* Close
// 			****************************************/
// 			$dbh = null;
			
		}//public function createTable_Langs()

		public function getSql_CreateTable_Langs($tname) {
			
			$cols_Names = array(
					// 0		1			2
					"id", "created_at", "updated_at",
					// 3	4	5
					"name",
					//9		10			11
					"r_id",		// rails id
					"r_created_at", "r_updated_at",
					
			);
			
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
			
						
		}//public function getSql_CreateTable_Words()

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
			$dbh = new PDO($this->dsn, $this->user, $this->password);
				
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
		
		public function
		tableExists($tname) {
			
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
			$dbh = new PDO($this->dsn, $this->user, $this->password);
				
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
		
		public function
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
			
				$dbh = new PDO($this->dsn, $this->user, $this->password);
				
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
		
	}//class DBUtil