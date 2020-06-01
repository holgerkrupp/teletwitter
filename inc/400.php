  <?php
  	session_start();
	require "twitter_tokens.php";
	require "../twitteroauth/autoload.php";
 
	use Abraham\TwitterOAuth\TwitterOAuth;
	
if(!empty($_SESSION['oauth_token'])){
	

	if ($page == 400){
  	try{
		$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
		//$content =$connection->get("account/verify_credentials");
		
		$content =$connection->get("statuses/mentions_timeline", ["count" => 200, "exclude_replies" => false]);
		$_SESSION['content'] = $content;
	
	/*	
		echo '<pre>';
		var_dump($content);
		echo '</pre>';
	*/	
		
	}catch (Exception $e){
	    echo 'Exception access_token: ',  $e->getMessage(), "\n";
	}
	}else{
		
		 $content = $_SESSION['content'];
	}
  ?>
  
  <h3>Notifications</h3>
  <p>

	<?php

	$offset = ($page - 400)*5;
	
	//var_dump($page);
	
	
	if (count($content) > 0){
		for ($i = $offset; $i <= 4 + $offset; $i++) {
		
		$tweet = $content[$i];
		
		$user = $tweet->user;
		
		$name = $user->name;
		$screen_name = $user->screen_name;
		$text = $tweet->text;
		$created_at = $tweet->created_at;
		$id = $tweet->id;

		echo "<div class=\"listleft\">";
		echo $name;
		echo "(";
		echo $screen_name;
		echo ") <br />";
		echo $text;
		echo ") <br />";
		echo $created_at;
		echo "</div>";
		echo "<div class=\"listright\">";
		echo "700" + $i;
		echo "</div>";
		
		}
	}else{
		echo "no tweets to show";
	}	
}else{
	echo "<div class=\"listleft\">";
	echo "Please login to see your Notifications";
	echo "</div>";
	echo "<div class=\"listright\">";
	echo "110";
	echo "</div>";
}
  	?>


  </p>