<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Quiz-Home</title>
    <link rel="stylesheet" href="style.css">
    
  </head>
  <body class="login-body">

  <div class="logout-div">
    
    <form  method="post" action="logout.php">
    <input type="submit" value="Logout" class="level-logout" name="logout_2"></input>
    </form>
</div>
   <h1>Level 2</h1>
   <div class="q_set">
    
<!--php starts-->
    <?php 
$servername = "localhost";
$username = "id14307147_root";
$password = "\we!y5WqH>l9?Xfl";

// Create connection
$conn =  mysqli_connect($servername, $username, $password);

mysqli_select_db($conn,'id14307147_quiz');

?>


<?php
 session_start();
 $arr=$_SESSION['level_arr_2'];




	$i=$_SESSION['num_2'];
    
    $q= "SELECT * from questions where q_id=$arr[$i]";
    $query=mysqli_query($conn,$q);
    while($rows = mysqli_fetch_array($query)){
      ?>

<div class="question" id="question-print[<?php echo $i?>]">
<form method="post" action="checkanswer.php">
        <h4><?php echo $rows['question'];?></h4>
        <?php
         $q= "SELECT * from answers where ques_id=$arr[$i]";
         $query=mysqli_query($conn,$q);
         while($rows = mysqli_fetch_array($query)){ ?>
         <input type="radio" name="quizcheckbox[<?php echo $rows['ques_id'];?>]" value="<?php echo $rows['a_id'];?>"><?php echo $rows['answer'];?><br>
         
      <?php
    }}
    ?>
    <div class="btn-div" >
     <input type="submit" onclick="Change()" class="submit-btn" id="submit-b" name="submit-2_<?php echo $i?>" value="Submit">
    </div>
    </form>
    </div>
    

    
  </form>
</div>
  


  </body>
  </html>