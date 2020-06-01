<?php
session_start();
include("inc/html_header.php");
require "inc/twitter_tokens.php";
require "twitteroauth/autoload.php";


?>


<div id='header'>
	<div style="width: 20%; float:left" id ='page'>
	   <div style="width: 50%; float:left" id ='currentpage'>
		   &nbsp;
	   </div>
	   <div style="width: 50%; float:left" id ='pagelookup'>
		   &nbsp;
	   </div>
	</div>
	<div style="width: 80%; float:right" id='clock'>
	    &nbsp;
	</div>
 
</div>


<div id='main'>
  <h1>Teletwitter</h1>
  <div id ='pagecontent'>
	  <?php
	  include("inc/000.php");
	  ?>
	</div>
</div>
<?php
	include("inc/footer.php");
?>

<?php
echo "</html>";
?>