<?php 
      //include db file
    include('includes/dbconnect.php');
	include('includes/sessions.php');
?>
<!DOCTYPE HTML>
<html>
	<?php
    $page='home';
    include('./includes/navbar_login.php');
    ?>

		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col">
						<p class="bread"><span><a href="index.php">Home</a></span> / <span>Bikes</span></p>
					</div>
				</div>
			</div>
		</div>

	<?php
    //run SQL query
    $query1 = ("SELECT * FROM products WHERE bestseller = 1");
    $result = mysqli_query($con, $query1)
    or die ("couldn't run query");
    ?>

			<div class="container">
				<div class="row">
					<div class="col-sm-8 offset-sm-2 text-center colorlib-heading colorlib-heading-sm">
						<h1>Best Sellers</h1>
					</div>
				</div>
				<div class="row row-pb-md">
					        <?php
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
          ?>
					<div class="col-md-3 col-lg-3 mb-4 text-center" href="<?php echo'product-detail.php?id=' .$row['id']. ''?>">
						<div class="product-entry border">
							<a href="<?php echo'product-detail.php?id=' .$row['id']. ''?>" class="prod-img">
								<img src=<?php echo" './images/bikeimages/".$row['image']."'"?> class="img-fluid" alt="<?php echo $row['prod_name'];?>">
							</a>
							<div class="desc">
								<h2><strong><?php echo $row['prod_brand'];?> <?php echo $row['prod_name'];?></strong></h2>
								<span class="price">£<?php echo $row['prod_price'];?></span>
								<span class="price"><?php echo $row['prod_type'];?> Bike</span>
							</div>
						</div>
					</div>
        <?php
        }
        ?>
	

	<!--container-->
<div class="album py-5">
    <div class="container">
            <div class="row mb-2" style="--bs-gutter-x: 0;">
              <div class="row col-md-12 bg-light" style="--bs-gutter-x: 0;">
                <div class="p-3 float-md-left mb-4 col-md-6"><h2 class="text-black">All Bikes: </h2></div>
                <!-- filter categories-->
                <div class="mb-2 col-sm-3">
                  <?php  //run SQL query for displaying all products
                  $query="SELECT * FROM products";
                  //If a category is set, append that onto the sql statement.
                  if(isset($_GET["category"])){
                    $query.=" WHERE prod_type='{$_GET["category"]}'";
                  }
                  //if a "sort by" is set, append that onto the sql statement.
                  if(isset($_GET["sort_by"]) AND $_GET["sort_by"]=='alphabetical'){
                    $query.=" ORDER BY prod_name ASC";
                  } elseif(isset($_GET["sort_by"]) AND $_GET["sort_by"]=='low_to_high') {
                    $query.=" ORDER BY prod_price ASC";
                  } elseif(isset($_GET["sort_by"]) AND $_GET["sort_by"]=='high_to_low') {
                    $query.=" ORDER BY prod_price DESC";
                  }
                  // connect and run or die
                  $result= mysqli_query($con, $query)
                  or die ("couldn't run query");
                  ?>
                  <div class="p-3 dropdown mr-1 ml-md-auto">
                    <!-- dropdown button-->
                    <button type="button" class="btn btn-primary btn-block dropdown-toggle" id="dropdownMenuReference" data-toggle="dropdown">Category</button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                      <!-- show all link-->
                      <a class="dropdown-item" href="bikes.php">Show All <span class="text-black ml-auto">(<?php
                      $amount_items=mysqli_num_rows($result);
                      echo $amount_items;?>)
                        </span>
                      </a>
                      <!-- category links-->
                      <?php
                      $sql_categories="SELECT DISTINCT prod_type FROM products";
                      $cat_result = mysqli_query($con, $sql_categories);
                      while ($cat_row = mysqli_fetch_array($cat_result, MYSQLI_ASSOC))
                      {?>
                      <!-- While loop for categories will display how many items are in each cat-->
                      <a class="dropdown-item" href="bikes.php?category=<?php echo $cat_row['prod_type'];?>">
                        <?php echo $cat_row['prod_type'];?>
                        <span class="text-black ml-auto">(<?php
                        $item_amount=mysqli_query($con, "SELECT * FROM products WHERE prod_type='{$cat_row["prod_type"]}'");
                              $cat_result_nr=mysqli_num_rows($item_amount);
                              echo $cat_result_nr;?>)
                        </span>
                      </a>
                      <?php } ?>
                      <!-- php while loop for categories ended-->
                    </div>
                  </div>
                </div>
                <!-- other sorting options for displayed items -->
                <div class="mb-2 col-sm-3">
                <!-- If/else statement for displaying other filters-->
                  <div class="p-3 dropdown mr-1 ml-md-auto">
                    <!-- dropdown button-->
                    <button type="button" class="btn btn-primary btn-block dropdown-toggle" id="dropdownMenuReference" data-toggle="dropdown">Sort by:</button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                      <a class="dropdown-item" href="food_shop.php?<?php if(isset($_GET["category"])){ echo "category=".$_GET['category']."&";}?>sort_by=alphabetical">Alphabetical</a>
                      <a class="dropdown-item" href="food_shop.php?<?php if(isset($_GET["category"])){ echo "category=".$_GET['category']."&";}?>sort_by=low_to_high">Price: low to high</a>
                      <a class="dropdown-item" href="food_shop.php?<?php if(isset($_GET["category"])){ echo "category=".$_GET['category']."&";}?>sort_by=high_to_low">Price: high to low</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <!-- /filters end-->


      <div id="message"></div>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        
        <?php
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
          ?>
					<div class="col-md-3 col-lg-3 mb-4 text-center" href="<?php echo'product-detail.php?id=' .$row['id']. ''?>">
						<div class="product-entry border">
							<a href="<?php echo'product-detail.php?id=' .$row['id']. ''?>" class="prod-img">
								<img src=<?php echo" './images/bikeimages/".$row['image']."'"?> class="img-fluid" alt="<?php echo $row['prod_name'];?>">
							</a>
							<div class="desc">
								<h2><strong><?php echo $row['prod_brand'];?> <?php echo $row['prod_name'];?></strong></h2>
								<span class="price">£<?php echo $row['prod_price'];?></span>
								<span class="price"><?php echo $row['prod_type'];?></span>
							</div>
						</div>
					</div>
        <?php
        }
        ?>

        </div>
        </div>
      </div>

		<div class="colorlib-product">

        <?php

    include('./includes/footer.php');

    ?>



