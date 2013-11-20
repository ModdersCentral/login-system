<?php include('./settings/main.php');
if (medium_checkloggedin()){
echo "not logged in.";//fail
}else{
echo "i think im logged in as admin."; //success
}
?>
