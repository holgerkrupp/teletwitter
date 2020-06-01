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
		

		
		echo "<div class=\"listleft\">";
		echo $user->name;
		echo "<br />";
		echo " (";
		echo $user->screen_name;
		echo ") <br />";
		echo "<br />";
		echo $user->description;
		echo "<br />";
		echo $user->location;
		echo "</div>";
		echo "<div class=\"listright\">";
		echo "&nbsp;";
		echo "</div>";
		
		echo "<div class=\"listleft\">";
		echo "&nbsp;";
		echo "</div>";
		echo "<div class=\"listright\">";
		echo "&nbsp;";
		echo "</div>";
		
		echo "<div class=\"listleft\">";
		echo $text;
		echo "<br />";
		echo $created_at;
		echo "<br />";
		echo "</div>";
		echo "<div class=\"listright\">";
		echo "&nbsp;";
		echo "</div>";
		
		echo "<div class=\"listleft\">";
		echo $urls->url;
		echo "<br />";
		echo $place->name;
		echo "</div>";
		echo "<div class=\"listright\">";
		echo "&nbsp;";
		echo "</div>";
		
		echo "<div class=\"listleft\">";
		echo "Retweets";
		echo "</div>";
		echo "<div class=\"listright\">";
		echo $tweet->retweet_count;
		echo "</div>";
		
		echo "<div class=\"listleft\">";
		echo "Favs";
		echo "</div>";
		echo "<div class=\"listright\">";
		echo $tweet->favorite_count;
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