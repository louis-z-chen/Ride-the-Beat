//sliding function
document.querySelector('.img-btn').addEventListener('click', function(){
    document.querySelector('.cont').classList.toggle('s-signup')
  }
);

//submit login form
$('#login-btn').click(function(){
  //prevent page from refreshing
  event.preventDefault();

  //get form values
  var username = $("#lusername").val();
  var password = $("#lpassword").val();

  //call ajax
  $.ajax({
    url:"../backend/login_confirmation.php",
    method:"POST",
    data:{
      username:username,
      password:password,
    },
    dataType:"JSON",
    success:function(data){
      $('#login_errors').empty();
      $('#login_errors').css("display","none");

      if(data.login_valid == true){
        var new_id = data.user_id;
        $.ajax({
          url:"../backend/login.php",
          method:"POST",
          data:{
            logged_in_id:new_id,
          },
          dataType:"JSON",
          success:function(result){
            if(result.login_success == true){
              $(location).attr('href', '../pages/spotify.php');
            }
          }
        })
      }
      else{
        $('#login_errors').empty();
        var message_length = data.messages.length;
        for(var i = 0; i < message_length; i++){
          var curr_error = "<li>" + data.messages[i] + "</li>"
          $('#login_errors').append(curr_error);
        }
        $('#login_errors').css("display","block");
      }
    }
  })

});

//submit add form
$('#add-btn').click(function(){
  //prevent page from refreshing
  event.preventDefault();

  //get form values
  var first_name = $("#afirst").val();
  var last_name = $("#alast").val();
  var email = $("#aemail").val();
  var username = $("#ausername").val();
  var password = $("#apassword").val();
  var password2 = $("#apassword2").val();
  var security = $("#asecurity").val();

  //call ajax
  $.ajax({
    url:"../backend/add_user.php",
    method:"POST",
    data:{
      first_name:first_name,
      last_name:last_name,
      email:email,
      username:username,
      password:password,
      password2:password2,
      security:security
    },
    dataType:"JSON",
    success:function(data){
      $('#add_errors').empty();
      $('#add_errors').css("display","none");

      if(data.add_success == true){
        var new_id = data.new_user_id;
        $.ajax({
          url:"../backend/login.php",
          method:"POST",
          data:{
            logged_in_id:new_id,
          },
          dataType:"JSON",
          success:function(result){
            if(result.login_success == true){
              $(location).attr('href', '../pages/spotify.php');
            }
          }
        })
      }
      else{
        $('#add_errors').empty();
        var message_length = data.messages.length;
        for(var i = 0; i < message_length; i++){
          var curr_error = "<li>" + data.messages[i] + "</li>"
          $('#add_errors').append(curr_error);
        }
        $('#add_errors').css("display","block");
      }
    }
  })

});
