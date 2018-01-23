

// ----------------------------------------------------------------------
// reset form classroom modal 1
$('#Modal1').on('hidden.bs.modal', function (e) {
  $('#error').hide();
  $(this)
    .find("input")
       .val('')
       .end()
});

// ----------------------------------------------------------------------
// reset form classroom modal 2
$('#Modal2').on('hidden.bs.modal', function (e) {
  $(this)
    .find("input")
       .val('')
       .end()
});

// ----------------------------------------------------------------------
// Copy button back to normal
document.getElementById("copyButton").addEventListener("click", function() {
    copyToClipboard(document.getElementById("copyTarget"));
    setTimeout(function () {
    $('#copyButton').html('Copy');
    $('#copyButton').css('color','white');
    }, 1200);
});

// ----------------------------------------------------------------------
// Copy javascript
function copyToClipboard(elem) {
	  // create hidden text element, if it doesn't already exist
    var targetId = "_hiddenCopyText_";
    var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
    var origSelectionStart, origSelectionEnd;
    if (isInput) {
        // can just use the original source element for the selection and copy
        target = elem;
        origSelectionStart = elem.selectionStart;
        origSelectionEnd = elem.selectionEnd;
    } else {
        // must use a temporary form element for the selection and copy
        target = document.getElementById(targetId);
        if (!target) {
            var target = document.createElement("textarea");
            target.style.position = "absolute";
            target.style.left = "-9999px";
            target.style.top = "0";
            target.id = targetId;
            document.body.appendChild(target);
        }
        target.textContent = elem.textContent;
    }
    // select the content
    var currentFocus = document.activeElement;
    target.focus();
    target.setSelectionRange(0, target.value.length);

    // copy the selection
    var succeed;
    try {
    	  succeed = document.execCommand("copy");
    } catch(e) {
        succeed = false;
    }
    // restore original focus
    if (currentFocus && typeof currentFocus.focus === "function") {
        currentFocus.focus();
    }

    if (isInput) {
        // restore prior selection
        elem.setSelectionRange(origSelectionStart, origSelectionEnd);
    } else {
        // clear temporary content
        target.textContent = "";
    }
    return succeed;
};

// ----------------------------------------------------------------------
// Disabled till nothing filled in modal 1 form
var $input = $('#text');
var $button = $('#start_button');

setInterval(function(){
if($input.val().length > 0 ){
    $button.attr('disabled', false);

}else{
  $button.attr('disabled', true);

}
}, 100);


// ----------------------------------------------------------------------
// Create new classroom
$(function(){

  $('#start_button').click(function()
  {

    //inserting claas name and program name
    //---------------------------------------------
    var class_name=$('#text').val().toUpperCase();
    var program_name=$('#selected').val();

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
    var data1="class_name="+class_name +"&program_name="+program_name;

    $.ajax({
      type:"POST",
      dataType:"json",
      headers:{
        'Authorization':getCookie('token')
      },
      url:"http://api.dailyprepapp.com/shubham/classroom/register/",
      data:data1,
      success:function(data){

        var $button = $('#start_button');
        if(data.status=='0')
        {
          $('#welcome').hide();
          $('#error').show();
          $('#error').html('This Class name already exists.');


        }

        else if(data.status=='1')
        {
          $('#error').hide();
          $('#welcome').show();
          $('#welcome').html('Success! Your Class has been Created !');

          setTimeout(function () {
          $('#Modal1').modal("hide");
           $('#Modal2').modal("show");
           $('#error').hide();
           $('#welcome').hide();
         }, 2300);
        }
      },
      error:function(){
          $('#signup_btn').html('Sign Up Failed !');
          $('#error_msg1').css('display','block');
          $('#error_msg1').html('Please check Your internet connection !');
        }
    });
  });

  $('#finish_button').click(function() {
     $(".card_body").clone().appendTo(".clonecontainer");
     window.location="classroom.php";
  });
});

// function openclassroom(id) {
//   var classid=id;
// window.location="classperformance.php?classid="+classid;
// }

// ----------------------------------------------------------------------
// Fetching Classroom
$(document).ready(function() {
  $('[data-toggle="tooltip"]').tooltip();


//destroying cooie while logout
  $('#logout').click(function() {
    document.cookie ='token=; expires=Thu, 01 Jan 1970 00:00:00 GMT;';
    window.location="index.php";
  });

//function to get cookie by its name
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

  // ----------------------------------------------------------------------
  //Ajax call to fetch class name and program name

  $.ajax({
    type:"POST",
    dataType: 'json',
    url:"http://api.dailyprepapp.com/shubham/classroom/fetch/",
    headers: {
       'Authorization':getCookie('token'),
       'Content-Type':'application/json'
   },
    success:function(data){
      var total_no_class=data.content.length;
      var i=0;
      while(i<total_no_class)
      {
          var item_clone=$(".card_parent .card").clone();
          item_clone.find(".class_id").html(data.content[i].class_id);
          item_clone.find(".classname").text(data.content[i].class_name);
          item_clone.find(".program_name").text(data.content[i].program_name);
          // item_clone.find(".img_section").text(image_of_students());
          // item_clone.find(".no_of_students").text(total_no_students());
          item_clone.find(".card_body").click(function(){
              window.location="classperformance.php?cid="+$(this).find(".class_id").html();
          });
          $(item_clone).insertBefore(".add_classroom");
          i++;
      }
    },

    error:function(){
      $('.clonecontainer').html('Please check Your internet connection !');
      }
  });

  //to open classroom

});
