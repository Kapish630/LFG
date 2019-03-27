<?php
//include Objects
include("/var/www/html/lfgproject/includes/objects/userbase.php");

//set default timezone
date_default_timezone_set("America/New_York");

//session settings
session_set_cookie_params(43200);
session_start();

//mysql credentials could be more secure but aint nobody got time for that
$servername = "localhost";
$username = "root";
$password = "1stardragonball";
$dbname = "lfgproject";

//api keys
$api_riot = "RGAPI-2df6d40b-4d18-4512-8827-f21d170f726c";
$api_apex = "5c34a750-8781-4015-81b0-d71c960cffd1";

//functionlist
function escape($str) {
   $search=array("\\","\0","\n","\r","\x1a","'",'"');
   $replace=array("\\\\","\\0","\\n","\\r","\Z","\'",'\"');
   return str_replace($search,$replace,$str);
}
function dbConversion($userID, $search) {
	$servername = "localhost";
	$username = "root";
	$password = "1stardragonball";
	$dbname = "lfgproject2";

	$conn = new mysqli($servername, $username, $password, $dbname);

	$sql = $conn->query("SELECT * FROM Player WHERE PlayerID='$userID';");

	if($sql->num_rows > 0) {
		while($row = $sql->fetch_assoc()) {
			return $row[$search];
		}
	}
	$conn->close();
}
function checkFriend($user1, $user2) {
	$servername = "localhost";
	$username = "root";
	$password = "1stardragonball";
	$dbname = "lfgproject2";

	$conn = new mysqli($servername, $username, $password, $dbname);

	$sql = $conn->query("SELECT * FROM Friends WHERE (PlayerID='" . $user1 . "' AND FriendID='" . $user2 . "') or (FriendID='" . $user1 . "' AND PlayerID='" . $user2 . "');");

	return $sql->num_rows;
	$conn->close();
}
?>
