<?php include('./settings/main.php');
	if (isset($_POST['email']) && isset($_POST['password'])){
		if ($lol=medium_register($_POST['email'],$_POST['username'],$_POST['password'],$_POST['cpassword'],$_POST['firstname'],$_POST['lastname'],$_POST['dob'],$_POST['capchaimg'])){
			echo $lol;//fail
		}else{
			echo "registered success"; //success
		}
	}
?>
		<html>
			<head>
			</head>
		<body>
			<h1 style="text-align:center;">Register</h1>
			<hr>
			<form method="post" name="input" action="register.php">
				<label for="email">Email:</label>
				<input name="email" type="text" placeholder="email"/><br />
				<label for="username">Username:</label>
				<input  name="username" type="text" placeholder="username"/><br />
				<label for="password">Password:</label>
				<input name="password" type="password" placeholder="password"/><br />
				<label for="cpassword">Confirm password:</label>
				<input name="cpassword" type="password" placeholder="confirm password"/><br />
				<label for="firstname">Firstname:</label>
				<input name="firstname" type="text" placeholder="firstname"/><br />
				<label for="lastname">Lastname:</label>
				<input name="lastname" type="text" placeholder="lastname"/><br />
				<label for="dob">DOB (DD/MM/YYYY):</label>
				<input name="dob" type="text" placeholder="DD/MM/YYYY"/><br />
				<img src="capcha.php" /><br />
					<label for="capchaimg">Type image letters:</label>
				<input name="capchaimg" type="text" /><br />
				<input type="submit" value="Submit">
			</form>
			<hr>
		</body>
		</html>