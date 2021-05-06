$(document).ready(function() {

  let artist_id = $("#artist_id").text();
  artist_id = artist_id.trim();

  var access_token;
  getAccessToken();

  function getAccessToken(){
    $.ajax({
      url:"../backend/get_tokens.php",
      method:"POST",
      success:function(data){
        data = JSON.parse(data);
        access_token = data.access;
        populateArtistInfo();
        populateTopTracks();
      }
    })
  }

  function populateArtistInfo(){
    $.ajax({
      url: `https://api.spotify.com/v1/artists/${artist_id}`,
      type: 'GET',
      headers: {
          'Authorization' : 'Bearer ' + access_token
      },
      success: function(data) {
        var image_url = data.images[0].url;
        $("#artist-pic").attr("src", image_url);

        var artist_name = data.name;
        $("#artist_name").text(artist_name);

        var url = data.external_urls.spotify;
        $("#link").attr("href", url);

        var numgenres = data.genres.length;
        var genres = "";
        for(i = 0; i < numgenres; i++){
          if(i != 0){
            var temp_space = ", ";
            genres = genres.concat(temp_space);
          }
          var temp_genre = data.genres[i];
          genres = genres.concat(temp_genre);
        }
        $("#genre").text(genres);

        var followers = data.followers.total.toString(10);
        var text = " Followers"
        var temp_followers = followers.concat(text);
        $("#followers").text(temp_followers);
      }
    }); // End of Spotify ajax call
  }

  function populateTopTracks(){
    $.ajax({
      url: `https://api.spotify.com/v1/artists/${artist_id}/top-tracks?market=US`,
      type: 'GET',
      headers: {
          'Authorization' : 'Bearer ' + access_token
      },
      success: function(data) {
        let num_of_tracks = data.tracks.length;
        let count = 0;
        const max_songs = 12;
        while(count < max_songs && count < num_of_tracks){
          let id = data.tracks[count].id;
          let src_str = `https://open.spotify.com/embed/track/${id}`;
          let iframe = `<div class="song p-2"><iframe src=${src_str} allow="encrypted-media"></iframe></div>`;
          $("#song-list").append(iframe);
          count++;
        }
      }
    }); // End of Spotify ajax call
  }

  //add favorites button
  $(document).on('click', '.add-fav', function(){
    //prevent page from refreshing
    event.preventDefault();

    //get form values
    var user_id = $("#hidden_fav_userid").val();
    var artist_id = $("#hidden_fav_artistid").val();

    //call ajax
    $.ajax({
      url:"../backend/add_artist_favorite.php",
      method:"POST",
      data:{
        user_id:user_id,
        artist_id:artist_id
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
      url:"../backend/remove_artist_favorite.php",
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
