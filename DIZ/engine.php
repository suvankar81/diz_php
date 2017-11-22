<?php
include "DIZ/DirectAccess-preventer.php";
if($_SERVER['SERVER_NAME']==DOMAIN_NAME) include "CONFIG/config.php"; else include "CONFIG/config-local.php";
foreach (glob("DIZ/FN/*.php") as $filename) include $filename; //to include DIZ-PHP's built-in functions
foreach (glob("CONTENT/FN_C/*.php") as $filename) include $filename; //to include this APP's functions

if(isset($_POST['FORM_NAME']) && $_POST['FORM_NAME']!=""){
// Some security implementation needed
file_exists("CONTENT/POST_ACTION/".$_POST['FORM_NAME'].".php") include("CONTENT/POST_ACTION/".$_POST['FORM_NAME'].".php");
else $FormReply->info = "Form handler not found !";
}
