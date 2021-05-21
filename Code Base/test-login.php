<?php
session_start();

if (!isset($_SESSION['uname']))
	{
	echo "not logged in";
	}

?>
