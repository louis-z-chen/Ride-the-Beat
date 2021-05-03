$(document).ready(function() {

  $('#toggle-btn').change(function(){
    var curr = $(this).prop('checked');

    //if true its spotify, if false its database
    if(curr){
      $('#spotify-results').css("display","block");
      $('#database-results').css("display","none");
    }
    else{
      $('#spotify-results').css("display","none");
      $('#database-results').css("display","block");
    }
  });

  let search = $("#search").text();
  search = search.trim();

  var access_token;
  getAccessToken();

  function getAccessToken(){
    $.ajax({
      url:"../backend/get_tokens.php",
      method:"POST",
      success:function(data){
        data = JSON.parse(data);
        access_token = data.access;
        console.log(access_token);
        //populateSpotifyResults();
      }
    })
  }

  function populateSpotifyResults(){
    $.ajax({
      url: `https://api.spotify.com/v1/search?q=${search}&type=track&limit=50`,
      type: 'GET',
      headers: {
          'Authorization' : 'Bearer ' + access_token
      },
      success: function(data) {
        let num_of_tracks = data.tracks.items.length;
        let count = 0;
        const max_songs = 16;
        while(count < max_songs && count < num_of_tracks){
          let id = data.tracks.items[count].id;

          let src_str = `https://open.spotify.com/embed/track/${id}`;
          let iframe = `<div class="song p-2"><iframe src=${src_str} allow="encrypted-media"></iframe></div>`;
          $("#song-list").append(iframe);
          count++;
        }
      }
    }); // End of Spotify ajax call
  }

}); // end of document ready
