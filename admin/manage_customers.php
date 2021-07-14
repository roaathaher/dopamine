<?php 

include ('includes/connection.php');
if(isset($_POST['submit'])){
    $cust_name=$_POST['cust_name'];
    $cust_mobile=$_POST['cust_mobile'];
    
    $cust_address=$_POST['cust_address'];
    $cust_email=$_POST['cust_email'];
    $cust_password=$_POST['cust_password'];

    $query ="insert into customers (cust_name,cust_mobile, cust_address,cust_email,cust_password) values(
   ' $cust_name', '  $cust_mobile', ' $cust_address',' $cust_email',' $cust_password')";



    mysqli_query($conn,$query);

}

include ('includes/admin_header.php')?>
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
                                    <input id="cc-pament" name="cust_name" type="text" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label  class="control-label mb-1">Customer Mobile</label>
                                    <input id="cc-pament" name="cust_mobile" type="number" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label  class="control-label mb-1">Customer Address</label>
                                    <input id="cc-pament" name="cust_address" type="text" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label  class="control-label mb-1">Customer Email</label>
                                    <input id="cc-pament" name="cust_email" type="email" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label  class="control-label mb-1">Customer Password</label>
                                    <input id="cc-pament" name="cust_password" type="password" class="form-control" >
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
                                            <th>Customer Name</th>
                                            <th>Customer Mobile</th>
                                            <th>Customer Address</th>
                                            <th>Customer Email</th>
                                            
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     
                                        <?php
                                        $query="select * from Customers";
                                        $result= mysqli_query($conn,$query);
                                        while( $row= mysqli_fetch_assoc($result)){
                                            echo "<tr>";
                                            echo "<td> {$row['cust_id']} </td>";
                                            echo "<td> {$row['cust_name']} </td>";
                                            echo "<td> {$row['cust_mobile']}</td>";
                                            echo "<td> {$row['cust_address']}</td>";
                                           echo "<td> {$row['cust_email']}</td>";
                                            echo "<td> <a href='edit_cust.php ?id={$row['cust_id']}'class='btn btn-warning'>Edit</a></td>";
                                            echo "<td><a href='delete_cust.php?id={$row['cust_id']}' class='btn btn-danger'>Delete</a></td>";
                                            echo "</tr>";
                                        }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <?php include ('includes/admin_footer.php')?>