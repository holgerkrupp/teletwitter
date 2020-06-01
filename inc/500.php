  <?php
  	session_start();
	require "twitter_tokens.php";
	require "../twitteroauth/autoload.php";
 
	use Abraham\TwitterOAuth\TwitterOAuth;
	if(!empty($_SESSION['oauth_token'])){
	if (empty($_SESSION['user'])){
  	try{
		$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
		//$content =$connection->get("account/verify_credentials");
		
		$user =$connection->get("account/verify_credentials");
	$_SESSION['user'] = $user;
	

	
		
	}catch (Exception $e){
	    echo 'Exception access_token: ',  $e->getMessage(), "\n";
	}
}else{
	 $user = $_SESSION['user'];
}
	
  ?>
  
  <h3>Account Information</h3>
  <p>
	  <?php
	  echo $user->name;
	  echo "<br />";
	  echo $user->screen_name;
	  echo "<p>";
	  echo $user->description;
	  echo "<p>";
	  echo $user->location;
	  echo "<br />";
	  
	echo "<div class=\"listleft\">";
	echo "Followers";
	echo "</div>";
	echo "<div class=\"listright\">";
	echo $user->followers_count;
	echo "</div>";
	echo "<div class=\"listleft\">";
	echo "Following";
	echo "</div>";
	echo "<div class=\"listright\">";
	echo $user->friends_count;
	echo "</div>";
  echo "<p>";
  echo "<br />";
  echo "<p>";
  echo "joined ";
  echo $user->created_at;
	  
	  
}else{
	echo "<div class=\"listleft\">";
	echo "Please login to see your profile";
	echo "</div>";
	echo "<div class=\"listright\">";
	echo "110";
	echo "</div>";
}
	  
	  ?>
  </p>
  <?php
  /*
echo '<pre>';
var_dump($user);
echo '</pre>';
  */
?>