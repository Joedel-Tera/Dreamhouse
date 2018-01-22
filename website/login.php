<?php
  session_start();
  $currentMenu = 9;
  if(isset($_SESSION['user_type']) != ""){
    header("Location: index.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
<?php include 'headerFiles.php'; ?>
</head>
<body>
  <?php include 'mainHeader.php'; ?>

<div class="contents">
  <section id="loginform" class="outer-wrapper">
    <div class="inner-wrapper">
      <div class="container">
        <div class="row">
          <?php if(isset($Message)){ ?>
            <div class="alert <?php if($MsgCode != 2){ ?> alert-success <?php } else { ?> alert-danger <?php } ?>" id="errMsg">
          &nbsp; <?php echo $Message; ?>!</div>
          <?php unset($_SESSION["Message"]); } ?>
          <div class="col-sm-4 col-sm-offset-4">
            <h2 class="text-center">Employee Login Page</h2>
            <form method="post" role="form" action="commonFunctions.php">
              <div class="form-group">
                <label>Employee Username</label>
                <input type="text" required class="form-control" name="employeeuser"
                minlength="8" placeholder="Your Username...">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" required class="form-control" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="password" placeholder="Your Password...">
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox"> Remember me
                </label>
                <label style="float:right;">
                  <a href="register.php"> Register Here! </a>
                </label>
              </div>
              <button type="submit" name="login" class="btn btn-primary">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
    <!--End-content-->


  <?php include 'footerFiles.php'; ?>
  <script src="js/jquery.js"></script>
    <script type="text/javascript">
      $('#errMsg').fadeOut(5000); 
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

      });
    </script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>