<?php include("/var/www/html/lfgproject/includes/system/system.php"); ?>
<html>
<head>
	<?php include("/var/www/html/lfgproject/includes/assets/head.php"); ?>
</head>
<body>
	<?php include("/var/www/html/lfgproject/includes/assets/header.php"); ?>
	<?php
		if(isset($_SESSION["userbase"])) {
			include("/var/www/html/lfgproject/includes/pages/members.php");
		}else {
			echo "<script type=\"text/javascript\">location.href = 'https://lfgproject.com/';</script>";
		}
	?>
	<?php include("/var/www/html/lfgproject/includes/assets/footer.php"); ?>
</body>
</html>