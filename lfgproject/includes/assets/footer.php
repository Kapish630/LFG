<footer class="site-footer bg-dark">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 footerBanner">
				<p class="footerTitle text-center">Copyright 2019.</p>
			</div>
		</div>
	</div>
</footer>
<script>
$(".addFriend").click(function(){
		var friendID = $(this).attr("id").split('_')[1];
		$.ajax({
			url: "https://lfgproject.com/includes/system/addfriend.php",
			type: "POST",
			data: "friendid=" + friendID,
			success: function(info) {
				$("#membersAlert").hide().html(info).show("fade", 500);
			}
		});
	});
</script>