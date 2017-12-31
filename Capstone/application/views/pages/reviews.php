<div class = "container">

	<h2><center>User reviews for <?php echo $product->product_name;?></center></h2>

	<?php if(isset($_SESSION['username'])){ 
		$con=mysqli_connect("localhost","root","admin","TheBrewerydb");
		$sql = mysqli_query($con, "SELECT id FROM users WHERE username = '" . $_SESSION['username'] . "'");
		$row = mysqli_fetch_array($sql);
		$user_id = $row['id'];
	}
	 ?>
	 <?php $product_id = $product->product_id; ?>

<a href="<?php echo base_url(); ?>index.php/products/singleProduct/<?php echo $product->product_id;?>">
<button class = "btn btn primary">Back to product</button>
</a>
</br>
</br>
	<?php 
		$con=mysqli_connect("localhost","root","admin","TheBrewerydb");
		$sql = mysqli_query($con, "SELECT product, product_title, product_rating, product_review, user_id, date_created FROM product_reviews WHERE product = '" . $product_id . "'");
	 ?>

<div class = "modal-body row">
<div class = "col-md-7">
	<h4>User Reviews</h4>
	<?php while ($row = mysqli_fetch_array($sql)) { ?>
	<table class="table">
    <thead>
      <tr>
        <th><?php echo $row['product_title']; ?></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
         <?php echo $row['product_rating']; ?>/5
        </td>
      </tr>
      <tr>
		<td><?php echo $row['product_review'];?></td>
      </tr>
      <tr>
		<td><?php echo $row['date_created'];?></td>
      </tr>
      <tr>
      </br>
      </tr>
    </tbody>
  </br>
  <?php } ?>
</table>

</div>
<div class = "col-md-5">
	<form method = "POST">
	<label><h4>Add your review...</h4></label>
	</br>
	<input type ="text" name = "product_title" placeholder="Add a title" <?php if(!isset($_SESSION['username'])){ echo 'readonly="true"'; }?>/>
	
	<!-- Hidden from user, gets product and user ID -->
	<input type ="text" name = "product_id" value = "<?php echo $product_id; ?>" readonly="true" hidden = "true"/> 
	<?php if(isset($_SESSION['username'])) { ?>
	<input type ="text" name = "user_id" value = "<?php echo $user_id; ?>" readonly="true" hidden = "true"/> 
	<?php } ?>

	</br>
	</br>
	Rating:
	<select id="rating" name="product_rating" <?php if(!isset($_SESSION['username'])){ echo 'disabled'; }?>>                   
	  <option value="0">--Select Rating--</option>
	  <option value="1">1</option>
	  <option value="2">2</option>
	  <option value="3">3</option>
	  <option value="4">4</option>
	  <option value="5">5</option>
	</select>
	</br>
	</br>
	<textarea rows = "4" cols = "35" name = "product_review" placeholder="Tell us what you think..." <?php if(!isset($_SESSION['username'])){ echo 'disabled'; }?> ></textarea>
</br>
</br>
	<?php 
	if(!isset($_SESSION['username'])){
	echo "Please login or create an account to review this product.";
} else { echo '<button class = "btn btn-primary" name = "submitreview">Submit Review</button>';}?>
	</form>
</br>
</div>
</div>
</div>