<?php  
session_start();
if(!isset($_SESSION['email'])){
	header('location:sellerlogin.php');
}

echo "Welcome to ".$_SESSION['email'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="sellerlogin.php?logout='1'">logout</a>
</body>
</html>