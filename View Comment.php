<?php
session_start();
include("navigation.php");
include("./index/server.php")
?>
<style>
    <?php
        include ("./index/footer.css")
    ?>
</style>


<?php

$id = 0;
if (isset($_GET['viewcom']))
$id = $_GET['viewcom'];

$query1 = mysqli_query($conn, "SELECT c.id, username as name, c.date, c.comment FROM comments as c JOIN registration_login as u on u.Account_Id = c.user_id WHERE c.post_id = $id");

if (!$query1) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}

while ($row = mysqli_fetch_array($query1) ) { ?>

    <table border="2" cellpadding="3">
        <thead>
        <tr>
            <th>ID</th>
            <th>Commenter</th>
            <th>Date of comment</th>
            <th>Comment body</th>
        </tr>
        </thead>
        <tbody>
        <tr>

            <td><?php echo $row['id']; ?></td>
            <p> </p>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['comment']; ?></td>


        </tr>
        </tbody>
    </table>

<?php } ?>


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
