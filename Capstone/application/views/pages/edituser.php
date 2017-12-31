</br>
<div class ="container">

<h2>Edit User</h2>
</br>
<body>
	<form method = "POST">
	<h4><label for="name"><?php $id = $editUser->id;
							echo $id;?></label></h4>
	Username:
	<input type = "name" name="username" class="form-control" value = "<?php echo $editUser->username; ?>">
	</br >
	First Name:
	<input type = "name" name="first_name" class="form-control" value = "<?php echo $editUser->first_name;?>">
	</br >
	Last Name:
	<input type = "name" name="last_name" class="form-control" value = "<?php echo $editUser->last_name;?>">
	</br >
	Account Type:
	<input type = "name" name="user_type" class="form-control" value = "<?php echo $editUser->user_type;?>">
	</br>
	Status:
	<input type = "name" name="isActive" class="form-control"  
		value = "<?php if ($editUser->isActive == 1) {
                      echo "Active";
                      }else{
                      echo "Inactive";
                      }; ?>">
	</br>
	<button type="submit" class="btn btn-primary" name="updateuser">Save Changes</button>

	<a href="deletelink" onclick="return confirm('Are you sure you want to delete this product?')">
	<button type="submit" class="btn btn-primary" name="delete">Delete User</button>
	</a>

	<button type="submit" class="btn btn-primary" name="cancel">Cancel</button>
	</div>
	</form>

</body>