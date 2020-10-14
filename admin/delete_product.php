<?php
// include("session_check.php");
include("../includes/db_conn.php");
if (empty($_GET)) {
    echo "Not requested";
  exit();
}
$id=$_GET['id'];

$product = mysqli_query($conn, "SELECT img FROM `products` WHERE `id`='$id'");
$fetch_image=mysqli_fetch_assoc($product);
$image=$fetch_image['img'];

$data = array();
$data['title'] = "Error";
$data['message'] = "An error occured, try again later : $image";
$data['type'] = "error";
$del = mysqli_query($conn, "DELETE FROM `products` WHERE `id`='$id'");

 $image = trim($image);
	
if($del)   
{
    $file_delete =  file_exists("../uploads/".$image) ?  unlink("../uploads/".$image) : false;
    $data['title'] = "Success";
    $data['message'] = "Product deleted successfully";
    $data['type'] = "success";
 
}
    echo json_encode($data);
?>