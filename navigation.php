<!--
Navigation Page
Developers: James-Ryan Stampley, Zachary Chambers
Version 2.0 as of 7/9/2018
PHP Storm version 2018.1

References:

This page displays the main navigation bar.
 -->

<?php

?>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        * {box-sizing: border-box;}

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .topnav {
            overflow: hidden;
            background-color: #111111;
        }

        .topnav a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            background-color: #008080;
            color: white;
        }

        .topnav a.active {
            background-color: #2196F3;
            color: white;
        }

        .topnav .search-container {
            float: right;
        }

        .topnav input[type=text] {
            padding: 6px;
            margin-top: 6px;
            font-size: 17px;
            border: none;
        }

        .topnav .search-container button {
            float: right;
            padding: 6px 10px;
            margin-top: 6px;
            margin-right: 16px;
            background: #ddd;
            font-size: 17px;
            border: none;
            cursor: pointer;
        }

        .topnav .search-container button:hover {
            background: #ccc;
        }

        @media screen and (max-width: 600px) {
            .topnav .search-container {
                float: none;
            }
            .topnav a, .topnav input[type=text], .topnav .search-container button {
                float: none;
                display: block;
                text-align: left;
                width: 100%;
                margin: 0;
                padding: 14px;
            }
            .topnav input[type=text] {
                border: 1px solid #ccc;
            }
        }
    </style>
</head>
<body>

<div class="topnav">
    <a href="BlogEntry.php">Home</a>
    <a href="Blog Forum.php">Main forum</a>
    <a href="register.php">Sign Up!</a>
    <a href="login.php">Login</a>
    <a href="#">About Us</a>
    <a href="logout.php" name="logout">Logout</a>
    <?php
        if (isset($_POST['logout'])){
            include_once ("login.php");
    }
    ?>
    <div class="search-container">
        <form action="search.php" method="post">
            <input type="text" name="search" placeholder="Search Blog">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>

<script>
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
</script>

</body>
</html>



