<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../assets/bootstrap-3.3.4-dist/css/bootstrap.min.css">
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/bootstrap-3.3.4-dist/js/bootstrap.min.js"></script> 
    <link href="../../assets/css/simple-sidebar.css" rel="stylesheet">
    <link href="../../assets/css/dropdown-submenu.css" rel="stylesheet">
    <style>
    body {
      padding-top: 50px;
    }
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
		      <a class="navbar-brand" href="#">z-Clothings</a>
		    </div>
		    <div class="collapse navbar-collapse" id="myNavbar">
		      <ul class="nav navbar-nav">
		        <li class="active"><a href="#">Home</a></li>
		        <li class="dropdown">
		          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Catagory
		          <span class="caret"></span></a>
		          	<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">

					<?php for($i=0;$i<4;$i++): ?>
		              <li class="dropdown-submenu">
		                <a tabindex="-1" href="#">Men</a>
		                <ul class="dropdown-menu">
		                  <li><a tabindex="-1" href="#">Second level</a></li>
		                  <li class="dropdown-submenu">
		                    <a href="#">Outer Wear</a>
		                    <ul class="dropdown-menu">
		                        <li><a href="#">Shirt</a></li>
		                    	<li><a href="#">Hat</a></li>
		                    </ul>
		                  </li>
		                  <li><a href="#">Tops</a></li>
		                  <li><a href="#">Accessories</a></li>
		                </ul>
		              </li>
		            <?php endfor; ?>


		            </ul>
		        </li>
		        <li><a href="#">Contact Us</a></li> 
		        <li><a href="#">About</a></li> 
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		      	<?//php if($cart_loc!="admin" && isset($_SESSION['customer_email'])): ?>
		      		<li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
		        <?php //endif; ?>
		        <?php if(isset($_SESSION['customer_email'])): ?>
		        	<li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Signout</a></li>
		        <?php endif; ?>
		        <?php if(!isset($_SESSION['customer_email'])): ?>
		        	<li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Signin</a></li>
		      	<?php endif; ?>
		      </ul>
		    </div>
		  </div>
		</nav>
		<div id="wrapper">

        	<!-- Sidebar -->
	        <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li class="sidebar-brand">
                        <a href="index.php">Manage Store</a>
                    </li>
                    <li>
                        <a href="index.php">Products</a>
                    </li>
                    <li>
                        <a href="create_category.php">Create New Category</a>
                    </li>
                    <li>
                        <a href="create_product.php">Create New Product</a>
                    </li>
                </ul>
            </div>
	        <!-- /#sidebar-wrapper -->

	        <!-- Page Content -->
	        <div id="page-content-wrapper">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-lg-12">
	                        <?php include"../search-box.php"; ?>
			            	<div class="panel panel-default">
							  <div class="panel-body">
							  	<table class="table">
							  		<thead>
							  			<tr>
							  				<th>#</th>
							  				<th>Product Name</th>
							  				<th>Category</th>
							  				<th>Subcategory</th>
							  				<th>Product Type</th>
							  				<th>Unit Price</th>
							  				<th>Added On</th>
							  				<th>Edit</th>
							  				<th>Delete</th>
							  			</tr>
							  		</thead>
							  		<tbody>
							  			<?php foreach($res as $table_item): ?>
								  			<?php
								  				//$pt_id=$table_item['product_type_id'];
								  				//$product_type_name=find_product_type_name($pt_id);
								  				//$subcategory_name=find_subcategory_name($pt_id);
								  				//$category_name=find_category_name($pt_id);
								  			?>
								  			<tr>
								  				<td><?//= $table_item['product_id'] ?></td>
								  				<td><?//= $table_item['product_name'] ?></td>
								  				<td><?//= $category_name['category_name'] ?></td>
								  				<td><?//= $subcategory_name['subcategory_name'] ?></td>
								  				<td><?//= $product_type_name['product_type_name'] ?></td>
								  				<td><?//= $table_item['unit_price'] ?></td>
								  				<td><?//= $table_item['date_added'] ?></td>
								  				<td><a class="btn btn-info btn-xs" href='update_product.php?product_id=<?//= $table_item['product_id'] ?>'>edit</a></td>
								  				<td><a class="btn btn-warning btn-xs" href='index.php?deleteproduct_id=<?//= $table_item['product_id'] ?>'>delete</a></td>
								  			</tr>
								  		<?php endforeach; ?>
							  		</tbody>
							  	</table>
							  </div>
							</div>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <!-- /#page-content-wrapper -->

	    </div>
	    <!-- /#wrapper -->
	    
	    <!-- Menu Toggle Script -->
	    <script>
	    $("#menu-toggle").click(function(e) {
	        e.preventDefault();
	        $("#wrapper").toggleClass("toggled");
	    });
	    </script>	    			
	</body>
</html>
	                

