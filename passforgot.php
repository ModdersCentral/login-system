<?php include('./settings/main.php');
		if (isset($_GET['id'])){
			if ($ghjdhgjfg=medium_passforgotsendemail($_GET['id'])){echo "error: didnt send change link....... " .$ghjdhgjfg;}else{echo "success: sent change link";}

		}else if (isset($_GET['check'])){
			if (isset($_POST['password']) && isset($_POST['cpassword'])){
				if ($fgdgdghf=medium_passforgotcheckemail($_GET['check'],$_POST['password'],$_POST['cpassword'])){echo "success: verified";}else{echo "error: not-verified";}

			}else{
			?>
			<html><head></head><body>
			<form method="post" name="input" action="passforgot.php?check=<?php echo urlencode($_GET['check']); ?>">
			<input name="password" type="text" placeholder="password"/>
			<input name="cpassword" type="text" placeholder="confirm password"/>
			<input type="submit" value="Submit">
			</form>
			</body></html>
			<?php
			}
		}else{
		?>
			<html><head></head><body><form method="get" name="input" action="passforgot.php"><input name="id" type="text" placeholder="email"/><input type="submit" value="Submit"></form></body></html>
			<?php
		}




