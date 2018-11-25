<?php
session_start();
if(isset($_SESSION['email'])){
  header('location:jsontojquery.php');
}
if(isset($_GET['logout'])){
  unset($_SESSION['email']);
  session_destroy();
  header('location:sellerlogin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</head>

<body background="guava.jpg";>
  <br><br><br><br><br><br><br><br><br><br><br><br>


<div class="container">
  <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-success class">
          <div class="panel-heading">
              <h2 class="panel-title-center"> <center>Seller Login</center> </h2>
          </div>
          <div class="panel-body">
            <div class="row">
  <form action="sellerdashboard.php" method="post">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
</div>
</div>
</div>
</div>
</div>

</body>
</html>
