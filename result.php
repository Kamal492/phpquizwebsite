<?php
$servername = "localhost";
$username = "id14307147_root";
$password = "\we!y5WqH>l9?Xfl";

// Create connection
$conn =  mysqli_connect($servername, $username, $password);

mysqli_select_db($conn,'id14307147_quiz');
session_start();
$u=$_SESSION['username'];
$sql="SELECT * FROM userdetail WHERE username='$u'";
$quer=mysqli_query($conn,$sql);
while($us=mysqli_fetch_array($quer)){
   $id=$us['u_id'];
}
$update="SELECT * FROM level_attempt where use_id='$id'";
$query=mysqli_query($conn,$update);
while($rows = mysqli_fetch_array($query)){
     $at1=$rows['attempt_1'];
     $ans1=$rows['ans_1'];
     $at2=$rows['attempt_2'];
     $ans2=$rows['ans_2'];
     $at3=$rows['attempt_3'];
     $ans3=$rows['ans_3'];
     $at4=$rows['attempt_4'];
     $ans4=$rows['ans_4'];
}
$total_ques=$at1+$at2+$at3+$at4;
$total_right=$ans1+$ans2+$ans3+$ans4;
$total_score=($ans1)+(2*$ans2)+(3*$ans3)+(4*$ans4);
?>









<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
    
  </head>
  <body class="login-body" style="height:95vh">
  <p class="result-heading">RESULT</p>
  <div class="result">
      <table>
        <tr>
        <th>Level</th>
        <th>Question attempted</th>
        <th>Right answer</th>
        <th>Score</th>
        </tr>
        <tr>
        <td>Level 1</td>
        <td><?php echo $at1;?></td>
        <td><?php echo $ans1;?></td>
        <td><?php echo $ans1;?></td>
        </tr>
        <tr>
        <td>Level 2</td>
        <td><?php echo $at2;?></td>
        <td><?php echo $ans2;?></td>
        <td><?php echo 2*$ans2;?></td>
        </tr>
        <tr>
        <td>Level 3</td>
        <td><?php echo $at3;?></td>
        <td><?php echo $ans3;?></td>
        <td><?php echo 3*$ans3;?></td>
        </tr>
        <tr>
        <td>Level 4</td>
        <td><?php echo $at4;?></td>
        <td><?php echo $ans4;?></td>
        <td><?php echo 4*$ans4;?></td>
        </tr>
        <tr>
        <td>Total</td>
        <td><?php echo $total_ques;?></td>
        <td><?php echo $total_right;?></td>
        <td><?php echo $total_score;?></td>
        </tr>
      </table>
      </div>
      <form method="post" action="logout.php">
      <input type="submit" class="logout-btn" value="Logout" name="final_logout">
      </form>
      
</body>
</html>