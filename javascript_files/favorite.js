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

}); // end of document ready
