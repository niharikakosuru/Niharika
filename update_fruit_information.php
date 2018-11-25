<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "foodadda";
	$data=array();

	$email=$_POST["email"];
	$fruit_name=$_POST["fruit_name"];
	$quantity=(int)$_POST["quantity"];
	$price=(int)$_POST["price"];

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "UPDATE fruit_store SET quantity=$quantity,price=$price WHERE seller_email='$email' and fruit_name='$fruit_name'";

	if ($conn->query($sql) === TRUE) {
	    //echo "Record updated successfully";
	} else {
	    //echo "Error updating record: " . $conn->error;
	}
	$sql = "SELECT * FROM fruit_store where seller_email='$email'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	// output data of each row
		while($row = $result->fetch_assoc()) {
		        array_push($data,array('fname'=>$row["fruit_name"],'quantity'=>$row["quantity"],'price'=>$row["price"]));
		    }
		} else {
		    echo "0 results";
		}
	$conn->close();
	echo json_encode($data);

?>