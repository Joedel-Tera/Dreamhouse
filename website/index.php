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

  <div class="content">
    <?php if(isset($Message)){ ?>
        <div class="alert <?php if($MsgCode != 2){ ?> alert-success <?php } else { ?> alert-danger <?php } ?>" id="errMsg">
      &nbsp; <?php echo $Message; ?>!</div>
    <?php unset($_SESSION["Message"]); } ?>

    <div class="slider" style="height:600px;">
        <div class="container">
          <div id="about-slider">
            <div id="carousel-slider" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
              <ol class="carousel-indicators visible-xs">
                <li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-slider" data-slide-to="1"></li>
                <li data-target="#carousel-slider" data-slide-to="2"></li>
                <li data-target="#carousel-slider" data-slide-to="3"></li>
                <li data-target="#carousel-slider" data-slide-to="4"></li>
                <li data-target="#carousel-slider" data-slide-to="5"></li>
              </ol>

            <div class="carousel-inner">
              <div class="item active">
                <img src="img/cams.jpg" class="img-responsive" alt=""> 
              </div>
              <div class="item">
                <img src="img/antel-grand.jpg" class="img-responsive" alt=""> 
              </div> 
              <div class="item">
                <img src="img/lan1.jpg" class="img-responsive" alt=""> 
              </div>
              <div class="item">
                <img src="img/cam1.jpg" class="img-responsive" alt=""> 
              </div>
              <div class="item">
                <img src="img/agv5.jpg" class="img-responsive" alt=""> 
              </div>
              <div class="item">
                <img src="img/agv1.jpg" class="img-responsive" alt=""> 
              </div> 
            </div>
          
              <a class="left carousel-control hidden-xs" href="#carousel-slider" data-slide="prev">
                <i class="glyphicon glyphicon-chevron-left"></i> 
              </a>
          
              <a class=" right carousel-control hidden-xs"href="#carousel-slider" data-slide="next">
                <i class="glyphicon glyphicon-chevron-right"></i> 
              </a>
           </div> <!--/#carousel-slider-->
          </div><!--/#about-slider-->
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