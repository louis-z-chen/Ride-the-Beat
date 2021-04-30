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

}); // end of document ready
