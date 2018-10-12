<?include "config.php";
# 	SCRIPT FOR ADDING PRODUCT INTO CART
if (isset($_POST['add'])) {
	$count_products=$_POST['count_products'];
	$id_product=$_POST['id_product'];
	$result1 = mysqli_query($connection,"INSERT INTO cart (ip, id_product, count) VALUES ('$ip', '$id_product', '$count_products')");
	unset($_POST);
	header("Location: http://3dworld.zzz.com.ua/cart.php");
	header("Location: http://3dworld.zzz.com.ua/");
	exit;
}
# 	SCRIPT FOR DELETING PRODUCT FROM CART
elseif(isset($_POST['delete']))
{
	$id=$_POST['delete'];
	$deleted=mysqli_query($connection, "DELETE FROM cart WHERE id =" . $id);
	header("Location: http://3dworld.zzz.com.ua/cart.php");
	exit;
}
# 	SCRIPT FOR CONFIRM ORDER
elseif(isset($_POST['confirm']))
{
	echo "<script>alert(\" Thanks for your order. Our employees contact you in a close time.\");</script>";	
	$name=$_POST['name'];
	$total_price=$_POST['total_price'];
	$full_name=$_POST['full_name'];
	$phone=$_POST['phone'];
	$order=mysqli_query($connection, "INSERT INTO orders (Products, Total_price, Phone, FIO) VALUES ('$name', '$total_price', '$phone', '$full_name')");
	$delete_cart=mysqli_query($connection, "DELETE  FROM cart WHERE ip='$ip'");
	unset($_POST);
	echo "<script>location.href='/index.php';</script>";
}
# 	SCRIPT FOR CLEAR CART
else  
{
	$deleted=mysqli_query($connection, "DELETE  FROM  cart WHERE  ip ='$ip'");
	header("Location: http://3dworld.zzz.com.ua/cart.php");
	exit;
}?>