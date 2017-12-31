<body>
	<?php echo $error;?>
	<?php $username = $_SESSION['username']; ?>

<?echo form_open_multipart('profile/picupload'); ?>
	<input type ="file" name ="userfile" />
	<input type ="submit" name = "upload" value = "upload" />
</form>
</body>