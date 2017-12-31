<h2>Change Password</h2>
</br>
<body>
<div class = "md-col 6">
<form method="POST">
	<div class="form-group">
New Password:
<input type="password" class="form-control" name="changepassword"  />
</br>
Confirm New Password:
<input type="password" class="form-control" name="confirmpassword" />
</br>
<button type = "submit" class = "btn btn-primary" value = "Change Password" name = "changepasswordbtn">Change Password</button>
</div>
</form>
	<?php $username = $_SESSION['username']; ?>
<div>
</body>