<!--
Login Connection Page
Developers: James-Ryan Stampley, Zachary Chambers
Version 2.0 as of 7/9/2018
PHP Storm version 2018.1

References:
            https://www.w3schools.com/html/html_forms.asp
			https://stackoverflow.com/questions/11869662/display-alert-message-and-redirect-after-click-on-accept/11869779


This page is intended to work with login.php
by separating the html form from the php and SQL code.
Not only does it make it cleaner looking, but it allows
a successful login attempt to direct user to BlogEntry.php
and a non successful one to return user to login
page to try again.
 -->

<?php

$username = "";
$password = "";
$login_attempt = 0;

//database connection code
include ("./index/server.php");

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
}

//check database for the username and
//password stored from registration page
$result = mysqli_query($conn,"SELECT * FROM registration_login where username = '$username' and password = '$password'")

or die("Failed to query database");

$row = mysqli_fetch_array($result);

//User Authentication verifies that username and password match the database to allow login
if ($row ['Username'] == $username && $row ['Password'] == $password){
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['Username'] = $username;
    $_SESSION['user_role'] = $row['user_role'];
    $_SESSION['user_id'] = $row['Account_Id'];
    if($_SESSION['user_role'] == 1) {
        header('Location: admin/index.php');
    }elseif($_SESSION['user_role'] == 2) {
        header('Location: BlogEntry.php');
    }
    include_once("BlogEntry.php");
}
else{
    $login_attempt++;
    include ("./index/failed_login_attempt.php");
    include ("login.php");
}

$conn->close();
