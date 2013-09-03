
<?php
 
// check for form submission - useful if someone is trying to browse directly to this PHP file. 
//If check is negative it will redirect back to your contact page. 
if (!isset($_POST['save']) || $_POST['save'] != 'Send your message') {
    header('Location: index.html'); exit;
}
	
// get the posted data
$name = $_POST['contact_name'];
$email_address = $_POST['contact_email'];
$message = $_POST['contact_message'];
	
// check that a name was entered
if (empty($name))
    $error = 'You must enter your name.';
// check that an email address was entered
elseif (empty($email_address)) 
    $error = 'You must enter your email address.';
// check for a valid email address
elseif (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email_address))
    $error = 'You must enter a valid email address.';
// check that a message was entered
elseif (empty($message))
    $error = 'You must enter a message.';
		
// check if an error was found - if there was, send the user back to the form
if (isset($error)) {
    header('Location: index.html'.urlencode($error)); exit;
}
		
// write the email content
$email_content = "Name: $name\n";
$email_content .= "Email Address: $email_address\n";
$email_content .= "Message:\n\n$message";
	
// send the email replace "your email address here" with your email. Keep the ""!
mail ("xanderpollock@gmail.com", "New Contact Form Message", $email_content);
	
// send the user back to the form
header('Location: contact.html?s='.urlencode('Thank you for your message! We will contact you soon!')); exit;
 
?>
