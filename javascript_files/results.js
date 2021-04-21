$(document).ready(function() {

  let search = $("#search").text();
  search = search.trim();

  var access_token;
  getAccessToken();

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
    console.log(access_token);
    console.log(search);
    $.ajax({
      url: `https://api.spotify.com/v1/search?q=${search}&type=track`,
      type: 'GET',
      headers: {
          'Authorization' : 'Bearer ' + access_token
      },
      success: function(data) {
        console.log(data);
        // Load our songs from Spotify into our page
        let num_of_tracks = data.tracks.items.length;
        let count = 0;
        // Max number of songs is 12
        const max_songs = 12;
        while(count < max_songs && count < num_of_tracks){
          // Extract the id of the FIRST song from the data object
          let id = data.tracks.items[count].id;
          // Constructing two different iframes to embed the song
          let src_str = `https://open.spotify.com/embed/track/${id}`;
          let iframe = `<div class='song'><iframe src=${src_str} frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe></div>`;
          let parent_div = $('#song_'+ count);
          parent_div.html(iframe);
          count++;
        }
      }
    }); // End of Spotify ajax call
  }

}); // end of document ready
