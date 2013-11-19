<?php
error_reporting(E_ERROR);//or at sign in front of include
if ((include "conf.php") != true){die("Doesn't look like you installed this script.");}
@$mysqli = new mysqli($mysqlhost, $mysqluser, $mysqlpass, $mysqldb);
if ($mysqli->connect_errno || !isset($mysqlhost) || !isset($debug)) {
echo "<style>#container {width:500px;padding:0 0 50px;margin:0 auto;}
/* Should you want to set a background colour on a containing element
certain types of bubble effect may require you to include these 
style declarations. */
.content {position:relative;z-index:1;text-align:center;}
.triangle-right.top {background:-webkit-gradient(linear, 0 0, 0 100%, from(#075698), to(#2e88c4));background:-moz-linear-gradient(#075698, #2e88c4);background:-o-linear-gradient(#075698, #2e88c4);background:linear-gradient(#075698, #2e88c4);}
.triangle-border {position:relative;padding:15px;margin:1em 0 3em;border:5px solid #5a8f00;color:#333;background:#fff;-webkit-border-radius:10px;-moz-border-radius:10px;border-radius:10px;}
.triangle-border:before {content:'';position:absolute;bottom:-20px; /* value = - border-top-width - border-bottom-width */left:40px; /* controls horizontal position */border-width:20px 20px 0;border-style:solid;border-color:#5a8f00 transparent; /* reduce the damage in FF3.0 */display:block; width:0;}
/* creates the smaller  triangle */
.triangle-border:after {content:'';position:absolute;bottom:-13px; /* value = - border-top-width - border-bottom-width */left:47px; /* value = (:before left) + (:before border-left) - (:after border-left) */border-width:13px 13px 0;border-style:solid;border-color:#fff transparent;/* reduce the damage in FF3.0 */display:block;width:0;}
/* creates the larger triangle */
.triangle-border.top:before {top:-20px; /* value = - border-top-width - border-bottom-width */bottom:auto;left:auto;right:240px; /* controls horizontal position */border-width:0 20px 20px;}/* creates the smaller  triangle */
.triangle-border.top:after {top:-13px; /* value = - border-top-width - border-bottom-width */bottom:auto;left:auto;right:247px; /* value = (:before right) + (:before border-right) - (:after border-right) */border-width:0 13px 13px;}
</style>";echo "<div id=\"container\"><div class=\"content\"><p class=\"triangle-border top\">" .  (isset($mysqli->connect_error) ? $mysqli->connect_error:'')."<br />" .(isset($mysqlhost) ? 'yes':'db settings are not set') ."</code>.</p></div>"; exit();}
////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
/////////////////////////MAIN FUNCTIONS\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\/////////////////////////////////////
function main_validateusername($username){if (preg_match('/^[a-zA-Z0-9_-]{3,30}$/i', $username)) {return true;}else{ return false;}}
function main_validatepassword($password){if (preg_match('/^[a-zA-Z0-9_-]{3,30}$/i', $password)) {return true;}else{ return false;}}
function main_validatefirstname($firstname){if (preg_match('/^[a-zA-Z]{3,30}$/i', $firstname)) {return true;}else{ return false;}}
function main_validatelastname($lastname){if (preg_match('/^[a-zA-Z]{3,30}$/i', $lastname)) {return true;}else{ return false;}}
function main_validateemail($email){if(filter_var($email, FILTER_VALIDATE_EMAIL)){return true;}else{return false;}}
function main_TableExists($table) {global $mysqli;$res = $mysqli->query("SHOW TABLES LIKE '".$table."';"); if(isset($res->num_rows)) { return $res->num_rows > 0 ? true : false; } else return false;}
////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
/////////////////////////EASY FUNCTIONS\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\/////////////////////////////////////
//user-name - pass - IP address
function easy_install(){global $mysqli;$mysqli->query("CREATE TABLE IF NOT EXISTS `users` ( `id` int(25) NOT NULL AUTO_INCREMENT,`username` varchar(30) NOT NULL, `password` varchar(30) NOT NULL,`ipaddress` varchar(70) NOT NULL, PRIMARY KEY (`id`), KEY `id` (`id`)) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;");}
function easy_mainlogin($username,$password){global $mysqli;$result = $mysqli->query("SELECT * FROM `users` WHERE username='" . $mysqli->real_escape_string($username) . "' and password='" . md5($password) . "'");$row_cnt = $result->num_rows;if($row_cnt==1){echo "truwe";$_SESSION['username'] = $username;$_SESSION['password'] = md5($password);$_SESSION['ipaddress'] = $_SERVER["REMOTE_ADDR"];$mysqli->query("UPDATE `users` SET `ipaddress`='".$_SERVER["REMOTE_ADDR"]."' WHERE `username`='".$mysqli->real_escape_string($username)."' and `password` = '".md5($password)."'");return true;} else { echo "Wrong Username or Password";return false;}$result->close();}
function easy_checkloggedin(){global $mysqli;if (isset($_SESSION['username']) && isset($_SESSION['password']) && isset($_SESSION['ipaddress'])){$result = $mysqli->query("SELECT * FROM `users` WHERE username='" . $_SESSION['username'] . "' and password='" . $_SESSION['password'] . "' and ipaddress='".$_SERVER["REMOTE_ADDR"]."'");$row_cnt = $result->num_rows;if($row_cnt==1){return true;}else{return false;}}else{return false;}}
function easy_register($username,$password){global $mysqli;$result = $mysqli->query("SELECT * FROM `users` WHERE username='" . $mysqli->real_escape_string($username) . "';");$row_cnt = $result->num_rows;if($row_cnt==0){$mysqli->query("INSERT INTO `users`(`username`, `password`, `ipaddress`) VALUES ('".$mysqli->real_escape_string($username)."','".$mysqli->real_escape_string(md5($password))."','not def')");return true;}else{return false;}}
////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
/////////////////////////MEDIUM FUNCTIONS\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\/////////////////////////////////////
function medium_mainlogin($useroremail,$password){global $mysqli;if(filter_var($useroremail, FILTER_VALIDATE_EMAIL)){$result = $mysqli->query("SELECT * FROM `users` WHERE `email`='" . $mysqli->real_escape_string($useroremail) . "' and `password`='" . md5($password) . "';");}else{$result = $mysqli->query("SELECT * FROM `users` WHERE `username`='" . $mysqli->real_escape_string($useroremail) . "' and `password`='" . md5($password) . "';");}$row_cnt = $result->num_rows;if($row_cnt==1){$row = $result->fetch_assoc();if (preg_match('/[0-9]/',$row['timeleft'])){$nextboot = $row['timeleft'] - time();if($nextboot < 0){return "expired on " . $row['timeleft'];}else{$nextpay =date('d M Y H:i', $row['timeleft']);$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];$_SESSION['timeleft'] = $nextpay;$_SESSION['ipaddress'] = $_SERVER["REMOTE_ADDR"];$_SESSION['password'] = md5($password);$_SESSION['email'] = $row['email'];$_SESSION['username'] = $row['username'];$mysqli->query("UPDATE `users` SET `ipaddress`='".$mysqli->real_escape_string($_SERVER["REMOTE_ADDR"])."', `useragent`='".$mysqli->real_escape_string($_SESSION['useragent'])."' WHERE `username`='".$row['username']."' and `password` = '".md5($password)."'");return false;}}else{$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];$_SESSION['timeleft'] = 'lifetime';$_SESSION['ipaddress'] = $_SERVER["REMOTE_ADDR"];$_SESSION['password'] = md5($password);$_SESSION['email'] = $row['email'];$_SESSION['username'] = $row['username'];$mysqli->query("UPDATE `users` SET `ipaddress`='".$_SERVER["REMOTE_ADDR"]."', `useragent`='".$mysqli->real_escape_string($_SERVER["HTTP_USER_AGENT"])."' WHERE `username`='".$mysqli->real_escape_string($useroremail)."' and `password` = '".md5($password)."'");return false;}}else{return "Wrong Username or Password";}}
function medium_install(){global $mysqli;$mysqli->query("CREATE TABLE IF NOT EXISTS `users` (`id` int(25) NOT NULL AUTO_INCREMENT, `email` varchar(255) NOT NULL,  `username` varchar(30) NOT NULL,  `password` varchar(30) NOT NULL, `ipaddress` varchar(255) NOT NULL,  `timeleft` varchar(255) NOT NULL,  `useragent` varchar(255) NOT NULL,  `userlevel` int(5) NOT NULL,  `dob` varchar(25) NOT NULL,  `firstname` varchar(30) NOT NULL,  `lastname` varchar(30) NOT NULL,  `emailverified` int(5) NOT NULL,  PRIMARY KEY (`id`), KEY `id` (`id`) ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;");}
function medium_register($email,$username,$password,$cpassword,$firstname,$lastname,$dob){global $mysqli;if (!empty($email) && !empty($username) && !empty($password)  && !empty($cpassword) && !empty($firstname) && !empty($lastname) && !empty($dob)){if (main_validateemail($email)){if (main_validateusername($username)){if (main_validatepassword($password)){if($password == $cpassword){if (main_validatefirstname($firstname)){if (main_validatelastname($lastname)){if (preg_match('/[0-9]{2}\/[0-9]{2}\/[0-9]{4}/', $dob)){if (($usernamecheck = $mysqli->query("SELECT * FROM `users` WHERE `username`='".$username."'")) && ($emailcheck = $mysqli->query("SELECT * FROM `users` WHERE `email`='".$email."'"))){if ($usernamecheck->num_rows ==0){if ($emailcheck->num_rows ==0){$mysqli->query("INSERT INTO `users`( `email`, `username`, `password`, `ipaddress`, `timeleft`, `useragent`, `userlevel`, `dob`, `firstname`, `lastname`, `emailverified`)  VALUES ('".$email."','".$username."','".md5($password)."','".$_SERVER["REMOTE_ADDR"]."','".(time()+2592000) ."','".$_SERVER['HTTP_USER_AGENT']."','2','".$dob."','".$firstname."','".$lastname."','2')");return false;}else{return "Error: email taken";}}else{return "Error: username taken";}}else{return "query failed";}}else{return "Error: dob not valid";}}else{return "Error: lastname not valid";}}else{return "Error: firstname not valid";}}else{return "Error: password needs to be the same as confirm password.";}}else{return "Error: Password not valid.";}}else{return "Error: Username not valid.";}}else{return "Email not valid.";}}else{return "Error: empty field(s).";}}
//add admin check //add extra checks for admin users
function medium_checkloggedin($checkisadmin = false){global $mysqli;
if (isset($_SESSION['username']) && isset($_SESSION['password']) && isset($_SESSION['ipaddress']) && isset($_SESSION['useragent']) && isset($_SESSION['ipaddress'])){
if ($fhdfh=$mysqli->query("SELECT * FROM `users` WHERE `username`='" . $mysqli->real_escape_string($_SESSION['username']) . "'")){
if($fhdfh->num_rows ==1){$row = $fhdfh->fetch_assoc();
if(($_SERVER["REMOTE_ADDR"] == $row["ipaddress"]) && ($_SERVER['HTTP_USER_AGENT'] == $row["useragent"])){



if($checkisadmin){
if ($row["userlevel"] == 3){return false;}else{return true;}}else{return false;}return false;}else{return true;}
}else{return true;}

}else{return true;}

}else{
return true;
}
}























echo $mysqli->error;
?>