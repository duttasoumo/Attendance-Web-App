<?php
session_start();
unset($_SESSION['subject']);
unset($_SESSION['uname']);
session_destroy();
echo "success";
?>