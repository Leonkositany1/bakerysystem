<?php
session_start();
if (isset($_GET["product_id"]) && $_POST["product_id"] != "" ) {
        require("includes/db_conn.php");

        $sql = "SELECT  * FROM orders WHERE is_paid=0;";
        $result = $conn->query($sql);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $count = count($row);
        
        if ($count > 0) {  
          $cart_id = $row['id'];
          $product_id = $row['product_id'];
        
          $sql = "INSERT INTO `order_items`(`cart_id`,`product_name`, `product_id`, `price`, `qty`) SELECT '$cart_id',`name`,`id`,`price`,0 FROM products WHERE `id`='$product_id'";

     
        } else {
        
        }
            // Free result set
        $result->free_result();
        $mysqli -> close();
}
?>