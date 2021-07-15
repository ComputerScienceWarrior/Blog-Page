<!--Blog Forum
Developers: James-Ryan Stampley, Zachary Chambers
Version 4.0
PHP Storm version 2018.1
References: https://www.formget.com/update-data-in-database-using-php/
            https://www.youtube.com/watch?v=MYhw4-Bc-oM


This is the main Forum page, where a user will go to view all
the recent posts from other users There is an add and delete button
on the blog's so a user can update or delete their blog post.-->

<html>
<head>
    <title>Forum</title><link rel="stylesheet" type="text/css"  href="CSS Files/Blog Forum.css">
</head>
<body>


<?php
session_start();
include("navigation.php")
?>

<h1 align="center">Welcome to the main Forum!</h1>
<p align="center">View the blog posts below!</p>
</body>


<style>
    <?php
        include ("./index/footer.css")
    ?>
</style>
</html>

<?php

//database connection
include("./index/server.php");
$lg_username = $_SESSION['Username'];
$query = "SELECT p.id, p.title, p.userid, p.date, p.textarea, AVG(r.rating) AS rating
          FROM blog_post as p LEFT JOIN rating AS r ON p.id = r.post_id GROUP BY p.id";
$results = mysqli_query($conn, $query);

while ($row = mysqli_fetch_array($results)) { ?>

    <table border="2" cellpadding="3">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Username</th>
            <th>Date of Post</th>
            <th>Post Body</th>
            <th colspan="4">Action</th>
            <th>Rating</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <!--Generalized for to properly 'select' queried post data-->
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['userid']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['textarea']; ?></td>
            <td>
                <?php if($row['userid'] == $lg_username) { ?>
                    <a href='edit.php?edit=<?php echo $row['id'];?>'>Edit</a><br><br>
                    <a style=color:red href='delete.php?del=<?php echo $row['id'];?>'>Delete</a>
                <?php } else { echo 'no edit' ; } ?>
            </td>
            <td>
                <a href='comment.php?comment=<?php echo $row['id'];?>'>Comment</a>
            </td>
            <td>
                <a href='View Comment.php?viewcom=<?php echo $row['id'];?>'>View Comments</a>
            </td>
            <td>
                <a style=color:forestgreen href='rating.php?rating=<?php echo $row['id'];?>'>Rate</a>
            </td>
            <td>
                <?php if($row['rating'] == '') {

                    echo 'No rating';
                }else {
                    echo round($row['rating']);
                }?>
            </td>
        </tr>
        </tbody>
    </table>

<?php } ?>

<style>
    <?php include("./index/Forum navigation.css")?>
</style>
<!--Custom footer created due to a color conflict with the 'footer.php' file i've been including -->
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="index/footer.css">
</head>
<body>


<p style=color:red class="footer"><i>Created by: Codeisart 2018&copy; Contact information: <a href="mailto:codeisart1991@gmail.com">codeisart1991@gmail.com</a></i></p>


</body>

</html>
