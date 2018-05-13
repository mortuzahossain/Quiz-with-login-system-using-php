<?php
include 'inc/db_config.php';

session_start();

if (!isset($_SESSION['id'])) {
    header('Location:login.php');
    exit();
}

$fname = $_SESSION['firstname'];
$id_no = $_SESSION['id_no'];

// After Submiting the Ans
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header("Location:index.php");
    exit();
}

// Create The Ans Array For The User Selected


// Geting The 5 Questions Id
$q1 = $_POST['q1'];
$q2 = $_POST['q2'];
$q3 = $_POST['q3'];
$q4 = $_POST['q4'];
$q5 = $_POST['q5'];



// SQL FOR GETING RIGHT ANS AND ALL THE INFO FOR SHOWING THE ANS

$sql = "SELECT id,question,a,b,c,d,ans FROM quiz WHERE id in ($q1,$q2,$q3,$q4,$q5) ORDER BY CASE id when $q1 then 1 when $q2 then 2 when $q3 then 3 when $q4 then 4 when $q5 then 5 end";

$result = mysqli_query($con,$sql);
while ($row = mysqli_fetch_assoc($result)) {
    $questions[] = $row;
}

// Check The Ans For right and wrong
$i = 0;
$right_ans = 0;
// Counting the right ans
foreach ($questions as $question) {
    $i = $i + 1;
    $name = 'q'.$i.'_answers';
    if ( ! strcasecmp($question['ans'],  $_POST[$name]) ) {
        $right_ans = $right_ans + 1;
    }
}
// Counting the wrong ans
$wrong_ans = 5 - $right_ans;

?>


<!DOCTYPE html>
<html>
<head>
	<title>Project || Answer Page</title>
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
        <h1>Right Ans : <?php echo $right_ans; ?></h1>
        <h1>Wrong Ans : <?php echo $wrong_ans; ?></h1>
    </div>

    <hr>
    <div class="container text-center">
        <h2>Check The Correct Answer If You Needed . </h2>
    </div>    
    <hr>

    <div class="container">
        
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
                        <input type="radio" name="q<?php echo $i; ?>_answers" id="A" value="a" <?php if($question['ans'] == 'a'){echo 'checked="checked"';} ?>/>
                        <label for="A"><?php echo $question['a']; ?></label>
                    </div>
                    
                    <div>
                        <input type="radio" name="q<?php echo $i; ?>_answers" id="B" value="b" <?php if($question['ans'] == 'b'){echo 'checked="checked"';} ?>/>
                        <label for="B"><?php echo $question['b']; ?></label>
                    </div>
                    
                    <div>
                        <input type="radio" name="q<?php echo $i; ?>_answers" id="C" value="c" <?php if($question['ans'] == 'c'){echo 'checked="checked"';} ?>/>
                        <label for="C"><?php echo $question['c']; ?></label>
                    </div>
                    
                    <div>
                        <input type="radio" name="q<?php echo $i; ?>_answers" id="D" value="d" <?php if($question['ans'] == 'd'){echo 'checked="checked"';} ?>/>
                        <label for="D"><?php echo $question['d']; ?></label>
                    </div>
                
                </li>

                <?php
                }
                ?> 


            </ol>
    </div>


    <hr>

<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>