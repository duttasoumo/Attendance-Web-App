<?php
session_start();
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

if (isset($_SESSION['uname'])) $uname = $_SESSION['uname'];
$result = $conn->query("SELECT Subject_Code,Subject_Name FROM subject WHERE Subject_Code IN (SELECT Subject_Code FROM studies WHERE EnrollNo='$uname')");

while ($row = $result->fetch_assoc())
	{
	$json_row[] = $row;
	}

foreach($json_row as $row)
	{
	$result2 = $conn->query("SELECT COUNT(EnrollNo) FROM attendance WHERE EnrollNo='$uname' AND Subject_Code=" . $row['Subject_Code']);
	$result3 = $conn->query("SELECT COUNT(DISTINCT Date) FROM attendance WHERE Subject_Code=" . $row['Subject_Code']);
	$row2 = $result2->fetch_assoc();
	$row3 = $result3->fetch_assoc();
	$json[] = array(
		"Subject_Code" => $row['Subject_Code'],
		"Subject_Name" => $row['Subject_Name'],
		"Classes Attended" => $row2['COUNT(EnrollNo)'],
		"Total Classes" => $row3['COUNT(DISTINCT Date)']
	);
	}

print (json_encode($json));
$conn->close();
