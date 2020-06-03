
<h2>Random Chuck Norris</h2>
<?php

/*
$response =  curl_exec("http://official-joke-api.appspot.com/random_joke");

print_r($response);
print_r(gettype($response));
*/
 // erzeuge einen neuen cURL-Handle
 $ch = curl_init();

 // setze die URL und andere Optionen
 curl_setopt($ch, CURLOPT_URL, "http://api.icndb.com/jokes/random");
 curl_setopt($ch, CURLOPT_HEADER, 0);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

 // führe die Aktion aus und gib die Daten an den Browser weiter
 $response = curl_exec($ch);

	$json = (json_decode($response));
 // schließe den cURL-Handle und gib die Systemresourcen frei
 curl_close($ch);
 
 
 /*
 $finalArray = array();
 $response = str_replace('""', '', $response);
 $asArr = explode( ',', $response );

 foreach( $asArr as $val ){
   $tmp = explode( ':', $val );
   $finalArray[ $tmp[0] ] = $tmp[1];
 }
*/
//print_r(($finalArray));
$vars =  get_object_vars($json);

$vars2 =  get_object_vars($vars["value"]);
echo "<h3>";
echo $vars2["joke"];
echo "</h3>";

//echo $response;
//echo $json['value']['joke'];
	
?>