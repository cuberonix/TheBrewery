<h2>Product picture upload</h2>

<body>
	<?php echo $error;?>
	<?php 
		$_GET['product'];
	 ?>

<?echo form_open_multipart('products/productpicupload'); ?>
	<input type ="file" name ="userfile" />
	<input type ="submit" name = "upload" value = "upload" />
</form>
</body>