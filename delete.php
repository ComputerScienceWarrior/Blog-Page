<?php
session_start();
include("./index/server.php");

// initialize blog_post table variables
$title = "";
$userid = "";
$textarea = "";
$id = 0;

if (isset($_POST['del'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $userid = $_POST['userid'];
    $textarea = $_POST['textarea'];
}

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($conn, "DELETE FROM blog_post WHERE id=$id");
    $_SESSION['message'] = "BLOG deleted!";
    header('location: Blog Forum.php');
}