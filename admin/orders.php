<?php 
include("session_check.php");
include("../includes/db_conn.php");

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
                      <td><?php $msg = $order['is_paid'] == 0  ?   'Not Paid' :  'Paid'; echo $msg; ?></td>
                      <td  ><button id="<?php echo $order['id'] ?>" class="btn btn-primary btn-sm showItems">Show</button></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <div class="col-md-4">
                    <ol>
                      <li>1</li>
                    </ol>
              </div>

            </div>            
          </div>
        </div>
      </div>
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


    $('.showItems').on('click', function(){
     
      alert(this.id);
      // $.get( "ajax/test.html", function( data ) {
      //   $( ".result" ).html( data );
      //   alert( "Load was performed." );
      // });
    })
  </script>
</body>

</html>