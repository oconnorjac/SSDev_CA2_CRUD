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

require_once('database.php');

// Get all orders
$queryAllOrders = 'SELECT * FROM orders
ORDER BY orderID';
$statement1 = $db->prepare($queryAllOrders);
$statement1->execute();
$orders = $statement1->fetchAll();
$statement1->closeCursor();

// Get all products
$queryAllProducts = 'SELECT * FROM products
ORDER BY productID';
$statement2 = $db->prepare($queryAllProducts);
$statement2->execute();
$products = $statement2->fetchAll();
$statement2->closeCursor();
?>

<div class="container">
    <?php
    include('includes/header.php');
    ?>
    <h1 class="pageTitle">Orders</h1>

<section>
        <!-- display a table of orders -->
        <table class="cat_table">
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Order Date</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            <?php foreach ($orders as $order) : ?>
                <tr>
                    <td><?php echo $order['orderID']; ?></td>
                    <td><?php echo $order['customerID']; ?></td>
                    <td><?php echo $order['productID']; ?></td>
                    <td><?php echo $order['quantity']; ?></td>
                    <td><?php echo $order['dateOfOrder']; ?></td>
                    <td>
                        <form action="delete_order.php" method="post" id="delete_order">
                            <input type="hidden" name="order_id" value="<?php echo $order['orderID']; ?>">
                            <input type="submit" value="Delete" class="deleteButton">
                        </form>
                    </td>
                    <td>
                        <form action="edit_order_form.php" method="post" id="delete_order">
                            <input type="hidden" name="order_id" value="<?php echo $order['orderID']; ?>">
                            <input type="submit" value="Edit" class="editButton">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>

    <?php
    include('includes/footer.php');
    ?>