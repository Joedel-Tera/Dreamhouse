<?php
  include '../common/class.users.php';
	session_start();
	$currentMenu = 52;
  $userGroup = 5;


  $user = new User();
  $status = 'For Activation';

  $user->isPageAccessible($_SESSION['user_type'], $userGroup);
  $alluserData = $user->getAllSalesUser($status, 4);
  $getSeminar = $user->getAllSeminarRequest('For Approval');
  $getVehicleTrip = $user->getAllVehicleTripRequest('For Approval');


?>

<!DOCTYPE html>
<html>
<head>
<?php include 'headerFiles.php'; ?>
</head>
<body>
	<?php include 'mainHeader.php'; ?>

  <div class="content">
    <?php if(isset($Message)){ ?>
        <div class="alert <?php if($MsgCode != 2){ ?> alert-success <?php } else { ?> alert-danger <?php } ?>" id="errMsg">
      &nbsp; <?php echo $Message; ?>!</div>
    <?php unset($_SESSION["Message"]); } ?>

    <h2 style="text-align:center; text-transform: uppercase;margin:0;"> Approvals </h2>

    <div class="row">
      <div class="col-md-10 col-sm-offset-1">
        <div class="encoder-container">
          <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#salesRef"> Sales Trainee / Referrals </a></li>
              <li><a data-toggle="tab" href="#seminarApproval"> Seminars </a></li>
              <li><a data-toggle="tab" href="#vehicleTripApproval"> Vehicle Trip </a></li>
          </ul>
        </div>
        <div class="tab-content">
          <div id="salesRef" class="tab-pane fade in active">
            <h2> Sales Trainee / Referrals </h2>
            <div class="transaction-table">
              <table class="table table-condensed table-hover table-striped">
                <thead>
                  <tr>
                    <th> Full Name </th>
                    <th> User Type </th>
                    <th> Email </th>
                    <th> Created Date </th>
                    <th> Status </th>
                    <th> Action </th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(count($alluserData) > 0) { ?> 
                  <?php foreach($alluserData as $userData) { ?>
                    <tr>
                      <input type="hidden" class="empId" value="<?php echo $userData['dh_user_id']; ?>">
                      <td class="fullNameText"> <?php echo $userData['dh_firstName'].' '.$userData['dh_lastName']; ?> </td>
                      <td> <?php echo $userData['dh_user_group_name']; ?> </td>
                      <td> <?php echo $userData['dh_email_address']; ?> </td>
                      <td> <?php echo $userData['dh_date_created']; ?> </td>
                      <td> <?php echo $userData['dh_status']; ?> </td>
                      <td> <button class="btn btn-sm btn-info approval"> Approve </button>  <button class="btn btn-sm btn-danger decline"> Decline </button> </td>
                    </tr>
                  <?php } ?>
                  <?php } else { ?>
                    <tr>
                      <td colspan="6" style="color:red;text-align: center;"><h2> No Pending Data To Approve / Decline </h2></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <div id="seminarApproval" class="tab-pane fade">
            <h2> Seminar Schedule Request For Approval </h2>
            <div class="transaction-table">
              <table class="table table-condensed table-hover table-striped">
                <thead>
                  <tr>
                    <th> Action </th>
                    <th> Seminar Name </th>
                    <th> Date </th>
                    <th colspan="2"> Time </th>
                    <th> Location </th>
                    <th> Date Submitted </th>
                    <th> Submitted By </th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(count($getSeminar) > 0) { ?> 
                  <?php foreach($getSeminar as $semData) { ?>
                    <tr>
                      <input type="hidden" class="seminarId" value="<?php echo $semData['dh_seminar_id']; ?>">
                      <td> <button class="btn btn-sm btn-info approveSeminar"> Approve </button>  <button class="btn btn-sm btn-danger declineSeminar"> Decline </button> </td>
                      <td> <?php echo $semData['dh_seminar_name']; ?> </td>
                      <td> <?php echo $semData['dh_seminar_date']; ?> </td>
                      <td> <?php echo $semData['dh_seminar_time_start']; ?> </td>
                      <td> <?php echo $semData['dh_seminar_time_end']; ?> </td>
                      <td> <?php echo $semData['dh_seminar_location']; ?> </td>
                      <td> <?php echo $semData['dh_date_created']; ?> </td>
                      <td class="fullName"> <?php echo $semData['dh_firstName'].' '.$semData['dh_lastName']; ?> </td>
                    </tr>
                  <?php } ?>
                  <?php } else { ?>
                    <tr>
                      <td colspan="8" style="color:red;text-align: center;"><h2> No Pending Request </h2></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <br>
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <div id="seminarCalendar"> </div>
              </div>
            </div>
          </div>
          <div style="clear:both;"></div>
          <div id="vehicleTripApproval" class="tab-pane fade">
            <h2> Vehicle Trip Schedule Request For Approval </h2>
            <div class="transaction-table">
              <table class="table table-condensed table-hover table-striped">
                <thead>
                  <tr>
                    <th> Action </th>
                    <th> Trip Date </th>
                    <th> Location PickUp </th>
                    <th> Pick Up Time </th>
                    <th> Destination </th>
                    <th> Destination Time </th>
                    <th> Date Created </th>
                    <th> Submitted By </th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(count($getVehicleTrip) > 0) { ?>
                  <?php foreach($getVehicleTrip as $tripData) { ?>
                    <tr>
                      <input type="hidden" class="tripId" value="<?php echo $tripData['dh_vehicle_trip_id']; ?>">
                      <td> <button class="btn btn-sm btn-info approveTrip"> Approve </button>  <button class="btn btn-sm btn-danger declineTrip"> Decline </button> </td>
                      <td> <?php echo $tripData['dh_trip_date']; ?> </td>
                      <td> <?php echo $tripData['dh_location_pickup']; ?> </td>
                      <td> <?php echo $tripData['dh_location_pickup_time']; ?> </td>
                      <td> <?php echo $tripData['dh_location_destination']; ?> </td>
                      <td> <?php echo $tripData['dh_location_destination_time']; ?> </td>
                      <td> <?php echo $tripData['dh_date_created']; ?> </td>
                      <td class="fullName"> <?php echo $tripData['dh_firstName'].' '.$tripData['dh_lastName']; ?> </td>
                    </tr>
                  <?php } ?>
                  <?php } else { ?>
                    <tr>
                      <td colspan="8" style="color:red;text-align: center;"><h2> No Pending Request </h2></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <br>
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <div id="vehicleCalendar"> </div>
              </div>
            </div>
          </div>
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
            <input type="hidden" id="empId" name="salesId">
            <input type="hidden" id="status" name="status">
            <button type="submit" name="approvalAccount" class="btn btn-success btn-md" > Submit </button>
            <button type="button" class="btn btn-primary btn-md" data-dismiss="modal"> Cancel </button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div id="seminarModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p> Are you sure you want to <b><span id="semmodalText"> </span></b> request seminar schedule? </p>
        </div>
        <div class="modal-footer">
          <form method="post" role="form" action="commonFunctions.php">
            <input type="hidden" id="seminarId" name="seminarId">
            <input type="hidden" id="semstatus" name="semstatus">
            <button type="submit" name="approvalSeminar" class="btn btn-success btn-md" > Submit </button>
            <button type="button" class="btn btn-primary btn-md" data-dismiss="modal"> Cancel </button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div id="tripModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p> Are you sure you want to <b><span id="tripmodalText"> </span></b></p>
        </div>
        <div class="modal-footer">
          <form method="post" role="form" action="commonFunctions.php">
            <input type="hidden" id="tripId" name="tripId">
            <input type="hidden" id="tripstatus" name="tripstatus">
            <button type="submit" name="approvalTrip" class="btn btn-success btn-md" > Submit </button>
            <button type="button" class="btn btn-primary btn-md" data-dismiss="modal"> Cancel </button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php include 'footerFiles.php'; ?>
<script src="js/jquery.js"></script>
<script>
  $(document).ready(function(){
    $('#errMsg').fadeOut(5000); 
    $('#seminarCalendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },
      height: 470,
      events: {
        url: 'getSeminarEvents.php'
      }
    });

    $('#vehicleCalendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
      },
      height: 470,
      events: {
        url: 'getVehicleEvents.php'
      }
    });
    salesApprove_decline();
    seminarApprove_decline();
    vehicleApprove_decline();

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

  function salesApprove_decline(){
    $('.approval').each(function(){
      var _this = $(this);
      _this.on('click',function(){
        var fullName = _this.parent().parent().find('.fullNameText').text();
        var empId = _this.parent().parent().find('.empId').val();
        $('#status').val('Active');
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
        $('#status').val('Declined');
        $('#modalText').text('Decline '+ fullName +' Sales Trainee / Referral registration? ');
        $('#ApprovalModal').modal('show');
        
      });
    });
  }

  function seminarApprove_decline(){
    $('.approveSeminar').each(function(){
      var _this = $(this);
      _this.on('click', function(){
        var seminarId = _this.parent().parent().find('.seminarId').val();
        var fullName = _this.parent().parent().find('.fullName').text();
        $('#semstatus').val('Approve');
        $('#seminarId').val(seminarId);
        $('#semmodalText').text(' "APPROVE" '+ fullName);
        $('#seminarModal').modal('show');
      });
    });

    $('.declineSeminar').each(function(){
      var _this = $(this);
      _this.on('click', function(){
        var seminarId = _this.parent().parent().find('.seminarId').val();
        var fullName = _this.parent().parent().find('.fullName').text();
        $('#semstatus').val('Declined');
        $('#seminarId').val(seminarId);
        $('#semmodalText').text(' "DECLINE" '+ fullName);
        $('#seminarModal').modal('show');
      });
    });
  }

  function vehicleApprove_decline(){
    $('.approveTrip').each(function(){
      var _this = $(this);
      _this.on('click', function(){
        var tripId = _this.parent().parent().find('.tripId').val();
        var fullName = _this.parent().parent().find('.fullName').text();
        $('#tripstatus').val('Approve');
        $('#tripId').val(tripId);
        $('#tripmodalText').text(' "APPROVE" '+ fullName);
        $('#tripModal').modal('show');
      });
    });

    $('.declineTrip').each(function(){
      var _this = $(this);
      _this.on('click', function(){
        var tripId = _this.parent().parent().find('.tripId').val();
        var fullName = _this.parent().parent().find('.fullName').text();
        $('#tripstatus').val('Declined');
        $('#tripId').val(tripId);
        $('#tripmodalText').text(' "DECLINE" '+ fullName);
        $('#tripModal').modal('show');
      });
    });    
  }

</script>

<!-- Bootstrap Core JavaScript -->
<script src='js/moment.min.js'></script>
<script src='js/jquery.min.js'></script>

<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"></script>
<script src='js/fullcalendar.min.js'></script>

</body>

</html>