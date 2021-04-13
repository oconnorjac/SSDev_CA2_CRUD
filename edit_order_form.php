<?php

/**
 * Start the session.
 */
session_start();

/**
 * Check if the user is logged in.
 */
if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
    //User not logged in. Redirect them back to the login.php page.
    header('Location: login.php');
    exit;
}


/**
 * Print out something that only logged in users can see.
 */

echo 'Congratulations! You are logged in!';

require('database.php');

$order_id = filter_input(INPUT_POST, 'order_id', FILTER_VALIDATE_INT);
$customer_id = filter_input(INPUT_POST, 'customer_id');

$query = 'SELECT *
          FROM orders
          WHERE orderID = :order_id';
$statement = $db->prepare($query);
$statement->bindValue(':order_id', $order_id);
$statement->execute();
$orders = $statement->fetch(PDO::FETCH_ASSOC);
$statement->closeCursor();

?>

<!-- the head section -->
 <div class="container">
<?php
include('includes/header.php');
?>
        <h1>Edit Order</h1>
        <form action="edit_order.php" method="post" enctype="multipart/form-data" id="add_product_form">

            <label>Order ID:</label>
            <?php echo $order_id; ?>
            <br>

            <label>Customer ID:</label>
            <?php echo $orders['customerID']; ?>
            <br>

            <label>Product ID:</label>
            <input type="input" name="product_id"
                   value="<?php echo $orders['productID']; ?>">
            <br>

            <label>Quantity:</label>
            <input type="input" name="quantity"
                   value="<?php echo $orders['quantity']; ?>">
            <br>
            
            <label>&nbsp;</label>
            <input type="submit" value="Save Changes">
            <br>
        </form>
    <?php
include('includes/backToHome.php');
include('includes/footer.php');
?>