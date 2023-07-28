<?php 
session_start();
	include('./include/connect.php');

	if(isset($_GET['cancel_user_id'])){
		$user_id=$_GET['cancel_user_id'];
		$sql="delete from `booking` where user_id='$user_id'";
		$delete_query=mysqli_query($con,$sql);



	}
	if(isset($_GET['delete_properties'])){
		$delete_property_id=$_GET['delete_properties'];
		$sql="delete from `addproperty` where property_id='$delete_property_id'";
		$delete_query=mysqli_query($con,$sql);
	}
	
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>vehiclerental</title>
	<!-- bootstrap css link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<!-- font awesome linlk -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- <script src="https://kit.fontawesome.com/2568cb3989.js" crossorigin="anonymous"></script> -->
	<!-- external css link -->
	<link rel="stylesheet" type="text/css" href="">
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
			          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
			        </li>
			        <li class="nav-item  px-3">
			          <a class="nav-link" href="about.php">About</a>
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
		
		</div>
	</nav>
</div>

		
		<!-- myaccount -->
		<div class="container-fluid" >
			<div class="row">
				<div class="col-2 mt-0 p-0">
					
					<div class="bg-dark text-light pt-5">
						<div class="text-center">
							<i class="fa-solid fa-user-tie fa-2xl"></i>
						</div>
						<div class="text-left px-3 mt-5 pb-5">
							<hr class="">
								<?php 

								// if(isset($_GET['deleteacc'])){
									$search_var=$_SESSION['email'];

									$sql="select * from `signin` where email='$search_var'";
									$result=mysqli_query($con,$sql);
									$row=mysqli_fetch_assoc($result);
									$fname=$row['firstname'];
									$email=$row['email'];
									$mobile=$row['mobile'];
									$address=$row['address'];
									if($fname==''&&$email==''&&$mobile==''&&$address==''){
										echo "<p><strong>name :</strong>-</p>
										<p><strong>email :</strong>-</p>
										<p><strong>address :</strong>-</p>
										<p><strong>mobile :</strong>-</p>";
									}else{
										echo "<p><strong>name :</strong>$fname</p>
										<p><strong>email :</strong>$email</p>
										<p><strong>address :</strong>$address</p>
										<p><strong>mobile :</strong>$mobile</p>";
									}
									
									
									
								// }
							 ?>
							
							<hr>
						
							<li class="list-unstyled"><a  class="text-decoration-none text-capitalize" href="myaccount.php?editaccount">edit account</a></li>
							<li class="list-unstyled"><a  class="text-decoration-none text-capitalize" href="myaccount.php?deleteacc">delete account</a></li>
							<li class="list-unstyled"><a  class="text-decoration-none text-capitalize" href="myaccount.php?changepassword">change password</a></li>
							<li class="list-unstyled"><a  class="text-decoration-none text-capitalize" href="myaccount.php?myacc_properties">my properties</a></li>
							<li class="list-unstyled"><a  class="text-decoration-none text-capitalize" href="myaccount.php?book_details">MyBooking Details</a></li>
							<li class="list-unstyled"><a  class="text-decoration-none text-capitalize" href="myaccount.php?Customerbooked_details">Customerbooked_details</a></li>
							<li class="list-unstyled"><a  class="text-decoration-none text-capitalize" href="logout.php">logout</a></li>
						</div>
						
						
					</div>
					
				</div>
				<div class="col-9 bg-light">
						<?php 
							if(isset($_GET['editaccount'])){
								include 'editaccount.php';
							}
							if(isset($_GET['deleteacc'])){
								include 'delete_account.php';
							}
							if(isset($_GET['changepassword'])){
								include 'change_password.php';
							}
							if(isset($_GET['myacc_properties'])){
								include 'myacc_properties.php';
							}
							if(isset($_GET['book_details'])){
								include 'bookingdetails.php';
							}
							if(isset($_GET['Customerbooked_details'])){
								include 'customer_booked_details.php';
							}
							
						 ?>
						 <!--  -->
				</div>
			</div>
		</div>
		<!-- footer -->
		<div class="container-fluid bg-dark">
			<footer class="bg-dark">
				<div class="row pt-5">
					<div class="col-4">
						<form class="d-flex">
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