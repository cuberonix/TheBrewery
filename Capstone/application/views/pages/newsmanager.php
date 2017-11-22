<h2>News</h2>

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
        <td><?php echo $new->news_title;?></td>
        <td><?php echo $new->news_body;?></td>
        <td><?php echo $new->date_created;?></td>
        <td><a href="<?php echo base_url(); ?>index.php/manager/editnews/<?php echo $new->news_id;?>"><b>Edit</b></a></td>
    </tr>
<?php endforeach; ?>

</table>

<button type="submit" class="btn btn-primary" name = "newsManager" onclick ="location.href ='<?php echo base_url();?>index.php/Manager/addNews'">Add News Entry</button>