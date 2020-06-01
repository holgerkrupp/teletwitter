<?php

switch ($page) {
    case 100:
		include("100.php");
        break;
    case 110:
       include("110.php");
        break;
	 case 120:
	       include("120.php");
	        break;
	default:
		include("100.php");
		break;
}
	
	


?>