<div class ="container">

<h2>Edit Product</h2>
</br>
<body>
	<form method = "POST">
	<h4>Name: </h4> 
	<input type="name" class="form-control" name="product_name" placeholder = "Product name" value="<?php echo $editProduct->product_name;?>">
	<h4>Description:</h4>
	<input class="form-control" name="product_description" id="locationinput" value="<?php echo $editProduct->product_description;?>">
	<h4>Price:</h4>
	<input class="form-control" name="product_price" id="beerinput" value="<?php echo $editProduct->product_price; ?>">
	<h4>UPC:</h4>
	<input class="form-control" name="upc_code" id="beerinput" value="<?php echo $editProduct->upc_code; ?>">
	<h4>SKU:</h4>
	<input class="form-control" name="sku_code" id="beerinput" value="<?php echo $editProduct->sku_code; ?>">
	<h4>Stock:</h4>
	<input class="form-control" name="product_stock" id="beerinput" value="<?php echo $editProduct->product_stock; ?>">
	</br>
	<button type="submit" class="btn btn-primary" name="updatechanges">Save Changes</button>

	<a href="deletelink" onclick="return confirm('Are you sure you want to delete this product?')">
	<button type="submit" class="btn btn-primary" name="delete">Delete Product</button>
	</a>

	<button type="submit" class="btn btn-primary" name="cancel">Cancel</button>
	</form>
	</div>

</body>