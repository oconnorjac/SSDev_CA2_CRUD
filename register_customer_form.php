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
            <input type="input" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
            <br>

            <label>Name:</label>
            <input type="input" name="name" pattern="^[a-zA-Z'-\s]{0,50}$" required>
            <br>   
            
            <label>Address:</label>
            <input type="input" name="address" pattern="^[a-zA-Z0-9-\s]{0,50}$" required>
            <br> 

            <label>Mobile:</label>
            <input type="input" name="telephone" pattern="[0][8][3,5-9][0-9]{7}" required>
            <br> 
            
            <label>&nbsp;</label>
            <input type="submit" value="Register">
            <br>
        </form>
    <?php
include('includes/backToHome.php');
include('includes/footer.php');
?>