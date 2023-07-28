
<?php 

	include('./include/connect.php');
// function 01

	function getproperties(){
		global $con;

		//chat GPT
		if(isset($_GET['conform'])){
			$property_id=$_GET['conform'];
			$sql="update `addproperty` set status='Booked' where property_id='$property_id'";
			$update_query=mysqli_query($con,$sql);


		}
		if(isset($_GET['cancel_customer_booked'])){
			$property_id=$_GET['cancel_customer_booked'];
			$sql="update `addproperty` set status='available' where property_id='$property_id'";
			$update_query=mysqli_query($con,$sql);
			

		}
		if(isset($_GET['cancel_customer_booked'])){
		$cancel_customer_property_id=$_GET['cancel_customer_booked'];
		$sql="delete from `booking` where property_id='$cancel_customer_property_id'";
		$delete_query=mysqli_query($con,$sql);
	}

		$sql_book="select * from `booking`";
		$book_result=mysqli_query($con,$sql_book);

		
		$sql="select * from `addproperty` order by rand() limit 0,10";
		if(!isset($_GET['category_id'])){
			if(!isset($_GET['brand_id'])){
				$result=mysqli_query($con,$sql);
					while($row=mysqli_fetch_assoc($result)){
						// $book_row=mysqli_fetch_assoc($book_result);
						// $book_property_id=$book_row['property_id'];
						$property_id=$row['property_id'];
						$category_id=$row['category_id'];
						$brand_id=$row['brand_id'];
						$property_name=$row['property_name'];
						$price=$row['price'];
						$image1=$row['image1'];
						$image2=$row['image2'];
						$image3=$row['image3'];
						$image4=$row['image4'];
						$milage=$row['milage'];
						$topspeed=$row['topspeed'];
						$description=$row['description'];
						$owner_name=$row['owner_name'];
						$owner_email=$row['owner_email'];
						$owner_phone=$row['owner_phone'];
						$owner_location=$row['owner_map'];
						$status=$row['status'];

						// if($book_row['property_id']==$row['property_id']){
						// 	$status=true;
						// }
						echo '<div class="col-md-3 mt-5">
						<div class="card">

							<img src=image/'.$image1.' class="card-img-top" alt="...">
							<div class="card-body text-capitalize">
								<div class="d-flex justify-content-between">
									<h5 class="card-title">'.$property_name.'</h5>

									<a href="" class="btn btn-outline-danger p-1 mx-right fst-italic">'.$status.'</a>
								</div>
								
								<p class="card-text">'.substr($description, 0,25).'....</p>
								<p><strong>price:</strong> perday'.$price.'/-</p>
								<a href="learnmore.php?learnmore_id='.$property_id.'" class="w-100">'.($status=="Booked" ? "<button class='btn btn-danger disabled text-capitalize w-100'>Not Available</button>" : "<button class='btn btn-primary text-capitalize w-100'>rent now</button>").'
							</a>
							</div>
						</div>
					</div>';
					}
				}
			}
		}
				
			//get_allproperties
	function get_allproperties(){
		global $con;

		//chat GPT
		if(isset($_GET['conform'])){
			$property_id=$_GET['conform'];
			$sql="update `addproperty` set status='Booked' where property_id='$property_id'";
			$update_query=mysqli_query($con,$sql);


		}

		if(isset($_GET['cancel'])){
			$property_id=$_GET['cancel'];
			$sql="update `addproperty` set status='available' where property_id='$property_id'";
			$cancel_query=mysqli_query($con,$sql);
			$sql="delete from `booking` where property_id='$property_id'";
			$delete_query=mysqli_query($con,$sql);

		}

		// if(isset($_GET['cancel'])){
		// 	$property_id=$_GET['cancel'];
		// 	$sql="delete from `booking` where property_id='$property_id'";
		// 	$delete_query=mysqli_query($con,$sql);
			

		// }


		$sql_book="select * from `booking`";
		$book_result=mysqli_query($con,$sql_book);

		
		$sql="select * from `addproperty` order by rand()";
		if(!isset($_GET['category_id'])){
			if(!isset($_GET['brand_id'])){
				$result=mysqli_query($con,$sql);
					while($row=mysqli_fetch_assoc($result)){
						// $book_row=mysqli_fetch_assoc($book_result);
						// $book_property_id=$book_row['property_id'];
						$property_id=$row['property_id'];
						$category_id=$row['category_id'];
						$brand_id=$row['brand_id'];
						$property_name=$row['property_name'];
						$price=$row['price'];
						$image1=$row['image1'];
						$image2=$row['image2'];
						$image3=$row['image3'];
						$image4=$row['image4'];
						$milage=$row['milage'];
						$topspeed=$row['topspeed'];
						$description=$row['description'];
						$owner_name=$row['owner_name'];
						$owner_email=$row['owner_email'];
						$owner_phone=$row['owner_phone'];
						$owner_location=$row['owner_map'];
						$status=$row['status'];

						// if($book_row['property_id']==$row['property_id']){
						// 	$status=true;
						// }
						echo '<div class="col-md-3 mt-5">
						<div class="card">

							<img src=image/'.$image1.' class="card-img-top" alt="...">
							<div class="card-body text-capitalize">
								<div class="d-flex justify-content-between">
									<h5 class="card-title">'.$property_name.'</h5>

									<a href="" class="btn btn-outline-danger p-1 mx-right fst-italic">'.$status.'</a>
								</div>
								
								<p class="card-text">'.substr($description, 0,25).'....</p>
								<p><strong>price:</strong>'.$price.'</p>
							<a href="learnmore.php?learnmore_id='.$property_id.'" class="w-100">'.($status=="Booked" ? "<button class='btn btn-danger text-capitalize disabled w-100 onclick='return false;'>Not Available</button>" : "<button class='btn btn-primary text-capitalize w-100'>rent now</button>").'
							</a>
							</div>
						</div>
					</div>';
					}
				}
			}
		}

				//function02 insert brand
				function insertbrand(){
					global $con;
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
				}

				//function 3 insert category

				function insertcategory(){
					global $con;
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
				}

				//function5 get unique category
				function get_unique_category(){
					global $con;
					if(isset($_GET['category_id'])){
					$category_id=$_GET['category_id'];
					$sql="select * from `addproperty` where category_id=$category_id";
					
					$result=mysqli_query($con,$sql);
					$num_of_rows=mysqli_num_rows($result);
					if($num_of_rows==0){
						echo "<h4> not available this kind of properties</h4>";
					}
					while($row=mysqli_fetch_assoc($result)){
						$property_id=$row['property_id'];
						$category_id=$row['category_id'];
						$brand_id=$row['brand_id'];
						$property_name=$row['property_name'];
						$price=$row['price'];
						$image1=$row['image1'];
						$image2=$row['image2'];
						$image3=$row['image3'];
						$image4=$row['image4'];
						$milage=$row['milage'];
						$topspeed=$row['topspeed'];
						$description=$row['description'];
						$owner_name=$row['owner_name'];
						$owner_email=$row['owner_email'];
						$owner_phone=$row['owner_phone'];
						$owner_location=$row['owner_map'];

						echo '<div class="col-md-4 mt-5">
						<div class="card">

							<img src=image/'.$image1.' class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">'.$property_name.'</h5>
								<p class="card-text">'.substr($description, 0,25).'....</p>
								<p>price:'.$price.'</p>
								<a href="learnmore.php?learnmore_id='.$property_id.'" class="btn btn-primary">learn more</a>
							</div>
						</div>
					</div>';
					}
				}
			}

				//function6 get unique brand

				function get_unique_brand(){
					global $con;
					if(isset($_GET['brand_id'])){
					$brand_id=$_GET['brand_id'];
					$sql="select * from `addproperty` where brand_id=$brand_id";
					
					$result=mysqli_query($con,$sql);
					$num_of_rows=mysqli_num_rows($result);
					if($num_of_rows==0){
						echo "<h4> not available this kind of properties</h4>";
					}
					while($row=mysqli_fetch_assoc($result)){
						$property_id=$row['property_id'];
						$category_id=$row['category_id'];
						$brand_id=$row['brand_id'];
						$property_name=$row['property_name'];
						$price=$row['price'];
						$image1=$row['image1'];
						$image2=$row['image2'];
						$image3=$row['image3'];
						$image4=$row['image4'];
						$milage=$row['milage'];
						$topspeed=$row['topspeed'];
						$description=$row['description'];
						$owner_name=$row['owner_name'];
						$owner_email=$row['owner_email'];
						$owner_phone=$row['owner_phone'];
						$owner_location=$row['owner_map'];

						echo '<div class="col-md-4 mt-5">
						<div class="card">

							<img src=image/'.$image1.' class="card-img-top" alt="...">
							<div class="card-body">
								<h5 class="card-title">'.$property_name.'</h5>
								<p class="card-text">'.substr($description, 0,25).'....</p>
								<p>price:'.$price.'</p>
								<a href="learnmore.php?learnmore_id='.$property_id.'" class="btn btn-primary">learn more</a>
							</div>
						</div>
					</div>';
					}
				}
			}
			
//function 6
			//search vehicle
			function search_properties(){
				global $con;
				if(isset($_GET['search_data_vehicle'])){
					if(isset($_GET['search_data'])){
						$search_data=$_GET['search_data'];
						$sql="select * from `addproperty` where property_name like '%$search_data%'";
						
							$result=mysqli_query($con,$sql);
							$num_of_rows=mysqli_num_rows($result);
							if($num_of_rows==0){
								echo "<h4 class='text-warning text-center'>could not match</h4>";
							}
							while($row=mysqli_fetch_assoc($result)){
								$property_id=$row['property_id'];
								$category_id=$row['category_id'];
								$brand_id=$row['brand_id'];
								$property_name=$row['property_name'];
								$price=$row['price'];
								$image1=$row['image1'];
								$image2=$row['image2'];
								$image3=$row['image3'];
								$image4=$row['image4'];
								$milage=$row['milage'];
								$topspeed=$row['topspeed'];
								$description=$row['description'];
								$owner_name=$row['owner_name'];
								$owner_email=$row['owner_email'];
								$owner_phone=$row['owner_phone'];
								$owner_location=$row['owner_map'];

								echo '<div class="col-md-4 mt-5">
								<div class="card">

									<img src=image/'.$image1.' class="card-img-top" alt="...">
									<div class="card-body">
										<h5 class="card-title">'.$property_name.'</h5>
										<p class="card-text">'.substr($description, 0,25).'....</p>
										<p>price:'.$price.'</p>
										<a href="learnmore.php?learnmore_id='.$property_id.'" class="btn btn-primary">learn more</a>
									</div>
								</div>
							</div>';
							}
						}
					}
				}
				
 ?>