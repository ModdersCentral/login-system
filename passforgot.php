<?php include('./settings/main.php');

if (isset($_GET['id'])){
if ($ghjdhgjfg=medium_passforgotsendemail($_GET['id'])){echo "error: didnt send change link....... " .$ghjdhgjfg;}else{echo "success: sent change link";}

}else if (isset($_GET['check'])){
//put the check code ina textbox and submit with $_GET['change']
//if (medium_passforgotcheckemail($_GET['check'])){echo "success: verified";}else{echo "error: not-verified";}
//
}else{
?>
<html>
<head>
</head>
<body>
<form method="get" name="input" action="passforgot.php">
<input name="id" type="text" placeholder="email"/>
<input type="submit" value="Submit">
</form>
</body>
</html>
<?php
}

?>