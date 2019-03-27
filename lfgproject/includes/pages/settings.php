<?php $getSettingsAlerts = $_GET["a"]; ?>
<div class="container" style="padding-top: 25px; padding-bottom: 25px;">
	<div class="row">
		<div class="col-lg-3">
			<?php include("/var/www/html/lfgproject/includes/assets/usercard.php"); ?>
		</div>
		<div class="col-lg-9">
			<div class="card">
				<div class="card-body">
					<form method="post" action="https://lfgproject.com/includes/system/avatar.php" enctype="multipart/form-data">
						<fieldset>
							<legend>Add Profile Picture</legend>
						</fieldset>
						<div class="form-group">
							<img width="64" height="64" src="https://lfgproject.com/uploads/profile/<?php echo $_SESSION["userbase"]->userAvatar; ?>" />
							<input id="settings_profilepic" name="settings_profilepic" type="file" />
						</div>
						<button type="submit" class="btn btn-primary btn-block">Upload</button>
					</form>
					<?php
						switch($getSettingsAlerts) {
							case "0" :
								echo "<div class='alert alert-success' role='alert'>Changed avatar!</div>";
								break;
							case "1" :
								echo "<div class='alert alert-danger' role='alert'>Connection error, try again.</div>";
								break;
							case "2" :
								echo "<div class='alert alert-danger' role='alert'>Wrong file type, must be jpg, jpeg, or png.</div>";
								break;
							case "3" :
								echo "<div class='alert alert-danger' role='alert'>You must select a new image.</div>";
								break;
						}
					?>
					<form method="post" action="https://lfgproject.com/includes/system/email.php">
						<fieldset>
							<legend>Change Email</legend>
						</fieldset>
						<div class="form-group">
							<label for="emailaddress">Old Email</label>
							<input id="settings_new_old_email" name="settings_new_old_email" type="email" class="form-control" placeholder="Enter Old Email" />
						</div>
						<div class="form-group">
							<label for="emailaddress">New Email</label>
							<input id="settings_new_new_email" name="settings_new_new_email" type="email" class="form-control" placeholder="Enter New Email" />
						</div>
						<button type="submit" class="btn btn-primary btn-block">Change Email</button>
					</form>
					<form method="post" action="https://lfgproject.com/includes/system/password.php">
						<fieldset>
							<legend>Change Password</legend>
						</fieldset>
						<div class="form-group">
							<label for="password">Old Password</label>
							<input name="settings_new_old_password" id="settings_new_old_password" type="password" class="form-control" placeholder="Old Password" />
						</div>
						<div class="form-group">
							<label for="password">New Password</label>
							<input name="settings_new_new_password" id="settings_new_new_password" type="password" class="form-control" placeholder="New Password" />
						</div>
						<div class="form-group">
							<label for="password">Confirm New Password</label>
							<input name="settings_new_confirm_password" id="settings_new_confirm_password" type="password" class="form-control" placeholder="Confirm New Password" />
						</div>
						<button type="submit" class="btn btn-primary btn-block">Change Password</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>