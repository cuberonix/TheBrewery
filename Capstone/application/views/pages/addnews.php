<div class ="container">

<h2>Add News Entry</h2>
    </br>
<body>
	<form method ="POST">
	<h4>News Title:</h4> 
	<input type="name" class="form-control" name="news_title" placeholder="Be creative!">
</br>
	<h4>News body:</h4>
	<textarea rows = "8" cols = "60" name="news_body" placeholder="Elaborate on the story..."></textarea>
</br>
		<button type="submit" class="btn btn-primary" name="savechanges">Save Changes</button>

			<button type="submit" class="btn btn-primary" name="cancel" onclick ="location.href ='<?php echo base_url();?>index.php/manager/newsManager'">Cancel</button>
	</div>
	</div>
	</form>

</body>