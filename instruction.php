<?php 
session_start();
$name=$_SESSION['username'];

$servername = "localhost";
$username = "id14307147_root";
$password = "\we!y5WqH>l9?Xfl";

// Create connection
$conn =  mysqli_connect($servername, $username, $password);

mysqli_select_db($conn,'id14307147_quiz');

$p= "SELECT * FROM logoutdetail WHERE username='$name'";
$pq=mysqli_query($conn,$p);
$num_row = mysqli_num_rows($pq);


while($r = mysqli_fetch_array($pq)){
  $ar1=$r['level1'];
  $ar2=$r['level2'];
  $ar3=$r['level3'];
  $ar4=$r['level4'];

}

$query_for_attempt="SELECT * FROM logout_attempt_detail WHERE username='$name' ";
$at=mysqli_query($conn,$query_for_attempt);

while($attempt = mysqli_fetch_array($at)){
  $last_index_1=$attempt['num_1'];
  $last_index_2=$attempt['num_2'];
  $last_index_3=$attempt['num_3'];
  $last_index_4=$attempt['num_4'];
}

if(isset($_POST['start'])){

  if($num_row!=0){

if($ar1!="0"){
  
 $arr=unserialize($ar1);
 

$array2=[6,7,8,9,10];
$array3=[11,12,13,14,15];
$array4=[16,17,18,19,20];

shuffle($array2);
shuffle($array3);
shuffle($array4);

  $_SESSION['level_arr_1']=$arr;
  $_SESSION['level_arr_2']=$array2;
  $_SESSION['level_arr_3']=$array3;
  $_SESSION['level_arr_4']=$array4;



  $_SESSION['num_1']=$last_index_1;
  $_SESSION['num_2']=0;
  $_SESSION['num_3']=0;
  $_SESSION['num_4']=0;

  $check="SELECT * FROM userdetail WHERE username='$name'";
  $quer=mysqli_query($conn,$check);
while($get_id=mysqli_fetch_array($quer)){
   $id=$get_id['u_id'];
}

$find="SELECT * FROM level_attempt WHERE use_id='$id'";
$query_find=mysqli_query($conn,$find);
while($get_right=mysqli_fetch_array($query_find)){
  $right=$get_right['ans_1'];
  $num_attempt=$get_right['attempt_1'];
}



  $_SESSION['right_1']=$right;
$_SESSION['level1_attempted']=$num_attempt;
$_SESSION['right_2']=0;
$_SESSION['level2_attempted']=0;
$_SESSION['right_3']=0;
$_SESSION['level3_attempted']=0;
$_SESSION['right_4']=0;
$_SESSION['level4_attempted']=0;

  header('location:level1.php');

}
///////////////////////////////
else  if($ar2!="0"){


 
  $arr=unserialize($ar2);
 
  $array3=[11,12,13,14,15];
  $array4=[16,17,18,19,20];
  
  
  shuffle($array3);
  shuffle($array4);
  
    
    $_SESSION['level_arr_2']=$arr;
    $_SESSION['level_arr_3']=$array3;
    $_SESSION['level_arr_4']=$array4;
  
  
  
    $_SESSION['num_1']=0;
    $_SESSION['num_2']=$last_index_2;
    $_SESSION['num_3']=0;
    $_SESSION['num_4']=0;
  
    $check="SELECT * FROM userdetail WHERE username='$name'";
    $quer=mysqli_query($conn,$check);
  while($get_id=mysqli_fetch_array($quer)){
     $id=$get_id['u_id'];
  }
  
  $find="SELECT * FROM level_attempt WHERE use_id='$id'";
  $query_find=mysqli_query($conn,$find);
  while($get_right=mysqli_fetch_array($query_find)){
    $right=$get_right['ans_2'];
    $num_attempt=$get_right['attempt_2'];
  }
  
  
  
   
  $_SESSION['right_2']=$right;
  $_SESSION['level2_attempted']=$num_attempt;
  $_SESSION['right_3']=0;
  $_SESSION['level3_attempted']=0;
  $_SESSION['right_4']=0;
  $_SESSION['level4_attempted']=0;

  header('location:level2.php');
}
////////////////////////////////////////////
else  if($ar3!="0"){
  $arr=unserialize($ar3);
  
  $array4=[16,17,18,19,20];
  
  
  shuffle($array4);
  
    
    $_SESSION['level_arr_3']=$arr;
    $_SESSION['level_arr_4']=$array4;
  
  
  
    $_SESSION['num_1']=0;
    $_SESSION['num_2']=0;
    $_SESSION['num_3']=$last_index_3;
    $_SESSION['num_4']=0;
  
    $check="SELECT * FROM userdetail WHERE username='$name'";
    $quer=mysqli_query($conn,$check);
  while($get_id=mysqli_fetch_array($quer)){
     $id=$get_id['u_id'];
  }
  
  $find="SELECT * FROM level_attempt WHERE use_id='$id'";
  $query_find=mysqli_query($conn,$find);
  while($get_right=mysqli_fetch_array($query_find)){
    $right=$get_right['ans_3'];
    $num_attempt=$get_right['attempt_3'];
  }
  
  
  
   
  
  $_SESSION['right_3']=$right;
  $_SESSION['level3_attempted']=$num_attempt;
  $_SESSION['right_4']=0;
  $_SESSION['level4_attempted']=0;
  header('location:level3.php');
}
///////////////////////////////////
else  if($ar4!="0"){
 
  $arr=unserialize($ar4);
  $_SESSION['level_arr_4']=$arr;
  
  
  
  $_SESSION['num_1']=0;
  $_SESSION['num_2']=0;
  $_SESSION['num_3']=0;
  $_SESSION['num_4']=$last_index_4;

  $check="SELECT * FROM userdetail WHERE username='$name'";
  $quer=mysqli_query($conn,$check);
while($get_id=mysqli_fetch_array($quer)){
   $id=$get_id['u_id'];
}

$find="SELECT * FROM level_attempt WHERE use_id='$id'";
$query_find=mysqli_query($conn,$find);
while($get_right=mysqli_fetch_array($query_find)){
  $right=$get_right['ans_4'];
  $num_attempt=$get_right['attempt_4'];
}

$_SESSION['right_4']=$right;
$_SESSION['level4_attempted']=$num_attempt;
  header('location:level4.php');
}
else{
  $array1=[1,2,3,4,5];
$array2=[6,7,8,9,10];
$array3=[11,12,13,14,15];
$array4=[16,17,18,19,20];
shuffle($array1);
shuffle($array2);
shuffle($array3);
shuffle($array4);

$_SESSION['level_arr_1']=$array1;
$_SESSION['level_arr_2']=$array2;
$_SESSION['level_arr_3']=$array3;
$_SESSION['level_arr_4']=$array4;
$_SESSION['num_1']=0;
$_SESSION['num_2']=0;
$_SESSION['num_3']=0;
$_SESSION['num_4']=0;
$_SESSION['right_1']=0;
$_SESSION['level1_attempted']=0;
$_SESSION['right_2']=0;
$_SESSION['level2_attempted']=0;
$_SESSION['right_3']=0;
$_SESSION['level3_attempted']=0;
$_SESSION['right_4']=0;
$_SESSION['level4_attempted']=0;

  header('location:level1.php');


}}
//////////////////////////////////////////////////////
else{
  $array1=[1,2,3,4,5];
$array2=[6,7,8,9,10];
$array3=[11,12,13,14,15];
$array4=[16,17,18,19,20];
shuffle($array1);
shuffle($array2);
shuffle($array3);
shuffle($array4);

$_SESSION['level_arr_1']=$array1;
$_SESSION['level_arr_2']=$array2;
$_SESSION['level_arr_3']=$array3;
$_SESSION['level_arr_4']=$array4;
$_SESSION['num_1']=0;
$_SESSION['num_2']=0;
$_SESSION['num_3']=0;
$_SESSION['num_4']=0;
$_SESSION['right_1']=0;
$_SESSION['level1_attempted']=0;
$_SESSION['right_2']=0;
$_SESSION['level2_attempted']=0;
$_SESSION['right_3']=0;
$_SESSION['level3_attempted']=0;
$_SESSION['right_4']=0;
$_SESSION['level4_attempted']=0;

  header('location:level1.php');
}


}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Quiz-Home</title>
    <link rel="stylesheet" href="style.css">
    
  </head>
  <body class="login-body" style="height:auto;">
  <h1 class="h1-login">Welcome  to Quiz World</h1>
  <h2 style="color:white;" class="signin-heading"><?php echo $name ?>,here is some instructions you should follow</h2>
  <div class="instruction">
  <h2>Instructions</h2>
  <div class="instr">
      <ul>
          <li>There are four levels in this quiz.</li>
          <li>In each level, there are five questions.</li>
          <li>In level 1, each question have 1 score.</li>
          <li>In level 2, each question have 2 score.</li>
          <li>In level 3, each question have 3 score.</li>
          <li>In level 4, each question have 4 score.</li>
          <li>In each question, there are four options and you have to choose any one of them.</li>
      </ul>
</div>
<form method="post" action="instruction.php">
 <input type="submit" name="start" value="start" class="next-btn">
 <form>
  </div>
  </body>
  </html>