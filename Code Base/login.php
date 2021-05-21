<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "attendance";
$conn = new mysqli($servername, $username, $password, $dbname);
$uname = $_REQUEST['username'];
$password = $_REQUEST['password'];
$result = $conn->query("SELECT TEACHER_ID,PASSWORD FROM teacher WHERE TEACHER_ID='$uname' AND PASSWORD='$password'");

if (mysqli_num_rows($result) == 1)
	{
	echo "success";
	}
  else echo "unsuccessful";
$conn->close();