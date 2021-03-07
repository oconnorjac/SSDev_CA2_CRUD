<?php
// Get the order data
$customer_id = filter_input(INPUT_POST, 'customer_id');
$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
$quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);

// Validate inputs
if ($customer_id == null || $product_id == null || $product_id == false ||
    $quantity== null || $quantity == false ) {
    $error = "Invalid order data. Check all fields and try again.";
    include('error.php');
    exit();
} else {
       
    require_once('database.php');

    // Add the order to the database 
    $query = "INSERT INTO orders
                 (customerID, productID, quantity)
              VALUES
                 (:customer_id, :product_id, :quantity)";
    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id);
    $statement->bindValue(':product_id', $product_id);
    $statement->bindValue(':quantity', $quantity);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('view_orders.php');
}