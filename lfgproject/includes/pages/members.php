<?php $getUser = $_GET["user"]; ?>
<div class="container" style="padding-top: 25px; padding-bottom: 25px;">
	<div class="row">
		<?php
			if(!isset($getUser)) {
				echo "<div class='col-lg-1'></div>";
				echo "<div class='col-lg-10'>";
			
					$connMembers = new mysqli($servername, $username, $password, $dbname);
			
					if ($connMembers->connect_error) {
						die("Connection failed: " . $connMembers->connect_error);
					}
					$sqlMembers = "SELECT * FROM users WHERE NOT id='" . $_SESSION["userbase"]->userId . "';";
					$sqlMembersResult = $connMembers->query($sqlMembers);
					if($sqlMembersResult->num_rows > 0) {
						while($row = $sqlMembersResult->fetch_assoc()) {
							echo "<div style='margin-bottom: 10px;' class='card'>";
								echo "<div class='card-body'>";
									echo "<p class='card-text'>";
										echo "<img src='https://lfgproject.com/uploads/profile/" . $row["useravatar"] . "' width='64' height='64' /> "; 
										echo "<a href='https://lfgproject.com/members/?user=" . $row["id"] . "'>" . $row["username"] . "</a>"; 
									echo "</p>";
								echo "</div>";
							echo "</div>";
						}
					}
					$connMembers->close();
			
				echo "</div>";
				echo "<div class='col-lg-1'></div>";
			}else {
				echo "<div class='col-lg-3'>";
					echo "<div class='card'>";
						echo "<img class='card-img-top' width='180' height='180' src='https://lfgproject.com/uploads/profile/" . dbConversion($getUser, "useravatar") . "' alt=''>";
						echo "<div class='card-body'>";
							echo "<h5 class='card-title'>Welcome Back</h5>";
							echo "<p class='card-text'>" . dbConversion($getUser, "username") . "</p>";
						echo "</div>";
						echo "<ul class='list-group list-group-flush'>";
						if(checkFriend($_SESSION["userbase"]->userId, $getUser) > 0) {
							echo "<li class='list-group-item'>Friends</li>";
						}else {
							echo "<li class='list-group-item'><a class='addFriend' id='addfriend_" . $getUser . "' href='#'>Add Friend</a></li>";
						}
							echo "<li class='list-group-item'><a href='#'>Send Message</a></li>";
						echo "</ul>";
					echo "</div>";
				echo "</div>";
				echo "<div class='col-lg-9'>";
					echo "<div id='membersAlert' class='alert alert-success' role='alert' style='display: none;'></div>";
					echo "<div class='card'>";
						echo "<div class='card-body'>";
							echo "<p class='card-text'>" . dbConversion($getUser, "emailaddress") . "</p>";
						echo "</div>";
					echo "</div>";
				echo "</div>";
			}
		?>
	</div>
</div>