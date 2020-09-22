<?php

// Define some constants
define( "RECIPIENT_NAME", "Brygida Armatys" );
//define( "RECIPIENT_EMAIL", "brygida.armatys@gmail.com" );
define( "RECIPIENT_EMAIL", "jarekarmatys@gmail.com" );


// Read the form values
$success = false;
$firstName = isset( $_POST['name'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['name'] ) : "";
$senderEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";
$senderPhone = isset( $_POST['phone'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['phone'] ) : "";
$message = isset( $_POST['message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message'] ) : "";

// If all values exist, send the email
if ( $firstName && $senderEmail && $senderPhone && $message) {
  $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
  $headers = "Wiadomosc z formularza ubezpieczeniaraciborz.pl, od: " . $firstName . "";
  $msgBody = " Email: ". $senderEmail . PHP_EOL . PHP_EOL .  " Telefon: ". $senderPhone . PHP_EOL . PHP_EOL .  " Wiadomość: " . $message . "";
  $success = mail( $recipient, $headers, $msgBody );

  //Set Location After Successsfull Submission
  header('Location: ../index.html');
}

else{
	//Set Location After Unsuccesssfull Submission
  	header('Location: ../index.html');
}

?>
