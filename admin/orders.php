<?php 
include("session_check.php");
include("../includes/db_conn.php");

if (isset($_GET['pid'])) {
  $id = $_GET['pid'];
  $status = $_GET['pay_status'];
  $sql = "UPDATE orders SET is_paid = '$status' WHERE `id`='$id';";

  if ($conn->query($sql) === TRUE) {
    echo json_encode(['msg'=>'Updated','status'=> true]);
    $sql = "UPDATE order_items SET is_paid = '$status' WHERE `cart_id`='$id';";
    if ($conn->query($sql) === TRUE) {

    }
  } else {
    echo json_encode(['msg'=>'Failed To Update Payment '. $conn->error,'status'=>false]);   
  }
 
 exit(0);
}
if (isset($_GET['oid'])) {
  $cart = $_GET['oid'];
  
  $sql = "SELECT * FROM order_items WHERE cart_id = '$cart';";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {   
  $num = 1;   
  $total_cost = 0 ;                           
  while($row = $result->fetch_assoc()) {
      ?>
          <tr>
          <td><?php echo $num; ?></td>&nbsp;
          <td><?php echo $row["product_name"]; ?></td>&nbsp;
          <td><?php echo $row["price"]; ?></td>&nbsp;
          <td><?php echo $row["qty"]; ?></td>&nbsp;
          <td><?php $tc = $row["qty"] * $row["price"] ; echo $tc; ?></td>&nbsp;
          </tr>
      <?php
      
      $num++;
  }

   
  } else {
  // echo "0 results";
  }
  //$conn->close();
  exit(0);

}
// $orders = mysqli_query($conn, "SELECT products.name, products.price, products.created_at FROM products INNER JOIN orders ON orders.order_id=products.id");
$orders = mysqli_query($conn, "SELECT orders.*,SUM(order_items.price * order_items.qty) as tot  FROM `orders` INNER JOIN order_items ON order_items.cart_id = orders.id GROUP BY orders.id;"); 

?>
  <?php require('head.php');?>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">

              <h3 class="mb-0">Orders</h3>
            </div>
            <!-- Light table -->
            <div class="row">
              <div class="table-responsive col-md-8">
                <table id="orders" class="table">
                  <thead>
                    <tr>
                      <th scope="col" class="sort" data-sort="name">Name</th>                     
                      <th scope="col" class="sort" data-sort="name">Location</th>
                      <th scope="col" class="sort" data-sort="name">Phone</th>
                      <th scope="col" class="sort" data-sort="name">Price</th>
                      <th scope="col" class="sort" data-sort="name">Status</th>                      
                      <th scope="col" class="sort" data-sort="name">Show Items</th>
                    </tr>
                  </thead>
                  <tbody>                
                  <?php while($order=mysqli_fetch_assoc($orders)){ ?>
                    <tr>
                      <td><?php echo $order['name'] ?></td>                    
                      <td><?php echo $order['location'] ?></td>
                      <td>0<?php echo $order['phone'] ?></td>
                      <td><?php echo 'Kes. '.$order['tot'] ?></td>
                      <td><span class="pay_status<?php echo $order['id'];?>" id="<?php echo $order['is_paid'];?>"><?php  $msg = $order['is_paid'] == 0  ?   'Not Paid' :  'Paid'; echo $msg; ?></span> <button class="btn btn-primary btn-sm paybtn" id="<?php echo $order['id'];?>"> <?php  $btn = $order['is_paid'] == 0  ?   'Pay' :  'Reject Pay'?> <?php  echo $btn; ?></button></td>
                      <td  ><button id="<?php echo $order['id'] ?>"  class="btn btn-primary btn-sm showItems" >Show</button></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <div class="col-md-4 ">
                    <table style="border:1">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Item Name</th>
                          <th>Price</th>
                          <th>Qty</th>
                          <th>Cost</th>
                        </tr>
                      </thead>
                      <tbody class="content">
                                             
                      </tbody>
                    </table>
              </div>

            </div>            
          </div>
        </div>
      </div>

 
 
<!-- Modal -->
 
      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <br>
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <?php require('scripts.php');?> 
  <script>
    $(document).ready(function() {
      $('#orders').DataTable();
  } );

 
    $('.paybtn').on('click', function(){
 
      let id = this.id;
        let status_id = $(".pay_status"+id).attr('id');
       
        let status = status_id  == 0 ? 1 : 0;

      $.get("orders.php?pid="+ this.id + "&pay_status="+ status, function(data ) {

        let final_status = status_id == 0 ? 'Paid' : 'Not Paid' ;
        window.location.reload();        
        showToast("success", "Payment Updated Succesfully");
      });
    });


    $('.showItems').on('click', function(){    
 
     $.get( "orders.php?oid="+ this.id, function( data ) {
       $( ".content" ).html( data );
        
     });
   });
  </script>
</body>

</html>