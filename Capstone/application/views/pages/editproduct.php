</br>
<div class ="container">

<h2>Edit Product</h2>
</br>
<body>
	<form method = "POST">
	<h4>Name: </h4> 
	<input type="name" class="form-control" name="product_name" placeholder = "Product name" value="<?php echo $editProduct->product_name;?>">
	<h4>Description:</h4>
	<input class="form-control" name="location" id="locationinput" value="<?php echo $editProduct->product_description;?>">
	<h4>Price:</h4>
	<input class="form-control" name="favouritebeer" id="beerinput" value="<?php echo $editProduct->product_price; ?>">
	<h4>UPC:</h4>
	<input class="form-control" name="favouritebeer" id="beerinput" value="<?php echo $editProduct->upc_code; ?>">
	<h4>SKU:</h4>
	<input class="form-control" name="favouritebeer" id="beerinput" value="<?php echo $editProduct->sku_code; ?>">
	<h4>Stock:</h4>
	<input class="form-control" name="favouritebeer" id="beerinput" value="<?php echo $editProduct->product_stock; ?>">
	</br>
	<button type="submit" class="btn btn-primary" name="savechanges">Save Changes</button>
	<button type="submit" class="btn btn-primary" name="cancel">Cancel</button>
	</form>
	</div>

</body>