<h2>Latest News</h2>

<body>
</br>

<div class = "row">
	<div class = "col-md-8">
<?php 
$i = 0;
foreach ($renews as $new): ?>

        <h4><a href="<?php echo base_url(); ?>index.php/news/singlenews/<?php echo $new->news_id;?>"><?php echo $new->news_title;?></a></h4>
        <?php echo $new->date_created;?>
    </br>
    </br>
        <p><?php echo $new->news_body;?></p>

		<!-- <a href = "<?php echo base_url(); ?>index.php/news/show_comments/<?php echo $new->news_id;?>"><button class="btn btn-primary">Show Comments</button></a> -->

<?php endforeach; 

$id = $new->news_id;?>
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

</br>
</div>
<div class ="row">
  <div class ="col-md-8">
  </br>
  </br>
  	<h4>Comments</h4>
	<form method="POST">

<?php form_hidden('entry_id', $this->uri->segment(3));?>

	</small>
<p><textarea name = "comment_body" rows = "4" cols = "30"></textarea></p>

<p>
<?php  
	if(!isset($_SESSION['username'])){
	echo "Please login or create an account to comment on this news post.";
} else { echo '<button class = "btn btn-primary" name = "submitcomment">Submit</button>';}?>
</p>

</form>

	 <?php 
		$con1=mysqli_connect("localhost","root","admin","TheBrewerydb");
		$sql1 = mysqli_query($con1, "SELECT comment_body, user_id, DATE_FORMAT(date_created, '%M %d %Y') AS date_created FROM news_comments WHERE entry_id = '" . $id. "'");
	 ?>

<div class = "col-md-8">
	<?php while ($comment = mysqli_fetch_array($sql1)) { ?>
	<table class="table table-light align-baseline" align = "left">
    <thead>
      <tr>
      	<?php 
      	$user = $comment['user_id'];
		$con2=mysqli_connect("localhost","root","admin","TheBrewerydb");
		$sql2 = mysqli_query($con2, "SELECT username FROM users WHERE id = '" . $user . "'");
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
        <td>
        	<b><font size = 5><?php echo $usernameComment['username']; ?></font></b></br></br>
         <?php echo $comment['comment_body']; ?></br></br>
         <?php echo $comment['date_created'];?>
        </td>
      </tr>
      <tr>
      	</br>
      </tr>
    </tbody>
  </br>
  <?php } ?>
</table>
</div>