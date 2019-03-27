<?php
if($_FILES["settings_profilepic"]["name"]) {
	include("/var/www/html/lfgproject/includes/system/system.php");
	$file = "/var/www/html/lfgproject/uploads/profile/" . basename($_FILES["settings_profilepic"]["name"]);
	$fileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));
	if($fileType == "jpg" || $fileType == "jpeg" || $fileType == "png") {
		$temp = explode(".", $_FILES["settings_profilepic"]["name"]);
		$newfilename = round(microtime(true)) . '.' . end($temp);
		
		$connAvatar = new mysqli($servername, $username, $password, $dbname);
		
		if ($connAvatar->connect_error) {
			die("Connection failed: " . $connAvatar->connect_error);
		}
		
		$sqlUpdateAvatar = "UPDATE Player SET UserAvatar='" . $newfilename . "' WHERE PlayerID='" . $_SESSION['userbase']->userId . "'";
		
		if ($connAvatar->query($sqlUpdateAvatar) === TRUE) {
			move_uploaded_file($_FILES["settings_profilepic"]["tmp_name"], "/var/www/html/lfgproject/uploads/profile/" . $newfilename);
			$_SESSION["userbase"]->userAvatar = $newfilename;
			$connAvatar->close();
			echo "<script type=\"text/javascript\">location.href = 'https://lfgproject.com/settings/?a=0';</script>";
		} else {
			$connAvatar->close();
			echo "<script type=\"text/javascript\">location.href = 'https://lfgproject.com/settings/?a=1';</script>";
		}
	}else {
		echo "<script type=\"text/javascript\">location.href = 'https://lfgproject.com/settings/?a=2';</script>";
	}
}else {
	echo "<script type=\"text/javascript\">location.href = 'https://lfgproject.com/settings/?a=3';</script>";
}
?>