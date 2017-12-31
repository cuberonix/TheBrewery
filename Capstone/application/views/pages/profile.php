<?php if(isset($_SESSION['success'])) {?> 
        <div class="alert alert-success alert-dismissable">
        <span class="close" data-dismiss="alert" aria-label="close">
        &times;
    	</span> <?php echo $_SESSION['success']; }?> 
    	</div>

    	<style type="text/css">
  		 	body { background: white !important; }
		</style>
<div class = "container">
<div class ="modal-body row">
<?php $username = $_SESSION['username']; ?>
<div class = "col-md-6">
<h2><?php echo $username;?>'s Profile</h2>
	
	<?php 
		$con=mysqli_connect("localhost","root","admin","TheBrewerydb");
		$sql = mysqli_query($con, "SELECT id, username, profile_picture, age, location, favouritebeer, website, bio, user_type FROM users WHERE username = '" . $_SESSION['username'] . "'");
		$row = mysqli_fetch_array($sql);
	 ?>

<a href="<?php echo base_url(); ?>index.php/Auth/logout" style="color:darkblue">Logout</a>
    </br>
    </br>

    <?php 
    $filename = './assets/user_images/' . $username . '.png';
    if(file_exists($filename)){ ?>
    	<img src = "<?php echo '/capstone/assets/user_images/' . $username . '.png'?>" alt = "User Pic" height = 280 width = 280 />

    <?  clearstatcache(); } else {  ?>
    <img src = "<?php echo '/capstone/assets/user_images/default/blank_user.png';?>" alt = "User Pic" height = 280 width = 280 />
    <? clearstatcache(); } ?>
	</br>

	<?php //var_dump($filename, file_exists($filename)); die; ?>
    </br>
<body>

	<button type="submit" class="btn btn-primary" name = "editProfile" onclick ="location.href ='<?php echo base_url();?>index.php/Profile/editProfile/<?php echo $username;?>'">Edit Profile</button>
	</br>
	</br>
	
	<?php if($_SESSION['username'] == "manager01"){ ?>
		 <button type="submit" class="btn btn-primary" name = "productManager" onclick ="location.href ='<?php echo base_url();?>index.php/Products/productManager'">Product Manager</button>

		 <button type="submit" class="btn btn-primary" name = "newsManager" onclick ="location.href ='<?php echo base_url();?>index.php/Manager/newsManager'">News Manager</button>
	<?php } ?>
	<?php if($_SESSION['username'] == "admin01") {?>
	<button type="submit" class="btn btn-primary" name = "userManager" onclick ="location.href ='<?php echo base_url();?>index.php/Manager/userManager'">User Manager</button>
	<button type="submit" class="btn btn-primary" name = "flaggedComments" onclick ="location.href ='<?php echo base_url();?>index.php/Manager/userManager'">Flagged Comments</button>

	<?php } ?>
</br>
	<h4>Age: <?php echo " ". $row['age']; ?></h4>
</br>
	<h4>Location: <?php echo $row['location'];?></h4>
</br>
</div>
<div class = "col-md-6">
	</br>
	</br>
	</br>
	</br>
	<h4>Favourite beer: </h4> <h5><?php echo $row['favouritebeer'];?></h5>
</br>
	<h4>Website: </h4> <h5><a href = "<?php echo $row['website'];?>"><?php echo $row['website'];?></a></h5>
</br>
</div>
<div class = "col-md-12">
	<h3>Bio:</h3>
	<p><?php echo $row['bio'];?></p>
</div>	
</div>
</div>

</body>