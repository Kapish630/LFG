<?php
if(isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirmpassword"])) {
	if($_POST["username"] == "" || $_POST["email"] == "" || $_POST["password"] == "" || $_POST["confirmpassword"] == "") {
		echo "<div class='alert alert-danger' role='alert'>Cannot leave fields blank.</div>";
	}else {
		if($_POST["password"] != $_POST["confirmpassword"]) {
			echo "<div class='alert alert-danger' role='alert'>The passwords you entered do not match.</div>";
		}elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
			echo "<div class='alert alert-danger' role='alert'>The email you entered is not valid.</div>";
		}elseif(strlen($_POST["password"]) < 8) {
			echo "<div class='alert alert-danger' role='alert'>The password you entered is too short.</div>";
		}elseif(!preg_match("#[0-9]+#", $_POST["password"])) {
			echo "<div class='alert alert-danger' role='alert'>Your password must include at least one number.</div>";
		}elseif(!preg_match("#[a-zA-Z]+#", $_POST["password"])) {
			echo "<div class='alert alert-danger' role='alert'>Your password must include at least one letter.</div>";
		}elseif(preg_match("#[0-9]+#", $_POST["username"][0])) {
			echo "<div class='alert alert-danger' role='alert'>Your user name must not start with a number.</div>";
		}elseif(!preg_match("#[a-zA-Z0-9]+#", $_POST["username"])) {
			echo "<div class='alert alert-danger' role='alert'>Your user name must not contain special characters.</div>";
		}elseif(strlen($_POST["username"]) < 4) {
			echo "<div class='alert alert-danger' role='alert'>Your user name is too short.</div>";
		}else {
			include("system.php");
			$connSignup = new mysqli($servername, $username, $password, $dbname);

			if ($connSignup->connect_error) {
				die("Connection failed: " . $connSignup->connect_error);
			}

			$sqlUserCheck = $connSignup->query("SELECT * FROM Player WHERE Email='" . escape(strtolower($_POST["email"])) . "';");

			if ($sqlUserCheck->num_rows > 0) {
				$connSignup->close();
				echo "<div class='alert alert-danger' role='alert'>This email is already in use.</div>";
			}else{
				$sqlUserInsert = "INSERT INTO Player (UserName, Email, Password, UserAvatar) VALUES ('" . escape($_POST["username"]) . "', '" . escape(strtolower($_POST["email"])) . "', '" . password_hash($_POST["password"], PASSWORD_DEFAULT) . "', 'default.png');";
				if($connSignup->query($sqlUserInsert) === TRUE) {
					$sqlUserReCheck = "SELECT * FROM Player WHERE Email='" . escape(strtolower($_POST["email"])) . "';";
					$sqlUserReCheckResult = $connSignup->query($sqlUserReCheck);
					if($sqlUserReCheckResult->num_rows > 0) {
						while($row = $sqlUserReCheckResult->fetch_assoc()) {
							$_SESSION["userbase"] = new userBase();
							$_SESSION["userbase"]->userId = $row["PlayerID"];
							$_SESSION["userbase"]->userName = $row["UserName"];
							$_SESSION["userbase"]->userEmail = $row["Email"];
							$_SESSION["userbase"]->userAvatar = $row["UserAvatar"];
						}
						$connSignup->close();
						echo "<script type=\"text/javascript\">location.href = 'https://lfgproject.com/';</script>";
					}
				}else {
					echo "<div class='alert alert-danger' role='alert'>" .  $connSignup->error . "</div>";
					$connSignup->close();
				}
			}
		}
	}
}else {
	echo "<div class='alert alert-danger' role='alert'>How did you get here?</div>";
}
?>
