<?php
include ('includes/connection.php');
if(isset($_POST['submit'])){
    $cust_name=$_POST['cust_name'];
    $cust_mobile=$_POST['cust_mobile'];
    
    $cust_address=$_POST['cust_address'];
    $cust_email=$_POST['cust_email'];
    $cust_password=$_POST['cust_password'];


	$query ="update customers set cust_name= '$cust_name',cust_mobile=' $cust_mobile',cust_address='$cust_address' , cust_email=' $cust_email', cust_password='$cust_password'";



	mysqli_query($conn,$query);
	 header("location:manage_customers.php");

}

$query="select * from customers where cust_id={$_GET['id']}";
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
                        <div class="card-header">Manage Customers</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Create customer</h3>
                            </div>
                            <hr>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label  class="control-label mb-1">Customer Name</label>
                                    <input id="cc-pament" name="cust_name" type="text" class="form-control" value="<?php  echo $row['cust_name']?>" >
                                </div>
                                <div class="form-group">
                                    <label  class="control-label mb-1">Customer Mobile</label>
                                    <input id="cc-pament" name="cust_mobile" type="number" class="form-control"  value="<?php  echo $row['cust_mobile']?>" >
                                </div>
                                <div class="form-group">
                                    <label  class="control-label mb-1">Customer Address</label>
                                    <input id="cc-pament" name="cust_address" type="text" class="form-control" value="<?php  echo $row['cust_address']?>" > 
                                </div>
                                <div class="form-group">
                                    <label  class="control-label mb-1">Customer Email</label>
                                    <input id="cc-pament" name="cust_email" type="email" class="form-control"  value="<?php  echo $row['cust_email']?>" >
                                </div>
                                <div class="form-group">
                                    <label  class="control-label mb-1">Customer Password</label>
                                    <input id="cc-pament" name="cust_password" type="password" class="form-control"  value="<?php  echo $row['cust_password']?>" >
                                </div>
                                
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="submit">
                                 
                                    <span id="payment-button-amount">Save</span>
                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                </button>
                            </div>
                        </form>
                    </div>
					

					<?php include ('includes/admin_footer.php')?>