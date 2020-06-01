  <?php
  	session_start();
	require "twitter_tokens.php";
	require "../twitteroauth/autoload.php";
 
	use Abraham\TwitterOAuth\TwitterOAuth;
	
	if ($_SESSION["lastpage"] > 399){
		unset($_SESSION['content']);
	};
	
	//var_dump($_SESSION);
	
	if(!empty($_SESSION['oauth_token'])){
		
		
		$pageid = 300;
		$offset = 0;
		$page_offset = $page - $pageid;
		
		$tweetsperpage = 5;
		$tweetsperrequest = 200;
		
		$numberofTweets = 0;
		
		$firstTweetNummer = $tweetsperpage*$page_offset;
				
		if(!empty($_SESSION['content'])){
				$lasttweet = end($_SESSION['content']);
				$_SESSION['last_id'] = $lasttweet->id;
				$numberofTweets = count($_SESSION['content']);
		}

		$remaining = $numberofTweets-$firstTweetNummer;
		
//		||($numberofTweets - $firstTweetNummer < $tweetsperpage)

	if (($page == $pageid)||($remaining <= $tweetsperpage)){
  	try{
		$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
		//$content =$connection->get("account/verify_credentials");
		
		$content =$connection->get("statuses/home_timeline", ["count" => $tweetsperrequest, "exclude_replies" => true]);
		
		//$_SESSION['content'] = $content;
	
		if(!empty($_SESSION['content'])&&($page <> $pageid)){
			$_SESSION['content'] = array_merge($_SESSION['content'], $content);
		}else{
			$_SESSION['content'] = $content;
		}
		
		$content = $_SESSION['content'];
	
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

	$offset = ($page - $pageid)*$tweetsperpage;
	
	
	
	if (count($content) > 1){
		for ($i = $offset; $i <= $tweetsperpage-1 + $offset; $i++) {
		
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
		echo "<br />";
		echo $created_at;
		echo "</div>";
		echo "<div class=\"listright\">";
		if (600 + $i < 800){
			echo "600" + $i;
		}
		
		echo "</div>";
		
		}
		/*
		echo '<pre>';
		var_dump($content);
		echo '</pre>';
		*/
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