<div class = "col">
  <div class = "col-md-6">
  	<table class="table table-responsive table-bordered">
    <tr>
      <th>#</th>
      <th>News Title</th>
      <th>Description</th>
      <th>Date</th>
    </tr>

<?php 
$i = 0;
foreach ($news as $new): ?>
    <tr>
        <td><?php echo ++$i; ?></td>
        <td><a href="<?php echo base_url(); ?>index.php/news/singlenews/<?php echo $new->news_id;?>"><?php echo $new->news_title;?></a></td>
        <td><?php echo $new->news_body;?></td>
        <td><?php echo $new->date_created;?></td>
    </tr>
<?php endforeach; ?>

</table>
  </div>
</div>