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

if (isset($_SESSION['subject'])) $sub = $_SESSION['subject'];
$result = $conn->query("SELECT EnrollNo,F_Name,M_Name,L_Name FROM student WHERE EnrollNo IN (SELECT EnrollNo FROM studies WHERE Subject_Code='$sub') AND Semester IN (SELECT Semester FROM subject WHERE Subject_Code='$sub')");

if (mysqli_num_rows($result) > 0)
	{
	while ($row = mysqli_fetch_assoc($result))
		{
		$json[] = $row;
		}
	}

print (json_encode($json));
$conn->close();

