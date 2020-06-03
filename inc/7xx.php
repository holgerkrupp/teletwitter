<?php
	session_start();
	require "twitter_tokens.php";
	require "../twitteroauth/autoload.php";
 
	use Abraham\TwitterOAuth\TwitterOAuth;
	
	

if(!empty($_SESSION['oauth_token'])){
	$tweets = $_SESSION['content'];
	$offset = $page - 600;
	
	$id = $tweets[$offset]->id;
	

	
	

	

  	try{
		$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
		//$content =$connection->get("account/verify_credentials");
		
		$tweet =$connection->get("statuses/show", ["id" => $id]);
		

		
		$user = $tweet->user;
		
		$name = $user->name;
		$screen_name = $user->screen_name;
		$text = $tweet->text;
		$created_at = $tweet->created_at;
		$id = $tweet->id;
		
		$_SESSION['fav_id'] = $id;
		$_SESSION['follow_screen_name'] = $screen_name;
		
		echo "<h2>$user->name ($user->screen_name)</h2>";
		

		echo $user->description;
		echo "<br />";
		echo $user->location;
		echo "<br />";
		echo "<br />";
		

		
		echo $text;
		echo "<br />";
		echo "<br />";
		echo $created_at;
		echo "<br />";
		echo "<br />";
		echo $urls->url;
		echo "<br />";
		echo $place->name;
		echo "<br />";
		echo "<br />";

		
		echo "$tweet->retweet_count Retweets";
		echo "<br />";

		
	
		echo "$tweet->favorite_count Likes";



		echo "<h3>Actions</h3>";
		echo "<div class=\"listleft\">";
		
		if ($user->following == false){
			echo "Follow $screen_name";
		}else{
			echo "Unfollow $screen_name";
		}
		echo "</div>";
		echo "<div class=\"listright\">";
		
		if ($user->following == false){
			echo "820";
		}else{
			echo "821";
		}
		echo "</div>";
		echo "<div class=\"listleft\">";
		
		if ($tweet->favorited == false){
			echo "Like Tweet";
		}else{
			echo "Unlike Tweet";
		}
		echo "</div>";
		echo "<div class=\"listright\">";
		if ($tweet->favorited == false){
			echo "822";
		}else{
			echo "823";
		}
		echo "</div>";
		echo "<div class=\"listleft\">";
		if ($tweet->retweeted == false){
			echo "Retweet Tweet";
		}else{
			echo "Undo retweet";
		}
		echo "</div>";
		echo "<div class=\"listright\">";
		if ($tweet->retweeted == false){
			echo "824";
		}else{
			echo "825";
		}
		echo "</div>";

		/*
		echo '<pre>';
		var_dump($tweet);
		echo '</pre>';
		*/
		
		
		
	}catch (Exception $e){
	    echo 'Exception access_token: ',  $e->getMessage(), "\n";
	}
	
}else{
	echo "<div class=\"listleft\">";
	echo "Please login to see tweets";
	echo "</div>";
	echo "<div class=\"listright\">";
	echo "110";
	echo "</div>";
}
?>