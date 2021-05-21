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
$result = $conn->query("SELECT Subject_Code,Subject_Name,Course,Semester FROM subject where Teacher_ID='$uname'");

if ($result->num_rows > 0)
	{
	while ($row = $result->fetch_assoc())
		{
		$json[] = $row;
		}
	}

print (json_encode($json));
$conn->close();

