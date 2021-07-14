<?php
include ('includes/connection.php');
if(isset($_POST['submit'])){
	$admin_email=$_POST['admin_email'];
		$admin_password=$_POST['admin_password'];
	$admin_fullname=$_POST['admin_fullname'];


$query ="insert into admins(admin_email,admin_password, admin_fullname) values('$admin_email', '$admin_password', '$admin_fullname')";



mysqli_query($conn,$query);

}
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
									<input id="cc-pament" name="admin_email" type="email" class="form-control" required >
								</div>
								<div class="form-group">
									<label  class="control-label mb-1">admin_password</label>
									<input id="cc-pament" name="admin_password" type="password" class="form-control"  required >
								</div>
								<div class="form-group">
									<label  class="control-label mb-1">Full Name</label>
									<input id="cc-pament" name="admin_fullname" type="text" class="form-control"  required >
								</div>

								<button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="submit">

									<span id="payment-button-amount">Save</span>
									<span id="payment-button-sending" style="display:none;">Sending…</span>
								</button>
							</div>
						</form>
					</div>
					<div class="row m-t-30">
						<div class="col-md-12">
							<!-- DATA TABLE-->
							<div class="table-responsive m-b-40">
								<table class="table table-borderless table-data3">
									<thead>
										<tr>
											<th>#</th>
											<th>Admin Email</th>
											<th>Full Name</th>
											<th>Edit</th>
											<th>Delete</th>
										</tr>
									</thead>
									<tbody>

										<?php
										$query="select * from admins";
										$result= mysqli_query($conn,$query);
										while( $row= mysqli_fetch_assoc($result)){
											echo "<tr>";
											echo "<td> {$row['admin_id']} </td>";
											echo "<td> {$row['admin_email']} </td>";
											echo "<td> {$row['admin_fullname']}</td>";
												echo "<td> <a href='edit_admin.php ?id={$row['admin_id']}'class='btn btn-warning'>Edit</a></td>";
													echo "<td><a href='delete_admin.php?id={$row['admin_id']}' class='btn btn-danger'>Delete</a></td>";
											echo "</tr>";
										}

										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>

					<?php include ('includes/admin_footer.php')?>