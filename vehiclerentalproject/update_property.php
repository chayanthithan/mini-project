
	<?php 
	@session_start();
	include('./include/connect.php');


	if(isset($_GET['update_property_id'])){
			$property_id=$_GET['update_property_id'];

			$sql="select * from `addproperty` where property_id='$property_id'";
			$result=mysqli_query($con,$sql);
			$row=mysqli_fetch_assoc($result);

			$property_name=$row['property_name'];
			$price=$row['price'];
			$image1=$row['image1'];
			$image2=$row['image2'];
			$image3=$row['image3'];
			$image4=$row['image4'];
			$milage=$row['milage'];
			$displacement=$row['displacement'];
			$topspeed=$row['topspeed'];
			$description=$row['description'];
			$owner_name=$row['owner_name'];
			$owner_email=$row['owner_email'];
			$owner_phone=$row['owner_phone'];
			$owner_map=$row['owner_map'];

			if(isset($_POST['submit'])){
				$property_name=$_POST['property_name'];
				$price=$_POST['price'];
				$image1=$_FILES['image1'];
				$image2=$_FILES['image2'];
				$image3=$_FILES['image3'];
				$image4=$_FILES['image4'];
				$milage=$_POST['milage'];
				$displacement=$_POST['displacement'];
				$topspeed=$_POST['topspeed'];
				$description=$_POST['description'];
				$owner_name=$_POST['owner_name'];
				$owner_email=$_POST['owner_email'];
				$owner_phone=$_POST['owner_phone'];
				$owner_map=$_POST['owner_map'];


				$property_image1=$_FILES['image1']['name'];
				$property_image2=$_FILES['image2']['name'];
				$property_image3=$_FILES['image3']['name'];
				$property_image4=$_FILES['image4']['name'];

				$temp_image1=$_FILES['image1']['tmp_name'];
				$temp_image2=$_FILES['image2']['tmp_name'];
				$temp_image3=$_FILES['image3']['tmp_name'];
				$temp_image4=$_FILES['image4']['tmp_name'];

				move_uploaded_file($temp_image1,'./image/'.$property_image1);
			   move_uploaded_file($temp_image2,'./image/'.$property_image2);
			   move_uploaded_file($temp_image3,'./image/'.$property_image3);
			   move_uploaded_file($temp_image4,'./image/'.$property_image4);

				

				$sql_update="update `addproperty` set property_name='$property_name',price='$price',image1='$property_image1',image2='$property_image2',image3='$property_image3',image4='$property_image4',milage='$milage',displacement='$displacement',topspeed='$topspeed',description='$description',owner_name='$owner_name',owner_email='$owner_email',owner_phone='$owner_phone',owner_map='$owner_map' where property_id='$property_id'";

				$update_result=mysqli_query($con,$sql_update);
				if($update_result){
					echo "<script>alert('updated successfully');</script>";
					echo "<script>window.open('index.php','_self');</script>";
				}else{
					die(mysqli_error($con));
				}
			}
		}
 


	
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>addproperties</title>
	<!-- bootstrap css link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<!-- font awesome linlk -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- <script src="https://kit.fontawesome.com/2568cb3989.js" crossorigin="anonymous"></script> -->
	<!-- external css link -->
	<!-- <link rel="stylesheet" type="text/css" href="login.css"> -->
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
			            <li><a class="dropdown-item" href="#">All</a></li>
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


	<div class="container">
		<div class="row">
			<div class="maindiv mt-5 ">
				<form method="post" enctype="multipart/form-data" class="rounded w-75 px-3 mx-auto mb-5 text-capitalize form_addproperties border border-primary ">
			<div class="align-items-center pb-3 div1_addproperties p-3 my-2">
				<h5>add vehicle</h5>
				<label class="form-label">property_title</label>
				<input class="form-control" type="text" name="property_name" autocomplete="off" required value=<?php echo $property_name ?>>
				<div class="d-flex pt-4">
					<select class="form-select w-50" name="select_brand" required>
						<option>select brand</option>
						<?php 
							$sql="select * from `insert_brand`";
							$insert_quary=mysqli_query($con,$sql);

							if($insert_quary){
								echo "success";
							}else{
								die(mysqli_error($con));
							}

							while ($row=mysqli_fetch_assoc($insert_quary)) {
								$brand_name=$row['brand_name'];
								echo '<option>'.$brand_name.'</option>';
							}
						 ?>
					</select>
					<select class="form-select w-50" name="select_category" required>
						<option>select category</option>
						<?php 
							$sql="select * from `category`";
							$insert_quary=mysqli_query($con,$sql);

							if($insert_quary){
								echo "success";
							}else{
								die(mysqli_error($con));
							}

							while ($row=mysqli_fetch_assoc($insert_quary)) {
								$category_name=$row['category_name'];
								echo '<option>'.$category_name.'</option>';
							}
						 ?>
					</select>
				</div>
				<label class="form-label">milage</label>
				<input class="form-control" type="text" name="milage" required value=<?php echo $milage ?>>
				<label class="form-label">displacement</label>
				<input class="form-control" type="text" name="displacement" required value=<?php echo $displacement?>>
				<label class="form-label">price</label>
				<input class="form-control" type="text" name="price" value=<?php echo $price ?>>
				<label class="form-label">top speed</label>
				<input class="form-control" type="text" name="topspeed" value=<?php echo $topspeed ?>>
				<label class="form-label">description</label>
				<textarea class="form-control" rows="5" name="description" value=<?php echo $description ?>></textarea>

			</div>
			<div class="div2_addproperties p-3 my-2">
				<hr class="border border-primary ">
				<h5>upload images</h5>
				<label class="from-label">front</label>
				<input class="form-control" type="file" name="image1" value=<?php echo $image1 ?>>
				<label class="from-label">back</label>
				<input class="form-control" type="file" name="image2" value=<?php echo $image2 ?>>
				<label class="from-label">side1</label>
				<input class="form-control" type="file" name="image3" value=<?php echo $image3 ?>>
				<label class="from-label">side2</label>
				<input class="form-control" type="file" name="image4" value=<?php echo $image4 ?>>
			</div>
			<div class="div3_addproperties  p-3 my-2">
				<hr class="border border-primary ">
				<h5>contact details</h5>
				<label class="form-label">owner_name</label>
				<input class="form-control" type="text" name="owner_name" required value=<?php echo $owner_name ?>>
				<label class="form-label">owner_email</label>
				<input class="form-control" type="email" name="owner_email" required value=<?php echo $owner_email ?>>
				<label class="form-label">owner_phone</label>
				<input class="form-control" type="phone" name="owner_phone" required value=<?php echo $owner_phone ?>>
				<label class="from-label">owner_location</label>
				<input class="form-control" type="text" name="owner_map" value=<?php echo $owner_map ?>>
			</div>
			<button type="submit" name="submit" class="btn btn-primary mt-3 px-5 mb-3 w-100 ms-2">post</button>
		</form>
		
			</div>
		</div>
		
	</div>
	<!-- footer -->
	<div>
		<?php 
		include('footer.php');
		 ?>
	</div>
</body>
</html>