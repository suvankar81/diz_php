<?php
//include("Diz/THEME/ADMIN_HOME.php");
include("Diz/THEME/ADMIN_HEADER.php");
//include("Diz/THEME/ADMIN_HOME.php");
if($lnk=="") echo "admin panel home";
elseif(file_exists("Diz/THEME/".$lnk.".php"))  include("Diz/THEME/".$lnk.".php");
else include("Diz/THEME/404.php");
include("Diz/THEME/ADMIN_FOOTER.php");

?>
