<?php 
		if(isset($_GET['editaccount'])){
			$search_var=$_SESSION['email'];

			$sql="select * from `signin` where email='$search_var'";
			$result=mysqli_query($con,$sql);
			$row=mysqli_fetch_assoc($result);

			$user_id=$row['user_id'];
			$fname=$row['firstname'];
			$lname=$row['lastname'];
			$email=$row['email'];
			$mobile=$row['mobile'];
			$address=$row['address'];
			$image=$row['profile_image'];

			if(isset($_POST['submit'])){
				$user_id=$user_id;
				$fname=$_POST['fname'];
				$lname=$_POST['lname'];
				$email=$_POST['email'];
				$mobile=$_POST['mobile'];
				$address=$_POST['address'];

				

				$sql_update="update `signin` set firstname='$fname',lastname='$lname',email='$email',mobile='$mobile',address='$address' where user_id='$user_id'";

				$update_result=mysqli_query($con,$sql_update);
				if($update_result){
					echo "<script>alert('updated successfully');</script>";
					echo "<script>window.open('login.php','_self');</script>";
				}else{
					die(mysqli_error($con));
				}
			}
		}
 ?>

<div class="container">
			<div class="row">
				<div class="col-6 mx-auto my-2 text-dark rounded signin">
					<form class="" method="post" enctype="multipart/form-data">
						<div class="mt-5 text-center text-capitalize">
							<h4>Edit Account</h4>
						</div>
						<div class="pt-3">
							<input class="form-control py-2 my-3" type="text" name="fname" placeholder="firstname here" value="<?php echo $fname ?>">
							<input class="form-control py-2 my-3" type="text" name="lname" placeholder="lastname here" value="<?php echo $lname ?>">
							<input class="form-control py-2 my-3" type="email" name="email" placeholder="email here" value="<?php echo $email ?>">
							<input class="form-control py-2 my-3" type="text" name="mobile" placeholder="mobile numbere here" value="<?php echo $mobile ?>">
							<input class="form-control py-2 my-3" type="text" name="address" placeholder="address here" value="<?php echo $address ?>">
							<input class="btn btn-primary  w-100 d-grid mx-auto " type="submit" name="submit" value="update">
							<!-- <button class="btn btn-primary w-100 d-grid mx-auto" type="button" name="submit" >update</button> -->
						</div>
					</form>
				</div>

			</div>
			
		</div>