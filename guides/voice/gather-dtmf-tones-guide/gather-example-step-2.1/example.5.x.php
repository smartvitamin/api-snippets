<?php
// Create a route that will handle Twilio Gather verb action requests,
// sent as an HTTP POST to /gather in our application
require_once '/path/to/vendor/autoload.php';

use Twilio\TwiML;

// Use the Twilio PHP SDK to build an XML response
$response = new TwiML();

// If the user entered digits, process their request
if (array_key_exists('Digits', $_POST)) {
    switch ($_POST['Digits']) {
    case 1:
        $response->say('You selected sales. Good for you!');
        break;
    case 2:
        $response->say('You need support. We will help!');
        break;
    default:
        $response->say('Sorry, I don\'t understand that choice.');
        $response->redirect('/voice');
    }
} else {
    // If no input was sent, redirect to the /voice route
    $response->redirect('/voice');
}

// Render the response as XML in reply to the webhook request
header('Content-Type: text/xml');
echo $response;
