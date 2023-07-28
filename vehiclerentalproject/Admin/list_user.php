
<?php 
	include('../include/connect.php');

	if(isset($_GET['delete_user'])){
		$user_id=$_GET['delete_user'];

		$sql="delete from `signin` WHERE user_id='$user_id'";
		$result=mysqli_query($con,$sql);
		if($result){
			header('location:index.php');
		}else{
			die(mysqli_error($con));
		}
	}
 ?>
<div class="container">
	<h4 class="text-center my-5 ">User Details</h4>
	<div class="row">
		<div class="col-12 align-item-center table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead class=" bg-dark text-light">
					<tr>
						<th>user_id</th>
						<th>firstname</th>
						<th>lastname</th>
						<th>email</th>
						<th>mobile</th>
						<th>address</th>
						<th>pasword</th>
						<th>confrompassword</th>
						<th>operation</th>

					</tr>
				</thead>
				<tbody>
					<?php 
						if(isset($_GET['list_user'])){
							$sql="select * from `signin`";
							$result=mysqli_query($con,$sql);
							while($row=mysqli_fetch_assoc($result)){
								$user_id=$row['user_id'];
								$fname=$row['firstname'];
								$lname=$row['lastname'];
								$email=$row['email'];
								$mobile=$row['mobile'];
								$address=$row['address'];
								$password=$row['password'];
								$conformpassword=$row['conformpassword'];

								echo '<tr>
										<td>'.$user_id.'</td>
										<td>'.$fname.'</td>
										<td>'.$lname.'</td>
										<td>'.$email.'</td>
										<td>'.$mobile.'</td>
										<td>'.$address.'</td>
										<td>'.$password.'</td>
										<td>'.$conformpassword.'</td>
										<td><a href="list_user.php?delete_user='.$user_id.'" class="btn btn-danger px-5 py-1 ms-1">delete</a></td>
								</tr>';
							}
						}
					 ?>
				</tbody>
			</table>
		</div>
	</div>
	
</div>