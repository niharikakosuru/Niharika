<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "foodadda";
	$email=$_POST["email"];
	$fruit_name=$_POST["fruit_name"];
	$data=array();
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	// sql to delete a record
	$sql = "DELETE FROM fruit_store WHERE seller_email='$email' and fruit_name='$fruit_name'";

	if ($conn->query($sql) === TRUE) {
	    //echo "Record deleted successfully";
	} else {
	    //echo "Error deleting record: " . $conn->error;
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