$(document).ready(function() {

  const TOKEN = "https://accounts.spotify.com/api/token";

  //Step 1: Have your application request authorization; the user logs in and authorizes access
  var step1 = false;
  let client_id = '48d219031e7a4338bb998f65cd703cbd';
  let client_secret = 'ec7d4d17003d41ce9194658d600b41d7';
  let redirect_uri = 'http%3A%2F%2Flocalhost%2FRide-the-Beat%2Fpages%2Fspotify.php';

  const redirect = `https://accounts.spotify.com/authorize?client_id=${client_id}&response_type=code&redirect_uri=${redirect_uri}`;

  var error = $("#error").text();
  error = error.trim();
  if(error != "no error"){
    $(location).attr('href', '../pages/error.php');
  }

  let code = $("#code").text();
  code = code.trim();
  let message = $("#message").text();
  message = message.trim();
  if(code == "no code" && message == "new user" && error == "no error"){
    window.location.replace(redirect);
  }
  step1 = true;

  if(step1){
    //Step 2: Have your application request refresh and access tokens; Spotify returns access and refresh tokens
    if(message == "new user"){
      fetchAccessToken(code);
    }
    //Step 4: Requesting a refreshed access token
    else if(message == "existing user"){
      refreshAccessToken();
    }
  }

  function fetchAccessToken( code ){
    let body = "grant_type=authorization_code";
    body += "&code=" + code;
    body += "&redirect_uri=" + redirect_uri;
    body += "&client_id=" + client_id;
    body += "&client_secret=" + client_secret;
    callAuthorizationApi(body);
  }

  function refreshAccessToken(){
    $.ajax({
      url:"../backend/get_tokens.php",
      method:"POST",
      success:function(data){
        data = JSON.parse(data);
        var refresh_token = data.refresh;
        let body = "grant_type=refresh_token";
        body += "&refresh_token=" + refresh_token;
        body += "&client_id=" + client_id;
        callAuthorizationApi(body);
      }
    })
  }

  function callAuthorizationApi(body){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", TOKEN, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.setRequestHeader('Authorization', 'Basic ' + btoa(client_id + ":" + client_secret));
    xhr.send(body);
    xhr.onload = handleAuthorizationResponse;
  }

  function handleAuthorizationResponse(){
    if(this.status == 200){
      var access_token;
      var refresh_token;
      var data = JSON.parse(this.responseText);
      var data = JSON.parse(this.responseText);
      if(data.refresh_token != undefined){
          refresh_token = data.refresh_token;
          $.ajax({
            url:"../backend/set_refresh_token.php",
            method:"POST",
            data:{
              refresh:refresh_token
            },
            dataType:"JSON",
            success:function(data){
            }
          })
      }
      if(data.access_token != undefined){
          access_token = data.access_token;
          $.ajax({
            url:"../backend/set_access_token.php",
            method:"POST",
            data:{
              access:access_token
            },
            dataType:"JSON",
            success:function(data){
              if(message == "new user"){
                loadPlaylists(access_token);
              }
              else{
                $(location).attr('href', '../pages/home.php');
              }
            }
          })
      }
    }
    else {
      console.log(this.responseText);
    }
  }

  function loadPlaylists(access_token){
    $.ajax({
      url: `https://api.spotify.com/v1/me/playlists?limit=10`,
      type: 'GET',
      headers: {
          'Authorization' : 'Bearer ' + access_token
      },
      success: function(data) {
        var length = data.items.length;
        for(i = 0; i < length; i++){
          var image_url = data.items[i].images[0].url;
          var name = data.items[i].name;
          var public = 1;
          var url = data.items[i].external_urls.spotify;
          var spotify_id = data.items[i].id;

          var playlist_owner = data.items[i].owner.display_name;

          //if creator is not spotify
          if(playlist_owner != "Spotify"){
            $.ajax({
              url:"../backend/add_playlist.php",
              method:"POST",
              data:{
                image_url:image_url,
                name:name,
                public:public,
                url:url,
                spotify_id:spotify_id
              },
              dataType:"JSON",
              success:function(data){
              }
            })
          }
        } // end of for loop
        $(location).attr('href', '../pages/home.php');
      }
    });// end of overarching ajax call
  }

}); // end of document ready
