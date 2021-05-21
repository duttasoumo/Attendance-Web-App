<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "attendance";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error)
	{
	die("Connection failed: " . $conn->connect_error);
	}

if (isset($_SESSION['uname'])) $uname = $_SESSION['uname'];

// $uname='T101';

$result = $conn->query("SELECT * from student WHERE EnrollNo='$uname'");

if (mysqli_num_rows($result) == 1)
	{
	while ($row = mysqli_fetch_assoc($result))
		{
		$json[] = $row;
		}
	}

print (json_encode($json));
$conn->close();

