<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "attendance";
$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['eno']))
	{
	$eno = $_REQUEST['eno'];
	}

$result = $conn->query("SELECT * FROM student WHERE EnrollNo='$eno'");

if (mysqli_num_rows($result) == 1)
	{
	$row = mysqli_fetch_assoc($result);
	$json = $row;
	print (json_encode($json));
	$_SESSION['uname'] = $eno;
	}
  else echo "unsuccessful";
$conn->close();

