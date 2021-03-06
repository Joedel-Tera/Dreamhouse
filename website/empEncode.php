<?php
  include '../common/class.users.php';
	session_start();
	$currentMenu = 53;
    $userGroup = 5;


  $user = new User();
  $status = 'For Activation';

  $user->isPageAccessible($_SESSION['user_type'], $userGroup);
  $getDevelopers = $user->getDevelopers();
  $alluserData = $user->getAllUser($status);
  $alluserData2 = $user->getActiveUsersExceptEmpAdmin();
  $allSalesDirector = $user->getAllActiveSalesDirector();
  $allDivisionManager = $user->getAllActiveDivisionManager();

?>

<!DOCTYPE html>
<html>
<head>
<?php include 'headerFiles.php'; ?>
<link href="locales/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
</head>
<body>
	<?php include 'mainHeader.php'; ?>

  <div class="content">
    <?php if(isset($Message)){ ?>
        <div class="alert <?php if($MsgCode != 2){ ?> alert-success <?php } else { ?> alert-danger <?php } ?>" id="errMsg">
      &nbsp; <?php echo $Message; ?>!</div>
    <?php unset($_SESSION["Message"]); } ?>

    <h2 style="text-align:center; text-transform: uppercase;margin:0;"> Data Encoding </h2>
    <br>
    <div class="row">
      <div class="col-md-10 col-sm-offset-1">
        <div class="encoder-container">
          <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#salesDirector"> Add New Sales Director </a></li>
              <li><a data-toggle="tab" href="#divisionManager"> Add New Division Manager </a></li>
              <li><a data-toggle="tab" href="#houseProjects"> House Projects </a></li>
              <li><a data-toggle="tab" href="#news"> News / Article </a></li>
              <li><a data-toggle="tab" href="#closingForm"> Closing Form </a></li>
          </ul>
        </div>
        <div class="tab-content">
          <!-- Start For Sales Director -->
          <div id="salesDirector" class="tab-pane fade in active" style="padding:25px">
            <h2> Add New Sales Director </h2>
              <hr>
                <form method="post" action="commonFunctions.php">

                    <div style="clear:both;"></div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3">
                                <label>First Name</label>
                                <input type="text" required class="form-control" name="firstName" pattern="[a-zA-Z][a-zA-Z ]{2,}" title="Must contain characters only and atleast 2 letters" placeholder="Enter your First Name">
                            </div>
                            <div class="col-sm-3">
                                <label>Middle Name</label>
                                <input type="text" class="form-control" name="middleName" pattern="[a-zA-Z][a-zA-Z ]{,2}" title="Must contain characters only" placeholder="Middle Name">
                            </div>
                            <div class="col-sm-3">
                                <label>Last Name</label>
                                <input type="text" required class="form-control" name="lastName" pattern="[a-zA-Z][a-zA-Z ]{2,}" title="Must contain characters only and atleast 2 letters" placeholder="Enter your Last Name">
                            </div>
                            <div class="col-sm-3">
                                <label>Name of Spouse, if married</label>
                                <input type="text" class="form-control" name="spouseName" pattern="[a-zA-Z][a-zA-Z ]{3,}" title="Must contain characters only and atleast 3 letters" placeholder="Enter your Spouse Name">
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;">
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3">
                                <label>Nickname</label>
                                <input type="text" class="form-control" name="nickName" pattern="[a-zA-Z][a-zA-Z ]{2,}" title="Must contain characters only" placeholder="Enter your Nickname">
                            </div>

                            <div class="col-sm-4">
                                <label>Birthdate</label>
                                <div class="input-group date form_date col-sm-12" data-date="" data-date-format="MM dd, yyyy" data-link-field="dtp_input1" data-link-format="mm-dd-yyyy">
                                    <input class="form-control" size="5" name="DOB" type="text" value="" readonly>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                                <input type="hidden" id="dtp_input1" name="DOB" value="" /><br/>
                            </div>
                
                            <div class="col-sm-2">
                                <label>Age</label>
                                    <input type="text" required class="form-control" pattern="[0-9]{2,3}" title="Numbers only! please input a valid age" name="Age" id="Age" placeholder="Age">
                            </div>

                            <div class="col-sm-3" style="text-align: center;">
                                <label>Gender</label>
                                <div class="row">
                                    <input type="radio" name="gender" id="1" required value="Male"  />
                                    <span class="radiotext">Male</span>

                                    <input type="radio" name="gender" value="Female" />
                                    <span class="radiotext">Female</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <label>TIN(Tax Identication Number)</label>
                                <input type="text" class="form-control" name="tinNumber"  pattern="[0-9]{5,9}" title="please input required numbers" placeholder="Enter your Tin">
                            </div>

                            <div class="col-sm-4">
                                <label>Email Address</label>
                                <input type="email" required class="form-control" name="emailAddress" placeholder="Email Address">
                         <!--  <span class="error"><?php $emailErr;?></span> -->
                            </div>
                            <div class="col-sm-4">
                                <label>Contact Number</label>
                                <input type="text" required class="form-control" name="contactNo" pattern="[0-9]{11,13}" placeholder="Contact Number">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Address</label>
                                <input type="text" name="homeAddress" required class="form-control"  placeholder="Blk# Lot#, Ph#, Street, brgy, Municipality, City">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Employee Username</label>
                                <input type="text" name="username" required class="form-control"  minlength="8" placeholder="Enter your username">
                            </div>

                            <div class="col-sm-4">
                                <label>Password</label>
                                <input type="password" name="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="form-control" id="password" placeholder="Enter your password">
                            </div>
                            <div class="col-sm-4">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" required minlength="8" id="confirm_password" name='confirm_password' placeholder="confirm password" />
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <h3><strong>EDUCATIONAL QUALIFICATION</strong></h3>
                            <div class="col-sm-3 col-sm-offset-1">
                                <label>College </label>
                                <input type="text" class="form-control" name="educSchool[]" pattern="[a-zA-Z][a-zA-Z ]{5,}" placeholder="School Name">
                            </div>
                            <div class="col-sm-3">
                                <label>Location</label>
                                <input type="text" class="form-control" name="educLocation[]" placeholder="Location of your School">
                            </div>
                            <div class="col-sm-2">
                                <label>Attainment</label>
                                <input type="text" class="form-control" name="educAttainment[]" placeholder="Course/Graduate/Undergraduate">
                            </div>
                            <div class="col-sm-1">
                                <label>From:</label>
                                <input type="text" class="form-control" name="educYearFrom[]" maxlength="4" pattern="[0-9]{4,4}" title="Must contain a numbers only" placeholder="From">
                            </div>
                            <div class="col-sm-1">
                                <label>To:</label>
                                <input type="text" class="form-control" name="educYearTo[]" title="Must contain a numbers only" pattern="[0-9]{4,4}" maxlength="4" placeholder="To">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3 col-sm-offset-1">
                                <label> Highschool </label>
                                <input type="text" class="form-control" name="educSchool[]" pattern="[a-zA-Z][a-zA-Z ]{5,}" placeholder="School Name">
                            </div>
                            <div class="col-sm-3">
                                <label> &nbsp; </label>
                                <input type="text" class="form-control" name="educLocation[]" placeholder="Location of your School">
                            </div>
                            <div class="col-sm-2">
                                <label> &nbsp; </label>
                                <input type="text" class="form-control" name="educAttainment[]" placeholder="Course/Graduate/Undergraduate">
                            </div>
                            <div class="col-sm-1">
                                <label> &nbsp; </label>
                                <input type="text" class="form-control" name="educYearFrom[]" maxlength="4" pattern="[0-9]{4,4}" title="Must contain a numbers only" placeholder="From">
                            </div>
                            <div class="col-sm-1">
                                <label> &nbsp; </label>
                                <input type="text" class="form-control" name="educYearTo[]" title="Must contain a numbers only" pattern="[0-9]{4,4}" maxlength="4" placeholder="To">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3 col-sm-offset-1">
                                <label> Elementary  </label>
                                <input type="text" class="form-control" name="educSchool[]" pattern="[a-zA-Z][a-zA-Z ]{5,}" placeholder="School Name">
                            </div>
                            <div class="col-sm-3">
                                <label> &nbsp; </label>
                                <input type="text" class="form-control" name="educLocation[]" placeholder="Location of your School">
                            </div>
                            <div class="col-sm-2">
                                <label> &nbsp; </label>
                                <input type="text" class="form-control" name="educAttainment[]" placeholder="Course/Graduate/Undergraduate">
                            </div>
                            <div class="col-sm-1">
                                <label> &nbsp; </label>
                                <input type="text" class="form-control" name="educYearFrom[]" maxlength="4" pattern="[0-9]{4,4}" title="Must contain a numbers only" placeholder="From">
                            </div>
                            <div class="col-sm-1">
                                <label> &nbsp; </label>
                                <input type="text" class="form-control" name="educYearTo[]" title="Must contain a numbers only" pattern="[0-9]{4,4}" maxlength="4" placeholder="To">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3 col-sm-offset-1">
                                <label> Vocational </label>
                                <input type="text" class="form-control" name="educSchool[]" pattern="[a-zA-Z][a-zA-Z ]{5,}" placeholder="School Name">
                            </div>
                            <div class="col-sm-3">
                                <label> &nbsp; </label>
                                <input type="text" class="form-control" name="educLocation[]" placeholder="Location of your School">
                            </div>
                            <div class="col-sm-2">
                                <label> &nbsp; </label>
                                <input type="text" class="form-control" name="educAttainment[]" placeholder="Course/Graduate/Undergraduate">
                            </div>
                            <div class="col-sm-1">
                                <label> &nbsp; </label>
                                <input type="text" class="form-control" name="educYearFrom[]" maxlength="4" pattern="[0-9]{4,4}" title="Must contain a numbers only" placeholder="From">
                            </div>
                            <div class="col-sm-1">
                                <label> &nbsp; </label>
                                <input type="text" class="form-control" name="educYearTo[]" title="Must contain a numbers only" pattern="[0-9]{4,4}" maxlength="4" placeholder="To">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <h3><strong> OCCUPATION </strong></h3>
                            <div class="col-sm-6 col-sm-offset-1">
                                <label style="text-transform: uppercase;">Present Occupation</label>
                                <input type="text" class="form-control" name="occupation"  pattern="[a-zA-Z][a-zA-Z ]{4,}" placeholder="Your Present occupation">
                                <span class="">*Optional</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-1">
                            <h4><strong>Real Estate Selling Experience</strong></h4>
                            <h5>This is Optional Only</h5>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3 col-sm-offset-1">
                                <label>Name of Realty</label>
                                <input type="text" class="form-control" name="occ_name" pattern="[a-zA-Z][a-zA-Z ]{4,}" placeholder="Name of Realty">
                            </div>

                            <div class="col-sm-3">
                                <label>Position</label>
                                <input type="text" class="form-control" name="occ_pos" pattern="[a-zA-Z][a-zA-Z ]{2,}" placeholder="Your Position">
                            </div>
                             
                            <div class="col-sm-2">
                                <label>From:</label>
                                <input type="text" class="form-control" name="occ_from" pattern="[0-9]{4,4}" placeholder="From Year">
                            </div>
                            <div class="col-sm-2">
                                <label>To:</label>
                                <input type="text" class="form-control" name="occ_to" pattern="[0-9]{4,4}" placeholder="To Year">
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <h4><strong>I hereby certify that the above information is true and correct to the best of my knowledge and belief.</strong></h4>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4 col-sm-offset-1">
                                <label>Date of Seminar</label>
                                <div class="input-group date form_date col-sm-12" data-date="" data-date-format="MM dd yyyy" data-link-field="dtp_input2" data-link-format="mm-dd-yyyy">
                                    <input class="form-control" size="5" name="seminarDate" type="text" value="" readonly>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                            <input type="hidden" id="dtp_input2" name="seminarDate" value="" /><br/>
                            </div>

                            <div class="col-sm-4">
                                <label>Venue of Seminar</label>
                                <input type="text" class="form-control" name="seminarVenue" placeholder="Venue of seminar">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3 col-sm-offset-1">
                                <label>Recruited By</label>
                                <input type="text" class="form-control" name="recruitedBy" pattern="[a-zA-Z][a-zA-Z ]{4,}" placeholder="Recruited by">
                            </div>
                            <div class="col-sm-2">
                                <label>Position</label>
                                <input type="text" class="form-control" name="recruitedByPos" pattern="[a-zA-Z][a-zA-Z ]{4,}" placeholder="Position">
                            </div>

                            <div class="col-sm-2">
                                <label>Division</label>
                                <input type="text" class="form-control" name="recruitedByDiv" pattern="[0-9]{1,3}" placeholder="Division">
                            </div>
                            <div class="col-sm-3">
                                <label>Name of Trainor/Facilitator</label>
                                <input type="text" class="form-control" name="trainorName" pattern="[a-zA-Z][a-zA-Z ]{4,}" placeholder="Name of the Trainor/Facilitator">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4 col-sm-offset-1">
                                <label>Division Manager</label>
                                <select name="divManager" class="form-control">
                                  <option> Select Division Manager </option>
                                  <?php foreach($allDivisionManager as $allDivManager) { ?>
                                    <option value="<?php echo $allDivManager['dh_user_id']; ?>" >  <?php echo $allDivManager['dh_firstName'].' '.$allDivManager['dh_lastName']; ?> </option>
                                  <?php } ?>
                                </select>
                            </div>

                            <div class="col-sm-4">
                                <label>Executive Broker</label>
                                <label style="display:block;vertical-align: middle;position: relative;margin-top: 5px;"> RODELIO D. PARAFINA </label>
                            </div>
                        </div>
                    </div>

                    <br>
                        
                    <div class="col-sm-3 col-sm-offset-5">
                        <div class="form-group clearfix">
                            <button type="submit" name="newSalesDirector" class="btn btn-primary btn-lg" >Register</button>
                        </div>
                    </div>
                </form>    
          </div>
          <!-- End For Sales Director -->

          <!-- Start For Division Manager -->
          <div id="divisionManager" class="tab-pane fade" style="padding:25px;">
            <h2> Add New Division Manager </h2>
              <hr>
                <form method="post" action="commonFunctions.php">

                    <div style="clear:both;"></div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3">
                                <label>First Name</label>
                                <input type="text" required class="form-control" name="firstName" pattern="[a-zA-Z][a-zA-Z ]{2,}" title="Must contain characters only and atleast 2 letters" placeholder="Enter your First Name">
                            </div>
                            <div class="col-sm-3">
                                <label>Middle Name</label>
                                <input type="text" class="form-control" name="middleName" pattern="[a-zA-Z][a-zA-Z ]{,2}" title="Must contain characters only" placeholder="Middle Name">
                            </div>
                            <div class="col-sm-3">
                                <label>Last Name</label>
                                <input type="text" required class="form-control" name="lastName" pattern="[a-zA-Z][a-zA-Z ]{2,}" title="Must contain characters only and atleast 2 letters" placeholder="Enter your Last Name">
                            </div>
                            <div class="col-sm-3">
                                <label>Name of Spouse, if married</label>
                                <input type="text" class="form-control" name="spouseName" pattern="[a-zA-Z][a-zA-Z ]{3,}" title="Must contain characters only and atleast 3 letters" placeholder="Enter your Spouse Name">
                            </div>
                        </div>
                    </div>
                    <div style="clear:both;">
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3">
                                <label>Nickname</label>
                                <input type="text" class="form-control" name="nickName" pattern="[a-zA-Z][a-zA-Z ]{2,}" title="Must contain characters only" placeholder="Enter your Nickname">
                            </div>

                            <div class="col-sm-4">
                                <label>Birthdate</label>
                                <div class="input-group date form_date col-sm-12" data-date="" data-date-format="MM dd, yyyy" data-link-field="dtp_input1" data-link-format="mm-dd-yyyy">
                                    <input class="form-control" size="5" name="DOB" type="text" value="" readonly>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                                <input type="hidden" id="dtp_input1" name="DOB" value="" /><br/>
                            </div>
                
                            <div class="col-sm-2">
                                <label>Age</label>
                                    <input type="text" required class="form-control" pattern="[0-9]{2,3}" title="Numbers only! please input a valid age" name="Age" id="Age" placeholder="Age">
                            </div>

                            <div class="col-sm-3" style="text-align: center;">
                                <label>Gender</label>
                                <div class="row">
                                    <input type="radio" name="gender" id="1" required value="Male"  />
                                    <span class="radiotext">Male</span>

                                    <input type="radio" name="gender" value="Female" />
                                    <span class="radiotext">Female</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <label>TIN(Tax Identication Number)</label>
                                <input type="text" class="form-control" name="tinNumber"  pattern="[0-9]{5,9}" title="please input required numbers" placeholder="Enter your Tin">
                            </div>

                            <div class="col-sm-4">
                                <label>Email Address</label>
                                <input type="email" required class="form-control" name="emailAddress" placeholder="Email Address">
                         <!--  <span class="error"><?php $emailErr;?></span> -->
                            </div>
                            <div class="col-sm-4">
                                <label>Contact Number</label>
                                <input type="text" required class="form-control" name="contactNo" pattern="[0-9]{11,13}" placeholder="Contact Number">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Address</label>
                                <input type="text" name="homeAddress" required class="form-control"  placeholder="Blk# Lot#, Ph#, Street, brgy, Municipality, City">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Employee Username</label>
                                <input type="text" name="username" required class="form-control"  minlength="8" placeholder="Enter your username">
                            </div>

                            <div class="col-sm-4">
                                <label>Password</label>
                                <input type="password" name="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="form-control" id="password" placeholder="Enter your password">
                            </div>
                            <div class="col-sm-4">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" required minlength="8" id="confirm_password" name='confirm_password' placeholder="confirm password" />
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <h3><strong>EDUCATIONAL QUALIFICATION</strong></h3>
                            <div class="col-sm-3 col-sm-offset-1">
                                <label>College </label>
                                <input type="text" class="form-control" name="educSchool[]" pattern="[a-zA-Z][a-zA-Z ]{5,}" placeholder="School Name">
                            </div>
                            <div class="col-sm-3">
                                <label>Location</label>
                                <input type="text" class="form-control" name="educLocation[]" placeholder="Location of your School">
                            </div>
                            <div class="col-sm-2">
                                <label>Attainment</label>
                                <input type="text" class="form-control" name="educAttainment[]" placeholder="Course/Graduate/Undergraduate">
                            </div>
                            <div class="col-sm-1">
                                <label>From:</label>
                                <input type="text" class="form-control" name="educYearFrom[]" maxlength="4" pattern="[0-9]{4,4}" title="Must contain a numbers only" placeholder="From">
                            </div>
                            <div class="col-sm-1">
                                <label>To:</label>
                                <input type="text" class="form-control" name="educYearTo[]" title="Must contain a numbers only" pattern="[0-9]{4,4}" maxlength="4" placeholder="To">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3 col-sm-offset-1">
                                <label> Highschool </label>
                                <input type="text" class="form-control" name="educSchool[]" pattern="[a-zA-Z][a-zA-Z ]{5,}" placeholder="School Name">
                            </div>
                            <div class="col-sm-3">
                                <label> &nbsp; </label>
                                <input type="text" class="form-control" name="educLocation[]" placeholder="Location of your School">
                            </div>
                            <div class="col-sm-2">
                                <label> &nbsp; </label>
                                <input type="text" class="form-control" name="educAttainment[]" placeholder="Course/Graduate/Undergraduate">
                            </div>
                            <div class="col-sm-1">
                                <label> &nbsp; </label>
                                <input type="text" class="form-control" name="educYearFrom[]" maxlength="4" pattern="[0-9]{4,4}" title="Must contain a numbers only" placeholder="From">
                            </div>
                            <div class="col-sm-1">
                                <label> &nbsp; </label>
                                <input type="text" class="form-control" name="educYearTo[]" title="Must contain a numbers only" pattern="[0-9]{4,4}" maxlength="4" placeholder="To">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3 col-sm-offset-1">
                                <label> Elementary  </label>
                                <input type="text" class="form-control" name="educSchool[]" pattern="[a-zA-Z][a-zA-Z ]{5,}" placeholder="School Name">
                            </div>
                            <div class="col-sm-3">
                                <label> &nbsp; </label>
                                <input type="text" class="form-control" name="educLocation[]" placeholder="Location of your School">
                            </div>
                            <div class="col-sm-2">
                                <label> &nbsp; </label>
                                <input type="text" class="form-control" name="educAttainment[]" placeholder="Course/Graduate/Undergraduate">
                            </div>
                            <div class="col-sm-1">
                                <label> &nbsp; </label>
                                <input type="text" class="form-control" name="educYearFrom[]" maxlength="4" pattern="[0-9]{4,4}" title="Must contain a numbers only" placeholder="From">
                            </div>
                            <div class="col-sm-1">
                                <label> &nbsp; </label>
                                <input type="text" class="form-control" name="educYearTo[]" title="Must contain a numbers only" pattern="[0-9]{4,4}" maxlength="4" placeholder="To">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3 col-sm-offset-1">
                                <label> Vocational </label>
                                <input type="text" class="form-control" name="educSchool[]" pattern="[a-zA-Z][a-zA-Z ]{5,}" placeholder="School Name">
                            </div>
                            <div class="col-sm-3">
                                <label> &nbsp; </label>
                                <input type="text" class="form-control" name="educLocation[]" placeholder="Location of your School">
                            </div>
                            <div class="col-sm-2">
                                <label> &nbsp; </label>
                                <input type="text" class="form-control" name="educAttainment[]" placeholder="Course/Graduate/Undergraduate">
                            </div>
                            <div class="col-sm-1">
                                <label> &nbsp; </label>
                                <input type="text" class="form-control" name="educYearFrom[]" maxlength="4" pattern="[0-9]{4,4}" title="Must contain a numbers only" placeholder="From">
                            </div>
                            <div class="col-sm-1">
                                <label> &nbsp; </label>
                                <input type="text" class="form-control" name="educYearTo[]" title="Must contain a numbers only" pattern="[0-9]{4,4}" maxlength="4" placeholder="To">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <h3><strong> OCCUPATION </strong></h3>
                            <div class="col-sm-6 col-sm-offset-1">
                                <label style="text-transform: uppercase;">Present Occupation</label>
                                <input type="text" class="form-control" name="occupation"  pattern="[a-zA-Z][a-zA-Z ]{4,}" placeholder="Your Present occupation">
                                <span class="">*Optional</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-1">
                            <h4><strong>Real Estate Selling Experience</strong></h4>
                            <h5>This is Optional Only</h5>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3 col-sm-offset-1">
                                <label>Name of Realty</label>
                                <input type="text" class="form-control" name="occ_name" pattern="[a-zA-Z][a-zA-Z ]{4,}" placeholder="Name of Realty">
                            </div>

                            <div class="col-sm-3">
                                <label>Position</label>
                                <input type="text" class="form-control" name="occ_pos" pattern="[a-zA-Z][a-zA-Z ]{2,}" placeholder="Your Position">
                            </div>
                             
                            <div class="col-sm-2">
                                <label>From:</label>
                                <input type="text" class="form-control" name="occ_from" pattern="[0-9]{4,4}" placeholder="From Year">
                            </div>
                            <div class="col-sm-2">
                                <label>To:</label>
                                <input type="text" class="form-control" name="occ_to" pattern="[0-9]{4,4}" placeholder="To Year">
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <h4><strong>I hereby certify that the above information is true and correct to the best of my knowledge and belief.</strong></h4>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-4 col-sm-offset-1">
                                <label>Date of Seminar</label>
                                <div class="input-group date form_date col-sm-12" data-date="" data-date-format="MM dd yyyy" data-link-field="dtp_input2" data-link-format="mm-dd-yyyy">
                                    <input class="form-control" size="5" name="seminarDate" type="text" value="" readonly>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                            <input type="hidden" id="dtp_input2" name="seminarDate" value="" /><br/>
                            </div>

                            <div class="col-sm-4">
                                <label>Venue of Seminar</label>
                                <input type="text" class="form-control" name="seminarVenue" placeholder="Venue of seminar">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-3 col-sm-offset-1">
                                <label>Recruited By</label>
                                <input type="text" class="form-control" name="recruitedBy" pattern="[a-zA-Z][a-zA-Z ]{4,}" placeholder="Recruited by">
                            </div>
                            <div class="col-sm-2">
                                <label>Position</label>
                                <input type="text" class="form-control" name="recruitedByPos" pattern="[a-zA-Z][a-zA-Z ]{4,}" placeholder="Position">
                            </div>

                            <div class="col-sm-2">
                                <label>Division</label>
                                <input type="text" class="form-control" name="recruitedByDiv" pattern="[0-9]{1,3}" placeholder="Division">
                            </div>
                            <div class="col-sm-3">
                                <label>Name of Trainor/Facilitator</label>
                                <input type="text" class="form-control" name="trainorName" pattern="[a-zA-Z][a-zA-Z ]{4,}" placeholder="Name of the Trainor/Facilitator">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-5 col-sm-offset-1">
                                <label>Executive Broker</label>
                                <label style="display:block;vertical-align: middle;position: relative;margin-top: 5px;"> RODELIO D. PARAFINA </label>
                            </div>
                        </div>
                    </div>

                    <br>
                        
                    <div class="col-sm-3 col-sm-offset-5">
                        <div class="form-group clearfix">
                            <button type="submit" name="newDivisionManager" class="btn btn-primary btn-lg" >Register</button>
                        </div>
                    </div>
                </form>
          </div>
          <!-- End for Division Manager -->

          <!-- Start For House Projects -->
          <div id="houseProjects" class="tab-pane fade" style="padding:25px;">
            <h2> House Projects </h2>
            <hr>
            <form method="post" role="form" action="commonFunctions.php" enctype="multipart/form-data">
               <div class="form-group">
                  <div class="row">
                     <div class="col-sm-3 col-sm-offset-1">
                        <label>House Name</label>
                        <input type="text" class="form-control" name="houseName" placeholder="House Project Name">
                     </div>
                     <div class="col-sm-7">
                        <label> Description </label>
                        <input type="text" class="form-control" name="description">
                     </div>
                  </div>
               </div>
               <div style="clear:both;">
               </div>
               <div class="form-group">
                  <div class="row">
                    <label class="col-sm-3 col-sm-offset-1 control-label">House Images </label>
                    <div class="col-sm-8">
                        <input type="file" id="houseImageFile" name="houseImageFile[]" multiple="multiple" accept="image/*" required/>
                    </div>
                  </div>
               </div>
               <div style="clear:both;">
               </div>
               <div class="form-group">
                  <div class="row">
                    <label class="col-sm-3 col-sm-offset-1 control-label"> Floor Plan </label>
                    <div class="col-sm-8">
                        <input type="file" id="floorPlanImgFile" name="floorPlanImgFile[]" multiple="multiple" accept="image/*" required/>
                    </div>
                  </div>
               </div>
               <div style="clear:both;">
               </div>
               <div class="form-group">
                  <div class="row">
                    <label class="col-sm-3 col-sm-offset-1 control-label"> Amenities </label>
                    <div class="col-sm-8">
                        <input type="file" id="amenitiesFile" name="amenitiesFile[]" multiple="multiple" accept="image/*" required/>
                    </div>
                  </div>
               </div>
               <div style="clear:both;">
               </div>
               <div class="form-group">
                  <div class="row">
                     <div class="col-sm-5 col-sm-offset-1">
                        <label>Location</label>
                        <input type="text" class="form-control" name="location" placeholder="Enter Location">
                     </div>
                     <div class="col-sm-5">
                        <label>Promos</label>
                        <input type="text" class="form-control" name="promos" placeholder="Promos" />
                     </div>
                  </div>
               </div>
               <div style="clear:both;">
               </div>
               <div class="form-group">
                  <div class="row">
                     <div class="col-sm-5 col-sm-offset-1">
                        <label> Posted By / Encoded By </label>
                        <input type="text" disabled class="form-control" value="<?php echo $_SESSION['user_fullName']; ?>">
                        <input type="hidden" name="userId" value="<?php echo $_SESSION['user_session']; ?>">
                     </div>
                  </div>
               </div>

               <div class="form-group clearfix">
                  <br>
                  <div class="col-sm-4 col-sm-offset-4">
                     <button type="submit" name="addNewHouse" class="btn btn-primary btn-lg" style="width:100%"> Submit House Project </button>
                  </div>
               </div>
            </form>            
            <hr>
          </div>
          <!-- End for House Projects -->

          <!-- Start For News Articles -->
          <div id="news" class="tab-pane fade" style="padding:25px;">
            <h2> News Articles </h2>
            <hr>
          </div>
          <!-- End for News Articles -->

          <!-- Start For Closing Form -->
          <div id="closingForm" class="tab-pane fade" style="padding:25px;">
            <h2> Closing Form </h2>
            <hr>
            <form method="post" role="form" action="commonFunctions.php">
               <div class="form-group">
                  <div class="row">
                     <div class="col-sm-3">
                        <label>Family Name</label>
                        <input type="text" class="form-control" name="familyname" placeholder="Enter your Last Name">
                     </div>
                     <div class="col-sm-3">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="firstname" placeholder="Enter your First Name">
                     </div>
                     <div class="col-sm-3">
                        <label>Cellphone #</label>
                        <input type="text" class="form-control" name="phoneno" placeholder="Enter your Phone No">
                     </div>
                     <div class="col-sm-3">
                        <label>Telephone #</label>
                        <input type="text" class="form-control" name="telno" placeholder="Enter your Tel No">
                     </div>
                  </div>
               </div>
               <div style="clear:both;">
               </div>
               <div class="form-group">
                  <div class="row">
                     <div class="col-sm-5 col-sm-offset-1">
                        <label>Subdivision</label>
                        <input type="text" class="form-control" name="subdivision" placeholder="Enter the subdivision">
                     </div>
                     <div class="col-sm-5">
                        <label>Location</label>
                        <input type="text" class="form-control" name="location" placeholder="Enter the location" />
                     </div>
                  </div>
               </div>
               <div style="clear:both;">
               </div>
               <div class="form-group">
                  <div class="row">
                     <div class="col-sm-5 col-sm-offset-1">
                        <label>Developer</label>
                        <select name="developer" class="form-control">
                           <option value=""> Select Developer </option>
                           <?php foreach($getDevelopers as $devs) { ?>
                           <option value="<?php echo htmlentities($devs['dh_dev_name']); ?>" > <?php echo htmlentities($devs['dh_dev_name']); ?> </option>
                           <?php } ?>
                        </select>
                     </div>
                     <div class="col-sm-2">
                        <label>Phase #</label>
                        <input type="text" class="form-control" name="phase" placeholder="ph #" />
                     </div>
                     <div class="col-sm-2">
                        <label>Blk #</label>
                        <input type="text" class="form-control" name="block" placeholder="blk #" />
                     </div>
                     <div class="col-sm-1">
                        <label>Lot #</label>
                        <input type="text" class="form-control" name="lot" placeholder="lot #" />
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <div class="col-sm-4 col-sm-offset-1">
                        <label>House Model</label>
                        <input type="text" class="form-control" name="housemodel" placeholder="Enter the House model">
                     </div>
                     <div class="col-sm-3">
                        <label>Floor Area</label>
                        <input type="text" class="form-control" name="floorarea" placeholder="Enter the floor area" />(sqm.)
                     </div>
                     <div class="col-sm-3">
                        <label>Lot Area</label>
                        <input type="text" class="form-control" name="lotarea" placeholder="Enter the lot area" />(sqm.)
                     </div>
                  </div>
               </div>
               <br>
               <br>
               <div class="form-group">
                  <div class="row">
                     <div class="col-sm-3 col-sm-offset-1">
                        <label>Reservation Fee</label>
                        <input type="text" class="form-control" name="reservationfee" placeholder="Amount of reservation">
                     </div>
                     <div class="col-sm-2">
                        <label>OI/PR #</label>
                        <input type="text" class="form-control" name="oipr" placeholder="OI/PR #" />
                     </div>
                     <div class="col-sm-3">
                        <label> Closing Date </label>
                            <div class="input-group date form_date col-sm-12" data-date="" data-date-format="MM dd yyyy" data-link-field="closingDateInput" data-link-format="mm-dd-yyyy">
                                <input class="form-control" size="5" name="closingDate" type="text" value="" readonly>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        <input type="hidden" id="closingDateInput" name="closingDate" value="" /><br/>    
                     </div>
                     <div class="col-sm-3">
                        <label>Division</label>
                        <input type="text" class="form-control" name="division" placeholder="Division" />
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <div class="col-sm-4 col-sm-offset-1">
                        <label>Division Manager</label>
                        <select name="divisionmanager" class="form-control">
                          <option value=''> Select Division Manager </option>
                          <?php foreach($allDivisionManager as $allDivManager) { ?>
                            <option value="<?php echo $allDivManager['dh_user_id']; ?>" >  <?php echo $allDivManager['dh_firstName'].' '.$allDivManager['dh_lastName']; ?> </option>
                          <?php } ?>
                        </select>
                     </div>
                     <div class="col-sm-3">
                        <label>Sales Director</label>
                        <select name="salesdirector" class="form-control">
                          <option value=''> Select Sales Director </option>
                          <?php foreach($allSalesDirector as $saleDirData) { ?>
                            <option value="<?php echo $saleDirData['dh_user_id']; ?>" >  <?php echo $saleDirData['dh_firstName'].' '.$saleDirData['dh_lastName']; ?> </option>
                          <?php } ?>
                        </select>
                     </div>
                     <div class="col-sm-4">
                        <label>Prepared By</label>
                        <select name="preparedBy" class="form-control">
                          <option value=''> Select User </option>
                          <?php foreach($alluserData2 as $userData2) { ?>
                            <option value="<?php echo $userData2['dh_user_id']; ?>" >  <?php echo $userData2['dh_firstName'].' '.$userData2['dh_lastName']; ?> </option>
                          <?php } ?>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="form-group clearfix">
                  <br>
                  <div class="col-sm-4 col-sm-offset-4">
                     <input type="hidden" name="userId" value="<?php echo $_SESSION['user_session']; ?>" >
                     <button type="submit" name="closing" class="btn btn-primary btn-lg" style="width:100%">Closing Submit</button>
                  </div>
               </div>
            </form>
          </div>
          <!-- End for Closing Form -->
        </div>
      </div>
    </div>
    
  </div>

  <!-- Modal -->
  <div id="ApprovalModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p> Are you sure you want to <b><span id="modalText"> </span></b></p>
        </div>
        <div class="modal-footer">
          <form method="post" role="form" action="commonFunctions.php">
            <input type="hidden" id="empId">
            <button type="submit" name="approvalAccount" class="btn btn-success btn-md" > Submit </button>
            <button type="button" class="btn btn-primary btn-md" data-dismiss="modal"> Cancel </button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php include 'footerFiles.php'; ?>
  <script src="js/jquery.js"></script>
  <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="locales/jquery-1.8.3.min.js" charset="UTF-8"></script>
  <script type="text/javascript" src="locales/bootstrap-datetimepicker.js" charset="UTF-8"></script>
  <script type="text/javascript" src="locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
  <script type="text/javascript">
        $('.form_date').datetimepicker({
                language:  'ar',
                weekStart: 1,
                todayBtn:  1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 2,
                minView: 2,
                forceParse: 0,
            });
    </script>
    <script>
      $(document).ready(function(){
        $('.approval').each(function(){
          var _this = $(this);
          _this.on('click',function(){
            var fullName = _this.parent().parent().find('.fullNameText').text();
            var empId = _this.parent().parent().find('.empId').val();
            $('#empId').val(empId);
            $('#modalText').text('Approve '+ fullName +' as Sales Trainee / Referral? ');
            $('#ApprovalModal').modal('show');
            
          });
        });

        $('.decline').each(function(){
          var _this = $(this);
          _this.on('click',function(){
            var fullName = _this.parent().parent().find('.fullNameText').text();
            var empId = _this.parent().parent().find('.empId').val();
            $('#empId').val(empId);
            $('#modalText').text('Decline '+ fullName +' Sales Trainee / Referral registration? ');
            $('#ApprovalModal').modal('show');
            
          });
        });

        // hide #back-top first
        $("#back-top").hide();
        
        // fade in #back-top
        $(function () {
          $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
              $('#back-top').fadeIn();
            } else {
              $('#back-top').fadeOut();
            }
          });

          // scroll body to 0px on click
          $('#back-top a').click(function () {
            $('body,html').animate({
              scrollTop: 0
            }, 800);
            return false;
          });
        });

      });
    </script>
     <script type="text/javascript">
      $('#errMsg').fadeOut(5000); 
    </script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>