<?php include('./settings/main.php');
if (isset($_POST['email']) && isset($_POST['password'])){

if ($lol=medium_mainlogin($_POST['email'],$_POST['password'])){
echo $lol;//fail - with the error
}else{
echo "i think i just got logged in."; //success
}



}
?>
<html>
<head>
</head>
<body>
<h1 style="text-align:center;">Sign in</h1>
<hr>
<form method="post" name="input" action="index.php">
<input name="email" type="text" placeholder="email"/>
<input name="password" type="password" placeholder="password"/>
<input type="submit" value="Submit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="passforgot.php">forgot password?</a>
</form>
<hr>

</body>
</html>






