<?php require('includes/config.php'); ?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">    
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="Knowledgelab - E-learning, Finishing School, Software Training, Technology Training, Tech Enabled Learning, Engineering College, Digital Library, Mini Project, Major Project, Final Semester Project,"/>  
    <meta name="description" content="The finest subject wise reference material for engineering and BCA/MCA students on Windows and Android."/>
    <meta name="ROBOTS" content="ALL"/>
    <meta http-equiv="content-language" content="en,fr,HI,BN,OR"/>
    <meta name="geo.position" content="22.572646;88.363895"/>
    <meta name="geo.placename" content="sector-v,saltlake, Kolkata, INDIA"/>
    <meta name="geo.region" content="IN-WB"/>
    <title>Knowledgelab - E-learning | Finishing School | Software Training | Technology Training | Tech Enabled Learning | Engineering College</title>
    <link rel="shortcut icon" href="images/logoIcon.gif" style="height:95%; width:90%;" type="image/x-icon" >
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/vegas.min.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link href="css/scrolling-nav.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->
    <link href="css/media-queries.css" rel="stylesheet" type="text/css">
    <link href="css/media-queries_attach.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.css"/>
    <link rel="stylesheet" href="css/font-awesome-animation.min.css">
    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/vegas.min.js"></script>
    <script type="text/javascript" src="js/jssor.slider.min.js"></script>
    <script>
      $(document).on('click','.mybtn',function(e){
        e.preventDefault();
        $("#myDropdown").toggle();
      });
    </script>
  </head>
  <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <nav class="navbar navbar-default navbar-fixed-top navbar-border" role="navigation">
      <div class="header col-lg-12 col-md-4">
        <div class=" pull-right">
          <ul class="header-bar">
            <?php if($user->is_logged_in() == true) { ?>
              <li>Hi <?php echo $_SESSION['username']; ?></li>
              <li><a href="logout.php" role="button">Logout</a></li>
            <?php } else { ?>
              <li><a href="#" role="button" data-toggle="modal" data-target="#login-modal">login</a></li>
              <li><a href="#" role="button" data-toggle="modal" data-target="#register-modal">register</a></li>
            <?php } ?>
          </ul>
        </div>
        <?php include('includes/login_reg_modal.php'); ?>
      </div>
      <a class="navbar-brand page-scroll klimg" href="<?php echo BASE_URL; ?>"><img src="images/knowledge_png.png" style=" height: 70px;margin-left: 20px"></a>
      <div class="navbar-header page-scroll">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse navbar-ex1-collapse navbar-top" style=" padding-right: 20px" > 
        <ul class="nav navbar-nav navbar-right ">
          <!-- <li><a class="page-scroll" href="http://www.testezee.com" target="windowname"><h4 style="color: #333; font-family: myFirstFont">Online Test</h4></a></li> -->
          <li><a class="page-scroll" href="#submenu"><h4 style="color: #333; font-family: myFirstFont;  ">LEARNING APP</h4></a></li>
          <li><a class="page-scroll" href="#menu2"><h4 style="color: #333; font-family: myFirstfont; ">TRAINING LAB</h4></a></li>
          <li class="visible-xs"><a class="page-scroll" href="#menu5"><h5 style="color: #333; margin-top: 0px; font-family: myFirstFont">Testimonial</h5></a></li>
          <li class="visible-xs"><a class="page-scroll" href="index1.html#submenu6"><h5 style="color: #333; margin-top: 0px;font-family: myFirstFont">Mission</h5></a></li>
          <li class="visible-xs"><a class="page-scroll" href="index1.html#submenu4"><h5 style="color: #333; margin-top: 0px;font-family: myFirstFont">About Us</h5></a></li>
          <li class="visible-xs"><a class="page-scroll" href="index1.html#submenu8"><h5 style="color: #333; margin-top: 0px;font-family: myFirstFont">Work With Us</h5></a></li>
          <li class="visible-xs"><a class="page-scroll" href="#contact"><h5 style="color: #333; margin-top: 0px;font-family: myFirstFont">Contact us</h5></a></li>   
          <li class="custom-dropdown hidden-xs">
            <div class="holder">
              <button class="btn dropbtton mybtn">
                <i class="fa fa-bars"></i>MENU
              </button>
              <div id="myDropdown" class="dropdown-content">
                <a class="page-scroll" href="#menu5"><h5 style="color: #333; margin-top: 0px; font-family: myFirstFont">Testimonial</h5></a>
                <a class="page-scroll" href="index1.php#submenu6"><h5 style="color: #333; margin-top: 0px;font-family: myFirstFont">Mission</h5></a>
                <a class="page-scroll" href="index1.php#submenu4"><h5 style="color: #333; margin-top: 0px;font-family: myFirstFont">About Us</h5></a>
                <a class="page-scroll" href="index1.php#submenu8"><h5 style="color: #333; margin-top: 0px;font-family: myFirstFont">Work With Us</h5></a>
                <a class="page-scroll" href="#contact"><h5 style="color: #333; margin-top: 0px;font-family: myFirstFont">Contact us</h5></a>
              </div>
              <a  href="https://www.facebook.com/KnowledgeLab-World-865527740189412/?fref=ts" target="windowname"><img class="fb" src="images/facebook.png" style="padding-top: 0px;padding-left: 20px;padding-right: 20px"></a>
            </div>
          </li>                       
        </ul><!-- /.navbar-collapse -->                                  
      </div>
    </nav>