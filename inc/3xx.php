<?php
	session_start();
	$name = $_SESSION['screen_name'];
?>
  <h2><?php echo $name; ?></h2>

    <div class='listleft'>
      Home
    </div>
    <div class='listright'>
      300
    </div>
    <div class='listleft'>
      Notifications
    </div>
    <div class='listright'>
      400
    </div>
    <div class='listleft'>
      Profile
    </div>
    <div class='listright'>
      500
    </div>
  <hr>
  <?php
  if ($page < 400){
  			include("300.php");
		}elseif($page < 500){
			include("400.php");
		}else{
			include("500.php");
		}

  ?>