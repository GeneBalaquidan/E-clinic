<?php
session_start();
require_once "core/config.php";
if((!isset($_SESSION["loggedin"])) || ($_SESSION["loggedin"] !== true)){
    header("location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>E-clinic</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href"css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../css/main.css"/>
	<meta name="vewport" content="width=device-width, initial-scale=1,user-scaleable=no">
	<script src="../boot/js/bootstrap.min.js"></script>
</head>
<body>
<?php
	include 'loggedIn.html';
?>
<div id="background-Image">
<div class="col-md-2"></div>
<div class="col-md-8">
	<div class="row">
		<h2 class="text-center">
			Contact
        </h2>
        <h2 class="text-center">
			N.E.U.S.T. Sumacab Campus Infirmary
        </h2>
        <h2 class="text-center">
        02-4262-5555
        </h2>
		</div>
		<div class="map">
		</div>
        
</div>


	</div>
</div>
<footer class="text-center"><p  id="footer">&copy; Copyright 2019 E-Clinic</p></footer>
</body>
</html>