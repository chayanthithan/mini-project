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
										<th>property_name</th>
										<th>name</th>
										<th>email</th>
										<th>start_date</th>
										<th>end_date</th>
										<th>message</th>
										<th>image1</th>
										<th>image2</th>
										<th>operation</th>
									</tr>
								</thead>
								<tbody>
									<?php 
	if(isset($_GET['Customerbooked_details'])){
    	$search_var=$_SESSION['email'];
		$sql="select * from	`booking` where owner_email='$search_var'";
		$result=mysqli_query($con,$sql);
		while ($row_book=mysqli_fetch_assoc($result)) {
			$get_property_name=$row_book['property_name'];
			$get_property_id=$row_book['property_id'];
			$get_name = $row_book['name'];
            $get_email = $row_book['user_email'];
            $get_start_date = $row_book['start_date'];
            $get_end_date = $row_book['end_date'];
            $get_message = $row_book['message'];
            $get_front_image = $row_book['front_image'];
            $get_back_image = $row_book['back_image'];

            echo '<tr>
                <td>'.$get_property_name.'</td>
                <td>'.$get_name.'</td>
                <td>'.$get_email.'</td>
                <td>'.$get_start_date.'</td>
                <td>'.$get_end_date.'</td>
                <td>'.$get_message.'</td>
                <td><img src="image/'.$get_front_image.'" style="height:50px;width:50px;"></td>
                <td><img src="image/'.$get_back_image.'" style="height:50px;width:50px;"></td>
                <td>
                    <div class="d-flex">
                        <a href="index.php?conform='.$get_property_id.'" class="btn btn-info p-1">conform</a>
                        <a href="index.php?cancel_customer_booked='.$get_property_id.'" class="btn btn-danger p-1">cancel</a>
                    </div>
                </td>
                </tr>';
		}
			
            

            
        }
   


		// $session_var=$_SESSION['email'];
		// // echo $_SESSION['email'];
		// $sql="select * from `signin` where email='$session_var'";
		// $result=mysqli_query($con,$sql);
		// $row=mysqli_fetch_assoc($result);
		// $user_id=$row['user_id'];

		// //fetch from addproperty table
		// $ses_var=$_SESSION['booked_property_id'];
		// $sql_fetch="select * from `addproperty` where property_id='$ses_var'";
		// $result=mysqli_query($con,$sql_fetch);
		// $row=mysqli_fetch_assoc($result);
		// $fetch_email=$row['email'];

		// $sql_fetch="select * from `booking` where user_id='$user_id'";
		// $result=mysqli_query($con,$sql_fetch);
		// while($row=mysqli_fetch_assoc($result)){
		// 	$name=$row['name'];
		// 	$email=$row['email'];
		// 	$start_date=$row['start_date'];
		// 	$end_date=$row['end_date'];
		// 	$message=$row['message'];
		// 	$front_image=$row['front_image'];
		// 	$back_image=$row['back_image'];

		// 	echo '<tr>
		// 		<td>'.$name.'</td>
		// 		<td>'.$email.'</td>
		// 		<td>'.$start_date.'</td>
		// 		<td>'.$end_date.'</td>
		// 		<td>'.$message.'</td>
		// 		<td><img src="image/'.$front_image.'" style="height:100px;width:100px;"></td>
		// 		<td><img src="image/'.$back_image.'" style="height:100px;width:100px;"></td>
		// 		<td>
		// 			<div class="d-flex">
		// 				<a href="#" class="btn btn-danger p-1">conform</a></td>
		// 				<a href="#" class="btn btn-danger p-1">cancel</a></td>
		// 			</div>
					
		// 		</tr>';
		// }


	
?> 
								</tbody>
							</table>
						</div>
					</form>
				</div>

		
			
		</div>
</div>