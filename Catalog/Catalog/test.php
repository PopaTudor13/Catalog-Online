<html>
<body>
<?php $to_email = 'ngheorghiesi@gmail.com';
$subject = 'Propunere';
$body = 'Am citit eseul tău fetițo și vreau să spun că mi-a plăcut foarte mult. Vreau să îl înscriu la concursul de istorie, secțiunea creație.
 PS: Transmite-i colegei tale de bancă să mai treacă pe la școală (nu vreau să se ajungă la amenințări cu corijența)';
$headers = 'From: Hrenciuc Daniel';
 if(isset($to_email) && isset($subject) && isset($body) && isset($headers))
 {
if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
echo "Email sending failed...";}
 }?>

</body>
</html>	