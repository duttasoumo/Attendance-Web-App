<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "attendance";
$conn = new mysqli($servername, $username, $password, $dbname);

//if (isset($_POST['eno']))
//	{
	$eno = $_REQUEST['eno'];
	$opsw = $_REQUEST['opsw'];
	$opsw=$eno.$opsw;
	//$opsw=SHA2('$opsw',256);
	$psw = $_REQUEST['psw'];
	$psw=$eno.$psw;
	//$psw=SHA2('$psw',256);
//	}

$result = $conn->query("SELECT * FROM student WHERE EnrollNo='$eno' and Password=SHA2('$opsw',256)");

/*$sql="UPDATE student SET Password=SHA2('$psw',256) WHERE EnrollNo = '$eno'" ;
if($conn->query($sql)==TRUE){
   echo "ok";
}
else{
	echo "failed";
}*/
if (mysqli_num_rows($result) == 1)
{
	$sql="UPDATE student SET Password=SHA2('$psw',256) WHERE EnrollNo = '$eno'" ;
	$conn->query($sql);
}
else
{
	echo "failed";
}
$conn->close();