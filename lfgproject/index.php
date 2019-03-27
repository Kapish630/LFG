<?php include("includes/system/system.php"); ?>
<html>
<head>
	<?php include("includes/assets/head.php"); ?>
</head>
<body>
	<?php include("includes/assets/header.php"); ?>
	<?php
		if(isset($_SESSION["userbase"])) {
			include("includes/pages/main.php");
		}else {
			include("includes/pages/login.php");
		}
	?>
	<?php include("includes/assets/footer.php"); ?>
</body>
</html>