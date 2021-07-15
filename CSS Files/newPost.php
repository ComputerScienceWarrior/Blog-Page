<!--
New Post entry Page
Developers: James-Ryan Stampley, Zachary Chambers, David Pratt Jr., Brandon Labat
Version 3.0 as of 7/9/2018
PHP Storm version 2018.1
References:

This is the page where a new post is created.
 -->
<html lang="en">
<head><link rel="stylesheet" type="text/css" href="../CSS Files/newPost.css">

    <title>Create a new Post</title>

</head>
<body>
<?php include("../admin/navigation.php")?>
<h1 class="header">BEHIND THE CONSOLE</h1>
<h1 class="subheader">Write your post below</h1>
<div class="container">
    <form class="gridHolder" action="newPost.php" method="post">
        <input id="username" type="text" placeholder="Enter your username" name="userid" required>
        <input id="title" type="text" placeholder="Title" name="title" required>
        <input id="date" type="text" placeholder="Date" name="date" value="<?php echo "" . date("l, F jS Y");?>" readonly="readonly"required>
        <input id="textarea" placeholder="Write your post here" name="textarea" required>
        <input id="submit" type="submit" name="Submit" value="Submit">
    </form>
</div>
</body>
</html>

<?php
session_start();
include("../index/server.php");

//initialize variables
$userid = "";
$title = "";
$date = "";
$textarea = "";

if (isset($_POST['Submit'])) {
    $userid = $_POST['userid'];
    $title = $_POST['title'];
    $date = $_POST['date'];
    $textarea = $_POST['textarea'];

    //insert values into blog_post table
    $sql = "INSERT INTO `blog_post` (userid, title, date, textarea)
             VALUES ('" . addslashes($userid) . "', '" . addslashes($title) . "',
            '" . addslashes($date) . "', '" . addslashes($textarea) . "')";
    header('location: Blog Forum.php');


//error message for failed connection
    if ($conn->query($sql) === TRUE) {

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
