<?php include('./settings/main.php');
if ($lol=medium_checkloggedin(true)){
echo "not an admin/logged in as one ";//fail - with the error
}else{
echo "i think im logged in."; //success
}
?>