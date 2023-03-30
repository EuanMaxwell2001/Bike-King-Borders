<?php 
      //include db file
    include('includes/dbconnect.php');
	include('includes/sessions.php');
?>
<!DOCTYPE HTML>
<html>
		<div class="colorlib-loader"></div>
	<?php
    $page='product-info';
    include('./includes/navbar_login.php');
    ?>

		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col">
						<p class="bread"><span><a href="index.php">Home</a></span> / <span>Product Details</span></p>
					</div>
				</div>
			</div>
		</div>

		<?php
          
          $_SESSION['sess_id']=$id;

          //run SQL query
		  $id = $_GET['id'];
          $query = "SELECT * FROM products WHERE id='$id'";
          $result=mysqli_query($con, $query)
          or die ("couldn't run query");
          //while loop to extract result set
          while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
          {
            ?>

			 <?php

          //if the button has been pressed for buying
          if (isset($_POST['id']) && $_POST['id']!=""){
          $id = $_POST['id'];
          //run sql for product id
          $result = mysqli_query($con,"SELECT * FROM products WHERE id='$id'");
          $row = mysqli_fetch_assoc($result);
          // set variable names
          $name = $row['prod_name'];
          $id = $row['id'];
          $price = $row['prod_price'];
          $image = $row['image'];
          $quantity=$_POST['quantity'];

          //Create the cart array
          $cartArray = array(
            $id=>array(
            'prod_name'=>$name,
            'id'=>$id,
            'prod_price'=>$price,
            'quantity'=>$quantity,
            'image'=>$image)
          );

          //Add to cart.
          //If cart is empty, add it
          if(empty($_SESSION['shopping_cart'])){
            $_SESSION['shopping_cart'] = $cartArray;
            $_SESSION['msg'] = "The product has been added to your cart, click on the cart symbol in the top right corner to see it!";
            $_SESSION['msgstatus'] = "success";
          }else{
            // if product exists in cart, tell them
            $array_keys = array_keys($_SESSION['shopping_cart']);
            if(in_array($id,$array_keys)) {
            $_SESSION['msg'] = "The product has already been added to your cart";
            $_SESSION['msgstatus'] = "error";
            } else {
            // if product doesn't exist, but the cart isn't empty, add the new product into the cart array
            $_SESSION['shopping_cart'] = array_merge($_SESSION['shopping_cart'],$cartArray);
            $_SESSION['msg'] = "The product has been added to your cart, click on the cart symbol in the top right corner to see it!";
            $_SESSION['msgstatus'] = "success";
            }

            }
          }
          ?>


		<div class="colorlib-product">
			<div class="container">
				<div class="row row-pb-lg product-detail-wrap">
					<div class="col-sm-8">
							<div class="item">
								<div class="product-entry border">
									<a href="#" class="prod-img">
										<img src=<?php echo" 'images/bikeimages/".$row['image']."'"?>" class="img-fluid" alt="Free html5 bootstrap 4 template">
									</a>
								</div>
							</div>
					</div>
					<div class="col-sm-4">
						<div class="product-desc">
							<h3><?php echo $row['prod_brand'];?> <?php echo $row['prod_name'];?></h3>
							<span><?php echo $row['prod_type'];?> Bike</span>
							<p class="price">
								<span>£<?php echo $row['prod_price'];?></span> 
								<span class="rate">
									<i class="icon-star-full"></i>
									<i class="icon-star-full"></i>
									<i class="icon-star-full"></i>
									<i class="icon-star-full"></i>
									<i class="icon-star-half"></i>
									(74 Rating)
								</span>
							</p>
							<div class="size-wrap">
								<div class="block-26 mb-2">
									<h4>Wheel Size</h4>
				               <ul>
				                  <li><a href="#"><?php echo $row['prod_size'];?></a></li>
				               </ul>
				            </div>
				            <div class="block-26 mb-4">
									<h4>Frame Size</h4>
				               <ul>
				                  <li><a href="#">S</a></li>
				                  <li><a href="#">M</a></li>
								  <li><a href="#">L</a></li>
				               </ul>
				            </div>
							</div>

         

		  		<form method='POST' action='#'>
            		<input type='hidden' name='id' value="<?php echo $row['id']; ?>" />
                  	<div class="row">
	                  	<div class="col-sm-12 text-center">
							<button type = "submit" class = "btn btn-primary btn-addtocart" href="cart.php">
								<i class = "fas fa-shopping-cart" ></i> Add to Cart
							</button>
						</div>
					</div>
					 </form>
					</div>
				</div>
			</div>

				<div class="row">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-md-12 pills">
								<div class="bd-example bd-example-tabs">
								  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

								    <li class="nav-item">
								      <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Description</a>
								    </li>
								    <li class="nav-item">
								      <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-expanded="true">Review</a>
								    </li>
								  </ul>

								  <div class="tab-content" id="pills-tabContent">
								    <div class="tab-pane border fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
								      <p><?php echo $row['prod_desc'];?></p>
								    </div>

								    <div class="tab-pane border fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
								      <div class="row">
								   		<div class="col-md-8">
								   			<h3 class="head">23 Reviews</h3>
								   			<div class="review">
										   		<div class="user-img" style="background-image: url(images/person1.jpg)"></div>
										   		<div class="desc">
										   			<h4>
										   				<span class="text-left">Jacob Webb</span>
										   				<span class="text-right">14 March 2018</span>
										   			</h4>
										   			<p class="star">
										   				<span>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-half"></i>
										   					<i class="icon-star-empty"></i>
									   					</span>
									   					<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
										   			</p>
										   			<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
										   		</div>
										   	</div>
										   	<div class="review">
										   		<div class="user-img" style="background-image: url(images/person2.jpg)"></div>
										   		<div class="desc">
										   			<h4>
										   				<span class="text-left">Jacob Webb</span>
										   				<span class="text-right">14 March 2018</span>
										   			</h4>
										   			<p class="star">
										   				<span>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-half"></i>
										   					<i class="icon-star-empty"></i>
									   					</span>
									   					<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
										   			</p>
										   			<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
										   		</div>
										   	</div>
										   	<div class="review">
										   		<div class="user-img" style="background-image: url(images/person3.jpg)"></div>
										   		<div class="desc">
										   			<h4>
										   				<span class="text-left">Jacob Webb</span>
										   				<span class="text-right">14 March 2018</span>
										   			</h4>
										   			<p class="star">
										   				<span>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-half"></i>
										   					<i class="icon-star-empty"></i>
									   					</span>
									   					<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
										   			</p>
										   			<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
										   		</div>
										   	</div>
								   		</div>
								   		<div class="col-md-4">
								   			<div class="rating-wrap">
									   			<h3 class="head">Give a Review</h3>
									   			<div class="wrap">
										   			<p class="star">
										   				<span>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					(98%)
									   					</span>
									   					<span>20 Reviews</span>
										   			</p>
										   			<p class="star">
										   				<span>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-empty"></i>
										   					(85%)
									   					</span>
									   					<span>10 Reviews</span>
										   			</p>
										   			<p class="star">
										   				<span>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-empty"></i>
										   					<i class="icon-star-empty"></i>
										   					(70%)
									   					</span>
									   					<span>5 Reviews</span>
										   			</p>
										   			<p class="star">
										   				<span>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-empty"></i>
										   					<i class="icon-star-empty"></i>
										   					<i class="icon-star-empty"></i>
										   					(10%)
									   					</span>
									   					<span>0 Reviews</span>
										   			</p>
										   			<p class="star">
										   				<span>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-empty"></i>
										   					<i class="icon-star-empty"></i>
										   					<i class="icon-star-empty"></i>
										   					<i class="icon-star-empty"></i>
										   					(0%)
									   					</span>
									   					<span>0 Reviews</span>
										   			</p>
										   		</div>
									   		</div>
								   		</div>
								   	</div>
								    </div>
								  </div>
								</div>
				         </div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php }?>

		        <?php

    include('./includes/footer.php');

    ?>

	<script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>


	</body>
</html>

