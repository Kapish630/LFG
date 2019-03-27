<?php
if(isset($_POST["email"]) && isset($_POST["password"])) {
	if($_POST["email"] == "" || $_POST["password"] == "") {
		echo "<div class='alert alert-danger' role='alert'>Cannot leave fields blank.</div>";
	}else {
		include("system.php");

		$connLogin = new mysqli($servername, $username, $password, $dbname);

		if ($connLogin->connect_error) {
			die("Connection failed: " . $connLogin->connect_error);
		}

		$sqlUserCheck = $connLogin->query("SELECT * FROM Player WHERE Email='" . escape(strtolower($_POST["email"])) . "';");

		if ($sqlUserCheck->num_rows > 0) {
			while($row = $sqlUserCheck->fetch_assoc()) {
				if(!password_verify($_POST["password"], $row["Password"])) {
					echo "<div class='alert alert-danger' role='alert'>The password you entered does not match the one in our system.</div>";
					$connLogin->close();
				}else {
					$_SESSION["userbase"] = new userBase();
					$_SESSION["userbase"]->userId = $row["PlayerID"];
					$_SESSION["userbase"]->userEmail = $row["Email"];
					$_SESSION["userbase"]->userName = $row["UserName"];
					$_SESSION["userbase"]->userAvatar = $row["UserAvatar"];

					$connLogin->query("UPDATE Player SET isOnline=1 WHERE PlayerID='". escape($_SESSION["userbase"]->userID) . "';");

					$connLogin->close();
					echo "<script type=\"text/javascript\">location.href = 'https://lfgproject.com/';</script>";
				}
			}
		}else {
			$connLogin->close();
			echo "<div class='alert alert-danger' role='alert'>The email you entered is not in our system.</div>";
		}
	}
}
?>
