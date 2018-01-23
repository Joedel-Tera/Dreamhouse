<?php
	session_start();
	$currentMenu = 1;

?>

<!DOCTYPE html>
<html>
<head>
<?php include 'headerFiles.php'; ?>
</head>
<body>
	<?php include 'mainHeader.php'; ?>

  <div class="content" style="padding:0px">
    <?php if(isset($Message)){ ?>
        <div class="alert <?php if($MsgCode != 2){ ?> alert-success <?php } else { ?> alert-danger <?php } ?>" id="errMsg">
      &nbsp; <?php echo $Message; ?>!</div>
    <?php unset($_SESSION["Message"]); } ?>
  </div>
<?php include 'fullwidthSlider.php'; ?>

  <div class="container">
      <div class="row">
          <div class="mid-grid">
                <h1 style="font-size:50px;color:#197319;"> Dream House Realty </h1>
                <hr style="border-color:#000;">
                <p style="padding: 50px;font-size: 18px;"> " At Dream House Realty, we are focused on providing  honest services with the highest levels of customer satisfaction we will do everything we can to meet your expectations. With a variety of offerings to choose from, we are sure you will be happy working with us. Look around our website and if you have any comments or questions, please feel free to contact us. We hope to see you again! Check back later for new updates to our website. There is much more to come! "
                </p>
          </div>
          <div class="mid-grid">
                  <br>
                  <h1 style="font-size:46px;color:#197319;"> Affiliated Developers </h1>
                  <hr style="border-color:#000;">
                  <br>
                  <div class="col-md-3">
                    <img src="logo/Antel.png" style="width:100%" />
                  </div>

                  <div class="col-md-3">
                    <img src="logo/Bellefort.png" style="width:100%" />
                  </div>

                  <div class="col-md-3">
                    <img src="logo/Lancaster.png" style="width:100%" />
                  </div>

                  <div class="col-md-3">
                    <img src="logo/Profriends2.png" style="width:100%" />
                  </div>
          </div>
      </div>
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