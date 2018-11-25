<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "anusha";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$address=$_POST['address'];
$pan=$_POST['pan'];
$phnumber=$_POST['phnumber'];
$password=$_POST['password'];


$sql="INSERT INTO CUSTOMERREGISTRATION VALUES('$firstname','$lastname','$email','$address','$pan',$phnumber,'$password')";
if ($conn->query($sql) === TRUE) {
	$_SESSION['buyeremail']=$email
    header('location:buyerdashboard.php');
} else {
    echo "Error creating table: " . $conn->error;
}

?>