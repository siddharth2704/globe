<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbcon.php';
    $email = $_POST["email"];
    $password = $_POST["password"]; 
    
     
    $sql = "Select * from signup where email='$email' AND password='$password'";
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        header("location: C:\xampp\htdocs\ecomm\index.html");

    } 
    else{
        $showError = "Invalid Credentials";
    }
}
    
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="login.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Log in</title>


  </head>
  <body>
  <?php
    if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>
    <form action="localhost/ecomm/_dbcon.php" method="post">
        <div class="imgcontainer">
          <img src="user.png" alt="Avatar" class="avatar">
        </div>
      
        <div class="container">
          <label for="emial"><b>Email</b></label>
          <input type="text" placeholder="Enter email" name="email" required>
      
          <label for="password"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" required>
      
          <button type="submit" name="submit" >Login</button>
          
        </div>
      
        <div class="container" style="background-color:darkgrey">
          <a href="http://localhost/ecomm/signup1.php"><button type="button" class="btn" style="color:white;">Signup?</button></a>
          
        </div>
      </form>







    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
    
<!-- footers -->
<div class="container" style="margin-top: 6cm;">
	<footer class="py-3 my-4">
	  <ul class="nav justify-content-center border-bottom pb-3 mb-3">
		<li class="nav-item"><a href="index.html" class="nav-link px-2 text-muted">Home</a></li>
		<li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
		<li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
		<li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
		<li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
	  </ul>
	  <p class="text-center text-muted">© 2021 Company, Inc</p>
	</footer>
  </div>
  </body>
</html>