<h2>News</h2>

<body>
</br>

<div class = "row">
	<div class = "col-md-6">
<?php 
$i = 0;
foreach ($renews as $new): ?>

        <h4><a href="<?php echo base_url(); ?>index.php/news/singlenews/<?php echo $new->news_id;?>"><?php echo $new->news_title;?></a></h4>
        <?php echo $new->date_created;?>
    </br>
    </br>
        <p><?php echo $new->news_body;?></p>

</br>
		<a href = "<?php echo base_url(); ?>index.php/news/show_comments/<?php echo $new->news_id;?>"><button class="btn btn-primary">Show Comments</button></a>

<?php endforeach; ?>

</br>
</div>
</div>