	<head>
	<title>Bike King Borders Redesign</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Ion Icon Fonts-->
	<link rel="stylesheet" href="css/ionicons.min.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	
	<!-- Date Picker -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="sass/style.css">

	</head>
	<body>
		


	<div id="page">
<ul class="nav justify-content-center">
    <li class="nav-item">
      <a class="nav-link" href="https://euanmaxwell.co.uk/">Return to my portfolio<i class='bx bx-first-page'></i></a>
    </li>
  </ul>     
		 
		 <!-- Navbar -->
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-sm-7 col-md-9">
							<div id="colorlib-logo">
								<a href="index.php">
									Bike King Borders
								</a>
							</div>
						</div>
						<div class="col-sm-5 col-md-3">
			            <form action="#" class="search-wrap">
			               <div class="form-group">
			                  <input type="search" class="form-control search" placeholder="Search">
			                  <button class="btn btn-primary submit-search text-center" type="submit"><i class="icon-search"></i></button>
			               </div>
			            </form>
			         </div>
		         </div>
				<?php
				function isActive($pageName)
				{
					$currentPage = basename($_SERVER['PHP_SELF'], ".php");
					return $currentPage === $pageName ? 'active' : '';
				}
					?>
					<div class="row">
						<div class="col-sm-12 text-left menu-1">
							<ul>
								<li class="<?= isActive('Home') ?>"><a href="index.php">Home</a></li>
									<li class="<?= isActive('Bikes') ?>"><a href="bikes.php">Bikes</a></li>
									<!--<ul class="dropdown">
										<li><a href="product-detail.php">Product Detail</a></li>
										<li><a href="cart.php">Shopping Cart</a></li>
										<li><a href="checkout.php">Checkout</a></li>
										<li><a href="order-complete.php">Order Complete</a></li>
										<li><a href="add-to-wishlist.php">Wishlist</a></li>
									</ul>-->
								<li class="<?= isActive('about') ?>"><a href="about.php">About</a></li>
								<li><a href="contact.php">Contact</a></li>
								

								<li class="<?php if($page=='cart'){echo 'active';}?>">
									<?php if(!empty($_SESSION['shopping_cart'])) {
										$cart_count = count(array_keys($_SESSION['shopping_cart']));
										?>
										<li class="cart" id="count"><a href="cart.php" >
										<i class="icon-shopping-cart"></i> Cart [<?php echo $cart_count; ?>]
										<?php
									} else {?>
										<li class="cart" id="count"><a href="cart.php" >
										<i class="icon-shopping-cart"></i> Cart [0]
									<?php } ?>
										</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>










        

