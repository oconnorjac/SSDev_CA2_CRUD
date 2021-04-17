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
if (isset($_POST['register'])) {

    //Retrieve the field values from our registration form.
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $pass = !empty($_POST['password']) ? trim($_POST['password']) : null;

    //TO ADD: Error checking (username characters, password length, etc).
    //Basically, you will need to add your own error checking BEFORE
    //the prepared statement is built and executed.

    //Now, we need to check if the supplied username already exists.

    //Construct the SQL statement and prepare it.
    $sql = "SELECT COUNT(username) AS num FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);

    //Bind the provided username to our prepared statement.
    $stmt->bindValue(':username', $username);

    //Execute.
    $stmt->execute();

    //Fetch the row.
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    //If the provided username already exists - display error.
    //TO ADD - Your own method of handling this error. For example purposes,
    //I'm just going to kill the script completely, as error handling is outside
    //the scope of this tutorial.
    if ($row['num'] > 0) {
        ##die('That username already exists!');
        
    }

    //Hash the password as we do NOT want to store our passwords in plain text.
    $passwordHash = password_hash($pass, PASSWORD_BCRYPT, array("cost" => 12));

    //Prepare our INSERT statement.
    //Remember: We are inserting a new row into our users table.
    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $stmt = $pdo->prepare($sql);

    //Bind our variables.
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $passwordHash);

    //Execute the statement and insert the new account.
    $result = $stmt->execute();

    /*TODO Add to the customers table too*/ 
    /*$sql2 = "INSERT INTO customers (email, username) 
            VALUES (CONCAT(:username,'@email.com'), :username)";
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->bindValue(':username', $username);
    $update = $stmt2->execute();*/



    //If the signup process is successful.
    if ($result) {
        //What you do here is up to you!
        //echo 'Thank you for registering with our website.';
        include('register_success.php');
        exit();
    }
}

?>
<div class="container">
    <?php
    include('includes/header.php');
    ?>

    <h1 class="pageTitle">Register</h1>
    <span id="password_message"></span>

    <form action="register.php" method="post" class="loginOut">
        <label for="username">Username</label>
        <input type="input" id="username" name="username" pattern="[a-zA-Z0-9]{5,}$" required onkeypress="username_validation();">
        <br>
        <span id="username_message"></span>
        <br><br>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required onkeypress="password_validation();">
        <br>
        <span id="password_message"></span>
        <br><br>
        
        <input type="submit" name="register" value="Register"></button>
    </form>
    <?php
    include('includes/footer.php');
    ?>