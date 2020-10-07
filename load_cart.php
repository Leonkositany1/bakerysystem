<?php
    require("includes/session_check.php");   
    require("includes/db_conn.php");     
    $user = $_SESSION['baker_login'];

    $sql = "SELECT  * FROM order_items WHERE is_paid = 0 AND user_email = '$user';";  
  
    $json = array();  
    $result = $conn->query($sql);
    if ($result->num_rows > 0) { 
        while($row = $result->fetch_assoc()) {
            $json['items'][]=$row;
        }
    } else {
        $json['items'] = 0;
    }
    
    $conn->close();

    echo  json_encode($json);
 
?>