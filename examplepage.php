<?php include('./settings/main.php');
//
//COMPLETE
//
//
if (medium_checkloggedin()){
echo "not logged in.";//fail
}else{
echo main_text2bbc("[color=green]success:[/color]vi think im logged in. WOOHOO!!"); //success
}
?>