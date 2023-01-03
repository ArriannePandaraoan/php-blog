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



// write query for all blogs
	$sql = 'SELECT title, content, entrydate, id FROM blogpost';

	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$blogpost = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// free the $result from memory (good practise)
	mysqli_free_result($result);

	// close connection
	// mysqli_close($conn);




if(isset($_POST['delete'])){

    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    $sql = "DELETE FROM blogpost WHERE id = $id_to_delete";

    if(mysqli_query($conn, $sql)){
      header('Location: index.php');
    } else {
      echo 'query error: '. mysqli_error($conn);
    }

  }

  // check GET request id param
  if(isset($_GET['id'])){
    
    // escape sql chars
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // make sql
    $sql = "SELECT * FROM blogpost WHERE id = $id";

    // get the query result
    $result = mysqli_query($conn, $sql);

    // fetch result in array format
    $blogpost = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    // mysqli_close($conn);

  }





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

<div style="display: flex; justify-content: center; width: 100%; flex-direction: row; ">
	
<div class="card-container" style="display: flex; justify-content: center; flex-direction: column; width: 50%;">

<?php foreach($blogpost as $blog): ?>


<div class="card" style="width: 100%; ">
    <h5 style="margin-left: 20px; color: #737373"><?php echo htmlspecialchars($blog['title']); ?></h5>

    <div style="margin: 20px"><?php echo htmlspecialchars($blog['content']); ?></div>

    <div style="margin: 20px">Date: <?php echo '2nd of April 2020 9:13:32 AM'; ?></div>

     <hr style="opacity: 0.3">

<form action="index.php" method="POST">
     <div style="margin: 10px 10px 30px 10px">
      <input class="" type="hidden" name="id_to_delete" value="<?php echo $blog['id']; ?>"></input>
      <button class="waves-effect waves-light btn" type="submit" name="delete" value="Delete" style="cursor: pointer">DELETE</button>
    </div>
</form>




</div>
    


<?php endforeach; ?>

<div class="card-container" style="display: flex; justify-content: center; flex-direction: column; width: 100%;">
	<div class="card" style="width: 100%; padding: 10px">
	<button class="waves-effect waves-light btn blue"><a style="text-decoration: none; color: white" href="addpost.php">CREATE NEW POST</a></button>
</div>

</form>


</div>



  </body>
</html>