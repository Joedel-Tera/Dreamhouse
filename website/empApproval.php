<?php
  include '../common/class.users.php';
	session_start();
	$currentMenu = 52;
  $userGroup = 5;


  $user = new User();
  $status = 'For Activation';

  $user->isPageAccessible($_SESSION['user_type'], $userGroup);
  $alluserData = $user->getAllSalesUser($status, 4);
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
              <li><a data-toggle="tab" href="#seminars"> Seminars </a></li>
              <li><a data-toggle="tab" href="#calendar"> Calendar </a></li>
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
                </tbody>
              </table>
            </div>
          </div>
          <div id="seminars" class="tab-pane fade">
            <h2>Pending Transaction</h2>
            <div class="transaction-table">
              <table class="table table-condensed table-hover table-striped">
                <thead>
                  <tr>
                    <th> Email </th>
                    <th> Status </th>
                    <th> Reference Number </th>
                    <th> Commands </th>
                  </tr>
                </thead>
                <tbody>
                  
                </tbody>
              </table>
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

  <?php include 'footerFiles.php'; ?>
  <script src="js/jquery.js"></script>
    <script>
      $(document).ready(function(){
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