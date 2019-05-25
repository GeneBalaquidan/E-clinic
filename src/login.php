<?php
session_start();
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
require_once "core/config.php";
 
$username = $password = "";
$username_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

    if(empty($username_err) && empty($password_err)){

        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = $mysqli->prepare($sql)){
      
            $stmt->bind_param("s", $param_username);
            
            
            $param_username = $username;
            
            
            if($stmt->execute()){
                
                $stmt->store_result();
                
                
                if($stmt->num_rows === 1){                    
                    
                    $stmt->bind_result($id, $username, $hashed_password);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            
                            session_start();
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            header("location: index.php");
                        } else{
                            
                            $password_err = "The password you entered was not valid.";

                        }
                    }
                } else{
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        $stmt->close();
    }
    $mysqli->close();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href"../bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../css/main.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1,user-scaleable=no">
	<script src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<?php
	include 'loggedOut.html';
?>
<div id="background-Image">
	<div class="form1">
		<section class="container-fluid">
			<section class="row justify-content-md-center">
				<section class="col-12 col-sm-6 col-lg-7">
					<img src="../images/logo.png" class="bg">
					   <form class="form-container" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <h4 class="text-center font-eight-bold">Login Form</h4>
                            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                                <span class="help-block"><?php echo $username_err; ?></span>
                            </div>    
                            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                                <span class="help-block"><?php echo $password_err; ?></span>
                            </div>
                            <div class="form-group">
                                 <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
                            
                    </form>
				</section>
			</section>
		</section>
    </div>
</div>
</div>
<footer class-"text-center"><p  id="footer">&copy; Copyright 2019 E-Clinic</p></footer>
</body>
</html>
