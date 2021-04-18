<?php
##session_start();
// Get the order data
$name = filter_input(INPUT_POST, 'name');
$quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);

$user = $_SESSION['user_id'];

// Validate inputs
if ($name == null || $quantity== null || $quantity == false ) {
    $error = "Invalid order data. Check all fields and try again.";
    include('error.php');
    exit();
} else {
       
    require_once('database.php');

    $getCustIDQuery = "SELECT email FROM customers WHERE username = :user"; 
    $statement1 = $db->prepare($getCustIDQuery);
    $statement1->bindValue(':user', $user);  
    $statement1->execute();
    $statement1->closeCursor();

    $getProdIDQuery = "SELECT productID FROM products WHERE name = :name"; 
    $statement2 = $db->prepare($getProdIDQuery);
    $statement2->bindValue(':name', $name);  
    $statement2->execute();
    $statement2->closeCursor();

    // Add the order to the database 
    $query = "INSERT INTO orders
                 (email, productID, quantity)
              VALUES
                 (:email, :product_id, :quantity)";
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $getCustIDQuery);
    $statement->bindValue(':product_id', $getProdIDQuery);
    $statement->bindValue(':quantity', $quantity);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    ##include('view_orders.php');
    echo "TODO";
    include('index.php');
}