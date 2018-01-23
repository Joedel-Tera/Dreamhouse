<?php
	session_start();
	$currentMenu = 2;
?>

<!DOCTYPE html>
<html>
<head>
<?php include 'headerFiles.php'; ?>
<style type="text/css">
  li {
    display:inline;
  }
  li img {
    width: 190px;
    padding: 10px;
    margin: 0px 15px;
  }
</style>
</head>
<body>
	<?php include 'mainHeader.php'; ?>

  <div class="container">
      <div class="row">
          <div class="mid-grid">
                <h1 style="font-size:50px;color:#197319;"> Dream House Realty </h1>
                <hr style="border-color:#000;">
                <p style="padding: 50px;font-size: 18px;"> " At Dream House Realty, we are focused on providing  honest services with the highest levels of customer satisfaction we will do everything we can to meet your expectations. With a variety of offerings to choose from, we are sure you will be happy working with us. Look around our website and if you have any comments or questions, please feel free to contact us. We hope to see you again! Check back later for new updates to our website. There is much more to come! "
                </p>
                <hr style="border-color:#000;">
          </div>
          <br><br>
          <div class="mid-grid">
              <h1 style="font-size:35px;color:#197319;"> Company Profile </h1>
              
              <div class="col-md-10 col-md-offset-1" style="font-size:18px">
                  <h3> Mission and Vision </h3>
                  <p>To become the country's leading Real Estate Company not in sheer size but in ways more meaningful - quality projects, quality business plans, growth, returns and innovation. And in doing so, contribute to the economic and social progress. To uphold the value of the family and raise the quality of life of people and let their needs be our guide in our land development, thrusts and activities.  </p>
              </div>

              <div class="col-md-10 col-md-offset-1" style="font-size:18px">
                  <h3> Business Opportunity In Real Estate </h3>
                  <div class="content">
                    <li><a href="img/bo1.png"><img src="img/bo1.png" alt=""></a></li>
                    <li><a href="img/bo2.jpg"><img src="img/bo2.jpg" alt=""></a></li>
                    <li><a href="img/bo3.jpg"><img src="img/bo3.jpg" alt=""></a></li>
                    <li><a href="img/bo4.jpg"><img src="img/bo4.jpg" alt=""></a></li>
                    <li><a href="img/bo5.jpg"><img src="img/bo5.jpg" alt=""></a></li>
                    <li><a href="img/bo6.jpg"><img src="img/bo6.jpg" alt=""></a></li>
                    <li><a href="img/bo7.jpg"><img src="img/bo7.jpg" alt=""></a></li>
                    <li><a href="img/bo8.jpg"><img src="img/bo8.jpg" alt=""></a></li>
                    <li><a href="img/bo9.jpg"><img src="img/bo9.jpg" alt=""></a></li>
                    <li><a href="img/bo10.jpg"><img src="img/bo10.jpg" alt=""></a></li>
                    <li><a href="img/bo11.jpg"><img src="img/bo11.jpg" alt=""></a></li>
                    <li><a href="img/bo12.jpg"><img src="img/bo12.jpg" alt=""></a></li>
                  </div>
              </div>

              <div class="col-md-10 col-md-offset-1" style="font-size:18px">
                  <h3> Development Foresight </h3>
                  <p> A development that is designed around and is tempered by human and natural elements. Committed to the protection and management of the environment. Constantly conscious of our responsibility to care for the Earth and to help shape a living and working environment in which Filipinos live in harmony with nature. Strategically developing properties that will spur progress as well as add value to the communities in which they are located.  </p>
              </div>
            
          </div>
          <div style="clear: both;"></div>
          <br><br>
          <div class="mid-grid">
              <h1 style="font-size:35px;color:#197319;"> Who we Are ? </h1>
              <p style="font-size:18px;padding:20px;"> At Dream House Realty, we are focused on providing  honest services with the highest levels of customer satisfaction – we will do everything we can to meet your expectations. <br><br>

              With a variety of offerings to choose from, we’re sure you’ll be happy working with us. Look around our website and if you have any comments or questions, please feel free to contact us. We hope to see you again! Check back later for new updates to our website. There’s much more to come! </p>
                <div class="col-md-5 col-md-offset-4" style="text-align: center;">
                  <img src="logo/CEO.jpg" style="width:55%;display:block;margin: 0px 25%;">
                  <br>
                  <label style="display:block;"> MR. RODELIO D. PARAFINA, CPA </label>
                  <span> Licensed Real Estate Broker - PRC Lic. # 01039 </span>
                  <p> Certified Public Accountant (CPA) - PRC Lic. # 03525 </p>
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