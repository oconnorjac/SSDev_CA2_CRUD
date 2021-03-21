<?php
$errors = '';
$myemail = 'D00233669@student.dkit.ie'; //<-----Put your DkIT email address here.
if (
	empty($_POST['name'])  ||
	empty($_POST['email']) ||
	empty($_POST['mobile']) ||
	empty($_POST['message'])
) {
	$errors .= "\n Error: all fields are required";
}

$name = $_POST['name'];
$email_address = $_POST['email'];
$mobile = $_POST['mobile'];
$message = $_POST['message'];

if (!preg_match(
	"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
	$email_address
)) {
	$errors .= "\n Error: Invalid email address";
}

if (empty($errors)) {
	$to = $myemail;
	$email_subject = "Contact form submission: $name";
	$email_body = "You have received a new message. " .
		" Here are the details:\n 
		Name: $name \n 
		Email: $email_address \n 
		Mobile: $mobile \n
		Message \n $message";

	$headers = "From: $myemail\n";
	$headers .= "Reply-To: $email_address";

	mail($to, $email_subject, $email_body, $headers);
	//redirect to the 'thank you' page
	header('Location: contact-form-thank-you.php');
}
?>
<div class="container">
	<?php
	include('includes/header.php');
	?>
	<!-- This page is displayed only if there is some error -->
	<?php
	echo nl2br($errors);
	?>
	<?php
	include('includes/backToHome.php');
	include('includes/footer.php');
	?>

<script language="JavaScript">
		var frmvalidator = new Validator("contactform");
		frmvalidator.addValidation("name", "req", "Please provide your name");
		frmvalidator.addValidation("email", "req", "Please provide your email");
		frmvalidator.addValidation("email", "email", "Please enter a valid email address");
	</script>