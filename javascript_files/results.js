$('#toggle-btn').change(function(){
  var curr = $(this).prop('checked');

  //if true its spotify, if false its database
  if(curr){
    console.log("true");
    $('#spotify-results').css("display","block");
    $('#database-results').css("display","none");
  }
  else{
    console.log("false");
    $('#spotify-results').css("display","none");
    $('#database-results').css("display","block");
  }

});
