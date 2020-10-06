<?php  

require('includes/header.php'); 
require("includes/db_conn.php"); 
$user = $_SESSION['baker_login'];

$sql = "SELECT * FROM order_items WHERE is_paid = 0 AND user_email = '$user';";
$result = $conn->query($sql);


?>
			<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Check Out				
							</h1>	
							<p class="text-white link-nav"><a href="index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="about.php"> About Us</a></p>
						</div>	
					</div>
				</div>
			</section> 
			<section class="home-about-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-9">
                        <table class="table table-borderless">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total Cost</th>
                                </tr>
                            </thead>
                            <tbody>

                              <?php          
   
                              if ($result->num_rows > 0) {   
                                  $num = 1;   
                                  $total_cost = 0 ;                           
                                while($row = $result->fetch_assoc()) {
                                    ?>
                                        <tr>
                                        <td><?php echo $num; ?></td>
                                        <td><?php echo $row["product_name"]; ?></td>
                                        <td><?php echo $row["price"]; ?></td>
                                        <td><?php echo $row["qty"]; ?></td>
                                        <td><?php $tc = $row["qty"] * $row["price"] ; echo $tc; ?></td>
                                        </tr>
                                    <?php
                                    $total_cost +=$tc; 
                                }
                               
                                echo '<tr><td></td><td></td><td></td><td></td> <b><td>Kes : '.$total_cost.'</td> </b> </tr>';
                              } else {
                                // echo "0 results";
                              }
                              $conn->close();
                              ?>

                                
                                </tbody>
                            </table>

                            <form>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                   
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div> 
                                <button type="submit" class="btn btn-primary">Confirm Order</button>
                            </form>
                           
						</div>
					</div>
				</div>	
				<img class="about-img" src="img/about-img.png" alt="">
			</section>
 
			<!-- Start review Area -->
		 
			<!-- End about-video Area -->							
		 <?php  require('includes/footer.php'); ?>