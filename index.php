			<?php require('includes/header.php'); ?>
			<!-- start banner Area -->
			<section class="banner-area relative" id="home">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row fullscreen d-flex justify-content-center align-items-center">
						<div class="banner-content col-lg-10 col-md-12 justify-content-center">
							<h6 class="text-uppercase">Whenever we bake, we bake with our heart</h6>
							<h1>
								Love with baking items			
							</h1>
							<p class="text-white mx-auto">
								Since we started baking,we have gotten a commited clientel,and our products have found a stedy supply chain
							<a href="#" class="primary-btn squire text-uppercase mt-10">Check Our Menu</a>
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->	 
		

			<!-- Start item-category Area -->
			<section class="item-category-area section-gap">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="col-md-12 pb-80 header-text text-center">
							<h1 class="pb-10">Category of available items</h1>
							<p>
								We are baking,grilling and cooking experts in our own rights
							</p>
						</div>
					</div>								
					<div class="row">
						<?php  
						$sql = "SELECT * FROM products;";
						$result = mysqli_query($conn, $sql);
						
							if (mysqli_num_rows($result) > 0) {
							// output data of each row
								while($row = mysqli_fetch_assoc($result)) {
									?>
									<div class="col-lg-3 col-md-6">
									<div class="single-cat-item">
										<div class="thumb" style="width:200px;height:200px;">
											<img class="img-fluid" src="uploads/<?php $name = $row["img"]; echo $name; ?>" alt="" width="200" height="200">
										</div>	
										 <h4><?php $name = $row["name"]; echo $name; ?></h4>
										 <p><?php echo 'Kes '. $row["price"];  ?></p>

										  <button onclick="addToCart(this.id,'<?php echo $name; ?>')" id="<?php echo $row["id"];  ?>" class="btn btn-primary"  >Add to Cart <i class="fas fa-cart-plus"></i></button>
										<!-- <p>
											inappropriate behavior is often laughed off as “boys will be.
										</p> -->
									</div>
								</div>
								<?php
									// echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
								}
							} else {
							// echo "0 results";
							}
						
						mysqli_close($conn);
						?>	 																		
					 
					</div>
				</div>	
			</section>
			<!-- End item-category Area -->

			<!-- Start about-video Area -->
			<section class="about-video-area section-gap">
				<div class="container">			
					<div class="row align-items-center">
						<div class="col-lg-6 about-video-left">
							<h6 class="text-uppercase">Brand new app to blow your mind</h6>
							<h1>
								We’ve made a life <br>
								that will change you 
							</h1>
							<p>
								<span>We are here to listen from your delivery experience
							</span>
							</p>
							<p>
								Here at eatery Bakes we are commited to quality food delivery and baking for the full satisfaction of our clientell
							</p>
							<a class="primary-btn" href="#">Get Started Now</a>
						</div>
						<div class="col-lg-6 about-video-right justify-content-center align-items-center d-flex">
							<a class="play-btn" href="https://www.youtube.com/watch?v=ARA0AxrnHdM"><img class="img-fluid mx-auto" src="img/play.png" alt=""></a>
						</div>
					</div>
				</div>	
			</section>
			<!-- End about-video Area -->			

		

			<?php  require('includes/footer.php') ?>

			
		