<?php
session_start();
require_once "core/config.php";
if((!isset($_SESSION["loggedin"])) || ($_SESSION["loggedin"] !== true)){
    header("location: login.php");
	exit;
}

$id = $_SESSION["id"];
$sql = "SELECT firstname,middlename,lastname FROM users WHERE id = '$id'";
$user = $mysqli-> query($sql);
$sql2 = "SELECT remarks, created_at FROM records WHERE id = '$id'";
$record = $mysqli-> query($sql2);

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
			$info = mysqli_fetch_assoc($user);
			$info2 = mysqli_fetch_assoc($record);
		?>
<div id="background-Image-reg">
    <div class="text-center form1">
        <section class="container-fluid">
            <section class="row justify-content-center">
                <section class="col-12 col-sm-6 col-lg-8">
                    <img src="../images/logo.png" class="bg">
                        <form class="form-container" method="post"> 
                <h4 class="text-center font-eight-bold">My Medical Records</h4>
                    <div>
						<label>Full Name</label>
						<p><?= $info['firstname']; ?> <?= $info['middlename']; ?> <?= $info['lastname']; ?></p>
					</div>
                    <div>
						<label>Remarks</label>
						<p><?= $info2['remarks']; ?></p>
                    </div>
                    <div>
						<label>Date</label>
						<p><?= $info2['created_at']; ?></p>
                    </div>    
                    </form>
                </section>
            </section>
        </section>
    </div>
	</div>
</div>

</body>
</html>



