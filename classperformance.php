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

        <!-- custom css -->
        <link href='css/home.css' rel='stylesheet' type='text/css'>

        <!-- Daily Prep Icon -->
        <link rel="icon" type="image/x-icon" href="../images/dailypreplogo.ico">

        <style media="screen">
        body{
          font-family: 'Roboto', sans-serif;
        }

        .table_img{
          box-shadow: none;
        }

        .col-md-6 {
          width: 50%;
          margin-top: 13px;
        }

        .table-hover>tbody>tr:hover{background-color:rgba(0,0,0,0.10);cursor:hand;}
        .table>tbody>tr>td{
          padding-top: 25px;
        }

        .invite_students_btn:hover {
          background-color: #0dc9c9;
          color: white;
        }

        .btn:hover {
          color: white;
        }
        .btn-default:focus{
          color: white;
          background-color:#118e8e;
        }

        input[type=file] {
          display: none;
        }


        </style>

    </head>

    <body>
      <nav class="navbar navbar-default">
        <div class="container-fluid containerfluid">
            <ul class="nav navbar-nav">
              <li><a href="index.php"><img src="images/logo.png" class="navbar-brand-image img-responsive" style="box-shadow:none"></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li>
                <a href="#" class=" hidden-xs" style="color:white;font-size:21px;font-weight:100;"><img src="images/user_pic.svg" class="img-circle"  width="40px" height="40px"alt="">&nbsp;</a>
              </li>
            </ul>
        </div>
      </nav>

      <div class="jumbotron">
    <h2><a href="classperformance.php"  style="text-decoration:none;">Class A</a></h2>
    <p><a href="classroom.php"  >Your classroom </a> ><a href="classperformance.php" style="text-decoration:none;"> Class A (55 students)</a>&nbsp;&nbsp;&nbsp;&nbsp;<span class="col-md-offset-5 glyphicon glyphicon-cog hidden-xs " style="font-size:37px;top:11px;"></span>
      <button type="button" class="btn btn-default invite_students_btn hidden-xs" id="add_students" data-toggle="modal" data-target="#Modal1" name="button">Add Students</button>
      <button type="button" class="btn btn-default invite_students_btn hidden-xs" data-toggle="modal" data-target="#Modal2" name="button">Invite Students</button>
    </p>
  </div>

  <div class="container-fluid text-center">
    <div class="col-md-6 ">
        <div class="col-md-3 area_of_weakness_text" style="padding-top:7px;font-size: 15px;">
          Areas of weakness:
        </div>


        <div class="col-md-3 ">
          <button type="button" class="btn area_of_weakness_btn" name="button">Percentage</button><button type="button" class="btn btn-warning btn-circle circle_area_of_weakness_btn ">42</button>
        </div>


        <div class="col-md-3 ">
          <button type="button" class="btn  area_of_weakness_btn" style="background-color:#ff0070;"name="button">Percentage</button><button type="button" class="btn btn-warning btn-circle circle_area_of_weakness_btn "style="background: #ff1200;border-color: #ff1200;">42</button>
        </div>


        <div class="col-md-3 ">
          <button type="button" class="btn  area_of_weakness_btn" style="background-color:#24c8e8;"name="button">Percentage</button><button type="button" class="btn btn-warning btn-circle circle_area_of_weakness_btn " style="background:rgba(54, 102, 201, 0.94);border-color: rgba(54, 102, 201, 0.58);">42</button>
        </div>
    </div>

      <br>
      <br>
      <br>

      <hr style="border-top: 3px solid #eee;padding-top:14px;">
  </div>

  <div class="col-12 col-sm-12 col-lg-12">
  <table class="table table-hover table-striped table-responsive" cellspacing="0" cellpadding="0">
    <thead>
      <tr>
        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#</th>
        <th>Student</th>
        <th>Day</th>
        <th>Completion</th>
        <th>Score</th>
        <th>Accuracy</th>
      </tr>
    </thead>
    <tbody id="ttbody">
      <tr class='clickable-row ' onclick="window.location.href='studentperformance.php';" >
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="uid">1.</span></td>
        <td>
          <img src="images/user_pic.svg" onError="this.onerror=null;this.src='/images/user_pic.svg';" class="img-circle img-responsive table_img" width="20px" height="20px" alt="">
          <span class="user_name"></span>
        </td>
        <td>82
          <br>
          <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:82%;background-color:#337ab7;"></div>
          </div>
        </td>
        <td>3.72%
          <br>
          <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:34%;background-color:#56b955;"></div>
           </div>
        </td>
        <td>211
          <br>
          <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:21%;background-color:#712c71;"></div>
          </div>
        </td>
        <td>0.61%
          <br>
          <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="10" style="width:40%;background-color:#6d238a;"></div>
          </div>
        </td>
      </tr>


      <tr class='clickable-row ' onclick="window.location.href='studentperformance.php';" >
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="uid">2</span></td>
        <td>
          <img src="images/user_pic.svg" onError="this.onerror=null;this.src='/images/user_pic.svg';" class="img-circle img-responsive table_img" width="20px" height="20px" alt="">
          <span class="user_name"></span>
        </td>
        <td>82
          <br>
          <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:82%;background-color:#337ab7;"></div>
          </div>
        </td>
        <td>3.72%
          <br>
          <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:34%;background-color:#56b955;"></div>
           </div>
        </td>
        <td>211
          <br>
          <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:21%;background-color:#712c71;"></div>
          </div>
        </td>
        <td>0.61%
          <br>
          <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="10" style="width:40%;background-color:#6d238a;"></div>
          </div>
        </td>
      </tr>  <tr class='clickable-row ' onclick="window.location.href='studentperformance.php';" >
          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="uid">3</span></td>
          <td>
            <img src="images/user_pic.svg" onError="this.onerror=null;this.src='/images/user_pic.svg';" class="img-circle img-responsive table_img" width="20px" height="20px" alt="">
            <span class="user_name"></span>
          </td>
          <td>82
            <br>
            <div class="progress">
              <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:82%;background-color:#337ab7;"></div>
            </div>
          </td>
          <td>3.72%
            <br>
            <div class="progress">
              <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:34%;background-color:#56b955;"></div>
             </div>
          </td>
          <td>211
            <br>
            <div class="progress">
              <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:21%;background-color:#712c71;"></div>
            </div>
          </td>
          <td>0.61%
            <br>
            <div class="progress">
              <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="10" style="width:40%;background-color:#6d238a;"></div>
            </div>
          </td>
        </tr>  <tr class='clickable-row ' onclick="window.location.href='studentperformance.php';" >
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="uid">4</span></td>
            <td>
              <img src="images/user_pic.svg" onError="this.onerror=null;this.src='/images/user_pic.svg';" class="img-circle img-responsive table_img" width="20px" height="20px" alt="">
              <span class="user_name"></span>
            </td>
            <td>82
              <br>
              <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:82%;background-color:#337ab7;"></div>
              </div>
            </td>
            <td>3.72%
              <br>
              <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:34%;background-color:#56b955;"></div>
               </div>
            </td>
            <td>211
              <br>
              <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:21%;background-color:#712c71;"></div>
              </div>
            </td>
            <td>0.61%
              <br>
              <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="10" style="width:40%;background-color:#6d238a;"></div>
              </div>
            </td>
          </tr>  <tr class='clickable-row ' onclick="window.location.href='studentperformance.php';" >
              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="uid">5</span></td>
              <td>
                <img src="images/user_pic.svg" onError="this.onerror=null;this.src='/images/user_pic.svg';" class="img-circle img-responsive table_img" width="20px" height="20px" alt="">
                <span class="user_name"></span>
              </td>
              <td>82
                <br>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:82%;background-color:#337ab7;"></div>
                </div>
              </td>
              <td>3.72%
                <br>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:34%;background-color:#56b955;"></div>
                 </div>
              </td>
              <td>211
                <br>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:21%;background-color:#712c71;"></div>
                </div>
              </td>
              <td>0.61%
                <br>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="10" style="width:40%;background-color:#6d238a;"></div>
                </div>
              </td>
            </tr>  <tr class='clickable-row ' onclick="window.location.href='studentperformance.php';" >
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="uid">6</span></td>
                <td>
                  <img src="images/user_pic.svg" onError="this.onerror=null;this.src='/images/user_pic.svg';" class="img-circle img-responsive table_img" width="20px" height="20px" alt="">
                  <span class="user_name"></span>
                </td>
                <td>82
                  <br>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:82%;background-color:#337ab7;"></div>
                  </div>
                </td>
                <td>3.72%
                  <br>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:34%;background-color:#56b955;"></div>
                   </div>
                </td>
                <td>211
                  <br>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:21%;background-color:#712c71;"></div>
                  </div>
                </td>
                <td>0.61%
                  <br>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="10" style="width:40%;background-color:#6d238a;"></div>
                  </div>
                </td>
              </tr>  <tr class='clickable-row ' onclick="window.location.href='studentperformance.php';" >
                  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="uid">7</span></td>
                  <td>
                    <img src="images/user_pic.svg" onError="this.onerror=null;this.src='/images/user_pic.svg';" class="img-circle img-responsive table_img" width="20px" height="20px" alt="">
                    <span class="user_name"></span>
                  </td>
                  <td>82
                    <br>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:82%;background-color:#337ab7;"></div>
                    </div>
                  </td>
                  <td>3.72%
                    <br>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:34%;background-color:#56b955;"></div>
                     </div>
                  </td>
                  <td>211
                    <br>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:21%;background-color:#712c71;"></div>
                    </div>
                  </td>
                  <td>0.61%
                    <br>
                    <div class="progress">
                      <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="10" style="width:40%;background-color:#6d238a;"></div>
                    </div>
                  </td>
                </tr>  <tr class='clickable-row ' onclick="window.location.href='studentperformance.php';" >
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="uid">8</span></td>
                    <td>
                      <img src="images/user_pic.svg" onError="this.onerror=null;this.src='/images/user_pic.svg';" class="img-circle img-responsive table_img" width="20px" height="20px" alt="">
                      <span class="user_name"></span>
                    </td>
                    <td>82
                      <br>
                      <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:82%;background-color:#337ab7;"></div>
                      </div>
                    </td>
                    <td>3.72%
                      <br>
                      <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:34%;background-color:#56b955;"></div>
                       </div>
                    </td>
                    <td>211
                      <br>
                      <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:21%;background-color:#712c71;"></div>
                      </div>
                    </td>
                    <td>0.61%
                      <br>
                      <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="10" style="width:40%;background-color:#6d238a;"></div>
                      </div>
                    </td>
                  </tr>

    </tbody>
  </table>

  <!-- Modal 1-->
<div class="modal fade" id="Modal1" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Students</h4>
      </div>
      <div class="modal-body">
        <div class="col-12 col-sm-12 col-lg-12">
        <table class="table table-hover table-striped table-responsive" cellspacing="0" cellpadding="0">
          <thead>
            <tr>
              <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#</th>
              <th>Student</th>
              <th>Select</th>
            </tr>
          </thead>
          <tbody id="tbody" >
            <tr class='clickable-row1 hidden' >
              <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="uid"></span></td>
              <td>
                <img src="images/user_pic.png" onError="this.onerror=null;this.src='images/user_pic.svg';" class="img-circle img-responsive table_img" width="20px" height="20px" alt=""><span class="user_name">Shubham Sunny</span>
              </td>
              <td>
                <div class="checkbox">
                  <label style="font-size:20px;">
                    <input type="checkbox" name="notPaid" class="user_id" id="" value="">
                  </label>
                </div>
              </td>
            </tr>

          </tbody>
        </table>
      </div>
      <div class="modal-footer" style="text-align:center;">
        <button  id="itemselected" type="button" class="btn btn-default" style="background-color: #0dc9c9;
    color: white;
    padding: 4px 12px;
    font-size: 19px;
    border-radius: 15px;" >Add Students</button>
    <div class="alert alert-danger" id="error_msg" style="display:none;margin-top: 15px;">No students selected !</div>

      </div>
    </div>

  </div>
</div>

</div>


  <!-- Modal 2 -->
        <div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
  	<div class="modal-content">
  		<div class="modal-header">
  			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>

  		</div>
  		<div class="modal-body" style="padding:100px 130px;">
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

      <div class="modal-footer" style="text-align:center;">
        <button type="submit submit_buttons" class="btn btn-default submit_buttons " id="finish_button" data-dismiss="modal" style="text-align:center;text-align: center;
    color: white;
    font-size: 18px;
    padding: 7px 22px;
    background: #098e8e;
    border: none;
    border-radius: 25px;"onMouseOver="this.style.color='white'"
     onMouseOut="this.style.color='white'">Finish</button>

      </div>

  	   </div>
      </div>
  </div>


  <!--modal 2 end-->

</body>
    <script type="text/javascript" src="bootstrap/js/jquery-2.0.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/classperformance.js"></script>

</html>
