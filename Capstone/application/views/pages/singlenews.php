</br>
<div class ="container">

<h2>Single News</h2>
</br>
<body>
	
	<h4><label for="name"><?php echo $singleNews->news_title;?></label></h4>
	<label name="favouritebeer" id="beerinput"><?php echo $singleNews->date_created; ?></label>
	</br >
	</br >
	<label name="description" id="desc"><?php echo $singleNews->news_body;?></label>
	</br >
	</br >
	<button type="submit" class="btn btn-primary" name="showcomments">Show Comments</button>
	
	</div>

</body>