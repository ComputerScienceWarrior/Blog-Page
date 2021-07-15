<!--
Logout Link
Developers: James-Ryan Stampley, Zachary Chambers
Version 1.0 as of 7/9/2018
PHP Storm version 2018.1

References: https://www.youtube.com/watch?v=E6ATLvTDRCs

This file is intended to provide
logout session functionality for the
'logout' link in the navigation file.
 -->
<?php
session_start();
$_SESSION = array();
session_destroy(); //end session
$_SESSION ['message'] = include("./index/successful_logout_attempt.php");
echo $_SESSION ['message'];
include_once ("login.php");
?>
