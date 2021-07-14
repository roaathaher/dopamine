<?php
include ('includes/connection.php');
if(isset($_POST['submit'])){
	$admin_email=$_POST['admin_email'];
	$admin_password=$_POST['admin_password'];
	$admin_fullname=$_POST['admin_fullname'];


	$query ="update admins set admin_email = '$admin_email',admin_password='$admin_password',admin_fullname='$admin_fullname' ";



	mysqli_query($conn,$query);
	 header("location:manage_admin.php");

}

$query="select * from admins where admin_id={$_GET['id']}";
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
						<div class="card-header">Manage Admin</div>
						<div class="card-body">
							<div class="card-title">
								<h3 class="text-center title-2">Create Admin</h3>
							</div>
							<hr>
							<form action="" method="post">
								<div class="form-group">
									<label  class="control-label mb-1">admin_email</label>
									<input id="cc-pament" name="admin_email" type="email" class="form-control" required  value="<?php  echo $row['admin_email']?>">
								</div>
								<div class="form-group">
									<label  class="control-label mb-1">admin_password</label>
									<input id="cc-pament" name="admin_password" type="password" class="form-control"  required  value="<?php  echo $row['admin_password']?>">
								</div>
								<div class="form-group">
									<label  class="control-label mb-1">Full Name</label>
									<input id="cc-pament" name="admin_fullname" type="text" class="form-control"  required  value="<?php  echo $row['admin_fullname']?>">
								</div>

								<button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="submit">

									<span id="payment-button-amount">Save</span>
									<span id="payment-button-sending" style="display:none;">Sending…</span>
								</button>
							</div>
						</form>
					</div>
					

					<?php include ('includes/admin_footer.php')?>