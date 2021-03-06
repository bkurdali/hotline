<?php
/**
* @file
* Tell Twilio who to call
* 
*/

require_once '../vendor/autoload.php';
require_once '../config.php';

use Twilio\Twiml;

$response = new Twiml;

// get the phone number from the page request parameters, if given
if (isset($_REQUEST['To']) && strlen($_REQUEST['To']) > 0) {
    $number = htmlspecialchars($_REQUEST['To']);
    $from = htmlspecialchars($_REQUEST['From']);
    
    // ensure that the "from" number is hotline or broadcast.  Default to hotline.
	if ($from != $BROADCAST_CALLER_ID) {
		$from = $HOTLINE_CALLER_ID;
	}
    
    $dial = $response->dial(array('callerId' => $from));
    
    // wrap the phone number or client name in the appropriate TwiML verb
    // by checking if the number given has only digits and format symbols
    if (preg_match("/^[\d\+\-\(\) ]+$/", $number)) {
        $dial->number($number);
    } else {
        $dial->client($number);
    }
} else {
    $response->say("Thanks for calling!");
}

header('Content-Type: text/xml');
echo $response;
