<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "attendance";
$conn = new mysqli($servername, $username, $password, $dbname);

// if(isset($_POST['eno']) ){

$eno = $_REQUEST['eno'];
$eid = $_REQUEST['eid'];
$psw = $_REQUEST['psw'];
$psw=$eno.$psw;

$result = $conn->query("UPDATE student SET Password = SHA2('$psw',256), EmailId = '$eid' WHERE EnrollNo ='$eno'");

if (!$result)
	{

	// die('Could not update data: ' . mysql_error());

	echo "c n u d";
	}
  else echo "Updated data successfully\n";
$conn->close();

