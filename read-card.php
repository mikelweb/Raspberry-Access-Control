<?php
$num_card = $_GET["cardNumber"];
$date = time();

$servername = "localhost";
$username = "admin";
$password = "";
$dbname = "mydb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($resultado = $conn->query("SELECT * FROM Card WHERE num_card = $num_card")) {
	if ($resultado->num_rows > 0) {
		$sql = "INSERT INTO access (num_card, date) VALUES ('$num_card', '$date')";
		if ($conn->query($sql) === TRUE) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
	} else {
		echo "Num card not found";
	}
    $resultado->close();
}
?>