<html>
<head>
    <title>Forum</title><link rel="stylesheet" type="text/css"  href="/CSS Files/Blog Forum.css">
</head>
<body>


<?php
session_start();
include("../admin/navigation.php")
?>

<h1 align="center">Welcome! You are signed in as an Administrator. </h1>
<p align="center">Manage blog posts below.</p>
</body>


<style>
    <?php
        include ("../index/footer.css")
    ?>
</style>
</html>

<?php

//database connection
include("../index/server.php");
$lg_username = $_SESSION['Username'];

$results = mysqli_query($conn, "SELECT id, title, userid, date, textarea
                                      FROM blog_post");

while ($row = mysqli_fetch_array($results)) { ?>

    <table border="2" cellpadding="3">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Username</th>
            <th>Date of Post</th>
            <th>Post Body</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <!--Generalized for to properly 'select' queried post data-->
            <td><?php echo $row['id']; ?></td>
            <p> </p>
            <td><?php echo $row['title']; ?></td>
            <p> </p>
            <td><?php echo $row['userid']; ?></td>
            <p> </p>
            <td><?php echo $row['date']; ?></td>
            <p> </p>
            <td><?php echo $row['textarea']; ?></td>
            <td>
                <a style=color:red href='../delete.php?del=<?php echo $row['id'];?>'>Delete</a>
            </td>

        </tr>
        </tbody>
    </table>

<?php } ?>

<style>
    <?php include("../index/Forum navigation.css")?>
</style>
<!--Custom footer created due to a color conflict with the 'footer.php' file i've been including -->
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../index/footer.css">
</head>
<body>


<p style=color:red class="footer"><i>Created by: Codeisart 2018&copy; Contact information: <a href="mailto:codeisart1991@gmail.com">codeisart1991@gmail.com</a></i></p>


</body>

</html>
