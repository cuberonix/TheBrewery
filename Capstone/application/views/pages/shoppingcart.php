<h2>Shopping Cart</h2>
</br>
<body>
	<div class = "row">
	<div class = "col-md-9">
	<?php if ($cart = $this->cart->contents()): ?>
	<div id="cart">
		<table class = "table">
		<thead>
			<tr>
				<th></th>
				<th>Product</th>
				<th>Quantity</th>
				<th>Price</th>
				<th></th>
			</tr>
		</thead>
		<?php foreach ($cart as $item): ?>
			<tr>
				<td>
					<?php 
				    $productn = $item['name'];
				    $filename = './assets/product_images/' . $productn . '.png';
				    if(file_exists($filename)){ ?>
				    	<img src = "<?php echo '/capstone/assets/product_images/' . $productn . '.png'?>" alt = "Product Pic" height = 100 width = 65 />
				    <?  clearstatcache(); } else {  ?>
				    <img src = "<?php echo '/capstone/assets/product_images/default/blank_beer.png';?>" alt = "Product Pic" height = 100 width = 65 />
				    <? clearstatcache(); } ?>
				</td>
				<td><h4><?php echo $item['name']; ?></h4></td>
				<td>
					<?php if ($this->cart->has_options($item['rowid'])) {
						foreach ($this->cart->product_options($item['rowid']) as $option => $value) {
							echo $option . ": <em>" . $value . "</em>";
						}
						
					} echo $item['qty'] ?>
				</td>
				<td>$<?php echo $item['subtotal']; ?></td>
				<td class="remove">
					<b><?php echo anchor('products/removeFromCart/'.$item['rowid'],'Delete'); ?></b>
				</td>
			</tr>
		<?php endforeach; ?>
		<tr class="total">
			<td colspan="3"><strong>Sub Total </br> Tax</strong></td>
			<td>$<?php $total = $this->cart->total(); echo $total; ?> </br> 
				$<?php echo number_format($total * 0.13, 2); ?></td>
		</tr>
		<tr>
			<td colspan = "3"><h4>Total</h4></td>
			<td><b>$<?php 
			$tax = 1.13;
			$finaltotal = number_format($total * $tax, 2); 
			echo $finaltotal; ?></b></td>
		</tr>
		</table>		
	</div>
	<?php endif; ?>
</br>
<?php if($this->cart->contents() == null) {
	echo "Nothing here to see yet... Add something to your cart!";
} else { ?>

<form action="checkout" method="POST">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_6RYoLubDZsj8HZNlJxLWVbHM"
    data-amount="2710"
    data-name="The Brewery"
    data-description="Widget"
    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
    data-locale="auto"
    data-currency="cad">
  </script>
</form>
<? } ?>
</div>
</div>
</body>