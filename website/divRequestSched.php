<?php
  include '../common/class.users.php';
	session_start();
	$currentMenu = 23;
	$userGroup = 2;


  $user = new User();

  $user->isPageAccessible($_SESSION['user_type'], $userGroup);
  $mySeminarRequest = $user->getMySeminarRequest($_SESSION['user_session']);
  $myVehicleTripRequest = $user->getMyVehicleTripRequest($_SESSION['user_session']);

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

	<h2 style="text-align:center; text-transform: uppercase;margin:0;"> Create New Request </h2>
	<br>
	<div class="row">
	  <div class="col-md-10 col-sm-offset-1">
		<div class="encoder-container">
		  <ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#seminar"> Request Seminar Schedule </a></li>
			  <li><a data-toggle="tab" href="#vehicleTrip"> Request Vehicle Trip Schedule </a></li>
			  <li><a data-toggle="tab" href="#listRequest"> View Submitted Requests </a></li>
		  </ul>
		</div>
		<div class="tab-content">
		  <!-- Start For Seminar Schedule -->
		  <div id="seminar" class="tab-pane fade in active" style="padding:25px">
			<h2> Request New Seminar Schedule </h2>
			  <hr>
				<form method="post" action="commonFunctions.php">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-5 col-sm-offset-1">
								<label> Seminar Name </label>
								<input type="text" required class="form-control" name="seminarName"  placeholder="Enter Seminar Title/Name">
							</div>
							<div class="col-sm-5">
								<label> Seminar Date </label>
								<div class="input-group date form_date col-sm-12" data-date="" data-date-format="MM dd yyyy" data-link-field="dtp_input2" data-link-format="mm-dd-yyyy">
									<input class="form-control" size="5" name="seminarDate" type="text" value="" readonly>
									<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
									<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
								</div>
							<input type="hidden" id="dtp_input2" name="seminarDate" value="" /><br/>
							</div>
						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-5 col-sm-offset-1">
								<label style="display:block;"> Seminar Time </label>
								<div class="input-group" style="width: 49%;float: left;margin-right:5px;">
								<input type="text" required class="form-control" name="seminarTimeStart"  placeholder="Start Time" style="display: inline-block;position: relative;"><span class="input-group-addon"> AM </span>
								</div>
								<div class="input-group" style="width: 49%;float: left;">
								<input type="text" required class="form-control" name="seminarTimeEnd"  placeholder="End Time" style="display: inline-block;position: relative;"><span class="input-group-addon"> PM </span>
								</div>
							</div>
							<div class="col-sm-5">
								<label> Seminar Location </label>
								<input type="text" required class="form-control" name="seminarLocation"  placeholder="Enter Location">
							</div>
						</div>
					</div>
					<br>
					<div style="clear:both;"></div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3 col-sm-offset-5">
		                        <div class="form-group clearfix">
		                        	<input type="hidden" name="userId" value="<?php echo $_SESSION['user_session']; ?>">
		                            <button type="submit" name="requestNewSeminar" class="btn btn-primary btn-lg" > Submit Request </button>
		                        </div>
		                    </div>
						</div>
					</div>
				</form>    
		  </div>
		  <!-- End For Seminar Schedule -->

		  <!-- Start For Vehicle Trip Schedule -->
		  <div id="vehicleTrip" class="tab-pane fade" style="padding:25px;">
			<h2> Request New Vehicle Trip Schedule </h2>
			  <hr>
				<form method="post" action="commonFunctions.php">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-5 col-sm-offset-1">
								<label> Trip Date </label>
								<div class="input-group date form_date col-sm-12" data-date="" data-date-format="MM dd yyyy" data-link-field="tripDate" data-link-format="mm-dd-yyyy">
									<input class="form-control" size="5" name="tripDate" type="text" value="" readonly>
									<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
									<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
								</div>
							<input type="hidden" id="tripDate" name="tripDate" value="" /><br/>
							</div>
						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-5 col-sm-offset-1">
								<label> Location Pick Up </label>
								<input type="text" required class="form-control" name="locationPickUp"  placeholder="Enter Location">
							</div>
							<div class="col-sm-5">
								<label style="display:block;"> Pick Up Time </label>
								<input type="text" required class="form-control" name="locationPickUpTime"  placeholder="00:00 AM/PM ~ 00:00 AM/PM">
							</div>
						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-5 col-sm-offset-1">
								<label> Location Destination </label>
								<input type="text" required class="form-control" name="locationDestination"  placeholder="Enter Destination">
							</div>
							<div class="col-sm-5">
								<label style="display:block;"> Destination Time </label>
								<input type="text" required class="form-control" name="locationDestinationTime"  placeholder="00:00 AM/PM ~ 00:00 AM/PM">
							</div>
						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-4 col-sm-offset-1">
								<label> Driver Name </label>
								<input type="text" required class="form-control" name="driverName"  placeholder="Enter Driver Name">
							</div>
							<div class="col-sm-3">
								<label style="display:block;"> Plate No.# </label>
								<input type="text" required class="form-control" name="plateNo"  >
							</div>
							<div class="col-sm-3">
								<label style="display:block;"> Contact No.# </label>
								<input type="text" required class="form-control" name="contactNo" >
							</div>
						</div>
					</div>
					<br>
					<div style="clear:both;"></div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3 col-sm-offset-5">
		                        <div class="form-group clearfix">
		                        	<input type="hidden" name="userId" value="<?php echo $_SESSION['user_session']; ?>">
		                            <button type="submit" name="requestNewTrip" class="btn btn-primary btn-lg" > Submit Request </button>
		                        </div>
		                    </div>
						</div>
					</div>
				</form> 
		  </div>
		  <!-- End for Vehicle Trip Schedule -->

		  <div id="listRequest" class="tab-pane fade" style="padding:25px;">
		  	 <h2> View Submitted Requests </h2>
		  	 <div class="row">
		  	 	<div class="col-md-5">
		  	 		<h3> Seminar </h3>
		  	 		<table class="table table-condensed table-hover table-striped">
						<thead>
							<tr>
								<th> Seminar Name </th>
								<th> Date Submitted </th>
								<th> Status </th>
							</tr>
						</thead>
						<tbody>
							<?php if(count($mySeminarRequest) > 0) { ?> 
								<?php foreach($mySeminarRequest as $semData) { ?>
									<tr>
										<td style="vertical-align: middle;" class="fullNameText"> <?php echo $semData['dh_seminar_name']; ?> </td>
										<td style="vertical-align: middle;" > <?php echo $semData['dh_date_created']; ?> </td>
										<td style="vertical-align: middle;"> <?php echo $semData['dh_seminar_status']; ?> </td>
									</tr>
								<?php } ?>
							<?php } else { ?>
								<tr> 
									<td colspan="3" style="text-align: center; color:red;"> 
										<h2> No Seminar Schedule Request </h2>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>	
		  	 	</div>
		  	 	<div class="col-md-7">
		  	 		<h3> Vehicle Trips </h3>
		  	 		<table class="table table-condensed table-hover table-striped">
						<thead>
							<tr>
								<th> Trip Date </th>
								<th> Location </th>
								<th> Destination </th>
								<th> Date Submitted </th>
								<th> Status </th>
							</tr>
						</thead>
						<tbody>
							<?php if(count($myVehicleTripRequest) > 0) { ?> 
								<?php foreach($myVehicleTripRequest as $tripData) { ?>
									<tr>
										<td style="vertical-align: middle;" class="fullNameText"> <?php echo $tripData['dh_trip_date']; ?> </td>
										<td style="vertical-align: middle;" > <?php echo $tripData['dh_location_pickup']; ?> </td>
										<td style="vertical-align: middle;"> <?php echo $tripData['dh_location_destination']; ?> </td>
										<td style="vertical-align: middle;" > <?php echo $tripData['dh_date_created']; ?> </td>
										<td style="vertical-align: middle;" > <?php echo $tripData['dh_trip_status']; ?> </td>
									</tr>
								<?php } ?>
							<?php } else { ?>
								<tr> 
									<td colspan="5" style="text-align: center; color:red;"> 
										<h2> No Vehicle Trip Schedule Request </h2>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
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