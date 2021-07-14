<?php 



include ('includes/connection.php');

if(isset($_POST['submit'])){
    $cat_name=$_POST['cat_name'];
   $cat_image=$_POST['cat_image'];


$query ="insert into  categories (cat_name,cat_image) values('$cat_name', '$cat_image')";



mysqli_query($conn,$query);

}







include('includes/admin_header.php');
?>

 <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Manage Categories</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Create Categories</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label  class="control-label mb-1">Category Name</label>
                                                <input id="cc-pament" name="cat_name" type="text" class="form-control" >
                                            </div>
                                             <div class="form-group">
                                                <label  class="control-label mb-1">category Image</label>
                                                <input id="cc-pament" name="cat_image" type="file" class="form-control" >
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
                                                <th>Category Name</th>
                                                <th>Category Image</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                        <?php
                                        $query="select * from categories";
                                        $result= mysqli_query($conn,$query);
                                

                                        while( $row= mysqli_fetch_assoc($result)){
                                            echo "<tr>";
                                              echo "<td> {$row['cat_id']} </td>";
                                            echo "<td> {$row['cat_name']} </td>";
                                            echo "<td> {$row['cat_image']} </td>";
                                         
                                                echo "<td> <a href='edit_cat.php ?id={$row['cat_id']}'class='btn btn-warning'>Edit</a></td>";
                                                    echo "<td><a href='delete_cat.php?id={$row['cat_id']}' class='btn btn-danger'>Delete</a></td>";
                                            echo "</tr>";
                                        }

                                        ?>

                                        </tbody>
                                    </table>
                                </div>
                                              </div>
                                                    </div>

<?php include ('includes/admin_footer.php')?>