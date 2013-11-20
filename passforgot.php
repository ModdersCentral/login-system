<?php include('./settings/main.php');

if (isset($_GET['id'])){
if (medium_passforgotsendemail($_GET['id'])){echo "success: sent change link";}else{echo "error: didnt send change link";}

}else if (isset($_GET['check'])){
if (medium_passforgotcheckemail($_GET['check'])){echo "success: verified";}else{echo "error: not-verified";}

}else{}

?>