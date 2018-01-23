<?php 
	require_once '../config/config.php';
	require_once 'class.database.php';

	class ajaxFunction {
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


		public function getUserViaId($userId){
			try {
				$stmt = $this->conn->prepare("SELECT * FROM dh_users as uM 
					INNER JOIN dh_user_details as uMD 
					ON uM.dh_user_details_id = uMD.dh_user_details_id 
					INNER JOIN dh_user_groups as uG ON 
					uM.dh_user_group_id = uG.dh_user_group_id
					INNER JOIN dh_divisions as uDiv ON
					uMD.dh_division_id = uDiv.dh_division_id
					WHERE is_deleted = 0 AND dh_status = 'Active' AND uM.dh_user_id = ?");
				$stmt->execute(array($userId));
				$result = $stmt->fetch(PDO::FETCH_ASSOC);
				return json_encode($result);
			} catch (PDOException $e) {
				echo $e->getMessage();
				throw $e;
			}
		}

		public function getClosingSalesViaUserId($userId) {
			try {
				$stmt = $this->conn->prepare("SELECT * FROM dh_closing WHERE dh_prepared_user_id = ?");
				$stmt->execute(array($userId));
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				return json_encode($result);
			} catch (PDOException $e) {
				echo $e->getMessage();
				throw $e;
			}
		}

	}
?>