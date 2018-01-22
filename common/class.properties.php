<?php 
	require_once '../config/config.php';
	require_once 'class.database.php';

	class Property {
		private $db;
		private $dbName;
		private $default;

		public function __construct(){
			global $DB, $default_password;
			$database = new Database();
			$db = $database->dbConnection($DB);
			$dbName = $DB['db_name'];
			$this->dbName = $dbName;
			$this->conn = $db;
			$this->def_pass = $default_password;
		}


		public function getAllSubdivision() {
			try {
				$stmt = $this->conn->prepare("SELECT * FROM dh_subdivisions as subd INNER JOIN dh_developers as dev ON dh_subd_dev_id = dh_developers_id");
				$stmt->execute();
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}

		public function getAllDevelopers() {
			try {
				$stmt = $this->conn->prepare("SELECT * FROM dh_developers");
				$stmt->execute();
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			} catch (PDOException $e){
				echo $e->getMessage();
			}
		}
	}