</br>
<?php if(isset($_SESSION['success'])) {?> 
        <div class="alert alert-success"><?php echo $_SESSION['success']; }?> </div>

<div class ="container">

	<?php 
		$con=mysqli_connect("localhost","root","admin","TheBrewerydb");
		$sql = mysqli_query($con, "SELECT id, username, age, location, favouritebeer, website, bio FROM users WHERE username = '" . $_SESSION['username'] . "'");
		$row = mysqli_fetch_array($sql);
	 ?>

<h2><?php echo $_SESSION['username'];?>'s Profile</h2>
<a href="<?php echo base_url(); ?>index.php/Auth/logout" style="color:darkblue">Logout</a>
</br>
<a href="<?php echo base_url(); ?>index.php/Profile/changepassword" style="color:darkblue">Change password</a>
</br>
<a href="<?php echo base_url(); ?>index.php/Profile/securityq" style="color:darkblue">Change security question</a>

    </br>
    </br>
<body>
	<form method ="POST">
	<h4>Age:</h4> 
	<input type="age" class="form-control" name="age" id="ageinput" value="<?php echo $row['age']; ?>">
	
	<h4>Location:</h4>
	<input type="location" class="form-control" name="location" id="locationinput" value="<?php echo $row['location']; ?>">
	<h4>Favourite beer:</h4>
	<input type="beer" class="form-control" name="favouritebeer" id="beerinput" value="<?php echo $row['favouritebeer']; ?>">
	<h4>Website:</h4>
	<input type="website" class="form-control" name="website" id="websiteinput" value="<?php echo $row['website']; ?>">

	<h3>Bio: </h3>
	<input type="bio" class="form-control" name="bio" id="bioinput" value="<?php echo $row['bio']; ?>">
</br>
		<button type="submit" class="btn btn-primary" name="updatechanges">Save Changes</button>

	</form>
	</div>

</body>