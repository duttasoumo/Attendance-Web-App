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
$date = $_REQUEST['date'];
$arr = json_decode($_REQUEST['jsondata']);
print_r($arr);
$result = $conn->query("SELECT EnrollNo FROM student WHERE EnrollNo IN (SELECT EnrollNo FROM studies WHERE Subject_Code='$sub') AND Semester IN (SELECT Semester FROM subject WHERE Subject_Code='$sub')");
$json = array();

if (mysqli_num_rows($result) > 0)
	{
	while ($row = mysqli_fetch_assoc($result))
		{
		$json[] = $row;
		}
	}

print_r($json);

for ($i = 0; $i < sizeof($json); $i++)
	{
	$result2 = $conn->query("SELECT * FROM attendance WHERE EnrollNo=" . $json[$i]['EnrollNo'] . " AND Subject_Code='$sub' AND Date='$date'");
	if ($arr[$i] == "true")
		{
		if (mysqli_num_rows($result2) < 1)
			{
			$conn->query("INSERT INTO attendance(EnrollNo, Subject_Code, Date) VALUES (" . $json[$i]['EnrollNo'] . ",'$sub','$date')");
			}
		}
	  else
		{
		if (mysqli_num_rows($result2) > 0)
			{
			$conn->query("DELETE FROM attendance WHERE EnrollNo=" . $json[$i]['EnrollNo'] . " AND Subject_Code='$sub' AND Date='$date'");
			}
		}
	}

$conn->close();

