<div class ="container">

<h2>Add Product</h2>
    </br>
<body>
	<form method ="POST">
	<h4>Product Name:</h4> 
	<input type="name" class="form-control" name="product_name" placeholder="What is the name?">
	<h4>Product description:</h4>
	<input type="age" class="form-control" name="product_description" placeholder="Description">
	<h4>Price:</h4>
	<input type="age" class="form-control" name="product_price" placeholder="How much?">
	<h4>UPC:</h4>
	<input type="age" class="form-control" name="upc_code" placeholder="UPC">
	<h4>SKU:</h4>
	<input type="age" class="form-control" name="sku_code" placeholder="SKU">
	<h4>Stock:</h4>
	<input type="age" class="form-control" name="product_stock" placeholder="Stock level">
</br>
		<button type="submit" class="btn btn-primary" name="savechanges">Save Changes</button>

			<button type="submit" class="btn btn-primary" name="cancel" onclick ="location.href ='<?php echo base_url();?>index.php/Profile/user'">Cancel</button>
	</div>
	</div>
	</form>

</body>