<?php include('./settings/main.php');
if (medium_checkloggedin(true)){
echo "not an admin/logged in as one/at all ";//fail - with the error
}else{
echo "i think im logged in as admin."; //success
}
?>
