<?php
//This code checks if the product is added to cart. 
function check_if_qty($item_id) {
    
    $user_id = $_SESSION['user_id']; 
    require("common.php");
   
    $query = "SELECT qty FROM products WHERE id='$item_id' ";
    $result = mysqli_query($con, $query);
    $row = $result->fetch_assoc();
    $qtyy = (int) $row['qty'];

    if (($qtyy) >= 1) {
        return 1;
    } else {
        return 0;
    }
}

?>