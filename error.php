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
        <h2 class="pageTitle">Error</h2>
        <p><?php echo $error; ?></p>
        <?php
include('includes/footer.php');
?>