
	
	<div class="container">
			<div class="row">
				<div class="col-9 text-dark rounded signin">
					<form class="" method="post" enctype="multipart/form-data">
						<div class="mt-5 text-center text-capitalize">
							<h4>Properties Details</h4>
						</div>
						<div>
							<table class="table table-striped table-responsive table-hover">
								<thead class="">
									<tr>
										<th>name</th>
										<th>price</th>
										<th>img1</th>
										<th>img2</th>
										<th>img3</th>
										<th>img4</th>
										<th>milage</th>
										<th>displacement</th>
										<th>topspeed</th>
										<th>description</th>
										<th>operation</th>
									</tr>
								</thead>
								<tbody>
									<?php 
	if(isset($_GET['myacc_properties'])){
		$session_var=$_SESSION['email'];
		// echo $_SESSION['email'];
		$sql="select * from `signin` where email='$session_var'";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($result);
		$user_id=$row['user_id'];

		$sql_fetch="select * from `addproperty` where user_id='$user_id'";
		$result=mysqli_query($con,$sql_fetch);
		while($row=mysqli_fetch_assoc($result)){
			$property_id=$row['property_id'];
			$user_id=$row['user_id'];
			$property_name=$row['property_name'];
			$price=$row['price'];
			$img1=$row['image1'];
			$img2=$row['image2'];
			$img3=$row['image3'];
			$img4=$row['image4'];
			$milage=$row['milage'];
			$displacement=$row['displacement'];
			$description=$row['description'];
			$topspeed=$row['topspeed'];

			echo '<tr>
				<td>'.$property_name.'</td>
				<td>'.$price.'</td>
				<td>'.$img1.'</td>
				<td>'.$img2.'</td>
				<td>'.$img3.'</td>
				<td>'.$img4.'</td>
				<td>'.$milage.'</td>
				<td>'.$displacement.'</td>
				<td>'.$topspeed.'</td>
				<td>'.$description.'</td>
				<td>
					<div class="d-flex">
						<a href="update_property.php?update_property_id='.$property_id.'" class="btn btn-dark p-1">update</a>
						<a href="myaccount.php?delete_properties='.$property_id.'" class="btn btn-danger p-1">delete</a></td>
					</div>
					
				</tr>';
		}
	}
?> 
								</tbody>
							</table>
						</div>
					</form>
				</div>

		
			
		</div>
</div>