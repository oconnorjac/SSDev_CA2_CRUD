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

$user = $_SESSION['user_id'];

$query = 'SELECT *
          FROM customers
          WHERE username = :user';
$statement = $db->prepare($query);
$statement->bindValue(':user', $user);
$statement->execute();
$customers = $statement->fetch(PDO::FETCH_ASSOC);
$statement->closeCursor();

?>

<!-- the head section -->
 <div class="container">
<?php
include('includes/header.php');
?>
        <h1 class="pageTitle">Update Details</h1>

        <form action="edit_customer.php" method="post" enctype="multipart/form-data"
              id="add_product_form">

            <label>Username:</label>
            <input readonly type="" name="username" placeholder="<?php echo $customers['username']; ?>" />
            <br>

            <label>Email:</label>
            <input type="input" name="email" id="custid" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required onkeypress="custid_validation();" value="<?php echo $customers['email']; ?>">
            <span id="custid_message"></span>
            <br>

            <label>Name:</label>
            <input type="input" name="name" id="name" pattern="^[a-zA-Z'-\s]{0,50}$" required onkeypress="name_validation();" value="<?php echo $customers['name']; ?>">
            <span id="name_message"></span>
            <br>   
            
            <label>Address:</label>
            <input type="input" name="address" id="address" pattern="^[a-zA-Z0-9-\s,]{0,50}$" required onkeypress="address_validation()" value="<?php echo $customers['address']; ?>">
            <span id="address_message"></span>
            <br> 

            <label>Mobile:</label>
            <input type="input" name="mobile" id="mobile" pattern="[0][8][3,5-9][0-9]{7}" required onkeypress="mobileNum_valdation()" value="<?php echo $customers['mobile']; ?>">
            <span id="mobile_message"></span>
            <br> 
            
            <label>&nbsp;</label>
            <input type="submit" value="Save Changes">
            <br>
        </form>
    <?php
include('includes/footer.php');
?>