<?php 
		if(isset($_GET['changepassword'])){
			$search_var=$_SESSION['email'];

			$sql="select * from `signin` where email='$search_var'";
			$result=mysqli_query($con,$sql);
			$row=mysqli_fetch_assoc($result);

			$user_id=$row['user_id'];
			$password=$row['password'];
			$conformpassword=$row['conformpassword'];
			
			if(isset($_POST['submit'])){

				
				$user_id=$user_id;
				$oldpassword=$_POST['oldpassword'];
				$newpassword=$_POST['password'];
				$newconformpassword=$_POST['conformpassword'];

				if(($password==$oldpassword)&&($newpassword==$newconformpassword)){
					$sql_update="update `signin` set password='$newpassword',conformpassword='$newconformpassword' where user_id='$user_id'";

					$update_result=mysqli_query($con,$sql_update);
					if($update_result){
					echo "<script>alert('updated password successfully');</script>";
					echo "<script>window.open('login.php','_self');</script>";
					}else{
					die(mysqli_error($con));
					}
				}else{
					echo "<script>alert('enter correct password')</script>";
				}

				
			}
		}
 ?>

<div class="container">
			<div class="row">
				<div class="col-6 mx-auto my-2 text-dark rounded signin">
					<form class="" method="post" enctype="multipart/form-data">
						<div class="mt-5 text-center text-capitalize">
							<h4>Change Password</h4>
						</div>
						<div class="pt-3">
							<input class="form-control py-2 my-3" type="password" name="oldpassword" placeholder="old  password">
							<input class="form-control py-2 my-3" type="password" name="password" placeholder="new password">
							<input class="form-control py-2 my-3" type="password" name="conformpassword" placeholder="conform password">
							
							<input class="btn btn-primary  w-100 d-grid mx-auto " type="submit" name="submit" value="update">
							<!-- <button class="btn btn-primary w-100 d-grid mx-auto" type="button" name="submit" >update</button> -->
						</div>
					</form>
				</div>

			</div>
			
		</div>