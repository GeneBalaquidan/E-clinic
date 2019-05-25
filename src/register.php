<?php

require_once "core/config.php";
 
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
$firstName = $midName = $lastName = $gender = "";
$firstName_err = $midName_err = $lastName_err = $gender_err = "";
$email = $contact = $address = $occupation = $birthday = "";
$email_err = $contact_err = $address_err = $occupation_err = $birthday_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        $sql = "SELECT id FROM users WHERE username = ?";
        if($stmt = $mysqli->prepare($sql)){
            $stmt->bind_param("s", $param_username);
            $param_username = trim($_POST["username"]);
            if($stmt->execute()){
                $stmt->store_result();
                if($stmt->num_rows == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        $stmt->close();
    }
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have at least 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
        }
        if(empty(trim($_POST["firstName"]))){
            $firstName_err = "Please enter a first name.";
        }else{
            $firstName = trim($_POST["firstName"]);
        }
        if(empty(trim($_POST["midName"]))){
            $midName_err = "Please enter a middle name.";
        }else{
            $midName = trim($_POST["midName"]);
        }
        if(empty(trim($_POST["lastName"]))){
            $lastName_err = "Please enter a last name.";
        }else{
            $lastName = trim($_POST["lastName"]);
        }
        if(empty(trim($_POST["contact"]))){
            $contact_err = "Please enter a contact number.";
        }else{
            $contact = trim($_POST["contact"]);
        }
        if(!isset($_POST['gender'])){
            $gender_err = "Please select a gender.";
        }else
        {
            $gender = trim($_POST["gender"]);
        }
        if(empty(trim($_POST["email"]))){
            $email_err = "Please enter your email.";
        }else{
            $email = trim($_POST["email"]);
        }
        if(!isset($_POST['birthday'])){
            $birthday_err = "Please select your birthday.";
        }else
        {
            $birthday = trim($_POST["birthday"]);
        }
        if(empty(trim($_POST["address"]))){
            $address_err = "Please enter your address.";
        }else{
            $address = trim($_POST["address"]);
        }
        if(empty(trim($_POST["occupation"]))){
            $occupation_err = "Please enter your occupation.";
        }else{
            $occupation = trim($_POST["occupation"]);
        }
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($firstName_err)
    && empty($midName_err) && empty($lastName_err) && empty($email_err) && empty($contact_err)
    && empty($address_err) && empty($birthday_err) && empty($gender_err) && empty($occupation_err)){
        
        $sql = "INSERT INTO users(username,password,firstname,middlename,lastname,email,contact,gender,
        birthdate,address,occupation) VALUES (?,?,?,?,?,?,?,?,?,?,?);";
         
        if($stmt = $mysqli->prepare($sql)){
            
            $stmt->bind_param("sssssssssss", $param_username, $param_password, $param_firstname, $param_middlename,
            $param_lastname, $param_contact, $param_email, $param_birthdate, $param_address, $param_gender,
            $param_occupation);
            
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_BCRYPT);
            $param_firstname = $firstName;
            $param_middlename = $midName;
            $param_lastname = $lastName;
            $param_contact = $contact;
            $param_email = $email;
            $param_birthdate = $birthday;
            $param_address = $address;
            $param_gender = $gender;
            $param_occupation = $occupation;

            if($stmt->execute()){
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
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
    <title>Register Form</title>
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
	include 'loggedOut.html';
?>
<div id="background-Image-reg">
    <div class="form1">
        <section class="container-fluid">
            <section class="row justify-content-center">
                <section class="col-12 col-sm-6 col-lg-8">
                    <img src="../images/logo.png" class="bg">
                        <form class="form-container" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
                <h4 class="text-center font-eight-bold">Registration Form</h4>
                <table><tr><td>
                    <div  class="form-group <?php echo (!empty($firstName_err)) ? 'has-error' : ''; ?>">
                        <label>First Name</label>
                        <input type="text" class="form-control" id="FirstName" name="firstName" value="<?php echo $firstName; ?>">
                        <span class="help-block"><?php echo $firstName_err; ?></span>
                    </div>
                </td><td>
                    <div class="form-group <?php echo (!empty($midName_err)) ? 'has-error' : ''; ?>">
                        <label>Middle Name</label>
                        <input type="text" class="form-control" id="MiddleName" name="midName" value="<?php echo $midName; ?>">
                        <span class="help-block"><?php echo $midName_err; ?></span>
                    </div>
                </td><td>
                    <div class="form-group <?php echo (!empty($lastName_err)) ? 'has-error' : ''; ?>">
                        <label>Last Name</label>
                        <input type="text" class="form-control" id="LastName" name="lastName" value="<?php echo $lastName; ?>">
                        <span class="help-block"><?php echo $lastName_err; ?></span>
                    </div>
                </td><td></tr>
                <tr><td>
                    <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                        <span class="help-block"><?php echo $username_err; ?></span>
                    </div>
                </td><td>
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                        <span class="help-block"><?php echo $password_err; ?></span>
                    </div>
                </td><td>
                    <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                        <label>Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                        <span class="help-block"><?php echo $confirm_password_err; ?></span>
                    </div>
                </td><td></tr>
                <tr><td>
                    <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                        <span class="help-block"><?php echo $email_err; ?></span>
                    </div>
                </td><td>
                    <div class="form-group <?php echo (!empty($contact_err)) ? 'has-error' : ''; ?>">
                        <label>Contact Number</label>
                        <input type="text" name="contact" class="form-control" value="<?php echo $contact; ?>">
                        <span class="help-block"><?php echo $contact_err; ?></span>
                    </div> 
                </td><td>   
                    <div class="form-group <?php echo (!empty($occupation_err)) ? 'has-error' : ''; ?>">
                        <label>Occupation</label>
                        <input type="text" class="form-control" id="occupation" name="occupation" value="<?php echo $occupation; ?>">
                        <span class="help-block"><?php echo $occupation_err; ?></span>
                    </div>
                </td></tr>
                <tr><td>
                    <div  class="form-group <?php echo (!empty($gender_err)) ? 'has-error' : ''; ?>">
                        <label>Gender</label>
                        <table><tr><td colspan='2'>
                        <input type="radio" name="gender" value="Male"> Male
                        <input type="radio" name="gender" value="Female"> Female
                        </td></tr></table>
                        <span class="help-block"><?php echo $gender_err; ?></span>
                    </div>
                </td><td>
                    <div class="form-group <?php echo (!empty($birthday_err)) ? 'has-error' : ''; ?>">
                        <label>BirthDate</label>
                        <input class="form-control" type="date" value="<?php echo $birthday; ?>" name="birthday">
                    </div>
                </td><td>
                    <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                        <label>Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>">
                        <span class="help-block"><?php echo $address_err; ?></span>
                    </div>
                </td></tr></table>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <p>Already have an account? <a href="login.php">Login here</a>.</p>
                    </form>
                </section>
            </section>
        </section>
    </div>
    
</body>
</html>
