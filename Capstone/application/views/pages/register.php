</br>

<?php echo validation_errors('<div class="alert alert-danger">', '</div>')?>
    
    <?php if(isset($_SESSION['success'])) {?> 
        <div class="alert alert-success"><?php echo $_SESSION['success']; }?> </div>
<div class = "container">
<h2>Register Account</h2>

<body>
</br>

    <div class = "col-lg-5 col-lg-offset-2">
    <form method ="POST">
  <div class="form-group">
    <label for="username">Username:</label>
    <input type="username" class="form-control" name="username" id="usernameinput" placeholder="Pick a username">
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="password1">Confirm Password:</label>
    <input type="password" name="password1" class="form-control" id="inputPassword1" placeholder="Confirm Password">
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
  </div>
  <div class="form-group">
  <button type="submit" class="btn btn-primary" name = "register">Submit</button>
</div>
</div>
</div>
</form>
</body>