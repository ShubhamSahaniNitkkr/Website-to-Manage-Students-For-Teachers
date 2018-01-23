$(document).ready(function() {

  // function to getting cookie by its name
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

  // Copy button back to normal
  document.getElementById("copyButton").addEventListener("click", function() {
      copyToClipboard(document.getElementById("copyTarget"));
      setTimeout(function () {
      $('#copyButton').html('Copy');
      $('#copyButton').css('color','white');
      }, 1200);
  });


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

  var url_string=window.location;
  var url = new URL(url_string);
  var class_id = url.searchParams.get("cid");

  var data="class_id="+class_id ;

// Fetching students on page load
  $.ajax({
    type:"POST",
    dataType:"json",
    headers:{
      'Authorization':getCookie('token')
    },
    url:"http://api.dailyprepapp.com/shubham/classroom/fetch/students/",
    data:data,
    success:function(data){
      console.log(data);

      var total_no_users=data.students.length;
      var i=0;
      var j=0;
      while(i<total_no_users)
      {
        var item_clone=$(".clickable-row").clone();

          item_clone.removeClass('hidden');
          item_clone.removeClass('clickable-row');
          item_clone.find(".uid").html(++j);
          var id=data.students[i].uid;

          var image_id='http://d2i1wvd778udnd.cloudfront.net/'+id+'-150.jpg';
          item_clone.find(".img-circle").attr('src',image_id);
          // var obj=json_parse(data.students);
          // console.log(obj);
          var obj=data.students[i].display_name;
          item_clone.find(".user_name").text(obj);

          $(item_clone).appendTo(" #ttbody");
          i++;
      }
    },

    error:function(){
      $('.clonecontainer').html('Please check Your internet connection !');
      }
  });


// Show all users in modal
    $.ajax({
      type:"POST",
      dataType:"json",
      headers:{
        'Authorization':getCookie('token')
      },
      url:"http://api.dailyprepapp.com/shubham/classroom/list/users/",
      success:function(data){

        var total_no_users=data.content.length;
        var i=0;
        var j=0;

        while(i<total_no_users)
        {
          var item_clone=$(".clickable-row1").clone();

            item_clone.removeClass('hidden');
            item_clone.removeClass('clickable-row1');
            item_clone.find(".uid").html(++j);
            var id=data.content[i].uid;
            item_clone.find(".user_id").attr('id',data.content[i].uid);
            var image_id='http://d2i1wvd778udnd.cloudfront.net/'+id+'-150.jpg';
            item_clone.find(".img-circle").attr('src',image_id);
            item_clone.find(".user_name").text(data.content[i].usr);


            $(item_clone).appendTo("#tbody");
            i++;
        }
      },

      error:function(){
        $('.clonecontainer').html('Please check Your internet connection !');
        }
    });


    //Store selected students on click add students button in modal of oncheck box
    $('#itemselected').click(function()
    {

      var CHKcollect = [];
      $("input[name=notPaid]:checked").each(function() {
        CHKcollect.push(this.id);
      });
      var url_string=window.location;
      var url = new URL(url_string);
      var class_id = url.searchParams.get("cid");
      var data="class_id="+ class_id +"&student_ids="+ CHKcollect;
        $.ajax({
          type:"POST",
          dataType:"json",
          headers:{
            'Authorization':getCookie('token')
          },
          url:"http://api.dailyprepapp.com/shubham/classroom/add/student/",
          data:data,
          success:function(data){

            if(data.status==0)
            {
                $('#error_msg').show();
            }

            if(data.status==1)
            {
              $('#error_msg').hide();
              console.log(data);

            }

            // var total_no_users=data.content.length;
            // var i=0;
            // var j=0;
            //
            // while(i<total_no_users)
            // {
            //   var item_clone=$(".clickable-row").clone();
            //
            //     item_clone.removeClass('hidden');
            //     item_clone.removeClass('clickable-row1');
            //     item_clone.find(".uid").html(++j);
            //     var id=data.content[i].uid;
            //     item_clone.find(".user_id").attr('id',data.content[i].uid);
            //     var image_id='http://d2i1wvd778udnd.cloudfront.net/'+id+'-150.jpg';
            //     item_clone.find(".img-circle").attr('src',image_id);
            //     item_clone.find(".user_name").text(data.content[i].usr);
            //
            //
            //     $(item_clone).appendTo("tbody");
            //     i++;
            // }
          },

          error:function(){
            $('.tbody').html('Please check Your internet connection !');
            }
        });
    });



});
