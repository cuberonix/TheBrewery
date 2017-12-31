<h2>Test cart</h2>
<form method = "POST">
<button name = 'addtocart'>Add</button>

<?php if(isset($_POST['addtocart'])){
                
                $data = array(
                    'id'      => 'sku_123ABC',
                    'qty'     => 1,
                    'price'   => 39.95,
                    'name'    => 'T-Shirt',
                    'options' => array('Size' => 'L', 'Color' => 'Red')
                );
        
             $this->cart->insert($data);
         }
?>

<button name = "nice">Add me!</button>

<?php if(isset($_POST["nice"])){
	echo "<button>Awesome!</button>";
}
?>
</form>