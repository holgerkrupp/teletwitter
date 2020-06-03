  <?php
  	session_start();
	require "twitter_tokens.php";
	require "../twitteroauth/autoload.php";
	 
	use Abraham\TwitterOAuth\TwitterOAuth;
	

	
	if(!empty($_SESSION['oauth_token'])){
	if(!empty($_SESSION['fav_id'])){
		
  	try{
		$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
		//$content =$connection->get("account/verify_credentials");
		if ($page == 822){
			$follow =$connection->post("favorites/create", ["id" => $_SESSION['fav_id']]);
		}else{
			$follow =$connection->post("favorites/destroy", ["id" => $_SESSION['fav_id']]);
		}
		
		
		
	
	}catch (Exception $e){
	    echo 'Exception access_token: ',  $e->getMessage(), "\n";
	}
	
  ?>
  
	<?php
	echo "<h3>";
	if ($page == 822){
		echo "Like";
	}else{
		echo "Dislike";
	}
	echo "</h3>";
	echo "<p>";
	
	/*
	echo '<pre>';
	var_dump($follow);
	echo '</pre>';
	*/
	
	
	if (count($follow) > 0){
		
		if (!empty($follow->errors)){
			$error = $follow->errors[0];
			echo $error->message;
		}else{
			$user = $follow->user;
			echo $follow->text;
			echo "<br/>";
			echo "$user->name ($user->screen_name)";
			echo "<p>";
			if ($page == 822){
				echo "Thank you for liking this Tweet ";
				echo "<div class=\"listleft\">";
				echo "Undo";
				echo "</div>";
				echo "<div class=\"listright\">";
				echo "823";
				echo "</div>";
			}else{
				echo "You've disliked this Tweet";
				echo "<div class=\"listleft\">";
				echo "Like it again";
				echo "</div>";
				echo "<div class=\"listright\">";
				echo "822";
				echo "</div>";
			}

		}



	}else{

		echo "Error";
	}	
		}else{
			echo "No Tweet to Like selected";
		}
			
		}else{
			echo "<div class=\"listleft\">";
			echo "Please login to follow $follow_screen_name on Twitter";
			echo "</div>";
			echo "<div class=\"listright\">";
			echo "110";
			echo "</div>";
		}
	


  	?>


  </p>