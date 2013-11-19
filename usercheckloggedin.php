<?php include('./settings/main.php');
if (medium_checkloggedin()){
echo "not an logged.";//fail - with the error
}else{
echo "i think im logged in as admin."; //success
}
?>