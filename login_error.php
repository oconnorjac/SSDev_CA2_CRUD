<!-- the head section -->
<?php
/**
 * Start the session.
 */
session_start();
?>

<div class="container">
    <?php
    include('includes/header.php');
    ?>
    <h2 class="pageTitle">Incorrect username and password combination.</h2>
    <p class="outputMessages"><a href="login.php">Login</a> again, or <a href="register.php">register</a>.</p>
    <?php
    include('includes/footer.php');
    ?>