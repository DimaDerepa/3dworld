<? include "includes/header.php";?>
	<!-- SCRIPT FOR UPDATE VIEWS -->
	<?$views=mysqli_query($connection,"UPDATE products SET views=views+1 WHERE id= " . (int) $_GET['Id']);
	#	SCRIPT FOR GETTING PRODUCT
	$products=mysqli_query($connection,"SELECT * FROM products WHERE id= " . (int) $_GET['Id']);
	$prod=mysqli_fetch_assoc($products);?>
	<div class="container pb-5">
		<h1 class="mt-5"><?echo $prod['Name'];?></h1>
		<h6><img src="/formalization/views.png">  <?echo $prod['views'];?></h6>
		<div class="row">
			<div class="col-6">
				<img class='large_photo_product mb-3' src="/products/<?echo $prod['Main_photo']?>">
				<div class="col-6 small_photo_product">
					<img class="product_photo_small" src="/products/<?echo $prod['Photos']?>">
					<img  class="product_photo_small" src="/products/<?echo $prod['Photos2']?>">
				</div>
				<div class="product_add_to_cart">
					<h2 class="mb-3">Only for <?echo $prod['Price']?>$</h2>
					<form method="POST" action="/includes/function.php" class="buy_product">
						<input class="count_products" type="number" min="1" max="6" value="1" name="count_products">
						<input type="text" style="display:none;" name="id_product" value="<?echo $prod['Id'];?>">
						<input class="btn-hover color-9 ml-2" type="submit" name="add" class="send_button" value="Add to cart">
					</form>
				</div>
				<div class="quick_buy_here">
					<h2 class="mx-auto">Quick buy here</h2>
					<form method="POST" id="quick_buy">
						<input type="text" required name="phone_number" placeholder="Input your phone number ">
						<input type="text" required name="fio" placeholder="Input your name ">
						<input type="text" name="id_product" hidden value="<?echo $prod['Id'];?>" >
					</form>
					<input class="btn-hover color-9 mx-auto" form="quick_buy" type="submit" value="Quick buy">
						<!-- SCRIPT FOR QUICK BUY FORM -->
					<? $phone_number = $_POST['phone_number'];
					$fio = $_POST['fio'];
					$product = $_POST['id_product'];

					if(empty($phone_number) == FALSE || empty($fio) == FALSE || empty($product) == FALSE)
					{
				
						$quick_buy = mysqli_query($connection, "INSERT INTO quick_buy (Phone, Name, Product) VALUES ('$phone_number','$fio','$product')");
						echo "<script>alert(\" Our manager contact you in a close time.\");</script>";	
					}?>
				</div>
			</div>
			<div class="col-6">
				<h6><?echo $prod['Description']?></h6></div>
		</div>
				<hr>
				<div class="row">
					<div class="col-12 send_comment_form">
						<h2>Add a comment</h2>
						<form id="comment" method="POST" >
							<input type="text" name="nickname" required placeholder="Input your name">
							<input type="text" name="email_adress" required placeholder="Input your email(didn`t show)">
							<textarea name="comment" form="comment" required placeholder="Your comment"></textarea>
						</form>
						<input type="submit" class="btn-hover color-9 " form="comment" value="Send comment">
							<!-- SCRIPT FOR CREATE COMMENT -->
						<?$product_id=$prod['Id'];
						$nickname = $_POST['nickname'];
						$email_adress = $_POST['email_adress'];
						$comment = $_POST['comment'];
						if(empty($nickname) == FALSE || empty($email_adress) == FALSE || empty($comment) == FALSE)
						{
						$insert_comment = mysqli_query($connection, "INSERT INTO comments (Name, Email, Comment, Product_id) VALUES ('$nickname','$email_adress','$comment', '$product_id')");
						}
						?>
					</div>
						<!-- SCRIPT FOR OUTPUT COMMENTS -->
					<?$product_id=$prod['Id'];
					$show_comments=mysqli_query($connection,"SELECT * FROM comments WHERE Product_id = '$product_id'");
					if (mysqli_num_rows($show_comments)>0) {
						while ($show=mysqli_fetch_assoc($show_comments)) {?>
							<div class="col-12 comment">
								<h3><?echo $show['Name'];?></h3>
								<span class="comment_text"><?echo $show['Comment'];?></span>
							</div>
						<?}
					}else{
						echo "<h2 class='no_comments'>No comments for this product.<br>
						You can be first.</h2>";
					}?>
				</div>
	</div>
<? include "includes/footer.php";?>