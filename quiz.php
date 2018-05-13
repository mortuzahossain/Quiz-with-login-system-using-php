<?php
include 'inc/db_config.php';

session_start();

if (!isset($_SESSION['id'])) {
    header('Location:login.php');
    exit();
}

$fname = $_SESSION['firstname'];
$id_no = $_SESSION['id_no'];

if ( !isset($_GET['l']) || !isset($_GET['t']) || !isset($_GET['c'])) {
    

    header("Location:index.php");
    exit();



} else {

    $level = $_GET['l'];
    $tearm = $_GET['t'];
    $course = $_GET['c'];

    $sql = "SELECT id,question,a,b,c,d FROM quiz WHERE level = '$level' AND tearm = '$tearm' AND course = '$course' ORDER BY RAND() LIMIT 5";# For Showing the Question -> ORDER BY RAND() LIMIT 5 
    $result = mysqli_query($con,$sql);

    if (!$result) {
        header("Location:index.php");
        exit();
    }

    if (mysqli_num_rows($result) == 5) {

        while ($row = mysqli_fetch_assoc($result)) {
            $questions[] = $row;
        }
    } else {
        header("Location:index.php");
        exit();
    }
    // var_dump($questions);
}


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
    <hr>

    <div class="container">
        <form action="ans.php" method="post" id="quiz">
        
            <ol>
            
                <?php
                    $i = 0;
                    foreach ($questions as $question) {
                        $i = $i +1;
                ?>

                <li>
                
                    <h3><?php echo $question['question']; ?></h3>
                    
                    <input type="hidden" name="q<?php echo $i; ?>" value="<?php echo $question['id']; ?>">

                    <div>
                        <input type="radio" name="q<?php echo $i; ?>_answers" id="A" value="a" required/>
                        <label for="A"><?php echo $question['a']; ?></label>
                    </div>
                    
                    <div>
                        <input type="radio" name="q<?php echo $i; ?>_answers" id="B" value="b" />
                        <label for="B"><?php echo $question['b']; ?></label>
                    </div>
                    
                    <div>
                        <input type="radio" name="q<?php echo $i; ?>_answers" id="C" value="c" />
                        <label for="C"><?php echo $question['c']; ?></label>
                    </div>
                    
                    <div>
                        <input type="radio" name="q<?php echo $i; ?>_answers" id="D" value="d" />
                        <label for="D"><?php echo $question['d']; ?></label>
                    </div>
                
                </li>

                <?php
                }
                ?>


            </ol>
        
    <hr>    
            <button type="submit" class="btn btn-success" name="submit">Submit</button>
        </form>
    </div>


    <hr>

<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>