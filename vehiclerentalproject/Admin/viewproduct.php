<?php 
	include('../include/connect.php');

	if(isset($_GET['delete_user_property'])){
		$property_id=$_GET['delete_user_property'];

		$sql="delete from `addproperty` where property_id=$property_id";
		$result=mysqli_query($con,$sql);
		if($result){
			header('location:index.php');
		}else{
			die(mysqli_error($con));
		}
	}
 ?>
	<div class="container">
			<div class="row">
				<div class="col-12 text-dark rounded signin table-responsive">
					<form class="" method="post" enctype="multipart/form-data">
						<div class="mt-5 text-center text-capitalize">
							<h4>Properties Details</h4>
						</div>
						<div>
							<table class="table table-striped table-bordered table-hover">
								<thead class="bg-dark text-light">
									<tr>
										<th>user_id</th>
										<th>property_name</th>
										<th>price</th>
										<th>image</th>
										<th>milage</th>
										<th>displacement</th>
										<th>top_speed</th>
										<th>description</th>
										<th>owner_name</th>
										<th>owner_email</th>
										<th>owner_phone</th>
										<th>owner_location</th>
										<th>operation</th>
									</tr>
								</thead>
			 					<tbody>
									<tr>
										<?php 

											if(isset($_GET['viewproduct'])){
												$sql="select * from `addproperty`";
												$result=mysqli_query($con,$sql);

												while ($row=mysqli_fetch_assoc($result)) {
													$property_id=$row['property_id'];
													$user_id=$row['user_id'];
													$property_name=$row['property_name'];
													$price=$row['price'];
													$image=$row['image1'];
													$milage=$row['milage'];
													$displacement=$row['displacement'];
													$top_speed=$row['topspeed'];
													$description=$row['description'];
													$owner_name=$row['owner_name'];
													$owner_email=$row['owner_email'];
													$owner_phone=$row['owner_phone'];
													$owner_location=$row['owner_map'];

													echo '<tr>
															<td>'.$user_id.'</td>
															<td>'.$property_name.'</td>
															<td>'.$price.'</td>
															<td>'.$image.'</td>
															<td>'.$milage.'</td>
															<td>'.$displacement.'</td>
															<td>'.$top_speed.'</td>
															<td>'.$description.'</td>
															<td>'.$owner_name.'</td>
															<td>'.$owner_email.'</td>
															<td>'.$owner_phone.'</td>
															<td>'.$owner_location.'</td>
															<td>
																<div class="d-flex">
																<a href="viewproduct.php?delete_user_property='.$property_id.'" class="btn btn-danger px-5 py-1 ms-1">delete</a></td>
																</div>
														  </tr>';
												}
											}

										 ?>
									</tr>
								</tbody>
							</table>
						</div>
					</form>
				</div>

		
			
		</div>
</div>