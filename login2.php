<?php

//login.php

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


//If the POST var "login" exists (our submit button), then we can
//assume that the user has submitted the login form.
if (isset($_POST['login'])) {

    //Retrieve the field values from our login form.
    $email = !empty($_POST['customerID,']) ? trim($_POST['customerID']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;

    //Retrieve the user account information for the given username.
    $sql = "SELECT customerID, password FROM customers WHERE customerID = :email";
    $stmt = $pdo->prepare($sql);

    //Bind value.
    $stmt->bindValue(':email', $email);

    //Execute.
    $stmt->execute();

    //Fetch row.
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    //If $row is FALSE.
    if ($user === false) {
        //Could not find a user with that username!
        //PS: You might want to handle this error in a more user-friendly manner!
        die('Incorrect username !');
    } else {
        //User account found. Check to see if the given password matches the
        //password hash that we stored in our users table.

        //Compare the passwords.
        $validPassword = password_verify($passwordAttempt, $user['password']);

        //If $validPassword is TRUE, the login has been successful.
        if ($validPassword) {

            //Provide the user with a login session.
            $_SESSION['customerID'] = $user['customerID'];
            $_SESSION['logged_in'] = time();

            //Redirect to our protected page, which we called home.php
            header('Location: index.php');
            exit;
        } else {
            //$validPassword was FALSE. Passwords do not match.
            die('Incorrect password !');
            exit();
        }
    }
}

?>

<div class="container">

    <?php
    include('includes/header.php');
    ?>

    <h1 class="loginOut">Login</h1>
    <form action="login.php" method="post" class="loginOut">

        <label for="customerID"=>Email:</label>
        <input type="input" name="customerID" id="customerID" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password">
        
        <input type="submit" name="login" value="Login">
    </form>

    <?php
    include('includes/footer.php');
    ?>