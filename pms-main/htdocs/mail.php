
<?php
$to      = 'bhavesh.kumar@oracle.com';
$subject = 'the subject';
$message = 'hello bhavesh';
$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?>
