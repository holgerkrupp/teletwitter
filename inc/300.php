  <?php
  	session_start();
	require "twitter_tokens.php";
	require "../twitteroauth/autoload.php";
 
	use Abraham\TwitterOAuth\TwitterOAuth;
	
	//var_dump($_SESSION);

	if(!empty($_SESSION['oauth_token'])){

	if ($page == 300){
  	try{
		$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
		//$content =$connection->get("account/verify_credentials");
		
		$content =$connection->get("statuses/home_timeline", ["count" => 200, "exclude_replies" => true]);
		$_SESSION['content'] = $content;
	
		
	}catch (Exception $e){
	    echo 'Exception access_token: ',  $e->getMessage(), "\n";
	}
	}else{
		
		 $content = $_SESSION['content'];
	}
  ?>
  
  <h3>Home Timeline</h3>
  <p>

	<?php

	$offset = ($page - 300)*5;
	
	
	
	if (count($content) > 1){
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
		if (count($content) == 1){
			$error = $content->message;
			$error = $content->code;
			echo $message;
			if ($code = 89){
				echo "<div class=\"listleft\">";
				echo "Twitter token got invalid, please sign in again";
				echo "</div>";
				echo "<div class=\"listright\">";
				echo "110";
				echo "</div>";
			}
		}
		echo "no tweets to show";
	}	
		
		}else{
			echo "<div class=\"listleft\">";
			echo "Please login to see your timeline";
			echo "</div>";
			echo "<div class=\"listright\">";
			echo "110";
			echo "</div>";
		}
  	?>


  </p>