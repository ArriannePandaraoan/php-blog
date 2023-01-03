<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO tb_user VALUES('','$name','$username','$email','$password')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Registration Successful'); </script>";
    }
    else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script src='http://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.js'></script>
<script type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>
  <body>
    <!-- <h2>Registration</h2> -->
       <div class="header-blog" style="width: 100%; height: 50px; background-color: 
#6a6ea8; color: white"><span style="font-size: 30px; margin-left: 10px; text-align: justify;">MiniBlog</span> <span style="font-size: 15px; margin-right: 10px; float: right; margin-top: 15px; cursor: pointer;"><a href="login.php" style="text-decoration: none; color: white">Login</a></span></div>

<div class="reg-container" style="display: flex; justify-content: center; margin: 10px">
  <div>

    Registration
  </div>

  </div>

<div class="card-container" style="display: flex; justify-content: center;">
<div class="card" style="width: 50%; ">

    <h5 style="margin-left: 20px; color: #737373">See the Registration Rules</h5>
    <hr style="opacity: 0.3">
    <form class="" action="" method="post" autocomplete="off">


   <div class="row">
      <div class="input-field col s12">
        <input id="username" name="username" type="text" class="validate" value="">
        <label for="username">Enter Username</label>
      </div>
   </div>

         <div class="row" style="margin-top: -10px">
      <div class="input-field col s12">
        <input id="email" class="validate" type="email" name="email" value="" >
        <label for="email">Enter Email</label>
      </div>
   </div>

            <div class="row" style="margin-top: -10px">
      <div class="input-field col s12">
        <input id="password" class="validate" type="password" name="password" value="" >
        <label for="password">Enter Password</label>
      </div>
   </div>

               <div class="row" style="margin-top: -10px">
      <div class="input-field col s12">
        <input id="confirmpassword" class="validate" type="password" name="confirmpassword" value="" >
        <label for="confirmpassword">Confirm Password</label>
      </div>
   </div>






      <!-- <label for="username">Username : </label>
      <input type="text" name="username" id = "username" required value=""> <br>
      <label for="email">Email : </label>
      <input type="email" name="email" id = "email" required value=""> <br>
      <label for="password">Password : </label>
      <input type="password" name="password" id = "password" required value=""> <br>
      <label for="confirmpassword">Confirm Password : </label>
      <input type="password" name="confirmpassword" id = "confirmpassword" required value=""> <br> -->
      <!-- <button type="submit" name="submit">Register</button> -->
    
    <div style="margin: 10px 10px 30px 10px">
      <button class="waves-effect waves-light btn" type="submit" name="submit" style="cursor: pointer">Register</button>
      <div style="margin-top: 20px">Return to the <span><a style="color: #e3bc30" href="login.php">LOGIN PAGE</a></span></div>
    </div>





    </form>

  </div>
</div>
    <br>
  </body>
</html>