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
    $post = $_POST['post_id'];
    $rating = $_POST['post_rating'];

    //insert values into blog_post table
    $sql = "INSERT INTO `rating` (user_id, post_id,  rating)
            VALUES ('" . addslashes($user_id) . "', '" . addslashes($post) . "', '" . addslashes($rating) . "')";


//error message for failed connection
    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = 'Your comment on this post';
        $url = $_SERVER['HTTP_HOST'].'/blog/comment.php?comment='.$post;
        // header('Location : '.$url);
        echo 'Your rating has been saved';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


?>
<?php
if(isset($_GET['rating'])) {
    $post_id = $_GET['rating'];
    if(isset($_SESSION['success'])) {
        echo $_SESSION['success'];
        unset($_SESSION['success']);
    }
    $query = "SELECT * FROM blog_post WHERE id = ?";
    if($stmt = $conn->prepare($query)) {
        $stmt->bind_param('i', $post_id);
        $stmt->execute();
        $stmt->store_result();
        $posts_cnt = $stmt->num_rows;
        $stmt->bind_result($p_id, $p_title, $p_post, $p_date, $p_user);
        $stmt->fetch();
        $stmt->close();


        if($posts_cnt > 0) {
            ?>
            <h1 class="subheader">Write your comment below</h1>
            <div class="container">
                <form class="gridHolder" action="rating.php" method="post">
                    <input id="post_title" type="text" placeholder="Post Title" name="post_title"
                           value="<?php echo $p_title; ?>" readonly="readonly"><br><br>
                    <input id="post_id" type="text" placeholder="Post ID" name="post_id"
                           value="<?php echo $p_id; ?>" readonly="readonly"><br><br>
                    <input id="user_id" type="text" placeholder="User ID" name="user_id"
                           value="<?php echo $_SESSION['user_id']; ?>" readonly="readonly"><br><br>
                    <input id="username" type="text" placeholder="Username" name="username"
                           value="<?php echo $_SESSION['Username']; ?>" readonly="readonly"><br><br>

                    <input id="date" type="text" placeholder="Date" name="date"
                           value="<?php echo "" . date("l, F jS Y"); ?>" readonly="readonly"><br><br>
                    <label><input type="radio" name="post_rating" value="1"> 1 </label>
                    <label><input type="radio" name="post_rating" value="2">2 </label>
                    <label><input type="radio" name="post_rating" value="3">3 </label>
                    <label><input type="radio" name="post_rating" value="4">4 </label>
                    <label> <input type="radio" name="post_rating" value="5">5 </label><br><br>
                    <input id="submit" type="submit" name="Submit" value="Submit">
                </form>
            </div>

            <?php
        }else {
            echo 'No post found';
        }
    }
    } ?>
</body>
</html>

