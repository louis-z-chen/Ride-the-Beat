$("#lightmode").on('click', function() {
	change_colors()
})

function change_colors() {

	var lightmode_on = false;
	if(document.getElementById("lightmode").innerHTML.indexOf("Light") != -1){
		//person wants lightmode
		$("#lightmode").html("Dark Mode")
		lightmode_on = true;
	}
	else{
		//person wants darkmode
		$("#lightmode").html("Light Mode")
	}

	var theme = document.getElementById("theme");
	if (theme.getAttribute('href') == '../pages/dark.css') {
			theme.setAttribute('href', '../pages/light.css');
	}
	else {
			theme.setAttribute('href', '../pages/dark.css');
	}

	$.ajax({
		method: "POST",
		url: "../reusable_code/lightmode.php",
		data: {
			lightmode: lightmode_on
		}
	}).done(function( response ) {
		console.log(lightmode_on);
	})

}
