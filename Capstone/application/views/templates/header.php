<html>
        <head>
                <title>The Brewery</title>

                <link rel = "stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.css');?>"/>
                <link rel = "stylesheet" href="<?= base_url('assets/custom/TheBreweryStyle.css');?>"/>
        </head>

       <header>
       		<h1><a href ="<?= base_url('index.php/Home/index');?>">The Brewery</a></h1>

       		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <ul class="dropdown-menu product" aria-labelledby="dropdownMenu">

			  </ul>

			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav mr-auto">
			      <li class="nav-item">
			        <a class="nav-link" href="<?= base_url('index.php/Home/index');?>">Home</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="<?= base_url('index.php/About');?>">About</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="<?= base_url('index.php/Products/all');?>">Products</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="<?= base_url('index.php/News/recentNews');?>">News</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="<?= base_url('index.php/FAQ');?>">FAQ</a>
			      </li>
			      
			      <?php if (!isset($_SESSION['username'])) { ?>
			      	<li class="nav-item"> 	
			        <a class="nav-link" href="<?= base_url("index.php/Auth/login");?>">Login</a>
			      </li>
			      <?php } ?>
			   		
			   		<?php if (isset($_SESSION['username'])) { ?>
			   		<li class="nav-item">
			        <a class="nav-link" href="<?= base_url("index.php/Profile/user");?>"> Profile</a>
			      </li>
			      <?php } ?>

			      <?php if (isset($_SESSION['username'])) { ?>
			      <li class="nav-item">
			        <a class="nav-link" href="<?= base_url('index.php/Products/shoppingCart');?>">Cart</a>
			      </li>
			      <?php } ?>

			    </ul>
			    <form class="form-inline my-2 my-lg-0" method="POST">
			      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
			      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name = "searchbtn">Search</button>
			    </form>
			  </div>
			</nav>
       </header>
       <div class = "container">
       </br>
