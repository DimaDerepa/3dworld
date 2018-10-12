<?include "includes/header.php";?>
<?
$per_page=24;
$page=1;
if( isset($_GET['page'])){
	$page=(int) $_GET['page'];
}
			#CASE 'ALL PRODUCT'(GETTING DATA + PAGINATION)
if(empty($_GET['Id'])){							
	$total_count_q=mysqli_query($connection,"SELECT COUNT('Id') As 'total_count' FROM products");
	$total_count=mysqli_fetch_assoc($total_count_q);
	$total_count=$total_count['total_count'];
	$total_pages=ceil($total_count/$per_page);
	if($page <= 1 || $page > $total_pages){
		$page = 1;
	}
	$offset=($per_page*$page)-$per_page;
	$categories=mysqli_query($connection,"SELECT * FROM products ORDER BY `Id` DESC LIMIT $offset,$per_page" );
	$nam['Name']='All products';
}
			#CASE 'CERTAIN CATEGORY'(GETTING DATA + PAGINATION)
elseif($_GET['Id'] > '0' && $_GET['Id']<'7'){
	$total_count_q=mysqli_query($connection,"SELECT COUNT('Id') As 'total_count' FROM products WHERE Category=" .$_GET['Id']);
	$total_count=mysqli_fetch_assoc($total_count_q);
	$total_count=$total_count['total_count'];
	$total_pages=ceil($total_count/$per_page);
	if($page <= 1 || $page > $total_pages){
		$page = 1;
	}
	$offset=($per_page*$page)-$per_page;
	$categories=mysqli_query($connection,"SELECT * FROM products  WHERE Category='".$_GET['Id'] ."' LIMIT $offset,$per_page");
	$name=mysqli_query($connection,"SELECT * FROM categories WHERE Id= " . (int) $_GET['Id']);
	$nam=mysqli_fetch_assoc($name);
}
			#CASE 'BEST OFFERS'(GETTING DATA + PAGINATION)
else{		
	$total_count_q=mysqli_query($connection,"SELECT COUNT('Id') As 'total_count' FROM products WHERE Best_offer='1'");
	$total_count=mysqli_fetch_assoc($total_count_q);
	$total_count=$total_count['total_count'];
	$total_pages=ceil($total_count/$per_page);
	if($page <= 1 || $page > $total_pages){
		$page = 1;
	}
	$offset=($per_page*$page)-$per_page;
	$categories=mysqli_query($connection,"SELECT * FROM products WHERE Best_offer='1' LIMIT $offset,$per_page");
	$nam['Name']='Best offers';
}?>		

			<!-- OUTPUT RECEIVED DATA -->
	<div class="container pb-5 pt-5">
		<h1 class="pb-5"><?echo $nam['Name']; ?></h1>
		<div class="row">
		<?while($cat=mysqli_fetch_assoc($categories))
		{?>
			<!-- PRODUCT CASE -->
			<div class="col-6 col-md-6 col-lg-3 offer">
				<div class="product">
					<div class="product_hover grey_gradient">
						<div  class="count">
							<form method="POST"  action="/includes/function.php" class="buy_product">
								<input type="text" style="display:none;" name="id_product" value="<?echo $cat['Id'];?>">
								<input  class="count_products" type="number"  min="1" max="6" value="1" name="count_products">
								<input  type="submit" class="btn-hover add color-9"  name="add" value="Add to cart" >
						 	</form>
						</div>
						<div class="buttons">
							<a  href="/product.php?Id=<?echo $cat['Id'];?>">
								<button class="btn-hover color-9">More</button>
							</a>
						</div>
					</div>

					<div class="product_unhover flex_column">
						<div class="photo_wrapper">
							<img class="product_photo" src="products/<?echo $cat['Main_photo'];?>">
						</div>
						<h5 class="mb-2"><?echo mb_substr($cat['Name'], 0, 46, 'utf-8');?>...</h5>
					 	<h4 class="price_text"><?echo $cat['Price'];?>$</h4>
					</div>	
				</div>
			</div>
		<?}?>
		</div>
	</div>
		
	<?
			#PAGINATOR
	echo '<div class="paginator pb-4 ">';
		if($page > 1){
			echo '<a href="/categories.php?page='.($page-1).'&Id='.$_GET['Id'].'"><img class="arrow_paginator" src="/formalization/prev.png" alt="prev"></a>';
		}
		if($total_pages > 1){
			echo '<p class="paginator__current_page mx-3">'.$page.'</p>';
		}
		if($page < $total_pages){
			echo '<a href="/categories.php?page='.($page+1).'&Id='.$_GET['Id'].'"><img class="arrow_paginator" src="/formalization/next.png" alt="next"> </a>';
		}
	echo '</div>';
	?>
<?include "includes/footer.php";?>