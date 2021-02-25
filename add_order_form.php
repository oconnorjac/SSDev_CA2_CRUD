<?php
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
        <h1 class="pageTitle">Add Order</h1>
        <form action="add_order.php" method="post" enctype="multipart/form-data"
              id="add_product_form">

            <br>Customer must be registered before placing an order
            <label>Customer ID:</label>
            <input type="input" name="customer_id" placeholder="Customer ID" required>
            <br>   
            
            <label>Product ID:</label>
            <input type="input" name="product_id" placeholder="Product ID" required>
            <br> 
            
            <label>Quantity:</label>
            <input type="number" min=0 name="quantity" placeholder="Quantity" required>
            <br>
            
            <label>&nbsp;</label>
            <input type="submit" value="Add Order">
            <br>
        </form>
    <?php
include('includes/backToHome.php');
include('includes/footer.php');
?>