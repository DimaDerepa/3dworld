<? include "includes/header.php";?>
	<!--FUNCTION FOR CRATE ASSOCIATIVE MASSIF PRODUCT=>COUNT -->
	<?function array_push_assoc($array, $key, $value){
		$array[$key] = $value;
		return $array;
	};
	# SCRIPT FOR OUTPUT PERSONAL CART 
	$cart = mysqli_query($connection, "SELECT * FROM cart WHERE ip='$ip'");
	$l=mysqli_num_rows($cart);
	if(empty($l)){
		echo "<div class='sorry'><h1>Products have not been added. </h1>
		<h2>At first add product into cart</h2></div>";
	}else{?>

		<table class="cart_table grey_gradient mt-5">
			<tr class="cart_row">
				<td class="cart_column">Count</td>
				<td class="cart_column">Photo</td>
				<td class="cart_column">Name</td>
				<td class="cart_column">Price for 1</td>
				<td class="cart_column">Price for count</td>
				<td class="cart_column">Delete</td>
			</tr>	
			<tr class="cart_row">
			<!--SCRIPT FOR OUTPUT CONTENT CART -->
			<?while ( $Z = mysqli_fetch_assoc($cart) )
			{
				$product = mysqli_query($connection, "SELECT * FROM products WHERE Id=" . $Z['id_product']);
				
				while($prod=mysqli_fetch_assoc($product))
				{
					$myarray = array_push_assoc($myarray, $prod['Name'], $Z['count']);
					$sum += $Z['count']*$prod['Price'];?>
					<td class="cart_column one">
						<input form="confirm" name="count" type="text" readonly value="<?echo $Z['count'];?>">
					</td>
					<td class="cart_column two">
						<img class="cart_image" src="/products/<?echo $prod['Main_photo'];?>">
					</td>
					<td class="cart_column three">
						<textarea class="name_textarea" form="confirm"  type="text" readonly ><?echo $prod['Name'];?></textarea>
					</td>
					<td class="cart_column four">
						<input form="confirm" name="price" type="text" readonly value="<?echo $prod['Price'];?>$"> 
					</td>
					<td class="cart_column five">
						<input form="confirm"  type="text" readonly value="<?$total=$prod['Price']*$Z['count'];print_r($total);?>$">
					</td>
					<td class="cart_column six">
						<form method="POST" id="del" action="/includes/function.php">
							<input type="text" style="display:none;" name="delete" value="<?echo $Z['id'];?>">
							<input class="btn-hover color-9" type="submit"  value="Delete product">
						</form>
					</td>
			</tr>
				<?}
			}?>
		</table>		
		<div class="clear_list mt-5">
			<span>Total price : </span>
			<input class="total_price" name="total_price"  readonly form="confirm" value="<?echo  $sum;?>$" >
			<input name="name" readonly form="confirm" type="hidden" 
			value="<? foreach($myarray as $key => $value) 
			  { 
			     echo "$key = $value <br />"; 
			  } ?>">
			<form  action="/includes/function.php">
				<input class="btn-hover color-9 clear" type="submit" name="clear" value="Clear cart">
			</form>
		</div>
		<div class="confirm_list">
			<h2 class=" mt-5" >Input your data for confirm order</h2>	
			<form class="confirm_form" action="/includes/function.php" method="POST" id="confirm" >
				<input type="text" required name="full_name" placeholder="Input your full name">
				<input type="text" required name="phone" placeholder="Input your phone number">
			</form>

			<input class="btn-hover color-9 " type="submit" name="confirm" form="confirm" value="Confirm">	
	</div>
	<?}?>
<? include "includes/footer.php";?>