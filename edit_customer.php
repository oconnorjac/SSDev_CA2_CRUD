<?php

// Get the product data
$email = filter_input(INPUT_POST, 'email');
$name = filter_input(INPUT_POST, 'name');
$address = filter_input(INPUT_POST, 'address');
$mobile = filter_input(INPUT_POST, 'mobile');

// Validate inputs
if ($email == NULL || $name == FALSE || $address == NULL || $mobile == NULL) 
{
    $error = "Invalid data. Check all fields and try again.";
    include('error.php');
} else {
    // If valid, update the product in the database
    require_once('database.php');

    $query = 'UPDATE customers
    SET email = :email,
    name = :name,
    address = :address,
    mobile = :mobile
    WHERE username = :username';

    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':address', $address);
    $statement->bindValue(':mobile', $mobile);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('index.php');
}
