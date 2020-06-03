<?php
  	session_start();
	$page = intval($_POST["page"]);
	if (is_null($page)){
		$page = 100;
	}
	if (!empty($_SESSION["page"])){
			$_SESSION["lastpage"] = $_SESSION["page"];
	}

	$_SESSION["page"] = $page;


switch ($page) {
    case in_array($page, range(100,199)):
		include("1xx.php");
        break;
    case in_array($page, range(200,299)):
        include("2xx.php");
        break;
    case in_array($page, range(300,599)):
        include("3xx.php");
        break;
	case in_array($page, range(600,799)):
	    include("7xx.php");
	    break;
	case in_array($page, range(800,999)):
	        include("8xx.php");
	        break;
	default:
		echo $page;
		break;
}

?>