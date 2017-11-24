<?php
//echo $lnk;
if($lnk=="") include "en-bn.php";
elseif($lnk=="EN") include "EN_HOME.php";
elseif($lnk=="BN") include "BN_HOME.php";
else echo "404";
?>
