<?php include('./settings/main.php');
if ($lol=medium_register($_GET['email'],$_GET['username'],$_GET['password'],$_GET['cpassword'],$_GET['firstname'],$_GET['lastname'],$_GET['dob'])){
echo $lol;//fail
}else{
echo "registered success"; //success
}
?>
