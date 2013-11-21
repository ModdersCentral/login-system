<?php include('./settings/main.php');
//
//COMPLETE
//
//
	if (isset($_POST['email']) && isset($_POST['password'])){

		if ($lol=medium_mainlogin($_POST['email'],$_POST['password'])){
			echo $lol;//fail - with the error
		}else{
			header("Location: examplepage.php");die();//success
		}
	}
?>
		<html>
			<head>
			<title>Index - Sign in</title>
			</head>
		<body>
				<h1 style="text-align:center;">Sign in</h1>
			<hr>
			<form method="post" name="input" action="index.php">
				<label for="email">Email or Username:</label>
				<input name="email" type="text" placeholder="email"/>
				<label for="password">Password:</label>
				<input name="password" type="password" placeholder="password"/>
				<input type="submit" value="Submit">
				&nbsp;&nbsp;
				<a href="passforgot.php">forgot password?</a>
				&nbsp;&nbsp;
				<a href="register.php">sign up?</a>
			</form>
			<hr>
		</body>
		</html>