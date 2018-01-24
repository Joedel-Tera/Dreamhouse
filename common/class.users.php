<?php 
	require_once '../config/config.php';
	require_once 'class.database.php';

	class User {
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


		/*
		 * Redirect to another Page
		 * @params string $url - Url to another page
		 */
		public function redirect($url){
			header("Location: $url");
		}

		/*
		 * Function redirect to Index.php if PageUserGroup is not Equal
		 * @param $userGroupId = $user_type
		 * @param $pageUserGroup = ['1,2,3,4,5']; User Levels Per Page
		 */
		public function isPageAccessible($userGroupId, $pageUserGroup) {
			if($userGroupId != $pageUserGroup){
				$this->redirect('index.php');
			}
		}

		public function updateLoginCounter($userId, $count){
			try {
				$this->conn->beginTransaction();
				$stmt = $this->conn->prepare("UPDATE dh_users SET login_counter = ? WHERE dh_user_id = ?");
				$stmt->execute(array($count,$userId));
				$this->conn->commit();
			} catch (PDOException $e){
				echo $e->getMessage();
				throw $e;
			}
		}

		/*
		 * Get the next UserID
		 */ 
		public function getNextUserId(){
			try{
				$stmt = $this->conn->prepare("SELECT AUTO_INCREMENT FROM information_schema.tables WHERE table_name = 'dh_users'");
				$stmt->execute();
				$result = $stmt->fetch(PDO::FETCH_ASSOC);
				return $result;
			} catch (PDOException $e){
				echo $e->getMessage();
				throw $e;
			}
		}

		/*
		 * Get the next houseId
		 */ 
		public function getNextHouseId(){
			try{
				$stmt = $this->conn->prepare("SELECT AUTO_INCREMENT FROM information_schema.tables WHERE table_name = 'dh_house_project'");
				$stmt->execute();
				$result = $stmt->fetch(PDO::FETCH_ASSOC);
				return $result;
			} catch (PDOException $e){
				echo $e->getMessage();
				throw $e;
			}
		}

		/*
		 * Get The Next News Id
		 */
		public function getNextNewsId(){
			try {
				$stmt = $this->conn->prepare("SELECT AUTO_INCREMENT FROM information_schema.tables WHERE table_name = 'dh_news'");
				$stmt->execute();
				$result = $stmt->fetch(PDO::FETCH_ASSOC);
				return $result;
			} catch (PDOException $e) {
				echo $e->getMessage();
				throw $e;
			}
		}

		public function getDevelopers(){
			try{
				$stmt = $this->conn->prepare("SELECT * FROM dh_developers");
				$stmt->execute();
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			} catch (PDOException $e){
				echo $e->getMessage();
				throw $e;
			}
		}

		public function getAllDivision(){
			try{
				$stmt = $this->conn->prepare("SELECT * FROM dh_divisions WHERE dh_division_status =0");
				$stmt->execute();
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			} catch (PDOException $e){
				echo $e->getMessage();
				throw $e;
			}
		}

		public function getDownlinesPerDivision($divId, $userId){
			try {
				$stmt = $this->conn->prepare("SELECT * FROM dh_users as uM 
						INNER JOIN dh_user_details as uMD 
						ON uM.dh_user_details_id = uMD.dh_user_details_id 
						INNER JOIN dh_user_groups as uG ON 
						uM.dh_user_group_id = uG.dh_user_group_id
						INNER JOIN dh_divisions as uDiv ON
						uMD.dh_division_id = uDiv.dh_division_id
						WHERE is_deleted = 0 AND dh_status = 'Active'
						AND uMD.dh_division_id = ? AND dh_user_id != ?");
				$stmt->execute(array($divId,$userId));
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			} catch (PDOException $e) {
				echo $e->getMessage();
				throw $e;
			}		
		}

		public function getSaleDirectorPerDivision($divId){
			try {
				$stmt = $this->conn->prepare("SELECT * FROM dh_users as uM 
						INNER JOIN dh_user_details as uMD 
						ON uM.dh_user_details_id = uMD.dh_user_details_id 
						INNER JOIN dh_user_groups as uG ON 
						uM.dh_user_group_id = uG.dh_user_group_id
						INNER JOIN dh_divisions as uDiv ON
						uMD.dh_division_id = uDiv.dh_division_id
						WHERE is_deleted = 0 AND dh_status = 'Active'
						AND uMD.dh_division_id = ? AND uM.dh_user_group_id = 3");
				$stmt->execute(array($divId));
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			} catch (PDOException $e) {
				echo $e->getMessage();
				throw $e;
			}			
		}

		public function getDownlinesSalesDirector($userId){
			try {
				$stmt = $this->conn->prepare("SELECT * FROM dh_users as uM 
						INNER JOIN dh_user_details as uMD 
						ON uM.dh_user_details_id = uMD.dh_user_details_id 
						INNER JOIN dh_user_groups as uG ON 
						uM.dh_user_group_id = uG.dh_user_group_id
						INNER JOIN dh_divisions as uDiv ON
						uMD.dh_division_id = uDiv.dh_division_id
						WHERE is_deleted = 0 AND dh_status = 'Active'
						AND uMD.dh_recruited_by = ? AND uM.dh_user_group_id != 3 AND uM.dh_user_group_id != 2");
				$stmt->execute(array($userId));
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			} catch (PDOException $e) {
				echo $e->getMessage();
				throw $e;
			}			
		}

		public function getMyClosingSales($userId){
			try {
				$stmt = $this->conn->prepare("SELECT * FROM dh_closing WHERE dh_prepared_user_id = ? ORDER BY dh_closing_id DESC");
				$stmt->execute(array($userId));
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			} catch (PDOException $e) {
				echo $e->getMessage();
				throw $e;
			}
		}

		public function getMySeminarRequest($userId){
			try {
				$stmt = $this->conn->prepare("SELECT * FROM dh_seminar_calendar WHERE dh_user_id = ? ORDER BY dh_seminar_id DESC");
				$stmt->execute(array($userId));
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			} catch (PDOException $e) {
				echo $e->getMessage();
				throw $e;
			}			
		}

		public function getMyVehicleTripRequest($userId){
			try {
				$stmt = $this->conn->prepare("SELECT * FROM dh_vehicletrip_calendar WHERE dh_user_id = ? ORDER BY dh_vehicle_trip_id DESC");
				$stmt->execute(array($userId));
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			} catch (PDOException $e) {
				echo $e->getMessage();
				throw $e;
			}			
		}

		/*
		 * Get All Registered Users
		 * @param Status (For Activation , Active , Null)
		 */
		public function getAllUser($status = null){
			try {
				$stmt = $this->conn->prepare("SELECT * FROM dh_users as uM INNER JOIN dh_user_details as uMD ON uM.dh_user_details_id = uMD.dh_user_details_id INNER JOIN dh_user_groups as uG ON uM.dh_user_group_id = uG.dh_user_group_id WHERE is_deleted = 0 AND dh_status = ?");
				$stmt->execute(array($status));
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			} catch (PDOException $e) {
				echo $e->getMessage();
				throw $e;
			}
		}

		/*
		 * Get All Active Sales Agent For Activation
		 * @param userId
		 */
		public function getAllSalesUser($status, $userGroupId){
			try {
				$stmt = $this->conn->prepare("SELECT * FROM dh_users as uM INNER JOIN dh_user_details as uMD ON uM.dh_user_details_id = uMD.dh_user_details_id INNER JOIN dh_user_groups as uG ON uM.dh_user_group_id = uG.dh_user_group_id WHERE is_deleted = 0 AND dh_status = ? AND uM.dh_user_group_id = ?");
				$stmt->execute(array($status, $userGroupId));
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			} catch (PDOException $e) {
				echo $e->getMessage();
				throw $e;
			}
		}


		/*
		 * Get All Active Users Except Employee and Admin
		 * 
		 */
		public function getActiveUsersExceptEmpAdmin(){
			try {
				$stmt = $this->conn->prepare("SELECT * FROM dh_users as uM INNER JOIN dh_user_details as uMD ON uM.dh_user_details_id = uMD.dh_user_details_id WHERE is_deleted = 0 AND dh_status = 'Active' AND (dh_user_group_id != 5 || dh_user_group_id != 1)");
				$stmt->execute();
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			} catch (PDOException $e) {
				echo $e->getMessage();
				throw $e;
			}
		}

		/*
		 * Get All Active Sales Director
		 *
		 */
		public function getAllActiveSalesDirector(){
			try {
				$stmt = $this->conn->prepare("SELECT * FROM dh_users as uM INNER JOIN dh_user_details as uMD ON uM.dh_user_details_id = uMD.dh_user_details_id WHERE is_deleted = 0 AND dh_status = 'Active' AND dh_user_group_id = 3 ");
				$stmt->execute();
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			} catch (PDOException $e) {
				echo $e->getMessage();
				throw $e;
			}			
		}

		/*
		 * Get All Active Sales Director and Division Manager
		 *
		 */
		public function getAllSalesAndDiv(){
			try {
				$stmt = $this->conn->prepare("SELECT * FROM dh_users as uM INNER JOIN dh_user_details as uMD ON uM.dh_user_details_id = uMD.dh_user_details_id WHERE is_deleted = 0 AND dh_status = 'Active' AND dh_user_group_id = 3 OR dh_user_group_id = 2 ORDER BY uM.dh_user_id DESC");
				$stmt->execute();
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			} catch (PDOException $e) {
				echo $e->getMessage();
				throw $e;
			}			
		}

		/*
		 * Get All Active Division Manager
		 *
		 */
		public function getAllActiveDivisionManager(){
			try {
				$stmt = $this->conn->prepare("SELECT * FROM dh_users as uM INNER JOIN dh_user_details as uMD ON uM.dh_user_details_id = uMD.dh_user_details_id WHERE is_deleted = 0 AND dh_status = 'Active' AND dh_user_group_id = 2 ");
				$stmt->execute();
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				return $result;
			} catch (PDOException $e) {
				echo $e->getMessage();
				throw $e;
			}			
		}

		/*
		 * Logout Function
		 */
		public function doLogout(){
			unset($_SESSION['user_session']);
			unset($_SESSION['user_type']);
			unset($_SESSION['message']);
			return true;
		}

		/*
		 * Executes Login
		 * @param string $uname - Username
		 * @param string $pass - Password
		 */
		public function login($uname,$pass){
			try {
				$stmt = $this->conn->prepare("SELECT * FROM dh_users as uM INNER JOIN dh_user_details as uMD ON uM.dh_user_details_id = uMD.dh_user_details_id WHERE dh_user_name = ? AND is_deleted = 0 AND dh_status = 'Active' LIMIT 1");
				$stmt->execute(array($uname));

				$userRow = $stmt->fetch(PDO::FETCH_ASSOC);
				if($stmt->rowCount() > 0){
					if($userRow['login_counter'] < 3 && $userRow['dh_user_pass'] == base64_encode($pass)){
						$_SESSION['user_session'] = $userRow['dh_user_id'];
						$_SESSION['user_fullName'] = $userRow['dh_firstName'].' '.$userRow['dh_lastName'];
						$_SESSION['user_type'] = $userRow['dh_user_group_id'];
						$_SESSION['user_division'] = $userRow['dh_division_id'];
						$_SESSION['MsgCode'] = 1;
						if($userRow['dh_user_group_id'] != '1'){
							$_SESSION['Message'] = 'Welcome! '.$userRow['dh_firstName'].' '.$userRow['dh_lastName'];
						} else {
							$_SESSION['Message'] = 'Welcome! Administrator';
						}
						$this->updateLoginCounter($userRow['dh_user_id'], 0);
						return true;
					} else {
						if($userRow['login_counter'] == '0'){
							$_SESSION["Message"] = "Incorrect Password Please Try Again... Number of tries remaining 3";
							$this->updateLoginCounter($userRow['dh_user_id'],1);
						} else if ($userRow['login_counter'] == '1') {
							$_SESSION["Message"] = "Incorrect Password Please Try Again... Number of tries remaining 2";
							$this->updateLoginCounter($userRow['dh_user_id'],2);
						} else if ($userRow['login_counter'] == '2') {
							$_SESSION["Message"] = "Incorrect Password Please Try Again... Number of tries remaining 1";
							$this->updateLoginCounter($userRow['dh_user_id'],3);
						} else {
							$_SESSION["Message"] = "Account has been locked. Please Contact administrator for more details.";
							$this->updateLoginCounter($userRow['dh_user_id'],4);
						}
						$_SESSION['MsgCode'] = 2;
						return false;
					}
				} else {
					if($userRow['login_counter'] > 3){
						$_SESSION["Message"] = "Account has been Locked. Please Contact an Administrator for more Details.";
					} else {
						$_SESSION["Message"] = "Username Doesn't Exist";
					}
					$_SESSION['MsgCode'] = 2;
					return false;
				}
			} catch (PDOException $e){
				echo $e->getMessage();
				throw $e;
			}
		}


		/*
		 * Register New User
		 * @param array $params - data to be inserted (register.php)
		 * 
		 */
		public function insertUserData($params){
			try {
				$this->conn->beginTransaction();

				$getNextUserId = $this->getNextUserId();

				$stmt = $this->conn->prepare("INSERT INTO dh_users
				(dh_user_group_id,dh_user_details_id,dh_user_name,dh_user_pass,dh_date_created,dh_status,dh_account_create) 
				VALUES (?,?,?,?,?,?,?)");
				if($params['password'] == ""){
					$password = base64_encode($this->default_password); // Default password if Leave Blank
				} else {
					$password = base64_encode($params['password']);
				}

					$dataUsers = array(
						$params['userType'],
						$getNextUserId['AUTO_INCREMENT'],
						$params['username'],
						$password,
						date("m-d-Y"),
						'For Activation',
						$params['accountCreate']
					);

				$stmt->execute($dataUsers);

				// User Details
				$detailsStmt = $this->conn->prepare("INSERT INTO dh_user_details (dh_user_details_id,dh_division_id, dh_firstName,dh_middleName,dh_lastName,dh_user_spousename,dh_user_nickname,dh_bday,dh_age,dh_gender,dh_tin_number,dh_email_address,dh_contact_no,dh_home_address,dh_occupation,dh_seminar_date,dh_seminar_venue,dh_recruited_by,dh_recruited_by_position,dh_recruited_by_division,dh_trainor_name,dh_sales_director,dh_division_manager,dh_realty_name,dh_realty_pos,dh_realty_from,dh_realty_to) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
					
					$dataUserDetails = array(
						$getNextUserId['AUTO_INCREMENT'],
						$params['divisionId'],
						$params['firstName'],
						$params['middleName'],
						$params['lastName'],
						$params['spouseName'],
						$params['nickName'],
						$params['DOB'],
						$params['Age'],
						$params['gender'],
						$params['tinNumber'],
						$params['emailAddress'],
						$params['contactNo'],
						$params['homeAddress'],
						$params['occupation'],
						$params['seminarDate'],
						$params['seminarVenue'],
						$params['recruitedBy'],
						$params['recruitedByPos'],
						$params['recruitedByDiv'],
						$params['trainorName'],
						$params['salesDirector'],
						$params['divManager'],
						$params['occ_name'],
						$params['occ_pos'],
						$params['occ_from'],
						$params['occ_to'],
						);

				$detailsStmt->execute($dataUserDetails);
				
				// User Education Details
				$educStmt = $this->conn->prepare("INSERT INTO dh_user_education (dh_user_id, dh_school_name, dh_school_location, dh_attainment, dh_year_from, dh_year_to) VALUES (?,?,?,?,?,?)");

				foreach($params['educSchool'] as $key=>$value){
					$dataUserEducation = array(
						$getNextUserId['AUTO_INCREMENT'],
						$params['educSchool'][$key],
						$params['educLocation'][$key],
						$params['educAttainment'][$key],
						$params['educYearFrom'][$key],
						$params['educYearTo'][$key]
					);

					$educStmt->execute($dataUserEducation);
				}


				$this->conn->commit();
				if($params['userType'] == 4){
					$_SESSION['Message'] = "Registered Successfully! Thank you for your time. we'll contact you once your account has been activated";
				} else {
					$_SESSION['Message'] = "Registered Successfully!";
				}

				return true;
			} catch (PDOException $e){
				echo $e->getMessage();
				throw $e;
			}
		}


		/*
		 * Add Closing
		 * @param array $params - Data to be Inserted (empEncode.php-closingForm)
		 *
		 */
		public function insertClosingData($params){
			try {
				$this->conn->beginTransaction();

				$stmt = $this->conn->prepare("INSERT INTO dh_closing (dh_familyName, dh_firstName, dh_phoneNo, dh_telNo, dh_subdivision, dh_location, dh_developer, dh_phase, dh_block, dh_lot, dh_houseModel, dh_floorArea, dh_lotArea, dh_reservationFee, dh_oiPR, dh_division, dh_divisionManager_id, dh_salesDirector_id, dh_closingDate, dh_created_date, dh_user_id, dh_prepared_user_id) 
				VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");


				$dataClosing = array(
					$params['familyName'],
					$params['firstName'],
					$params['phoneNo'],
					$params['telno'],
					$params['subdivision'],
					$params['location'],
					$params['developer'],
					$params['phase'],
					$params['block'],
					$params['lot'],
					$params['housemodel'],
					$params['floorarea'],
					$params['lotarea'],
					$params['reservationfee'],
					$params['oipr'],
					$params['division'],
					$params['divisionmanager'],
					$params['salesdirector'],
					$params['closingdate'],
					$params['dateCreated'],
					$params['user'],
					$params['preparedBy']
				);

				$stmt->execute($dataClosing);

				
				$this->conn->commit();
				$_SESSION['Message'] = "Closing Successfully Added! ";
				return true;
			} catch (PDOException $e){
				echo $e->getMessage();
				throw $e;
			}			
		}

		/*
		 * Update Status
		 * @param array - EmpId and Status to be change
		 */
		public function updateStatus($params){
			try{
				$this->conn->beginTransaction();
				$stmt = $this->conn->prepare("UPDATE dh_users set dh_status=? WHERE dh_user_id = ?");
				$updateData = array(
					$params['status'],
					$params['userId']
				);
				$stmt->execute($updateData);

				$this->conn->commit();
				$_SESSION['Message'] = "Status Changed!";
				return true;
			} catch (PDOException $e){
				echo $e->getMessage();
				throw $e;
			}
		}


		/*
		 * Insert House Project Data
		 * @params - Data to be inserted (empEncode.php-houseProject)
		 */
		public function insertHouseProject($params){
			try {
				$this->conn->beginTransaction();
				$stmt = $this->conn->prepare("INSERT INTO dh_house_project
				(dh_house_name,dh_description,dh_location,dh_promos,dh_date_created,dh_user_id) 
				VALUES (?,?,?,?,?,?)");

					$houseData = array(
						$params['houseName'],
						$params['description'],
						$params['location'],
						$params['promos'],
						date("m-d-Y"),
						$params['userId']
					);

				$stmt->execute($houseData);
				$this->conn->commit();
				$_SESSION['Message'] = "House Project Successfully Added! ";
				return true;
			} catch (PDOException $e){
				echo $e->getMessage();
				throw $e;
			}
		}

		/* 
		 * Insert News Data
		 * @params - Data to be inserted (empEncode.php - News / Article)
		 */
		public function insertNews($params){
			try {
				$this->conn->beginTransaction();
				$stmt = $this->conn->prepare("INSERT INTO dh_news
				(dh_title,dh_content,dh_date_created,dh_encoded_by) 
				VALUES (?,?,?,?)");

					$newsData = array(
						$params['title'],
						$params['content'],
						date("m-d-Y"),
						$params['userId']
					);

				$stmt->execute($newsData);
				$this->conn->commit();
				$_SESSION['Message'] = "News Article Successfully Added! ";
				return true;
			} catch (PDOException $e){
				echo $e->getMessage();
				throw $e;
			}			
		}

		/*
		 * Insert Media Images
		 * @params Images
		 */
		public function insertImages($params,$imagetype = null){
			try {
				$this->conn->beginTransaction();
				$stmt = $this->conn->prepare("INSERT INTO dh_images
				(dh_house_project_id,dh_news_id,isHouseSample,isFloorPlan,isAmenities,isNews,dh_image_path) 
				VALUES (?,?,?,?,?,?,?)");

				$houseId = $this->getNextHouseId();
				$newsId = $this->getNextNewsId();


				if($imagetype != null){
					$imageData = array(
						null,
						$newsId['AUTO_INCREMENT'],
						0,
						0,
						0,
						$params['isNews'],
						$params['imagePath']
					);
				} else {
					$imageData = array(
						$houseId['AUTO_INCREMENT'],
						null,
						$params['isHouseSample'],
						$params['isFloorPlan'],
						$params['isAmenities'],
						0,
						$params['imagePath'],
					);
				}
				

				$stmt->execute($imageData);
				$this->conn->commit();
				return true;
			} catch (PDOException $e){
				echo $e->getMessage();
			}
		}

		/*
		 * Insert Request Seminar Data
		 * @params - Data to be inserted (divRequestSched.php - Seminar)
		 */
		public function insertRequestSeminar($params){
			try {
				$this->conn->beginTransaction();
				$stmt = $this->conn->prepare("INSERT INTO dh_seminar_calendar
				(dh_seminar_name, dh_seminar_date, dh_seminar_time_start, dh_seminar_time_end, dh_seminar_location, dh_date_created, dh_user_id) 
				VALUES (?,?,?,?,?,?,?)");

				$seminarData = array(
					$params['seminarName'],
					$params['seminarDate'],
					$params['timeStart'],
					$params['timeEnd'],
					$params['seminarLocation'],
					date("m-d-Y"),
					$params['userId']
				);

				$stmt->execute($seminarData);
				$this->conn->commit();
				$_SESSION['Message'] = "Request Successfully Submitted for Approval! ";
				return true;
			} catch (PDOException $e){
				echo $e->getMessage();
			}
		}

		/*
		 * Insert Request Scheduled Trip Data
		 * @params - Data to be inserted (divRequestSched.php - Vehicle Trip)
		 */
		public function insertRequestVehicleTrip($params){
			try {
				$this->conn->beginTransaction();
				$stmt = $this->conn->prepare("INSERT INTO dh_vehicletrip_calendar
				(dh_trip_date, dh_location_pickup, dh_location_pickup_time, dh_location_destination, dh_location_destination_time, dh_driver_name, dh_plateno, dh_driver_contact,dh_user_id, dh_date_created) 
				VALUES (?,?,?,?,?,?,?,?,?,?)");

				$tripData = array(
					$params['tripDate'],
					$params['locationPickUp'],
					$params['locationPickUpTime'],
					$params['locationDestination'],
					$params['locationDestinationTime'],
					$params['driverName'],
					$params['plateNo'],
					$params['contactNo'],
					$params['userId'],
					date("m-d-Y")
				);

				$stmt->execute($tripData);
				$this->conn->commit();
				$_SESSION['Message'] = "Request Successfully Submitted for Approval! ";
				return true;
			} catch (PDOException $e){
				echo $e->getMessage();
			}
		}

	}