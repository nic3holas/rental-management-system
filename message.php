<?php
require(__DIR__.'/vendor/autoload.php');

use Twilio\Rest\Client;

$sid = getenv('AC5c4149221a9bdb38dcbc7b177aabc900');
$token = getenv('167873bb075bb83afeb7ba826da2d6e7');
$client = new Client($sid, $token);

// Specify the phone numbers in [E.164 format](https://www.twilio.com/docs/glossary/what-e164) (e.g., +16175551212)
// This parameter determines the destination phone number for your SMS message. Format this number with a '+' and a country code
$phoneNumber = "+254716453748";

// This must be a Twilio phone number that you own, formatted with a '+' and country code
$twilioPurchasedNumber = "+12013832307";

// Send a text message
$message = $client->messages->create(
    $phoneNumber,
    [
        'from' => $twilioPurchasedNumber,
        'body' => "Hey Jenny! Good luck on the bar exam!"
    ]
);
print("Message sent successfully with sid = " . $message->sid ."\n\n");

// Print the last 10 messages
$messageList = $client->messages->read([],10);
foreach ($messageList as $msg) {
    print("ID:: ". $msg->sid . " | " . "From:: " . $msg->from . " | " . "TO:: " . $msg->to . " | "  .  " Status:: " . $msg->status . " | " . " Body:: ". $msg->body ."\n");
}