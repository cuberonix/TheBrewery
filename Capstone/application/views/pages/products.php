<h2>Products</h2>

<body>

<div class = "col-md-7">
  <?php 
  $i = 0;
  foreach ($products as $product){ ?>
  <table class="table">
    <thead>
      <tr>
        <th>Product Name</th>
        <td><a href="<?php echo base_url(); ?>index.php/products/singleproduct/<?php echo $product->product_id;?>"><?php echo $product->product_name;?></a></td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">Average Rating</th>
        <td>
          <?php
              $con=mysqli_connect("localhost","root","admin","TheBrewerydb");
              $sql = mysqli_query($con, "SELECT AVG(product_rating) FROM product_reviews WHERE product = '" . $product->product_id . "'");
              $row = mysqli_fetch_array($sql);
              $rating = $row['AVG(product_rating)'];

              if($rating == 0){
                echo "Be the first to review!";
              } else {
                echo number_format($rating, 1) . ' / 5';
              }
              ?> 
        </td>
      </tr>
      <tr>
        <th scope="row">Description</th>
        <td><?php echo substr($product->product_description, 0, 20);?></td>
      </tr>
      <tr>
        <th scope="row">Price</th>
        <td><?php echo '$' . $product->product_price;?></td>
      </br>
      </tr>
    </tbody>
  </br>
</table>
<?php } ?>
</div>

