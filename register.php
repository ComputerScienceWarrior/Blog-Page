<!--
Registration Page
Developers: James-Ryan Stampley, Zachary Chambers, David Pratt Jr.
Version 4.0 as of 7/9/2018
PHP Storm version 2018.1
References: https://www.w3schools.com/html/html_forms.asp
            https://stackoverflow.com/questions/6315772/how-to-import-include-a-css-file-using-php-code-and-not-html-code
            https://www.w3schools.com/tags/tag_footer.asp

This is the registration page where users will
first sign up to become a free member of the
blog page. Users must enter all the information
in the field, and upon clicking submit they are
directed to the login page to gain access to their
personalized account. This page is reached from the
main Homepage.
 -->

<html>

	<head>
		<title>Registration</title><link rel="stylesheet" type="text/css" href ="CSS Files/register.css">
	</head>
	<body>
		<h1>Welcome to the sound engineer's blog page!</h1>
		<h3>Already a member? Click <a href="login.php">here!</a></h3>
		<p id="p1">Welcome to a page for audio engineers! If you're here, you<br>
		must have a love for music. Whether that be Music Production,<br>
		engineering, or even being a Musician-- here at my blog<br>
		page, you're going to find some useful informational <br>
		posts to help the topic novices, or inform the amateurs.<br>
		You'll also be able to showcase your project or get help from<br>
		other Audio Engineers in the Main Forum. <br></p>
		<h3><i>Please enter the information to sign up:</i></h3>
	<div>
		<form id="mainform" name="registration" method="post" action="actionPage.php">
            <br>
			<input type ="text" name ="firstname" placeholder="First Name" value="" maxlength="25" minlength="1" required> <br><br>
			<input type ="text" name="username" placeholder="Create unique username" value="" maxlength="25" minlength="10" required> <br><br>
			<input type ="password" name ="password" placeholder="Create password" value="" maxlength="25" minlength="10" required>
			<p id="paraform"> (Password must be at least <b>10</b> characters long.) </p>
			<input type ="password" name ="password_ver" placeholder="Verify password" value="" maxlength="25" required> <br><br>
			<input type="email" name="email" placeholder="Email: name123@gmail.com" value="" maxlength="50" required><br><br>
            <input type="text" name="age" placeholder="Age" value="" maxlength="2"><br><br>
            <input id="submit" type="submit" name="Submit" value="Submit">

		</form>
	</div>

		<br>
	</body>

    <?php include("./index/footer.php");?>
</html>

