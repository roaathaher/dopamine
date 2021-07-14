<?php
include ('includes/connection.php');

if(isset($_POST['submit'])){
    $pro_name=$_POST['pro_name'];
    $pro_desc=$_POST['pro_desc'];
    $pro_image=$_POST['pro_image'];
    $pro_price=$_POST['pro_price'];

	$query ="update products set pro_name= '$pro_name',pro_desc=' $pro_desc',pro_image=' $pro_image' , pro_price=' $pro_price'";



	mysqli_query($conn,$query);
	 header("location:manage_products.php");

}

$query="select * from product where pro_id={$_GET['id']}";
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
                        <div class="card-header">Manage Products</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Create Products</h3>
                            </div>
                            <hr>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label  class="control-label mb-1">Product Name</label>
                                    <input id="cc-pament" name="pro_name" type="text" class="form-control" value="<?php  echo $row['pro_name']?>"  >
                                </div>
                                <div class="form-group">
                                    <label  class="control-label mb-1">Product Description</label>
                                    <input id="cc-pament" name="pro_desc" type="text" class="form-control" value="<?php  echo $row['pro_desc']?>" >
                                </div>
                                <div class="form-group">
                                    <label  class="control-label mb-1">Product Image</label>
                                    <input id="cc-pament" name="pro_image" type="file" class="form-control"  value="<?php  echo $row['pro_image']?>" >
                                </div>
                                <div class="form-group">
                                    <label  class="control-label mb-1">Product Price</label>
                                    <input id="cc-pament" name="pro_price" type="number" class="form-control"  value="<?php  echo $row['pro_price']?>" >
                                </div>


                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block" name="submit">

                                    <span id="payment-button-amount">Save</span>
                                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                                </button>
                            </div>
                        </form>
                    </div>
					<?php include ('includes/admin_footer.php')?>