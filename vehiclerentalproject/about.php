
<?php 
session_start();
	include('./include/connect.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>about</title>
	<!-- bootstrap css link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<!-- font awesome linlk -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- <script src="https://kit.fontawesome.com/2568cb3989.js" crossorigin="anonymous"></script> -->
	<!-- google font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Philosopher:ital,wght@0,400;0,700;1,400;1,700&family=Ubuntu:wght@300&display=swap" rel="stylesheet">

	<!-- external css link -->
	<link rel="stylesheet" type="text/css" href="about.css">
	<style>
		body{
/*			background-color: #474e5d;*/
		}
	</style>

</head>
<body>
	<!-- bootstrap script link -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<div class="container-fluid bg-primary m-0 p-0">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<div class="container-fluid ">
				<img src="Car Rental.png" class="logo" style="width:50px; height:50px;">
			    <a class="text-warning transform-capitalize text-decoration-none mt-2"><h5><span class="text-light">UOV</span>RENT</h5></a>
			    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			      <span class="navbar-toggler-icon"></span>
			    </button>
			    <div class="collapse navbar-collapse " id="navbarSupportedContent">
			      <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-right ms-auto">
			        <li class="nav-item  px-3">
			          <a class="nav-link " aria-current="page" href="index.php">Home</a>
			        </li>
			        <li class="nav-item  px-3">
			          <a class="nav-link active" href="about.php">About</a>
			        </li> 
			        <li class="nav-item  px-3">
			          <a class="nav-link" href="contact.php">Contact</a>
			        </li>
			        <li class="nav-item dropdown  px-3">
			          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
			            vehicle
			          </a>
			          <ul class="dropdown-menu bg-primary" aria-labelledby="navbarDropdown">
			            <li><a class="dropdown-item" href="vehicle_all.php">All</a></li>
			          </ul>
			        </li>
			        <!-- <li class="nav-item">
			          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
			        </li> -->
			      </ul>
			      
			      <form class="d-flex">
			      	<?php 
			      		if(!isset($_SESSION['email'])){
			      			echo '<a class="text-light px-5 d-flex text-center mt-2 text-decoration-none" href="login.php"><i class="fa-solid fa-user fa-xl mt-2 mx-2"></i>login</a>';
			      		}else{
			      			echo '<a class="text-light px-5 d-flex text-center mt-2 text-decoration-none" href="logout.php"><i class="fa-solid fa-user fa-xl mt-2 mx-2"></i>logout</a>';
			      		}
			      	 ?>
			        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
			        <button class="btn btn-outline-light" type="submit">Search</button>
			      </form>
			    </div>
			</div>
			</nav>

		</div>
	
</div>
		<!-- second navigation bar -->
		<div class="container-fluid bg-dark">
			<nav class="navbar navbar-expand-lg">
				<div class="container">
					
						<div class="float-left text-light ms-4">
							<nav class="navbar navbar-expand-lg navbar-dark">
			<div class="container-fluid ">
			    <button class="navbar-toggler me-5 p-2 " type="button" data-bs-toggle="collapse" data-bs-target="#seconddropdown" aria-controls="seconddropdown" aria-expanded="false" aria-label="Toggle navigation">
			      <span class="navbar-toggler-icon"></span>
			    </button>
			    <div class="collapse navbar-collapse " id="seconddropdown">
			      <ul class="navbar-nav mb-2 mb-lg-0 text-right ms-auto">
			        <li class="m-0 pt-2">
			          <p class="text-capitalize"><?php if(isset($_SESSION['username'])&& !empty($_SESSION['username']))
			           		{
			           			echo 'welcome - '.$_SESSION['username'].'';
			           		}
			           ?></p>
			        </li>
			        <li class="nav-item dropdown  px-3">
			          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
			           Brands
			          </a>
			          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
			          	<?php 
			          		$sql="select * from `insert_brand`";
							$result=mysqli_query($con,$sql);

							if (!$result) {
								die(mysqli_error($con));
							}

							while($row=mysqli_fetch_assoc($result)){
								$brand_name=$row['brand_name'];
								$brand_id=$row['brand_id'];
								echo '<li><a class="dropdown-item" href="index.php?brand_id='.$brand_id.'">'.$brand_name.'</a></li>';
							}
	
			          	 ?>
			            <!-- 
			            <li><a class="dropdown-item" href="#">Bicycles</a></li>
			            <li><a class="dropdown-item" href="#">Motorbikes</a></li>
			            <li><a class="dropdown-item" href="#">light vehicles</a></li> -->
			          </ul>
			        </li>
			         <li class="nav-item dropdown  px-3">
			          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
			            Categories
			          </a>
			          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
			          	<?php 
			          		$sql="select * from `category`";
							$result=mysqli_query($con,$sql);

							if (!$result) {
								die(mysqli_error($con));
							}

							while($row=mysqli_fetch_assoc($result)){
								$category_name=$row['category_name'];
								$category_id=$row['category_id'];
								echo '<li><a class="dropdown-item" href="index.php?category_id='.$category_id.'">'.$category_name.'</a></li>';
							}
	
			          	 ?>
			          	<!-- <li><a class="dropdown-item" href="#">YAMAHA</a></li>
			            <li><a class="dropdown-item" href="#">BAJAJ</a></li>
			            <li><a class="dropdown-item" href="#">HERO</a></li>
			            <li><a class="dropdown-item" href="#">HONDA</a></li> -->
			            
			          </ul>
			        </li>
			       
			      </ul>
			      
			     
			    </div>
			</div>
		</nav>
						</div>
						<div class="float-right ms-5">
							<?php 
					      		if(isset($_SESSION['email'])){
					      			echo '<a class="text-light mt-1 ms-0 text-decoration-none float-end" href="myaccount.php"><i class="fa-solid fa-user-tie fa-xl pe-1"></i>My account</a>
					      				<a class="text-light mt-1 ms-0 pe-4 text-decoration-none float-end" href="addproperties.php"><i class="fa-solid fa-file-circle-plus fa-xl mt-3 mx-2"></i>Add properties</a>';
					      		}
					      		
			      			 ?>

						</div>
				</div>	
			</nav>

		</div>


<!-- start -->
		<div class="container text-center ">
			
				
			<div class="main_div py-4 px-5 mt-5 ">
				<div class="">
				<div class="my-5 text-capitalize text-decoration-underline fw-bold">
					<h2 class="text-primary">about us</h2>
				</div>
				<div class="fw-bold">
					<p>we ae provide best and smart vehicle for rent  is simply dummy text of the printing and typesetting industry. Lorem Ipsum has beenv the industry's standard dummy text ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type 
					specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining..</p>
				</div>
			</div>
			<div class="row mt-5 vission_div">
				
					<div class="col-2 bg-primary bg-gradient py-4 div_1">
						<h3>vission</h3>
					</div>
					<div class="col-10 fst-italic fw-bold pt-2 px-3 div_2 ">
						<p>To empower rental companies of all sizes to achieve their goals through a comprehensive and reliable vehicle rental management system that streamlines operations, enhances customer satisfaction, and drives revenue growth.</p>
					</div>
				
			</div>
			<div class="row mt-3 mission_div">
					<div class="col-2 bg-primary bg-gradient py-4  div_1">
						<h3>mission</h3>
					</div>
					<div class="col-10 text-center fst-italic fw-bold pt-2 div_2
					">
						<p>To revolutionize the vehicle rental industry by providing a smart, flexible, and scalable software solution that enables  rental companies to stay ahead of the competition.</p>
					</div>
			</div>
		</div>
			
			<div class="border border-ligth mt-5 team_details">
				<div class="my-5">
					<h3 class="text-capitalize fw-bold">our team</h3>
				</div>
				<div class="row">
					<div class="d-flex justify-content-center">
						<div class="col-4">
						<div>
							<img src="image/chayan.jpg" class="rounded-circle" style="height: 150px;width: 150px;object-fit: cover;background-size: center;" >
						</div>
						<div class="my-3 mx-5">
							<h4 class="">chayankumar</h4>
							<h5 class="text-secondary">backend developer</h5>
							<p>Some text that describes me lorem ipsum ipsum loremSome text that describes me lorem ipsum ipsum lorem.</p>
							<p class="fw-bold">chayan@gmail.com</p>
							<button class="btn btn-primary px-5 "><a href="contact.php" class="text-light text-decoration-none">contact</a></button>
						</div>
						

					</div>
					<div class="col-4">
						<div>
							<img src="image/doshan.jpg" class="rounded-circle " style="height: 150px;width: 150px; object-fit: cover;">
						</div>
						<div class="my-3 mx-5">
							<h4 class="text-dark">Doshanthan</h4>
							<h5 class="text-secondary">frontend developer</h5>
							<p>Some text that describes me lorem ipsum ipsum lorem Some text that describes me lorem ipsum ipsum lorem.</p>
							<p class="fw-bold">doshan@gmail.com</p>
							<button class="btn btn-primary px-5 "><a href="contact.php" class="text-light text-decoration-none">contact</a></button>
						</div>
					</div>
					</div>
					
				</div>
				

			</div>
		</div>
		<!-- footer -->
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
						<div class="col-3 d-flex text-light ps-5 float-right ms-auto">
						<a href=" www.facebook.com"><i class="fab fa-facebook fa-xl px-2"></i></a>
						<a href=" www.facebook.com"><i class="fab fa-twitter fa-xl px-2"></i></a>
						<a href=" www.facebook.com"><i class="fab fa-instagram fa-xl px-2"></i></a>
						<a href=" www.facebook.com"><i class="fab fa-linkedin fa-xl px-2"></i></a>
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