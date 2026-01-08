


<?php
require_once 'vendor/autoload.php';
use Twilio\Rest\Client;


$account_sid = 'AC3a6085b3df8ddc13eaf088e00437886e';
$auth_token = '335298995fd8bccd66ee2f4002ec75bc';
$twilio_phone_number = '+17196942127';

$donor_id = $_POST['donor_id'];
$mobile = $_POST['mobile'];
$message = $_POST['message'];

error_log("Received data: Donor ID - $donor_id, Mobile - $mobile, Message - $message");

$client = new Client($account_sid, $auth_token);

try {
    $client->messages->create(
        $mobile,
        [
            'from' => $twilio_phone_number,
            'body' => $message
        ]
    );

    echo "Message sent successfully";
    exit;
} catch (Exception $e) {
    error_log("Error: " . $e->getMessage());
    echo "Failed to send message: " . $e->getMessage();
}
?>
