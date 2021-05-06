$(document).ready(function() {

  let playlist_id = $("#playlist_id").text();
  playlist_id = playlist_id.trim();

  var access_token;
  getAccessToken();

  function getAccessToken(){
    $.ajax({
      url:"../backend/get_tokens.php",
      method:"POST",
      success:function(data){
        data = JSON.parse(data);
        access_token = data.access;
        populateSpotifyResults();
      }
    })
  }

  function populateSpotifyResults(){
    $.ajax({
      url: `https://api.spotify.com/v1/playlists/${playlist_id}/tracks?market=US`,
      type: 'GET',
      headers: {
          'Authorization' : 'Bearer ' + access_token
      },
      success: function(data) {
        //data = JSON.parse(data);
        let num_of_tracks = data.items.length;
        let count = 0;
        const max_songs = 16;
        while(count < max_songs && count < num_of_tracks){
          let id = data.items[count].track.id;
          let src_str = `https://open.spotify.com/embed/track/${id}`;
          let iframe = `<div class="song p-2"><iframe src=${src_str} allow="encrypted-media"></iframe></div>`;
          $("#song-list").append(iframe);
          count++;
        }
      }
    }); // End of Spotify ajax call
  }

  //show rate modal
  $(document).on('click', '.rate', function(){
    //erase previous errors
    $('#rate_errors').empty();
    $('#rate_errors').css("display","none");

    //get values from hidden hidden form
    var rating = $.trim($('#hidden_rating').val());
    var comment = $.trim($('#hidden_comment').val());

    rating = parseInt(rating);

    //put values into hidden form
    $("#rating").val(rating);
    $("#comment").val(comment);

    //show modal
    $('#rate').modal('show');
  });

  //jquery code to submit rate form
  $('#rate-btn').click(function(){
    //prevent page from refreshing
    event.preventDefault();

    //get form values
    var playlist_id = $('#rate_playlist_id').val();
    var rater_id = $('#rate_rater_id').val();
    var rating_id = $('#rate_rating_id').val();
    var rating = $("#rating").val();
    var comment = $("#comment").val();

    //call ajax
    $.ajax({
      url:"../backend/rate.php",
      method:"POST",
      data:{
        playlist_id:playlist_id,
        rater_id:rater_id,
        rating_id:rating_id,
        rating:rating,
        comment:comment
      },
      dataType:"JSON",
      success:function(data){
        $('#rate_errors').empty();
        $('#rate_errors').css("display","none");

        if(data.rate_success == true){
          var message = "Rating was updated successfully!"
          $("#hidden_message").val(message);
          $("#hidden_form").submit();
        }
        else{
          $('#rate_errors').empty();
          var message_length = data.messages.length;
          for(var i = 0; i < message_length; i++){
            var curr_error = "<li>" + data.messages[i] + "</li>"
            $('#rate_errors').append(curr_error);
          }
          $('#rate_errors').css("display","block");
        }
      }
    })
  });

  //show share modal
  $(document).on('click', '.share', function(){
    //erase previous errors
    $('#share_errors').empty();
    $('#share_errors').css("display","none");

    //clear form
    $("#email").val("");
    $("#message").val("");

    //show modal
    $('#share').modal('show');
  });

  //jquery code to submit share form
  $('#share-btn').click(function(){
    //prevent page from refreshing
    event.preventDefault();

    //get form values
    var url = $("#url").val();
    var email = $("#email").val();
    var message = $("#message").val();

    //call ajax
    $.ajax({
      url:"../backend/email.php",
      method:"POST",
      data:{
        url:url,
        email:email,
        message:message
      },
      dataType:"JSON",
      success:function(data){
        $('#share_errors').empty();
        $('#share_errors').css("display","none");

        if(data.send_success == true){
          var message = "Email was sent successfully!"
          $("#hidden_message").val(message);
          $("#hidden_form").submit();
        }
        else{
          $('#share_errors').empty();
          var message_length = data.messages.length;
          for(var i = 0; i < message_length; i++){
            var curr_error = "<li>" + data.messages[i] + "</li>"
            $('#share_errors').append(curr_error);
          }
          $('#share_errors').css("display","block");
        }
      }
    })
  });

  //add favorites button
  $(document).on('click', '.add-fav', function(){
    //prevent page from refreshing
    event.preventDefault();

    //get form values
    var user_id = $("#hidden_fav_userid").val();
    var playlist_id = $("#hidden_fav_playlistid").val();

    //call ajax
    $.ajax({
      url:"../backend/add_playlist_favorite.php",
      method:"POST",
      data:{
        user_id:user_id,
        playlist_id:playlist_id
      },
      dataType:"JSON",
      success:function(data){
        if(data.add_success == true){
          var message = "Favorite was added successfully!"
          //$("#hidden_message").val(message);
          $("#hidden_form").submit();
        }
        else{
          var message = "Favorite was not added successfully!"
          //$("#hidden_message").val(message);
          $("#hidden_form").submit();
        }
      }
    })
  });

  //remove favorites button
  $(document).on('click', '.remove-fav', function(){
    //prevent page from refreshing
    event.preventDefault();

    //get form values
    var fav_id = $("#hidden_fav_id").val();

    //call ajax
    $.ajax({
      url:"../backend/remove_playlist_favorite.php",
      method:"POST",
      data:{
        fav_id:fav_id
      },
      dataType:"JSON",
      success:function(data){
        if(data.delete_success == true){
          var message = "Favorite was removed successfully!"
          //$("#hidden_message").val(message);
          $("#hidden_form").submit();
        }
        else{
          var message = "Favorite was not removed successfully!"
          //$("#hidden_message").val(message);
          $("#hidden_form").submit();
        }
      }
    })
  });

}); // end of document ready
