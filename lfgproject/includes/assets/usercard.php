<div class="card">
	<img class="card-img-top" width="180" height="180" src="https://lfgproject.com/uploads/profile/<?php echo $_SESSION["userbase"]->userAvatar; ?>" alt="Card image cap">
	<div class="card-body">
		<h5 class="card-title">Welcome Back</h5>
		<p class="card-text"><?php echo $_SESSION["userbase"]->userName; ?></p>
	</div>
	<ul class="list-group list-group-flush">
		<li class="list-group-item"><a href="https://lfgproject.com/">Home</a></li>
		<li class="list-group-item"><a href="https://lfgproject.com/friendlist/">Friends</a></li>
		<li class="list-group-item"><a href="https://lfgproject.com/settings/">Settings</a></li>
	</ul>
</div>