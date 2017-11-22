<div class ="container">

<h2>Edit News</h2>
</br>
<body>
	<form method = "POST">
	<h4>Title: </h4> 
	<input type="name" class="form-control" name="news_title" placeholder = "News title. Be Creative!" value="<?php echo $editNews->news_title;?>">
	<h4>Body:</h4>
	<textarea rows = "8" cols = "60" name="news_body" placeholder="Elaborate on the story..."><?php echo $editNews->news_body;?></textarea>
	</br>
	<button type="submit" class="btn btn-primary" name="updatechanges">Save Changes</button>

	<a href="deletelink" onclick="return confirm('Are you sure you want to delete this product?')">
	<button type="submit" class="btn btn-primary" name="delete">Delete Product</button>
	</a>

	<button type="submit" class="btn btn-primary" name="cancel">Cancel</button>
	</form>
	</div>

</body>