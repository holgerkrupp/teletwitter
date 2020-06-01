
<h2>Contact & Info</h2>

  <div class='listleft'>
    Info
  </div>
  <div class='listright'>
    800
  </div>
  <div class='listleft'>
    Contact
  </div>
  <div class='listright'>
    810
  </div>
<hr>
<?php

switch ($page) {
    case 800:
	// twitter login pages
	//	echo "Twitter login";
		include("900.php");
        break;
    case 810:
       include("910.php");
        break;

	default:
		include("900.php");
		break;
}
?>