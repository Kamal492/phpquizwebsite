<?php

$servername = "localhost";
$username = "id14307147_root";
$password = "\we!y5WqH>l9?Xfl";
$errors=array();
// Create connection
$conn =  mysqli_connect($servername, $username, $password);

mysqli_select_db($conn,'id14307147_quiz');



///////login check validation //////
if (isset($_POST['reg_user'])) { 

$username=$_POST['username'];
$password=$_POST['password'];
   
  // Ensuring that the user has not left any input field blank 
  // error messages will be displayed for every blank input 
  if (empty($username)) { array_push($errors, "Username is required"); } 
 
  if (empty($password)) { array_push($errors, "Password is required"); } 
 
//////


if (count($errors) == 0) { 

$q = "SELECT * FROM userdetail WHERE username='$username'  ";
$result = mysqli_query($conn,$q);
$num_of_rows = mysqli_num_rows($result);

if($num_of_rows >= 1){
  array_push($errors, "This username already has an account");
  
}else{
  $quer = "INSERT INTO userdetail(username,user_password)
   VALUES('$username','$password')";
   mysqli_query($conn,$quer);
   session_start();
   $_SESSION['username']=$username;
   header('location:instruction.php');
}
}}    

/////////registration validation check///////////
if (isset($_POST['login_user'])) { 
      
  // Data sanitization to prevent SQL injection 
$username=$_POST['username'];
$password=$_POST['password'];
 
  // Error message if the input field is left blank 
  if (empty($username)) { 
      array_push($errors, "Username is required"); 
  } 
  if (empty($password)) { 
      array_push($errors, "Password is required"); 
  } 

////////////

if (count($errors) == 0) { 

$q = "SELECT * FROM userdetail WHERE username='$username' &&  user_password='$password' ";
$result = mysqli_query($conn,$q);
$num_of_rows = mysqli_num_rows($result);

if($num_of_rows == 1){

  session_start();
  $_SESSION['username']=$username;

  
  header('location:instruction.php');
}else { 
              
  // If the username and password doesn't match 
  array_push($errors, "Username or password incorrect");  
} 
     
}}

?>