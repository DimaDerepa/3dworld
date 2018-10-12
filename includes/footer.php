<footer>
			<!-- DISCOUNTS CONTAINER -->
	<div class="grey_gradient py-5">
		<div class="container">
			<h2 class="mb-5">Discounts of the week</h2>
			<div class="row ">
				<? # SCRIPT FOR GETTING DISCOUNT PRODUCTS 
				$products = mysqli_query($connection, "SELECT * FROM  products WHERE Discounts='1' ORDER BY Id DESC limit 4 ");
				while ( $prod = mysqli_fetch_assoc($products) )
				{?>
					<div class="col-6 col-md-6 col-lg-3 offer">
						<div class="product flex_column">
							<div class="product_hover grey_gradient">
								<div  class="count">
									<form method="POST"  action="/includes/function.php" class="buy_product">
										<input type="text" style="display:none;" name="id_product" value="<?echo $prod['Id'];?>">
										<input  class="count_products" type="number"  min="1" max="6" value="1" name="count_products">
										<input  type="submit" class="btn-hover add color-9"  name="add" value="Add to cart" >
								 	</form>
								</div>
								<div class="buttons">
									<a  href="/product.php?Id=<?echo $prod['Id'];?>">
										<button class="btn-hover color-9">More</button>
									</a>
								</div>
							</div>

							<div class="product_unhover flex_column">
								<div class="photo_wrapper">
									<img class="product_photo" src="products/<?echo $prod['Main_photo'];?>">
								</div>
								<h5 class="mb-2"><?echo mb_substr($prod['Name'], 0, 46, 'utf-8');?>...</h5>
							 	<h4 class="price_text"><?echo $prod['Price'];?>$</h4>
							</div>	
						</div>
					</div>
				<?}?>
			</div>
		</div>
	</div>

			<!-- FRESH + SPECIALS + RECOMENDATION + BRANDS CONTAINER -->	
	<div class="container">
			<!-- FRESH + SPECIALS + RECOMENDATION ROW -->	
		<div class="row">
			<!-- FRESH CASE -->	
			<div class="col-4"> 
				<h3 class="mt-5 mb-4">Fresh products</h3>
				<!-- SCRIPT FOR GETTING FRESH PRODUCTS -->
				<? $freshproducts = mysqli_query($connection, "SELECT * FROM  products ORDER BY Id DESC limit 3 ");
				while ( $fresh = mysqli_fetch_assoc($freshproducts) )
				{?>
					<div class="product_mini">
						<a href="/product.php?Id=<?echo $fresh['Id'];?>">
							<img class="product_mini_photo" src="/products/<?echo $fresh['Main_photo'];?>">
						</a>
						<div style="width:9vw;">
							<a href="/product.php?Id=<?echo $fresh['Id'];?>">
								<h6><?echo $fresh['Name'];?></h6>
							</a>
						</div>
						<a href="/product.php?Id=<?echo $fresh['Id'];?>">
							<h6><b><?echo $fresh['Price'];?>$</b></h6>
						</a>
					</div>
				<?}?>
			</div>
			<!-- SPECIALS CASE -->
			<div class="col-4">
				<h3 class="mt-5 mb-4">Special offers</h3>
					<!-- SCRIPT FOR GETTING SPEACIAL OFFERS -->
				<? $offers = mysqli_query($connection, "SELECT * FROM  products WHERE Best_offer='1' ORDER BY Id limit 3 ");
				while ( $off = mysqli_fetch_assoc($offers) )
				{?>
					<div class="product_mini">
						<a href="/product.php?Id=<?echo $off['Id'];?>">
							<img class="product_mini_photo" src="/products/<?echo $off['Main_photo'];?>">
						</a>
						<div style="width:9vw;">
							<a href="/product.php?Id=<?echo $off['Id'];?>">
								<h6><?echo $off['Name'];?></h6>
							</a>
						</div>
						<a href="/product.php?Id=<?echo $off['Id'];?>">
							<h6><b><?echo $off['Price'];?>$</b></h6>
						</a>
					</div>
				<?}?>
			</div>	
			<!-- RECOMENDATION CASE -->
			<div class="col-4">
				<h3 class="mt-5 mb-4">Our recomendation</h3>
					<!-- SCRIPT FOR GETTING RECOMENDATION PRODUCTS -->
				<? $recomendation = mysqli_query($connection, "SELECT * FROM  products WHERE Recomendation='1' ORDER BY Id DESC limit 3 ");
				while ( $rec = mysqli_fetch_assoc($recomendation) )
				{?>
					<div class="product_mini">
						<a href="/product.php?Id=<?echo $rec['Id'];?>">
							<img class="product_mini_photo" src="/products/<?echo $rec['Main_photo'];?>">
						</a>
						<div style="width:9vw;">
							<a href="/product.php?Id=<?echo $rec['Id'];?>">
								<h6><?echo $rec['Name'];?></h6>
							</a>
						</div>
						<a href="/product.php?Id=<?echo $rec['Id'];?>">
							<h6><b><?echo $rec['Price'];?>$</b></h6>
						</a>
					</div>
				<?}?>

			</div>	
		</div>
		<!-- BRANDS CASE -->
		<h3 style="text-align: center;" class="mt-5">Our partners</h3>
		<hr>
			<div class="row wrapper_brands">
				<div class="col-2">
					<a href="https://www.fdmgroup.com/">
						<img class="brands" src="/formalization/fdm.JPG">
					</a>
				</div>
				<div class="col-2">
					<a href="https://www.czur.com/">
						<img class="brands" src="/formalization/czur.jpg">
					</a>
				</div>
				<div class="col-2">
					<a href="http://www.3dpanospace.com/">
						<img class="brands" src="/formalization/panospace.PNG">
					</a>
				</div>
				<div class="col-2">
					<a href="https://www.xyzprinting.com/ru-RU/home">
						<img class="brands" src="/formalization/XYZprinting.jpg">
					</a>
				</div>
				<div class="col-2">
					<a href="http://www.weistek.net/">
						<img class="brands" src="/formalization/weistek.jpg">
					</a>
				</div>
				<div class="col-2">
					<a href="http://www.weedo.ltd/">
						<img class="brands" src="/formalization/weedo.jpg">
					</a>
				</div>	
			</div>
	    <hr>
	</div>
	<!-- FOLLOW US CONTAINER  -->
	<div class="followus_wrapper grey_gradient">
		<h3 class="followus mx-auto">Follow us on instagram <a href="<? echo $config['instagram'];?>" class="header_link"><img class=" ml-2" src="/formalization/instagram (1).png" alt=""></a> </h3>
		<img class="folow_instagram" src="/formalization/folow_instagram.png" alt="">
	</div>
	<!-- FOOTER MENU CONTAINER -->
	<div class="container mt-5">
		<div class="row">
			<!-- FIRST COLUMN -->
			<div class="col-3 footer_column">
				<a href="3dworld.com">
					<img class="logo" src="/formalization/logo.png">
				</a>
				<div class="contacts mt-2">
					<img class="footer_icon" src="/formalization/placeholder.png" alt="">
					<? echo $config['adress']; ?>
				</div>
				<div class="contacts">
					<img class="footer_icon" src="/formalization/phone.png" alt="">
					<? echo $config['phone']; ?>
				</div>
				<div class="contacts">
					<img class="footer_icon" src="/formalization/email.png" alt="">
					<? echo $config['gmail']; ?>
				</div>
				<div class="contacts mt-4">
					<a href="<? echo $config['youtube']; ?>">
						<img class="social mr-3" src="/formalization/youtube.png" alt="">
					</a>
					<a href="<? echo $config['facebook']; ?>" >
						<img class="social mr-3" src="/formalization/facebook.png" alt="">
					</a>
					<a href="<? echo $config['instagram']; ?>">
						<img class="social mr-3" src="/formalization/instagram.png" alt="">
					</a>
					<a href="<? echo $config['twitter']; ?>" >
						<img class="social" src="/formalization/twitter.png" alt="">
					</a>
				</div>
			</div>
			<!-- SECOND COLUMN -->
			<div class="col-3 footer_column second flex_column">
				<h3>Categories:</h3>
				<a href="/categories.php">All products</a>
					<!-- SCRIPT FOR GETTING CATEGORIES -->
				<?$categories = mysqli_query($connection, "SELECT * FROM categories");
				while ( $cat = mysqli_fetch_assoc($categories) )
				{?>
					<a href=""><?echo $cat['Name'];?></a>
				<?}?>
			</div>			
			<!-- THIRD COLUMN -->		
			<div class="col-3 footer_column third flex_column">
				<h3>Custom care: </h3>
				<a href="about_us.php">About us</a>
				<a href="categories.php?Id=bo">Best offers</a>
				<a href="contacts.php">Contacts</a>
				<a href="payments.php">Payment politics</a>
				<a href="terms.php">Terms & Condition</a>
				<a href="complaints.php">Complaints & suggesstions</a>
			</div>
			<!-- FOURTH COLUMN -->
			<div class="col-3 footer_column four flex_column">
				<h3>Newslatter</h3>
				<h6>Give a discount of 7% for a subscription.</h6>
				<form method="POST" class="send_email">
					<input type="text" class="email_input" name="email" placeholder="Email">
					<button type="submit" class="btn-hover send color-9">Subscribe</button>
				</form>
					<!-- SCRIPT FOR SENDING MAIL -->
				<? $email=$_POST['email'];
				$result = mysqli_query($connection,"INSERT INTO emails (email) VALUES ('$email')");?>
	    
				<div>
					Using payments method:<br>
					<a href="https://www.mastercard.ua/uk-ua/about-mastercard/what-we-do/terms-of-use.html" >
						<img class="pay mr-3" src="/formalization/mastercard.png" alt="">
					</a>
					<a href="https://www.visa.com.ua/ru_UA/legal.html">
						<img class="pay mr-3" src="/formalization/visa.png" alt="">
					</a>
					<a href="https://publicpolicy.paypal-corp.com/" >
						<img class="pay" src="/formalization/banklogo.png" alt="">
					</a>
				</div>
			</div>				
		</div>
	</div>
	<!-- CREATOR + UP BUTTON CONTAINER -->
	<div class="grey_gradient">
		<div class="container">
			<div class="final" id="final">
				<h9><a href="http://3dworld.com/"><? echo $config['title']; ?></a> &copy 2018. Created by <a href="https://www.facebook.com/profile.php?id=100001591270478">Derepa Dmitry</a>.</h9>
				<a href="#start">
					<button class="up_button">
						<img src="/formalization/arrow.png">
					</button>
				</a>
			</div>
		</div>
	</div>			
	<!--CONNECTING TO GOOGLEFONTS, STYLE.CSS, BOOTSTRAP -->
	<link href="https://fonts.googleapis.com/css?family=Comfortaa|Lora" rel="stylesheet">
	<link rel="stylesheet" href="../formalization/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
	</script>
			
</footer>
</body>
</html>