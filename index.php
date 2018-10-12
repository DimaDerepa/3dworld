<? include "includes/header.php";?>
	<div class="wrapper grey_gradient">
		<div class="container header_third">
			<div class="row header_third">
				<div class="col-3 header_menu_third flex_column">
					<a class="category_item" href="/categories.php">
						<div class="categories_wrapper">All products
							<img class="arrow_categories" src="/formalization/next.png" alt="">
						</div>
					</a>
						<!-- SCRIPT FOR GETTING CATEGORIES -->
					<? $categories = mysqli_query($connection, "SELECT * FROM categories");
					while ( $cat = mysqli_fetch_assoc($categories))
					{?>
						<a class="category_item" href="/categories.php?Id=<?echo $cat['Id'];?>">
							<div class="categories_wrapper"><?echo $cat['Name'];?>
									<img class="arrow_categories" src="/formalization/next.png" alt="">
							</div>
						</a>
					<?}?>
				</div>
				<div class="col-6">
					<a href="http://3dworld.com/product.php?Id=2">
						<img class="banner" src="background_banner.png">
					</a>
				</div>
				<div class="col-3 offer">
					<a href="http://3dworld.com/product.php?Id=38">
						<img class="promotion" src="background_promotion.png" alt="">
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="container pb-5 pt-5">
		<h1 class="mb-5">New Arrivals</h1>
		<div class="row">
				<!-- SCRIPT FOR GETTING NEW ARRIVALS PRODUCTS-->
			<?$products = mysqli_query($connection, "SELECT * FROM  products ORDER BY Id DESC  limit 20 ");
			while ( $prod = mysqli_fetch_assoc($products))
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
<? include "includes/footer.php";?>
