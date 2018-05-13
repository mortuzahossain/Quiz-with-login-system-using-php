<!DOCTYPE html>
<html>
<head>
	<title>Project || Register Page</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

    <div>
         <a href="login.php" class="right-shift"><button class="btn btn-success">Login</button></a>
    </div>
	
	<div class="text-center header-img">
		<a href="index.php"><img src="img/logo.jpg"></a>
	</div>

<?php
include 'inc/db_config.php';

if (isset($_POST['signup'])) {
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $idno = mysqli_real_escape_string($con,$_POST['idno']);
    $fname = mysqli_real_escape_string($con,$_POST['fname']);
    $lname = mysqli_real_escape_string($con,$_POST['lname']);
    $phone = mysqli_real_escape_string($con,$_POST['phone']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    $sql = "SELECT id FROM user WHERE email = '$email'";
    $result = mysqli_query($con,$sql);
    $have_user = mysqli_num_rows($result);

    if ($have_user == 0) { #No user in the database
        $sql = "INSERT INTO user (email,id_no,password,firstname,lastname,phone) VALUES ('$email','$idno','$password','$fname','$lname','$phone')";

        $result = mysqli_query($con,$sql);
     
        if ($result) {
            echo "User Added Succeffdully. Please Login Hare <a href='login.php'>Login</a>";
        }
    } else {
        echo "User Already Exist.";
    }

}

?>

    <div class="container">

      <form class="form-signin" method="post" accept="">
        <h2 class="form-signin-heading text-center">Register Hare</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" class="form-control" placeholder="Email address" required autofocus name="email">
        <label for="inputEmail" class="sr-only">Id No</label>
        <input type="text" class="form-control middle" placeholder="Id No" required autofocus name="idno">
        <label for="inputEmail" class="sr-only">First Name</label>
        <input type="text" class="form-control middle" placeholder="First Name" required autofocus name="fname">
        <label for="inputEmail" class="sr-only">Laast Name</label>
        <input type="text" class="form-control middle" placeholder="Last Name" required autofocus name="lname">
        <label for="inputEmail" class="sr-only">Phone Number</label>
        <input type="text" class="form-control middle" placeholder="Phone Number" required autofocus name="phone">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" class="form-control" placeholder="Password" required name="password">
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="signup">Sign Up</button>
      </form>

    </div>

<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>