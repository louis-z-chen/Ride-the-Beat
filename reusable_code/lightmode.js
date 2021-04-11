$("#lightmode").on('click', function() {
	change_colors()
})

function change_colors() {
	//$('body').toggleClass('dark-mode-background')

  if(document.getElementById("lightmode").innerHTML === "Light Mode"){
    $("#lightmode").html("Light Mode")
    console.log("fuck")
  }
  else{
    $("#lightmode").html("Dark Mode")
    console.log("fuck2")
  }

  /*
	if($('body').hasClass('dark-mode-background')) {
		$("#darkmode").html("Light Mode")
		$("#darkmode").removeClass("btn-dark")
		$("#darkmode").addClass("btn-light")
	} else {
		$("#darkmode").html("Dark Mode")
		$("#darkmode").removeClass("btn-light")
		$("#darkmode").addClass("btn-dark")
	}
  */

	$.ajax({
		method: "POST",
		url: "../reusable_code/lightmode.php",
		data: {
			lightmode: (document.getElementById("lightmode").innerHTML === "Dark Mode")
		}
	}).done(function( response ) {
		//alert(response)
	})
}
