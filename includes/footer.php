 

			<!-- <button id="minus_btn">Minus</button> -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Your Cart</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				<table class="table table-bordered">
					<thead>
						<tr>
						<th scope="col">#</th>
						<th scope="col">Name</th>
						<th scope="col">Rate</th>
						<th scope="col">Quatinty</th>
						<th>Cost</th>
						<th><a onclick="masterUpdate('minusall')"><i class="fas fa-minus text-danger"></i></a></th>
						<th><a onclick="masterUpdate('addall')"><i class="fas fa-plus text-success"></i></a></th>
						<th><a onclick="masterUpdate('deleteall')"><i class="fas fa-trash text-danger"></i></a></th>

						</tr>
					</thead>
					<tbody id="cart_items">	 
						 
					</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>					 
				</div>
				</div>
			</div>
			</div>	
    <footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-5 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>About Us</h6>
								<p>
									If you own an Iphone, you’ve probably already worked out how much fun it is to use it to watch movies-it has that.
								</p>							
							</div>
						</div>
						<div class="col-lg-5  col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>Newsletter</h6>
								<p>Stay update with our latest</p>
								<div class="" id="mc_embed_signup">
									<form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">
										<input class="form-control" name="EMAIL" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'" required="" type="email">
			                            	<button class="click-btn"><i class="lnr lnr-arrow-right" aria-hidden="true"></i></button>
			                            	<div style="position: absolute; left: -5000px;">
												<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
											</div>
										<div class="info"></div>
									</form>
								</div>
							</div>
						</div>						
						<div class="col-lg-2 col-md-6 col-sm-6 social-widget">
							<div class="single-footer-widget">
								<h6>Follow Us</h6>
								<p>Let us be social</p>
								<div class="footer-social d-flex align-items-center">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-dribbble"></i></a>
									<a href="#"><i class="fa fa-behance"></i></a>
								</div>
							</div>
						</div>	
						<div class="col-lg-12">
							<p class="footer-text"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>								
						</div>													
					</div>
				</div>
			</footer>	
			<!-- End footer Area -->	
			<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.js" integrity="sha512-nqIFZC8560+CqHgXKez61MI0f9XSTKLkm0zFVm/99Wt0jSTZ7yeeYwbzyl0SGn/s8Mulbdw+ScCG41hmO2+FKw==" crossorigin="anonymous"></script>									
			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>	
 			<script src="js/jquery-ui.js"></script>			
			<script src="js/owl.carousel.min.js"></script>						
			<script src="js/jquery.nice-select.min.js"></script>							
			<script src="js/mail-script.js"></script>	
			<script src="js/main.js"></script>
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
			<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>	
			<script>


			 addToCart = (product_id,prod_name) => { 
					axios.get('add_to_cart.php?id='+ product_id + '&name='+ prod_name)
						.then((response) => {
							showCart();
							showToast(response.data.status, response.data.msg);
					 
						});

				 }

				 updateCart = (action,id) => { 
					axios.get('manage_cart.php?item_id='+ id + '&action='+ action)
						.then((response) => {
							 
							showCart();
							showToast(response.data.status, response.data.msg);
					 
						});

				 }

			showCart = () => {
				let container = document.getElementById('cart_items');
				container.innerHTML = '';
				axios.get('load_cart.php?get=1')
						.then((response) => {
							console.log(response.data);
							if(response.data.items  !=0){
								let data = response.data.items;
								let count  = data.length;
								let item ='';
								 let total_amount = 0;
								for (let i = 0; i < count; i++) {
									let element = data[i];	
									let c = i +1;		
									total_amount += (element.price * element.qty);					 
									    item += '<tr>';
										item += '<td>'+ c + '</td>';
										item += '<td>'+ element.product_name + '</td>';
										item += '<td>'+ element.price + '</td>';
										item += '<td>'+ element.qty + '</td>';
										item += '<td>'+ element.price * element.qty + '</td>';

										item += '<td><a onclick="minus('+ element.id +')"><i class="fas fa-minus text-danger"></i></a></td>'; 
										item += '<td><a onclick="add('+ element.id +')"><i class="fas fa-plus text-success"></i></a></td>';
										item += '<td><a onclick="deletei('+ element.id +')"><i class="fas fa-trash text-danger"></i></a></td>';
										item += '</tr>';	
								}
								 item += '<td colspan="8" class="text-right"><b>Kes: '+ total_amount+'</b></td></tr>'
								container.innerHTML = item;

							}
							//showToast(response.data.status, response.data.msg);
					 
				});
			} 

			$(function(){
				showCart();			 
			});

			masterUpdate = (action) =>{				 
				updateCart(action,'0');
			}
			add = (id) =>{
				updateCart('add',id);
			}

			minus = (id) =>{
				updateCart('minus',id);
			}

			deletei = (id) =>{
				updateCart('delete',id);
			}	 

			showToast = (status,msg) => { 
				Command: toastr[status](msg)
					toastr.options = {
					"closeButton": false,
					"debug": false,
					"newestOnTop": false,
					"progressBar": false,
					"positionClass": "toast-top-right",
					"preventDuplicates": false,
					"onclick": null,
					"showDuration": "300",
					"hideDuration": "1000",
					"timeOut": "5000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
					}
				 }
			</script>				
		</body>
	</html>