// <?php
//   $receiving_email_address = 'vm1986734@gmail.com';

//   if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
//     include( $php_email_form );
//   } else {
//     die( 'Unable to load the "PHP Email Form" Library!');
//   }

//   $contact = new PHP_Email_Form;
//   $contact->ajax = true;
  
//   $contact->to = $receiving_email_address;
//   $contact->from_name = $_POST['name'];
//   $contact->from_email = $_POST['email'];
//   $contact->subject = $_POST['subject'];

//   $contact->add_message( $_POST['name'], 'From');
//   $contact->add_message( $_POST['email'], 'Email');
//   $contact->add_message( $_POST['message'], 'Message', 10);

//   echo $contact->send();
// ?>

<?php
$receiving_email_address = 'vm1986734@gmail.com';

// Load library
if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
  include($php_email_form);
} else {
  die('Unable to load the PHP Email Form Library!');
}

// Validate input
if (
  empty($_POST['name']) ||
  empty($_POST['email']) ||
  empty($_POST['message'])
) {
  die('Please fill all required fields');
}

// Create object
$contact = new PHP_Email_Form;
$contact->ajax = true;

// Email settings
$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'];
$contact->from_email = $_POST['email'];
$contact->subject = $_POST['subject'] ?? 'New Contact Message';

// Add message
$contact->add_message($_POST['name'], 'From');
$contact->add_message($_POST['email'], 'Email');
$contact->add_message($_POST['message'], 'Message', 10);

// 🔥 IMPORTANT: Return OK for JS
if ($contact->send()) {
  echo "OK";
} else {
  echo "Error: Message not sent";
}
?>
