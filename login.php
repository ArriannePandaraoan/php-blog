<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: index.php");
    }
    else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script src='http://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.js'></script>
<script type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>
  <body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">
 $(document).ready(function() {
    M.updateTextFields();
  });

</script>

    <div class="header-blog" style="width: 100%; height: 50px; background-color: 
#6a6ea8; color: white"><span style="font-size: 30px; margin-left: 10px; text-align: justify;">MiniBlog</span> <span style="font-size: 15px; margin-right: 10px; float: right; margin-top: 15px; cursor: pointer;"><a href="login.php" style="text-decoration: none; color: white">Login</a></span> </div>


<div class="card-container" style="display: flex; justify-content: center;">
<div class="card" style="width: 50%; ">
    <h5 style="margin-left: 20px; color: #737373">Login</h5>
    <hr style="opacity: 0.3">
    <div style="margin: 10px">
    <form class="" action="" method="post" autocomplete="off">
      <!-- <label for="usernameemail">Username or Email : </label>
      <input type="text" name="usernameemail" id = "usernameemail" required value=""> -->

   <div class="row">
      <div class="input-field col s12">
        <input id="usernameemail" name="usernameemail" type="text" class="validate" value="">
        <label for="password">Enter Email</label>
      </div>
   </div>

      <div class="row" style="margin-top: -10px">
      <div class="input-field col s12">
        <input id="password" class="validate" type="password" name="password" value="" >
        <label for="password">Enter Password</label>
      </div>
   </div>

<!-- 
       <br>
      <label for="password">Password : </label>
      <input type="password" name="password" id = "password" required value=""> <br> -->
      <div style="margin: 10px 10px 30px 10px">
      <button class="waves-effect waves-light btn" type="submit" name="submit" style="cursor: pointer">Login</button>
      <button class="waves-effect waves-light btn"><a style="text-decoration: none; color: white" href="registration.php">Registration</a></button>
    </div>
    </form>
  </div>
  </div>
</div>
    <br>


  </body>
</html>