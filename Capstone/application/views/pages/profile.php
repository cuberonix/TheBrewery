</br>
<?php if(isset($_SESSION['success'])) {?> 
        <div class="alert alert-success"><?php echo $_SESSION['success']; }?> </div>

<div class ="container">

<h2><?php echo $_SESSION['username'];?>'s Profile</h2>

    </br>
<body>

	<a href="<?php echo base_url(); ?>index.php/Auth/logout" style="color:darkblue">Logout</a>
	<h4>Age:</h4>
	<h4>Location: </h4>

	<h4>Favourite beer:</h4>
	<h4>Website: </h4>

	<h3>Bio: </h3>

	
		Bio stuff goes here...	
	</div>

</body>