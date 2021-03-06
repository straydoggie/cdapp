<?php
// by straydoggie
include_once "./php/config.php";
include_once "../../common/basis.php";
$code = $_GET ['code'];
$userid = 'test';
if(!testmode()){$userid = file_get_contents('http://localhost/cdapp/functions/common/wx_access.php?mathod=verify_user&code='.$code);}
$userid = trim($userid, "\xEF\xBB\xBF");
function echoUID()
{
	global $userid;
	if($userid){
	echo $userid;
	}
}

function echoJS()
{
	global $userid;
	if(!empty($userid)&&$userid!=''){
		echo file_get_contents("./js/exercise_fav.js"); 
		journal('zztk_fav','approved: '. $userid);
	}
	else{
		echo file_get_contents("./js/fmx.js"); 
	}
}

function echoURL()
{
	global $userid;
	if($userid){
		echo approot();
	}
}

function echoName() {
	echo appname();
}

function echoMark() {
	echo appnamemark();
}

function echoColor($type) {
	echo themecolor($type);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<meta charset="UTF-8" content="">
<meta content="width=device-width,user-scalable=no" name="viewport">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title></title>
    <base href=<?php echoURL(); ?> />
    <base target="_blank" />
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.0.js"></script>
	<script src="js/ext_disable_popup_title.js"></script>
    <link href="css/normal.css" rel="stylesheet" type="text/css" /> </head>

<body>
	<div id="inform">
    	<div id="suid"><?php echoUID(); ?></div>
		<div id="appn"><?php echoName(); ?></div>
		<div id="appm"><?php echoMark(); ?></div>
		<div id="cr_l"><?php echoColor('fav_light'); ?></div>
		<div id="cr_d"><?php echoColor('fav_dark'); ?></div>
    </div>
    <div id="container">
        <div id="header"></div>
        <div id="content">
            <div id="work" class="part"></div>
        </div>
        <div id="footer"></div>
    </div>
    <script type="text/javascript">
        <?php echoJS(); ?>
    </script>
</body>
</html>