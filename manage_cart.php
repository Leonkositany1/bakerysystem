<?php

require("includes/session_check.php");   
require("includes/db_conn.php");     
$user = $_SESSION['baker_login'];
$sql = '';
$action = $_GET['action'];

$id = $_GET['item_id'];
switch ($action) {
    case 'delete':
        $sql  = "DELETE from order_items WHERE id = $id;";
        break;
    case 'minus':
            $sql  = "UPDATE order_items SET qty = qty -1  WHERE id = $id AND qty > 1;";
        break;
    case 'add':
        $sql  = "UPDATE order_items SET qty = qty + 1  WHERE id = $id ;";
        break;
    case 'deleteall':
        $sql  = "DELETE from order_items WHERE user_email = '$user' AND is_paid = 0;";
        break;
    case 'minusall':
            $sql  = "UPDATE order_items SET qty = qty -1  WHERE is_paid = 0 AND user_email = '$user' AND qty > 1;";
        break;
    case 'addall':
        $sql  = "UPDATE order_items SET qty = qty + 1  WHERE is_paid = 0 AND user_email = '$user';";
        break;    
                        
    default:
        # code...
        break;
}

if ($conn->query($sql) === TRUE) {
    echo  json_encode(['msg'=>'Product updated successfully','status'=> 'success']);
  } else {
    echo  json_encode(['msg'=>'Error updating product to cart','status'=> 'error']);    
}
?>