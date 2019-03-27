<header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<i class="ya ya-bar"></i>
			</button>
			<a class="navbar-brand" href="/"><img width="72" height="30" src="https://lfgproject.com/img/LFG_Logo_Transparent.png" /></a>
			<?php
			if(isset($_SESSION["userbase"])) {
				echo "
				<div class='collapse navbar-collapse' id='navbarSupportedContent'>
				<ul class='navbar-nav navbar-left'>
					<li class='nav-item dropdown'>
						<a class='nav-link' href='https://lfgproject.com' aria-haspopup='true' aria-expanded='false'>Home</a>
					</li>
					<li class='nav-item dropdown'>
						<a class='nav-link' href='https://lfgproject.com/members/' aria-haspopup='true' aria-expanded='false'>Members</a>
					</li>
					<li class='nav-item dropdown'>
						<a class='nav-link dropdown-toggle' href='#' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>More</a>
						<div class='dropdown-menu'>
							<a class='dropdown-item' href='#'>More</a>
							<a class='dropdown-item' href='#'>More</a>
							<a class='dropdown-item' href='#'>More</a>
							<a class='dropdown-item' href='#'>More</a>
						</div>
					</li>
				</ul>
			</div>
				<ul class='navbar-nav navbar-right flex-row d-flex align-items-center'>
					<li class='nav-item dropdown'>
						<a class='nav-link dropdown-toggle dropdown-toggle-none py-0' href='#' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
							<span class='d-none d-xl-inline-block'><img width='32' height='32' class='avatar avatar-xs rounded-circle mr-xl-2' src='https://lfgproject.com/uploads/profile/" . $_SESSION["userbase"]->userAvatar . "' alt=''>" . $_SESSION["userbase"]->userName . "</span>
						</a>
						<div class='dropdown-menu dropdown-menu-right'>
							<a class='dropdown-item' href='https://lfgproject.com/profile/'>Profile</a>
							<a class='dropdown-item' href='https://lfgproject.com/settings/'>Settings</a>
							<a class='dropdown-item' id='logout' href='https://lfgproject.com/login/'>Log Out</a>"
							
							echo "
						</div>
					</li>
				</ul>";
			}
			?>
		</div>
	</nav>
</header>
