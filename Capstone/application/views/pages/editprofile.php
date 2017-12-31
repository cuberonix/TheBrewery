<?php if(isset($_SESSION['success'])) {?> 
        <div class="alert alert-success"><?php echo $_SESSION['success']; }?> </div>

<div class ="container">
<div class ="modal-body row">
<div class = "col-md-6">
	<?php 
		$con=mysqli_connect("localhost","root","admin","TheBrewerydb");
		$sql = mysqli_query($con, "SELECT id, first_name, last_name, username, age, location, favouritebeer, website, bio FROM users WHERE username = '" . $_SESSION['username'] . "'");
		$row = mysqli_fetch_array($sql);
		$username = $_SESSION['username'];
	 ?>

<?php //echo $uploadError;?>
<h2><?php echo $_SESSION['username'];?>'s Profile</h2>
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
</br>
<a href="<?php echo base_url(); ?>index.php/Profile/picupload/<?php echo $username; ?>" style="color:darkblue">Picture upload</a>
    </br>
<a href="<?php echo base_url(); ?>index.php/Profile/changePassword/<?php echo $username; ?>" style="color:darkblue">Change password</a>
</br>
<a href="<?php echo base_url(); ?>index.php/Profile/securityquestion/<?php echo $username; ?>" style="color:darkblue">Change security question</a>
    </br>
    </br>
<body>
	
	<form method ="POST">

	<h4>First Name/Last Name:</h4> 
	<input type="firstname" class="form-control" name="firstname" id="firstnameinput" value= "<?php echo $row['first_name']; ?>">

	<input type="lastname" class="form-control" name="lastname" id="lastnameinput" value ="<?php echo $row['last_name']; ?>">
	</br>
	<h4>Age:</h4> 
	<input type="age" class="form-control" name="age" id="ageinput" value="<?php echo $row['age']; ?>">
	</br>
	<h4>Location:</h4>
	<input type="location" class="form-control" name="location" id="locationinput" value="<?php echo $row['location']; ?>">
</div>
	<div class = "col-md-6">
	</br>
	</br>
	</br>
	</br>
	<h4>Favourite beer:</h4>
	<input type="beer" class="form-control" name="favouritebeer" id="beerinput" value="<?php echo $row['favouritebeer']; ?>">
	</br>
	<h4>Website:</h4>
	<input type="website" class="form-control" name="website" id="websiteinput" value="<?php echo $row['website']; ?>">
	</div>
	<div class = "col-md-12">
	<h3>Bio: </h3>
	<textarea type="bio" class="form-control" name="bio" id="bioinput" rows = "4"><?php echo $row['bio']; ?></textarea>
</br>
		<button type="submit" class="btn btn-primary" name="updatechanges">Save Changes</button></div>

	</form>
	</div>
</div>
</body>