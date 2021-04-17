<?php

/**
 * Start the session.
 */
session_start();

/**
 * Check if the user is logged in.
 */
if (!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])) {
    //User not logged in. Redirect them back to the login.php page.
    header('Location: login.php');
    exit;
}

require_once('database.php');

// Get all categories
$query = 'SELECT productID, categoryID, name, price FROM products
              ORDER BY productID';
$statement = $db->prepare($query);
$statement->execute();
$products = $statement->fetchAll();
$statement->closeCursor();
?>

<!-- the head section -->
<div class="container">
    <?php
    include('includes/header.php');
    ?>
    <h1 class="pageTitle">Reserve a product</h1>

    <form action="reserve_product.php" method="post" enctype="multipart/form-data" id="add_product_form">

        <label>Product:</label>
        <select name="name">
            <option value="" disabled selected>Choose Product</option>
            <?php foreach ($products as $product) : ?>
                <option value="<?php echo $product['name'] ?>" required>
                    <?php echo $product['name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>

        <label>Quantity:</label>
        <input type="number" min=0 name="quantity" min=0 required onkeypress="number_valdation();" value="">
        <span id="num_message"></span>
        <br>

        <label>&nbsp;</label>
            <input type="submit" value="Reserve">
            <br>

    </form>


    <?php
    include('includes/footer.php');
    ?>