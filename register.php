<?php

//register.php

/**
 * Start the session.
 */
session_start();

/**
 * Include ircmaxell's password_compat library.
 */
require 'libary-folder/password.php';

/**
 * Include our MySQL connection.
 */
require 'login_connect.php';


//If the POST var "register" exists (our submit button), then we can
//assume that the user has submitted the registration form.
if(isset($_POST['register'])){
    
    //Retrieve the field values from our registration form.
    $customerID = !empty($_POST['customerID']) ? trim($_POST['customerID']) : null;
    $password = !empty($_POST['password']) ? trim($_POST['password']) : null;
    $name = !empty($_POST['name']) ? trim($_POST['name']) : null;
    $address = !empty($_POST['address']) ? trim($_POST['address']) : null;
    $mobile = !empty($_POST['mobile']) ? trim($_POST['mobile']) : null;
    
    //TO ADD: Error checking (username characters, password length, etc).
    //Basically, you will need to add your own error checking BEFORE
    //the prepared statement is built and executed.
    
    //Now, we need to check if the supplied username already exists.
    
    //Construct the SQL statement and prepare it.
    $sql = "SELECT COUNT(customerID) AS num FROM customers WHERE customerID = :customerID";
    $stmt = $pdo->prepare($sql);
    
    //Bind the provided username to our prepared statement.
    $stmt->bindValue(':customerID', $customerID);
    
    //Execute.
    $stmt->execute();
    
    //Fetch the row.
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //If the provided username already exists - display error.
    //TO ADD - Your own method of handling this error. For example purposes,
    //I'm just going to kill the script completely, as error handling is outside
    //the scope of this tutorial.
    if($row['num'] > 0){
        die('That username already exists!');
    }
    
    //Hash the password as we do NOT want to store our passwords in plain text.
    $passwordHash = password_hash($password, PASSWORD_BCRYPT, array("cost" => 12));
    
    //Prepare our INSERT statement.
    //Remember: We are inserting a new row into our users table.
    $sql = "INSERT INTO customers (customerID, password, customerName, customerAddress, customerTel) VALUES (:customerID, :password, :name, :address, :mobile)";
    $stmt = $pdo->prepare($sql);
    
    //Bind our variables.
    $stmt->bindValue(':customerID', $customerID);
    $stmt->bindValue(':password', $passwordHash);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':address', $address);
    $stmt->bindValue(':mobile', $mobile);

    //Execute the statement and insert the new account.
    $result = $stmt->execute();
    
    //If the signup process is successful.
    if($result){
        //What you do here is up to you!
        echo 'Thank you for registering with our website.';
    }
    
}

?>

<div class="container">
<?php
include('includes/header.php');
?>

<h1 class="pageTitle">Register</h1>
        <form action="register_customer.php" method="post" enctype="multipart/form-data"
              id="add_product_form">

            <br>
            <label>Email:</label>
            <input type="input" name="email" id="customerID" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required onkeypress="custid_validation();">
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

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <br>
            
            <label>&nbsp;</label>
            <input type="submit" name="register" value="Register">
            <br>
        </form>

<?php
include('includes/footer.php');
?>