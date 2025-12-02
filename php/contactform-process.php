<?php
$errorMSG = "";

ini_set("log_errors", 1);
ini_set("error_log", "./php-error.log");

error_log( "SCRIPT CALLED: contactform-process.php" );

if (empty($_POST["name"])) {
    $errorMSG = "Name is required ";
} else {
    $name = $_POST["name"];
}

if (empty($_POST["email"])) {
    $errorMSG = "Email is required ";
} else {
    $email = $_POST["email"];
}

if (empty($_POST["message"])) {
    $errorMSG = "Message is required ";
} else {
    $message = $_POST["message"];
}

if (empty($_POST["terms"])) {
    $errorMSG = "Terms is required ";
} else {
    $terms = $_POST["terms"];
}

$EmailTo = "sales@tetratechnology.co.uk";

$Subject = "Tetra Technology Contact Form";

$Headers = "MIME-Version: 1.0" . "\n";
$Headers .= "Content-type: text/plain;charset=UTF-8" . "\n";
$Headers .= "From: website@tetratechnology.co.uk\n";
$Headers .= "Reply-To: " . $email . "\n";
$Headers .= "X-Mailer: PHP/" . phpversion() . "\n";

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";
$Body .= "Terms: ";
$Body .= $terms;
$Body .= "\n";

error_log("EmailTo: " . $EmailTo);
error_log("Subject: " . $Subject);
error_log("Body: " . $Body);
error_log("Headers: " . $Headers );

// send email
$success = mail($EmailTo, $Subject, $Body, @Headers);

// redirect to success page
if ($success && $errorMSG == ""){
   echo "success";
}else{
    if($errorMSG == ""){
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}
?>