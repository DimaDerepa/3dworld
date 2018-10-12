<?require "config.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="shortcut icon" href="/formalization/favicon.png" type="image/png">
	<meta charset="UTF-8">
	<title><? echo $config['title']; ?></title>
</head>
<body>
<header>
	<!-- LOGO + HEADER MENU + SOCIAL MENU CONTAINER -->
	<div class="container">
		<div class="row header">
			<div id="start" class="col-3 logotype">
				<a href="http://3dworld.zzz.com.ua/">
					<img class="logo" src="/formalization/logo.png">
				</a>
			</div>
			<div class="header_menu col-6 ">
				<a class="header_link" href="about_us.php">About us</a>
				<a class="header_link" href="categories.php?Id=bo">Best offers</a>
				<a class="header_link" href="contacts.php">Contacts</a>
				<a class="header_link" href="payments.php">Payment</a>
			</div>
			<div class="col-3 social_menu">
				<a href="<? echo $config['youtube']; ?>" class="header_link">
					<img class="social" src="/formalization/youtube.png">
				</a>
				<a href="<? echo $config['facebook']; ?>" class="header_link">
					<img class="social" src="/formalization/facebook.png">
				</a>
				<a href="<? echo $config['instagram']; ?>" class="header_link">
					<img class="social" src="/formalization/instagram.png">
				</a>
				<a href="<? echo $config['twitter']; ?>" class="header_link">
					<img class="social" src="/formalization/twitter.png">
				</a>
			</div>
		</div>
	</div>
	<!--BACK TO MAIN + SEARCH + CART CONTAINER -->
	<div class="wrapper blue">
		<div class="container header_second">
			<div class="row header_second">
				<div class="col-3 header_menu_second burger">
					<a style="color:white !important;" href="http://3dworld.zzz.com.ua/">
						<img class="mr-2" src="/formalization/home.png" alt=""> Back to the main page
					</a>
				</div>
				<div class="col-6 header_menu_second search">
					<form class="form-inline" method="post" action="search.php" name="search">
      					<input class="form-control"  name="query" type="search" placeholder="Search" aria-label="Search">
      					<button class="btn ml-2" type="submit">Search</button>
    				</form>
				</div>
				<!--SCRIPT FOR SHOWING HOW MANY PRODUCTS ADDED IN CART -->
				<? $count_prod = mysqli_query($connection, "SELECT * FROM cart WHERE ip='$ip'");
				$num_rows = mysqli_num_rows( $count_prod );?>
				<div class="col-3 header_menu_second basket">
					<a class="cart" href="cart.php">
						<img class="mr-3" src="/formalization/shopping-cart.png">
						<?if(empty($num_rows)){}else{echo"( $num_rows )";}?> 
					</a>
				</div>
			</div>
		</div>
	</div>	
</header>