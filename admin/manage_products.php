<?php


include ('includes/connection.php');

if(isset($_POST['submit'])){
    $pro_name=$_POST['pro_name'];
    $pro_desc=$_POST['pro_desc'];
    $pro_image=$_POST['pro_image'];
    $pro_price=$_POST['pro_price'];

    $query ="insert into    products (pro_name,pro_desc,pro_image,pro_price,cat_id) values(' $pro_name',   ' $pro_desc', ' $pro_image','$pro_price' 'select id from categories where ')";



    mysqli_query($conn,$query);

}



include('includes/admin_header.php');?>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">Manage Products</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Create Products</h3>
                            </div>
                            <hr>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label  class="control-label mb-1">Product Name</label>
                                    <input id="cc-pament" name="pro_name" type="text" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label  class="control-label mb-1">Product Description</label>
                                    <input id="cc-pament" name="pro_desc" type="text" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label  class="control-label mb-1">Product Image</label>
                                    <input id="cc-pament" name="pro_image" type="file" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label  class="control-label mb-1">Product Price</label>
                                    <input id="cc-pament" name="pro_price" type="text" class="form-control" >
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
                                            <th>Product Name</th>
                                            <th>Product Description</th>
                                            <th>Product Image</th>
                                            <th>Product Price</th>

                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                       
                                        <?php
                                        $query="select * from products ";
                                        $result= mysqli_query($conn,$query);
                                        while( $row= mysqli_fetch_assoc($result)){
                                            echo "<tr>";
                                            echo "<td> {$row['pro_id']} </td>";
                                            echo "<td> {$row['pro_name']} </td>";
                                              echo "<td> {$row['pro_desc']} </td>";
                                             echo "<td> {$row['pro_image']} </td>";
                                         echo "<td> {$row['pro_price']} </td>";
                                            echo "<td> <a href='edit_pro.php ?id={$row['pro_id']}'class='btn btn-warning'>Edit</a></td>";
                                            echo "<td><a href='delete_pro.php?id={$row['pro_id']}' class='btn btn-danger'>Delete</a></td>";
                                            echo "</tr>";
                                        }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <?php include ('includes/admin_footer.php')?>