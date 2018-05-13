<?php
include 'inc/db_config.php';

session_start();

if (!isset($_SESSION['id'])) {
    header('Location:login.php');
    exit();
}

$fname = $_SESSION['firstname'];
$id_no = $_SESSION['id_no'];

?>


<!DOCTYPE html>
<html>
<head>
	<title>Project || Index Page</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

    <div>
         <a href="logout.php" class="right-shift"><button class="btn btn-success">Logout</button></a>
    </div>
	
	<div class="text-center header-img">
		<a href="index.php"><img src="img/logo.jpg"></a>
	</div>

    <div class="container">
        <h2>Name : <?php echo $fname; ?></h2>
        <h3>Id : <?php echo $id_no; ?></h3>
    </div>

<?php
    if (isset($_POST['submit'])) {
        $level = $_POST['level'];
        $tearm = $_POST['tearm'];
        $course = $_POST['course'];

        header("Location:quiz.php?l=".urlencode($level)."&t=".urlencode($tearm)."&c=".urlencode($course));
        exit();
    }
?>

    <div class="container">
        <div class="inner_right_demo"> 
        <form action="" method="post" class="form-signin">
            <div class="form_box" style="border:none;">
            
                <div class="form-group">
                    <label>Level</label>
                    <select class="form-control" required name="level">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                    </select>
                </div>
            
                <div class="form-group">
                    <label>Term</label>
                    <select class="form-control" required name="tearm">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Course Title</label>
                    <select class="form-control" required name="course">
                        <option value="1">WEB ENGINEERING </option>
                        <option value="2">SIMULATION & MODELLING</option>
                        <option value="3">ARTIFICIAL INTELIGENTS</option>
                    </select>
                </div>

                <div class="float-right">
                    <input type="reset" value="Reset" class="btn btn-danger">
                    <input type="submit" value="Submit" name="submit" class="btn btn-success">
                </div>

                </div>  
                
            </div>
            </form>
        </div>
    </div>

<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>