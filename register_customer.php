<?php

// Get the customer data
$email = filter_input(INPUT_POST,'customerID');
$password = filter_input(INPUT_POST, 'password');
$name = filter_input(INPUT_POST, 'name');
$address = filter_input(INPUT_POST, 'address');
$mobile = filter_input(INPUT_POST, 'mobile');

echo $email ." ". $password ." ". $name  ." ". $address ." ". $mobile; 

require('database.php');
$query1 = 'SELECT *
          FROM customers
          ORDER BY customerID';
$statement1 = $db->prepare($query1);
$statement1->execute();
$customers = $statement1->fetchAll();
$statement1->closeCursor();

// Validate inputs
if ( $email == null || $password == null || $name == null || $address == null || $mobile == null) 
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
                 (customerID, password, customerName, 
                 customerAddress, customerTel)
              VALUES
                 (:email, :password, :name, :address, :mobile)";
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':address', $address);
    $statement->bindValue(':mobile', $mobile);
    $statement->execute();
    $statement->closeCursor();

    include('register_success.php');
}
