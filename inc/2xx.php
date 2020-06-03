<?php

switch ($page) {
    case in_array($page, range(200,249)):
		include("chuck.php");
        break;
    case in_array($page, range(250,299)):
        include("chuck.php");
        break;
	default:
		 include("chuck.php");
		break;
}

?>