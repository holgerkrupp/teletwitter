<?php
session_start();
require "twitter_tokens.php";
require "../twitteroauth/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;


if(empty($_SESSION['oauth_token'])){

$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);

try {
	$request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));
	$_SESSION['oauth_token'] = $request_token['oauth_token'];
	$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
	
	try{
		$url = $connection->url("oauth/authorize", ["oauth_token" => $_SESSION['oauth_token']]);
		echo "<a href=\"$url\">Sign in with Twitter</a>";

	}catch (Exception $e){
	    echo 'Exception authorize request: ',  $e->getMessage(), "\n";
	}
	
	
} catch (Exception $e) {
    echo 'Exception token request: ',  $e->getMessage(), "\n";
}
}else{
	echo "Already signed in.";
	echo "<div class=\"listleft\">";
	echo "Sign out to change user";
	echo "</div>";
	echo "<div class=\"listright\">";
	echo "120";
	echo "</div>";
	echo "<div class=\"listleft\">";
	echo "Timeline";
	echo "</div>";
	echo "<div class=\"listright\">";
	echo "300";
	echo "</div>";
}

//$request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));

?>