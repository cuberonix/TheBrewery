</br>
<div class ="container">
	<?php if(isset($success)) {?> 
        <div class="alert alert-info alert-dismissable">
        <span class="close" data-dismiss="alert" aria-label="close">
        &times;
    	</span> <? } ?>
    	</div>
	<div class = "row">
<body>
	<div class = "col-md-4">
	<form method="POST">
	<?php 
	//echo $addsuccess;
    $productn = $singleProduct->product_name;
    $filename = './assets/product_images/' . $productn . '.png';
    if(file_exists($filename)){ ?>
    	<img src = "<?php echo '/capstone/assets/product_images/' . $productn . '.png'?>" alt = "Product Pic" height = 450 width = 280 />
    <?  clearstatcache(); } else {  ?>
    <img src = "<?php echo '/capstone/assets/product_images/default/blank_beer.png';?>" alt = "Product Pic" height = 450 width = 280 />
    <? clearstatcache(); } ?>
	</div>
	<div class ="col-md-8">
	<h2>
	<input type = "hidden" name = "product_id" value = "<?php echo $singleProduct->product_id; ?>"/>
	<label name="product_name"><?php echo $singleProduct->product_name;?></label>
	</h2> 
	<div name = "rating">	
	<h3>
	<label for="name">User rating: <?php
              $con=mysqli_connect("localhost","root","admin","TheBrewerydb");
              $sql = mysqli_query($con, "SELECT AVG(product_rating) FROM product_reviews WHERE product = '" . $singleProduct->product_id . "'");
              $row = mysqli_fetch_array($sql);
              $rating = $row['AVG(product_rating)'];

              if($rating == 0){
                echo "N/A";
              } else {
                echo number_format($rating, 1) . ' / 5';
              }
              ?> 
    </label>
	</h3>
	<a name = "reviews" style ="text-decoration: underline;" href = "<?php echo base_url(); ?>index.php/products/reviews/<?php echo $singleProduct->product_id;?>"> Click here for reviews</a>
</br>
	Price:
	<label name="product_price"><?php echo "$" . $singleProduct->product_price; ?></label>
</br>
	<?php if(!isset($_SESSION['username'])) { ?>
	<a href="" onclick="return alert('Please create an account or login to purchase this item!')">
	<?php echo "<button type='submit' class='btn btn-primary' name='add'>Add to cart</button>";
		 } else {
	echo "<button type='submit' class='btn btn-primary' name='addtocart'>Add to cart</button>";
 		} ?>
	</a>
</br>
</br>
	<h4>Description:</h4>
	<label name="description" id="desc"><?php echo $singleProduct->product_description;?></label>
	</form>
	</div>
	</br >
</div>
	</div>
</div>
<?php //'href = "rate.php?product=<?php echo $singleProduct->product_id;? >x&rating=<?php echo $rating;? >" ?>
</body>