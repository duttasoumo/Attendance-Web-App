<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "attendance";
$conn = new mysqli($servername, $username, $password, $dbname);
/*if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['choice'])){*/
/* $eroll = $_REQUEST['username'];
$scode=$_REQUEST['password'];*/

// $choice=$_REQUEST['choice'];
// }

$uname = $_SESSION['uname'];
$result = $conn->query("SELECT * FROM attendance WHERE EnrollNo='$uname'");
$num_rows = mysqli_num_rows($result);

// else
//  $result = $conn->query("SELECT EnrollNo,Password FROM student WHERE EnrollNo='$uname' AND Password='$password'");
// if(mysqli_num_rows($result)==1){

echo "$num_rows";

//	$_SESSION['uname']=$uname;

/*	}

/*else
echo "unsuccessful";*/
$conn->close();

// SELECT COUNT(*) FROM attendance WHERE EnrollNo=111 AND Subject_Code=;
