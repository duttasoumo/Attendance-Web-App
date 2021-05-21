<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "attendance";

// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection

if ($conn->connect_error)
	{
	die("Connection failed: " . $conn->connect_error);
	}

$subject = $_REQUEST['subject'];
$year = $_REQUEST['year'];
$result4 = $conn->query("SELECT * FROM studies WHERE SUBJECT_CODE='$subject' AND YEAR='$year'");

if ($result4->num_rows > 0)
	{
	while ($row = $result4->fetch_assoc())
		{
		$json[] = $row;
		}
	}

print (json_encode($json));
$conn->close();
