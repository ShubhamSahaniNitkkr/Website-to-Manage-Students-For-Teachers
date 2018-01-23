<html>
    <head>
      <?php
          $json = file_get_contents('web-data/home.json');
          $data = json_decode($json,true);
          $title=$data['title'];
          $heading=$data['heading'];
          $button_heading=$data['button_heading'];
          $card_data=$data['card_content'];

      ?>
        <!-- mobile meta -->
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"/> -->
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <title><?=$title?> | DailyPrep |for classrooms</title>
        <!--lib css-->
        <link href='bootstrap/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">

        <!--custom css-->
        <link href='css/home.css' rel='stylesheet' type='text/css'>

        <!-- Daily Prep Icon -->
        <link rel="icon" type="image/x-icon" href="../images/dailypreplogo.ico">
    </head>




<style media="screen">

*:focus {
    outline: 0;
}

a{
    color: inherit;
}

a:focus, a:hover {
    text-decoration:none;
}

body{
    font-family: 'Roboto', sans-serif;
}

  .form-control{
    height: 59px;
    border-radius: 0px;
  }
  .btn-success {
    color: #fff;
    font-size: 20px;
    background-color: #2c8585;
    border-color: #2c8585;
  }
  .btn-success:hover{
    color: #fff;
    font-size: 20px;
    background-color: #2c8585;
    border-color: #2c8585;
  }
  .nav-tabs>li>a{
    font-size: 20px;
  }

  .nav-tabs {
    margin-left: 105px;
    border-bottom: none;
}

.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
    border: 0px solid #ddd;
    border-bottom: 3px solid rgb(44, 133, 133);

}
.nav-tabs>li>a:hover {
    background: transparent;
}

.nav-tabs>li>a{
  border: 0px;
}

.alert-danger{
  text-align: center;
}

.nav-tabs{
  margin-left: 130px;
}




@media (min-width: 768px){
.modal-dialog {
    width: 430px;
    margin: 30px auto;
  }
}

</style>



  <body>


    <div class="background-color">
      <img src="images/home_page.jpg"  class="jumbotron-image hidden-xs" alt="" width="1440px" height="600px"></img>
<!-- mobile view -->
      <img src="images/home_page.jpg"  class="jumbotron-image visible-xs img-responsive" alt="" width="1440px" height="600px"></img>

      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <ul class="nav navbar-nav">
            <li><a href="index.php"><img src="images/logo.png" class="navbar-brand-image img-responsive" style="box-shadow:none"></a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <a href="#tab-wrong-vehicle"  data-toggle="modal" onMouseOver="this.style.color='white'" onMouseOut="this.style.color='white'"data-target="#buyers-report-modal">Log in</a>
            <a href="#tab-mileage" class="signup1" style="background-color:#21d3d8;" onMouseOver="this.style.color='white'" onMouseOut="this.style.color='white'"data-toggle="modal" data-target="#buyers-report-modal">Sign up</a>
          </ul>
      </div>
    </nav>

    <p class="jumbotron-heading col-xs-12 text-center">Lorem ipsum dolor sit amet, fabellas praesent consequuntur at eam. Erat liber,</p>
    <p class="jumbotron-subheading text-center"><a href="#tab-mileage"  style="background-color: white; color:rgba(0, 0, 0, 0.77);" class="signup1" data-toggle="modal" data-target="#buyers-report-modal">Create your classroom!</a></p>
  </div>


  <div class="container-fluid" style="margin-right: 35px; margin-left: 35px; margin-bottom: 65px;">
    <div class="row"><!--1st row start-->
      <div class="col-sm-4 col-md-6"><img src="images/content1.png" alt="" width="100%" class="img-responsive" ></div>

      <div class="col-sm-4 col-md-6 content1">
        <p class="heading">Lorem ipsum dolor sit amet, fabellas praesent consequuntur</p>
        <p class="subheading">  Lorem ipsum dolor sit amet, fabellas praesent consequuntur at eam. Erat liber antiopam id qui, mentitum evertitur per ex. His democritum conclusionemque an. Sea te semper nusquam similique, omnes inciderint an ius.</p>
      </div>
    </div><!-- first row end-->

    <div class="row"><!--2nd row start-->
      <div class="col-sm-4 col-md-6  content1">
        <p class="heading">  Lorem ipsum dolor sit amet, fabellas praesent consequuntur</p>
        <p class="subheading">  Lorem ipsum dolor sit amet, fabellas praesent consequuntur at eam. Erat liber antiopam id qui, mentitum evertitur per ex. His democritum conclusionemque an. Sea te semper nusquam similique, omnes inciderint an ius.</p>
      </div>

      <div class="col-sm-4 col-md-6">
        <img src="images/content2.png" alt="" width="100%" class="img-responsive" >
      </div>
    </div><!-- 2nd row end-->

  </div><!--container end-->

<!-- login signup modal start -->
<div class="modal fade" id="buyers-report-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-offset-top">
        <div class="modal-content" style="border-radius: 0px; border-top: 8px solid #21d3d8; border-bottom: 8px solid #3f53b1;">
            <div class="modal-body" style="margin-top: -72px;">
                <div class="sd-tabs sd-tab-interaction">
                    <div class="row">
                       <img src="images/dailypreplogo1.svg" alt="" style="box-shadow:none;position: relative;left: 127px;">
                       <button type="button" class="close" data-dismiss="modal" style="position:relative; left:-18px;" onclick="reset();">&times;</button>
                        <hr>
                        <ul class="nav nav-tabs custom-bullet">
                            <li class="active"><a data-toggle="tab" href="#tab-wrong-vehicle"> Log in</a></li>
                            <li><a data-toggle="tab" href="#tab-mileage"> Sign up</a></li>
                        </ul>

                        <div class="tab-content col-md-12">
                            <div id="tab-wrong-vehicle" class="tab-pane  active" action="" method="post">
                                <!-- log in start -->
                                  <div class="form-group">
                                  <input type="email" class="form-control reset" id="email" placeholder="Email" name="email">
                                  </div>
                                  <div class="form-group">
                                    <input type="password" class="form-control" id="pswd" placeholder="Password" name="pswd">
                                  </div>
                                  <div id="loading" style="padding:10px;"></div>
                                  <button type="btn" class="btn btn-success form-control" id="login_btn" onclick="">Log in</button>
                                  <p style="text-align:center;color:#2c8585;margin-top:11px;" id="welcomeuser" >Forgot your Password?</p>
                                  <div class="alert alert-danger" id="error_msg" style="display:none;"></div>
                                  <div class="alert alert-success" id="welcomeuser" style="display:none;"></div>
                            </div>
                            <!-- Log in end -->

                            <!-- Sign Up-->
                            <div id="tab-mileage" class="tab-pane">
                                <div class="form-group">
                                  <input type="name" class="form-control" id="name" placeholder="Name" name="name">
                                </div>
                                <div class="form-group">
                                   <input type="email" class="form-control" id="email1" placeholder="Email" name="email">
                                </div>
                                <div class="form-group">
                                   <input type="password" class="form-control" id="pswd1" placeholder="Password" name="pswd">
                                </div>

                               <div id="loading1" style="padding:10px;"></div>
                                  <button type="btn submit" id="signup_btn" class="btn btn-success form-control">Sign up</button>
                                <br>
                                <div class="alert alert-danger" id="error_msg1" style="display:none;margin-top: 15px;"></div>
                                <div class="alert alert-success" id="welcomeuser1" style="padding: 0px 0px;margin: 14px 2px;border:none;display:none;margin-top: 15px;"></div>
                            </div>
                            <!-- sign Up end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>







  </body>
    <script type="text/javascript" src="bootstrap/js/jquery-2.0.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/home.js"></script>
  </html>
