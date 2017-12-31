<style type="text/css">
  
  th { 
      width: 200px;
      text-align: left;
   }

   table:hover {
      background-color: #f5f5f5
   }

</style>

<h2>Products</h2>

<body>

<div class = "col-md-7">
  <?php 
  $i = 0;
  foreach ($products as $product){ ?>
  <table class="table">
    <thead>
      <tr>
        <th><h3><a href="<?php echo base_url(); ?>index.php/products/singleproduct/<?php echo $product->product_id;?>"><?php echo $product->product_name;?></a></h3></th>
      </tr>
      <tr>
        <?php 
            $productn = $product->product_name;
            $filename = './assets/product_images/' . $productn . '.png';
            if(file_exists($filename)){ ?>
              <img src = "<?php echo '/capstone/assets/product_images/' . $productn . '.png'?>" alt = "Product Pic" height = 150 width = 100 />
            <?  clearstatcache(); } else {  ?>
            <img src = "<?php echo '/capstone/assets/product_images/default/blank_beer.png';?>" alt = "Product Pic" height = 150 width = 100 />
            <? clearstatcache(); } ?>
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
        <td><?php echo substr($product->product_description, 0, 50)."...";?></td>
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



