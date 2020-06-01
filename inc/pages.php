<?php

$page = intval($_POST["page"]);
if (is_null($page)){
	$page = 100;
}

$_SESSION["page"] = $page;


switch ($page) {
    case in_array($page, range(100,199)):
		include("1xx.php");
        break;
    case in_array($page, range(200,299)):
        echo "User profil";
        break;
    case in_array($page, range(300,599)):
        include("3xx.php");
        break;
	case in_array($page, range(600,799)):
	    include("7xx.php");
	    break;
	case in_array($page, range(800,999)):
	        include("9xx.php");
	        break;
	default:
		echo $page;
		break;
}

?>