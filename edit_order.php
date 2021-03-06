<?php
// Get the order data
$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
$quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);

// Validate inputs
if ($product_id == FALSE || $product_id == NULL || 
    $quantity == NULL || $quantity == FALSE) 
{
    $error = "Invalid order data. Check all fields and try again.";
    include('error.php');
} else {

    // If valid, update the order in the database
    require_once('database.php');

    $query = 'UPDATE orders
            SET productID = :product_id,
            quantity = :quantity
            WHERE orderID = :order_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_id', $product_id);
    $statement->bindValue(':quantity', $quantity);
    $statement->execute();
    $statement->closeCursor();

    // Display the home page
    include('index.php');
}
