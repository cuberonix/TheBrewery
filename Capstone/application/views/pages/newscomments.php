<form method="POST">

<?php form_hidden('entry_id', $this->uri->segment(3));?>

	<small>Commenting as: 
		<?php if(isset($_SESSION['username'])) { 
			echo $_SESSION['username']; 
		} else {
			echo 'Guest';
		}; ?>	
	</small>
<p><textarea name = "body" rows = "4" cols = "30"></textarea></p>

<p><button type = "submit" value = "Add Comment" class="btn btn-primary" name = "submitcomment">Submit</button></p>

</form>

	<?php 
		$con=mysqli_connect("localhost","root","admin","TheBrewerydb");
		$sql = mysqli_query($con, "SELECT comment_body, user_id, date_created, FROM news_comments WHERE entry_id = '" . $news->news->_id. "'");
	 ?>

<div class = "modal-body row">
<div class = "col-md-8">
	<h4>Comments</h4>
	<?php while ($row = mysqli_fetch_array($sql)) { ?>
	<table class="table">
    <thead>
      <tr>
        <th><?php echo $row['user_id']; ?></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
         <?php echo $row['comment_body']; ?>/5
        </td>
      </tr>
      <tr>
		<td><?php echo $row['date_created'];?></td>
      </tr>
      <tr>
      	</br>
      </tr>
    </tbody>
  </br>
  <?php } ?>
</table>