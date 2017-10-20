</br>
<h2>Product Manager</h2>
</br>
<body>

<table class="table table-responsive table-bordered">
    <tr>
      <th>#</th>
      <th>Product Name</th>
      <th>Description</th>
      <th>Price</th>
      <th>UPC</th>
      <th>SKU</th>
      <th>Stock</th>
      <th>Actions</th>
    </tr>

<?php 
$i = 0;
foreach ($products as $product): ?>
    <tr>
        <td><?php echo ++$i; ?></td>
        <td><?php echo $product->product_name;?></td>
        <td><?php echo $product->product_description;?></td>
        <td><?php echo $product->product_price;?></td>
        <td><?php echo $product->upc_code;?></td>
        <td><?php echo $product->sku_code;?></td>
        <td><?php echo $product->product_stock;?></td>
        <td><a href="<?php echo base_url(); ?>index.php/products/editproduct/<?php echo $product->product_id;?>"><b>Edit</b></a></td>
    </tr>
<?php endforeach; ?>

</table>

<button type="submit" class="btn btn-primary" name = "productManager" onclick ="location.href ='<?php echo base_url();?>index.php/Products/addProduct'">Add Product</button>
