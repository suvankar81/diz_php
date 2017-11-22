<?php
if($_SERVER['SERVER_NAME']==DOMAIN_NAME) include "CONFIG/config.php"; else include "CONFIG/config-local.php";
foreach (glob("DIZ/FN/*.php") as $filename) include $filename; //to include DIZ-PHP's built-in functions
foreach (glob("CONTENT/FN_C/*.php") as $filename) include $filename; //to include this APP's functions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['FORM_NAME']) && $_POST['FORM_NAME']!==""){
      // Some security implementation needed
      $form_processor="CONTENT/POST_ACTION/".$_POST['FORM_NAME'].".php";
      if(file_exists($form_processor)) include $form_processor; else $FormReply->info = "Form handler not found !"; //Ajax Form Notification
  }else $FormReply->info = "Form handler not Defiened !";
}

//echo $url[F_D+1];
// URI Handler with Folder_Depth
if(isset($url[F_D+2])) {
  if(file_exists("CONTENT/ROOT_URI/".$url[F_D+2]."/index.php")) include "CONTENT/ROOT_URI/".$url[F_D+2]."/index.php";
  else $Notify->info = "Form handler not found !";
} else {
  include "CONTENT/ROOT_URI/index.php";
}
