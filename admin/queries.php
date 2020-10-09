<?php 
include("session_check.php");
include("../includes/db_conn.php");

$Queries = mysqli_query($conn, "select * from Queries");

?>
  <?php require('head.php');?>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">

              <h3 class="mb-0">Queries</h3>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table id="queries" class="display container table" style="width:100%">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="no">#</th>
                    <th scope="col" class="sort" data-sort="name">Name</th>
                    <th scope="col" class="sort" data-sort="budget">Phone</th>
                    <th scope="col" class="sort" data-sort="status">Time</th>
                    <th scope="col" class="sort" data-sort="status">Message</th>
                  </tr>
                </thead>
                <tbody class="list">
                <?php $num = 1; while($contact=mysqli_fetch_assoc($Queries)){ ?>
                  <tr>
                    <td><?php echo $num; ?></td>
                    <td><?php echo $contact['name'] ?></td>
                    <td>+254 <?php echo $contact['phone'] ?></td>
                    <td> <?php echo date("M dS Y |  H:i", strtotime( $contact['time']));; ?></td>
                    <td><?php echo $contact['message'] ?></td>
                  </tr>
                  <?php  $num++;}  ?>
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
      $('#queries').DataTable();
  } );
  </script>
</body>

</html>