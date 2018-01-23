<html>
    <head>
      <?php
          $json = file_get_contents('web-data/classroom.json');
          $data = json_decode($json,true);
          $examss=$data['exams'];



      ?>

        <!-- mobile meta -->
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <title>classroom | DailyPrep |for classrooms</title>
        <!--lib css-->
        <link href='bootstrap/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
        <!--custom css-->
        <link href='css/classroom.css' rel='stylesheet' type='text/css'>
        <link href='css/home.css' rel='stylesheet' type='text/css'>

        <!-- Daily Prep Icon -->
        <link rel="icon" type="image/x-icon" href="../images/dailypreplogo.ico">

<style media="screen">

body{
  font-family: 'Roboto', sans-serif;
  overflow-x: hidden;
}
.btn-default:hover {
  color: grey;
}
.btn[disabled]{
  background: grey;
}

.btn[disabled]:hover{
  background: grey;
  color: white;
}
a {
    color: #999;
    text-decoration: none;
}
img{
  box-shadow: none;
}
.invite_students_btn:hover {
    background-color: #0dc9c9;
    color: white;
}
</style>



    </head>
    <body>
      <nav class="navbar navbar-default" style="padding:0px 88px 0px;width:1550px;top: -14px;left: 16px;">
        <div class="container-fluid containerfluid">
            <ul class="nav navbar-nav">
              <li><a href="index.php"><img src="images/logo.png" class="navbar-brand-image img-responsive" style="box-shadow:none"></a></li>

              <!-- <li><a href="#" class="brand-text" style="color:white;font-size:28px; font-weight:300;">| for classrooms</a></li> -->
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li onclick="deleteAllCookies();"><a href="#" class=" hidden-xs" style="color:white;"><img src="images/user_pic.png" class="img-circle"  width="40px" height="40px"alt="">&nbsp;Ishan Jalan</a></li>
            </ul>
        </div>
      </nav>

      <div class="jumbotron">
    <p style="margin-bottom:0px;"><a href="classroom.php">Your classrooms </a> <a href="classperformance.php"> </a>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   <button type="button" class="btn btn-default invite_students_btn hidden-xs col-md-offset-8" data-toggle="modal" data-target="#Modal1" name="button">Create Classroom</button></p>
  </div>

      <!--content start-->

        <div class="col-md-12 content clonecontainer" style="margin-left:-36px;">
          <!-- card start-->
          <div class="card_parent" style="display:none;">
          <div class="card">
            <a href="classperformance.php">
              <div class="card_body">
                <p class="class_name" style="color:grey;font-weight:300;"></p>
                <p class="program_name" style="font-size: medium;color:grey;font-weight:300;"></p>

              <div class="img_section">
                <img src="images/user_pic.png" class="img-circle" style="box-shadow:none;" width="120px" height="120px" alt="">
              </div>

                <button type="button"  class="card_footer btn btn-default" style="background-color:white;" name="button"><span class="no_of_students"></span>&nbsp;Students</button>
                </div>
              </a>
            </div>
          </div>

            <!-- card end -->


          <div class="card_body s add_classroom" data-toggle="modal" data-target="#Modal1" style="text-align:center;">
        <p style="font-weight:400;color:grey;letter-spacing: 0.4;">Create Classroom <br> </p>
        <p type="button" class="btn btn-default btn-circle btn-lg"><i class="glyphicon glyphicon-plus" style="top: 4px;left: 0px;"></i></p>

          </div>
        </div>


        <!--Content end-->

<!-- Modal 1 -->
      <div class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>

		</div>
		<div class="modal-body modalbody">
      <h3 style="text-align:center;">Create a new classroom</h3>
      <br>
      <br>
            <!-- content goes here -->
              <div class="form-group">
                <label for="class_name">Class Name</label>
                <input type="text" class="form-control required" id="text" placeholder="Example: B.Tech Section A" id="field">
              </div>

              <br>

              <div class="form-group">
                <label for="programs">Select Programs</label>
                <select id="selected" class="form-control required " name="Select one from the list" placeholder="Select one from the list">
                  <?php
                  foreach($examss as $exam){
                  ?>
                  <option value="<?=$exam['course_name'];?>" ><?=$exam['course_name'];?></option>
              <?php } ?>
                </select>
              </div>

		</div>

    <div class="modal-footer">

   <button type="button submit_buttons" class="btn btn-default submit_buttons" style="text-align:center" id="start_button" data-toggle="modal" data-disiss="modal" data-target="#Moda2" class="close"> <a style="text-decoration: none;
   onMouseOver="this.style.color='white'"
   onMouseOut="this.style.color='white'" ">Invite Students </a></button>
   <div class="alert alert-danger" id="error" style="display:none;margin-top: 15px;"></div>
   <div class="alert alert-success" id="welcome" style="display:none;margin-top: 15px;"></div>


    </div>

	</div>
  </div>
</div>


<!--modal 1 end-->


<!-- Modal 2 -->
      <div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>

		</div>
		<div class="modal-body" style="padding:70px 130px;">
      <h3 style="text-align:center;font-size:22px;">Invite students to your classroom</h3>

      <br>
      <br>
            <!-- content goes here -->
			<form>


              <div class="col-lg-12">
                <label for="link">Share this link</label>
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="https:dprep.com/i/xggnxu" id="copyTarget">
                  <span class="input-group-btn">
                    <p class="btn btn-secondary" id="copyButton" style="background-color:rgba(0, 0, 0, 0.7);color:white; border-radius: 0px 5px 5px 0px;" onClick="change()">Copy</p>
                  </span>
                  <script>
                  function change(){
                    document.getElementById("copyButton").innerHTML = "Copied !";
                    document.getElementById("copyButton").style.color ="pink";
                    document.getElementById("copyButton").style.backgroundColor ="grey";

                  };
                  </script>
                </div>
              </div>
              <label for="or" class="or col-md-offset-6">or</label>
              <br>
              <br>

              <label for="exampleInputPassword1" style="margin-left:14px;">Upload Users</label>
              <div class="form-group">
                <a href="images/user_pic.png"
   download="Download Template"><button type="button" name="button" onMouseOver="this.style.color='black'" onMouseOut="this.style.color='grey'" class="btn  col-md-5 pull-left" style="background-color: transparent;
    border: 1px solid; margin: 0px 14px;margin: 0px 13px; padding: 6px 1px;">Download Template</button></a>

                <label class="btn-bs-file btn btn-primary  col-md-5 pull-right" style="margin: 0px 14px; background-color: #1873E5">
                  Upload Template
                  <input type="file" />
              </label>

              </div>

            </form>

		</div>

    <div class="modal-footer">
      <button type="submit submit_buttons" class="btn btn-default submit_buttons " id="finish_button" data-dismiss="modal" style="margin-top: -79px;text-align:center"onMouseOver="this.style.color='white'"
   onMouseOut="this.style.color='white'">Finish</button>

    </div>

	   </div>
    </div>
</div>

<!--modal 2 end-->

</body>

    <script type="text/javascript" src="bootstrap/js/jquery-2.0.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/classroom.js"></script>

</html>
