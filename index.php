<?php 
      //include db file
    include('includes/dbconnect.php');
	include('includes/sessions.php');
?>
<!DOCTYPE HTML>
<html>
	<div class="colorlib-loader"></div>
    <!--NAVBAR INCLUDE-->
    <?php
    $page='home';
    include('./includes/navbar_login.php');
    ?>
	
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/mtb2.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-sm-6 offset-sm-3 text-center slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
					   					<h2 class="head-2">Shop</h2>
					   					<h1 class="head-1">Bikes</h1>
					   					<p><a href="#" class="btn btn-primary">Browse</a></p>
				   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(images/mtb3.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-sm-6 offset-sm-3 text-center slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
					   					<h2 class="head-2">Shop</h2>
					   					<h1 class="head-1">Clothing</h1>
					   					<p><a href="#" class="btn btn-primary">Browse</a></p>
				   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>
		<div class="colorlib-intro">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						<h2 class="intro">Welcome to Bike King Borders</h2>
					</div>
				</div>
			</div>
		</div>
		<div class="colorlib-product">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-6 text-center">
						<div class="featured">
							<a href="#" class="featured-img" style="background-image: url(images/bikerent.png);"></a>
							<div class="desc">
								<h2><a href="#">Shop Bikes Collection</a></h2>
							</div>
						</div>
					</div>
					<div class="col-sm-6 text-center">
						<div class="featured">
							<a href="#" class="featured-img" style="background-image: url(images/shop.jpg);"></a>
							<div class="desc">
								<h2><a href="#">Shop Clothing Collection</a></h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		        <?php

    include('./includes/footer.php');

    ?>