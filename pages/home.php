<?php
require "../reusable_code/login_logic.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ride the Beat</title>

	<?php require "../reusable_code/header_files.php"; ?>

<style>

@media(max-width:320px) {
.column-info {
	font-size: 20px;
	word-break: break-all;
}

.column-title {
	font-size: 20px;
	word-break: break-all;
}

.bannertext {
	font-size: 30px;
	word-break: break-all;
}
}

@media(max-width:767px) {
  .row-title {
    font-size: 20px;
    word-break: break-all;
  }

.column-info {
	font-size: 15px;
	word-break: break-all;
}

.column-title {
	font-size: 15px;
	word-break: break-all;
}

.bannertext {
	font-size: 30px;
	word-break: break-all;
}
}

@media(max-width:1000px) {
  .row-title {
    font-size: 20px;
    word-break: break-all;
  }

.column-info {
	font-size: 15px;
	word-break: break-all;
}

  .column-title {
    font-size: 15px;
    word-break: break-all;
  }

.bannertext {
	font-size: 30px;
	word-break: break-all;
}
}


@media(max-width:1200px) {
  .column-title {
    font-size: 15px;
    word-break: break-all;
  }

.column-info {
	font-size: 15px;
	word-break: break-all;
}

.bannertext {
	font-size: 30px;
	word-break: break-all;
}
}


</style>
</head>
<body>
	<?php require "../reusable_code/menu.php"; ?>

	<div class = "main-body center">
		<div class="column">
			<div class="column-content">

				<!--Row 1 -->
				<br>
				<div class="content-row">
					<div class="left-banner white-text">
						<h1 class="bannertext">Welcome <?php echo $curr_first ?>!</h1>
					</div>
				</div>

				<!--Row 2 -->
				<div class="content-row picture-row">
					<h4 class="row-title white-text">Artist Spotlight</h4>
					<div class="row">
						<div class="col-md">
							<div class="row-column">
								<img src="../images/Jake2.jpg" class="column-pic"/>
								<div class="column-title white-text">Jake Hope</div>
								<div class="column-info grey-text">Pop</div>
							</div>
						</div>
						<div class="col-md">
							<div class="row-column">
								<img src="../images/Jake2.jpg" class="column-pic"/>
								<div class="column-title white-text">Jake Hope</div>
								<div class="column-info grey-text">Pop</div>
							</div>
						</div>
						<div class="col-md">
							<div class="row-column">
								<img src="../images/Jake2.jpg" class="column-pic"/>
								<div class="column-title white-text">Jake Hope</div>
								<div class="column-info grey-text">Pop</div>
							</div>
						</div>
						<div class="col-md">
							<div class="row-column">
								<img src="../images/Jake2.jpg" class="column-pic"/>
								<div class="column-title white-text">Jake Hope</div>
								<div class="column-info grey-text">Pop</div>
							</div>
						</div>
						<div class="col-md">
							<div class="row-column">
								<img src="../images/Jake2.jpg" class="column-pic"/>
								<div class="column-title white-text">Jake Hope</div>
								<div class="column-info grey-text">Pop</div>
							</div>
						</div>
						<div class="col-md">
							<div class="row-column">
								<img src="../images/Jake2.jpg" class="column-pic"/>
								<div class="column-title white-text">Jake Hope</div>
								<div class="column-info grey-text">Pop</div>
							</div>
						</div>
					</div>

				</div>

				<!--Row 3 -->
				<div class="content-row picture-row">
					<h4 class="row-title white-text">Artist Spotlight</h4>
					<div class="row">
						<div class="col-md">
							<div class="row-column">
								<img src="../images/Jake2.jpg" class="column-pic"/>
								<div class="column-title white-text">Jake Hope</div>
								<div class="column-info grey-text">Pop</div>
							</div>
						</div>
						<div class="col-md">
							<div class="row-column">
								<img src="../images/Jake2.jpg" class="column-pic"/>
								<div class="column-title white-text">Jake Hope</div>
								<div class="column-info grey-text">Pop</div>
							</div>
						</div>
						<div class="col-md">
							<div class="row-column">
								<img src="../images/Jake2.jpg" class="column-pic"/>
								<div class="column-title white-text">Jake Hope</div>
								<div class="column-info grey-text">Pop</div>
							</div>
						</div>
						<div class="col-md">
							<div class="row-column">
								<img src="../images/Jake2.jpg" class="column-pic"/>
								<div class="column-title white-text">Jake Hope</div>
								<div class="column-info grey-text">Pop</div>
							</div>
						</div>
						<div class="col-md">
							<div class="row-column">
								<img src="../images/Jake2.jpg" class="column-pic"/>
								<div class="column-title white-text">Jake Hope</div>
								<div class="column-info grey-text">Pop</div>
							</div>
						</div>
						<div class="col-md">
							<div class="row-column">
								<img src="../images/Jake2.jpg" class="column-pic"/>
								<div class="column-title white-text">Jake Hope</div>
								<div class="column-info grey-text">Pop</div>
							</div>
						</div>
					</div>
				</div>

				<br>

			</div>
		</div>
	</div>

	<?php require "../reusable_code/footer_files.php"; ?>
	<?php require "../reusable_code/lightmode_files.php"; ?>

</body>
</html>
