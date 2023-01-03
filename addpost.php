<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: login.php");
}



$title = $content = '';
  $errors = array('title' => '', 'content' => '');

  if(isset($_POST['submit'])){
    
    
    // check title
    if(empty($_POST['title'])){
      $errors['title'] = 'A title is required';
    } else{
      $title = $_POST['title'];
      if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
        $errors['title'] = 'Title must be letters and spaces only';
      }
    }

    // check ingredients
    if(empty($_POST['content'])){
      $errors['content'] = 'Content is required';
    } else{
        $content = $_POST['content'];
      if(!preg_match('/^[a-zA-Z\s]+$/', $content)){
        $errors['content'] = 'Content must be letters and spaces only';
      }
    }

    if(array_filter($errors)){
      //echo 'errors in form';
    } else {
      // escape sql chars
      $title = mysqli_real_escape_string($conn, $_POST['title']);
      $content = mysqli_real_escape_string($conn, $_POST['content']);

      // create sql
      $sql = "INSERT INTO blogpost(title,content) VALUES('$title','$content')";

      // save to db and check
      if(mysqli_query($conn, $sql)){
        // success
        header('Location: index.php');
      } else {
        echo 'query error: '. mysqli_error($conn);
      }
      
    }

  } // end POST check










?>






<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Index</title>
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

  </head>
  <body>

    <div class="header-blog" style="width: 100%; height: 50px; background-color: 
#6a6ea8; color: white"><span style="font-size: 30px; margin-left: 10px; text-align: justify;">MiniBlog</span> <span style="font-size: 15px; margin-right: 10px; float: right; margin-top: 15px; cursor: pointer;">Hi <?php echo $row["username"] . "!"; ?> <a href="logout.php" style="text-decoration: none; color: white; margin-left: 5px">Logout</a></span> </div>

<!-- <div class="card-container" style="display: flex; justify-content: center; flex-direction: column; width: 100%;">
	<div class="card" style="width: 100%; padding: 10px">
	<button class="waves-effect waves-light btn blue"><a style="text-decoration: none; color: white" href="registration.php">CREATE NEW POST</a></button>
</div>
</div> -->

<form class="" action="addpost.php" method="post" autocomplete="off">

<div class="card-container" style="display: flex; justify-content: center;">
<div class="card" style="width: 50%; border:none !important; box-shadow: none!important;">
    <h5 style="margin-left: 20px; color: #737373">Create a Post!</h5>
    <div style="margin: 10px">
    <form class="" action="" method="post" autocomplete="off">

   <div class="row">
      <div class="input-field col s12">
        <input id="title" name="title" type="text" class="validate" value="">
        <label for="title">Enter Title</label>
      </div>
   </div>

      <div class="row">
      <div class="input-field col s12">
        <input id="content" name="content" type="text" class="validate" value="">
        <label for="content">Enter Content</label>
      </div>
   </div>


   <div style="margin: 10px 10px 30px 10px">
      <button class="waves-effect waves-light btn" type="submit" name="submit" style="cursor: pointer">Post</button>
      
    </div>


</form>




</div>



  </body>
</html>