<?php 
      //include db file
    include('includes/dbconnect.php');
	include('includes/sessions.php');
?>
<!DOCTYPE HTML>
<html>
	<?php
    $page='cart';
    include('./includes/navbar_login.php');
    ?>

		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col">
						<p class="bread"><span><a href="index.php">Home</a></span> / <span>Shopping Cart</span></p>
					</div>
				</div>
			</div>
		</div>

		<?php   // get id from previous page and begin session for editing
    $status="";
      if (isset($_POST['action']) && $_POST['action']=="remove"){
      if(!empty($_SESSION['shopping_cart'])) {
      foreach($_SESSION['shopping_cart'] as $key=>$value) {
      if($_POST['prod_name'] == $value['prod_name']){
      unset($_SESSION['shopping_cart'][$key]);
      }
      if(empty($_SESSION['shopping_cart'])){
      unset($_SESSION['shopping_cart']);}
        }
      }
      }

      if (isset($_POST['action']) && $_POST['action']=="change"){
      foreach($_SESSION['shopping_cart'] as &$value){
      if($value['prod_name'] === $_POST['prod_name']){
          $value['quantity'] = $_POST['quantity'];
          break; // Stop the loop after product is found
      }
      }
      }
      ?>

	  <?php //if the shopping cart session has been started
          if(isset($_SESSION['shopping_cart'])){
              $total_price = 0;
          ?>

		<div class="colorlib-product">
			<div class="container">
			
				<div class="row row-pb-lg">
					<div class="col-md-10 offset-md-1">
						<div class="process-wrap">
							<div class="process text-center active">
								<p><span>01</span></p>
								<h3>Shopping Cart</h3>
							</div>
							<div class="process text-center">
								<p><span>02</span></p>
								<h3>Checkout</h3>
							</div>
							<div class="process text-center">
								<p><span>03</span></p>
								<h3>Order Complete</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row row-pb-lg">
					<div class="col-md-12">
						<div class="product-name d-flex">
							<div class="one-forth text-left px-4">
								<span>Product Details</span>
							</div>
							<div class="one-eight text-center">
								<span></span>
							</div>
							<div class="one-eight text-center">
								<span>Quantity</span>
							</div>
							<div class="one-eight text-center">
								<span>Price</span>
							</div>
							<div class="one-eight text-center px-4">
								<span>Remove</span>
							</div>
						</div>
													<?php
                } //end for each item loop
                ?>
				<?php foreach ($_SESSION['shopping_cart'] as $product){ ?>
						<div class="product-cart d-flex">
							<!-- create a foreach loop to loop through the chosen products-->
							

                  	
							<div class="one-forth">
								<div class="product-img" style="background-image: url(<?php echo "images/bikeimages/" . $product['image'] . ""; ?>);">
								</div>
								<div class="display-tc">
									<h3><?php echo $product['prod_name']; ?></h3>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<span class="price"></span>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<span class="price">One</span>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<span class="price">£<?php echo $product['prod_price']; ?></span>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
					<form method='post' action='#'>
                      <input type='hidden' name='prod_name' value="<?php echo $product['prod_name']; ?>" />
                      <input type='hidden' name='action' id="remove" value="remove" />
                      <button type='submit' name="remove" class='closed' value="remove"></button>
                    </form>
								</div>
							</div>
							</div>
				<?php } // end shopping cart loop
                if(!isset($_SESSION['shopping_cart'])){
                  $no_items=0;?>
				  <div class="colorlib-product">
			<div class="container">
			

				<?php }
				$cart_count = count(array_keys($_SESSION['shopping_cart']));

                $shipping_price+=($cart_count*20);
				$subtotal_price+=($product['prod_price']);
				$total_price+=($product['prod_price']  + $shipping_price);
                ?>
					
					</div>	
					
				</div>
				<div class="row row-pb-lg">
					<div class="col-md-12">
						<div class="total-wrap">
							<div class="row">
								<div class="col-sm-4 text-center">
									<div class="total">
										<div class="sub">
											<p><span>Subtotal:</span> <span><?php echo "£".$subtotal_price; ?></span></p>
											<p><span>Delivery:</span> <span><?php echo "£".$shipping_price; ?></span></p>
										</div>
										<div class="grand-total">
											<p><span><strong>Total:</strong></span> <span><?php echo "£".$total_price; ?></span></p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='checkout.php'">Proceed To Payment</button>
					</div>
				</div>


				</div>
			</div>

				  <?php //if the shopping cart session has been started
          if(isset($_SESSION['shopping_cart'])){
              $no_items=0;
          ?>

		<div class="colorlib-product">
			<div class="container">
			
				<div class="row row-pb-lg">
					<div class="col-md-10 offset-md-1">
						<div class="process-wrap">
							<div class="process text-center active">
								<p><span>01</span></p>
								<h3>Shopping Cart</h3>
							</div>
							<div class="process text-center">
								<p><span>02</span></p>
								<h3>Checkout</h3>
							</div>
							<div class="process text-center">
								<p><span>03</span></p>
								<h3>Order Complete</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row row-pb-lg">
					<div class="col-md-12">
						<div class="product-name d-flex">
							<div class="one-forth text-left px-4">
								<span>Product Details</span>
							</div>
							<div class="one-eight text-center">
								<span></span>
							</div>
							<div class="one-eight text-center">
								<span>Quantity</span>
							</div>
							<div class="one-eight text-center">
								<span>Price</span>
							</div>
							<div class="one-eight text-center px-4">
								<span>Remove</span>
							</div>
						</div>
													<?php
                } //end for each item loop
                ?>


		        <?php
				$_SESSION['subtotal_price'] = $subtotal_price;
				$_SESSION['shipping_price'] = $shipping_price;
				$_SESSION['total_price'] = $total_price;

    include('./includes/footer.php');

    ?>