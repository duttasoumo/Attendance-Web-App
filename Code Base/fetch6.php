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

$result = $conn->query("SELECT EnrollNo FROM student WHERE EnrollNo IN (SELECT EnrollNo FROM studies WHERE Subject_Code='$sub') AND Semester IN (SELECT Semester FROM subject WHERE Subject_Code='$sub')");

if (mysqli_num_rows($result) > 0)
	{
	while ($row = mysqli_fetch_assoc($result))
		{
		$json[] = $row;
		}
	}

foreach($json as $row)
{
	$result2 = $conn->query("SELECT COUNT(EnrollNo) FROM attendance WHERE EnrollNo=".$row['EnrollNo']." AND Subject_Code='$sub'");
	$result3 = $conn->query("SELECT COUNT(DISTINCT Date) FROM attendance WHERE Subject_Code='$sub'");
	$row2 = $result2->fetch_assoc();
	$row3 = $result3->fetch_assoc();
	$json2[]=array("EnrollNo"=>$row['EnrollNo'],"Classes Attended" => $row2['COUNT(EnrollNo)'],"Total Classes" => $row3['COUNT(DISTINCT Date)']);
}

print(json_encode($json2));
$conn->close();