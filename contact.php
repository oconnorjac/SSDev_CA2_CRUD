<!-- the head section -->
<?php

/**
 * Start the session.
 */
session_start();

/**
 * Check if the user is logged in.
 */
/*if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
    //User not logged in. Redirect them back to the login.php page.
    header('Location: login.php');
    exit;
}*/

?>

 <div class="container">
<?php
include('includes/header.php');
?>
	<h1 class="pageTitle">Contact us</h1>
	<form method="POST" name="contactform" action="contact-form-handler.php">
		<p>
			<label for='name'>Your Name:</label> <br>
			<input type="text" name="name">
		</p>
		<p>
			<label for='email'>Email Address:</label> <br>
			<input type="text" name="email"> <br>
		</p>
		<p>
			<label for='mobile'>Mobile:</label> <br>
			<input type="text" name="mobile"> <br>
		</p>
		<p>
			<label for='message'>Message:</label> <br>
			<textarea name="message"></textarea>
		</p>
		<input type="submit" value="Submit"><br>
	</form>

	<script language="JavaScript">
		var frmvalidator = new Validator("contactform");
		frmvalidator.addValidation("name", "req", "Please provide your name");
		frmvalidator.addValidation("email", "req", "Please provide your email");
		frmvalidator.addValidation("email", "email", "Please enter a valid email address");
	</script>

    <?php
include('includes/footer.php');
?>