<?php
require '/var/www/htdocs/project/vendor/autoload.php';
use Twilio\TwiML\MessagingResponse;

// Set the content-type to XML to send back TwiML from the PHP Helper Library
header("Content-Type: application/xml");

$response = new MessagingResponse();
$response->message(
    "You have successfully verified your phone number using the Twilio SMS API!"
);

echo $response;