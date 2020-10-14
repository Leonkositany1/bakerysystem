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
                  <tr id="<?php echo $product['id'] ?>">
                    <td><?php echo $num; ?></td>
                    <td><?php echo $product['name'] ?></td>
                    <td>Ksh. <?php echo $product['price'] ?></td>
                    <td>
                      <a href="editproduct.php?id=<?php echo $product['id'] ?>" class="btn btn-primary btn-sm"><i class="far fa-edit" ></i>Edit</a>
                      <a  href="#" onclick="deleteProduct('<?php echo $product['id'] ?>')" class="btn btn-danger btn-sm del"><i class="fas fa-trash-alt" ></i>Delete</a>
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
   
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>	
  <script>
    $(document).ready(function() {
      $('#products').DataTable();
  } );
  </script>
  <script>

  function deleteProduct(id){   

    if (confirm('Are you sure you want to delete ? ')) {     
      
        $.ajax({
          type: "GET",
          url: "delete_product.php",
          data:'id='+ id,
          success: function(data){
              var messageTitle = data.title;
              var messageAlert = data.type;
              var messageText = data.message;     
              showToast("success","Product Deleted Succesfully");
               $("#"+ id.trim()).remove();
          },
          error: function(jqXHR, exception) { 
            
             showToast("error","Error Deleting Product");
					}
        });
 
      }
 
   }
   
  
  </script>
</body>

</html>
