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
			ABOUT US
		</h2>
        <div class="row">
      <div class="col-lg-8">
        <img class="img-fluid rounded mb-4" src="../images/neust3.jpeg" alt="">
      </div>
      <div class="col-lg-3">
        <h2 style="text-align: center;">N.E.U.S.T.</h2>
    
        <p class="about" style="text-align: justify;">Nueva Ecija University of Science and Technology, it is a university located at the province of Nueva Ecija in the Philippines.</p>

        <p style="text-align: justify;">It has many branches within Nueva Ecija.</p>
      </div>
    </div>
</div>
</div>


	</div>
</div>
<footer class-"text-center"><p  id="footer">&copy; Copyright 2019 E-Clinic</p></footer>
</body>
</html>