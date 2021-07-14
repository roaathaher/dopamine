<?php include('includes/connection.php');


$query= " delete from  products where pro_id = {$_GET['id']}";
 
mysqli_query($conn,$query);


 header("location:manage_products.php");


?>