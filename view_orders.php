<?php
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
        <table>
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
                        <form action="delete_order.php" method="post" id="delete_order_form">
                            <input type="hidden" name="order_id" value="<?php echo $order['orderID']; ?>">
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                    <td>
                        <form action="edit_order_form.php" method="post" id="delete_order_form">
                            <input type="hidden" name="order_id" value="<?php echo $order['orderID']; ?>">
                            <input type="submit" value="Edit">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>

    <?php
    include('includes/backToHome.php');
    include('includes/footer.php');
    ?>