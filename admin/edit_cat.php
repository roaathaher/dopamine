<?php
include ('includes/connection.php');
if(isset($_POST['submit'])){
	$cat_name=$_POST['cat_name'];
	$cat_image=$_POST['cat_image'];
	


	$query ="update  categories set cat_name = '$cat_name',
	cat_image='$cat_image'";



	mysqli_query($conn,$query);
	 header("location:manage_categories.php");

}

$query="select * from categories where cat_id={$_GET['id']}";
$result= mysqli_query($conn,$query);

$row=mysqli_fetch_assoc($result);

include ('includes/admin_header.php');
?>

<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-header">Edit category</div>
						<div class="card-body">
							<div class="card-title">
								<h3 class="text-center title-2">Edit Category</h3>
							</div>
							<hr>
							<form action="" method="post">
								<div class="form-group">
									<label  class="control-label mb-1">Category Name</label>
									<input id="cc-pament" name="cat_name" type="text" class="form-control" required  value="<?php  echo $row['cat_name']?>">
								</div>
								<div class="form-group">
									<label  class="control-label mb-1">Category Image</label>
									<input id="cc-pament" name="cat_image" type="image" class="form-control"  required  value="<?php  echo $row['cat_image']?>">
								</div>
								

								<button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="submit">

									<span id="payment-button-amount">Save</span>
									<span id="payment-button-sending" style="display:none;">Sending…</span>
								</button>
							</div>
						</form>
					</div>
					

					<?php include ('includes/admin_footer.php')?>