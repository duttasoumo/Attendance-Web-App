<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "attendance";
$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['choice']))
	{
	$uname = $_REQUEST['username'];
	$password = $_REQUEST['password'];
	$choice = $_REQUEST['choice'];
    $password=$uname.$password;
	}

if ($choice == "1") $result = $conn->query("SELECT Teacher_ID,Password FROM teacher WHERE Teacher_ID='$uname' AND Password=SHA2('$password',256)");
  else $result = $conn->query("SELECT EnrollNo,Password FROM student WHERE EnrollNo='$uname' AND Password=SHA2('$password',256)");

if (mysqli_num_rows($result) == 1)
	{
	echo "success";
	$_SESSION['uname'] = $uname;
	}
  else echo "unsuccessful";
$conn->close();
