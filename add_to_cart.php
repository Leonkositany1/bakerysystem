<?php

    session_start(); 
    require("includes/db_conn.php");
    $product_id = $_GET['id']; 
    
    // $sql = "SELECT  * FROM users;";
   $sql = "SELECT  * FROM order_items WHERE is_paid = 0 AND product_id = $product_id;";
 
    $result = $conn->query($sql);
    $row1 = $result->fetch_array(MYSQLI_ASSOC);
    
    $count = is_array($row1) ?  count($row1) : 0;
 
    $sql = "SELECT  * FROM orders WHERE is_paid=0 LIMIT 1;";
    $result = $conn->query($sql);
    $row2 = $result->fetch_array(MYSQLI_ASSOC);   
    $count2 = is_array($row2) ?  count($row2) : 0;

    $is_in_cart = false;
    $cart_id  = 0;  
 
   $sql = '';
   if($count2 > 0   ){
     
     $cart_id = $row2['id'];
    
      if($count > 0){
       
        $order_item_id = $row1['id'];
        $sql .= "UPDATE `order_items` SET `qty`  = `qty` + 1  WHERE `id`=$order_item_id;";

      }else{

        $sql .= "INSERT INTO `order_items`(`cart_id`,`product_name`, `product_id`, `price`, `qty`) SELECT '$cart_id',`name`,`id`,`price`, 1 FROM products WHERE `id`='$product_id';";

      }

   }else{

    $sql .= "INSERT INTO `order_items`(`product_name`, `product_id`, `price`, `qty`) SELECT `name`,`id`,`price`,1 FROM products WHERE `id`='$product_id';";

   }

   if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
    

    $result->free_result();
    $conn->close();

?>