//fill edit modal with data
$(document).on('click', '.edit', function(){
  //erase previous errors
  $('#edit_errors').empty();
  $('#edit_errors').css("display","none");

  //get values from table
  var id = $.trim($(this).val());
  var first = $.trim($('#first_name').text());
  var last = $.trim($('#last_name').text());
  var username = $.trim($('#username').text());
  var email = $.trim($('#email').text());
  var security = $.trim($('#security_level').text());

  //put values into form
  $('#edit_user').modal('show');
  $("#eid").val(id);
  $("#efirst").val(first);
  $("#elast").val(last);
  $("#eemail").val(email);
  $("#eusername").val(username);
  $("#epassword").val("");
  $("#esecurity").val(security);
});

//jquery code to submit edit form
$('#edit-btn').click(function(){
  //prevent page from refreshing
  event.preventDefault();

  //get form values
  var id = $("#eid").val();
  var first_name = $("#efirst").val();
  var last_name = $("#elast").val();
  var email = $("#eemail").val();
  var username = $("#eusername").val();
  var password = $("#epassword").val();
  var security = $("#esecurity").val();

  //call ajax
  $.ajax({
    url:"../backend/edit_user.php",
    method:"POST",
    data:{
      id:id,
      first_name:first_name,
      last_name:last_name,
      email:email,
      username:username,
      password:password,
      security:security
    },
    dataType:"JSON",
    success:function(data){
      $('#edit_errors').empty();
      $('#edit_errors').css("display","none");

      if(data.edit_success == true){
        var message = "Edit was made successfully!"
        $("#hidden_message").val(message);
        $("#hidden_form").submit();
      }
      else{
        $('#edit_errors').empty();
        var message_length = data.messages.length;
        for(var i = 0; i < message_length; i++){
          var curr_error = "<li>" + data.messages[i] + "</li>"
          $('#edit_errors').append(curr_error);
        }
        $('#edit_errors').css("display","block");
      }
    }
  })

});

//show delete modal
$(document).on('click', '.delete', function(){
  //erase previous errors
  $('#delete_errors').empty();
  $('#delete_errors').css("display","none");

  //get values from table
  var id = $.trim($(this).val());

  //put values into form
  $('#delete_user').modal('show');
  $("#did").val(id);

});

//jquery code to submit delete form
$('#delete-btn').click(function(){
  //prevent page from refreshing
  event.preventDefault();

  //get form values
  var id = $("#did").val();

  //call ajax
  $.ajax({
    url:"../backend/delete_user.php",
    method:"POST",
    data:{
      id:id,
    },
    dataType:"JSON",
    success:function(data){
      if(data.delete_success == true){
        if(data.self == true){
          $(location).attr('href', '../backend/logout.php')
        }
        else{
          var message = "User account was deleted successfully!"
          $("#hidden_message").val(message);
          $("#hidden_form").submit();
        }
      }
      else{
        $('#delete_errors').empty();
        var message_length = data.messages.length;
        for(var i = 0; i < message_length; i++){
          var curr_error = "<li>" + data.messages[i] + "</li>"
          $('#delete_errors').append(curr_error);
        }
        $('#delete_errors').css("display","block");
      }
    }
  })

});
