<?php
$folder_depth=0;$PROTOCOL="http://";$DOMAIN="barta.lap";$LINK0=$PROTOCOL.$DOMAIN;$JS=$LINK0."/Diz/THEME/JS/";$IMJ=$LINK0."/Diz/THEME/IMJ/";$CSS=$LINK0."/Diz/THEME/CSS/";
include('CONN.php');
include('FN.php');
if(isset($_POST['Diz_FORM']) && $_POST['Diz_FORM']!=""){
// Some security implementation needed
include("Diz/POST_ACTION/".$_POST['Diz_FORM'].".php");

}
//echo getcwd();echo APP_PATH;
/*$sql = "SELECT * FROM `page` WHERE `Lang`='EN' ORDER BY `ID`";//"SELECT * FROM `page` ORDER BY `page`.`ID` ASC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["ID"]. " - Name: " . $row["LINK"]. " " . $row["PREVIEW"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
*/
/*
if(isset($_COOKIE['SD'])) {
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT * FROM diz_users WHERE id=".$_COOKIE['SD'];
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			//echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
			$user['id']=$row["id"];	$user['name']=$row["name"];	$user['email']=$row["email"];$user['super_id']=$row["super_id"];	$user['pass']=$row["pass"];	$user['active']=$row["active"];$user['role']=$row["role"];
		}
	} else {
		$user['id']="N/A";	$user['name']="N/A";	$user['email']="N/A";	$user['pass']="N/A";	$user['active']="N/A";	$user['role']="N/A";		//echo "0 results";
	}
	$conn->close();
}
$Login=""; if(isset($_COOKIE['SD']) && $_COOKIE['SD']==$user['id']) $Login="Secured";
*/
//  include ROOT_PATH.'/themes/default/header.php';

$url = explode('/', getenv ("REQUEST_URI")); //echo $url[1]; URL_Folder
// // 404 needs to be implemented .
if(isset($url[$folder_depth+1]) && !isset($url[$folder_depth+2]) ) {$lnk=$url[$folder_depth+1]; include("Diz/ROOT_URI/URI_DEFAULT.php"); }
elseif(isset($url[$folder_depth+2]) && !isset($url[$folder_depth+3]) ) {$lnk=$url[$folder_depth+2];include("Diz/ROOT_URI/".$url[$folder_depth+1]."/URI_DEFAULT.php"); }
elseif(isset($url[$folder_depth+3]) && !isset($url[$folder_depth+4]) ) {$lnk=$url[$folder_depth+3];include("Diz/ROOT_URI/".$url[$folder_depth+1]."/".$url[$folder_depth+2]."/URI_DEFAULT.php"); }
elseif(isset($url[$folder_depth+4]) && !isset($url[$folder_depth+5]) ) {$lnk=$url[$folder_depth+4];include("Diz/ROOT_URI/".$url[$folder_depth+1]."/".$url[$folder_depth+2]."/".$url[$folder_depth+3]."/URI_DEFAULT.php"); }
elseif(isset($url[$folder_depth+5]) && !isset($url[$folder_depth+6]) ) {$lnk=$url[$folder_depth+5];include("Diz/ROOT_URI/".$url[$folder_depth+1]."/".$url[$folder_depth+2]."/".$url[$folder_depth+3]."/".$url[$folder_depth+4]."/URI_DEFAULT.php"); }

else { echo "Out of uri handler";}

//elseif(file_exists(ROOT_PATH."/URL_Folder/".rawurldecode($url[1])."/".rawurldecode($url[1]).".php"))  include(ROOT_PATH."/URL_Folder/".rawurldecode($url[1])."/".rawurldecode($url[1]).".php");
//else echo "404";//include(ROOT_PATH."/themes/default/404.php");
//include ROOT_PATH.'/themes/default/footer.php';
