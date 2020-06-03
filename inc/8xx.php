
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
  <div class='listleft'>
    Follow @_holger
  </div>
  <div class='listright'>
    820
  </div>
<hr>
<?php

switch ($page) {
    case 800:
	// twitter login pages
	//	echo "Twitter login";
		include("800.php");
        break;
    case 810:
       include("810.php");
        break;
	case in_array($page, range(811,819)):
	       include("supportforward.php");
	        break;
	case 820: // Follow User
	    include("820.php");
	    break;
	case 821: // Unfollow User
		include("820.php");
		break;
	case 822: // Like Tweet
		include("822.php");
		break;
	case 823: // Dislike Tweet
		include("822.php");
		break;
	case 824: // Retweet Tweet
		include("824.php");
		break;
	case 825: // Undo Retweet Tweet
		include("824.php");
		break;
	default:
		include("800.php");
		break;
}
?>