<html>
    <head>
      <?php
          $json = file_get_contents('web-data/classroom.json');
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
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <title><?=$title?> | DailyPrep |for classrooms</title>
        <!--lib css-->
        <link href='bootstrap/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">

        <!--custom css-->
        <!-- <link href='../css/main.css' rel='stylesheet' type='text/css'> -->
        <link href='css/home.css' rel='stylesheet' type='text/css'>

        <!-- Daily Prep Icon -->
        <link rel="icon" type="image/x-icon" href="../images/dailypreplogo.ico">

        <style media="screen">
        body{
          font-family: 'Roboto', sans-serif;
        }
        .btn-default:hover {
          background-color: transparent;
        }
        .table-hover>tbody>tr:hover{background-color:rgba(0,0,0,0.10);cursor: hand;}
  .table>tbody>tr>td{
    padding-top: 25px;
    padding-left: 25px;
  }

  .btn{
    position: relative;
    bottom:7px;
  }

  .glu{
    font-size: 12px;
    font-weight: 100;
    position: absolute;
    color: #999;
    top: 537px;
    left: 582px;
  }

.col-lg-12{
  /*margin-top: -12px;*/
}
  th{
    cursor: hand;
    position: relative;
    top: -9px;
  }
        </style>
    </head>
    <body>

      <nav class="navbar navbar-default">
        <div class="container-fluid containerfluid">
            <ul class="nav navbar-nav">
              <li><a href="index.php"><img src="images/logo.png" class="navbar-brand-image img-responsive" style="box-shadow:none"></a></li>

              <!-- <li><a href="#" class="brand-text" style="color:white;">| for classrooms</a></li> -->
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#" class=" hidden-xs" style="color:white;font-size:21px;font-weight:100;"><img src="images/user_pic.svg" class="img-circle"  width="40px" height="40px"alt="">&nbsp;</a></li>
            </ul>
        </div>
      </nav>

      <div class="jumbotron">
    <h2><a href="classperformance.php">Stephen Jordan</a></h2>
    <p><a href="classroom.php" style="text-decoration:none;">Your classroom </a><span class="glyphicon glyphicon-menu-right"></span><a href="classperformance.php" style="text-decoration:none;"> Class A (55 students)</a>  <span class="glyphicon glyphicon-menu-right"></span> <a href="classperformance.php" style="text-decoration:none;" > Stephen Jordan</a> <span class="col-md-offset-4 classroom_settings_btn hidden-xs">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Manage Student</span>&nbsp;<span class="glyphicon glyphicon-menu-down"></span></p>
  </div>

  <div class="container-fluid text-center">
    <div class="col-md-6 col-md-offset-3">

        <div class="col-md-3 ">
          <img class="status_glyphicon" src="images/day.svg"></img>
          <p class="btn btn-default area_of_score_btn" style="border-color:#4a90e2;">&nbsp;99&nbsp;&nbsp;</p><br>DAY

        </div>


        <div class="col-md-3 ">
          <img class="status_glyphicon" src="images/completion.svg"></img>
        <p class="btn btn-default area_of_score_btn" style="border-color:#48cdaf;" >45%</p><br>COMPLETION

        </div>


        <div class="col-md-3 ">
          <img class="status_glyphicon" src="images/score.svg"></img>
          <p class="btn btn-default area_of_score_btn" style="border-color:#bd10e0;">&nbsp;33&nbsp;&nbsp;</p><br>SCORE

        </div>
        <div class="col-md-3 ">
          <img class="status_glyphicon" src="images/accuracy.svg"></img>
          <p  class="btn btn-default area_of_score_btn" style="border-color:#7a10d8">82%</p><br>ACCURACY


        </div>
    </div>
    <br>

    <br><br><br><br>
    <hr style="border-top: 5px solid #eee;padding-top:14px;">
</div>
<!-- <div class="container-fluid"> -->

<span class="glyphicon glyphicon-arrow-down glu" id="h1" style="left:114px"></span>
<span class="glyphicon glyphicon-arrow-down glu" id="h2" style="left:538px"></span>
<span class="glyphicon glyphicon-arrow-down glu" id="h3" style="left:950px"></span>

  <div class="col-12 col-sm-12 col-lg-12">
   <div class="table-responsive">

  <table class="table table-striped table-hover " id="myTable">
    <thead>
      <tr >
        <th id="menu-toggle1" onclick="sortTable(0)" style="padding-bottom: 19px;">Topic Name </span> </th>
        <th id="menu-toggle2" onclick="sortTable(1)" style="padding-bottom: 19px;">Area Name </span></th>
        <th id="menu-toggle3" onclick="sortTable(2)" style="padding-left:18px;padding-bottom: 19px;">Assessent </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Topic A</td>
        <td>Area A</td>
        <td><button type="button" name="button" class="btn btn-success ">Strong</button></td>
      </tr>

      <tr>
        <td>Topic B</td>
        <td>Area B</td>
        <td><button type="button" name="button" class="btn btn-warning">Average</button></td>
      </tr>

      <tr>
        <td>Topic C</td>
        <td>Area C</td>
        <td><button type="button" name="button" class="btn btn-danger">Weak</button></td>
      </tr>

      <tr>
        <td>Topic D</td>
        <td>Area D</td>
        <td><button type="button" name="button" class="btn disabled ">Unassessed</button></td>
      </tr>



      <tr>
        <td>Topic E</td>
        <td>Area E</td>
        <td><button type="button" name="button" class="btn btn-danger">Weak</button></td>
      </tr>
      <tr>
        <td>Topic F</td>
        <td>Area F</td>
        <td><button type="button" name="button" class="btn btn-success">Strong</button></td>
      </tr>

      <tr>
        <td>Topic G</td>
        <td>Area G</td>
        <td><button type="button" name="button" class="btn btn-warning">Average</button></td>
      </tr>

      <tr>
        <td>Topic H</td>
        <td>Area H</td>
        <td><button type="button" name="button" class="btn btn-danger">Weak</button></td>
      </tr>

      <tr>
        <td>Topic I</td>
        <td>Area I</td>
        <td><button type="button" name="button" class="btn disabled ">Unassessed</button></td>
      </tr>


    </tbody>
  </table>
</div>
</div>
<!-- </div> -->




    </body>

    <script type="text/javascript" src="bootstrap/js/jquery-2.0.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/studentperformance.js">  </script>
</html>
