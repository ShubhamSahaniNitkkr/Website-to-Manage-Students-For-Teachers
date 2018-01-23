
  // reset form
  $('#buyers-report-modal').on('hidden.bs.modal', function (e) {
    $(this)
      .find("input")
        .val('')
        .end()
  });

  // log in to log in pane show
  $('a[data-toggle=modal][data-target]').click(function () {
    var target = $(this).attr('href');
    $('a[data-toggle=tab][href=' + target + ']').tab('show');
  });

$(function(){

  // login_function
  $('#login_btn').click(function () {

    var email=$('#email').val();
    var pswd=$('#pswd').val();
    var mode="LOGIN";



    var data="email="+ email +"&pswd="+pswd +"&mode="+mode;

    $.ajax({
      type:"POST",
      dataType:"json",
      url:"http://api.dailyprepapp.com/shubham/auth/login/",
      data:data,
      success:function(data){
        if(data.status=='1')
        {
          var auth_token=data.content.auth_token;
          $data=data;
          document.cookie = "token=" + $data['content']['auth_token'] + ";" + ";path=/";
          console.log(document.cookie);

          $('#error_msg').hide();
          $('#login_btn').hide();
          $('#loading').html("<center><img src='images/loader.gif' style='height:80px;margin-top:-30px;margin-bottom:-66px;box-shadow:none;padding:8px;'/></center> ");

          setTimeout(function () {
          $('#loading').hide();
          $('#welcomeuser').html('<div class="alert alert-success">Logged in SuccessFully !</div>'); }, 1100);

          setTimeout(function () {
          window.location.href = "classroom.php?name="; }, 2200);
        }

        if(data.status=='0')
        {
          $('#error_msg').html("<img src='images/loader.gif' style='height:80px;margin-top:-30px;margin-bottom:-66px;box-shadow:none;'/> ");
          $('#error_msg').css('display','block');
          $('#error_msg').html('Email or Password is incorrect !');
        }

        if(data.msg=='Oh Snap! Something went wrong !!')
        {
          $('#error_msg').css('display','block');
          $('#error_msg').html('Email or Password cannot be empty !');
        }
      },


      error:function()
      {
        $('#login_btn').html('Login Failed !');
        $('#error_msg').css('display','block');
        $('#error_msg').html('Please check Your internet connection !');
      }
    });
  });


// signup function
  $('#signup_btn').click(function() {
    var email=$('#email1').val();
    var pswd=$('#pswd1').val();
    var usr=$('#name').val();
    var usr_type=2;
    var data="email="+ email +"&pswd="+pswd +"&usr="+usr +"&usr_type="+usr_type;

    function getCookie(token) {
        var name = token + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    $.ajax({
      type:"POST",
      dataType:"json",
      url:"http://api.dailyprepapp.com/shubham/auth/register/",
      data:data,
      success:function(data){
        if(email!='' &&pswd!=''&&usr!='')
        {
          if(data.msg=='This email ID already exists.')
          {
            $('#error_msg1').show();
            $('#error_msg1').html('This email ID already exists.');
          }

          if(data.msg=='Success! Your account is created. Please wait while we redirect ...')
          {
            $('#error_msg1').hide();
            $('#signup_btn').hide();
            $('#loading1').html("<center><img src='images/loader.gif' style='height:80px;margin-top:-30px;margin-bottom:-66px;box-shadow:none;padding:8px;'/></center> ");

            setTimeout(function () {
              $('#welcomeuser1').show();
              $('#welcomeuser1').html('<div style="margin-top: 22px;padding: 14px 20px;" class="alert alert-success">Your account is created. Please wait while we redirect... !</div>'); }, 1100);

              document.cookie="token"+"="+data.content.auth_token;
            setTimeout(function () {
              window.location.href = "classroom.php?name="; }, 2200);
           }
        }
        else
       {
         $('#error_msg1').show();
         $('#error_msg1').html("Please fill all the required fields !");
       }
      },

      error:function(){
          $('#signup_btn').html('Sign Up Failed !');
          $('#error_msg1').css('display','block');
          $('#error_msg1').html('Please check Your internet connection !');
        }
    });

  });
});
