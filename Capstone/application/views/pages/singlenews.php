<div class = "row">
	<div class = "col-md-8">
<?php $id = $singleNews->news_id;
if(isset($_SESSION['username'])) {$username = $_SESSION['username']; } ?>
<h2>Single News</h2>
</br>
<body>
	
	<h4><label for="name"><?php echo $singleNews->news_title;?></label></h4>
	<label name="favouritebeer" id="beerinput"><?php echo $singleNews->date_created; ?></label>
	</br >
	</br >
	<label name="description" id="desc"><?php echo $singleNews->news_body;?></label>
	</br >

</div>

	<div class ="col-md-4">
		<?php 
			$con=mysqli_connect("localhost","root","admin","TheBrewerydb");
			$sql = mysqli_query($con, "SELECT news_id, news_title, news_body, DATE_FORMAT(date_created, '%M %d %Y') AS date_created FROM news ORDER BY news_id DESC");
			//$row = mysqli_fetch_array($sql);	
		 ?>
		 <!-- <style>table, th, td{ border: 1px solid black;}</style> -->
		 <style>
		 	#gray tr:hover {
		 		background-color: lightgrey;
		 	}
		</style>

		 <table class="table" id ="gray">
		 	<tr>
			<th colspan="3" style="background-color: lightblue;"><center>Recent entries</center></th>
		</tr>
		<?php while ($row = mysqli_fetch_array($sql)) { ?>
		<tr>
	        <td><?php echo $row['date_created'];?></td>
	        <td><a href="<?php echo base_url(); ?>index.php/news/singlenews/<?php echo $row['news_id'];?>"><b><?php echo $row['news_title'];?></b></a></td>
	    </tr>
	    <?php } ?>
		</table>
	</div>

	<div class = "col-md-8">
	</br>
	 <h4>Comments</h4>
	 <form method="POST">

<?php form_hidden('entry_id', $this->uri->segment(3));?>

	<small> 
		<?php if(isset($_SESSION['username'])) { 
			echo "Commenting as: " . $_SESSION['username']; 
		} ?>	
	</small>
</br>
<p>
<?php 
	if(isset($_SESSION['username'])) { 
	    $filename = './assets/user_images/' . $username . '.png';
	    if(file_exists($filename)){ ?>
	    	<img src = "<?php echo '/capstone/assets/user_images/' . $username . '.png'?>" alt = "User Pic" height = 80 width = 80 />
	    <?  clearstatcache(); } else {  ?>
	    <img src = "<?php echo '/capstone/assets/user_images/default/blank_user.png';?>" alt = "User Pic" height = 100 width = 100 />
	    <? clearstatcache(); }
	}?>
	<textarea name = "comment_body" rows = "4" cols = "30"></textarea></p>
<p>
<?php  
	if(!isset($_SESSION['username'])){
	echo "Please login or create an account to comment.";
} else { echo '<button class = "btn btn-primary" name = "submitcomment">Submit</button>';}?>
</p>

	<?php if(isset($_SESSION['username'])){ 
		$con1=mysqli_connect("localhost","root","admin","TheBrewerydb");
		$sql1 = mysqli_query($con1, "SELECT id FROM users WHERE username = '" . $_SESSION['username'] . "'");
		$row1 = mysqli_fetch_array($sql1);
		$user_id = $row1['id'];
	}
	 ?>	
<!-- Hidden from user, gets news and user ID -->
	<input type ="hidden" name = "news_id" value = "<?php echo $id; ?>" readonly="true" hidden = "true"/> 
	<input type ="hidden" name = "user_id" value = "<?php if(isset($_SESSION['username'])){ echo $user_id; } ?>" readonly="true" hidden = "true"/> 

</form>
<form method="POST">
	<?php 
		$con=mysqli_connect("localhost","root","admin","TheBrewerydb");
		$sql = mysqli_query($con, "SELECT comment_body, user_id, DATE_FORMAT(date_created, '%M %d %Y') AS date_created FROM news_comments WHERE entry_id = '" . $id. "'");
	 ?>
	<?php while ($comment = mysqli_fetch_array($sql)) { ?>
	<table class="table">
    <thead>
      <tr>
      	<?php 
      	$user_id = $comment['user_id'];
		$con2=mysqli_connect("localhost","root","admin","TheBrewerydb");
		$sql2 = mysqli_query($con2, "SELECT username FROM users WHERE id = '" . $user_id . "'");
		$usernameComment = mysqli_fetch_array($sql2);
	 ?>
      </tr>
    </thead>
    <tbody>
    	<tr>
      <td><?php 
    $filename = './assets/user_images/' . $usernameComment['username'] . '.png';
    if(file_exists($filename)){ ?>
    	<img src = "<?php echo '/capstone/assets/user_images/' . $usernameComment['username']. '.png'?>" alt = "User Pic" height = 90 width = 90 />
    <?  clearstatcache(); } else {  ?>
    <img src = "<?php echo '/capstone/assets/user_images/default/blank_user.png';?>" alt = "User Pic" height = 100 width = 100 />
    <? clearstatcache(); } ?></td>
        <td style="text-align:left">
        	<b><font size = 5><?php echo $usernameComment['username']; ?></font></b></br></br>
         <?php echo $comment['comment_body']; ?></br></br>
         <?php echo $comment['date_created'];?>
        </td>
    </tr>
      <tr>
      	<td>
      	<a href=" " onclick="return confirm('Are you sure you want to report this comment?')">
		<button name = "report">Report</button> 
		<?php if(isset($_POST['report'])) {
		$conn=mysqli_connect("localhost","root","admin","TheBrewerydb");
		$sqli = mysqli_query($con, "SELECT entry_id, comment_body, user_id, isFlagged FROM news_comments SET isFlagged = 1 WHERE user_id = '$user_id' AND entry_id = '$id'" );
		} ?>
		</a>
		</td>
      </tr>
      <tr>
      	</br>
      </tr>
    </tbody>
  </br>
  <?php } ?>
</table>
</form>

</div>

</br>
</div>
</div>

</body>