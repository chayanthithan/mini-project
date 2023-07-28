<?php 
	if(isset($_POST['delete_submit'])){
		$delete_var=$_SESSION['email'];
		$sql="delete from `signin` where email='$delete_var'";
		$result=mysqli_query($con,$sql);

		if($result){
			echo "<script>alert('successfully deleted');</script>";
			session_destroy();
			echo "<script>window.open('index.php','_self');</script>";
		}
	}
	if(isset($_POST['cancel_submit'])){
		echo "<script>window.open('myaccount.php','_self');</script>";
	}

 ?>

<div class="container">
			<div class="row">
				<div class="col-6 mx-auto my-2 text-dark rounded signin">
					<form class="" method="post">
						<div class="mt-5 text-center text-capitalize">
							<h4>Delete Account</h4>
						</div>
						<div class="pt-3">
							<table class="table text-center text-capitalize">
								<?php 
								if(isset($_GET['deleteacc'])){
									$search_var=$_SESSION['email'];

									$sql="select * from `signin` where email='$search_var'";
									$result=mysqli_query($con,$sql);
									$row=mysqli_fetch_assoc($result);
									$fname=$row['firstname'];
									$email=$row['email'];
									$mobile=$row['mobile'];
									$address=$row['address'];

									echo "<tr>
											<td>$fname</td>
										</tr>
										<tr>
											<td>$email</td>
										</tr>
										<tr>
											<td>$mobile</td>
										</tr>
										<tr>
											<td>$address</td>
										</tr>
										";
								}
							 ?>
								
							</table>
							<div class="d-flex text-center justify-content-center mt-4">
								<input type="submit" name="delete_submit" value="delete" class="btn btn-danger mx-2 px-3">
								<input type="submit" name="cancel_submit" value="cancel" class="btn btn-dark mx-2 px-3">
							
							</div>
							<!-- <button class="btn btn-primary w-100 d-grid mx-auto" type="button" name="submit" >update</button> -->
						</div>
					</form>
				</div>

			</div>
			
		</div>