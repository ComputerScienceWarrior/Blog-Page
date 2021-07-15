<!--
Comment on Blog posts
Developers: James-Ryan Stampley, Zachary Chambers
Version 1.0 as of 7/9/2018
PHP Storm version 2018.1
References:

This page is where a user can comment on another blog post.
 -->
<html lang="en">
<head>

    <title>Comment on post</title>

</head>
<body>
<?php
session_start();

include("navigation.php");

include("./index/server.php");

//initialize variables
$comment = "";
$commenter = "";
$date = "";
$post = "";

if (isset($_POST['Submit'])) {
    $user_id = $_POST['user_id'];
    $post = $_POST['post'];
    $comment= $_POST['comment'];
    $date = $_POST['date'];

    //insert values into blog_post table
    $sql = "INSERT INTO `comments` (user_id, post_id,  date, comment)
            VALUES ('" . addslashes($user_id) . "', '" . addslashes($post) . "', '" . addslashes($date) . "', '" . addslashes($comment) . "')";


//error message for failed connection
    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = 'Your comment on this post';
        $url = $_SERVER['HTTP_HOST'].'/blog/comment.php?comment='.$post;
       // header('Location : '.$url);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();

?>
<?php
if(isset($_GET['comment'])) {
    if(isset($_SESSION['success'])) {
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    }
?>
<h1 class="subheader">Write your comment below</h1>
<div class="container">
    <form class="gridHolder" action="comment.php" method="post">
        <input id="user_id" type="text" placeholder="User ID" name="user_id" value="<?php echo $_SESSION['user_id']; ?>" readonly="readonly"><br><br>
        <input id="username" type="text" placeholder="Username" name="username" value="<?php echo $_SESSION['Username']; ?>" readonly="readonly"><br><br>
        <input id="post" type="text" placeholder="post" name="post" value="<?php echo $_GET['comment']; ?>" readonly="readonly"><br><br>
        <input id="date" type="text" placeholder="Date" name="date" value="<?php echo "" . date("l, F jS Y");?>" readonly="readonly"><br><br>
        <input style="height: 100px; width: 400px" id="comment" placeholder="Write your comment here" name="comment" required><br><br>
        <input id="submit" type="submit" name="Submit" value="Submit">
    </form>
</div>

<?php } ?>
</body>
</html>

