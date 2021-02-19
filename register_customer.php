<?php

// Get the customer data
$email = filter_input(INPUT_POST, 'email');
$name = filter_input(INPUT_POST, 'name');
$address = filter_input(INPUT_POST, 'address');
$telephone = filter_input(INPUT_POST, 'telephone');

// Validate inputs
if ( $email == null || $name == null || $address == null || $telephone == null) 
{
    $error = "Invalid data. Check all fields and try again.";
    include('error.php');
    exit();
} 
else
{
    require_once('database.php');

    // Add the customer to the database 
    $query = "INSERT INTO customers
                 (customerID, customerName, 
                 customerAddress, customerTel)
              VALUES
                 (:email, :name, :address, :telephone)";
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':address', $address);
    $statement->bindValue(':telephone', $telephone);
    $statement->execute();
    $statement->closeCursor();

    include('register_success.php');
}
