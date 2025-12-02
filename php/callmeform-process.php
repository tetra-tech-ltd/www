<?php

ini_set("log_errors", 1);
ini_set("error_log", "./php-error.log");

error_log( "SCRIPT CALLED: callmeform-process.php" );

$errorMSG = "";

if (empty($_POST["name"])) {
    $errorMSG = "Name is required ";
} else {
    $name = $_POST["name"];
}

if (empty($_POST["phone"])) {
    $errorMSG = "Phone is required ";
} else {
    $phone = $_POST["phone"];
}

if (empty($_POST["email"])) {
    $errorMSG = "Email is required ";
} else {
    $email = $_POST["email"];
}

if (empty($_POST["select"])) {
    $errorMSG = "Select is required ";
} else {
    $select = $_POST["select"];
}

if (empty($_POST["terms"])) {
    $errorMSG = "Terms is required ";
} else {
    $terms = $_POST["terms"];
}

$EmailTo = "sales@tetratechnology.co.uk";

$Subject = "Tetra Technology Callback Request";

$Headers = "MIME-Version: 1.0" . "\n";
$Headers .= "Content-type: text/plain;charset=UTF-8" . "\n";
$Headers .= "From: website@tetratechnology.co.uk\n";
$Headers .= "Reply-To: " . $email . "\n";
$Headers .= "X-Mailer: PHP/" . phpversion() . "\n";

$Body = "\n";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Phone: ";
$Body .= $phone;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Interested in: ";
$Body .= $select;
$Body .= "\n";
$Body .= "Terms: ";
$Body .= $terms;
$Body .= "\n";

error_log("EmailTo: " . $EmailTo);
error_log("Subject: " . $Subject);
error_log("Body: " . $Body);
error_log("Headers: " . $Headers );

// send email
$success = mail($EmailTo, $Subject, $Body, $Headers);

error_log("success: " . $success);
error_log("errorMSG: " . $errorMSG);

// redirect to success page
if ($success && $errorMSG == "") {
   echo "success";
}
else {
    if($errorMSG == ""){
        error_log("Something went wrong :(");
    } else {
        error_log($errorMSG);
    }
}
?>