<h2>Products</h2>

<body>

<table class="table table-responsive table-bordered">
    <tr>
      <th>#</th>
      <th>Product Name</th>
      <th>Description</th>
      <th>Price</th>
    </tr>

<?php 
$i = 0;
foreach ($products as $product): ?>
    <tr>
        <td><?php echo ++$i; ?></td>
        <td><a href="<?php echo base_url(); ?>index.php/products/singleproduct/<?php echo $product->product_id;?>"><?php echo $product->product_name;?></a></td>
        <td><?php echo $product->product_description;?></td>
        <td><?php echo $product->product_price;?></td>
    </tr>
<?php endforeach; ?>


<table class="table">
  <thead>
    <tr>
      <th>Product Name</th>
      <td>Product 1</td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Rating</th>
      <td>Product rating here...</td>
    </tr>
    <tr>
      <th scope="row">Description</th>
      <td>Product description here...</td>
    </tr>
  </tbody>
</table>