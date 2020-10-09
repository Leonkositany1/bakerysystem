<?php 

include("session_check.php");
include("../includes/db_conn.php");

$products = mysqli_query($conn, "select * from products");

?>
   <?php require('head.php');?>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
            <div class="row">
              <div class="col-md-6">
                <h3 class="mb-0">Products</h3>
              </div>
              <div class="col-md-6">
                <a href="add_product.php" class="float-right" role="button"><i class="fas fa-plus"></i>ADD PRODUCT</a>
              </div>
            </div>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
            <table id="products" class="table table-bordered" style="width:100%">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="no">#</th>
                    <th scope="col" class="sort" data-sort="name">Product Name</th>
                    <th scope="col" class="sort" data-sort="budget">Price</th>
                    <th scope="col" class="sort" data-sort="status">Action</th>
                  </tr>
                </thead>
                <tbody class="list">
                <?php $num = 1; while($product=mysqli_fetch_assoc($products)){ ?>
                  <tr>
                    <td><?php echo $num; ?></td>
                    <td><?php echo $product['name'] ?></td>
                    <td>Ksh. <?php echo $product['price'] ?></td>
                    <td>
                      <a href="editproduct.php?id=<?php echo $product['id'] ?>"><i class="far fa-edit" ></i></a>
                      <a  href="#" onclick="deleteProduct('<?php echo $product['id'] ?>')"><i class="fas fa-trash-alt" ></i></a>
                    </td>
                  </tr>
                  <?php $num++;} ?>
                </tbody>
              </table>
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
   <?php require('scripts.php');?>
  <script>
    $(document).ready(function() {
      $('#products').DataTable();
  } );
  </script>
  <script>
  function deleteProduct(id){
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          type: "POST",
          url: "delete_product.php",
          data:'id='+ id,
          success: function(data){
              var messageTitle = data.title;
                var messageAlert = data.type;
                  var messageText = data.message;

                  if (messageAlert!=="error") {
                    swal(
                  messageTitle,
                  messageText,
                  messageAlert
                ).then(function () {
                  window.location.reload(true);
              });

                  }else{
                    swal(
                      messageTitle,
                      messageText,
                      messageAlert
                    );

                  }
          },
          error: function(jqXHR, exception) { 
            swal("Oops", "We couldn't connect to the server!", "error");
					}
        });
        // Swal.fire(
        //   'Deleted!',
        //   'Your file has been deleted.',
        //   'success'
        // )
      }
    })
  }
  </script>
</body>

</html>
