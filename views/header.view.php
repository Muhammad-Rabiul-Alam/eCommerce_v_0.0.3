<!DOCTYPE html>
<html lang="en">
  <head>
    <title>z-Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= $assets_loc ?>assets/bootstrap-3.3.4-dist/css/bootstrap.min.css">
    <script src="<?= $assets_loc ?>assets/js/jquery.min.js"></script>
    <script src="<?= $assets_loc ?>assets/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script> 
    <link href="<?= $assets_loc ?>assets/css/simple-sidebar.css" rel="stylesheet">
    <link href="<?= $assets_loc ?>assets/css/dropdown-submenu.css" rel="stylesheet">
    <link href="<?= $assets_loc ?>assets/css/z.css" rel="stylesheet">
    <style>
    body {
      padding-top: 50px;
      background: #222222;
    }
    .wrap{background: #E9EAED;}
    .glyphicon-shopping-cart:hover{color: #DD4E4E;}
    </style>   
  </head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		            <span class="icon-bar"></span>
		              <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          </button>
		      <a class="navbar-brand" href="<?= $index_loc ?>index.php">z-Shop</a>
		    </div>
		    <div class="collapse navbar-collapse" id="myNavbar">
		      <ul class="nav navbar-nav">
		        <li class="active"><a href="<?= $index_loc ?>index.php">Home</a></li>
		        <li class="dropdown">
		          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Catagory
		          <span class="caret"></span></a>
		          	<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">

						<?php $catsql=selectCategory(); foreach($catsql as $cat): ?>
			              <li class="dropdown-submenu">
			                <a tabindex="-1" href="<?= $search_action_loc; ?>search_product.php?cat_id=<?= $cat['category_id'] ?>"><?= $cat['category_name'] ?></a>
			                <ul class="dropdown-menu">
			                	<?php $scatsql=selectSubcategory($cat['category_name']); foreach($scatsql as $scat): ?>
				                  <li class="dropdown-submenu">
				                    <a tabindex="-1" href="<?= $search_action_loc; ?>search_product.php?scat_id=<?= $scat['subcategory_id'] ?>"><?= $scat['subcategory_name'] ?></a>
				                    <ul class="dropdown-menu">
				                    	<?php $ptsql=selectProductType($cat['category_name'],$scat['subcategory_name']); foreach($ptsql as $pt): ?>
				                        	<li><a href="<?= $search_action_loc; ?>search_product.php?pt_id=<?= $pt['product_type_id'] ?>"><?= $pt['product_type_name'] ?></a></li>
				                        <?php endforeach; ?>
				                    </ul>
				                  </li>
				                <?php endforeach; ?>
			                </ul>
			              </li>
			            <?php endforeach; ?>

		            </ul>
		        </li>
		        <?php if(isset($_SESSION['admin_name'])): ?>
		        	<li><a href="#menu-toggle" id="menu-toggle">Toggle Sidebar</a></li>
		        <?php endif; ?>
		        <li><a href="#">Contact Us</a></li> 
		        <li><a href="#">About</a></li> 
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		      	<li style="padding-top:8px;"><?php include $search_box_loc."views/search-box.php"; ?></li>
		      	<?php if(isset($_SESSION['admin_name'])): ?>
		        	<li><a href="<?= $admin_loc ?>">Admin</a></li>
		        <?php endif; ?>
		        <?php if(isset($_SESSION['customer_email'])): ?>
		        	<li><a href="<?= $cart_loc ?>index.php">user</a></li>
		        <?php endif; ?>
		      	<?php if($cart_loc!=="admin" && isset($_SESSION['customer_email'])): ?>
		      		<li><a href="<?= $cart_loc ?>cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
		        <?php endif; ?>
		        <?php if(isset($_SESSION[$signin_who])): ?>
		        	<li><a href="<?= $signout_loc ?>"><span class="glyphicon glyphicon-log-out"></span> Signout</a></li>
		        <?php endif; ?>
		        <?php if(!isset($_SESSION[$signin_who])): ?>
		        	<li><a href="<?= $signin_loc ?>"><span class="glyphicon glyphicon-log-in"></span> Signin</a></li>
		      	<?php endif; ?>
		      </ul>
		    </div>
		  </div>
		</nav>
		<div class="container wrap"> <!-- wrap class will be here -->
			<div class="row">
                <div class="col-lg-12">
	                

