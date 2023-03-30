<?php 
      //include db file
    include('../includes/dbconnect.php');
	include('../includes/sessions.php');

    // Check if the "Place Order" button has been clicked
if (isset($_POST['place_order'])) {
    // Unset the shopping cart session variable
    unset($_SESSION['shopping_cart']);

    // Optional: destroy the entire session
    //session_destroy();

    // Redirect to a confirmation page or display a success message
echo "<script>window.location.href = '../order-complete.php';</script>";
    exit();
}
?>

