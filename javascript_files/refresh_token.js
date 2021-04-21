$(document).ready(function() {

  setInterval(refreshAccessToken(), 1000 * 60 * 60);

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
            }
          })
      }
    }
    else {
      console.log(this.responseText);
    }
  }

} // end of document ready
