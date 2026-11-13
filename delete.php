<?php

require_once "config.php";

if(!isset($_SESSION['userid']) && !isset($_SESSION['username']) && !isset($_SESSION['role'])) {
    header('location: index.php');
}


$productid = $_GET['productid'];

$deleteproduct = mysqli_query($conn, "DELETE FROM products WHERE id = '$productid'");

if($deleteproduct) {
    echo"

    <script>
    alert('Product is Deleted!');

     window.location.href='products.php';

     </script>

    ";
}
else {
    echo"
    <script>
    alert('Something Went Wrong');

     window.location.href='products.php';

     </script>

    ";
}
?>