<?php include('./settings/main.php');
//
//COMPLETE
//
//
if (isset($_GET['id'])){
if (medium_sendvalidateemail($_GET['id'])){echo main_text2bbc("[color=green]success:[/color] sent verification code");}else{echo main_text2bbc("[color=red]error:[/color] didnt send verification code");}

}else if (isset($_GET['check'])){
if (medium_checkvalidateemail($_GET['check'])){echo "success: verified";}else{echo "error: not-verified";}

}

?>