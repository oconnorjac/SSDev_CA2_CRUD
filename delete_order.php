<?php
require_once('database.php');

// Get IDs
$order_id = filter_input(INPUT_POST, 'order_id', FILTER_VALIDATE_INT);

// Delete the order from the database
if ($order_id != false) {
    $query = "DELETE FROM orders
              WHERE orderID = :order_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':order_id', $order_id);
    $statement->execute();
    $statement->closeCursor();
}

// display the orders page
include('view_orders.php');