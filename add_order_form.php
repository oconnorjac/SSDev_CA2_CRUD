<?php

/**
 * Start the session.
 */
session_start();

/**
 * Check if the user is logged in.
 */
if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
    //User not logged in. Redirect them back to the login.php page.
    header('Location: login.php');
    exit;
}

require('database.php');
$query = 'SELECT *
          FROM orders
          ORDER BY orderID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>


<!-- the head section -->
 <div class="container">
<?php
include('includes/header.php');
?>
        <h1 class="pageTitle">Order Product</h1>
        <form action="add_order.php" method="post" enctype="multipart/form-data"
              id="add_product_form">

            <label>Email:</label>
            <input type="input" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Customer Email" required onkeypress="custid_validation();">
            <span id="custid_message"></span>
            <br>   
            
            <label>Product ID:</label>
            <input type="number" min=0 name="product_id" placeholder="Product ID"  required onkeypress="number_valdation();">
            <span id="num_message"></span>
            <br> 
            
            <label>Quantity:</label>
            <input type="number" min=0 name="quantity" placeholder="Quantity" required onkeypress="number_valdation();">
            <span id="num_message"></span>
            <br>
            
            <label>&nbsp;</label>
            <input type="submit" value="Add Order">
            <br>
        </form>
    <?php
include('includes/footer.php');
?>