<?php
include '../config/config.php';
include '../common/class.users.php';
include '../common/class.ajax.php';

session_start();

if(!empty($_POST)){
	if(isset($_POST['newSalesAgent'])){

		$user = new User();

		$params = array(
			'userType' => 4,
			'username' => $_POST['username'],
			'password' => $_POST['password'],
			'firstName' => $_POST['firstName'],
			'middleName' => $_POST['middleName'],
			'lastName' => $_POST['lastName'],
			'spouseName' => $_POST['spouseName'],
			'nickName' => $_POST['nickName'],
			'DOB' => $_POST['DOB'],
			'Age' => $_POST['Age'],
			'gender' => $_POST['gender'],
			'tinNumber' => $_POST['tinNumber'],
			'emailAddress' => $_POST['emailAddress'],
			'contactNo' => $_POST['contactNo'],
			'homeAddress' => $_POST['homeAddress'],
			'occupation' => $_POST['occupation'],
			'seminarDate' => $_POST['seminarDate'],
			'seminarVenue' => $_POST['seminarVenue'],
			'recruitedBy' => $_POST['recruitedBy'],
			'recruitedByPos' => $_POST['recruitedByPos'],
			'recruitedByDiv' => $_POST['recruitedByDiv'],
			'trainorName' => $_POST['trainorName'],
			'salesDirector' => $_POST['salesDirector'],
			'divManager' => $_POST['divManager'],
			'occ_name' => $_POST['occ_name'],
			'occ_pos' => $_POST['occ_pos'],
			'occ_from' => $_POST['occ_from'],
			'occ_to' => $_POST['occ_to'],
			'educSchool' => $_POST['educSchool'],
			'educLocation' => $_POST['educLocation'],
			'educAttainment' => $_POST['educAttainment'],
			'educYearFrom' => $_POST['educYearFrom'],
			'educYearTo' => $_POST['educYearTo'],
			'accountCreate' => 'Registration'
		);

		$result = $user->insertUserData($params);
		if($result){
			$user->redirect('register.php');
		} else {
			$user->redirect('register.php');
		}

	} else if (isset($_POST['newSalesDirector'])) {
		$user = new User();

		$params = array(
			'userType' => 3,
			'username' => $_POST['username'],
			'password' => $_POST['password'],
			'firstName' => $_POST['firstName'],
			'middleName' => $_POST['middleName'],
			'lastName' => $_POST['lastName'],
			'spouseName' => $_POST['spouseName'],
			'nickName' => $_POST['nickName'],
			'DOB' => $_POST['DOB'],
			'Age' => $_POST['Age'],
			'gender' => $_POST['gender'],
			'tinNumber' => $_POST['tinNumber'],
			'emailAddress' => $_POST['emailAddress'],
			'contactNo' => $_POST['contactNo'],
			'homeAddress' => $_POST['homeAddress'],
			'occupation' => $_POST['occupation'],
			'seminarDate' => $_POST['seminarDate'],
			'seminarVenue' => $_POST['seminarVenue'],
			'recruitedBy' => $_POST['recruitedBy'],
			'recruitedByPos' => $_POST['recruitedByPos'],
			'recruitedByDiv' => $_POST['recruitedByDiv'],
			'trainorName' => $_POST['trainorName'],
			'salesDirector' => null,
			'divManager' => $_POST['divManager'],
			'occ_name' => $_POST['occ_name'],
			'occ_pos' => $_POST['occ_pos'],
			'occ_from' => $_POST['occ_from'],
			'occ_to' => $_POST['occ_to'],
			'educSchool' => $_POST['educSchool'],
			'educLocation' => $_POST['educLocation'],
			'educAttainment' => $_POST['educAttainment'],
			'educYearFrom' => $_POST['educYearFrom'],
			'educYearTo' => $_POST['educYearTo'],
			'accountCreate' => 'Encode',
			'divisionId' => $_POST['recruitedByDiv']
		);

		$result = $user->insertUserData($params);
		if($result){
			$user->redirect('empEncode.php');
		} else {
			$user->redirect('empEncode.php');
		}
	} else if (isset($_POST['newDivisionManager'])) {
		$user = new User();

		$params = array(
			'userType' => 2,
			'username' => $_POST['username'],
			'password' => $_POST['password'],
			'firstName' => $_POST['firstName'],
			'middleName' => $_POST['middleName'],
			'lastName' => $_POST['lastName'],
			'spouseName' => $_POST['spouseName'],
			'nickName' => $_POST['nickName'],
			'DOB' => $_POST['DOB'],
			'Age' => $_POST['Age'],
			'gender' => $_POST['gender'],
			'tinNumber' => $_POST['tinNumber'],
			'emailAddress' => $_POST['emailAddress'],
			'contactNo' => $_POST['contactNo'],
			'homeAddress' => $_POST['homeAddress'],
			'occupation' => $_POST['occupation'],
			'seminarDate' => $_POST['seminarDate'],
			'seminarVenue' => $_POST['seminarVenue'],
			'recruitedBy' => null,
			'recruitedByPos' => null,
			'recruitedByDiv' => null,
			'trainorName' => $_POST['trainorName'],
			'salesDirector' => null,
			'divManager' => null,
			'occ_name' => $_POST['occ_name'],
			'occ_pos' => $_POST['occ_pos'],
			'occ_from' => $_POST['occ_from'],
			'occ_to' => $_POST['occ_to'],
			'educSchool' => $_POST['educSchool'],
			'educLocation' => $_POST['educLocation'],
			'educAttainment' => $_POST['educAttainment'],
			'educYearFrom' => $_POST['educYearFrom'],
			'educYearTo' => $_POST['educYearTo'],
			'accountCreate' => 'Encode',
			'divisionId' => $_POST['divisionId']
		);

		$result = $user->insertUserData($params);
		if($result){
			$user->redirect('empEncode.php');
		} else {
			$user->redirect('empEncode.php');
		}
	}

	if(isset($_POST['login'])){
		$user = new User();
		$result = $user->login($_POST['employeeuser'],$_POST['password']);
		if($result){
			$user->redirect('index.php');
		} else {
			$user->redirect('login.php');
		}
	}

	if(isset($_POST['closing'])){
		$user = new User();

		$params = array(
			'familyName' => $_POST['familyname'],
			'firstName' => $_POST['firstname'],
			'phoneNo' => $_POST['phoneno'],
	        'telno' => $_POST['telno'],
	        'subdivision' => $_POST['subdivision'],
	        'location' => $_POST['location'],
	        'developer' => $_POST['developer'],
	        'phase' => $_POST['phase'],
	        'block' => $_POST['block'],
	        'lot' => $_POST['lot'],
	        'housemodel' => $_POST['housemodel'],
	        'floorarea' => $_POST['floorarea'],
	        'lotarea' => $_POST['lotarea'],
	        'reservationfee' => $_POST['reservationfee'],
	        'oipr' => $_POST['oipr'],
	        'division' => $_POST['division'],
	        'divisionmanager' => $_POST['divisionmanager'],
	        'salesdirector' => $_POST['salesdirector'],
	        'preparedBy' => $_POST['preparedBy'],
	        'closingdate' => $_POST['closingDate'],
	        'dateCreated' => date('m-d-Y'),
	        'user' => $_POST['userId']
	    );

	    $result = $user->insertClosingData($params);
	    if($result){
	    	$user->redirect('empEncode.php');
	    } else {
	    	$_SESSION['Message'] = "Something went wrong please try again.";
	    	$_SESSION['MsgCode'] = 2;
	    	$user->redirect('empEncode.php');
	    }
	}

	if(isset($_POST['approvalAccount'])){
		$user = new User();

		$params = array(
			'userId' => $_POST['salesId'],
			'status' => $_POST['status']
		);

		$result = $user->updateStatus($params);
		if($result){
			$user->redirect('empApproval.php');
		} else {
			$_SESSION['Message'] = "Something went wrong please try again.";
			$_SESSION['MsgCode'] = 2;
			$user->redirect('empApproval.php');
		}
	}

	if(isset($_POST['addNewHouse'])){
		$user = new User();

		$params = array(
			'houseName' => $_POST['houseName'],
			'description' => $_POST['description'],
			'location' => $_POST['location'],
			'promos' => $_POST['promos'],
			'userId' => $_POST['userId']
		);

		if (count($_FILES['houseImageFile']['tmp_name']) > 0) {
			for ($x = 0; $x < count($_FILES['houseImageFile']['tmp_name']); $x++) {
				$file_name = $_FILES['houseImageFile']['name'][$x];
				$file_size = $_FILES['houseImageFile']['size'][$x];
				$file_tmp  = $_FILES['houseImageFile']['tmp_name'][$x];

			    $t = explode(".", $file_name);
			    $t1 = end($t);
			    $file_ext = strtolower(end($t));

			    $allowExt = array("jpg", "jpeg", "png", "gif", "bmp");
			    if(in_array($file_ext,$allowExt)) {
			    	$fileTmp = $file_tmp;
			    	$file_path = "uploads/" . $file_name;
			    	move_uploaded_file($fileTmp, $file_path);

			    	$imageParamHouse = array(
			    		'imagePath' => $file_path,
			    		'isHouseSample' => 1,
			    		'isFloorPlan' => 0,
			    		'isAmenities' => 0
			    	);

			    	$user->insertImages($imageParamHouse);
			    }
			}
		}

		if (count($_FILES['floorPlanImgFile']['tmp_name']) > 0) {
			for ($x = 0; $x < count($_FILES['floorPlanImgFile']['tmp_name']); $x++) {
				$file_name = $_FILES['floorPlanImgFile']['name'][$x];
				$file_size = $_FILES['floorPlanImgFile']['size'][$x];
				$file_tmp  = $_FILES['floorPlanImgFile']['tmp_name'][$x];

			    $t = explode(".", $file_name);
			    $t1 = end($t);
			    $file_ext = strtolower(end($t));

			    $allowExt = array("jpg", "jpeg", "png", "gif", "bmp");
			    if(in_array($file_ext,$allowExt)) {
			    	$fileTmp = $file_tmp;
			    	$file_path = "uploads/" . $file_name;
			    	move_uploaded_file($fileTmp, $file_path);

			    	$imageParamFloor = array(
			    		'imagePath' => $file_path,
			    		'isHouseSample' => 0,
			    		'isFloorPlan' => 1,
			    		'isAmenities' => 0
			    	);

			    	$user->insertImages($imageParamFloor);
			    }
			}
		}

		if (count($_FILES['amenitiesFile']['tmp_name']) != 0) {
			for ($x = 0; $x < count($_FILES['amenitiesFile']['tmp_name']); $x++) {
				$file_name = $_FILES['amenitiesFile']['name'][$x];
				$file_size = $_FILES['amenitiesFile']['size'][$x];
				$file_tmp  = $_FILES['amenitiesFile']['tmp_name'][$x];

			    $t = explode(".", $file_name);
			    $t1 = end($t);
			    $file_ext = strtolower(end($t));

			    $allowExt = array("jpg", "jpeg", "png", "gif", "bmp");
			    if(in_array($file_ext,$allowExt)) {
			    	$fileTmp = $file_tmp;
			    	$file_path = "uploads/" . $file_name;
			    	move_uploaded_file($fileTmp, $file_path);

			    	$imageParamAmenities = array(
			    		'imagePath' => $file_path,
			    		'isHouseSample' => 0,
			    		'isFloorPlan' => 0,
			    		'isAmenities' => 1
			    	);

			    	$user->insertImages($imageParamAmenities);
			    }
			}
		}


		$result = $user->insertHouseProject($params);
		if($result){
			$user->redirect('empEncode.php');
			$_SESSION['MsgCode'] = 0;
		} else {
	    	$_SESSION['Message'] = "Something went wrong please try again.";
	    	$_SESSION['MsgCode'] = 2;
			$user->redirect('empEncode.php');
		}

	}

	if(isset($_POST['requestNewSeminar'])){
		$user = new User();

		$params = array(
			'seminarName' => $_POST['seminarName'],
			'seminarDate' => $_POST['seminarDate'],
			'timeStart' => $_POST['seminarTimeStart'],
			'timeEnd' => $_POST['seminarTimeEnd'],
			'seminarLocation' => $_POST['seminarLocation'],
			'userId' => $_POST['userId']
		);

		$result = $user->insertRequestSeminar($params);
		if($result){
			$user->redirect('divRequestSched.php');
			$_SESSION['MsgCode'] = 0;
		} else {
	    	$_SESSION['Message'] = "Something went wrong please try again.";
	    	$_SESSION['MsgCode'] = 2;
			$user->redirect('divRequestSched.php');
		}
	}

	if(isset($_POST['requestNewTrip'])){
		$user = new User();

		$params = array(
			'tripDate' => $_POST['tripDate'],
			'locationPickUp' => $_POST['locationPickUp'],
			'locationPickUpTime' => $_POST['locationPickUpTime'],
			'locationDestination' => $_POST['locationDestination'],
			'locationDestinationTime' => $_POST['locationDestinationTime'],
			'driverName' => $_POST['driverName'],
			'plateNo' => $_POST['plateNo'],
			'contactNo' => $_POST['contactNo'],
			'userId' => $_POST['userId']
		);

		$result = $user->insertRequestVehicleTrip($params);
		if($result){
			$user->redirect('divRequestSched.php');
			$_SESSION['MsgCode'] = 0;
		} else {
	    	$_SESSION['Message'] = "Something went wrong please try again.";
	    	$_SESSION['MsgCode'] = 2;
			$user->redirect('divRequestSched.php');
		}
	}

	if(isset($_POST['requestNewSeminarDir'])){
		$user = new User();

		$params = array(
			'seminarName' => $_POST['seminarName'],
			'seminarDate' => $_POST['seminarDate'],
			'timeStart' => $_POST['seminarTimeStart'],
			'timeEnd' => $_POST['seminarTimeEnd'],
			'seminarLocation' => $_POST['seminarLocation'],
			'userId' => $_POST['userId']
		);

		$result = $user->insertRequestSeminar($params);
		if($result){
			$user->redirect('dirRequestSched.php');
			$_SESSION['MsgCode'] = 0;
		} else {
	    	$_SESSION['Message'] = "Something went wrong please try again.";
	    	$_SESSION['MsgCode'] = 2;
			$user->redirect('dirRequestSched.php');
		}
	}

	if(isset($_POST['requestNewTripDir'])){
		$user = new User();

		$params = array(
			'tripDate' => $_POST['tripDate'],
			'locationPickUp' => $_POST['locationPickUp'],
			'locationPickUpTime' => $_POST['locationPickUpTime'],
			'locationDestination' => $_POST['locationDestination'],
			'locationDestinationTime' => $_POST['locationDestinationTime'],
			'driverName' => $_POST['driverName'],
			'plateNo' => $_POST['plateNo'],
			'contactNo' => $_POST['contactNo'],
			'userId' => $_POST['userId']
		);

		$result = $user->insertRequestVehicleTrip($params);
		if($result){
			$user->redirect('dirRequestSched.php');
			$_SESSION['MsgCode'] = 0;
		} else {
	    	$_SESSION['Message'] = "Something went wrong please try again.";
	    	$_SESSION['MsgCode'] = 2;
			$user->redirect('dirRequestSched.php');
		}
	}


	/*
	 * AJAX FUNCTIONS 
	 *
	 */
	if(isset($_POST['id'])){
		$ajax = new ajaxFunction();
		$result = $ajax->getUserViaId($_POST['id']);
		echo $result;
	}

	if(isset($_POST['sortDownlineBySalesDir'])){
		$ajax = new ajaxFunction();
		$result = $ajax->getDownlinesSalesDirector($_POST['sortDownlineBySalesDir']);
		echo $result;
	}

	if(isset($_POST['getClosing'])){
		$ajax = new ajaxFunction();
		$result = $ajax->getClosingSalesViaUserId($_POST['getClosing']);

		echo $result;
	}

	if(isset($_POST['getUserProfile'])){
		$ajax = new ajaxFunction();
		$result = $ajax->getUserInfoViaUserId($_POST['getUserProfile']);

		echo $result;
	}

	if(isset($_POST['getDownlinesViaId']) && isset($_POST['divId'])){
		$ajax = new ajaxFunction();
		$result = $ajax->getDownlinesPerDivision($_POST['divId'], $_POST['getDownlinesViaId']);

		echo $result;
	}


































} else {
	//Header("Location: index.php");
}
?>
