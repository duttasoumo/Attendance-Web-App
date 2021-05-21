<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "attendance";
$conn = new mysqli($servername, $username, $password, $dbname);
$ch = $_REQUEST['subject'];
$uname = $_SESSION['uname'];
$result = $conn->query("SELECT Subject_Code FROM subject WHERE Teacher_ID='$uname'");

while ($row = $result->fetch_assoc())
	{
	$json[] = $row;
	}

$_SESSION['subject'] = $json[$ch]['Subject_Code'];
$conn->close();
?>
