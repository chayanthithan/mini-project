<?php 
	session_start();
	include('./include/connect.php');


	if(isset($_POST['book_submit'])){
		$search_var=$_SESSION['email'];
		$property_id=$_GET['learnmore_id'];
		$sql="select * from `addproperty` where property_id='$property_id'";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($result);
		$owner_email=$row['owner_email'];
		$property_name=$row['property_name'];

		$sql="select * from `signin` where email='$search_var'";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($result);
		$user_id=$row['user_id'];

		$fname=$_POST['name'];
		$email=$_POST['email'];
		$start_date=$_POST['start_date'];
		$end_date=$_POST['end_date'];
		$message=$_POST['message'];
		$front_image=$_FILES['front_image']['name'];
		$back_image=$_FILES['back_image']['name'];
		$property_id=$_GET['learnmore_id'];

		$sql="select * from `booking` where property_id='$property_id'";
		$find_date=mysqli_query($con,$sql);
		$date_check=mysqli_fetch_assoc($find_date);
		$start_date=$date_check['start_date'];
		$end_date=$date_check['end_date'];


		$sql="select * from `addproperty` where property_id='$property_id'";
		$find=mysqli_query($con,$sql);
		$condition_check=mysqli_fetch_assoc($find);

		$check_mail=$condition_check['owner_email'];
		$check_name=$condition_check['owner_name'];
		$status=$condition_check['status'];
		if($status=="Booked"){
			
			echo "<script>alert(' $start_date,someone has already booked ');</script>";
		}
		else if($check_mail==$email&&$check_name==$fname){
			echo "<script>alert('sorry owner can\'t booked their own vehicle');</script>";	
		}
		else{
			if(empty($front_image)&&empty($front_image)){
				echo "<script>alert('can\'t move without filled every field');</script>";
			}else{
				$sql_insert="insert into `booking` (property_id,name,user_email,owner_email,property_name,start_date,end_date,message,front_image,back_image,user_id) values('$property_id','$fname','$email','$owner_email','$property_name','$start_date','$end_date','$message','$front_image','$back_image','$user_id')";
			$insert_result=mysqli_query($con,$sql_insert);

			if($insert_result){
			echo "<script>alert('booking details successfully updated');</script>";
			header('location:index.php');
			}else{
				die(mysqli_error($con));
				}
			}
		}
		// while ($row=mysqli_fetch_assoc($find)) {
		// 	// code...
		// }


		// $sql="select * from `booking`";
		// $book_result=mysqli_query($con,$sql);
		// while($row=mysqli_fetch_assoc($book_result)){
		// 	$book_fname=$row['name'];
		// 	$book_email=$row['email'];
		// 	$book_start_date=$row['start_date'];
		// 	$book_end_date=$row['end_date'];
		// 	$book_message=$row['message'];
		// 	$book_front_image=$row['front_image'];
		// 	$book_back_image=$row['back_image'];
		// 	$book_property_id=$row['property_id'];

		// 	$_SESSION['booked_property_id']=$book_property_id;

		// 	if($email==$book_email&&$property_id==$book_property_id){
		// 		echo "<script>alert('already booked');</script>";
		// 	}
		// }
		// if(empty($front_image)&&empty($front_image)){
		// 	echo "<script>alert('can\'t move without filled every field');</script>";
		// }else{
		// 	$sql_insert="insert into `booking` (property_id,name,user_email,owner_email,property_name,start_date,end_date,message,front_image,back_image,user_id) values('$property_id','$fname','$email','$owner_email','$property_name','$start_date','$end_date','$message','$front_image','$back_image','$user_id')";
		// 	$insert_result=mysqli_query($con,$sql_insert);

		// 	if($insert_result){
		// 	echo "<script>alert('booking details successfully updated');</script>";
		// 	header('location:index.php');
		// 	}else{
		// 	die(mysqli_error($con));
		// 	}
		// }
		
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
	<link rel="stylesheet" type="text/css" href="index.css">
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
			          <p class="text-capitalize text-primary"><?php

			           if(isset($_SESSION['username'])&& !empty($_SESSION['username']))
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
						<div class="float-right">
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
		<!-- third section -->
		<!-- <div class="container text-center pt-5 text-primary">
			<h3>uovrent store</h3>
			<h6>we are ready to provide best vehicles</h6>
		</div> -->
		<!-- fourth section -->
		
				<?php 
					// session_unset();
					// session_destroy();
					if(!isset($_SESSION['email'])){
						include('signup_signout.php');
						exit();
					}else{
						$property_id=$_GET['learnmore_id'];
						$sql="select * from `addproperty` where property_id='$property_id'";
						$result=mysqli_query($con,$sql);
						$row=mysqli_fetch_assoc($result);
						
						// $category_id=$row['category_id'];
						// $brand_id=$row['brand_id'];
						$property_name=$row['property_name'];
						$price=$row['price'];
						$image1=$row['image1'];
						$image2=$row['image2'];
						$image3=$row['image3'];
						$image4=$row['image4'];
						$milage=$row['milage'];
						$topspeed=$row['topspeed'];
						$description=$row['description'];
						$displacement=$row['displacement'];
						$owner_name=$row['owner_name'];
						$owner_email=$row['owner_email'];
						$owner_phone=$row['owner_phone'];
						$owner_location=$row['owner_map'];
					}
					

				 ?>
	<div class="jambotron">
	  	<div class="container">
			<h1 class="display-4 text-center text-primary"><?php echo $property_name?>

			</h1>
			<p class="load"><?php echo $description ?></p>
			<hr class="my-4">
			
	  	</div>
	  	<div class="container">
	  		<div class="row">
	  			<div class="col-lg-6 col-sm-12">
	  				<img class="img-fluid" style="height:20rem; width:30rem" src=<?php  echo "image/".$image1?>>
	  				<div class="text-center">
		  				<div class="row">

		  					<div class="col-lg-2 col-sm-1 mt-1 ">
		  						<img class="img-fluid" src=<?php  echo "image/".$image2 ?>>
		  					</div>
		  					<div class="col-lg-2 col-sm-1 mt-1 ">
		  						<img class="img-fluid" src=<?php  echo "image/".$image3?>>
		  					</div>
		  					<div class="col-lg-2 col-sm-1 mt-1">
		  						<img class="img-fluid" src=<?php  echo "image/".$image4 ?>>
		  					</div>
		  				</div>
	  				</div>
	  			</div>
	  		
	  			<div class="col-lg-3 col-sm-6 ">
	  				<div class="text-left ">
	  					<!-- <p>name of property: <?php echo $property_name ?></p>
		  				<p>description: <?php echo $description ?></p>
		  				<p><strong>price: </strong><?php  echo $price ?>/-</p>
		  				<p>milage: <?php echo $milage ?></p>
		  				<p>topspeed: <?php echo $topspeed ?></p>
		  				<p>dispalcement: <?php echo $displacement ?></p> -->
		  				<table class="table">
		  					<h5>property details</h5>
		  					<tr>
		  						<th>name</th>
		  						<td><?php echo ': '.$property_name ?></td>
		  					</tr>
		  					<tr>
		  						<th>description</th>
		  						<td><?php echo ': '.$description ?></td>
		  					</tr>
		  					<tr>
		  						<th>price</th>
		  						<td><?php echo ': '.$price ?></td>
		  					</tr>
		  					<tr>
		  						<th>milage</th>
		  						<td><?php echo ': '.$milage ?></td>
		  					</tr>
		  					<tr>
		  						<th>topspeed</th>
		  						<td><?php echo ': '.$topspeed ?></td>
		  					</tr>
		  					<tr>
		  						<th>displacement</th>
		  						<td><?php echo ': '.$displacement ?></td>
		  					</tr>
		  	
		  				</table>
	  				</div>
	  				
	  				<div class="text-left">
	  					<table class="table">
	  						<h5>owner details</h5>
	  						<tr>
	  							<th>name</th>
	  							<td><?php  echo ': '.$owner_name ?></td>
	  						</tr>
	  						<tr>
	  							<th>email</th>
	  							<td><?php  echo ': '.$owner_email ?></td>
	  						</tr>
	  						<tr>
	  							<th>mobile no</th>
	  							<td><?php  echo ': '.$owner_phone ?></td>
	  						</tr>
	  						<tr>
	  							<th>G-map</th>
	  							<td><a href=""><?php  echo ': '.$owner_location?></a></td>
	  						</tr>
	  					</table>
	  					
	  				</div>
	  				
	  			</div>
	  			<div class="col-lg-3 col-sm-6 ">
	  				<div class="text-left  border border-primary p-3">
	  					<form method="post" class="" enctype="multipart/form-data">
	  						<h5 class="text-primary">book here</h5>
	  						<input class=" text-capitalize form-control mb-3" type="text" name="name" placeholder="name" value=<?php echo $_SESSION['username'] ?>>
	  						<input class=" text-capitalize form-control mb-3" type="email" name="email" placeholder="email" value=<?php echo $_SESSION['email'] ?>>
	  						<input class="form-control mb-3" type="date" name="start_date" placeholder="from date">
	  						<input class="form-control mb-3" type="date" name="end_date" placeholder="end date">
	  						<label class="form-label fw-bold">insert you'r document (student_id)</label>
	  						<input class="form-control mb-3" type="file" name="front_image">
	  						<input class="form-control mb-3" type="file" name="back_image">
							<select class="form-select mb-3" aria-label="Default select example">
							  <option selected>select payment</option>
							  <option value="1">cash on hand</option>
							</select>

	  						<textarea class=" text-capitalize form-control mb-3" name="message" placeholder="leave a message" rows="3"></textarea>
	  						<input href =""class="btn btn-primary p-1 w-100" type="submit" name="book_submit" value="book now">
	  					</form>
	  				
	  				</div>
	  			</div>
	  		
	  	</div>
	  		<button class="btn btn-primary mt-5 p-0">
				<a href="index.php" class="btn btn-primary" role="button">Go back</a>
			</button>
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