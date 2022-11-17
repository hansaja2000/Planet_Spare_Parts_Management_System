<?php
require("includes/common.php");
session_start();
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $item_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];
    $query = "INSERT INTO users_products(user_id, item_id, status) VALUES('$user_id', '$item_id', 'Added to cart')";

    
    $query1 = "SELECT qty FROM products WHERE id='$item_id' ";
    $result1 = mysqli_query($con, $query1);
    $row = $result1->fetch_assoc();
    $qtyy = (int) $row['qty'];
    $x = 1; 
    $qtyy = $qtyy - 1;

    $sqli = "UPDATE products SET qty = '$qtyy' WHERE id = '$item_id' ";
    mysqli_query($con, $sqli);

    mysqli_query($con, $query) or die(mysqli_error($con));
    header('location: products.php');
}
?>   