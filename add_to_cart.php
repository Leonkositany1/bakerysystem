<?php
 
    require("includes/session_check.php");   
    require("includes/db_conn.php");
    $product_id = $_GET['id']; 
    $user = $_SESSION['baker_login'];
    // $sql = "SELECT  * FROM users;";
    $sql = "SELECT  * FROM order_items WHERE is_paid = 0 AND product_id = $product_id AND user_email = '$user';";
    
    $result = $conn->query($sql);
    $row1 = $result->fetch_array(MYSQLI_ASSOC);
    
    
    $count = is_array($row1) ?  count($row1) : 0;
 
    $sql = "SELECT  * FROM orders WHERE is_paid=0  AND user_email = '$user' LIMIT 1;";
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

        $sql .= "INSERT INTO `order_items`(`user_email`,`cart_id`,`product_name`, `product_id`, `price`, `qty`) SELECT '$user','$cart_id',`name`,`id`,`price`, 1 FROM products WHERE `id`='$product_id';";

      }

   }else{

    if($count > 0){
       
      $order_item_id = $row1['id'];
      $sql .= "UPDATE `order_items` SET `qty`  = `qty` + 1  WHERE `id`=$order_item_id;";

    }else{

      $sql .= "INSERT INTO `order_items`(`user_email`,`product_name`, `product_id`, `price`, `qty`) SELECT '$user',`name`,`id`,`price`,1 FROM products WHERE `id`='$product_id';";

    }    

   }

    if ($conn->query($sql) === TRUE) {
      echo  json_encode(['msg'=>'Product added to cart successfully','status'=> 'success']);
    } else {
      echo  json_encode(['msg'=>'Error adding product to cart','status'=> 'error']);
    
    }
    

    $result->free_result();
    $conn->close();

?>