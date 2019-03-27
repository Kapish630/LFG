<?php
	if(isset($_POST["friendid"])) {
		include("/var/www/html/lfgproject/includes/system/system.php");
		
		$connAddFriend = new mysqli($servername, $username, $password, $dbname);
		
		if ($connAddFriend->connect_error) {
			die("Connection failed: " . $connAddFriend->connect_error);
		}
		
		$sqlFriendCheck = $connAddFriend->query("SELECT * FROM friendslist WHERE (userid1='" . $_SESSION["userbase"]->userId . "' AND userid2='" . $_POST["friendid"] . "') or (userid2='" . $_SESSION["userbase"]->userId . "' AND userid1='" . $_POST["friendid"] . "');");
		
		if ($sqlFriendCheck->num_rows > 0) {
			echo "<script type=\"text/javascript\">location.href = 'https://lfgproject.com/';</script>";
		}else {
			$timeStamp = time();
			$sqlFriendInsert = "INSERT INTO friendslist (userid1, userid2, timestamp) VALUES ('" . $_SESSION["userbase"]->userId . "', '" . $_POST["friendid"] . "', '" . $timeStamp . "');";
			if($connAddFriend->query($sqlFriendInsert ) === TRUE) {
				echo "Friend Added";
			}
		}
	}

?>