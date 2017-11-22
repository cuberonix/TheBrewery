</br>
<div class ="container">
<body>
	
	<h2>
	<label for="name"><?php echo $singleProduct->product_name;?></label>
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
	<label name="favouritebeer" id="beerinput"><?php echo "$" . $singleProduct->product_price; ?></label>
</br>
	<button type="submit" class="btn btn-primary" name="savechanges">Add to cart</button>
</br>
</br>
	<h4>Description:</h4>
	<label name="description" id="desc"><?php echo $singleProduct->product_description;?></label>
	</div>
	</br >
	
</div>
<?php //'href = "rate.php?product=<?php echo $singleProduct->product_id;? >x&rating=<?php echo $rating;? >" ?>
</body>