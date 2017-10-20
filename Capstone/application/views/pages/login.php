</br>
<h2>Login</h2>

<body>
</br>
<div class = "container">
<?php echo validation_errors('<div class="alert alert-danger">', '</div>')?>
    
    <?php if(isset($_SESSION['success'])) {?> 
        <div class="alert alert-success"><?php echo $_SESSION['success']; }?> </div>

    <div class = "col-lg-5 col-lg-offset-2">
    <form method ="POST">
  <div class="form-group">
    <label for="username">Username:</label>
    <input type="username" class="form-control" name="username" id="usernameinput" placeholder="Pick a username">
    <small id="createAccount"><a class="nav-link" style="color:blue" href="<?= base_url('index.php/Auth/register');?>">Don't have an acccount? Click here</a></small>
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
    <small id="createAccount"><a class="nav-link" style="color:blue" href="<?= base_url('index.php/forgottenpassword');?>">Forgot password? Click here</a></small>
  </div>
  <div class="form-group">
  <button type="submit" class="btn btn-primary" name = "login">Submit</button>
</div>
</div>
</div>
</form>
</body>