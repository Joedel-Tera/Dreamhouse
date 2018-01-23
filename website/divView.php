<?php
	include '../common/class.users.php';
		session_start();
		$currentMenu = 22;
		$userGroup = 2;
		$division = $_SESSION['user_division'];

	$user = new User();

	$user->isPageAccessible($_SESSION['user_type'], $userGroup);
	$myDownlines = $user->getDownlinesPerDivision($division, $_SESSION['user_session']);
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
							<li class="active"><a data-toggle="tab" href="#myDownlines"> Downlines </a></li>
							<li><a data-toggle="tab" href="#mySales"> Closing Sales </a></li>
							<li><a data-toggle="tab" href="#myCalendar"> Calendar </a></li>
					</ul>
				</div>
				<div class="tab-content">
					<!-- Start For Seminar Schedule -->
					<div id="myDownlines" class="tab-pane fade in active" style="padding:25px">
						<h2> My Current Downlines </h2>
						<hr>
							<table class="table table-condensed table-hover table-striped">
								<thead>
									<tr>
										<th> Action </th>
										<th> Full Name </th>
										<th> User Type </th>
										<th> Email </th>
										<th> Created Date </th>
										<th> Status </th>
										
									</tr>
								</thead>
								<tbody>
									<?php if(count($myDownlines) > 0) { ?> 
										<?php foreach($myDownlines as $userData) { ?>
											<tr>
												<td style="vertical-align: middle;"><button class="btn btn-sm btn-primary viewClosing"> View Closing Sales </button> </td>
												<input type="hidden" class="empId" value="<?php echo $userData['dh_user_id']; ?>">
												<td style="vertical-align: middle;" class="fullNameText"> <?php echo $userData['dh_firstName'].' '.$userData['dh_lastName']; ?> </td>
												<td style="vertical-align: middle;" > <?php echo $userData['dh_user_group_name']; ?> </td>
												<td style="vertical-align: middle;"> <?php echo $userData['dh_email_address']; ?> </td>
												<td style="vertical-align: middle;" > <?php echo $userData['dh_date_created']; ?> </td>
												<td style="vertical-align: middle;" > <?php echo $userData['dh_status']; ?> </td>
											</tr>
										<?php } ?>
									<?php } else { ?>
										<tr> 
											<td colspan="6" style="text-align: center; color:red;"> 
												<h2> No Downlines </h2>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>    
					</div>
					<!-- End For Seminar Schedule -->

					<!-- Start For Vehicle Trip Schedule -->
					<div id="mySales" class="tab-pane fade" style="padding:25px;">
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
					<!-- End for Vehicle Trip Schedule -->

					<!-- Start For Vehicle Trip Schedule -->
					<div id="myCalendar" class="tab-pane fade" style="padding:25px;">
						<h2> My Calendar </h2>
							<hr>
								
					</div>
					<!-- End for Vehicle Trip Schedule -->

				</div>
			</div>
		</div>
		
	</div>

	<!-- Modal -->
	<div id="closingSales" class="modal fade" role="dialog">
		<div class="modal-dialog" style="width:65%;top:15%;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
						<table class="table table-condensed table-hover table-striped" id="closingSalesTable">
							<thead>
								<tr>
									<th> Full Name </th>
									<th> Phone No </th>
									<th> Subdivision </th>
									<th> Location </th>
									<th> Developer </th>
									<th> Reservation Fee </th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table> 
				</div>
				<div class="modal-footer">
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div id="closingSalesEmpty" class="modal fade" role="dialog">
		<div class="modal-dialog" style="top:15%;">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
						<table class="table table-condensed table-hover table-striped">
							<thead>
								<tr>
									<th> Full Name </th>
									<th> Phone No </th>
									<th> Subdivision </th>
									<th> Location </th>
									<th> Developer </th>
									<th> Reservation Fee </th>
								</tr>
							</thead>
							<tbody>
									<tr>
											<td colspan="6" style="text-align:center;">
												<h2 style="color:red;"> No Closing Sales </h2>
											</td>
									</tr>
							</tbody>
						</table> 
				</div>
				<div class="modal-footer">
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
				$('.viewClosing').each(function(){
					var _this = $(this);
					_this.on('click',function(){
						var empId = _this.parent().parent().find('.empId').val();
						console.log(empId);
							$.ajax({
	                type: 'POST',
	                url: '../website/commonFunctions.php',
	                data: {
	                    'getClosing': empId
	                },
	                dataType: 'json',
	                success: function(data){
	                    
	                    if(data.length > 0){
	                    		$('#closingSalesTable tbody tr').remove();
	                    		for (var i = 0; i <= data.length - 1; i++) {
	                    			$('#closingSalesTable tbody').append("<tr><td>"+ data[i].dh_firstName +' '+ data[i].dh_familyName + "</td><td>"+ data[i].dh_phoneNo + "</td><td>" + data[i].dh_subdivision + "</td><td>" + data[i].dh_location + "</td><td>" + data[i].dh_developer + "</td><td>" + data[i].dh_reservationFee + "</td></tr>");
	                    		}
	                    		$('#closingSales').modal('show');
	                    } else {
	                    		$('#closingSalesEmpty').modal('show');
	                    }
	                }
	            });
						
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