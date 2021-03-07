<?php
// Get the order data
require('database.php');

$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
$quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);

$query1 = 'SELECT *
          FROM orders';
$statement1 = $db->prepare($query1);
$statement1->execute();
$orders = $statement1->fetch(PDO::FETCH_ASSOC);
$statement1->closeCursor();

$order_id = $orders['orderID'];

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
    $statement->bindValue(':order_id', $order_id);
    $statement->bindValue(':product_id', $product_id);
    $statement->bindValue(':quantity', $quantity);
    $statement->execute();
    $statement->closeCursor();

    // Display the home page
    include('view_orders.php');
}
