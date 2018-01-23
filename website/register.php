<?php
  include '../common/class.users.php';
  session_start();
  $currentMenu = 9;

  if(isset($_SESSION['user_type']) != ""){
    Header("Location: index.php");
  }
  $user = new User();
  $allSalesDirector = $user->getAllActiveSalesDirector();
  $allDivisionManager = $user->getAllActiveDivisionManager();
  $recruitedByUser = $user->getAllSalesAndDiv();
?>

<!DOCTYPE html>
<html>
<head>
<?php include 'headerFiles.php'; ?>
<link href="locales/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
</head>
<body>
  <?php include 'mainHeader.php'; ?>

<div class="contents">
    <div style="clear:both"></div>
        <br>
        <h2 style="text-align:center;">Application for Accreditation</h2>

        <div class="container">
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

            <br>
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
                            <select name="recruitedBy" id="recruitedBy" class="form-control">
                                <option value=""> Choose Recruiter </option> 
                                <?php foreach($recruitedByUser as $rUserData) { ?>
                                <option value="<?php echo $rUserData['dh_user_id']; ?>" >  <?php echo $rUserData['dh_firstName'].' '.$rUserData['dh_lastName']; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <label>Position</label>
                            <input type="text" readonly id="recuitedByPosition" class="form-control">
                            <input type="hidden" name="recruitedByPos" id="recruitedByPos">
                        </div>

                        <div class="col-sm-2">
                            <label>Division</label>
                            <input type="text" readonly id="recuitedByDivision" class="form-control">
                            <input type="hidden" name="recruitedByDiv" id="recruitedByDiv">
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
                            <label>Sales Director</label>
                            <select name="salesDirector" class="form-control">
                              <option value=''> Select Sales Director </option>
                              <?php foreach($allSalesDirector as $saleDirData) { ?>
                                <option value="<?php echo $saleDirData['dh_user_id']; ?>" >  <?php echo $saleDirData['dh_firstName'].' '.$saleDirData['dh_lastName']; ?> </option>
                              <?php } ?>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>Division Manager</label>
                            <select name="divManager" class="form-control">
                              <option value=''> Select Division Manager </option>
                              <?php foreach($allDivisionManager as $allDivManager) { ?>
                                <option value="<?php echo $allDivManager['dh_user_id']; ?>" >  <?php echo $allDivManager['dh_firstName'].' '.$allDivManager['dh_lastName']; ?> </option>
                              <?php } ?>
                            </select>
                        </div>

                        <div class="col-sm-2">
                            <label>Executive Broker</label>
                            <label style="display:block;vertical-align: middle;position: relative;margin-top: 5px;"> RODELIO D. PARAFINA </label>
                        </div>
                    </div>
                </div>

            <br>
                    
                <div class="col-sm-3 col-sm-offset-5">
                    <div class="form-group clearfix">
                        <button type="submit" name="newSalesAgent" class="btn btn-primary btn-lg" >Register</button>
                    </div>
                </div>
            </form>
        </div>
        
        <div class="clear:both">
        </div>
        <br>
 </div>
    <!--End-content-->


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

        $('.form_datess').datetimepicker({
                language:  'ar',
                weekStart: 1,
                todayBtn:  1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 2,
                minView: 2,
                forceParse: 0
            });
    </script>
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

          $('#recruitedBy').on('change',function(){
            var _this = $(this).val();
            $.ajax({
                type: 'POST',
                url: '../website/commonFunctions.php',
                data: {
                    'id': _this
                },
                dataType: 'json',
                success: function(data){
                    $('#recruitedByPos').val(data.dh_user_group_id);
                    $('#recuitedByPosition').val(data.dh_user_group_name);

                    $('#recruitedByDiv').val(data.dh_division_id);
                    $('#recuitedByDivision').val(data.dh_division_name);
                }
            });
          });

        });
    </script>
    <!-- Bootstrap Core JavaScript -->
    <script>
        var password = document.getElementById("password")
        , confirm_password = document.getElementById("confirm_password");

        function validatePassword(){
        if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords don't match");
        } else {
        confirm_password.setCustomValidity('');
        }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
</body>

</html>
