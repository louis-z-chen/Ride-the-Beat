//show add modal
$(document).on('click', '.add', function(){
  //erase previous errors
  $('#add_errors').empty();
  $('#add_errors').css("display","none");

  //empty form
  $("#pcreatorid").val("");
  $("#pimageurl").val("");
  $("#pname").val("");
  $("#ppublic").val("");
  $("#purl").val("");
  $("#pspotifyid").val("");

  //show modal
  $('#add_playlist').modal('show');
});

//submit add form
$('#add-btn').click(function(){
  //prevent page from refreshing
//  event.preventDefault();

  //get form values
  var creator_id = $("#pcreatorid").val();
  var image_url = $("#pimageurl").val();
  var name = $("#pname").val();
  var public = $("#ppublic").val();
  var url = $("#purl").val();
  var spotify_id = $("#pspotifyid").val();

  //call ajax
//   $.ajax({
//     url:"../backend/add_playlist.php",
//     method:"POST",
//     data:{
//       creator_id:creator_id,
//       image_url:image_url,
//       name:name,
//       public:public,
//       url:url,
//       spotify_id:spotify_id,
//     },
//     dataType:"JSON",
//     success:function(data){
//      console.log(data);
//       $('#add_errors').empty();
//       $('#add_errors').css("display","none");
//
//       if(data.add_success == true){
//         var message = "Playlist was added successfully!"
//         $("#hidden_message").val(message);
//         $("#hidden_form").submit();
//       }
//       else{
//         $('#add_errors').empty();
//         var message_length = data.messages.length;
//         for(var i = 0; i < message_length; i++){
//           var curr_error = "<li>" + data.messages[i] + "</li>"
//           $('#add_errors').append(curr_error);
//         }
//         $('#add_errors').css("display","block");
//       }
//     }
//   })
//
});

//fill edit modal with data
$(document).on('click', '.edit', function(){
  $('#edit2').val($(this).attr("value"));
  // alert($(this).attr("value"));
  //erase previous errors
  $('#edit_errors').empty();
  $('#edit_errors').css("display","none");

  //get values from table
  var id = $.trim($(this).val());
  var first = $.trim($('#first_name'+id).text());
  var last = $.trim($('#last_name'+id).text());
  var username = $.trim($('#username'+id).text());
  var email = $.trim($('#email'+id).text());
  var security = $.trim($('#security_level'+id).text());

  //put values into form
  $('#edit_playlist').modal('show');
  $("#eid").val(id);
  $("#efirst").val(first);
  $("#elast").val(last);
  $("#eemail").val(email);
  $("#eusername").val(username);
  $("#epassword").val("");
});
//
// //jquery code to submit edit form
$('#edit-btn').click(function(){

//   //prevent page from refreshing
// //  event.preventDefault();
//
  //get form values
  var id = $("#eid").val();
  var first_name = $("#efirst").val();
  var last_name = $("#elast").val();
  var email = $("#eemail").val();
  var username = $("#eusername").val();
  var password = $("#epassword").val();
  var security = $("#esecurity").val();

  //call ajax
  // $.ajax({
  //   url:"../backend/edit_playlist.php",
  //   method:"POST",
  //   data:{
  //     id:id,
  //     first_name:first_name,
  //     last_name:last_name,
  //     email:email,
  //     username:username,
  //     password:password,
  //     security:security
  //   },
  //   dataType:"JSON",
  //   success:function(data){
  //     $('#edit_errors').empty();
  //     $('#edit_errors').css("display","none");
  //
  //     if(data.edit_success == true){
  //       var message = "Edit was made successfully!"
  //       $("#hidden_message").val(message);
  //       $("#hidden_form").submit();
  //     }
  //     else{
  //       $('#edit_errors').empty();
  //       var message_length = data.messages.length;
  //       for(var i = 0; i < message_length; i++){
  //         var curr_error = "<li>" + data.messages[i] + "</li>"
  //         $('#edit_errors').append(curr_error);
  //       }
  //       $('#edit_errors').css("display","block");
  //     }
  //   }
  // })
});
