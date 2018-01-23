<?php 
$getCurrentMenu = $currentMenu;

  if(isset($_SESSION['Message'])){
    $Message = $_SESSION['Message'];
    if(isset($_SESSION['MsgCode'])) {
      $MsgCode = $_SESSION['MsgCode'];
    } else {
      $MsgCode = 0;
    }
  }

  if(isset($_SESSION['user_type']) != ""){
    $userSession = $_SESSION['user_session'];
    $userType = $_SESSION['user_type'];
    $userName = $_SESSION['user_fullName'];
  } else {
    $userType = '';
    $userSession = '';
    $userName = '';
  }
?> 
<div class="wrap">
    <div class="top-head-grids">
      <img src="img/logodhrs1.jpg" />
    </div>
      <div class="top-head-grid">
        <h1>DREAM HOUSE REALTY</h1>
        <h2>The Real Estate Marketing Network</h2>
      </div>
  </div>

  <div style="clear:both">
  </div>

  <?php if($userType == '') { ?>

    <div class="wraps">
      <div class="social-icons">
        <div class="col-sm-offset-9">
          <ul id="horizontal-list">
            <li><a href="#"><img src="img/fb.png" /></a></li>
            <li><a href="#"><img src="img/twit.png" /></a></li>
            <li><a href="#"><img src="img/gp.png" /></a></li>
          </ul>
        </div>
      </div>
    </div>

       <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-static-top">
      <div class="navbar-container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li <?php if($getCurrentMenu == 1){ ?> class="active" <?php }; ?> ><a href="index.php">Home</a></li>
            <li <?php if($getCurrentMenu == 2){ ?> class="active" <?php }; ?> ><a href="#">About Us</a></li>
            <li <?php if($getCurrentMenu == 3){ ?> class="active" <?php }; ?> ><a href="#">Affiliated developers</a></li>
            <li <?php if($getCurrentMenu == 4){ ?> class="active" <?php }; ?> ><a href="#">Projects</a></li>
            <li <?php if($getCurrentMenu == 5){ ?> class="active" <?php }; ?> ><a href="#">Calculator</a></li>
            <li <?php if($getCurrentMenu == 6){ ?> class="active" <?php }; ?> ><a href="#">FAQS</a></li>
            <li <?php if($getCurrentMenu == 7){ ?> class="active" <?php }; ?> ><a href="#">Feedback</a></li>
            <li <?php if($getCurrentMenu == 8){ ?> class="active" <?php }; ?> ><a href="#">Contact Us</a></li>
            <li <?php if($getCurrentMenu == 9){ ?> class="active" <?php }; ?> ><a href="login.php">Login</a></li>
            
          <!-- <li>
              <a class="btn btn-default btn-outline "  data-toggle="collapse" href="#nav-collapse3" aria-expanded="false" aria-controls="nav-collapse3">Search</a>
            </li> -->
          </ul>
            <div class="collapse nav navbar-nav nav-collapse" id="nav-collapse3">
              <form class="navbar-form navbar-right" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Search" />
                </div>
                <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
              </form>
            </div><!--/.nav-collapse -->
          </div>
        </div>
    </nav>
  <?php } else { ?>
    <div class="wraps">
      <div class="social-icons">
        <div class="col-sm-offset-8">
          <ul id="horizontal-list">
            
            <li><?php echo date("F j, Y"); ?> | <strong>Welcome!</strong></li>
              <li class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" data-animations="rubberBand fadeInRight fadeInUp fadeInLeft"><span class="glyphicon glyphicon-user"></span> <?php echo ucfirst($userName); ?> <span class="glyphicon glyphicon-chevron-down rotate"></span></button>
                <ul class="dropdown-menu">
                  <li><a href="profile.php">My Profile</a></li>
                  <li><a href="logout.php">Log Out</a></li>
                </ul>
              </li>
          </ul>
        </div>
      </div>
    </div>
    <div style="clear:both"></div>
  <?php } ?>

  <?php if ($userType == '4') { ?>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-static-top">
      <div class="navbar-container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li <?php if($getCurrentMenu == 1){ ?> class="active" <?php }; ?> ><a href="index.php">Home</a></li>
            <li <?php if($getCurrentMenu == 42){ ?> class="active" <?php }; ?> ><a href="salesView.php">View</a ></li>
          </ul>
          <div class="collapse nav navbar-nav nav-collapse" id="nav-collapse3">
            <form class="navbar-form navbar-right" role="search">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search" />
              </div>
              <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
            </form>
        </div><!--/.nav-collapse -->
        </div>
      </div>
    </nav>

  <?php } else if ($userType == '3') { ?>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-static-top">
      <div class="navbar-container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li <?php if($getCurrentMenu == 1){ ?> class="active" <?php }; ?> ><a href="index.php">Home</a></li>
            <li <?php if($getCurrentMenu == 32){ ?> class="active" <?php }; ?> ><a href="dirView.php"> View </a></li>
            <li <?php if($getCurrentMenu == 33){ ?> class="active" <?php }; ?> ><a href="dirRequestSched.php"> Request Schedule </a></li>            
          <li>
              <a class="btn btn-default btn-outline "  data-toggle="collapse" href="#nav-collapse3" aria-expanded="false" aria-controls="nav-collapse3">Search</a>
            </li>
          </ul>
          <div class="collapse nav navbar-nav nav-collapse" id="nav-collapse3">
            <form class="navbar-form navbar-right" role="search">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search" />
              </div>
              <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
            </form>
        </div><!--/.nav-collapse -->
        </div>
      </div>
    </nav>

  <?php } else if ($userType == '2') { ?>

    <nav class="navbar navbar-inverse navbar-static-top">
      <div class="navbar-container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li <?php if($getCurrentMenu == 1){ ?> class="active" <?php }; ?> ><a href="index.php">Home</a></li>
            <li <?php if($getCurrentMenu == 22){ ?> class="active" <?php }; ?> ><a href="divView.php"> View </a></li>
            <li <?php if($getCurrentMenu == 23){ ?> class="active" <?php }; ?> ><a href="divRequestSched.php"> Request Schedule </a></li>
            <li <?php if($getCurrentMenu == 24){ ?> class="active" <?php }; ?> ><a href="divSendSMS.php"> Send SMS </a></li>
          </ul>
        </div>
      </div>
    </nav>

  <?php } else if ($userType == '5') { ?>
    <nav class="navbar navbar-inverse navbar-static-top">
      <div class="navbar-container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li <?php if($getCurrentMenu == 1){ ?> class="active" <?php }; ?> ><a href="index.php">Home</a></li>
            <li <?php if($getCurrentMenu == 52){ ?> class="active" <?php }; ?> ><a href="empApproval.php"> Approvals </a></li>
            <li <?php if($getCurrentMenu == 53){ ?> class="active" <?php }; ?> ><a href="empEncode.php"> Encoding </a></li>
          </ul>
        </div>
      </div>
    </nav>


  <?php } ?>
 <div class="clear"> </div>
  <!--End-wrap-->

