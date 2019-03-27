<div class="container" style="padding-top: 25px; padding-bottom: 25px;">
	<div class="row">
		<div class="col-lg-3">
			<?php include("/var/www/html/lfgproject/includes/assets/usercard.php"); ?>
		</div>
		<div class="col-lg-9">
			<div class="card">
				<div class="card-body">
					<p class="card-text"><?php echo $_SESSION["userbase"]->userEmail; ?></p>
				</div>
			</div>
		</div>
	</div>
</div>