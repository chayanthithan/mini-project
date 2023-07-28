<?php 
	include('../include/connect.php');

	if(isset($_POST['submit'])){
		$brand_name=$_POST['brand_name'];
		$select_query="select * from `insert_brand` where brand_name='$brand_name'";
		$select_result=mysqli_query($con,$select_query);
		$nuofrow=mysqli_num_rows($select_result);
		if($nuofrow>0){
			echo"<script>alert('already this brand is exist')</script>";
		}else{
			$sql="insert into `insert_brand` (brand_name) values('$brand_name')";
			$result=mysqli_query($con,$sql);
			if($result){
				echo "<script>alert('succesfully added')</script>";
				}else{
					die(mysqli_error($con));
				}
		}
	}

 ?>


<div class="container">
	<h4>insert brand</h4>
	<div class="row">
		<div class="col-5 align-item-center">
			<form action="" method="post" class=" mt-5">
				<div class="input-group">
					<span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
					<input type="text" name="brand_name" class="form-control" placeholder="insert vehicle brand" aria-label="brands" aria-describedby="basic-addon1">
					</div>
					<div class="input-group">
					<button name="submit" class="btn btn-primary mt-3 px-5">insert</button>
				</div>
			</form>
		</div>
	</div>
	
</div>