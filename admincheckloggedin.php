<?php include('./settings/main.php');
if ($lol=medium_checkloggedin(true)){
echo $lol;//fail - with the error
}else{
echo "i think im logged in."; //success
}
?>