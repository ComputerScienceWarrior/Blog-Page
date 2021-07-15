<?php
/**
 * Created by PhpStorm.
 * User: zcham
 * Date: 7/5/2018
 * Time: 6:09 PM
 */
session_start();
//database connection
include("./index/server.php");
?>
<html>
<head>
    <title>Forum</title>
    <link rel="stylesheet" type="text/css"  href="Blog Forum.css">
</head>
<body>
<?php
    include("navigation.php");

    if(isset($_POST) && !empty($_POST)) {
        $search = trim($_POST['search']);
        if(empty($search)) {
            echo 'Please enter search string';
        }else {
//            echo $search;
            $search = "%{$_POST['search']}%";
            $query = "SELECT * FROM blog_post WHERE title LIKE ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('s', $search);
            $stmt->execute();
            $stmt->bind_result($id , $title, $text, $date, $userid);

            while($stmt->fetch()) {
                echo '<pre>';
                echo 'Title : ' . $title. '<br>';
                echo 'Text :' .$text . '<br>';
                echo 'Date :' .$date . '<br>';
                echo 'Username :' .$userid . '<br>';
                echo '</pre>';
            }
            $stmt->close();
        }
    }


?>

</body>
</html>
