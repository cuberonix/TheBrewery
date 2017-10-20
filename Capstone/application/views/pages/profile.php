</br>
<?php if(isset($_SESSION['success'])) {?> 
        <div class="alert alert-success alert-dismissable">
        <span class="close" data-dismiss="alert" aria-label="close">
        &times;
    	</span> <?php echo $_SESSION['success']; }?> 
    	</div>
<div class ="container">
<?php $username = $_SESSION['username']; ?>

<h2><?php echo $username;?>'s Profile</h2>

<a href="<?php echo base_url(); ?>index.php/Auth/logout" style="color:darkblue">Logout</a>
	
	<?php 
		$con=mysqli_connect("localhost","root","admin","TheBrewerydb");
		$sql = mysqli_query($con, "SELECT id, username, age, location, favouritebeer, website, bio, user_type FROM users WHERE username = '" . $_SESSION['username'] . "'");
		$row = mysqli_fetch_array($sql);
	 ?>

	</br>
    </br>
<body>
	<button type="submit" class="btn btn-primary" name = "editProfile" onclick ="location.href ='<?php echo base_url();?>index.php/Profile/editProfile'">Edit Profile</button>
	
	<button type="submit" class="btn btn-primary" name = "productManager" onclick ="location.href ='<?php echo base_url();?>index.php/Products/productManager'">Product Manager</button>

	<button type="submit" class="btn btn-primary" name = "userManager" onclick ="location.href ='<?php echo base_url();?>index.php/Manager/userManager'">User Manager</button>
	
		</br>

</br>
	<h4>User ID:</h4> <h5> <?php echo $row['id']; ?></h5>
</br>
	<h4>Age:</h4> <h5><?php echo $row['age']; ?></h5>
</br>
	<h4>Location:</h4> <h5><?php echo $row['location'];?></h5>
</br>
	<h4>Favourite beer: </h4> <h5><?php echo $row['favouritebeer'];?></h5>
</br>
	<h4>Website: </h4> <h5><a href = "<?php echo $row['website'];?>"><?php echo $row['website'];?></a></h5>
</br>
	<h3>Bio:</h3>
	<p><?php echo $row['bio'];?></p>
	</div>

</body>