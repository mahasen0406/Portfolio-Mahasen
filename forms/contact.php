<?php
  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'naveenm.weerasinghe@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include($php_email_form);
  } else {
    die('Unable to load the "PHP_Email_Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'] ?? '';
  $contact->from_email = $_POST['email'] ?? '';
  $contact->subject = $_POST['subject'] ?? 'Contact Form Submission';

  // Uncomment below code if you want to use SMTP to send emails.
  
  $contact->smtp = array(
    'host' => 'smtp.gmail.com',
    'username' => 'naveenm.weerasinghe@gmail.com',
    'password' => 'cyya cfla qfgl chpz',
    'port' => '587', // Adjust port according to your SMTP server settings
    'encryption' => 'tls' // Possible values 'ssl' or 'tls'
  );

  $contact->add_message($contact->from_name, 'Name');
  $contact->add_message($contact->from_email, 'Email');
  $contact->add_message($_POST['message'] ?? '', 'Message', 10);

  echo $contact->send();
?>