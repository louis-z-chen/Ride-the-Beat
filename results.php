<?php
session_start();


?>

<!DOCTYPE html>
<html>
<head>
	<title>Ride the Beat</title>

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/aef7737b1c.js" crossorigin="anonymous"></script>
	<link href= "styles.css" rel="stylesheet">

	<!--internal css for now until styles.css is finished -->
	<style>
	html, body{
		padding: 0;
		margin:0;
		height: 100%;
	}
	.main-body{
		width: 80%;
    background-color: lightgrey;
	}
	.center {
	  display: block;
	  margin-left: auto;
	  margin-right: auto;
	}
  .border-right {
    border-right: 1px solid black;
  }


	</style>

</head>
<body>
	<?php require "menu.php"; ?>

  <div class = "main-body center">

    <div class="container">
      <div class="row">
        <div class="col-md">
          One of four columns
        </div>
        <div class="col-md">
          One of four columns
        </div>
        <div class="col-md">
          One of four columns
        </div>
        <div class="col-md">
          One of four columns
        </div>
      </div>
    </div>

	</div>



	<!-- Required meta tags -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
