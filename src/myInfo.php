<?php
session_start();
require_once "core/config.php";
if((!isset($_SESSION["loggedin"])) || ($_SESSION["loggedin"] !== true)){
    header("location: login.php");
	exit;
}

$username = $_SESSION["username"];
$sql = "SELECT username,firstname,middlename,lastname,address,gender,birthdate,occupation,contact,email,created_at FROM users WHERE username = '$username'";
$user = $mysqli-> query($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>E-clinic</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href"../boot/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../css/main.css"/>
	<meta name="vewport" content="width=device-width, initial-scale=1,user-scaleable=no">
	<script src="../boot/js/bootstrap.min.js"></script>
</head>
<body>
<?php
	include 'loggedIn.html';
?>

		<?php
			$num=0;
			while($info = mysqli_fetch_assoc($user)) :
			$num = $num + 1;

		?>
<div id="background-Image-reg">
    <div class="text-center form1">
        <section class="container-fluid">
            <section class="row justify-content-center">
                <section class="col-12 col-sm-6 col-lg-8">
                    <img src="../images/logo.png" class="bg">
                        <form class="form-container" method="post"> 
                <h4 class="text-center font-eight-bold">My Profile</h4>
                    <div>
						<label>Full Name</label>
						<p><?= $info['firstname']; ?> <?= $info['middlename']; ?> <?= $info['lastname']; ?></p>
					</div>
					<div>
						<label>Username</label>
						<p><?= $info['username']; ?></p>
                    </div>
                    <div>
						<label>Email</label>
						<p><?= $info['email']; ?></p>
                    </div>
                    <div>
						<label>Contact Number</label>
						<p><?= $info['contact']; ?></p>
                    </div>    
                    <div>
						<label>Occupation</label>
						<p><?= $info['occupation']; ?></p>
                    </div>
                    <div>
						<label>Gender</label>
						<p><?= $info['gender']; ?></p>
                    </div>
                    <div>
						<label>BirthDate</label>
						<p class="price"><?= $info['birthdate']; ?></p>
                    </div>
                    <div>
					<label>Address</label>
					<p class="price"><?= $info['address']; ?></p>
					</div>
					<div>
						<label>Created At</label>
						<p><?= $info['created_at']; ?></p>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Edit Profile</button>
                    </div>
                    </form>
                </section>
            </section>
        </section>
    </div>
		<?php

		endwhile;
		?>
	</div>
</div>

</body>
</html>



