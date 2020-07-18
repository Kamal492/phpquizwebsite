<?php 
session_start();
$servername = "localhost";
$username = "id14307147_root";
$password = "\we!y5WqH>l9?Xfl";

// Create connection
$conn =  mysqli_connect($servername, $username, $password);

mysqli_select_db($conn,'id14307147_quiz');
////////check level 1 question////////
$j=$_SESSION['num_1'];


if(isset($_POST['submit-1_'.$j])){
    if(!empty($_POST['quizcheckbox'])){
        
       

       $selected=$_POST['quizcheckbox'];
       
       

      
        $count_right_1=0;
       foreach($selected as $x => $x_value) {
        $key=$x;
        $key_value=$x_value;
       }
       
    
      //  for($i=0;$i<5;$i++){
         
        
     
      $q="SELECT * FROM questions WHERE q_id=$key";
       $query=mysqli_query($conn,$q);
       while($rows=mysqli_fetch_array($query)){
          if($key_value==$rows['ans_id'])
               $_SESSION['right_1']++;
         
       }
      
    }
    $count_right_1=$_SESSION['right_1'];
    $_SESSION['level1_attempted']++;
    $count_level_1_answer=$_SESSION['level1_attempted'];
    if($_SESSION['num_1']<4){
        $_SESSION['num_1']++;  
        header('location:level1.php');  
    }else{
       
    
            
    
    
   $u=$_SESSION['username'];
    $sql="SELECT * FROM userdetail WHERE username='$u'";
   $quer=mysqli_query($conn,$sql);
  while($us=mysqli_fetch_array($quer)){
       $id=$us['u_id'];
   }
    
    $search="SELECT * FROM level_attempt WHERE use_id='$id'";
    $search_quer=mysqli_query($conn,$search);
  while($use=mysqli_fetch_array($search_quer)){
       $nom=$use['attempt_1'];
   }
  
   $num_of_rows = mysqli_num_rows($search_quer);
   
   
   


   if($num_of_rows == 0){
        $in="INSERT INTO level_attempt (use_id,attempt_1,ans_1,attempt_2,ans_2,attempt_3,ans_3,attempt_4,ans_4) VALUE($id,$count_level_1_answer,$count_right_1,0,0,0,0,0,0)";
        $in1=1;
    }else{
        $in = "UPDATE level_attempt SET attempt_1=$count_level_1_answer  WHERE use_id='$id'";
        $in1 = "UPDATE level_attempt SET ans_1=$count_right_1  WHERE use_id='$id'";
    }
   
     if ( ($conn->query($in) === TRUE )&&($conn->query($in1) === TRUE)) {
        
    header('location:level2.php');
       
}
    }
      
}

///////check level 2 question //////////
$level2=$_SESSION['num_2'];
if(isset($_POST['submit-2_'.$level2])){
    if(!empty($_POST['quizcheckbox'])){
        
       

       $selected=$_POST['quizcheckbox'];
       
       

      
        $count_right_2=0;
       foreach($selected as $x => $x_value) {
        $key=$x;
        $key_value=$x_value;
       }
       
    
      //  for($i=0;$i<5;$i++){
         
        
     
      $q="SELECT * FROM questions WHERE q_id=$key";
       $query=mysqli_query($conn,$q);
       while($rows=mysqli_fetch_array($query)){
          if($key_value==$rows['ans_id'])
               $_SESSION['right_2']++;
         
       }
       $count_right_2=$_SESSION['right_2'];
       $_SESSION['level2_attempted']++;
       $count_level_2_answer=$_SESSION['level2_attempted'];
    }
    if($_SESSION['num_2']<4){
        $_SESSION['num_2']++;  
        header('location:level2.php');  
    }else{
       
    
            
    
    
   $u=$_SESSION['username'];
    $sql="SELECT * FROM userdetail WHERE username='$u'";
   $quer=mysqli_query($conn,$sql);
  while($us=mysqli_fetch_array($quer)){
       $id=$us['u_id'];
   }
    
    $search="SELECT * FROM level_attempt WHERE use_id='$id'";
    $search_quer=mysqli_query($conn,$search);
  while($use=mysqli_fetch_array($search_quer)){
       $nom=$use['attempt_2'];
   }
  
   $num_of_rows = mysqli_num_rows($search_quer);
   
   
   


   if($num_of_rows == 0){
        $in="INSERT INTO level_attempt (use_id,attempt_1,ans_1,attempt_2,ans_2,attempt_3,ans_3,attempt_4,ans_4) VALUE($id,$count_level_1_answer,$count_right_1,0,0,0,0,0,0)";
        $in1=1;
    }else{
        $in = "UPDATE level_attempt SET attempt_2=$count_level_2_answer  WHERE use_id='$id'";
        $in1 = "UPDATE level_attempt SET ans_2=$count_right_2  WHERE use_id='$id'";
    }
   
     if ( ($conn->query($in) === TRUE )&&($conn->query($in1) === TRUE)) {
        
    header('location:level3.php');
       
}
    }
      
}

/////// check level 3 questions ////////

$level3=$_SESSION['num_3'];
if(isset($_POST['submit-3_'.$level3])){
    if(!empty($_POST['quizcheckbox'])){
        
       

       $selected=$_POST['quizcheckbox'];
       
       

      
        $count_right_3=0;
       foreach($selected as $x => $x_value) {
        $key=$x;
        $key_value=$x_value;
       }
       
    
      //  for($i=0;$i<5;$i++){
         
        
     
      $q="SELECT * FROM questions WHERE q_id=$key";
       $query=mysqli_query($conn,$q);
       while($rows=mysqli_fetch_array($query)){
          if($key_value==$rows['ans_id'])
               $_SESSION['right_3']++;
         
       }
       $count_right_3=$_SESSION['right_3'];
       $_SESSION['level3_attempted']++;
       $count_level_3_answer=$_SESSION['level3_attempted'];
    }
    if($_SESSION['num_3']<4){
        $_SESSION['num_3']++;  
        header('location:level3.php');  
    }else{
       
    
            
    
    
   $u=$_SESSION['username'];
    $sql="SELECT * FROM userdetail WHERE username='$u'";
   $quer=mysqli_query($conn,$sql);
  while($us=mysqli_fetch_array($quer)){
       $id=$us['u_id'];
   }
    
    $search="SELECT * FROM level_attempt WHERE use_id='$id'";
    $search_quer=mysqli_query($conn,$search);
  while($use=mysqli_fetch_array($search_quer)){
       $nom=$use['attempt_3'];
   }
  
   $num_of_rows = mysqli_num_rows($search_quer);
   
   
   


   if($num_of_rows == 0){
        $in="INSERT INTO level_attempt (use_id,attempt_1,ans_1,attempt_2,ans_2,attempt_3,ans_3,attempt_4,ans_4) VALUE($id,$count_level_1_answer,$count_right_1,0,0,0,0,0,0)";
        $in1=1;
    }else{
        $in = "UPDATE level_attempt SET attempt_3=$count_level_3_answer  WHERE use_id='$id'";
        $in1 = "UPDATE level_attempt SET ans_3=$count_right_3  WHERE use_id='$id'";
    }
   
     if ( ($conn->query($in) === TRUE )&&($conn->query($in1) === TRUE)) {
        
    header('location:level4.php');
       
}
    }
      
}

/////////// check level 4 questions //////////

$level4=$_SESSION['num_4'];
if(isset($_POST['submit-4_'.$level4])){
    if(!empty($_POST['quizcheckbox'])){
        
       

       $selected=$_POST['quizcheckbox'];
       
       

      
        $count_right_4=0;
       foreach($selected as $x => $x_value) {
        $key=$x;
        $key_value=$x_value;
       }
       
    
      //  for($i=0;$i<5;$i++){
         
        
     
      $q="SELECT * FROM questions WHERE q_id=$key";
       $query=mysqli_query($conn,$q);
       while($rows=mysqli_fetch_array($query)){
          if($key_value==$rows['ans_id'])
               $_SESSION['right_4']++;
         
       }
       $count_right_4=$_SESSION['right_4'];
       $_SESSION['level4_attempted']++;
       $count_level_4_answer=$_SESSION['level4_attempted'];
    }
    if($_SESSION['num_4']<4){
        $_SESSION['num_4']++;  
        header('location:level4.php');  
    }else{
       
    
            
    
    
   $u=$_SESSION['username'];
    $sql="SELECT * FROM userdetail WHERE username='$u'";
   $quer=mysqli_query($conn,$sql);
  while($us=mysqli_fetch_array($quer)){
       $id=$us['u_id'];
   }
    
    $search="SELECT * FROM level_attempt WHERE use_id='$id'";
    $search_quer=mysqli_query($conn,$search);
  while($use=mysqli_fetch_array($search_quer)){
       $nom=$use['attempt_4'];
   }
  
   $num_of_rows = mysqli_num_rows($search_quer);
   
   
   


   if($num_of_rows == 0){
        $in="INSERT INTO level_attempt (use_id,attempt_1,ans_1,attempt_2,ans_2,attempt_3,ans_3,attempt_4,ans_4) VALUE($id,$count_level_1_answer,$count_right_1,0,0,0,0,0,0)";
        $in1=1;
    }else{
        $in = "UPDATE level_attempt SET attempt_4=$count_level_4_answer  WHERE use_id='$id'";
        $in1 = "UPDATE level_attempt SET ans_4=$count_right_4  WHERE use_id='$id'";
    }
   
     if ( ($conn->query($in) === TRUE )&&($conn->query($in1) === TRUE)) {
        
    header('location:result.php');
       
}
    }
      
}
?>