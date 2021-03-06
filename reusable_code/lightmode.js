//new functions for dark/light mode toggle button
$('#lightmode').change(function(){
	change_colors();
})

function change_colors() {

	var lightmode_on = true;
	var curr = $('#lightmode').prop('checked');
	console.log(curr);
	if(curr){
		//person wants lightmode
		lightmode_on = false;
	}
	else{
	}

	var theme = document.getElementById("theme");
	if (theme.getAttribute('href') == '../stylesheets/dark.css') {
			theme.setAttribute('href', '../stylesheets/light.css');
	}
	else {
			theme.setAttribute('href', '../stylesheets/dark.css');
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

/*
//These function was for dark/light mode button
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
	if (theme.getAttribute('href') == '../stylesheets/dark.css') {
			theme.setAttribute('href', '../stylesheets/light.css');
	}
	else {
			theme.setAttribute('href', '../stylesheets/dark.css');
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
*/
