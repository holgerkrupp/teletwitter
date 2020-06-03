  <?php
  	session_start();
	require "twitter_tokens.php";
	require "../twitteroauth/autoload.php";
	 
	use Abraham\TwitterOAuth\TwitterOAuth;
	
	if(!empty($_SESSION['follow_screen_name'])){
		$follow_screen_name = $_SESSION['follow_screen_name'];
	}else{
		$follow_screen_name = "_holger";
	}
	
	
	
	if(!empty($_SESSION['oauth_token'])){
		 
		
  	try{
		$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
		//$content =$connection->get("account/verify_credentials");
		if ($page == 820){
			$follow =$connection->post("friendships/create", ["screen_name" => $follow_screen_name]);
		}else{
			$follow =$connection->post("friendships/destroy", ["screen_name" => $follow_screen_name]);
		}
		
		
		
	
	}catch (Exception $e){
	    echo 'Exception access_token: ',  $e->getMessage(), "\n";
	}
	
  ?>
  
	<?php
	echo "<h3>";
	if ($page == 820){
		echo "Follow";
	}else{
		echo "Unfollow";
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
			
			if ($page == 820){
				echo "Thank you for following ";
				echo $follow_screen_name;
			}else{
				echo "You've unfollowed $follow_screen_name";
				echo "<div class=\"listleft\">";
				echo "Refollow $follow_screen_name";
				echo "</div>";
				echo "<div class=\"listright\">";
				echo "820";
				echo "</div>";
			}

		}



	}else{

		echo "Error";
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