<?php
if (empty($_POST['email']) || empty($_POST['message']) || empty($_POST['name'])) {
    die('Please fill the required fields.');
}
$name = empty(htmlspecialchars($_POST['name'])) ? "Unknown" : htmlspecialchars($_POST['name']);
$from = htmlspecialchars($_POST['email']);
$subject = empty(htmlspecialchars($_POST['subject'])) ? "No subject" : htmlspecialchars($_POST['subject']);

//IP sender
$ipaddress = '';
if (isset($_SERVER['HTTP_CLIENT_IP'])) {
    $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
}
else if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
}
else if(isset($_SERVER['HTTP_X_FORWARDED'])) {
    $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
}
else if(isset($_SERVER['HTTP_FORWARDED_FOR'])) {
    $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
}
else if(isset($_SERVER['HTTP_FORWARDED'])) {
    $ipaddress = $_SERVER['HTTP_FORWARDED'];
}
else if(isset($_SERVER['REMOTE_ADDR'])) {
    $ipaddress = $_SERVER['REMOTE_ADDR'];
}
else {
    $ipaddress = 'UNKNOWN';
}


$message = '<html><body><table border="2"><tr><th>Name</th><td>';
$message .= $name . '</td></tr>';

$message .= '<tr><th>Message</th><td>';
$message .= empty(htmlspecialchars($_POST['message'])) ? "Default message" : htmlspecialchars($_POST['message']);
$message .= "</td></tr>";
$message .= '<tr><th>IP</th><td?>' . $ipaddress . '</td></tr>';
$message .= '</table>';

$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';
$headers[] = 'From: ' . $name . ' <' . $from . '>';
//$headers[] = 'Cc: ccmail@yourdomain.be';
// using mail function and returns boolean


$send = mail('r0463108@student.thomasmore.be', $subject, $message, implode("\r\n", $headers));
if ($send) {
$response = "Mail sent successfully";
} else {
$response = "Mail not sent";
}
echo json_encode($response);
?>