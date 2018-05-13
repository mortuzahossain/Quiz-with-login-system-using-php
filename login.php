<!DOCTYPE html>
<html>
<head>
	<title>Project || Login Page</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	
	<div class="text-center header-img">
		<a href="index.php"><img src="img/logo.jpg"></a>
	</div>


<div class="container text-center">
<?php
include 'inc/db_config.php';

session_start();

if (isset($_POST['submit'])) {
  $email = mysqli_real_escape_string($con,$_POST['email']);
  $password = mysqli_real_escape_string($con,$_POST['password']);

  // Check For Empty String

  if (!empty($email) && !empty($password)) {

    $sql = "SELECT id,id_no,firstname FROM user WHERE email = '$email' AND password = '$password'";

    $result = mysqli_query($con,$sql);
    $have_user = mysqli_num_rows($result);

    if ($have_user == 1) { # Have User
      $result = $result->fetch_assoc();
      $id = $result['id'];
      $id_no = $result['id_no'];
      $fname = $result['firstname'];

      $_SESSION['id'] = $id;
      $_SESSION['id_no'] = $id_no;
      $_SESSION['firstname'] = $fname;

      // Change The User to the Index Page
      header('Location:index.php');
    } else {
      echo "No User Found";
    }
  } else {
    echo "Please Fill All The Inpput Field";
  }
}

?>
</div>


    <div class="container">

      <form class="form-signin" method="post" accept="">
        <h2 class="form-signin-heading text-center">Please Login</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" class="form-control" placeholder="Email address" required autofocus name="email">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" class="form-control" placeholder="Password" required name="password">
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Login</button>
      </form>
      
      <div  class="form-signin">
          <a href="register.php"><button class="btn btn-lg btn-primary btn-block" type="submit">Register</button></a>
      </div>
        

    </div>

<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>