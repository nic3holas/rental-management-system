Acc SID:  AC5c4149221a9bdb38dcbc7b177aabc900
AUTH token: 167873bb075bb83afeb7ba826da2d6e7


<?php
    // Update the path below to your autoload.php,
    // see https://getcomposer.org/doc/01-basic-usage.md
    require_once '/path/to/vendor/autoload.php';
    use Twilio\Rest\Client;

    $sid    = "AC5c4149221a9bdb38dcbc7b177aabc900";
    $token  = "[167873bb075bb83afeb7ba826da2d6e7]";
    $twilio = new Client($sid, $token);

    $message = $twilio->messages
      ->create("+2540716453748", // to
        array(
          "from" => "+12013832307",
          "body" => "Hello, dear tenant."
        )
      );

print($message->sid);