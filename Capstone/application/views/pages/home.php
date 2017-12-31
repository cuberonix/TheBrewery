<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#fadein").fadeIn(1000, function(){ });
});
</script>
<script type="css/text">
	body {
    background-image: url('../assets/site_images/thebreweryhome.jpg');
}
</script>

	<h2>Homepage</h2>
</br>
	<body>
<div class = "modal-body row">
  <div class = "col-md-6">
		<h3><u>Latest news</u></h3>
</br>
<?php 
$i = 0;
foreach ($news as $renews): ?>

		<h3><?php echo $renews->news_title;?></h3>
		<?php $date = $renews->date_created;
			   //$formatted_date = strftime('%M %d %Y', $date);
			   echo $date;
		?>
</br>
</br>
		<?php echo $renews->news_body;?>
<?php endforeach; ?>
</div>

<div class = "col-md-6">
<h3><u>Featured Product</u></h3>
<?php 
		$con1=mysqli_connect("localhost","root","admin","TheBrewerydb");
	    $sql1 = mysqli_query($con1, "SELECT * FROM products ORDER BY product_id ASC LIMIT 1");
	    $row = mysqli_fetch_array($sql1);
	    $id = $row['product_id'];
?>
<?php
              $con2=mysqli_connect("localhost","root","admin","TheBrewerydb");
              $sql2 = mysqli_query($con2, "SELECT AVG(product_rating) FROM product_reviews WHERE product = '" . $id . "'");
              $result = mysqli_fetch_array($sql2);
              $rating = $result['AVG(product_rating)'];
?>
</br>
		<h4><a><?php echo $row['product_name'];?></a></h4>
		<b>Rating: <?php echo number_format($rating, 1) . ' / 5'; ?></b>
	</br>
	</br>
		<?php echo $row['product_description']; ?>

</div>
</div>

</body>