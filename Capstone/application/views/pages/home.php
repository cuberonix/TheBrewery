
	<h2>Homepage</h2>

	<body>
		Welcome to The Brewery!
</br>
</br>
<div class = "modal-body row">
  <div class = "col-md-6">
		<h3>Latest news:</h3>
</br>
<?php 
$i = 0;
foreach ($news as $renews): ?>

		<h4><?php echo $renews->news_title;?></h4>
</br>

		<?php echo $renews->news_body;?>
<?php endforeach; ?>
</div>

<div class = "col-md-6">
<h3>Featured Product:</h3>
	</div>
</div>