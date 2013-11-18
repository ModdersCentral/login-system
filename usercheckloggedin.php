<?php include('./settings/main.php');
if ($lol=medium_checkloggedin()){
echo $lol;//fail - with the error
}else{
echo "i think im logged in."; //success
}
?>