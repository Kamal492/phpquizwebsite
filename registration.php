
<?php include('validation.php');?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body class="login-body">
  <h1 class="h1-login">Welcome to Quiz World</h1>
  <h3 class="signin-heading">Get registered and check your knowledge</h3>
  <div class="login_form" >
    <form  method="post" action="registration.php">
    <h2 >Register</h4>
    <?php include('error.php'); ?> 
    <input class="input" type="text" name="username" placeholder="Username" required autofocus/><br>
    <input class="input" type="password" name="password" placeholder="Password" required/><br>
    <input class="login_submit" type="submit" name="reg_user" value="Register" />
    <p class="alt-reg">Already registered ? <a href="login.php">Sign in </a></p>
    </form>
    </div>
  </body>
</html>

