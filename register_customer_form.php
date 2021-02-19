<?php
require('database.php');
?>
<!-- the head section -->
<div class="container">
<?php
include('includes/header.php');
?>
        <h1 class="pageTitle">Register Customer</h1>
        <form action="register_customer.php" method="post" enctype="multipart/form-data"
              id="add_product_form">

            <br>
            <label>Email:</label>
            <input type="input" name="email">
            <br>

            <label>Name:</label>
            <input type="input" name="name">
            <br>   
            
            <label>Address:</label>
            <input type="input" name="address">
            <br> 

            <label>Telephone:</label>
            <input type="input" name="telephone">
            <br> 
            
            <label>&nbsp;</label>
            <input type="submit" value="Register">
            <br>
        </form>
    <?php
include('includes/backToHome.php');
include('includes/footer.php');
?>