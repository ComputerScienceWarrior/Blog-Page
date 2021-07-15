<?php
session_start();
//connect to the server and connect to the database
$servername = "localhost";
    $dbusername = "nstample_ADMIN"; 
    $dbpassword = "Semaj123!";
    $dbname = "nstample_blog_website";

    //create variables to match registration form information
    if (isset($_POST['Submit'])) {
        $firstname = $_POST['firstname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password_ver = $_POST['password_ver'];
        $email = $_POST['email'];
        $age = $_POST['age'];
    }

//ensures user does not submit form with blank information
if (empty($firstname)){
    include_once ("./index/Empty Message.php");
}
else if (empty($username)){
    include_once ("./index/Empty Message.php");
}
else if (empty($password)) {
    include_once ("./index/Empty Message.php");
}
//password verification field
else if ($password !== $password_ver ){
    echo "I'm sorry the 2 passwords do not match, try again.";
    die();
}
else if (empty($email)){
    include_once ("./index/Empty Message.php");
}
else if (empty($age)){
}


//create a connection to server
    $conn = new MySqli($servername, $dbusername, $dbpassword, $dbname);
//check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}

//insert data into database
    $sql = "INSERT INTO `registration_login` (First_Name, Username, Password, Email, Age)
    VALUES ('$firstname', '$username', '$password', '$email', '$age')";

//successful submission and Login Page Link returned if submission met all requirements
    if ($conn->query($sql) === TRUE) {
        echo "
        <div bgcolor='gray' align='center'>
        <h3>You are registered successfully.</h3>
        <br/>Click here to <a href='login.php'>Login</a></div>\";";

 //returned if an error occurred in submission process
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


