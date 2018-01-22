<?php
   include '../common/class.users.php';
	session_start();
	$currentMenu = 33;
  $userGroup = 3;

  $user = new User();
  $user->isPageAccessible($_SESSION['user_type'], $userGroup);
?>

<!DOCTYPE html>
<html>
<head>
<?php include 'headerFiles.php'; ?>
</head>
<body>
	<?php include 'mainHeader.php'; ?>

  <div class="content" style="padding-top:0px">
    <?php if(isset($Message)){ ?>
        <div class="alert <?php if($MsgCode != 2){ ?> alert-success <?php } else { ?> alert-danger <?php } ?>" id="errMsg">
      &nbsp; <?php echo $Message; ?>!</div>
    <?php unset($_SESSION["Message"]); } ?>

    <div class="col-md-5">
      <h2> Select Employee </h2>
      <div class="table-responsive" style="margin-top:15px;">
        <table class="table table-striped table-bordered table-hover table-centered" id="EditUsers">
          <thead>
             <tr>
                <th> Emp No. </th>
                <th> Employee Type </th>
                <th> Name </th>
                <th> Date Hired </th>
                <th> Actions </th>
             </tr>
          </thead>
        </table>
      </div>
    </div>
    <div class="col-md-7" style="height:550px;overflow-x:hidden;">
      <h2> Employee Details </h2>
       <form method="post" action="commonFunctions.php" style="text-align: center;">
          <div class="form-group">
            <div class="row">
                <div class="col-sm-4">
                    <label>First Name</label>
                    <input type="text" required class="form-control" name="firstName" pattern="[a-zA-Z][a-zA-Z ]{2,}" title="Must contain characters only and atleast 2 letters" placeholder="Enter your First Name">
                </div>
                <div class="col-sm-4">
                    <label>Middle Name</label>
                    <input type="text" class="form-control" name="middleName" pattern="[a-zA-Z][a-zA-Z ]{,2}" title="Must contain characters only" placeholder="Middle Name">
                </div>
                <div class="col-sm-4">
                    <label>Last Name</label>
                    <input type="text" required class="form-control" name="lastName" pattern="[a-zA-Z][a-zA-Z ]{2,}" title="Must contain characters only and atleast 2 letters" placeholder="Enter your Last Name">
                </div>
                
            </div>
          </div>
          <div class="form-group">
                  <div class="row">
                      <div class="col-sm-3">
                        <label> Name of Spouse </label>
                        <input type="text" class="form-control" name="spouseName" pattern="[a-zA-Z][a-zA-Z ]{3,}" title="Must contain characters only and atleast 3 letters" placeholder="If Married">
                    </div>
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
                  </div>
          </div>
          <div class="form-group">
            <div class="row">
                <div class="col-sm-3" style="text-align: center;">
                    <label>Gender</label>
                    <div class="row" style="margin-top:5px;">
                        <input type="radio" name="gender" id="1" required value="Male"  />
                        <span class="radiotext">Male</span>

                        <input type="radio" name="gender" value="Female" />
                        <span class="radiotext">Female</span>
                    </div>
                </div>
                <div class="col-sm-3">
                    <label> TIN </label>
                    <input type="text" class="form-control" name="tinNumber"  pattern="[0-9]{5,9}" title="please input required numbers" placeholder="Enter your Tin">
                </div>
                <div class="col-sm-3">
                    <label>Email Address</label>
                    <input type="email" required class="form-control" name="emailAddress" placeholder="Email Address">
                </div>
                <div class="col-sm-3">
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
          <br>
          <div class="form-group">
              <div class="row">
                  <h3><strong>EDUCATIONAL QUALIFICATION</strong></h3>
                  <div class="col-md-3">
                      <label>College </label>
                      <input type="text" class="form-control" name="educSchool[]" pattern="[a-zA-Z][a-zA-Z ]{5,}" placeholder="School Name">
                  </div>
                  <div class="col-md-3">
                      <label>Location</label>
                      <input type="text" class="form-control" name="educLocation[]" placeholder="Location of your School">
                  </div>
                  <div class="col-md-2">
                      <label>Attainment</label>
                      <input type="text" class="form-control" name="educAttainment[]" placeholder="Course/Graduate/Undergraduate">
                  </div>
                  <div class="col-md-2">
                      <label>From:</label>
                      <input type="text" class="form-control" name="educYearFrom[]" maxlength="4" pattern="[0-9]{4,4}" title="Must contain a numbers only" placeholder="From">
                  </div>
                  <div class="col-md-2">
                      <label>To:</label>
                      <input type="text" class="form-control" name="educYearTo[]" title="Must contain a numbers only" pattern="[0-9]{4,4}" maxlength="4" placeholder="To">
                  </div>
              </div>
          </div>
       </form>
    </div>

  </div>
  <div style="clear:both">
  </div>

  <?php include 'footerFiles.php'; ?>
  <script src="js/jquery.js"></script>
    <script>
      $(document).ready(function(){

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