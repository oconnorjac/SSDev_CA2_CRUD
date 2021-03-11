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
            <input type="input" name="email" id="custid" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required onkeypress="custid_validation();">
            <span id="custid_message"></span>
            <br>

            <label>Name:</label>
            <input type="input" name="name" id="name" pattern="^[a-zA-Z'-\s]{0,50}$" required onkeypress="name_validation();">
            <span id="name_message"></span>
            <br>   
            
            <label>Address:</label>
            <input type="input" name="address" id="address" pattern="^[a-zA-Z0-9-\s,]{0,50}$" required onkeypress="address_validation()">
            <span id="address_message"></span>
            <br> 

            <label>Mobile:</label>
            <input type="input" name="telephone" id="mobile" pattern="[0][8][3,5-9][0-9]{7}" required onkeypress="mobileNum_valdation()">
            <span id="mobile_message"></span>
            <br> 
            
            <label>&nbsp;</label>
            <input type="submit" value="Register">
            <br>
        </form>
    <?php
include('includes/backToHome.php');
include('includes/footer.php');
?>