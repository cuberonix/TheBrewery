<h3>Comments</h3>



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