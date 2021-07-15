<!--
Login Page
Developers: James-Ryan Stampley, Zachary Chambers, David Pratt Jr.
Version 3.0 as of 7/9/2018
PHP Storm version 2018.1
References:
			https://www.w3schools.com/html/html_forms.asp
			https://stackoverflow.com/questions/11869662/display-alert-message-and-redirect-after-click-on-accept/11869779

This is the login page where users will
gain access to their specialized account they
created in the registration page. From here the user
must log into their account with their matching user
name and password or they do not gain access to the
blog site's main displays features.
 -->

<!DOCTYPE html>
<html>
	<head>
		<title>Login</title><link rel="stylesheet" type="text/css"  href="CSS Files/login.css">
	</head>

	<body>
		<p>
		<br><br><br><br><br>
		<div class="content" align="center">
		    
		    <div class="main-content">
		        <h1>Log In</h1>
		    
		        <form name="login_page" action="loginConnection.php" method="post">
					<label><br>Username:</label>
			        <input type="text" name="username" id ="username" placeholder="Enter username" required><br><br>
					
					<label>Password:</label>
			        <input type="password" name="password" id="password" placeholder="Enter password" required><br><br>
					
					<input type="submit" name="login" value="Login"><br><br>
					Not member yet? Click <a href="register.php">here</a>!
			    </form>
		    </div>
		</div>
		
		
	</body>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	    <?php
            include ("./index/footer.php");
        ?>
	<style>
		<?php
		    include ("./index/footer.css")
		?>
	</style>

</html>