<?php

session_start();
 require_once "core/config.php";
if((!isset($_SESSION["loggedin"])) || ($_SESSION["loggedin"] !== true)){
    header("location: login.php");
    exit;
}

	$sql = "SELECT * FROM developers WHERE featured = 1";
	$featured = $mysqli-> query($sql);


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
		<?php
			$num=0;
			while($devs = mysqli_fetch_assoc($featured)) :
			$num = $num + 1;
		?>
		<div id="background-Image-reg">
    <div class="text-center form1">
        <section class="container-fluid">
            <section class="row justify-content-center">
                <section class="col-12 col-sm-6 col-lg-8">
                    <img src="../images/logo.png" class="bg">
                        <form class="form-container"> 
                <h4 class="text-center font-eight-bold">The Developer</h4>
                    <div class="form-group">
						<h4><?= $devs['name']; ?></h4>
					</div>
					<div class="form-group">
						<img src="<?= $devs['images']; ?>" alt="<?= $devs['title']; ?>" id="images"/>
                    </div>
                    <div class="form-group">
						<h4><?= $devs['title']; ?></h4>
                    </div>
                    <div class="form-group">
						<h4><?= $devs['phone']; ?></h4>
                    </div>    
                    <div class="form-group">
						<h4><?= $devs['email']; ?></h4>
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


	</div>
</div>

</body>
</html>