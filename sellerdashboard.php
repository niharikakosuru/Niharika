<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "anusha";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$email=$_POST['email'];
$password=$_POST['password'];
$sql="SELECT * FROM  SELLERREGISTRATION WHERE email='$email' and password='$password'";
$result = $conn->query($sql);
if($result->num_rows>0)
{
	$_SESSION['email']=$email;
	header('location:jsontojquery.php');
}

else{
	echo "failed";
}
$conn->close();

?>