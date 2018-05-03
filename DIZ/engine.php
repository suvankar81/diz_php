<?php
session_start();
$url = explode('/', $_SERVER['REQUEST_URI']);
$FormReply= new stdClass();
$Notify= new stdClass();
if($_SERVER['SERVER_NAME']===DOMAIN_NAME) include "CONFIG/config.php"; else include "CONFIG/config-local.php";
$GLOBALS['alert_info']="";$GLOBALS['post_info']="";
foreach (glob("DIZ/FN/*.php") as $filename) include $filename; //to include DIZ-PHP's built-in functions
foreach (glob("CONTENT/FN_C/*.php") as $filename) include $filename; //to include this APP's functions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['FORM_NAME']) && $_POST['FORM_NAME']!==""){
      // Some security implementation needed
      $form_processor="CONTENT/POST_ACTION/".$_POST['FORM_NAME'].".php";
      if(file_exists($form_processor)) include $form_processor; else { $FormReply->info = "Form handler not found !"; }//Ajax Form Notification
  }else {$FormReply->info = "Form handler not Defiened !";}
}
//echo $url[F_D+2];
//echo $url[F_D+1]; var_dump($url);
// URI Handler with Folder_Depth
// function dizPhpRouter($fp,$fn){

// }

// $p=1;
// if(!isset($url[$p+1])) {
//   $lnk=$url[$p];
//   include "CONTENT/ROOT_URI/index.php";
// }
// $p++;
// while(isset($url[$p])){
//   $urltp="/";$urltp=$urltp.$url[$p];
//   $p++;
//   if(!isset($url[$p])){
//     if(file_exists("CONTENT/ROOT_URI/".$urltp."/index.php")) include "CONTENT/ROOT_URI/".$urltp."/index.php";
//     else  {$Notify->info = "URI handler not found !";}
//   }
// }
//var_dump($url);

//$url_pos=F_D+2;
function i404(){include "CONTENT/ROOT_URI/404.php";}
$inc="";
if(isset($url[F_D+2])) {$inc=$url[F_D+1]; //echo $inc."<br>";
  if(isset($url[F_D+3])) {$inc=$inc."/".$url[F_D+2]; //echo $inc."<br>";
    if(isset($url[F_D+4])) {$inc=$inc."/".$url[F_D+3]; //echo $inc."<br>";
      if(isset($url[F_D+5])) {$inc=$inc."/".$url[F_D+4]; //echo $inc."<br>";
        if(isset($url[F_D+6])) {$inc=$inc."/".$url[F_D+5]; //echo $inc."<br>";
          if(isset($url[F_D+7])) {$inc=$inc."/".$url[F_D+6]; //echo $inc."<br>";
            if(isset($url[F_D+8])) {$inc=$inc."/".$url[F_D+7]; //echo $inc."<br>";
              if(isset($url[F_D+9])) {$inc=$inc."/".$url[F_D+8]; //echo $inc."<br>";
                if(isset($url[F_D+10])) {$inc=$inc."/".$url[F_D+9]; //echo $inc."<br>";
                  $lnk=$url[F_D+8];
                  if(file_exists("CONTENT/ROOT_URI/".$inc."/index.php")) include "CONTENT/ROOT_URI/".$inc."/index.php";
                  else  {$Notify->info = "URI handler not found !"; i404();}
                }
                else {
                  $lnk=$url[F_D+9];
                  if(file_exists("CONTENT/ROOT_URI/".$inc."/index.php")) include "CONTENT/ROOT_URI/".$inc."/index.php";
                  else  {$Notify->info = "URI handler not found !"; i404();}
                }
              }
              else {
                $lnk=$url[F_D+8];
                if(file_exists("CONTENT/ROOT_URI/".$inc."/index.php")) include "CONTENT/ROOT_URI/".$inc."/index.php";
                else  {$Notify->info = "URI handler not found !"; i404();}
              }
            }
            else {
              $lnk=$url[F_D+7];
              if(file_exists("CONTENT/ROOT_URI/".$inc."/index.php")) include "CONTENT/ROOT_URI/".$inc."/index.php";
              else  {$Notify->info = "URI handler not found !"; i404();}
            }
          }
          else {
            $lnk=$url[F_D+6];
            if(file_exists("CONTENT/ROOT_URI/".$inc."/index.php")) include "CONTENT/ROOT_URI/".$inc."/index.php";
            else  {$Notify->info = "URI handler not found !"; i404();}
          }
        }
        else {
          $lnk=$url[F_D+5];
          if(file_exists("CONTENT/ROOT_URI/".$inc."/index.php")) include "CONTENT/ROOT_URI/".$inc."/index.php";
          else  {$Notify->info = "URI handler not found !"; i404();}
        }
      }
      else {
        $lnk=$url[F_D+4];
        if(file_exists("CONTENT/ROOT_URI/".$inc."/index.php")) include "CONTENT/ROOT_URI/".$inc."/index.php";
        else  {$Notify->info = "URI handler not found !"; i404();}
      }
    }
    else {
      $lnk=$url[F_D+3];
      if(file_exists("CONTENT/ROOT_URI/".$inc."/index.php")) include "CONTENT/ROOT_URI/".$inc."/index.php";
      else  {$Notify->info = "URI handler not found !"; i404();}
    }
  }
  else {
    $lnk=$url[F_D+2];
    if(file_exists("CONTENT/ROOT_URI/".$inc."/index.php")) include "CONTENT/ROOT_URI/".$inc."/index.php";
    else  {$Notify->info = "URI handler not found !"; i404();}
  }
}
else {
  $lnk=$url[F_D+1];
  include "CONTENT/ROOT_URI/index.php";
}

// $url_pos=F_D+2;
// if(isset($url[F_D+2])) {
//   $lnk=$url[F_D+2];
//   if(file_exists("CONTENT/ROOT_URI/".$url[F_D+1]."/index.php")) include "CONTENT/ROOT_URI/".$url[F_D+1]."/index.php";
//   else  {$Notify->info = "URI handler not found !";}
// } else {
//   $lnk=$url[F_D+1];
//   include "CONTENT/ROOT_URI/index.php";
// }
