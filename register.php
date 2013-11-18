<?PHP

if ($lol=medium_register($_GET['email'],$_GET['username'],$_GET['password'],$_GET['cpassword'],$_GET['firstname'],$_GET['lastname'],$_GET['dob'])){echo $lol;}else{echo "false";}
?>