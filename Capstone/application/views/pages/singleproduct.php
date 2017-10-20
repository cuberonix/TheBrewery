</br>
<div class ="container">

<h2>Single Product</h2>
</br>
<body>
	<form method = "POST">
	<h4>Name: </h4> 
	<input type="name" class="form-control" name="product_name" placeholder = "Product name" value="<?php echo $singleProduct->product_name;?>">
	<h4>Description:</h4>
	<input class="form-control" name="location" id="locationinput" value="<?php echo $singleProduct->product_description;?>">
	<h4>Price:</h4>
	<input class="form-control" name="favouritebeer" id="beerinput" value="<?php echo $singleProduct->product_price; ?>">
	</br >
	<button type="submit" class="btn btn-primary" name="savechanges">Buy</button>
	</form>
	</div>

</body>