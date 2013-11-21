<?php session_start();
//////////////////////
//connection settings
//////////////////////
$mysqlhost="localhost";
$mysqluser="my_user";
$mysqlpass="my_password";
$mysqldb="simple_loginv1";
///////////////////////////
//email validation password to keep it secure
//MUST change it for security reasons... recommended you change it every month. just to be safer
///////////////////////////
$emalvalidpass='supersecurepassword';
////////////////////////////
//////////////////////
//debug settings//////
//ok - on    |  log - put in a file    |    none - none 
//not implemented yet
$debug='none';

//////////////////////
?>