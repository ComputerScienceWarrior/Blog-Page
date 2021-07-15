<?php include_once("./index/server.php");
      include_once("navigation.php");

      $title = "";
      $userid = "";
      $textarea = "";
      $id= 0;

if (isset($_POST['Submit'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $userid = $_POST['userid'];
    $textarea = $_POST['textarea'];
    mysqli_query($conn, "UPDATE blog_post SET title='$title', userid='$userid', textarea='$textarea' WHERE id=$id");
    header('location: Blog Forum.php');
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $query1 = mysqli_query($conn, "SELECT * FROM blog_post WHERE id=$id");

    while ($row1 = mysqli_fetch_array($query1)) {
        echo "<form class='form' method='POST'>";
        echo "<h2>Edit Form</h2>";
        echo "<hr/>";
        echo "<input type='hidden' name='id' value='{$row1['id']}' />";
        echo "<br />";
        echo "<label>" . "Title" . "</label>" . "<br />";
        echo "<input type='text' name='title' value=' {$row1['title']}' />";
        echo "<br />";
        echo "<label>" . "Username:" . "</label>" . "<br />";
        echo "<input type='text' name='userid' value='{$row1['userid']}' />";
        echo "<br />";
        echo "<label>" . "Post Body:" . "</label>" . "<br />";
        echo "<input type='text' name='textarea' value='{$row1['textarea']}' />";
        echo "<br />";

        echo "<input id='submit' type='submit' name='Submit' value='Update' />";
        echo "</form>";
    }
}



