<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>admin dashboard</title>
	<!-- bootstrap css link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<!-- font awesome linlk -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- <script src="https://kit.fontawesome.com/2568cb3989.js" crossorigin="anonymous"></script> -->
	<!-- external css link -->
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
	<!-- bootstrap script link -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<div class="container-fluid p-0 m-0">
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<div class="container">
				<div class="d-flex">
					<img src="../Car Rental.png" class="logo" style="width:50px; height:50px;">
			   		 <a class="text-warning transform-capitalize text-decoration-none mt-2"><h5><span class="text-light">UOV</span>RENT</h5></a>
				</div>
				
				<div>
					<nav class="navbar navbar-expand-lg">
						<ul class="navbar-nav">
						<li class="nav-item">
							<!-- <a href="" class="nav-link">welcome guest</a> -->
						</li>
						</ul>
					</nav>
				</div>
				
			</div>
		</nav>

		<div>
			
			<div class="row">
				<div class="col-2 text-center bg-dark">
					<img src="Admin.png" class="pt-5">
					<hr class="bg-light">
						<div class="text-capitalize text-left">
							<ul class="navbar-nav">
								<li class="py-2 "><a href="index.php?addproperties" class="text-primary">Insert properties</a></li>
								<li class="py-2 "><a href="index.php?insert_brand" class="text-primary">Insert Brand</a></li>
								<li class="py-2"><a href="index.php?viewproduct" class="text-primary ">View product</a></li>
								<li class="py-2"><a href="index.php?insert_category" class="text-primary">Insert category</a></li>
								<li class="py-2"><a href="" class="text-primary">View category</a></li>
								<li class="py-2"><a href="" class="text-primary">All payment</a></li>
								<li class="py-2"><a href="index.php?list_user" class="text-primary">List user</a></li>
							
							</ul>

						</div>
				</div>
				<div class="col-10 ">
					<!-- <div class="text-center pt-3 text-capitalize">
						<h4>dash board</h4>
					</div> -->
					<div>
						<?php 
							if(isset($_GET['insert_category'])){
								include 'insert_category.php';
							}
						 ?>
						 <?php 
						 	if(isset($_GET['insert_brand'])){
								include 'insert_brand.php';
							}
						  ?>
						  <?php 
						 	if(isset($_GET['addproperties'])){
								include 'addproperties.php';
								
							}
						  ?>
						   <?php 
						 	if(isset($_GET['viewproduct'])){
								include 'viewproduct.php';
								
							}
						  ?>
						   <?php 
						 	if(isset($_GET['list_user'])){
								include 'list_user.php';
								
							}
							
						  ?>
					</div>
				</div>
			</div>
		</div>
			
	</div>

	<!-- footer section -->
	 <div class="container-fluid bg-dark">
			<footer class="bg-dark mt-5">
				<div class="row pt-5">
					<div class="col-4">
						<form class="d-flex ms-5">
					        <input class="form-control me-2" type="email" placeholder="email" aria-label="Search">
					        <button class="btn btn-outline-light" type="submit">Search</button>
			     		</form>
					</div>
					<div class="col-5 text-center ">
						<!-- <ul class="d-flex list-unstyled justify-content-center ">
							<li><a href="#" class="text-decoration-none px-1 text-light">home</a></li>
							<li><a href="#" class="text-decoration-none px-1 text-light">about</a></li>
							<li><a href="#" class="text-decoration-none px-1 text-light">contact</a></li>
							<li><a href="#" class="text-decoration-none px-1 text-light">vehicle</a></li>
							<li><a href="#" class="text-decoration-none px-1 text-light">login</a></li>
						</ul> -->
					</div>
					<div class="col-3 d-flex text-light ps-5 float-right">
						<i class="fab fa-facebook fa-xl px-2"></i>
						<i class="fab fa-twitter fa-xl px-2"></i>
						<i class="fab fa-instagram fa-xl px-2"></i>
						<i class="fab fa-linkedin fa-xl px-2"></i>
					</div>
				</div>
				<div class="row">
					<div class="text-light text-center">
						<hr><p>Copyright © 2023 uovrent. <br>All Rights Reserved.</p>
						
					</div>
				</div>
			</footer>
		</div>
</body>
</html>