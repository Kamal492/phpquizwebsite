<?php

session_start();
$servername = "localhost";
$username = "id14307147_root";
$password = "\we!y5WqH>l9?Xfl";

// Create connection
$conn =  mysqli_connect($servername, $username, $password);

mysqli_select_db($conn,'id14307147_quiz');
$user=$_SESSION['username'];
////////////////// result page logout ////////////////// 
if(isset($_POST['final_logout'])){

   
    $q1="SELECT * FROM logoutdetail WHERE username='$user'";
    $search_q1=mysqli_query($conn,$q1);
    
 
  $num_rows = mysqli_num_rows($search_q1);

  if($num_rows == 0){
      $insert="INSERT INTO logoutdetail(username,level1,level2,level3,level4) VALUE('$user','0','0','0','0')";
      $insert_index="INSERT INTO logout_attempt_detail(username,num_1,num_2,num_3,num_4) VALUE('$user',0,0,0,0)";
      if($conn->query($insert) && $conn->query($insert_index)){

       
       header('location:login.php');
   }
  }else{
           $update="UPDATE logoutdetail SET level1='0' , level2='0' , level3='0', level4='0'  WHERE username='$user'";
           $update_index="UPDATE logout_attempt_detail SET num_1=0 , num_2=0 , num_3 = 0, num_4=0 WHERE username='$user'";

           if($conn->query($update) && $conn->query($update_index)){
               header('location:login.php');
           }
  }


}
//////in case of level 1 ////////
if(isset($_POST['logout_1'])){
     $logout_1_index = $_SESSION['num_1'];

     $user=$_SESSION['username'];
     $attempt_array=$_SESSION['level_arr_1'];
    $org_arr=array();
     foreach($attempt_array as $y=>$value){
          array_push($org_arr,$value);
     }
     $sum=serialize($org_arr);

     ////////////////////////////
     $count_1_answer=$_SESSION['level1_attempted'];
     $count_correct_1=$_SESSION['right_1'];

     $sql="SELECT * FROM userdetail WHERE username='$user'";
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
        $in="INSERT INTO level_attempt (use_id,attempt_1,ans_1,attempt_2,ans_2,attempt_3,ans_3,attempt_4,ans_4) VALUE($id,$count_1_answer,$count_correct_1,0,0,0,0,0,0)";
        $in1=1;
    }else{
        $in = "UPDATE level_attempt SET attempt_1=$count_1_answer  WHERE use_id='$id'";
        $in1 = "UPDATE level_attempt SET ans_1=$count_correct_1  WHERE use_id='$id'";
    }
   
     if ( ($conn->query($in) === TRUE )&&($conn->query($in1) === TRUE)) {
        
    
       echo yes;
}else{
    echo "Error updating record: " . $conn->error;
}

     ///////////////////////////
    

     $q1="SELECT * FROM logoutdetail WHERE username='$user'";
     $search_q1=mysqli_query($conn,$q1);
     
  
   $num_rows = mysqli_num_rows($search_q1);

   if($num_rows == 0){
       $insert="INSERT INTO logoutdetail(username,level1,level2,level3,level4) VALUE('$user','$sum','0','0','0')";
       $insert_index="INSERT INTO logout_attempt_detail(username,num_1,num_2,num_3,num_4) VALUE('$user',$logout_1_index,0,0,0)";
       if($conn->query($insert) && $conn->query($insert_index)){

        
        header('location:login.php');
    }
   }else{
            $update="UPDATE logoutdetail SET level1='$sum' , level2='0' , level3='0', level4='0'  WHERE username='$user'";
            $update_index="UPDATE logout_attempt_detail SET num_1=$logout_1_index , num_2=0 , num_3 = 0, num_4=0 WHERE username='$user'";

            if($conn->query($update) && $conn->query($update_index)){
                header('location:login.php');
            }
   }
  
}

///////////////////// in case of level 2 ////////////////////////////

if(isset($_POST['logout_2'])){
    $logout_2_index = $_SESSION['num_2'];

    $user=$_SESSION['username'];
    $attempt_array=$_SESSION['level_arr_2'];
   $org_arr=array();
    foreach($attempt_array as $y=>$value){
         array_push($org_arr,$value);
    }
    $sum=serialize($org_arr);

    ////////////////////////////
    $count_2_answer=$_SESSION['level2_attempted'];
    $count_correct_2=$_SESSION['right_2'];

    $sql="SELECT * FROM userdetail WHERE username='$user'";
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
       $in="INSERT INTO level_attempt (use_id,attempt_1,ans_1,attempt_2,ans_2,attempt_3,ans_3,attempt_4,ans_4) VALUE($id,0,0,$count_2_answer,$count_correct_2,0,0,0,0)";
       $in1=1;
   }else{
       $in = "UPDATE level_attempt SET attempt_2=$count_2_answer  WHERE use_id='$id'";
       $in1 = "UPDATE level_attempt SET ans_2=$count_correct_2  WHERE use_id='$id'";
   }
  
    if ( ($conn->query($in) === TRUE )&&($conn->query($in1) === TRUE)) {
       
   
      echo yes;
}else{
   echo "Error updating record: " . $conn->error;
}

    ////////////////////////////
    

    $q2="SELECT * FROM logoutdetail WHERE username='$user'";
    $search_q2=mysqli_query($conn,$q2);
   
 
  $num_rows = mysqli_num_rows($search_q2);

  if($num_rows == 0){
      $insert="INSERT INTO logoutdetail(username,level1,level2,level3,level4) VALUE('$user','0','$sum','0','0')";
      $insert_index="INSERT INTO logout_attempt_detail(username,num_1,num_2,num_3,num_4) VALUE('$user',0,$logout_2_index,0,0)";
      if($conn->query($insert) && $conn->query($insert_index)){
       header('location:login.php');
   }else{echo "Error: " . $insert . "<br>" . $conn->error;
       echo "Error: " . $insert_index . "<br>" . $conn->error;}
  }else{
           $update="UPDATE logoutdetail SET level1='0' , level2='$sum' , level3='0', level4='0'  WHERE username='$user'";
           $update_index="UPDATE logout_attempt_detail SET num_1=0 , num_2=$logout_2_index , num_3 = 0, num_4=0 WHERE username='$user'";

           if($conn->query($update) && $conn->query($update_index)){
               header('location:login.php');
           }else{echo "Error: " . $update . "<br>" . $conn->error;
            echo "Error: " . $update_index . "<br>" . $conn->error;}
  }
 
}

/////////////////////////// in case of level 3 ///////////////

if(isset($_POST['logout_3'])){
    $logout_3_index = $_SESSION['num_3'];

    $user=$_SESSION['username'];
    $attempt_array=$_SESSION['level_arr_3'];
   $org_arr=array();
    foreach($attempt_array as $y=>$value){
         array_push($org_arr,$value);
    }
    $sum=serialize($org_arr);

    //////////////////////
    $count_3_answer=$_SESSION['level3_attempted'];
    $count_correct_3=$_SESSION['right_3'];

    $sql="SELECT * FROM userdetail WHERE username='$user'";
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
       $in="INSERT INTO level_attempt (use_id,attempt_1,ans_1,attempt_2,ans_2,attempt_3,ans_3,attempt_4,ans_4) VALUE($id,0,0,0,0,$count_3_answer,$count_correct_3,0,0)";
       $in1=1;
   }else{
       $in = "UPDATE level_attempt SET attempt_3=$count_3_answer  WHERE use_id='$id'";
       $in1 = "UPDATE level_attempt SET ans_3=$count_correct_3  WHERE use_id='$id'";
   }
  
    if ( ($conn->query($in) === TRUE )&&($conn->query($in1) === TRUE)) {
       
   
      echo yes;
}else{
   echo "Error updating record: " . $conn->error;
}
    ///////////////////

    $q3="SELECT * FROM logoutdetail WHERE username='$user'";
    $search_q3=mysqli_query($conn,$q3);
   
 
  $num_rows = mysqli_num_rows($search_q3);

  if($num_rows == 0){
      $insert="INSERT INTO logoutdetail(username,level1,level2,level3,level4) VALUE('$user','0','0','$sum','0')";
      $insert_index="INSERT INTO logout_attempt_detail(username,num_1,num_2,num_3,num_4) VALUE('$user',0,0,$logout_3_index,0)";
      if($conn->query($insert) && $conn->query($insert_index)){
       header('location:login.php');
   }else{echo "Error: " . $insert . "<br>" . $conn->error;
       echo "Error: " . $insert_index . "<br>" . $conn->error;}
  }else{
           $update="UPDATE logoutdetail SET level1='0' , level2='0' , level3='$sum', level4='0'  WHERE username='$user'";
           $update_index="UPDATE logout_attempt_detail SET num_1=0 , num_2=0 , num_3 = $logout_3_index, num_4=0 WHERE username='$user'";

           if($conn->query($update) && $conn->query($update_index)){
               header('location:login.php');
           }
  }
 
}
///////////////////// incase of level 4 //////////////////////
if(isset($_POST['logout_4'])){
    $logout_4_index = $_SESSION['num_4'];

    $user=$_SESSION['username'];
    $attempt_array=$_SESSION['level_arr_4'];
   $org_arr=array();
    foreach($attempt_array as $y=>$value){
         array_push($org_arr,$value);
    }
    $sum=serialize($org_arr);
   //////////////////
   $count_4_answer=$_SESSION['level4_attempted'];
   $count_correct_4=$_SESSION['right_4'];

   $sql="SELECT * FROM userdetail WHERE username='$user'";
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
      $in="INSERT INTO level_attempt (use_id,attempt_1,ans_1,attempt_2,ans_2,attempt_3,ans_3,attempt_4,ans_4) VALUE($id,0,0,0,0,0,0,$count_4_answer,$count_correct_4)";
      $in1=1;
  }else{
      $in = "UPDATE level_attempt SET attempt_4=$count_4_answer  WHERE use_id='$id'";
      $in1 = "UPDATE level_attempt SET ans_4=$count_correct_4  WHERE use_id='$id'";
  }
 
   if ( ($conn->query($in) === TRUE )&&($conn->query($in1) === TRUE)) {
      
  
     echo yes;
}else{
  echo "Error updating record: " . $conn->error;
}
   ////////////////////

    $q4="SELECT * FROM logoutdetail WHERE username='$user'";
    $search_q4=mysqli_query($conn,$q4);
    
 
  $num_rows = mysqli_num_rows($search_q4);

  if($num_rows == 0){
      $insert="INSERT INTO logoutdetail(username,level1,level2,level3,level4) VALUE('$user','0','0','0','$sum')";
      $insert_index="INSERT INTO logout_attempt_detail(username,num_1,num_2,num_3,num_4) VALUE('$user',0,0,0,$logout_4_index)";
      if($conn->query($insert) && $conn->query($insert_index)){
       header('location:login.php');
   }else{echo "Error: " . $insert . "<br>" . $conn->error;
       echo "Error: " . $insert_index . "<br>" . $conn->error;}
  }else{
           $update="UPDATE logoutdetail SET level1=0 , level2=0 , level3=0, level4='$sum'  WHERE username='$user'";
           $update_index="UPDATE logout_attempt_detail SET num_1='0' , num_2='0' , num_3 = '0', num_4=$logout_4_index WHERE username='$user'";

           if($conn->query($update) && $conn->query($update_index)){
               header('location:login.php');
           }
  }
 
}

?>