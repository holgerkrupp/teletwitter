<?php
	
$url = "";

switch ($page) {

	case 811:
	    $url = "https://github.com/holgerkrupp/teletwitter";
	    break;
	case 812: // Follow User
	    $url = "http://wunschzettel.holgerkrupp.de";
	    break;
	case 813: // Unfollow User
		$url = "http://paypal.me/Krupp/5";
		break;
	case 814: 
		$url = "https://www.patreon.com/bePatron?u=14754014";
		break;
	default:
		break;
}
if ($url == ""){
	echo "<h2>Invalid page, please try again</h2>";
	include("800.php");
}else{
	echo "Forwarding to: <a href=\"$url\">$url</a><br />";
	echo"<script>";
	echo "var REDIRECTURL = \"$url\";";

	echo"</script>";
}

?>