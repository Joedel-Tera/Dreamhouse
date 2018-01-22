<?php

class Database {

	private $dbconn;

	function __construct(){
		global $DB;
		$this->dbconn = $this->dbConnection($DB);
	}
	/**
	 * create connection to mysql
	 * @param list $DB
	 * @return PDO
	 */
	function dbConnection($DB){
		$servername = $DB['db_server'];
		$db = $DB['db_name'];
		try {
			$conn = new PDO("mysql:host=$servername;dbname=$db",$DB['db_username'], $DB['db_password']);
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			$conn->setAttribute(PDO::ATTR_AUTOCOMMIT, FALSE);
			$conn->exec("SET NAMES utf8");
		}
		catch(Exception $e){
			echo "Connection failed: " . $e->getMessage();
		}
		return $conn;
	}


	/**
	 * Begin a transaction, turning off autocommit
	 */
	function beginTransaction(){
		try {
			$this->dbconn->beginTransaction();
		}catch(Exception $e){
			echo $e->getMessage();
			throw $e;
		}
	}

	/**
	 * Commit changes
	 */
	function commit(){
		try {
			$this->dbconn->commit();
		}catch(Exception $e){
			echo $e->getMessage();
			throw $e;
		}
	}
}