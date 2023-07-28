<?php 
	@session_start();
 ?>
	
	<div class="container">
			<div class="row">
				<div class="col-9 text-dark rounded signin">
					<form class="" method="post" enctype="multipart/form-data">
						<div class="mt-5 text-center text-capitalize">
							<h4>booking Details</h4>
						</div>
						<div>
							<table class="table table-striped table-responsive table-hover">
								<thead class="">
									<tr>
										<!-- <th>book_id</th>
										<th>user_id</th>
										<th>name</th>
										<th>email</th> -->
										<th>property_name</th>
										<th>start_date</th>
										<th>end_date</th>
										<!-- <th>message</th> -->
										<!-- <th>displacement</th> -->
										<th>operation</th>

										
									</tr>
								</thead>
								<tbody>
									<?php 
	if(isset($_GET['book_details'])){
		$session_var=$_SESSION['email'];
		// echo $_SESSION['email'];
		$sql="select * from `signin` where email='$session_var'";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($result);
		$user_id=$row['user_id'];

		//fetch from addproperty table
		// $ses_var=$_SESSION['booked_property_id'];
		// $sql_fetch="select * from `addproperty` where property_id='$ses_var'";
		// $result=mysqli_query($con,$sql_fetch);
		// $row=mysqli_fetch_assoc($result);
		// $property_name=$row['property_name'];

		$sql_fetch="select * from `booking` where user_id='$user_id'";
		$result=mysqli_query($con,$sql_fetch);
		while($row=mysqli_fetch_assoc($result)){
			$property_name=$row['property_name'];
			$name=$row['name'];
			$start_date=$row['start_date'];
			$end_date=$row['end_date'];
			

			echo '<tr>
				<td>'.$property_name.'</td>
				<td>'.$start_date.'</td>
				<td>'.$end_date.'</td>
				<td>
					<div class="d-flex">
						<a href="myaccount.php?cancel_user_id='.$user_id.'" class="btn btn-danger p-1">cancel</a></td>
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