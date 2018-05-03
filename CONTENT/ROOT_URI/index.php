<?php
$lnk2 = explode('?', $lnk);
  include("HEADER.php");// echo "<br>";var_dump($_SERVER['HTTP_REFERER']);// echo $lnk."c";
  if($lnk=="") include("home.php");
  elseif(file_exists(__DIR__."/".$lnk.".php"))  include($lnk.".php");
  elseif(isset($lnk2[1]) && file_exists(__DIR__."/".$lnk2[0].".php") ) include($lnk2[0].".php");
  else include("404.php");
  include("FOOTER.php");

?>
