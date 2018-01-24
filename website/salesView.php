<?php
	include '../common/class.users.php';
		session_start();
		$currentMenu = 42;
		$userGroup = 4;

	$user = new User();

	$user->isPageAccessible($_SESSION['user_type'], $userGroup);
	$mySales = $user->getMyClosingSales($_SESSION['user_session']);

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

		<br>
		<div class="row">
			<div class="col-md-10 col-sm-offset-1">
				<div class="encoder-container">
					<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#mySales"> My Closing Sales </a></li>
							<li><a data-toggle="tab" href="#myCalendar"> Calendar </a></li>
					</ul>
				</div>
				<div class="tab-content">
					<!-- Start For Closing Sales -->
					<div id="mySales" class="tab-pane fade in active" style="padding:25px;">
						<h2> My Closing Sales </h2>
							<hr>
							<table class="table table-condensed table-hover table-striped" id="myClosingSales">
							<thead>
								<tr>
									<th> Full Name </th>
									<th> Phone No </th>
									<th> Subdivision </th>
									<th> Location </th>
									<th> Developer </th>
									<th> Reservation Fee </th>
									<th> Closing Date </th>
								</tr>
							</thead>
							<tbody>
									<?php if(count($mySales) > 0) { ?> 
									<?php foreach ($mySales as $saleData) { ?>
										<tr>
												<td> <?php echo $saleData['dh_firstName'].' '.$saleData['dh_familyName']; ?> </td>
												<td> <?php echo $saleData['dh_phoneNo']; ?> </td>
												<td> <?php echo $saleData['dh_subdivision']; ?> </td>
												<td> <?php echo $saleData['dh_location']; ?> </td>
												<td> <?php echo $saleData['dh_developer']; ?> </td>
												<td> <?php echo $saleData['dh_reservationFee']; ?> </td>
												<td> <?php echo $saleData['dh_closingDate']; ?> </td>
										</tr>
									<?php } ?>
									<?php } else { ?>
										<tr> 
											<td colspan="7" style="text-align: center; color:red;"> 
												<h2> No Closing Sales </h2>
											</td>
										</tr>
									<?php } ?>
							</tbody>
						</table> 	
					</div>
					<!-- End for Closing Sales -->

					<!-- Start For Calendar Viewing -->
					<div id="myCalendar" class="tab-pane fade" style="padding:20px;text-align: center;">
						<div class="row">
							<div class="col-md-6">
								<h2> Seminar Calendar </h2>
								<hr>
								<div id="seminarCalendar"> </div>
							</div>
							<div class="col-md-6">
								<h2> Vehicle Trips Calendar </h2>
								<hr>
								<div id="vehicleCalendar"> </div>
							</div>
						</div>														
					</div>
					<!-- End for Calendar Viewing -->

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
	$('#errMsg').fadeOut(5000); 

	$('#seminarCalendar').fullCalendar({
	  header: {
	    left: 'prev,next ',
	    center: 'title',
	    right: 'month,agendaWeek,listWeek'
	  },
	  height: 470,
	  navLinks: true,
	  events: {
	    url: 'getSeminarEvents.php'
	  }
	});

	$('#vehicleCalendar').fullCalendar({
	  header: {
	    left: 'prev,next ',
	    center: 'title',
	    right: 'month,agendaWeek,listWeek'
	  },
	  height: 470,
	  navLinks: true,
	  events: {
	    url: 'getVehicleEvents.php'
	  }
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
<script src='js/moment.min.js'></script>
<script src='js/jquery.min.js'></script>

<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"></script>
<script src='js/fullcalendar.min.js'></script>
</body>

</html>