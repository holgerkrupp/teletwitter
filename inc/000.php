<?php
session_start();

require "twitter_tokens.php";

//require "twitteroauth/autoload.php";
use Abraham\TwitterOAuth\TwitterOAuth;

if (!empty($_GET['oauth_token'])){
	$_SESSION['oauth_token'] = $_GET['oauth_token'];
}
if (!empty($_GET['oauth_verifier'])){
	$_SESSION['oauth_verifier'] = $_GET['oauth_verifier'];
}



if (!empty($_SESSION['oauth_verifier'])){
	try{
		$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
		$oauth_verifier = $_SESSION['oauth_verifier'];
		
		$access_token = $connection->oauth("oauth/access_token", ["oauth_token" => $_SESSION['oauth_token'],"oauth_verifier" => $_SESSION['oauth_verifier']]);
	
		$_SESSION['oauth_token'] = $access_token['oauth_token'];
		$_SESSION['oauth_token_secret'] = $access_token['oauth_token_secret'];
		$_SESSION['screen_name'] = $access_token['screen_name'];
		$_SESSION["user_id"] = $access_token["user_id"];
		
  	  define('ACCESS_TOKEN', $_SESSION['oauth_token']);
  	  define('ACCESS_SECRET', $_SESSION['oauth_token_secret']);
		
	}catch (Exception $e){
	  //  echo 'Exception access_token: ',  $e->getMessage(), "\n";
	}
}
/*
echo '<pre>';
var_dump($_SESSION);
echo '</pre>';
*/
?>

	  Welcome to Teletwitter
	  <?php
	  if (!empty($_SESSION['screen_name'])){
		  echo " ";
		  echo $_SESSION['screen_name'];
	  }
	  ?>. To navigate, simply enter the corresponding page numbers.
	  <h2>Navigation</h2>
	  <?php
	  if (empty($_SESSION['screen_name'])){
		  echo "<div class='listleft'>";
		  echo "Sign in with twitter";
		  echo"</div>";
   	  	  echo "<div class='listright'>";
   	  	  echo " 110";
   	  	  echo "</div>";
	  }else{
		  echo "<div class='listleft'>";
		  echo "Logout";
		  echo"</div>";
   	  	  echo "<div class='listright'>";
   	  	  echo " 120";
   	  	  echo "</div>";
	  }
	  ?>
	  <div class='listleft'>
	    Timeline
	  </div>
	  <div class='listright'>
	    300
	  </div>
	  <div class='listleft'>
	    Contact and more Info
	  </div>
	  <div class='listright'>
	    800
	  </div>



